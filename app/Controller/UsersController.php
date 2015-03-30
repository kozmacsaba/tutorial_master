<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {
    var $name = 'Users';
    var $uses = array('User');
    var $allowCookie = true;
    var $cookieTerm = '0';
    var $components=array("Email","Session","Paginator");
    var $helpers=array("Html","Session");
   
/**
 * Components
 *
 * @var array
 */
	//public $components = array('Security');

/**
 * index method
 *
 * @return void
 * 
 */
    
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('registration','forgetpwd','reset');
        }
        
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}
        
        public function user_list(){
            
            $users_list = $this->User->find('all');
            $this->set('users_list', $users_list);
        }
        
        public function logout(){
            
            $this->Auth->logout();
            $this->redirect(array('controller' => 'pages' , 'action' => 'home'));
            
        }


        public function login(){
            
            if($this->request->is('post')){
                if($this->Auth->login()){
                    $this->redirect(array('controller' => 'pages', 'action' => 'home'));
                }
                else{
                    $this->Session->setFlash(_('Invalid username as password'));
                }
            }
        }

/*******
    * 
    * Registration method 
    * 
 *******/
        
        public function registration(){
            
            if($this->request->is('post')){
                $this->User->create();
                $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
                $this->request->data['User']['role'] = 2;
                if($this->User->save($this->request->data)){
                    
                    /** edit user edit send email admin **/
                    
                    $url = Router::url(array('controller' => 'users', 'action' => 'active_user'), true);
                    $ms = $url;
                    $ms = wordwrap($ms, 1000);
                    
                    $Email = new CakeEmail();
                    $Email->config('gmail');
                    $Email->template('registration_account');
                    $Email->viewVars(array('first_name' => $this->request->data['User']['first_name'], 'last_name' => $this->request->data['User']['last_name'], 'username' => $username = $this->request->data['User']['username'], 'email' => $this->request->data['User']['email']));
                    $Email->emailFormat('html');
                    $Email->from(array('sany.geza234@gmail.com' => 'Tutorial Masters'));
                    $Email->subject('Registration account');
                    $Email->to('kozma.csaba@yahoo.com');
                    $Email->send();
                    
                    /** edit user edit send email admin **/
                    
                    $this->Session->setFlash(_('The user has been saved.'));
                    return $this->redirect(array('action' => 'registration'));
                }
                else{
                    $this->Session->setFlash(_('A regisztracio nem sikerult'));
                }
            }
            
        }
        
/*******
    * 
    *  Forget password method
    * 
********/
        
        public function forgetpwd(){
            if(!empty($this->data)){
		if(empty($this->data['User']['email'])){
                    $this->Session->setFlash('Please Provide Your Email Adress that You used to Register with Us');
		}
		else{
                    $email=$this->data['User']['email'];
                    $fu = $this->User->find('first',array('conditions'=>array('User.email'=>$email)));
                    if($fu){
                        if($fu['User']['active']){
                            
                            $string = 'abcdefghijklmnopqrstuvzwxyABCDEFGHIJKLMNOPQRSTUVZWXY0123456789!@%$';
                            $key = '';
                            
                            for ($i = 0; $i < 20; $i++) {
                                $key.= substr($string, mt_rand(0, strlen($string) - 1), 1);
                            }
                            
                            $url = Router::url( array('controller'=>'users','action'=>'reset'), true ). '/' . $fu['User']['id'];
                            $ms=$url;
                            $ms=wordwrap($ms,1000);
                            $this->User->id=$fu['User']['id'];
                            $fu['User']['tokenhash'] = $key;
                            if($this->User->saveField('tokenhash',$fu['User']['tokenhash'])){
                                /*
                                $this->Email->smtpOptions = array(
                                                                    'host' => 'ssl://smtp.gmail.com',
                                                                    'port' => 465,
                                                                    'username' => 'sany.geza234@gmail.com',
                                                                    'password' => '67kozmacsaba67',
                                                                    'transport' => 'Smtp',
                                                                    'timeout' => '30'
                                                              );
                                $this->Email->template = 'resetpw';
                                $this->Email->from    = 'sany.geza234@gmail.com';
                                $this->Email->to      = $fu['User']['username'].'<'.$fu['User']['email'].'>';
                                $this->Email->subject = 'Reset Your Example.com Password';
                                $this->Email->sendAs = 'both';
                                $this->Email->delivery = 'smtp';
                                $this->set('ms', $ms);
                                $this->Email->send();
                                $this->set('smtp_errors', $this->Email->smtpError);*/
                                $Email = new CakeEmail();
                                $Email->config('gmail');
                                $Email->template('resetpw');
                                $Email->viewVars(array('url' => $ms));
                                $Email->emailFormat('html');
                                $Email->from(array('sany.geza234@gmail.com' => 'Tutorial Masters'));
                                $Email->subject('Reset Your Tutorial Masters Password');
                                $Email->to($fu['User']['email']);
                                $Email->send();
                                $this->Session->setFlash(__('Check Your Email To Reset your password', true));
                            }
                            else{
                                $this->Session->setFlash("Error Generating Reset link");
                            }
			}
			else{
                            $this->Session->setFlash('This Account is not Active yet.Check Your mail to activate it');
			}
                    }
                    else{
			$this->Session->setFlash('Email does Not Exist');
                    }
		}
            }
	}
        
        function reset($id = null){
            $data = $this->User->findById($id);
            if($this->request->is(array('post'))){
                $this->User->id = $id;
                 $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
                if ($this->User->save($this->request->data)){
                    $this->Session->setFlash('The user password has benn editted');
                    $this->redirect(array('action' => 'login'));
                }
            }
        
            $this->request->data = $data;
        }

