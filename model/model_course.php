<?php

class model_course
{
    public $name;
    public $description;
    public $enrolled_list = array();

    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }
}
