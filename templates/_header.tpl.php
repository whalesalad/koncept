<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Koncept &rsaquo; <?= $this->eprint($this->title); ?></title>
    <link rel="stylesheet" href="/static/style.css" type="text/css">
</head>
<body>
<div id="wrapper">
    <div id="header">
        <h1><a href="/">Koncept</a></h1>
    </div>
    <div id="subheader">
        <h2>
        <?php if (isset($this->project)): ?><a href="/" class="back">Return to Project Listing &rsaquo; </a><?php endif ?>
        <?= $this->eprint($this->title); ?>
        </h2>
    </div>
    
    <div id="content">