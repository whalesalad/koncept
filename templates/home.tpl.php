<?php require('_header.tpl.php'); ?>
    <ul>
        <?php foreach ($this->projects as $project => $value): ?>
            <li><a href="/<?= $this->eprint($value); ?>/"><?= $this->eprint($value); ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php require('_footer.tpl.php'); ?>