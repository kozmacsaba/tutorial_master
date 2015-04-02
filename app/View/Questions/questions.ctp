<?php 


foreach ($questions as $questionId){
    $tutorialId[] = array(
        'chapters_id' => $questionId['Tutorial']['chapters_id'],
        'subsection' => $questionId['Tutorial']['subsection']
    );
}

?>
<div class="col-md-9">
    <div class="questionx_box">
        <h3>Kerdesek letrehozas</h3>
        <?php echo $this->Form->create('Question', array('class' => 'form-horizontal')) ?>
            <div class="form-group row">
                <label for="Tutorial cime" class="control-label col-md-2">Tutorial cime:</label>
                <div class="col-md-6">
                    <select name="data[Question][tutorial_chapters]" id="QuestionTutorialId" class="form-control chapters">
                        <option value="">-- || --</option>
                        <?php 
                        foreach ($questions as $question):
                            if(!empty($question['Tutorial']['chapters'])){ 
                        ?>
                        <option value="<?= $question['Tutorial']['id'] ?>"><?= $question['Tutorial']['chapters'] ?></option>
                        <?php 
                            }  
                        endforeach; 
                        ?>
                    </select>
                </div>
                <div class="btn btn-success add_subsection">
                    All cimhez kerdesek letre hozassa
                </div>
            </div>
            <div class="type"></div>
            <div class="form-group row valasz">
                <?php 
                    echo $this->Form->input('name', array(
                                                    'type' => 'text',
                                                    'label' => array('text' => 'Kerdes:', 'class' => 'control-label col-md-2', 'for' => 'kerdes'),
                                                    'wrap' => 'col-md-6',
                                                    'div' => false,
                                                    'class' => 'form-control'
                                                )
                                            ) 
                ?>
            </div>
            <div class="form-group row">
                <?php 
                    $typeText = 'Text tipus'; 
                    $typeRadio = 'Radio tipus'; 
                    $typeCheckbox = 'Checkbox tipus';
                    
                    echo $this->Form->input('type', array(
                                                    'type' => 'radio',
                                                    'label' => array('text' => 'Valasz tipus:', 'class' => 'control-label col-md-2', 'for' => 'Valasz tipusa'),
                                                    'wrap' => 'col-md-6',
                                                    'div' => false,
                                                    'class' => array(1 => 'radio col-md-3', 2 => 'radio col-md-3', 3 => 'radio col-md-3'),
                                                    'options' => array(1 => $typeText, 2 => $typeRadio, 3 => $typeCheckbox),
                                                )
                                            )
                ?>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        
       /******* 
         * 
         * all cimek letrehozasa kezdete 
         * 
        *******/ 
       
        var html = '';
        var tutorial = JSON.parse( '<?php echo json_encode($tutorialId); ?>' );
       
        $('.add_subsection').click(function(){
            var chapters = $('#QuestionTutorialId').val();
            for (var obj in tutorial){
                obj = chapters;
                console.log(tutorial[obj]);
            }
            html += '<div class="form-group row">'; //form-group row start
            html += '<label for="All cime" class="control-label col-md-2">All cimek</label>';
            html += '<div class="col-md-6">'; // col-md-6 strat
            html += '<select name="data[Quention][tutorial_subsection]" id="QuestionTutorialSubsection" class="form-control">'; // select start
            html += '<option value="">-- || --</option>';
            html += '<option value="' + tutorial[chapters].subsection + '">' + tutorial[chapters].subsection + '</option>';
            html += '</select>'; // select end;
            html += '</div>'; // col-md-6 end;
            html += '</div>'; // form-group row end
                    
            //$('.type').before(html);
                
            
        });
        
        /******* 
         * 
         * all cimek letrehozasa vege 
         * 
        *******/
       
       /******* 
         * 
         * A kerdesre adot valasz tipusok kezdete 
         * 
        *******/
       
        $('#QuestionType1, #QuestionType2, #QuestionType3').click(function(){
            if (1 == $(this).val()){
                html += '<div class="form-group row">';
                html += '<label for="Helyes valasz:" class="control-label col-md-2">Valasz:</label>';
                html += '<div class="col-md-6">';
                html += '<input type="text" class="form-control">';
                html += '</div>';
                html += '</div>';

                $('.valasz').after(html);
            }
            
            if(2 == $(this).val()){
                html += '<div class="form-group row">'; // form-group row start
                html += '<label class="control-label col-md-2">Valaszok:</label>';
                html += '<div class="col-md-10">'; // col-md-10 start
                html += '<div class="col-md-3 helyes_valaszok">'; // col-md-5 strat
                html += '<div class="radio">'; // radio start
                html += '<label class="control-label">'
                html += '<input type="radio" name="helyesvalasz" id="valaszok">';
                html += 'Helyes valasz:'
                html += '</label>'
                html += '</div>'; // radio end
                html += '</div>'; // col-md-5 end
                html += '<div class="col-md-4 helyes_valaszok">'; // col-md-5 strat
                html += '<input type="text" class="form-control">';
                html += '</div>' // col-md-5 end
                html += '</div>'; // col-md-10 end
                html += '</div>'; // form-group row end
                
                $('.valasz').after(html);
            }
          
        });
       
       
       /******* 
         * 
         * A kerdesre adot valasz tipusok vege 
         * 
        *******/
         
        
    });
</script>

