<?php
session_start();
require("includes/config.php");
$loginStatus = new applicationHelperClass();
$title = 'about';
?>


<?php include_once('header.php'); ?>

<?php if (isset($_SESSION['patientname']) && isset($_SESSION['wardname'])) : ?>

<div class="container bg-light text-center" style="height:600px;">
    <div class="container">

        <div class="row">
            <div class="col-sm-6 mx-auto">
                <div class="form-group text-left">
                    <label for="Patient Name">Patient Name: </label>
                    <input class="form-control" type="text" placeholder="<?php echo $_SESSION['patientname'] ?>"
                        readonly>
                </div>


                <div class="form-group text-left">
                    <label for="child_name">Ward Name: </label>
                    <input class="form-control" type="text" placeholder="<?php echo $_SESSION['wardname'] ?>" readonly>
                </div>


                <div class="form-group text-left">
                    <label for="information">Note: </label>
                    <textarea id="information" class="form-control text-center" rows="5" cols="60" readonly>
   Hello there, <?php echo $_SESSION['patientname'] ?> was transferred to the <?php echo $_SESSION['wardname'] ?> ward !
   Travel to the ward and a Nurse will direct you to the room.
  </textarea>
                </div>


                <a href="index" role="button" class="btn btn-primary">Close</a>



            </div>
        </div>
    </div>
</div>

<?php include_once('footer.php'); ?>


<?php else : ?>

<?php header('Location: index'); ?>



<?php endif ?>