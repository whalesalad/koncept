<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Koncept &rsaquo; <?= $this->eprint($this->project->name); ?> &rsaquo; <?= $this->eprint($this->screenshot->name); ?></title>
    <link rel="stylesheet" href="/static/screenshot.css" type="text/css">
    <?php if ($this->stylesheet and !$this->screenshot->no_css): ?>
        <link rel="stylesheet" href="<?= $this->eprint($this->stylesheet); ?>" type="text/css">
    <?php endif ?>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        var Koncept = {
            sensitivity_zone: 150, // the height in pixels of the sensitivity zone
            init: function() {
                var self = this;
                
                self.ub = $('#upperBar');
                    
                $(document).bind('mousemove', function(e) {
                    self.mouseMoved(e.clientY);
                });
            },
            
            mouseMoved: function(y) {
                var self = this;
                // take the y value, if it's less than... X pixels
                if (y < self.sensitivity_zone) {
                    // We're inside the sensitivity zone,
                    self.ub.slideDown('fast');
                } else {
                    self.ub.slideUp('fast');
                };
            }
        };
        
        $(document).ready(function() {
            Koncept.init();
        })
    </script>
</head>
<body>
    <div id="upperBar">
        <div class="inner">
            <div class="heading">
                <h2><span><?= $this->project->name; ?> &rsaquo; </span><?= $this->screenshot->name; ?></h2>
                <span class="link"><a class="back" href="/<?= $this->eprint($this->project->slug); ?>/">Return to Project Detail &rsaquo;</a></span>
                <div class="clear"></div>
            </div>
            <div class="description">
                <p><?= $this->screenshot->description; ?></p>
            </div>
        </div>
    </div>
    
    <div id="screenshot">
        <div class="inner">
            <img src="<?= $this->eprint($this->screenshot->image_url); ?>" />
        </div>
    </div>
</body>