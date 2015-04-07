<?php 


foreach ($questions as $questionId){
    $tutorialId[] = array(
        'chapters_id' => $questionId['Tutorial']['chapters_id'],
        'subsection' => $questionId['Tutorial']['subsection']
    );
}

?>
<div class="col-md-9">
    <?php //echo $this->Session->flash(); ?>
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
            <div class="form-group row valasz">
                <?php 
                    echo $this->Form->input('name', array(
                                                    'type' => 'text',
                                                    'label' => array('text' => 'Kerdes:', 'class' => 'control-label col-md-2', 'for' => 'kerdes'),
                                                    'wrap' => 'col-md-6',
                                                    'div' => false,
                                                    'class' => 'form-control',
                                                    'after' => '<div class="btn btn-success add_question">Uj kerdes letrehozasa</div>'
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
            <?php echo $this->Form->input('Kerdesek mentese', array('type' => 'submit', 'label' => false, 'class' => 'btn btn-default')) ?>
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
            html += '<div class="col-md-9">'; // col-md-6 strat
            html += '<select name="data[Quention][tutorial_subsection]" id="QuestionTutorialSubsection" class="form-control">'; // select start
            html += '<option value="">-- || --</option>';
            html += '<option value="' + tutorial[chapters].subsection + '">' + tutorial[chapters].subsection + '</option>';
            html += '</select>'; // select end;
            html += '</div>'; // col-md-6 end;
            html += '</div>'; // form-group row end
                    
            $('.type').before(html);
                
            
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
                html += '<div class="form-group row type_text">';
                html += '<label for="Helyes valasz:" class="control-label col-md-2">Valasz:</label>';
                html += '<div class="col-md-9">';
                html += '<input type="text" name="data[Question][respons]" class="form-control">';
                html += '</div>';
                html += '</div>';
                
                $('.valasz').after(html);
            }
            
            if(2 == $(this).val()){
                html += '<div class="form-group row type_radio">'; // form-group row start
                html += '<label class="control-label col-md-2">Valaszok:</label>';
                html += '<div class="col-md-10">'; // col-md-10 start
                html += '<div class="col-md-3 helyes_valaszok">'; // col-md-5 strat
                html += '<div class="radio">'; // radio start
                html += '<label class="control-label">';
                html += '<input type="radio" name="helyesvalasz" id="helyesValasz" disabled>';
                html += 'Helyes valasz:';
                html += '</label>';
                html += '</div>'; // radio end
                html += '</div>'; // col-md-5 end
                html += '<div class="col-md-8 helyes_valaszok">'; // col-md-8 helyes_valaszok strat
                html += '<input type="text" name="helyesValaszokRadio" id="helyesValaszokRadio" class="form-control input_valaszok helyesValaszokRadio">';
                html += '</div>' // col-md-8 end
                
                html += '<div class="col-md-3 helyes_valaszok">'; // col-md-3 helyes_valaszok start
                html += '<div class="radio">'; // radio start
                html += '<label class="control-label">'; // control-label start
                html += '<input type="radio" name="roszvalasz" id="roszvalasz" disabled>';
                html += 'Rossz valasz:';
                html += '</label>';
                html += '</div>'; // radio end
                html += '</div>'; // col-md-3 helyes_valaszok end
                html += '<div class="col-md-8 helyes_valaszok">'; // col-md-8 helyes_valaszok start
                html += '<input type="text" name="rosszValaszokRadio" id="rosszValaszokRadio" class="form-control input_valaszok ">';
                html += '</div>'; // col-md-8 helyes valaszok end
                
                html += '<div class="col-md-3 helyes_valaszok">'; // col-md-3 helyes_valaszok strat
                html += '<div class="radio">'; // radio start
                html += '<label class="control-label">'; // control-label start
                html += '<input type="radio" name="roszvalasz" id="roszvalasz_1" disabled>';
                html += 'Rossz valasz:';
                html += '</label>'; // control-label end
                html += '</div>'; // radio end
                html += '</div>'; // col-md-3 helyes_valasz end
                html += '<div class="col-md-8 helyes_valaszok">'; // col-md-8 helyes_valaszok start
                html += '<input type="text" name="rosszValaszokRadio1" class="form-control input_valaszok">';
                html += '</div>'; // col-md-8 helyes_valaszok end
                
                html += '<div class="col-md-3 helyes_valaszok">'; // col-md-3 helyes_valaszok  start
                html += '<div class="radio">'; // radio start
                html += '<label class="control-label">'; // control-label start
                html += '<input type="radio" name="roszvalasz" id="roszvalasz_2" disabled>';
                html += 'Rossz valasz:'
                html += '</label>'; // control-label end
                html += '</div>'; // radio end
                html += '</div>'; // col-md-3 helyes_valaszok end
                html += '<div class="col-md-8 helyes_valaszok">'; // col-md-8 helyes_valaszok start
                html += '<input type="text" name="rosszValaszokRadio2" class="form-control input_valaszok">';
                html += '</div>'; // col-md-8 helyes_valaszok end
                
                html += '</div>'; // form-group row end
                $('.valasz').after(html);
            }
            
            if (3 == $(this).val()){
                html += '<div class="form-group row type_checkbox">'; // form-group row end
                html += '<label class="control-label col-md-2">Valaszok:</label>';
                html += '<div class="col-md-10">'; // col-md-10 start
                html += '<div class="col-md-3 helyes_valaszok">'; // col-md-3 helyes_valaszok start
                html += '<div class="checkbox">'; // checkbox
                html += '<label class="control-label">'; // control-label start
                html += '<input type="checkbox" name="helyesValaszokCheckbox" id="helyesvalaszok" disabled>';
                html += 'Helyes valasz:'
                html += '</label>'; // control-label end
                html += '</div>'; // checkbox end
                html += '</div>'; // col-md-3 helyes_valaszok end
                html += '<div class="col-md-8 helyes_valaszok">'; // col-md-8 helyes_valaszok
                html += '<input type="text" name="helyesValaszokCheckbox" class="form-control input_valaszok">'
                html += '</div>'; // col-md-8 helyes_valaszok end
                
                html += '<div class="col-md-3 helyes_valaszok">'; // col-md-3 helyes_valaszok start
                html += '<div class="checkbox">'; // checkbox
                html += '<label class="control-label">'; // control-label
                html += '<input type="checkbox" name="rosszvalszok" id="helyesvalaszok" disabled>';
                html += 'Rossz valasz:'
                html += '</label>'; // control-label end
                html += '</div>'; // checkbox end
                html += '</div>'; // col-md-3 helyes_valaszok end
                html += '<div class="col-md-8 helyes_valaszok">'; // col-md-8 helyes_valaszok start
                html += '<input type="text" name="rosszValaszokCheckbox" id="rosszValaszok" class="form-control input_valaszok">'
                html += '</div>'; // col-md-8 helyes_valaszok end
                
                html += '<div class="col-md-3 helyes_valaszok">'; // col-md-3 helyes_valaszok
                html += '<div class="checkbox">'; // checkbox start
                html += '<label class="control-label">'; // control-label start
                html += '<input type="checkbox" name="helyesvalaszok" id="helyesvalaszok disabled">';
                html += 'Helyes valasz:'
                html += '</label>'; // control-label end
                html += '</div>'; // checkbox end
                html += '</div>'; // col-md-3 helyes_valaszok end
                html += '<div class="col-md-8 helyes_valaszok">'; // col-md-8 helyes_valaszok start
                html += '<input type="text" name="helyesValaszokCheckbox1" id="helyesValaszok" class="form-control input_valaszok">';
                html += '</div>'; // col-md-8 helyes_valaszok start
                
                html += '<div class="col-md-3 helyes_valaszok">'; // col-md-3 helyes_valaszok
                html += '<div class="checkbox">'; // checkbox strat
                html += '<label class="control-label">'; // control-label start
                html += '<input type="checkbox" name="rosszvalaoszk" id="rosszvalaszok" disabled>';
                html += 'Rossz valasz'
                html += '</label>'; // control-label end
                html += '</div>'; // checkbox end
                html += '</div>'; // col-md-3 helyes_valaszok end
                html += '<div class="col-md-8 helyes_valaszok">'; // col-md-8 helyes_valaszok start
                html += '<input type="text" name="rosszValaszokCheckbox1" id="rosszValaszok2" class="form-control input_valaszok">';
                html += '</div>'; // col-md-8 helyes_valaszok end
                
                html += '</div>'; // col-md-10 end
                html += '</div>'; // form-group row end
                $('.valasz').after(html);
            }
          
        });
        
        $('#QuestionType1').click(function(){
            $('.type_radio').remove();
            $('.type_checkbox').remove();
        });
        
        $("#QuestionType2").click(function(){
            $('.type_text').remove();
            $('.type_checkbox').remove();
        });
        
        $('#QuestionType3').click(function(){
           $('.type_text').remove();
           $('.type_radio').remove();
        });
       
       
       /******* 
         * 
         * A kerdesre adot valasz tipusok vege 
         * 
        *******/
        
        /*******
        * 
        * Uj kerdesek letrehozas
        * 
        ********/
        var j = 0
        $('.add_question').click(function(){
            
            j = j + 1;
            
            html += '<div class="form-group kerdes_' + j +'" >'; // form-group valasz start
            html += '<label for="Kerdes:" class="control-label col-md-2">Kerdes:</label>';
            html += '<div class="col-md-6">'; // col-md-6 start
            html += '<input name="data[Question][name]" class="form-control" type="text" id="QuestionName">'
            html += '</div>'; // col-md-6 end
            html += '</div>'; // form-group valasz end
            
            $('.type_text').after(html);
        });
        
        /*******
        * 
        * Uj kerdesek letrehozas vege
        * 
        ********/
        
    });
</script>