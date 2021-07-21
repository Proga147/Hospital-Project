<?php
session_start();
require("includes/config.php");
$loginStatus = new applicationHelperClass();
$title = 'SignIn';

?>


<?php include_once('header.php'); ?>

<div class="container" style="height:600px;">
    <div class="row">
        <div class="col-sm-6 mx-auto pr-3">
            <div class="card card-login mt-5">

                <div class="card-header">Guest Signin Question</div>
                <div class="card-body">
                    <form method="post" action="includes/process" class="needs-validation">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Please enter Name...."
                                required>

                        </div>
                        <div class="form-group">
                            <label for="child_name">Child's Name</label>
                            <input class="form-control" type="text" name="child_name"
                                placeholder="Please enter child's name....(Leave Blank if none)">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block" name="name_submit">Submit</button>
                    </form>
                </div>

            </div>



        </div>
    </div>
</div>




<?php include_once('footer.php'); ?>