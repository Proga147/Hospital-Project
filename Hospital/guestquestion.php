<?php
session_start();
require("includes/config.php");
$loginStatus = new applicationHelperClass();
$title = 'SignIn';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $title ?></title>
</head>
<body class="bg-light">

<?php include_once('header.php'); ?>

<div class="container" style="height:600px;">
  <div class="row">
  <div class="col-sm-6 mx-auto pr-3" >
  <div class="card card-login mt-5">

    <div class="card-header">Guest Signin Question</div>
    <div class="card-body">
      <form method="post" action="includes/process" class="needs-validation" >
        <div class="form-group">
          <label for="name">Name</label>
          <input class="form-control"  type="text" name="name" placeholder="Please enter Name...." required>

          </div>
          <div class="form-group">
          <label for="child_name">Child's Name</label>
          <input class="form-control"  type="text" name="child_name" placeholder="Please enter child's name....(Leave Blank if none)">
         </div>

        <button type="submit" class="btn btn-primary btn-block" name="name_submit">Submit</button>
      </form>
    </div>

   </div>



  </div>
   </div>
</div>




<?php include_once('footer.php'); ?>
