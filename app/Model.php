<?php


namespace CMS;

    //Load the Database
abstract class Model {
    
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

 
}