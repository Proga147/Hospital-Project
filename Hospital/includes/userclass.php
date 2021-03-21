<?php

Class UserClass
{
  private $validator;
  private $firstname;
  private $_username= ' ';
  private $_password=' ';
  private $_role = ' ';
  private $error_messages= '';
  private $result_message=' ';// stores error $messages
  public  $error_response;
  public  $data = array();

//setters //
public function setUserName(string $username)
{
    $this->_username=$username;
}
public function setPassword(string $password)
{
  $this->_password = $password;
}
public function setRole(string $role)
{
  $this->_role = $role;
}

public function setFirstname(string $name)
{
  $this->firstname = $name;
}
//setters//


//getters//
public function getUserName()
{
return $this->_username;
}
public function getPassword()
{
return $this->_password;
}
public function getRole()
{
  return $this->_role;
}

public function getFirstname()
{
  return $this->firstname;
}
//getters//

} //endclass
