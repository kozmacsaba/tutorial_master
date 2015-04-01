<div class="col-md-9">
    <table id="tutorial_list" class="display proba" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Tutorial cime</th>
                <th>Alfejezet</th>
                <th>Video</th>
                <th>Powerpoint</th>
                <th>Code zip</th>
                <th>Visited</th>
                <th>Felhasznalo neve</th>
                <th>Email cime</th>
                <th>Datum</th>
                <th></th>
            </tr>
            <tr>
                <th>Tutorial cime</th>
                <th>Alfejezet</th>
                <th>Video</th>
                <th>Powerpoint</th>
                <th>Code zip</th>
                <th>Visited</th>
                <th>Felhasznalo neve</th>
                <th>Email cime</th>
                <th>Datum</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adminTutorialLists as $adminTutorialList): //var_dump($adminTutorialList); ?>
                
                <tr>
                    <td><?= $adminTutorialList['Tutorial']['chapters'] ?></td>
                    <td><?= $adminTutorialList['Tutorial']['subsection'] ?></td>
                    <td></td>
                    <?php foreach ($adminTutorialList['Powerpoint'] as $powerpoint){ 
                                $powerpontName = $powerpoint['powerpoint'];
                          }
                    ?>
                    <td>
                    <?php if(!empty($powerpoint['powerpoint'])){ echo $powerpontName; }else{ echo ''; }?>
                    </td>
                    <td></td>
                    <td>
                    <?php if ($adminTutorialList['Tutorial']['visited'] == 2){ echo 'Nem activ meg a tutorial'; }else{ echo 'Activ mar a tutorial'; } ?>
                    </td>
                    <td><?= $adminTutorialList['User']['username']  ?></td>
                    <td><?= $adminTutorialList['User']['email'] ?></td>
                    <td><?= $adminTutorialList['Tutorial']['created_date'] ?></td>
                    <td>
                        <?php 
                            if($adminTutorialList['Tutorial']['visited'] == 2){ 
                                echo $this->Form->postLink('Success', array('controller' => 'tutorials', 'action' => 'tutorial_active', $adminTutorialList['Tutorial']['id']), array('class' => 'btn btn-success tutorial_button'), __('Aktivalni akarod a kovetkezo tutorial %s', h($adminTutorialList['Tutorial']['chapters'])));
                            }
                            else{
                                echo $this->Form->postLink('Remove tutorial', array('controller' => 'tutorials', 'action' => 'tutorial_remove', $adminTutorialList['Tutorial']['id']), array('class' => 'btn btn-danger tutorial_button'), __('Torolni akarja a kovetkezo tutorialt %s', h($adminTutorialList['Tutorial']['chapters'])));
                            }
                            echo $this->Html->link('E-mail send', array('controller' => '', 'action' => ''), array('class' => 'btn btn-primary tutorial_button'));
                            echo $this->Html->link('Visited', array('controller' => 'tutorials', 'action' => 'visited_tutorial', $adminTutorialList['Tutorial']['id']), array('class' => 'btn btn-warning tutorial_button'));
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><br><br>
    <iframe src="http://docs.google.com/gview?url=http://www.yourwebsite.com/powerpoint.ppt&embedded=true" style="width:600px; height:500px;" frameborder="0"></iframe>
    <br><br><br><br><br><br>
    <iframe src="http://docs.google.com/gview?url=http://localhost/tutorial_master/files//Névtelen1.ppt&embedded=true" style="width:550px; height:450px;" frameborder="0"></iframe>
    
</div>