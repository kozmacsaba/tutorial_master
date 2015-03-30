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
        
        if($this->request->is('post')){
            
            $this->Tutorial->create();
            $this->request->data['Tutorial']['visited'] = 2;
            $this->request->data['Tutorial']['user_id'] = AuthComponent::user('id');
            $this->request->data['Tutorial']['created_date'] = $createdDate;
            
            if($this->Tutorial->save($this->request->data)){
                
                $url = Router::url(array('controller' => 'users', 'action' => 'login'), true);
                $ms = $url;
                $ms = wordwrap($ms, 1000);
                
                $Email = new CakeEmail();
                $Email->config('gmail');
                $Email->template('tutorial_created');
                $Email->viewVars(array('url' => $ms, 'tutorial_cime' => $this->request->data['Tutorial']['chapters']));
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
            'fields' => array('chapters', 'subsection', 'descriptions', 'video', 'power_point', 'visited', 'user_id', 'created_date'),
            'contain' => array(
                'User' => array(
                     'fields' => array ('id', 'username')   
                )
            ),
            'conditions' => array(
                'Tutorial.visited' => 1
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
            'fields' =>  array('id', 'chapters', 'subsection', 'descriptions', 'video', 'power_point', 'visited', 'user_id', 'created_date'),
            'contain' => array(
                'User' => array(
                    'fields' => array('username', 'email')
                )
            )
        );
        
        $this->Tutorial->recursive = -1;
        $adminTutorialLists = $this->Tutorial->find('all', $tutorial);
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
          'fields' => array('id', 'chapters', 'subsection', 'descriptions', 'video', 'power_point', 'visited', 'user_id', 'created_date'),
          'contain' => array(
              'User' => array(
                  'fields' => array ('id', 'username', 'email')
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
}

