<?php

// Define the projects directory
define('PROJECTS_DIR', dirname(__FILE__).'/projects');
define('TEMPLATE_DIR', dirname(__FILE__).'/templates');

// Load Various Componentries
require_once('utils.php');
require_once('views.php');
// require_once('classes.php');

// Create some project objects IM A POET LOLZ

// Handle the URL
if ($_GET and $_GET['q']) {
    $url_array = k_parse_url($_GET['q']);
} else {
    kview_homepage();
}

?>