/*******
    * 
    *  Active user method end
    * 
********/
        
        function active_user($id = null){
            
            $activeUser = $this->User->findById($id);
            if ($this->request->is('post')) {
                $this->User->id = $id;
                if ($this->User->saveField('active', 1)) {
                    /* email send user activ email */
                    
                    $url = Router::url( array('controller'=>'users','action'=>'login'), true );
                    $ms=$url;
                    $ms=wordwrap($ms,1000);
                    
                    $Email = new CakeEmail();
                    $Email->config('gmail');
                    $Email->template('active_account');
                    $Email->viewVars(array('url' => $ms));
                    $Email->emailFormat('html');
                    $Email->from(array('sany.geza234@gmail.com' => 'Tutorial Masters'));
                    $Email->subject('Active account Tutorial Masters');
                    $Email->to($activeUser['User']['email']);
                    $Email->send();
                    
                    /* email sen duser activ email end */
                    $this->redirect(array('action' => 'user_list'));
                }
            }
            
            $this->request->data = $activeUser;
        }

/*******
    * 
    *  Deleted user method end
    * 
********/        

        public function remove_user($id = null){
            
            $removeUser = $this->User->findById($id);
            if($this->request->is('post')){
                $this->User->id = $id;
                if($this->User->saveField('active',0)){
                    /* email send user activ email */
                    
                    $url = Router::url( array('controller'=>'users','action'=>'active_user'), true );
                    $ms=$url;
                    $ms=wordwrap($ms,1000);
                    
                    $Email = new CakeEmail();
                    $Email->config('gmail');
                    $Email->template('delete_account');
                    $Email->viewVars(array('url' => $ms));
                    $Email->emailFormat('html');
                    $Email->from(array('sany.geza234@gmail.com' => 'Tutorial Masters'));
                    $Email->subject('Deleted account Tutorial Masters');
                    $Email->to($removeUser['User']['email']);
                    $Email->send();
                    
                    /* email sen duser activ email end */
                    $this->redirect(array('action' => 'user_list'));
                }
            }
            $this->request->data = $removeUser; 
        }
        
/*******
 *
 * Edit User method
 *  
 *******/
        
        public function edit($id = null){
            $editFirstName = '';
            $editLastName = '';
            $editUsername = '';
            $editEmail = '';
            
            $editUser = $this->User->findById($id);
            
            if($this->request->is(array('post', 'put'))){
                $this->User->id = $id;
                $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
                if($this->User->save($this->request->data)){
                    
                    /** edit user edit send email admin **/
                    
                    $firstName = $this->request->data['User']['first_name'];
                    $lastName = $this->request->data['User']['last_name'];
                    $username = $this->request->data['User']['username'];
                    $email = $this->request->data['User']['email'];
                    
                    if($editUser['User']['first_name'] != $firstName){
                        $editFirstName = $firstName;
                    }
                    
                    if($editUser['User']['last_name'] != $lastName){
                        $editLastName = $lastName;
                    }
                    
                    if($editUser['User']['username'] != $username){
                        $editUsername = $username;
                        
                    }
                    
                    if($editUser['User']['email'] != $email){
                        $editEmail = $email;
                    }
                    
                    $url = Router::url(array('controller' => 'users', 'action' => 'active_user'), true);
                    $ms = $url;
                    $ms = wordwrap($ms, 1000);
                    
                    $Email = new CakeEmail();
                    $Email->config('gmail');
                    $Email->template('edit_user');
                    $Email->viewVars(array('username' => $editUser['User']['username'], 'first_name' => $editFirstName, 'last_name' => $editLastName, 'edit_username' => $editUsername, 'email' => $editEmail));
                    $Email->emailFormat('html');
                    $Email->from(array('sany.geza234@gmail.com' => 'Tutorial Masters'));
                    $Email->subject('Edit user');
                    $Email->to('kozma.csaba@yahoo.com');
                    $Email->send();
                    
                    /** edit user edit send email admin **/
                    
                    //$this->Session->setFlash(_('The user has ben save'));
                    return $this->redirect(array('controller' => 'pages', 'action' => 'home'));
                }
                else{
                    $this->Session->setFlash(_('The user could not be saved. Pleasem try again'));
                }
            }
            $this->request->data = $editUser;
            
        }
        
}
