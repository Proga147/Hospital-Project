<?php
session_start();
require_once("includes/config.php");
$loginStatus = new applicationHelperClass();
$title = 'signin';



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      <link href="css/sb-admin.css" rel="stylesheet">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $title ?></title>
</head>
<body class="bg-light">

<?php include_once('header.php'); ?>



 <div class="container" style="height:600px;">
   <div class="row">
   <div class="col-sm-6 mx-auto pr-3" >
   <div class="card card-login mt-5">

     <div class="card-header">Guest Signin</div>
     <div class="card-body">
       <form method="post" action="includes/login" class="needs-validation" >
         <div class="form-group">
           <label for="Username">Username</label>
           <input class="form-control"  type="text" name="username" maxlength = "20" placeholder="Please enter GuestID....." required>
           <div class="invalid-feedback">Please enter username again.</div>
         </div>
         <div class="form-group">
           <label for="Password">Password</label>
           <input class="form-control"  type="password" name="password" maxlength = "20" placeholder="Please enter Password....." required>
           <div class="invalid-feedback">Please enter password again.</div>
         </div>
         <div class="form-group">
           <div class="form-check">
             <label class="form-check-label">
               <input class="form-check-input" type="checkbox"> Remember Password</label>
           </div>
         </div>
         <button type="submit" class="btn btn-primary btn-block" name="login_user">Login</button>
       </form>
       <div class="text-center mt-4">
     <a class="d-block small" href="#">Forgot Password?</a>
       </div>
     </div>

    </div>



   </div>
    </div>
 </div>







<?php include_once('footer.php'); ?>
