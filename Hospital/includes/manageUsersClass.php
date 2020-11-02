<?php


class manageUsersClass {


  public function getAllUsers()  //get  All Users from the database
  {

    $conn = new databaseClass(DB_HOST,DB_UNAME,DB_PASS,DB_DBNAME);  //initalize a new database connection store it in conn
    $stmt = "SELECT * FROM users;";
    $result =  mysqli_query($conn->getDB(),$stmt);           //check query
    $resultcheck = mysqli_num_rows($result);  //count the number of rows from result

    if($resultcheck > 0)
    {
      while($row = mysqli_fetch_assoc($result))  //fecth an associative array of the data
      {

        $users[] = $row;  //assign them to array

      }


      return $users;  //return faqs array
    }



  } // end getAll Users


  public function export()  //function used to export the Users to a txt file
  {


    $conn = new databaseClass(DB_HOST,DB_UNAME,DB_PASS,DB_DBNAME);  //initalize a new database connection store it in conn
    $stmt = "SELECT * FROM users;";
    $result =  mysqli_query($conn->getDB(),$stmt);           //check query
    $resultcheck = mysqli_num_rows($result);  //count the number of rows from result

    if($resultcheck > 0)
    {

      $my_file = '../file.txt';
      $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);  //open the file or exit if it cannot open

      while($row = mysqli_fetch_assoc($result))  //fecth an associative array of the data
      {

        if($row['role']=="guest")  // if the role equals to guests
        {
          fwrite($handle,   //open a new file
          "STATUS:GUEST\n".

          "Name:".$row['name']."\n"."ChildName:".$row["child_name"]."\n"."UserName: ".$row['username']."\n"."Role: ".$row['role']."\n".
          "LastLogged In:".$row['last_login']."\n\n");

        }
        else if($row['role']=="admin")  //if the role equals to admin then print
        {
          fwrite($handle,
          "STAFF\n".

          "UserName: ".$row['username']."\n"."Role: ".$row['role']."\n"."LastLogged In:".$row['last_login']."\n\n");


        }

      }


    }
    $_SESSION['message'] = "Success! Exported text File!";  //send message back to dashboard
    $_SESSION['msg_type'] = "success";
    header("Location: ../dashboardUsers?&AddedToTextFile");  //set url location back to the dashbaod

  }



/*IMCOMPLETE USED TO CREATE GUEST PASSWORD AND GUEST NAME */
public function createUser(string $name,string $pwd,string $role)
{

     $guestid= preg_replace('/\s/', '', $name); //donot allow white spaces or characters in usernames
     $password = preg_replace('/\s/', '',$pwd); //donot allow white spaces or characters in passwords
     $userRole = $role;
     $exists = new applicationHelperClass();

     if(strlen($guestid) > 8 or strlen($guestid) < 5 ) // Password and UserName Length
     {
       $_SESSION['message'] = 'Cannot insert username! it must be a minimum of 5 letters and a maximum of 8';
       $_SESSION['msg_type'] = 'danger';
       header('Location: ../dashboardUsers?usernameErrorOccured');
       exit();
     }

     if(strlen($password) > 8 or strlen($guestid) < 5 )
     {
       $_SESSION['message'] = 'Cannot insert password! it must be a minimum of 5 letters and a maximum of 8';
       $_SESSION['msg_type'] = 'danger';
       header('Location: ../dashboardUsers?passwordErrorOccured');
       exit();
     }





     if($exists->loginFound($guestid))
     {
       $_SESSION['message'] = "Cannot use id ".$guestid." it already exists!";  //send message back to dashboard that the username  exits already! nb-(this is used in the dashboard Users page when creating a new username)
       $_SESSION['msg_type'] = "warning"; //set the boostrap button class to success
       header('Location: ../dashboardUsers?&UserExistsAlready');
     }

     else {

     $db = new databaseClass(DB_HOST,DB_UNAME,DB_PASS,DB_DBNAME);
     $conn = $db->getDB();



     if($role == 'guest')
     {


        $response = $conn->query("INSERT INTO users (username,password) VALUES ('$guestid','$password')");  //insert the username and the password for guests
        $_SESSION['message'] = "Guestid: ".$guestid." saved succesfully !";  //send message back to dashboard
        $_SESSION['msg_type'] = "success"; //set the boostrap button class to success

     }
     if($role == 'admin')
    {

      $response = $conn->query("INSERT INTO users (username,password,role) VALUES ('$guestid' ,'$password','$role')");  //insert the username and the password for admins

       $_SESSION['message'] = "Admin: ".$guestid." saved succesfully !";  //send message back to dashboard
       $_SESSION['msg_type'] = "success"; //set the boostrap button class to success
       unset($conn);
    }

     if (!$response) {                          //if there is an error
       die("Couldn't enter data: ".$conn->error);  //output error message
      header("Location: ../dashboardUsers?&AddContentError");   //send the user back to the dashboard to try again

     }
      header("Location: ../dashboardUsers?&AddContentSuccessfully");  //send the user back with success url message

    }

  }
