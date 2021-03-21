<?php
session_start();
require('includes/config.php');
$loginStatus = new applicationHelperClass();
$title = 'FaQs';
$getfaqs = new getfaqs();
$faqs = $getfaqs ->getFaqs( ) ;
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
<body class="bg-light" >

<?php include_once('header.php'); ?>

<div class = "container">

<h3 class="text-center"><strong>Frequently Asked Questions<strong></h3>
<hr><br>

<?php if(!empty($faqs)):  ?>

<div id="accordion">
  <?php foreach($faqs as $faq):  ?>
  <div class="card">
    <div class="card-header mb-1" id="headingOne">
      <h5 class="mb-0">
        <button class="btn collasped" data-toggle="collapse" data-target="#collapse<?php echo $faq['id']?>" aria-expanded="true" aria-controls="collapseOne">
        <strong><span style="color:#12A4D3;font-size:16px;text-decoration:underline;"><?php echo $faq['question']?></span></strong>
        </button>
      </h5>
    </div>
  </div>

    <div id="collapse<?php echo $faq['id'] ?>" class="collapse hide " aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body" style="word-wrap:break-word;">
      <?php echo $faq['answer']  ?>
      </div>
    </div>
<?php endforeach;?>
    </div>

<?php endif ?>


<?php if(empty($faqs)):  ?>

<h3 class="text-center">Opps! No questions yet , go to contact Page to ask a question ! <h3>

<?php endif ?>
</div>

<?php include_once('footer.php'); ?>
