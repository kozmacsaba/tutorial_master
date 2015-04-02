<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/* 
 * Tutorial Controller
 * 
 * @property Tutorial $Tutorial
 * @property PaginatorComponent $Paginator
 */

class TutorialsController extends AppController{
    
    public $components = array("Email","Session","Paginator");

/***
 * 
 * Tutorial created method
 * 
 ***/
    
    public function tutorial_created(){
        
        $createdDate = date('Y/m/d');
        $userId = AuthComponent::user('id');
       
        $options = array(
            'fields' => array('id', 'chapters'),
            'conditions' => array(
                'Tutorial.visited' => 1,
                'Tutorial.delete' => 1,
                'Tutorial.user_id' => $userId
            )
        );
        
        $this->Tutorial->recursive = -1;
        $tutorialChapters = $this->Tutorial->find('all', $options);
        $this->set('tutorialChapters', $tutorialChapters);
        
        if($this->request->is('post')){
            
            $this->Tutorial->create();
            $this->request->data['Tutorial']['visited'] = 2;
            $this->request->data['Tutorial']['delete'] = 1;
            $this->request->data['Tutorial']['user_id'] = AuthComponent::user('id');
            $this->request->data['Tutorial']['created_date'] = $createdDate;
            
            if($this->Tutorial->save($this->request->data)){
                
                $url = Router::url(array('controller' => 'users', 'action' => 'login'), true);
                $ms = $url;
                $ms = wordwrap($ms, 1000);
                
                $Email = new CakeEmail();
                $Email->config('gmail');
                $Email->template('tutorial_created');
                $Email->viewVars(array('url' => $ms));
                $Email->emailFormat('html');
                $Email->from(array('sany.geza234@gmail.com' => 'Tutorial Masters'));
                $Email->subject('Created Tutorial');
                $Email->to('kozma.csaba@yahoo.com');
                $Email->send();
                
                $this->Session->setFlash(__("A tutorial sikerult letre hozni"));
                return $this->redirect(array('action' => 'tutorial_created'));
            }
            
        }
        
    }
    
/***
 * 
 * Tutorial list method
 * 
****/
    
    public function tutorial_list(){
        
        $tutorial_options = array(
            'fields' => array('id', 'chapters', 'subsection', 'SUBSTRING(Tutorial.descriptions, 1, 450) as descriptions', 'created_date'),
            'contain' => array(
                'User' => array(
                     'fields' => array ('id', 'username')   
                )
            ),
            'conditions' => array(
                'Tutorial.visited' => 1,
                'Tutorial.delete' => 1
            )
        );
        
        $this->Tutorial->recursive = -1;
        $tutorialLists = $this->Tutorial->find('all', $tutorial_options);
        $this->set('tutorialLists', $tutorialLists);
    }

/***
 * 
 * Admin tutorial list method
 *     
****/
    
    public function admin_tutorial_list(){
        
        $tutorial = array(
            'fields' =>  array('id', 'chapters', 'subsection', 'descriptions', 'visited', 'user_id', 'created_date'),
            'contain' => array(
                'User' => array(
                    'fields' => array('username', 'email')
                ),
                'Powerpoint' => array(
                    'fields' => array('id', 'powerpoint', 'tutorial_id')
                )
            ),
            'conditions' => array(
                'Tutorial.delete' => 1
            )
        );
        
        $this->Tutorial->recursive = -1;
        $adminTutorialLists = $this->Tutorial->find('all', $tutorial);
        //var_dump($adminTutorialLists);
        //exit();
        $this->set('adminTutorialLists', $adminTutorialLists);
    }
    
/***
 * 
 * Tutorial remove method
 * 
****/
    
