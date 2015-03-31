<div class="col-md-9">
    <div class="created_tutorial_bloks">
        <h2><?= $editTutorial['Tutorial']['chapters'] ?></h2>
        <?php echo $this->Form->create('Tutorial', array('enctype' => 'multipart/form-data')) ?>
            <div class="form-group row">
                <?php echo $this->Form->input('chapters', array(
                                                    'type' => 'text',
                                                    'label' => array('text' => 'Tutorial cime', 'class' => 'col-md-12', 'for' => 'Tutorial cime'),
                                                    'wrap' => 'col-md-12',
                                                    'div' => false,
                                                    'class' => 'form-control',
                                                    //'value' => $editTutorial['Tutorial']['chapters']
                                                )
                                            ) 
                ?>
            </div>
            <div class="form-group row">
                <div class="textarea">
                    <?php echo $this->Form->input('descriptions', array(
                                                        'type' => 'textarea',
                                                        'label' => false,
                                                        'wrap' => 'col-md-12',
                                                        'div' => false,
                                                        'id' => 'elm1',
                                                        'cols' => '100',
                                                        //'value' => $editTutorial['Tutorial']['descriptions']
                                                    )
                                                ) 
                    ?>
                </div>    
            </div>
            <div class="submit_bg">
                <?php echo $this->Form->input('Edit Tutoriral', array('type' => 'submit', 'label' => false, 'class' => 'btn btn-default', 'div' => false)) ?>
                <?php echo $this->Html->link('Vissza', array('controller' => 'tutorials', 'action' => 'user_tutorial_list'), array('class' => 'btn btn-info pull-right backe_button')) ?>
            </div>        
        </form>
    </div>
</div>