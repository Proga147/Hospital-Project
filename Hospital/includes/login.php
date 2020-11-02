<?php
require('config.php');

$login = new applicationHelperClass();  //assign login a new application helper class to handle login details

if(isset($_POST['login_user']))
{


  if($login->LoginUser() == true)  //if the User is found in the database
  {
    session_start();
    $role = $login->getUserRole();
    $username = $login->getUsername();
    $_SESSION['user'] = $_POST['username'];
    $_SESSION['role'] = 'deny';

    if($role == "guest") {

      if($login->answeredQuestion($username) == false) //if the question about Name and child's name wasn't answered already then
      {

        header("Location: ../guestquestion?&loginsuccessfulAnswerSecureQuestion"); //send then to input the name and child's name
         exit();
      }
      elseif($role == "guest" && ($login->answeredQuestion($username) == true))
      {

        if (session_status() == PHP_SESSION_NONE) {     //if a session hasn't been started
          session_start();   //start session
        }
        $_SESSION['user'] = $_POST['username'];    //set the session user name as username
        $_SESSION['role'] = $role;  //set the session role as Userrole
        $name = $_POST['username'];

        header("Location: ../index?&login=login_successful"); //else send them to the login screen
         exit();
      }


    }
      else if ($_SESSION['role'] != "guest") {           //if the user is not a guest
      $_SESSION['role'] = 'deny';        //if the role is not a guest simply deny the user
      header("Location: ../signinGuest?errorGuestPortal");   //if the user if not an guest route back to home
       exit();
    }

  }

  else
  {
    header("Location: ../signinGuest?LogInNotFound"); // if incorrect guest information logged then
     exit();
  }

}   // end loginAdmin Class
