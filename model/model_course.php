<?php

class model_course
{
    public $name;
    public $description;
    public $enrolled_list = array();//course baru pasti ga punya student

    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }
}
