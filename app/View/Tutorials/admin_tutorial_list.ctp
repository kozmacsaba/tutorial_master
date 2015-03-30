<div class="col-md-9">
    <table id="tutorial_list" lass="display" width="100%">
        <thead>
            <tr>
                <th>Tutorial cime</th>
                <th>Alfejezet</th>
                <th>Visited</th>
                <th>Felhasznalo neve</th>
                <th>Email cime</th>
                <th>Datum</th>
                <th></th>
            </tr>
            <tr>
                <th>Tutorial cime</th>
                <th>Alfejezet</th>
                <th>Visited</th>
                <th>Felhasznalo neve</th>
                <th>Email cime</th>
                <th>Datum</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adminTutorialLists as $adminTutorialList): ?>
                <tr>
                    <td><?= $adminTutorialList['Tutorial']['chapters'] ?></td>
                    <td><?= $adminTutorialList['Tutorial']['subsection'] ?></td>
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
</div>