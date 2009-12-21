<?php require('_header.tpl.php'); ?>
    <p><?= $this->eprint($this->project->description); ?></p>
    <ul>
        <?php foreach ($this->project->items as $key => $screenshot): ?>
            <li>
                <h4><a href="<?= $this->eprint($screenshot->relative_url); ?>"><?= $this->eprint($screenshot->name); ?></a></h4>
                <p><?= $this->eprint($screenshot->description); ?></p>
            </li>
        <?php endforeach ?>
    </ul>
<?php require('_footer.tpl.php'); ?>