<?php

/**
* Project
*/
class Project {
    function __construct($slug) {
        $this->slug = $slug;
        
        $manifest = $this->get_manifest();
        
        $this->name = $manifest->name;
        $this->description = $manifest->description;
        
        if ($manifest->items)
            $this->parse_items($manifest->items);
        
    }
    
    function get_manifest() {
        // open the folder and get the arbesko.json file
        $manifest_file = fopen(KONCEPT_PROJECTS.'/'.$this->slug.'/manifest.json', 'r');
        $manifest_read = fread($manifest_file, filesize(KONCEPT_PROJECTS.'/'.$this->slug.'/manifest.json'));
        $manifest_obj = json_decode($manifest_read);
        return $manifest_obj;
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