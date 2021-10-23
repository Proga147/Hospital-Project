<?php
require_once("config.php");

// process.php to handle CRUD of frequently asked questions  - CREATE , READ-(IN getfaqs function - in getfaqs.php) , UPDATE  , DELETE

  $output = new manageUsersClass(); //create a new manageUsersClass

if (session_status() == PHP_SESSION_NONE) {   //if no session has been started start a session
    session_start();
}

$Equestion =" ";
$Eanswer = "  ";
$id=0;
$U_username = " ";
$U_password =" ";

$db = new databaseClass(DB_HOST,DB_UNAME,DB_PASS,DB_DBNAME);  //conenct ot database
$conn = $db->getDB();


if(isset($_POST['submit']))   //if the post submit button has been set
{

   $question = $_POST['question'];  //get the question
   $answer = $_POST['answer'];  //get the answer
   $response = $conn->query("INSERT INTO faqs (question, answer) VALUES ('$question' ,'$answer') ");  //insert the question and the asnwer into the database

    $_SESSION['message'] = "Record has been saved succesfully !";  //send message back to dashboard
    $_SESSION['msg_type'] = "success"; //set the boostrap button class to success

   if (!$response) {                          //if there is an error

     $_SESSION['message'] = "An Error Occured Check the format of the text !";  //send message back to dashboard
     $_SESSION['msg_type'] = "danger";

    header("Location: ../dashboardFaqs?&AddContentError");   //send the user back to the dashboard to try again
     exit();
   }
    header("Location: ../dashboardFaqs?&AddContentSuccessfully");  //send the user back with success url message
     exit();
}


if(isset($_GET['delete']))  //if the delete button was clicked then get the id   --faq id stored in delete
{
 $id = mysqli_real_escape_string($conn,$_GET['delete']);   //escape the id from any special characters
 $stmt = $conn->query(" DELETE FROM faqs WHERE id=$id;")or die("unable to delete");  //send the query to the database


 $_SESSION['message'] = "Record has been deleted successfully !";  //rescord the message into the session varible to be sent back to the dashboard
 $_SESSION['msg_type'] = "danger"; //set the bootsrap button class to danger (red)

unset($_GET['delete']);  //unset the delete varibale (not necessary)

 header("Location: ../dashboardFaqs?&DeletedSuccessfully");  //send the success message back to the User
 exit();
}



if(isset($_GET['edit']))  //Update any frequently used faqs
{
  $id =  mysqli_real_escape_string($conn,$_GET['edit']);  //escape the id
  $update = true;  //set the update varibale to true (not used);
  $stmt = $conn->query( "SELECT * FROM faqs WHERE id=$id") or die("Unable to edit");   //send query to database ;

  if(mysqli_num_rows($stmt) == 1)  //if a row has been return then ..
  {
       $row = $stmt->fetch_array( );   //fetch the array containing the faq to be updated
       $Equestion = $row['question'];   //set the variable to the question which is displayed in the html page
       $Eanswer = $row['answer'];   //set the variable to the answer which is displayed in the html page

  }


}


if(isset($_POST['update']))  //is the values are changed either the question or the answer then .. (this is invoked after the update button is clicked in dashboardFaqs)
{
    $id=$_POST['id'];  //set the id to the id passed in
    $question = $_POST['question'];  //set the question
    $answer = $_POST['answer']; //set the asnwer

    $stmt = $conn->query("UPDATE faqs SET question='$question', answer='$answer' WHERE id = '$id'")or die("Unable to update database"); ; //send the update query to the database

    $_SESSION['message'] = "Record has been updated !";  //set the message to be displayed in the html dashboard Faqs page.
    $_SESSION['msg_type'] = "warning";  //this sets the boostrap class to display a warning ("browne")

 header("Location: ../dashboardFaqs?&UpdatedSuccessfully");  //return the user to the dashboard Faqs epage
  exit();

}



if(isset($_POST['name_submit']))   //this is to set a name and child's Name only for guests or Patients wwho haven't done so already
{
           $name = preg_replace('/\s/', '',$_POST['name']);   //set the name to the name submitted
           $child_name = preg_replace('/\s/', '',$_POST['child_name']); //set the childname to the childname submitted
           $username = $_SESSION['user'];  //set the username (to be used to find the record in the database)


            if(empty($child_name)){  //if the child name is empty (meaning the person has no children then)
            $child_name = 'none';  //set the childname as "none"
            }

         if (empty($name)) {  //is the name is empty
           header("Location: ../guestquestion?pleaseEnterName");  //send them back to enter the name required .
           exit();
              }
          else {
                                                                                                                  //this inserts a name and childName into the database if none was created before
               $stmt = $conn->query("UPDATE users set name='$name',child_name='$child_name' WHERE username='$username'");//send the statement to the database
               $_SESSION['role'] = "guest";
               header("Location: ../index?success");//semd the success message back
                exit();
              }
}




if(isset($_POST['output']))  //if the export button is click and the output button is set
{
  $output->export(); //call the export function to create a new text file
}


/*CREATE , DELETE , USER */
if(isset($_POST['create_user']))             //create a new user either admin or guest
{

$name = $_POST['create_username'];  //set username
$pwd  = $_POST['create_password']; //set password
$role = $_POST['create_role']; //set role
$output->createUser($name,$pwd,$role);    //delegate function in manageUsersClass to create a new user

}

if(isset($_GET['delete_user']))  // delete user
{

  $id = $_GET['delete_user'];
  $output->deleteUser($id);   //delegate function in manageUsersClass to delete user (only for guests)

}

if(isset($_GET['edit_user']))  //Update any frequently used faqs
{
$id = $_GET['edit_user'];
$vals = $output->editUser($id); //delegate function in manageUsersClass to update user info
$U_username = $vals['username'];  //store the returned username in U_username  (this information is show in the text box after the edit button is clicked)
$U_password = $vals['password']; //store the returned password in U_password (this information is show in the text box after the edit button is clicked)


}

if(isset($_POST['update_user']))   //this confirms the updated fields
{
  $id = $_POST['id'];    //set the id
  $username = $_POST['saveusername'];  //set the username
  $password = $_POST['savepwd'];  //set the password
  $output->updateUser($id,$username,$password);  //delegate the updateUser to change these variables in the database
}



if(isset($_POST['visit_patient']))
{

 $username = $_POST['patientid'];
 $name = $_POST['patient_name'];

 $wardinfo =  $output->getUserWard($name , $username);
 $_SESSION['wardname'] = $wardinfo['ward'];
 $_SESSION['patientname'] = $wardinfo['name'];

 header('Location: ../information');

}
