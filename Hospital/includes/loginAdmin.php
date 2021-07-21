<?php
require('config.php');

$login = new applicationHelperClass();  //assign login a new application helper class to handle login details

if(isset($_POST['login_user']))
{
 if($login->LoginUser() == true)  //if the User is found in the database
 {
   if (session_status() == PHP_SESSION_NONE) {     //if a session hasn't been started
       session_start();   //start session
   }
     $_SESSION['user'] = $_POST['username'];    //set the session user name as username
     $_SESSION['role'] = $login->getUserRole();  //set the session role as Userrole

     if($_SESSION['role'] == "admin") {
     header("Location: ../index?&login=login_successful");   //if admin alloww entry
     exit();
                    }

         else if ($_SESSION['role'] != "admin") {           //if the user is not an administrator
              $_SESSION['role'] = 'deny';      //if the role is not an admin simply deny the user
            header("Location: ../signin?errorNoAdminRoleFound");   //if the user if not an admin route back to home
             exit();
           }
       }

else
{

   header("Location: ../signin?CantLogInUser");
    exit();
}

}   // end loginAdmin Class
