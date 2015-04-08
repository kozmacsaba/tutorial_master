<div class="col-md-9">
    <table id="user_question_list" class="display" width="100%">
        <thead>
            <tr>
                <th>Tutorial</th>
                <th>Kerdesek</th>
                <th>Tipus</th>
                <th>Datum</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questionsList as $questionList): ?>
            <tr>
                <td><?= $questionList['Tutorial']['chapters'] ?></td>
                <td><?= $questionList['Question']['name'] ?></td>
                <td>
                    <?php
                    if($questionList['Question']['type'] == 1){
                        echo 'A valasz szoveg tipusu';
                    }
                    if($questionList['Question']['type'] == 2){
                        echo 'A valasz radio tipusu';
                    }
                    if($questionList['Question']['type'] == 3){
                        echo 'A valasz checkbox tipusu';
                    }
                    ?>
                </td>
                <td><?= $questionList['Question']['created'] ?></td>
                <td>
                    <?php echo $this->Html->link('Szerkesztesz', array('controller' => '', 'action' => ''), array('class' => 'btn btn-warning button')) ?><br>
                    <?php echo $this->Html->link('Visited', array('controller' => '', 'action' => ''), array('class' => 'btn btn-info')) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <
</div>