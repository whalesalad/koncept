<?php

/**
* Screenshot
*/
class Screenshot {
    function __construct($screenshot, $slug, $id) {
        $this->id = $id;
        $this->project_slug = $slug;
        $this->name = $screenshot->name;
        $this->description = $screenshot->description;
        $this->img = $screenshot->img;
        $this->relative_url = sprintf("/%s/%s/", $this->project_slug, $this->id);
        $this->image_url = sprintf("/projects/%s/%s", $this->project_slug, $this->img);
    }
}

?>