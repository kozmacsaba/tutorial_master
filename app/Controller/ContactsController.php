<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Contact Controller
 *
 * @property Contact $Contact
 * @property PaginatorComponent $Paginator
 */

class ContactsController extends AppController{
    
    public $components = array("Email","Session","Paginator");

/***
 * 
 * Tutorial email send mehtod
 * ha hibas tutorial es nem tudod aktival a tutorialt
 * 
 ***/    
    public function tutoria_email_send($id = null){
        
        $subject = '';
        $message = '';
        
        $this->loadModel('User');
        $userModel = $this->User->findById($id);
        $userEmail = $userModel['User']['email'];
        
        if ($this->request->is('post')){
            
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            
            $Email = new CakeEmail();
            $Email->config('gmail');
            $Email->emailFormat('html');
            $Email->from(array('sany.geza234@gmail.com' => 'Tutorial Masters'));
            $Email->to($userEmail);
            $Email->subject($subject);
            $Email->send($message);
            
            $this->Session->setFlash(__('E-mail sikeres el van kuldve'));
        }
        
    }
    
/****
 *
 * Error tutorial send email method
 * A felhasznalok tudnak kuldeni emial az adminak es aki keszitette
 *  
 ****/
    
    public function error_tutorial($id = null){
        
        $subject = '';
        $message = '';
        
        $this->loadModel('Tutorial');
        //$this->loadModel('User');
        
        $options = array(
            'fields' => array('id', 'chapters'),
            'contain' => array(
                'User' => array(
                    'fields' => array('id, email')
                )
            ),
            'conditions' => array(
                'Tutorial.id' => $id
            )
        );
        
        $this->Tutorial->recursive = -1;
        $errorTutorial = $this->Tutorial->find('all', $options);
        
        foreach ($errorTutorial as $error){
            $tutorialId = $error['Tutorial']['id'];
            $tutorialChapters = $error['Tutorial']['chapters'];
            $userEmail = $error['User']['email'];
        }
        
        if($this->request->is('post')){
            
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            
            $url = Router::url(array('controller'=>'tutorials','action'=>'tutorial', $tutorialId), true );
            $ms=$url;
            $ms=wordwrap($ms,1000);
            
            $Email = new CakeEmail();
            $Email->config('gmail');
            $Email->template('error_tutorial');
            $Email->viewVars(array('url' => $ms, 'tutorialChapters' => $tutorialChapters, 'message' => $message));
            $Email->emailFormat('html');
            $Email->from(array('sany.geza234@gmail.com' => 'Tutorial Masters'));
            $Email->subject($subject);
            $Email->cc('kozma.csaba@yahoo.com');
            $Email->to($userEmail);
            $Email->send();
            
            $this->Session->setFlash(__('E-mail sikeres el van kuldve'));
            
        }
    }
}