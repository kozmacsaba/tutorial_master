<div class="col-md-9">
    <table id="question_list" class="display" width="100%" >
        <thead>
            <tr>
                <th>Tutorial neve</th>
                <th>Felhasznalo</th>
                <th>E-mail</th>
                <th>Datum</th>
                <th></th>
            </tr>
            <tr>
                <th>Tutorial neve</th>
                <th>Felhasznalo</th>
                <th>E-mail cim</th>
                <th>Datum</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questionList as $list): ?>
            <tr>
                <td><?= $list['Tutorial']['chapters'] ?></td>
                <td><?= $list['User']['username'] ?></td>
                <td><?= $list['User']['email'] ?></td>
                <td><?= $list['Question']['created'] ?></td>
                <td>
                    <?php echo $this->Html->link('Teszt inditasa', array('controller' => 'questions', 'action' => 'question', $list['Question']['tutorial_id']), array('class' => 'btn btn-success button')) ?><br>
                    <?php echo $this->Html->link('E-mail kuldes', array('controller' => 'questions', 'action' => 'email_send', $list['Question']['id']), array('class' => 'btn btn-info')) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>