    public function tutorial_remove($id = null){
        
        $removeTutorialOptions = array(
            'fields' => array('id', 'visited'),
            'contain' => array(
                'User' => array(
                    'fields' => array('id', 'email')
                )
            ),
            'conditions' => array(
                'Tutorial.id' => $id
            )
        );
        
        
        $this->Tutorial->recursive = -1;
        $removeTutorial = $this->Tutorial->find('all', $removeTutorialOptions);
        
        foreach ($removeTutorial as $tutorialRemove){
            $email = $tutorialRemove['User']['email'];
        }
            if($this->request->is('post')){
                $this->Tutorial->id = $id;
                if($this->Tutorial->saveField('visited',2)){
                    /* email send user activ email */
                    
                    $url = Router::url( array('controller'=>'users','action'=>'active_user'), true );
                    $ms=$url;
                    $ms=wordwrap($ms,1000);
                    
                    $Email = new CakeEmail();
                    $Email->config('gmail');
                    $Email->template('delete_tutorial');
                    $Email->viewVars(array('url' => $ms));
                    $Email->emailFormat('html');
                    $Email->from(array('sany.geza234@gmail.com' => 'Tutorial Masters'));
                    $Email->subject('Deleted tutorial Tutorial Masters');
                    $Email->to($email);
                    $Email->send();
                    
                    /* email sen duser activ email end */
                    $this->redirect(array('action' => 'admin_tutorial_list'));
                }
            }
            $this->request->data = $removeTutorial;
        
    }
    
/***
 * 
 * Tutorial active method
 * 
 ***/    
    public function tutorial_active($id = null){
        
        $activeTutorialOptions = array(
            'fields' => array('id', 'visited'),
            'contain' => array(
                'User' => array(
                    'fields' => array('id', 'email')
                )
            ),
            'conditions' => array(
                'Tutorial.id' => $id
            )
        );
        
        
        $this->Tutorial->recursive = -1;
        $activeTutorial = $this->Tutorial->find('all', $activeTutorialOptions);
        
        foreach ($activeTutorial as $tutorialActive){
            $email = $tutorialActive['User']['email'];
        }
        
            if ($this->request->is('post')) {
                $this->Tutorial->id = $id;
                if ($this->Tutorial->saveField('visited', 1)) {
                    /* email send user activ email */
                    
                    $url = Router::url( array('controller'=>'tutorials','action'=>'tutorail_list'), true );
                    $ms=$url;
                    $ms=wordwrap($ms,1000);
                    
                    $Email = new CakeEmail();
                    $Email->config('gmail');
                    $Email->template('active_tutorial');
                    $Email->viewVars(array('url' => $ms));
                    $Email->emailFormat('html');
                    $Email->from(array('sany.geza234@gmail.com' => 'Tutorial Masters'));
                    $Email->subject('Active tutorial Tutorial Masters');
                    $Email->to($email);
                    $Email->send();
                    
                    /* email sen duser activ email end */
                    $this->redirect(array('action' => 'admin_tutorial_list'));
                }
            }
            
            $this->request->data = $activeTutorial;
        
    }
    
/***
 * 
 * Tutorial visited method
 * 
 ***/
    
    public function visited_tutorial($id = null){
        
        $visitedTutorialOptions = array(
          'fields' => array('id', 'chapters', 'subsection', 'descriptions', 'visited', 'user_id', 'created_date'),
          'contain' => array(
              'User' => array(
                  'fields' => array ('id', 'username', 'email')
              ),
              'Powerpoint' => array(
                    'fields' => array('id', 'powerpoint', 'tutorial_id')
              )
          ),
          'conditions' => array(
              'Tutorial.id' => $id
          )  
        );
        
        $this->Tutorial->recursive = -1;
        $visitedTutorial = $this->Tutorial->find('all', $visitedTutorialOptions);
        $this->set('visitedTutorial', $visitedTutorial);
    }
    
/****
 * 
 * Tutorial method
 * 
****/
    
    public function tutorial ($id = null){
        
        $tutorial_options = array(
            'fields' => array('id', 'chapters', 'subsection', 'descriptions', 'video', 'visited', 'user_id', 'created_date'),
            'contain' => array(
                'User' => array(
                     'fields' => array ('id', 'username')   
                )
            ),
            'conditions' => array(
                'Tutorial.id' => $id,
                'Tutorial.visited' => 1,
                'Tutorial.delete' => 1
            )
        );
        
        $this->Tutorial->recursive = -1;
        $tutorialLists = $this->Tutorial->find('all', $tutorial_options);
        $this->set('tutorialLists', $tutorialLists);
        
    }
    
/****
 * 
 * User tutorial method
 * azokat a tutorialokat listazak amelyek a felhasznalo hozot letre
 * 
 ****/
    
