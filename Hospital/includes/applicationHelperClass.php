<?php
require_once('config.php');


class applicationHelperClass
{

  private $user;
  private static $role;
  private static $name;

  public function isUserLoggedIn( ) //function to check if the user is logged in or not
  {
    if(isset($_SESSION['user']) && $_SESSION['role'] != 'deny'){    //if the user iset but the role equals to deny then logg in the user
      return true;
    }
    return false;  //deny user
  }


  public function LoginUser( ): bool
  {


    $username =$_POST['username'];
    $password =$_POST['password'];

    if (empty($username) || empty($password)) {                      //if no username or password send back to signin page
      header("Location: ../signin?error=emptyfields");
      exit();
    }



    else  {

      $conn = new databaseClass(DB_HOST,DB_UNAME,DB_PASS,DB_DBNAME);

      $query ="SELECT * FROM users WHERE username='$username' AND password='$password'";
      $query = mysqli_query($conn->getDB(),$query );
      $resultcheck = mysqli_num_rows($query);

      if($resultcheck > 0)
      {
        $row = $query->fetch_array( );
        $this->user = new userclass();  //create a new user
        $this->user->setUserName($row['username']);  //set the username in the userclass
        $this->user->setPassword($row['password']); //set the password in the userclass
        $this->user->setRole($row['role']);  //set the role in the userclass
        self::$role  = $this->user->getRole(); //store role in the private static variable role
        self::$name  = $this->user->getUserName(); //store username in the private static varibale name
        $_SESSION['role'] = self::$role;

        date_default_timezone_set ('America/Barbados'); //set the time zone to Barbados
        $date = date("Y-m-d H:i:s");  //this is a time stamp of the login time 
        $update = "UPDATE users SET last_login ='$date' WHERE id=$row[id];";  //set the login_login field in the database to the time that user logged in
        $query = mysqli_query($conn->getDB(),$update); //send query

        return true; //return true if user login was successful
      }

      else {
        return false; //else return false
      }
    }
  }


  public function loginFound(string $username)
  {
    $db = new databaseClass(DB_HOST,DB_UNAME,DB_PASS,DB_DBNAME);
    $db_connect = $db->getDB();
    $stmt ="SELECT * FROM users WHERE username='$username'";  //if the username was found already
    $query = mysqli_query($db_connect,$stmt);

    if(mysqli_num_rows($query) == 1){
      return true;  //send the message true if it was found
    }
    else {
      return false; //else return false if it was not found
    }
  }
/*This function was not used */

  public function getUserRole() //get the users role
  {
    return self::$role;  //return the users role
  }

  public function getUsername() //get the usersname
  {
    return self::$name; //return the username
  }



  public function answeredQuestion($name)   //function to find out if user answered additional question
  {
    $user = $name;
    $conn = new databaseClass(DB_HOST,DB_UNAME,DB_PASS,DB_DBNAME);
    $stmt = "SELECT * FROM users WHERE username='$name';";                              //select everything from faqs table
    $result =  mysqli_query($conn->getDB(),$stmt);           //check query


    if($result)
    {

      $resultcheck = mysqli_num_rows($result);  //count the number of rows from result

      if($resultcheck > 0)
      {

      $row = mysqli_fetch_array($result);  //fecth an associative array of the data

       if($row['name'] === NULL){

      return false;
      }
      else {

      return true;
      }

     }


    }

}


}//class
