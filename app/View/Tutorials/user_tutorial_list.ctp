<div class="col-md-9">
    <table id="my_tutorial_list" lass="display" width="100%">
        <thead>
            <tr>
                <th>Cime</th>
                <th>Leiras</th>
                <th>Active</th>
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
                <td><?= $myTutorial['Tutorial']['created_date'] ?></td>
                <td><?php echo $this->Html->link('Modositas', array('controller' => 'tutorial', 'action' => 'tutorial_edit', $myTutorial['Tutorial']['id']), array('class' => 'btn btn-warning')) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>