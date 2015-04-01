<?php

$tutorialChapters = array();

function emptyVal($val){
    return (empty($val)?false:true);
}

foreach ($questions as $question){
    $tutorialChapters[] = $question['Tutorial']['chapters'];
    
}

$tutorialChaptersSelect = array();
foreach ($tutorialChapters as $select){
    
    $tutorialChaptersSelect[] = $select;
    $tutorialChaptersSelect = array_filter($tutorialChaptersSelect, 'emptyVal'); // remove empty values
    $tutorialChaptersSelect = array_unique($tutorialChaptersSelect); // remove duplicates
    $tutorialChaptersSelect = array_values($tutorialChaptersSelect); // reset array keys
}

//var_dump($tutorialChaptersSelect);
?>

<div class="col-md-9">
    <div class="questionx_box">
        <h3>Kerdesek letrehozas</h3>
        <?php echo $this->Form->create('Question', array('class' => 'form-horizontal')) ?>
            <div class="form-group row">
                <label for="Tutorial cime" class="control-label col-md-2">Tutorial cime:</label>
                <div class="col-md-8">
                    <select name="data[Question][tutorial_chapters]" id="QuestionTutorialId" class="form-control chapters">
                        <option value="">-- || --</option>
                        <?php foreach ($tutorialChaptersSelect as $chapters): ?>
                               
                        <option value="<?= $question['Tutorial']['id'] ?>"><?= $chapters ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row type">
                    
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        
        var chapters = '';
        var html = '';
        //var tutorialChapters = '';
        $('.chapters').click(function(){
            chapters = $('#QuestionTutorialId').val();
            var tutorialChapters = <?php echo json_encode($tutorialChaptersSelect) ?>;
            for(var i in tutorialChapters){
                if(chapters == tutorialChapters[i]){
                    
                    html += '<div class="form-group row">'; // form-group row start
                    html += '<label for="All cimek" class="control-label col-md-2">All cimek</label>';
                    html += '<div class="col-md-8">'; //col-md-8 start
                    html += '<select name="data[Question][tutorial_subsection]" id="QuestionTutorialSubsection" class="form-control">'; //select start
                    html += '<option value="">-- || --</option>';
                    html += '</select>' // select end
                    html += '</div>'; // col-md-8 end
                    html += '</div>'; // form-group row end
                    
                    $('.type').before(html);
                }
            }
            
        })
        
    });
</script>