    public function user_tutorial_list(){
        
        $userId = AuthComponent::user('id');
        
        $options = array(
            'fields' => array('id', 'chapters', 'subsection', 'SUBSTRING(Tutorial.descriptions, 1, 300) as descriptions', 'visited', 'user_id', 'created_date', 'delete'),
            'conditions' => array(
                'Tutorial.user_id' => $userId
            )
        );
        
        $this->Tutorial->recursive = -1;
        $myTutorials = $this->Tutorial->find('all', $options);
        $this->set('myTutorials', $myTutorials);
    }
    
/****
 * 
 * Tutorial edit method
 * 
 ****/
    
    public function tutorial_edit($id = null){
        
        $editTutorial = $this->Tutorial->findById($id);
        if($this->request->is(array('post', 'put'))){
            $this->Tutorial->id = $id;
            if($this->Tutorial->save($this->request->data)){
                return $this->redirect(array('action' => 'user_tutorial_list'));
            }
            else{
                $this->Session->setFlash(_('The user could not be saved. Pleasem try again'));
            }
        }
        $this->request->data = $editTutorial;
        $this->set('editTutorial', $editTutorial);
    }
    
/****
 * 
 * Tutorial deleted method
 * 
 ****/
    
    public function user_tutorial_delet($id = null){
        
        $deleted = $this->Tutorial->findById($id);
        if($this->request->is('post')){
            $this->Tutorial->id = $id;
            if($this->Tutorial->saveField('delete', 0)){
                $this->Session->setFlash(__("A tutorialt sikeresen torolted"));
                return $this->redirect(array('action' => 'user_tutorial_list'));
            }
            else{
                $this->Session->setFlash(__("Nem sikerult a tutorialt le torolnod"));
            }
        }
        
    }
    
/****
 * 
 * Tutorial not deleted mehtod
 * 
****/
    
    public function user_tutorial_not_deleted($id = null){
        
        $deleted = $this->Tutorial->findById($id);
        if($this->request->is('post')){
            $this->Tutorial->id = $id;
            if($this->Tutorial->saveField('delete', 1)){
                $this->Session->setFlash(__("A tutorialt sikeresen aktivaltad"));
                return $this->redirect(array('action' => 'user_tutorial_list'));
            }
            else{
                $this->Session->setFlash(__("Nem sikerult a tutorialt aktivalni"));
            }
        }
    }
    
/****
 * 
 * Select chaptres method
 * 
****/
    
    /*public function select_chapters(){
        
        $userId = AuthComponent::user('id');
        
        if ($this->request->is('ajax')) {

            $jsonResponse = array("data" => array(), "errors" => array());

            if (isset($this->request->data['chapters']) && isset($this->request->data['selected_type']) &&
                    !empty($this->request->data['chapters']) && !empty($this->request->data['selected_type'])) {

                $enquete_id = (int) $this->request->data['chapters'];
                $seleced_type = $this->request->data['selected_type'];

                if (!$this->updateEnqueteType($enquete_id, $seleced_type)) {
                    $jsonResponse['errors'][] = 21;
                }
            } else if (isset($this->request->data['chapters']) && isset($this->request->data['puissance_installee']) &&
                    !empty($this->request->data['chapters']) && !empty($this->request->data['puissance_installee'])) {

                $enquete_id = (int) $this->request->data['chapters'];

                $updateValues = array(
                    'puissance_installee' => $this->request->data['puissance_installee']
                );
                $conditions = array(
                    'Enquete.id' => $enquete_id
                );
                try {
                    if (!$this->Enquete->updateAll($updateValues, $conditions)) {
                        $jsonResponse['errors'][] = 32;
                    }
                } catch (Exception $e) {
                    $jsonResponse['errors'][] = 22;
                }
            } else {
                $jsonResponse['errors'][] = 1;
            }

            $this->set('json_response', json_encode($jsonResponse));
            $this->render('json_all', 'ajax');
        } else {

            throw new InternalErrorException('Not accessible!');
        }
        
    }*/
}

