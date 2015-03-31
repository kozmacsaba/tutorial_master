<div class="col-md-9">
    <?php echo $this->Session->flash() ?>
    <table id="my_tutorial_list" lass="display" width="100%">
        <thead>
            <tr>
                <th>Cime</th>
                <th>Alcimek</th>
                <th></th>
                <th>Active</th>
                <th>Deleted</th>
                <th>Datum</th>
                <th></th>
            </tr>
            <tr>
                <th>Cime</th>
                <th>Alcimek</th>
                <th>Leiras</th>
                <th>Active</th>
                <th>Deleted</th>
                <th>Datum</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($myTutorials as $myTutorial): ?>
            <tr>
                <td><?= $myTutorial['Tutorial']['chapters'] ?></td>
                <td><?= $myTutorial['Tutorial']['subsection'] ?></td>
                <td><?= $myTutorial[0]['descriptions']?></td>
                <td><?php if($myTutorial['Tutorial']['visited'] == 1){ echo 'Active'; }else{ echo 'Nem activ';} ?></td>
                <td><?php if($myTutorial['Tutorial']['delete'] == 1 ){ echo "Nincs Torolve"; }else{ echo "Torolve van"; } ?></td>
                <td><?= $myTutorial['Tutorial']['created_date'] ?></td>
                <td>
                    <?php echo $this->Html->link('Modositas', array('controller' => 'tutorials', 'action' => 'tutorial_edit', $myTutorial['Tutorial']['id']), array('class' => 'btn btn-warning')) ?><br><br>
                    <?php if($myTutorial['Tutorial']['delete'] == 1 ){
                        echo $this->Form->postLink('Deleted tutorial', array('controller' => 'tutorials', 'action' => 'user_tutorial_delet', $myTutorial['Tutorial']['id']), array('class' => 'btn btn-danger tutorial_button'), __('Torolni akarja a kovetkezo tutorialt %s', h($myTutorial['Tutorial']['chapters'])));
                    } 
                    else{
                        echo $this->Form->postLink('Success', array('controller' => 'tutorials', 'action' => 'user_tutorial_not_deleted', $myTutorial['Tutorial']['id']), array('class' => 'btn btn-success'), __('Ujra activalod a tutorialt %s', h($myTutorial['Tutorial']['chapters'])));
                    }
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>