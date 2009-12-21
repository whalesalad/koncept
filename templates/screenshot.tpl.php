<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Koncept &rsaquo; <?= $this->eprint($this->project->name); ?> &rsaquo; <?= $this->eprint($this->screenshot->name); ?></title>
    <link rel="stylesheet" href="/static/screenshot.css" type="text/css">
</head>
<body>
    <div id="header">
        <h2><?= $this->eprint($this->project->name); ?> &rsaquo; <?= $this->eprint($this->screenshot->name); ?></h2>
        <a class="back" href="/<?= $this->eprint($this->project->slug); ?>/">Return to <?= $this->eprint($this->project->name); ?> Project Detail</a>
    </div>
    
    <div id="subheader">
        <p><?= $this->eprint($this->screenshot->description); ?></p>
    </div>
    
    <div id="screenshot">
        <img src="<?= $this->eprint($this->screenshot->image_url); ?>" />
    </div>
</body>