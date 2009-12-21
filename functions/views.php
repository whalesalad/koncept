<?php
////////////////////////////////////////
// Various Views
////////////////////////////////////////

require_once('Savant3.php');

/*
    Homepage View
    Display list of projects
*/
function kview_homepage() {
    global $k_projects;
    $tpl = new Savant3(array("template_path" => KONCEPT_TEMPLATES));
    
    // Assign response vars to the template
    $tpl->title = "Project Listing";
    $tpl->projects = $k_projects;

    // Display the template
    $tpl->display('home.tpl.php');
    
}

/*
    Project View
    Display a grid of project screenshots and names
*/
function kview_project($project) {
    $tpl = new Savant3(array("template_path" => KONCEPT_TEMPLATES));
    
    // Assign response vars to the template
    $tpl->title = $project->name;
    $tpl->project = $project;
    
    // Display the template
    $tpl->display('project_detail.tpl.php');
}

/*
    Screenshot View
    Simple ghetto view to display the screenshot of a project
*/
function kview_screenshot($project, $screenshot_id) {
    $tpl = new Savant3(array("template_path" => KONCEPT_TEMPLATES));
    
    $screenshot = $project->items[$screenshot_id];
    if (!$screenshot) {
        return kview_404();
    }
    
    // Assign response vars to the template
    $tpl->title = $screenshot->name;
    $tpl->project = $project;
    $tpl->screenshot = $screenshot;
    
    // Display the template
    $tpl->display('screenshot.tpl.php');
}

/*
    404 View
    Simple 404 for when there's nothing to display :D
*/
function kview_404() {
    $tpl = new Savant3(array("template_path" => KONCEPT_TEMPLATES));
    
    $tpl->title = "Error 404";
    
    $tpl->display('404.tpl.php');
}

?>