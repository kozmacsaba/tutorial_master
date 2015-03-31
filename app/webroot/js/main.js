$(document).ready(function() {
   
    $('.reset_password').val("");
    
    $('.add-new').click(function(){
       
       $('.tutorial_hidden').removeClass('hidden');
       
       /*var html = '';
       var option = '';
       
       $.ajax({
           url: tutorialChaptersList,
           method: 'get',
           success: function(data) {
                //option += '<option value="'<?php echo $myTutorials['Tutorial']['chapters'] ?>'">PHP egyszerű kereső</option>';
                console.log(data);
           }
       });
       
       
       
       html += '<div class="created_tutorial_bloks">'; //itt kezdodik a tutorial boks
       html += '<h2>Alcim letrehozasa</h2>'; //oldal cime
       html += '<form action="/tutorial_master/tutorials/tutorial_created" role="form" enctype="multipart/form-data" id="TutorialTutorialCreatedForm">'; // itt kezdodik a form felipitese
       html += '<div class="form-group row">'; // form gorup start
       html += '<label class="col-md-12">Valaszal ki egy cimet</label>';
       html += '<div class="col-md-12">'; // col-md-12 strat
       html += '<select name=data[Tutorial][chapters] class="form-control">'; // select start
       html += '<option value="-- || --">-- || --</option>';
       html += '<option value="PHP egyszerű kereső">PHP egyszerű kereső</option>';
       html += '</select>'; // select end
       html += '</div>'; // col-md-12 end
       html += '</div>'; // form group end
       html += '<div class="form-group row">'; //form gorup start
       html += '<label for="Tutorial al cime" class="col-md-12">Tutorial all cime</label>';
       html += '<div class="col-md-12">'; //col-md-12 start
       html += '<input name="data[Tutorial][descriptions]" class="form-control" type="text" id="TutorialDescriptions">';
       html += '</div>'; //col-md-12 end
       html += '</div>'; //form-group end
       html += '<div class="form-group row">'; //form group start
       html += '<div class="textarea">'; // textarea start
       html += '<div class="col-md-12">'; // col-md-12 start
       html += '<textarea name="data[Tutorial][descriptions]" id="elm2" cols="100" rows="6">';
       html += '</textarea>';
       html += '</div>'; // col-md-12 end
       html += '</div>'; // textarea end
       html += '</div>'; // form group end
       html += '</form>'; // form end
       html += '</div>'; // tutorial boks end
       
       $('.erderkes').before(html);*/
       
   });
   
   $('.add_hidden').click(function(){
      $('.tutorial_hidden').addClass('hidden'); 
   });
    
});