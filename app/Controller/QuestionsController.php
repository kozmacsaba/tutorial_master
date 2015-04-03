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
                return $this->redirect(array('action' => 'questions'));
            }
        }
        else{
            $this->Session->setFlash(__('Nem sikerult le menteni'));
        }
    }
    
    public function question_list(){
        
        $questionList = $this->Question->find('all');
        
        $this->set('questionList', $questionList);
    }
}    