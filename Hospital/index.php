<?php
session_start();
require("includes/config.php");
$loginStatus = new applicationHelperClass();
$title = 'home';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
</head>

<body class="bg-light">

    <?php include_once('header.php'); ?>


    <div class="container.fluid">
        <div id="coverImage">
            <h1 id="coverText" class="text-left"
                style="padding-top:150px;color:#F332C5;font-size:75px;text-shadow: 3px 3px 5px rgba(150, 150, 150, 1);">
                Better Care !<br> &nbsp Better Health ! </h1>
        </div>
    </div>



    <section style="margin-top:50px;">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="card-deck mx-auto text-center">

                        <div class="card border border-light d-sm-flex flex-column" style="width: 18rem;">
                            <a href="#" id="appointment" alt="Schedule appointment"> <img class="card-img-top"
                                    src="images/appointment.jpg" alt="schedule and appointment"> </a>
                            <div class="card-body text-center">
                                <h5 class="card-title">Schedule An Appointment</h5>
                                <p class="card-text">sit amet, consectetur adipiscing elit. Nam mattis ante nulla, eget
                                    euismod justo mollis ac. Praesent a molestie elit.</p>
                            </div>
                            <a href="#" class="btn btn-info btn-block align-self-center">Schedule Appointment</a>
                        </div>

                        <div class="card border border-light d-sm-flex flex-column" style="width: 18rem;">
                            <a href="#" id="appointment" alt="Pay A Bill"> <img class="card-img-top"
                                    src="images/paybill.png" alt="pay a bill online"> </a>
                            <div class="card-body">
                                <h5 class="card-title">Pay Bills</h5>
                                <p class="card-text"> sit amet, consectetur adipiscing elit. Nam mattis ante nulla, eget
                                    euismod justo mollis ac. Praesent a molestie</p>
                            </div>
                            <a href="#" class="btn btn-info btn-block align-self-center">Pay Bills</a>
                        </div>

                        <div class="card border border-light d-sm-flex flex-column" style="width:18rem;">
                            <a href="#" id="appointment" alt="Select emergency Service"> <img class="card-img-top"
                                    src="images/ambulance.png" alt="emergency services"> </a>
                            <div class="card-body">
                                <h5 class="card-title">Emergency Services</h5>
                                <p class="card-text">Lorem ipsum dolor sit Nam mattis ante nulla,usto mollis ac.
                                    Praesent a molestie elit.
                                </p>

                            </div>
                            <a href="#" class="btn btn-info btn-block align-self-center">Emergency Services</a>

                        </div>

                    </div>
                </div>

                <hr>

            </div>
        </div>

    </section>









    <div class="container" id="services" style="margin-top:50px;">
        <!--start department service containerr -->
        <div class="row">

            <div class="col-6 col-sm-4 col-md-4 col-lg-3 " style="padding:0px">

                <img class="img-fluid h-100 w-100" src=" images/services.jpg" id="service1">

            </div>

            <div class="col-5 col-sm-7 mx-auto " style="padding:0px">
                <h1 class="text-center" style="margin-top:20px;font-weight:bold;">Select Hospital Department

                    <span> <select class="browser-default custom-select" style="margin-top:50px;"
                            onchange="location = this.options[this.selectedIndex].value;">
                            <option selected>Choose Department....</option>
                            <option value="accident&emergency">Accident & Emergency</option>
                        </select> </span>
                </h1>
            </div>
        </div>
    </div> <!-- end Department Container class -->





    <div class="container mt-4">
        <div class="jumbotron bg-light" style="border:1px dashed #E0E3E4;">
            <h4><img src="images/tips.png" alt="tips for everyone">&nbspTips: </h4>
            <p class="lead">As the whole world grappel with the effects of coronavirus, It is imperative that we
                cooperate and take care of ourselves.</p>

            <ul>
                <li><strong>STAY</strong> home as much as you can</li>
                <li><strong>WASH</strong> hands as often as possible </li>
                <li><strong>KEEP</strong> hands away from eyes, nose and mouth </li>
                <li><strong>UNWELL</strong> call ahead !</li>
            </ul>
            <hr class="my-4">
            <a class="btn btn-info btn-lg ml-4"
                href="https://www.cdc.gov/coronavirus/2019-ncov/prevent-getting-sick/prevention.html" role="button"
                target="_blank">Learn more</a>

        </div>
    </div>


    <div class="container mt-4 pb-5"
        style="background: linear-gradient(90deg, rgba(255,255,255,1) 41%, rgba(162,212,222,1) 98%);">
        <div class="row">
            <div class="col-sm-6">
                <p class="lead mt-4 ml-3">Our doctors are lifelong learners, missionaries and well versed within their
                    area of specialty.<br>Their mission is to keep the world healthy! for us and for future generations.
                </p>
                <p class="lead blockquote-footer ml-3">Hospital</p>
            </div>
            <div class="col-sm-6 my-auto text-center">
                <br><a class="btn btn-info btn-lg" href="http://www.qehconnect.com" role="button" target="_blank">Find a
                    Doctor!</a>
                <img src="images/nurse.png" alt="tips for everyone">
            </div>

        </div>
    </div>


    <br>
    <br>


    <?php include_once('footer.php'); ?>