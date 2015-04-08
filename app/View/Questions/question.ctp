<?php
function emptyVal($val){
    return (empty($val)?false:true);
}
$chapters = array();
$username = array();
$date = array();

foreach ($questions as $question){
    $chapters[] = $question['Tutorial']['chapters'];
    $username[] = $question['User']['username'];
    $date[] = $question['Question']['created'];
}

$chaptersSelect = array();
foreach ($chapters as $select)
    $chaptersSelect[] = $select;

$chaptersSelect = array_filter($chaptersSelect, 'emptyVal'); // remove empty values
$chaptersSelect = array_unique($chaptersSelect); // remove duplicates
$chaptersSelect = array_values($chaptersSelect); // reset array keys

$usernameSelect = array();
foreach ($username as $selectUsername)
    $usernameSelect[] = $selectUsername;

$usernameSelect = array_filter($usernameSelect, 'emptyVal');
$usernameSelect = array_unique($usernameSelect);
$usernameSelect = array_values($usernameSelect);

$dateSelect = array();
foreach ($date as $datum)
    $dateSelect[] = $datum;

$dateSelect = array_filter($dateSelect, 'emptyVal');
$dateSelect = array_unique($dateSelect);
$dateSelect = array_values($dateSelect);
?>
<div class="col-md-9">
    <?php $i= 0; ?>
    <?php echo $this->Form->create('Question', array('class' => 'form-horizontal form_question')) ?>
        <div class="questionx_box">
            <div class="title">
                <?php foreach ($chaptersSelect as $chapters): ?>
                <h3><?= $chapters ?></h3>
                <?php endforeach; ?>
                <span>Keszi tette: <?php foreach ($usernameSelect as $user){ echo $user; } ?> | Datum: <?php foreach ($dateSelect as $dat){ echo $dat; } ?></span>
            </div>
            <div class="questions">
                <?php foreach ($questions as $question): $i = $i + 1 ?>
                    <!-- question text type start -->
                    <?php 
                    if($question['Question']['type'] == 1){
                        
                        echo '<p class="question_title"><b>' . $i . ' - </b>' . $question['Question']['name'] . '</p>';
                    ?>
                    <div class="form-group">
                        <?php 
                        echo $this->Form->input('Score.respons_text', array(
                                                        'type' => 'text',
                                                        'label' => array('text' => 'Valaszt ide irhatod be', 'class' => 'control-label col-md-3', 'for' => 'Valaszt ide irhatod be'),
                                                        'wrap' => 'col-md-6',
                                                        'div' => false,
                                                        'class' => 'form-control',
                                                    )
                                                );
                        ?>
                    </div>
                    <?php
                    } 
                    ?>
                    <!-- question text type end -->

                    <!-- question radio type start -->
                    <?php 
                    if($question['Question']['type'] == 2){
                        $response = $question['Question']['respons'];
                        $response = json_decode($response);
                        $correctAnswer = !empty($response->helyesvalasz) ? $response->helyesvalasz : "";
                        $wrongAnswer = !empty($response->rosszvalasz) ? $response->rosszvalasz : "";
                        $wrongAnswer1 = !empty($response->rosszvalasz1) ? $response->rosszvalasz1 : "";
                        $wrongAnswer2 = !empty($response->rosszvalasz2) ? $response->rosszvalasz2 : "";
                        
                        echo '<p class="question_title"><b>' . $i . ' - </b>' . $question['Question']['name'] . '</p>';
                    ?>    
                    <div class="form-group">
                        <?php 
                        echo $this->Form->input('Score.response_radio', array(
                                                        'type' => 'radio',
                                                        'label' => false,
                                                        'wrap' => 'col-md-6',
                                                        'div' => false,
                                                        'class' => array(1 => 'col-md-3', 2 => 'col-md-3', 3 => 'col-md-3', 4 => 'col-md-3'),
                                                        'options' => array($correctAnswer => $correctAnswer, $wrongAnswer => $wrongAnswer, $wrongAnswer1 => $wrongAnswer1, $wrongAnswer2 => $wrongAnswer2)
                                                    )
                                                )    
                        ?>
                    </div>
                    <?php
                    } 
                    ?>

                    <!-- question radio type end -->

                    <!-- question checkbox type start -->
                    <?php 
                    if($question['Question']['type'] == 3){ 
                        $respons = $question['Question']['respons'];
                        $respons = json_decode($respons);
                        $correctAnswer = !empty($respons->helyesvalasz) ? $respons->helyesvalasz : "";
                        $wrongAnswer = !empty($respons->rosszvalasz) ? $respons->rosszvalasz : "";
                        $correctAnswer1 = !empty($respons->helyesvalasz1) ? $respons->helyesvalasz1 : "";
                        $wrongAnswer1 = !empty($respons->rosszvalasz2) ? $respons->rosszvalasz2 : "";
                        
                        echo '<p class="question_title"><b>' . $i . ' - </b>' . $question['Question']['name'] . '</p>';
                    ?>
                    
                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    <?php //echo $this->Form->checkbox('Score.response_checkbox', array('value' => $correctAnswer)); ?>
                                    <input type="checkbox" name="correctAnswer" value="<?= $correctAnswer ?>"><?= $correctAnswer ?>
                                </label>
                            </div>
                        </div>    
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    <?php //echo $this->Form->checkbox('Score.response_checkbox', array('value' => $wrongAnswer)); ?>
                                    <input type="checkbox" name="wrongAnswer" value="<?= $wrongAnswer ?>"><?= $wrongAnswer ?>
                                </label>
                            </div>
                        </div>    
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    <?php //echo $this->Form->checkbox('Score.response_checkbox', array('value' => $correctAnswer1)); ?>
                                    <input type="checkbox" name="correctAnswer1" value="<?= $correctAnswer1 ?>"><?= $correctAnswer1 ?>
                                </label>
                            </div>
                        </div>    
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    <?php //echo $this->Form->checkbox('Score.response_checkbox', array('value' => $wrongAnswer1)); ?>
                                    <input type="checkbox" name="wrongAnswer1" value="<?= $wrongAnswer1 ?>"><?= $wrongAnswer1 ?>
                                </label>
                            </div>
                        </div>    
                    </div>
                    <?php    
                    }
                    ?>
                    <!-- question checkbox type end -->
                    <?php echo $this->Form->input('Score.tutorial_id', array('type' => 'hidden', 'label' => false, 'value' => $question['Question']['tutorial_id'])) ?>
                    <?php echo $this->Form->input('Score.question_id', array('type' => 'hidden', 'label' => false, 'value' => $question['Question']['id'])) ?>
                <?php endforeach; ?>
                <div class="form-group">
                    <?php echo $this->Form->input('Mentes', array('type' => 'submit', 'label' => false, 'class' => 'btn btn-default')) ?>
                </div>
                    
            </div>
        </div>
    </form>
</div>