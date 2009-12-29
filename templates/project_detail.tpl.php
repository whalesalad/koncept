<?php require('_header.tpl.php'); ?>
    <p><?= $this->eprint($this->project->description); ?></p>
    <ul>
        <?php foreach ($this->project->items as $key => $screenshot): ?>
            <li>
                <h4><a href="<?= $screenshot->relative_url; ?>"><?= $screenshot->name; ?></a></h4>
                <p><?= $screenshot->description; ?></p>
            </li>
        <?php endforeach ?>
    </ul>
<?php require('_footer.tpl.php'); ?>