/*IMCOMPLETE USED TO CREATE GUEST PASSWORD AND GUEST NAME */



public function deleteUser($userid)
{
  $id = $userid;
  $db = new databaseClass(DB_HOST,DB_UNAME,DB_PASS,DB_DBNAME);
  $conn = $db->getDB();

  $stmt = $conn->query(" DELETE FROM users WHERE id=$id;");  //send the query to the database

  $_SESSION['message'] = "Record has been deleted successfully !";  //rescord the message into the session varible to be sent back to the dashboard
  $_SESSION['msg_type'] = "danger"; //set the bootsrap button class to danger (red)

  unset($_GET['delete']);  //unset the delete varibale (not necessary)
  unset($conn);
  header("Location: ../dashboardUsers?&DeletedSuccessfully");  //send the success message back to the User
   exit();
}


public function editUser($userid)  //edit the user
{

  $id = $userid;
  $db = new databaseClass(DB_HOST,DB_UNAME,DB_PASS,DB_DBNAME);
  $conn = $db->getDB();
  $stmt = $conn->query( "SELECT * FROM users WHERE id=$id;");   //send query to database ;

  if(mysqli_num_rows($stmt) == 1)  //if a row has been return then ..
  {
       $row = $stmt->fetch_array( );   //fetch the array containing the user to be updated

       return $row;
  }



}

public function updateUser($id,$userN,$userP)
{

    $id=$id;  //set the id to the id passed in
    $username = $userN;  //set the question
    $password = $userP; //set the asnwer

    $db = new databaseClass(DB_HOST,DB_UNAME,DB_PASS,DB_DBNAME);
    $conn = $db->getDB();

    $stmt = $conn->query("UPDATE users SET username='$username', password='$password' WHERE id = '$id'"); //send the update query to the database

    $_SESSION['message'] = "Record has been updated !";  //set the message to be displayed in the html dashboardUsers page.
    $_SESSION['msg_type'] = "warning";  //this sets the boostrap class to display a warning ("browne")

    header("Location: ../dashboardUsers?&UpdatedSuccessfully");  //return the user to the dashboard Users page
     exit();


}

public function getUserWard($name , $username)
{


  $patient= preg_replace('/\s/', '', $name);
  $guestid= preg_replace('/\s/', '', $username);



 if(!($this->findUser($guestid,$patient)))
 {
   $_SESSION['message'] = "The patient was not found. Please go to front desk! ";
   $_SESSION['msg_type'] = "danger";

   header("Location: ../accident&emergency?userNotFound");
   exit();
 }

else {

  $db = new databaseClass(DB_HOST,DB_UNAME,DB_PASS,DB_DBNAME);
  $conn = $db->getDB();
  $stmt = $conn->query("SELECT users.name, users.username,wards.ward FROM users,wards,guestward WHERE users.username=guestward.username AND wards.id = guestward.id AND users.username='$guestid'")or die("error retreiving data");


  if(mysqli_num_rows($stmt) == 1)  //if a row has been return then ..
  {
       $row = $stmt->fetch_array( );   //fetch the array containing the user to be updated

       return $row;
  }

}

}

public function findUser($guestid,$patient)
{

echo "the username in the findUser function is ".$guestid. " and ". "patientname is ".$patient."<br>" ;

  $db = new databaseClass(DB_HOST,DB_UNAME,DB_PASS,DB_DBNAME);
  $conn = $db->getDB();

  $stmt = $conn->query("SELECT * FROM users WHERE username='$guestid' AND name= '$patient'") or die("couldn't find users");

  if(mysqli_num_rows($stmt) == 1)  //if a row has been return then ..
  {
       return true;
  }
  else {
    return false;
  }


}





} //ENDCLASS
