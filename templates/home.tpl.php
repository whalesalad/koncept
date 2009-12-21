<?php require('_header.tpl.php'); ?>
    <ul>
        <?php foreach ($this->projects as $project => $value): ?>
            <li>
                <h4><a href="/<?= $this->eprint($value->slug); ?>/"><?= $this->eprint($value->name); ?></a></h4>
                <p><?= $this->eprint($value->description); ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php require('_footer.tpl.php'); ?>