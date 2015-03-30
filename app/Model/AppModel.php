<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
    
    public $actsAs = array('Containable');
    
    /*public function changeActiveStatus($status = '', $id = null){
        
        $saveId = isset($id) && is_numeric($id) ? $id : (isset($this->id) && is_numeric($this->id) ? $this->id : false);
        $saveStatus = !empty($status) && is_numeric($status) ? $status : ( isset($this->status) && is_numeric($this->status) ? $this->status : false );
        
        if($saveId && $saveStatus){
            $query = "UPDATE `" . $this->useTable . "` SET `active`=" . $saveStatus . " WHERE `" . $this->primaryKey . "`='$saveId'";
            return !( $this->query($query) == false );
        }
        
        return false;
        
    }*/
}
