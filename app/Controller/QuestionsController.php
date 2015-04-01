<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/* 
 * Question Controller
 * 
 * @property Question $Question
 * @property PaginatorComponent $Paginator
 */

class QuestionsController extends AppController{
    
    public $components = array("Email","Session","Paginator");
    
/***
 *
 * Question created mehtod
 *  
***/
    
    public function questions(){
        
        $userId = AuthComponent::user('id');
        
        $this->loadModel('Tutorial');
        $option = array(
          'fields' => array('id', 'chapters', 'subsection', 'user_id'),
          'conditions' => array(
              'Tutorial.user_id' => $userId
          )  
        );
        
        $this->Tutorial->recursive = -1;
        $questions = $this->Tutorial->find('all', $option);
        $this->set('questions', $questions);
    }
}    