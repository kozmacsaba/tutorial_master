<div class="col-md-9">
    <?php foreach ($visitedTutorial as $tutorialVisited): ?>
        <div class="tutorial_bloks">
            <div class="title">
                <h3><?= $tutorialVisited['Tutorial']['chapters'] ?></h3>
                <span>Keszitett: <?php echo $tutorialVisited['User']['username'] ?>  | Letrehozva: <?= $tutorialVisited['Tutorial']['created_date'] ?> | E-mail kuldes: <?php echo $this->Html->link($tutorialVisited['User']['email'], array('controller' => 'contacts', 'action' => 'tutoria_email_send', $tutorialVisited['User']['id'])) ?></span>
            </div>
            <div class="description">
                <?= $tutorialVisited['Tutorial']['descriptions'] ?>
            </div>
        </div>
    <?php endforeach; ?>
    <?php echo $this->Html->link('Vissza', array('controller' => 'tutorials', 'action' => 'admin_tutorial_list'), array('class' => 'btn btn-default tutorial_back_button')) ?>
</div>