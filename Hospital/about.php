<?php
session_start();
require("includes/config.php");
$loginStatus = new applicationHelperClass();
$title = 'about';
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


<div class="container bg-light text-center">
  <div class="container" >

<br><br>
    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim magnam ipsam eos aperiam atque voluptatem consequatur pariatur fuga,
    ad ipsum veritatis quos perspiciatis reiciendis excepturi explicabo quae nostrum cumque officiis. Lorem ipsum dolor sit amet, consectetur
    adipisicing elit. Deleniti dolorem nisi voluptatibus. Repudiandae maiores ratione reiciendis, neque nesciunt nisi reprehenderit cumque, perferendis
    consequatur temporibus esse aspernatur beatae corporis ea! Saepe.Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim magnam ipsam eos aperiam atque voluptatem consequatur pariatur fuga,
    ad ipsum veritatis quos perspiciatis reiciendis excepturi explicabo quae nostrum cumque officiis. Lorem ipsum dolor sit amet, consectetur
    adipisicing elit. Deleniti dolorem nisi voluptatibus. Repudiandae maiores ratione reiciendis, neque nesciunt nisi reprehenderit cumque, perferendis
    consequatur temporibus esse aspernatur beatae corporis ea! Saepe.Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim magnam ipsam eos aperiam atque voluptatem consequatur pariatur fuga,
    ad ipsum veritatis quos perspiciatis reiciendis excepturi explicabo quae nostrum cumque officiis. Lorem ipsum dolor sit amet, consectetur
    adipisicing elit. Deleniti dolorem nisi voluptatibus. Repudiandae maiores ratione reiciendis, neque nesciunt nisi reprehenderit cumque, perferendis
    consequatur temporibus esse aspernatur beatae corporis ea! Saepe.</p>
  </div>
  <br><br>

  <div class="container">
    <h4>Vision</h4>
    <p class="lead">
  Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim magnam ipsam eos aperiam atque voluptatem consequatur pariatur fuga,
    ad ipsum veritatis quos perspiciatis reiciendis excepturi explicabo quae nostrum cumque officiis. Lorem ipsum dolor sit amet, consectetur
    adipisicing elit. Deleniti dolorem nisi voluptatibus. Repudiandae maiores ratione reiciendis, neque nesciunt nisi reprehenderit cumque, perferendis
    consequatur temporibus esse aspernatur beatae corporis ea! Saepe.</p>
  </div>

</div>
<br><br><br><br><br><br><br>



<?php include_once('footer.php'); ?>
