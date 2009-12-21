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
    $tpl = new Savant3(array("template_path" => TEMPLATE_DIR));
    
    // Do the dirty work
    $projects = get_folder_list(PROJECTS_DIR);
    
    // Assign response vars to the template
    $tpl->title = "Project Listing";
    $tpl->projects = $projects;

    // Display the template
    $tpl->display('/home.tpl.php');
    
}

/*
    Project View
    Display a grid of project screenshots and names
*/
function kview_project($project_slug) {
    // echo "<h1>view project</h1>";
    // echo "<h2>".$project_slug."</h2>";
    $tpl = new Savant3(array("template_path" => TEMPLATE_DIR));
    
    
    // Assign response vars to the template
    $tpl->title = "Arbesko";
    
    // Display the template
    $tpl->display('/project_detail.tpl.php');
    
}

?>