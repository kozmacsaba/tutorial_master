<div class="col-md-9">
    <?php foreach ($tutorialLists as $tutorialList): ?>
        <div class="tutorial_bloks">
            <div class="title">
                <h3><?= $tutorialList['Tutorial']['chapters'] ?></h3>
                <span>Keszitett: <?php echo $tutorialList['User']['username'] ?>  | Letrehozva: <?= $tutorialList['Tutorial']['created_date'] ?></span>
            </div>
            <div class="description">
                <?= $tutorialList['Tutorial']['descriptions'] ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>