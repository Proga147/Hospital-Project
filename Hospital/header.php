<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top">

    <div class="container">
        <a class="navbar-brand" href="#">
            <img id="Logo" src="images/hospital.png" alt="" style="width:64px;height:64px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">


                <li class="nav-item">
                    <a class="nav-link" href="index">Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="accident&emergency">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact">Contact</a>
                </li>



                <?php if (!($loginStatus->isUserLoggedIn())) : ?>


                <li class="nav-item">
                    <a class="nav-link" href="signinGuest">Sign In</a>
                </li>


                <?php elseif ($loginStatus->isUserLoggedIn() && $_SESSION['role'] == "guest") : ?>

                <li class="nav-item">
                    <a class="nav-link" href="faqs"><i class="fas fa-question-circle"></i>&nbspFaQs</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="includes/logout" id="logout"><i class="fas fa-sign-out-alt"></i>logout</a>
                </li>
                <li class="nav-item"><a href="#" class="nav-link disabled">user: (<?php echo $_SESSION['user'] ?>)</a>
                </li>

                <?php endif ?>


                <?php if ($loginStatus->isUserLoggedIn() && $_SESSION['role'] == "admin") : ?>

                <li class="nav-item">
                    <a class="nav-link" href="faqs"><i class="fas fa-question-circle"></i>&nbsp;FaQs</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="dashboardFaqs"><i class="fas fa-tools"></i>&nbsp;dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="includes/logout" id="logout"><i class="fas fa-sign-out-alt"></i>logout</a>
                </li>

                <?php endif; ?>



            </ul>
        </div>

    </div>


</nav>


<div class="jumbotron" style="background-color:#97CDF1;padding-top:5px;padding-bottom:10px;">
    <h4><br>Corona <span style="color:#F332C5;"> Virus</span> Pandemic (Covid-19) <span> <img src="images/virus.png"
                alt="no virus" style="height:40px; width:40px;"> </span></h4>
    <p>For health information and advice, call the 24hr hotline at 536-4500. Learn about the government's response to
        the virus at gisbarbados.gov.bb.

    </p>



</div>