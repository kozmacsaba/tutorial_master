<div class="col-md-9">
    <?php foreach ($tutorialLists as $tutorialList): ?>
        <div class="tutorial_bloks">
            <div class="title">
                <h3><?= $this->Html->link($tutorialList['Tutorial']['chapters'], array('controller' => 'tutorials', 'action' => 'tutorial', $tutorialList['Tutorial']['id'])) ?></h3>
                <span>Keszitett: <?php echo $tutorialList['User']['username'] ?>  | Letrehozva: <?= $tutorialList['Tutorial']['created_date'] ?></span>
                <span class="error col-md-12">A hibat kap a tutorialba akkor <?php echo $this->Html->link('itt', array('controller' => 'contacts', 'action' => 'error_tutorial', $tutorialList['Tutorial']['id'])) ?> jelezheti a felhasznalonak.</span>
            </div>
            <div class="description">
                <?= $tutorialList[0]['descriptions'] ?>.... <?php echo $this->Html->link('Bovebben', array('controller' => 'tutorials', 'action' => 'tutorial', $tutorialList['Tutorial']['id'])) ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>