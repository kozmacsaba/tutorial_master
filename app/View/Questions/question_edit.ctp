<div class="col-md-9">
    <?php echo $this->Form->create('Question', array('class' => 'form-horizontal ')) ?>
        <div class="questionx_box">
            <h3>Kerdes szerkesztese</h3>
            <?php foreach ($edits as $edit): ?>
                <div class="form-group row">
                    <?php 
                    echo $this->Form->input('tutorial_id', array(
                                                    'type' => 'text',
                                                    'label' => array('text' => 'Tutorial cime:', 'class' => 'control-label col-md-2', 'for' => 'Tutoral cime'),
                                                    'wrap' => 'col-md-6',
                                                    'div' => false,
                                                    'class' => 'form-control',
                                                    'value' => $edit['Tutorial']['chapters'],
                                                    'disabled' => 'disabled'
                                                )
                                            ); 
                    ?>
                </div>
                <?php if($edit['Question']['type'] == 1): ?>
                <div class="form-group row">
                    <?php
                    echo $this->Form->input('name', array(
                                                    'type' => 'text',
                                                    'label' => array('text' => 'Kerdes:', 'class' => 'col-md-2 control-label', 'for' => 'Kerdes'),
                                                    'wrap' => 'col-md-6',
                                                    'div' => false,
                                                    'class' => 'form-control',
                                                    'value' => $edit['Question']['name']
                                                )
                                            );    
                    ?>
                </div>
                <div class="form-group row">
                    <?php
                    echo $this->Form->input('response', array(
                                                    'type' => 'text',
                                                    'label' => array('text' => 'Helyes valasz:', 'class' => 'col-md-2 control-label', 'for' => 'Helyes valasz'),
                                                    'wrap' => 'col-md-6',
                                                    'div' => false,
                                                    'class' => 'form-control',
                                                    'value' => $edit['Question']['respons']
                                                )
                                            );
                    ?>
                </div>
                <?php 
                endif;
                
                if($edit['Question']['type'] == 2): 
                    $response = $edit['Question']['respons'];
                    $response = json_decode($response);
                    $correctAnswer = !empty($response->helyesvalasz) ? $response->helyesvalasz : "";
                    $wrongAnswer = !empty($response->rosszvalasz) ? $response->rosszvalasz : "";
                    $wrongAnswer1 = !empty($response->rosszvalasz1) ? $response->rosszvalasz1 : "";
                    $wrongAnswer2 = !empty($response->rosszvalasz2) ? $response->rosszvalasz2 : "";
                ?>
                    <div class="form-group row">
                        <?php
                        echo $this->Form->input('name', array(
                                                        'type' => 'text',
                                                        'label' => array('text' => 'Kerdes:', 'class' => 'col-md-2 control-label', 'for' => 'kerdes'),
                                                        'wrap' => 'col-md-6',
                                                        'div' => false,
                                                        'class' => 'form-control',
                                                        'value' => $edit['Question']['name'],
                                                    )
                                                )
                        ?>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Valaszok: </label>
                        <div class="col-md-10">
                            <div class="col-md-3">
                                <div class="radio">
                                    <label class="control-label">
                                        <input type="radio" name="type_radio" disabled="">Helyes valasz:
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <input type="text" value="<?= $correctAnswer ?>" name="correctAnswer" class="form-control input_valaszok">
                            </div>
                            <div class="col-md-3">
                                <div class="radio">
                                    <label class="control-label">
                                        <input type="radio" name="type_radio" disabled="">Rossz valasz:
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-7">
                                    <input type="text" value="<?= $wrongAnswer ?>" name="wrongAnswer" class="form-control input_valaszok">
                            </div>
                            <div class="col-md-3">
                                <div class="radio">
                                    <label class="control-label">
                                        <input type="radio" name="type_radio" disabled="">Rossz valasz:
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <input type="text" value="<?= $wrongAnswer1 ?>" name="wrongAnswer1" class="form-control input_valaszok">
                            </div>
                            <div class="col-md-3">
                                <div class="radio">
                                    <label class="control-label">
                                        <input type="radio" name="type_radio" disabled="">Rossz valasz:
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <input type="text" value="<?= $wrongAnswer2 ?>" name="wrongAnswer2" class="form-control input_valaszok">
                            </div>
                        </div>
                    </div>
                <?php 
                endif;
                
                if($edit['Question']['type'] == 3):
                    $response = $edit['Question']['respons'];
                    $response = json_decode($response);
                    $correctAnswer = !empty($response->helyesvalasz) ? $response->helyesvalasz : "";
                    $wrongAnswer = !empty($response->rosszvalasz) ? $response->rosszvalasz : "";
                    $correctAnswer1 = !empty($response->helyesvalasz1) ? $response->helyesvalasz1 : "";
                    $wrongAnswer1 = !empty($response->rosszvalasz2) ? $response->rosszvalasz2 : "";
                ?>
                <div class="form-group row">
                   <?php 
                   echo $this->Form->input('name', array(
                                                    'type' => 'text',
                                                    'label' => array('text' => 'Kerdes:', 'class' => 'control-label col-md-2', 'for' => 'Kerdes'),
                                                    'wrap' => 'col-md-6',
                                                    'div' => false,
                                                    'class' => 'form-control',
                                                    'value' => $edit['Question']['name']
                                                )
                                            ); 
                   ?> 
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-2">Valaszok:</label>
                    <div class="col-md-10">
                        <div class="col-md-3">
                            <div class="checkbox">
                                <label class="control-label">
                                    <input type="checkbox" name="checkbox_type" disabled="">Helyes valasz:
                                </label>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <input type="text" name="correctAnswer" value="<?= $correctAnswer ?>" class="form-control input_valaszok">
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox">
                                <label class="control-label">
                                    <input type="checkbox" name="checkbox_type" disabled="">Rossz valasz:
                                </label>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <input type="text" value="<?= $wrongAnswer ?>" name="wrongAnswer" class="form-control input_valaszok">
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox">
                                <label class="control-label">
                                    <input type="checkbox" name="checkbox_name" disabled="">Helyes valasz:
                                </label>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <input type="text" value="<?= $correctAnswer1 ?>" name="correctAnswer" class="form-control input_valaszok">
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox">
                                <label class="control-label">
                                    <input type="checkbox" name="checkbox" disabled="">Rossz valasz:
                                </label>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <input type="text" value="<?= $wrongAnswer1 ?>" name="wrongAnswer1" class="form-control">
                        </div>
                    </div>
                </div>
                <?php
                endif;
                echo $this->Form->input ('id', array('type' => 'hidden', 'label' => false, 'div' => false, 'value' => $edit['Question']['id'], 'class' => 'form-control', 'name' => 'questionId'));
           endforeach; ?>
            <div class="form-group">
                <?php echo $this->Form->input('Modositas', array('type' => 'submit', 'label' => false, 'class' => 'btn btn-default', 'div' => false)); ?>
            </div>
        </div>
    </form>
</div>