<?php

class model_student
{
    public $username;
    public $phone;
    public $email;
    public $courses;

    public function __construct($username, $phone, $email)
    {
        $this->username = $username;
        $this->phone = $phone;
        $this->email = $email;
    }

}
