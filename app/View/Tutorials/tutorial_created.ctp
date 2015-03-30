<div class="col-md-9">
    <?php echo $this->Session->flash() ?>
    <div class="created_tutorial_bloks">
        <h2>Tutorial keszites</h2>
        <?php echo $this->Form->create('Tutorial', array('enctype' => 'multipart/form-data')) ?>
            <div class="form-group row">
                <?php echo $this->Form->input('chapters', array(
                                                    'type' => 'text',
                                                    'label' => array('text' => 'Tutorial cime:', 'class' => 'col-md-12', 'for' => 'Tutorial cime'),
                                                    'wrap' => 'col-md-12',
                                                    'div' => false,
                                                    'class' => 'form-control'
                                                )
                                            )    
                ?>
            </div>
            <div class="form-group row">
                <div class="textarea">
                    <?php echo $this->Form->input('descriptions', array(
                                                        'type' => 'textarea',
                                                        'label' => false,
                                                        'div' => false,
                                                        'id' => 'elm1',
                                                        'cols' => '100',
                                                        'wrap' => 'col-md-12'
                                                    )
                                                ) 
                    ?>
                    <!--<textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 100%">

                    </textarea>-->
                </div>
            </div>
            <?php echo $this->Form->input('Save tutorial', array('type' => 'submit', 'label' => false, 'class' => 'btn btn-success')) ?>
        </form>
    </div>
</div>