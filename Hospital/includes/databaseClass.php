<?php
require_once(INCLUDES_DIR.'config.php');

class databaseClass
{
  private $_mysqli;


  public function __construct(string $db_host,string $users,string $password,string $db_name) //create a bnew database
  {
    $this->_mysqli = new mysqli($db_host,$users,$password,$db_name);

  }

  public function getDB()
  {
    return $this->_mysqli;  //get the database
  }
}
