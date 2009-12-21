<?php

function get_folder_list($directory) {
    $handle = @opendir($directory) or die("Unable to open projects dir.");

    while ($file = readdir($handle)) {
        if (!strstr($file, ".")) {
            $folders[] = $file;
        }
    }

    closedir($handle);
    
    return $folders;
}

function k_parse_url($dirty_url) {
    $url_array = explode("/", $dirty_url);
    
    foreach ($url_array as $url => $value) {
        if ($value == "") {
            unset($url_array[$url]);
        }
    }
    
    return $url_array;
}

function ppr($obj) {
    echo "<pre>";
    print_r($obj);
    echo "</pre>";
}

?>