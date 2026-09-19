<?php

class model_course
{
    public $name;
    public $description;
    public $students;

    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }


}
