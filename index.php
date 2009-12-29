<?php

// Define the projects directory
define('KONCEPT_VERSION', 1.1);
define('KONCEPT_PROJECTS', dirname(__FILE__).'/projects');
define('KONCEPT_TEMPLATES', dirname(__FILE__).'/templates');
define('KONCEPT_FUNCS', dirname(__FILE__).'/functions/');
define('KONCEPT_CLASSES', dirname(__FILE__).'/functions/classes/');

// Load various componentries
require_once(KONCEPT_FUNCS.'utils.php');
require_once(KONCEPT_FUNCS.'views.php');

// Load various classes
require_once(KONCEPT_CLASSES.'screenshot.class.php');
require_once(KONCEPT_CLASSES.'project.class.php');

// Create some project objects IM A POET LOLZ
$raw_projects = get_folder_list(KONCEPT_PROJECTS);

$k_projects = array();

foreach ($raw_projects as $project => $value) {
    $k_projects[$value] = new Project($value);
}

// Handle the URL
if ($_GET and $_GET['q']) {
    $url_array = k_parse_url($_GET['q']);
    
    $project_slug = $url_array[1];
    $proj = $k_projects[$project_slug];
    
    if (isset($url_array[2])) {
        // This is a screenshot, bypass all else.
        kview_screenshot($proj, $url_array[2]);
    } else if ($project_slug) {
        // check to see if there's an item, like 'arbesko', and matchit to a project, if so, load up that shit bitch!
        if (in_array($project_slug, $raw_projects)) {
            // Get the project obj and pass it to the view
            kview_project($proj);
        } else {
            kview_404();
        }
    } else {
        kview_404();
    }
    
    
} else {
    kview_homepage();
}

?>