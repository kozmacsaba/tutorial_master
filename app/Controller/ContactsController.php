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
        
        $this->loadModel('User');
        $userModel = $this->User->findById($id);
        $userEmail = $userModel['User']['id'];
        
    }
}