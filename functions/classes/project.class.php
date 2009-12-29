<?php

/**
* Project
*/
class Project {
    function __construct($slug) {
        $this->slug = $slug;
        
        // Define the directory path for the base of the project, so other requests can be made
        $this->dir_path = KONCEPT_PROJECTS.'/'.$this->slug;
        $this->url_path = '/projects/'.'/'.$this->slug.'/';

        $manifest = $this->get_manifest();
        
        $this->name = $manifest->name;
        $this->description = $manifest->description;
        
        if ($manifest->items)
            $this->parse_items($manifest->items);
            
        if ($manifest->style) {
            // A custom stylesheet exists
            $this->custom_stylesheet = $this->construct_stylesheet_path($manifest->style);
        } else {
            $this->custom_stylesheet = false;
        }
        
    }
    
    function get_manifest() {
        // open the folder and get the arbesko.json file
        $manifest_file = fopen($this->dir_path.'/manifest.json', 'r');
        $manifest_read = fread($manifest_file, filesize(KONCEPT_PROJECTS.'/'.$this->slug.'/manifest.json'));
        $manifest_obj = json_decode($manifest_read);
        return $manifest_obj;
    }
    
    function construct_stylesheet_path($stylesheet) {
        return $this->url_path.$stylesheet;
    }
    
    function parse_items($items) {
        // Take Screenshot items (as $items) and create Screenshot objects into $this->items
        $this->items = array();
        foreach ($items as $item => $value) {
            $id = count($this->items);
            $this->items[$id] = new Screenshot($value, $this->slug, count($this->items));
        }
        
    }
}

?>