<?php

include_once 'config.php';

//create class in php OOP
class Database
{
    //properties for class
    public $host = HOST;
    public $user = USER;
    public $password = PASSWORD;
    public $database = DATABASE;
    public $link;
    public $error;

    // constructor function
    public function __construct()
    {
        $this->dbConnect();
    }

    //methods for class
    public function dbConnect()
    {
        $this->link = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if (!$this->link) {
            $this->error = 'Databse Connection Failed';
            return false;
        }
    }

   
}


?>