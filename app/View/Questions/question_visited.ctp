<?php
function emptyVal($val){
    return (empty($val)?false:true);
}

$i = 0;
$chapters = array();
$username = array();
$date = array();

foreach ($visiteds as $question){
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
    <?php echo $this->Form->create('Question', array('class' => 'form-horizontal form_question')) ?>
        <div class="questionx_box">
            <div class="title">
                <h3><?php foreach ($chaptersSelect as $chapter){ echo $chapter; } ?></h3>
                <span>Keszitette: <?php foreach ($usernameSelect as $user){ echo $user; } ?> | Datum: <?php foreach ($dateSelect as $dat) { echo $dat; } ?></span>
            </div>
            <div class="questions">
                <?php foreach ($visiteds as $visited): $i = $i + 1 ?>
                <?php
                if($visited['Question']['type'] == 1){
                    echo '<p class="question_title"><b>' . $i . ' - </b>' . $visited['Question']['name'] . '</p>';
                ?>
                <div class="form-group row">
                    <?php    echo $this->Form->input('respons', array(
                                                                'type' => 'text',
                                                                'label' => false,
                                                                'wrap' => 'col-md-6',
                                                                'div' => false,
                                                                'class' => 'form-control',
                                                                'value' => $visited['Question']['respons']
                                                            )
                                                );
                    ?>
                </div>
                <?php
                }
                if($visited['Question']['type'] == 2){
                    $response = $visited['Question']['respons'];
                    $response = json_decode($response);
                    $correctAnswer = !empty($response->helyesvalasz) ? $response->helyesvalasz : "";
                    $wrongAnswer = !empty($response->rosszvalasz) ? $response->rosszvalasz : "";
                    $wrongAnswer1 = !empty($response->rosszvalasz1) ? $response->rosszvalasz1 : "";
                    $wrongAnswer2 = !empty($response->rosszvalasz2) ? $response->rosszvalasz2 : "";
                    
                    echo '<p class="question_title"><b>' . $i . ' - </b>' . $visited['Question']['name'] . '</p>';
                ?>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="radio">
                            <label>
                                <input type="radio" name="response" value="<?= $correctAnswer ?>" checked="checked" disabled=""><?= $correctAnswer ?>
                            </label>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="radio">
                            <label>
                                <input type="radio" name="response" value="<?= $wrongAnswer ?>" disabled=""><?= $wrongAnswer ?>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="radio">
                            <label>
                                <input type="radio" name="response" value="<?= $wrongAnswer1 ?>" disabled=""><?= $wrongAnswer1 ?>
                            </label>
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="radio">
                            <label>
                                <input type="radio" name="response" value="<?= $wrongAnswer2 ?>" disabled=""><?= $wrongAnswer2 ?>
                            </label>
                        </div>
                    </div>
                </div>
                <?php
                }
                if($visited['Question']['type'] == 3){
                    $response = $visited['Question']['respons'];
                    $response = json_decode($response);
                    $correctAnswer = !empty($response->helyesvalasz) ? $response->helyesvalasz : "";
                    $wrongAnswer = !empty($response->rosszvalasz) ? $response->rosszvalasz : "";
                    $correctAnswer1 = !empty($response->helyesvalasz1) ? $response->helyesvalasz1 : "";
                    $wrongAnswer1 = !empty($response->rosszvalasz2) ? $response->rosszvalasz2 : "";

                    echo '<p class="question_title"><b>' . $i . ' - </b>' . $visited['Question']['name'] . '</p>';
                ?>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <?php echo $this->Form->checkbox('response', array('value' => $correctAnswer, 'checked' => 'checked', 'disabled')) ?><?= $correctAnswer ?>
                            </label>
                        </div>
                    </div>    
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <?php echo $this->Form->checkbox('response', array('value' => $wrongAnswer, 'disabled')) ?><?= $wrongAnswer ?>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <?php echo $this->Form->checkbox('response', array('value' => $correctAnswer1, 'checked' => 'checked', 'disabled')); ?><?= $correctAnswer1 ?>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <?php echo $this->Form->checkbox('response', array('value' => $wrongAnswer1, 'disabled')); ?><?= $wrongAnswer1 ?>
                            </label>
                        </div>
                    </div>
                </div>
                <?php
                }
                endforeach; 
                ?>
                <div class="form-group">
                    <div class="col-md-6">
                        <?php echo $this->Html->link('Vissza', array('controller' => 'questions', 'action' => 'user_question_list'), array('class' => 'btn btn-default')); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $this->Html->link('Modositas', array('controller' => 'questions', 'action' => 'question_edit', $visited['Question']['tutorial_id']), array('class' => 'btn btn-warning pull-right')); ?>
                    </div>
                </div>    
            </div>
        </div>
    </form>
</div>