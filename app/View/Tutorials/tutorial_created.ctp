<?php
    
    foreach ($tutorialChapters as $chapters){
        
        $tutorialId[] = array(
        'id' => $chapters['Tutorial']['id'],
        'chapters' => $chapters['Tutorial']['chapters']
    );
     
}

?> 
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
                </div>
            </div>
            <?php echo $this->Form->input('Save tutorial', array('type' => 'submit', 'label' => false, 'class' => 'btn btn-success')) ?>
        </form>
    </div>
    <div class="created_tutorial_bloks hidden tutorial_hidden">
        <h2>Alcim letrehozasa</h2>
        <?php echo $this->Form->create('Tutorial', array('enctype' => 'multipart/form-data')) ?>
            <div class="form-group row">
                <label class="col-md-12" for="Valaszal cimet">Valaszal tutorial cimet</label>
                <div class="col-md-12">
                    <select name="data[Tutorial][chapters_id]" id="tutorialChapters" class="form-control">
                        <option value="-- || --">-- || --</option>
                        <?php foreach ($tutorialChapters as $chapters): ?>
                        <option value="<?= $chapters['Tutorial']['id'] ?>"><?= $chapters['Tutorial']['chapters'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>    
            </div>
            <div class="form-group row">
                <?php echo $this->Form->input('subsection', array(
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
                                                        'id' => 'elm2',
                                                        'cols' => '100',
                                                        'wrap' => 'col-md-12'
                                                    )
                                                ) 
                    ?>
                </div>
            </div>
            <?php echo $this->Form->input('Save tutorial', array('type' => 'submit', 'label' => false, 'class' => 'btn btn-success add_hidden')) ?>
        </form>
    </div>
    <div class="btn btn-success add-new erderkes">
        Alcimek letrehozasa a tutorialokhoz
    </div>
</div>