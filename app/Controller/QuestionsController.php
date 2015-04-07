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
    
    public function questions_created(){
        
        $createdData = date('Y/m/d');
        $userId = AuthComponent::user('id');
        
        $this->loadModel('Tutorial');
        $option = array(
          'fields' => array('id', 'chapters', 'subsection', 'user_id', 'chapters_id'),
          'conditions' => array(
              'Tutorial.user_id' => $userId
          )  
        );
        
        $this->Tutorial->recursive = -1;
        $questions = $this->Tutorial->find('all', $option);
        $this->set('questions', $questions);
        
        if($this->request->is('post')){
            $this->Question->create();
            if(!empty($_POST['helyesValaszokRadio'])){
                $helyesValaszokRadio = $_POST['helyesValaszokRadio'];
                $rosszValaszokRadio = $_POST['rosszValaszokRadio'];
                $rosszValaszokRadio_1 = $_POST['rosszValaszokRadio1'];
                $rosszValaszokRadio_2 = $_POST['rosszValaszokRadio2'];
                
                $json = '{"helyesvalasz":"' . $helyesValaszokRadio . '","rosszvalasz":"' . $rosszValaszokRadio . '","rosszvalasz1":"' . $rosszValaszokRadio_1 . '","rosszvalasz2":"' . $rosszValaszokRadio_2 . '"}';
                
                $this->Question->data['Question']['respons'] =  $json;
                
            }
            if(!empty($_POST['helyesValaszokCheckbox'])){
                $helyesValaszokCheckbox = $_POST['helyesValaszokCheckbox'];
                $rosszValaszokCheckbox = $_POST['rosszValaszokCheckbox'];
                $helyesValaszokCheckbox1 = $_POST['helyesValaszokCheckbox1'];
                $rosszValaszokCheckbox1 = $_POST['rosszValaszokCheckbox1'];
                
                $json = '{"helyesvalasz":"' . $helyesValaszokCheckbox . '","rosszvalasz":"' . $rosszValaszokCheckbox . '","helyesvalasz1":"' . $helyesValaszokCheckbox1 . '","rosszvalasz2":"' . $rosszValaszokCheckbox1 . '"}';
                
                $this->Question->data['Question']['respons'] =  $json;
            }
            $this->Question->data['Question']['user_id'] = $userId;
            $this->Question->data['Question']['created'] = $createdData;
            
            if($this->Question->save($this->request->data)){
                $this->Session->setFlash(__('Sikeresen le van mentve.'));
                return $this->redirect(array('action' => 'questions_created'));
            }
        }
        else{
            $this->Session->setFlash(__('Nem sikerult le menteni'));
        }
    }
    
    public function question_list(){
        
        $userId = AuthComponent::user('id');
        
        $option = array(
            'fields' => array('id', 'created', 'tutorial_id'),
            'contain' => array(
                'Tutorial' => array(
                    'fields' => array('chapters')
                ),
                'User' => array(
                    'fields' => array('username', 'email')
                )
            ),
            'conditions' => array(
                'Question.user_id !=' => $userId
            )
            
        );
        
        $questionList = $this->Question->find('all', $option);
        $this->set('questionList', $questionList);
    }
    
    public function question($id = NULL){
        
        $option = array(
            'fields' => array('id', 'name', 'respons', 'type', 'created', 'tutorial_id'),
            'contain' => array(
                'Tutorial' => array(
                    'fields' => ('chapters')
                ),
                'User' => array(
                    'fields' => ('username')
                )
            ),
            'conditions' => array(
                'Question.tutorial_id' => $id
            )
        );
        
        $questions = $this->Question->find('all', $option);
        $this->set('questions', $questions);
    }
    
    public function user_question_list($id = NULL){
        
        $userId = AuthComponent::user('id');
        
        $option = array(
            'fields' => array('id', 'created', 'tutorial_id'),
            'contain' => array(
                'Tutorial' => array(
                    'fields' => array('chapters')
                ),
                'User' => array(
                    'fields' => array('username', 'email')
                )
            ),
            'conditions' => array(
                'Question.user_id' => $userId
            )
            
        );
        
        $questionList = $this->Question->find('all', $option);
        $this->set('questionList', $questionList);
    }
}    