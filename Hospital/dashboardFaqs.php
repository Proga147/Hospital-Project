<?php
require_once('includes/config.php');
session_start();
$loginStatus = new applicationHelperClass();
$getfaqs = new getfaqs();
$faqs = $getfaqs->getFaqs();
$count = 0;
?>

<?php if ($loginStatus->isUserLoggedIn() && $_SESSION['role'] == "admin") : ?>

<?php $user = $_SESSION['user']; ?>

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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboardFaqs</title>
</head>

<body class="bg-light">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    </head>

    <body>

        <div class="d-flex" id="wrapper">

            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading">Welcome, <?php echo $user ?> (admin)</div>
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                    <a href="#faqtable" class="list-group-item list-group-item-action bg-light">Edit FaQs</a>
                    <a href="dashboardUsers" class="list-group-item list-group-item-action bg-light">Users</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">

                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom " role="tablist">
                    <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="index">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="includes/logout"><i
                                        class="fas fa-sign-out-alt"></i>&nbspLogOut</a>
                            </li>
                    </div>

                </nav>


                <div class="container-fluid">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center mt-5">
                        <a href="#"><strong><span class="fa fa-dashboard"></span> My Dashboard</strong></a>
                        <hr>




                        <?php
              if (isset($_SESSION['message'])) : ?>

                        <div class="alert alert-<?= $_SESSION['msg_type'] ?> alert-dismissible fade show">
                            <?php
                  echo $_SESSION['message'];
                  unset($_SESSION['message']);
                  ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>

                        </div>



                        <?php endif ?>



                        <?php if (!empty($faqs)) :  ?>

                        <div class="table-responsive-sm">
                            <table class="table mt-5 " id="faqtable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Answer</th>
                                        <th colspan="3" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($faqs as $faq) :  ?>
                                    <tr>
                                        <th scope="row"><?php echo ++$count ?></th>
                                        <td style="word-wrap:break-word;min-width: 160px;max-width: 160px;">
                                            <?php echo $faq['question'] ?></td>
                                        <td style="word-wrap:break-word;min-width: 160px;max-width: 160px;">
                                            <?php echo $faq['answer'] ?></td>
                                        <td><a href="dashboardFaqs?edit=<?php echo $faq['id']; ?>"
                                                class="btn btn-primary float-right" id="openfaq">Edit</a></td>
                                        <td><a href="includes/process?delete=<?php echo $faq['id']; ?>"
                                                class="btn btn-danger float-left">Delete</a></td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>




                            <button class="btn btn-success mt-5" name="add" data-toggle="collapse"
                                data-target="#addfaq"> Add New Content </button>
                        </div>

                        <div class="container collapse" id="addfaq" style="margin-top:30px;">

                            <div class="row justify-content-center">
                                <div class="col-sm-7">
                                    <form method="post" action="includes/process">
                                        <div class="form-group">
                                            <label> Question </label>
                                            <input class="form-control" id="question" type="text" name="question"
                                                maxlength="200" placeholder="Add new Question" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Answer </label>
                                            <textarea class="form-control" id="answer" rows="3" name="answer"
                                                maxlength="400" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-lg" type="submit" name="submit"> Save
                                            </button>
                                            <button class="btn btn-danger btn-lg" type="button" data-toggle="collapse"
                                                data-target="#addfaq"> Cancel </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>





                        <?php if (isset($_GET['edit'])) : ?>
                        <?php require_once('includes/process.php');    ?>

                        <div class="container" id="change" style="margin-top:30px;">

                            <div class="row justify-content-center">
                                <div class="col-sm-7">
                                    <form method="post" action="includes/process">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label> Question </label>
                                            <input class="form-control" id="question" type="text" name="question"
                                                maxlength="200" placeholder="Add new Question"
                                                value="<?php echo $Equestion ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Answer </label>
                                            <textarea class="form-control" id="answer" rows="3" name="answer"
                                                required><?php echo $Eanswer ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-lg" type="submit" name="update"
                                                data-toggle="collapse" data-target="#addfaq"> Update </button>
                                            <button class="btn btn-danger btn-lg" type="button"
                                                id="closefaq">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <?php endif ?>



                        <?php endif ?>








                        <?php if (empty($faqs)) : ?>


                        <div class="table-responsive-sm">
                            <table class="table mt-5">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Answer</th>
                                        <th colspan="3" scope="col">Action</th>

                                    </tr>
                                </thead>
                            </table>
                            <div>


                                <button class="btn btn-success mt-5" name="add" data-toggle="collapse"
                                    data-target="#addfaq"> Add New Content </button>



                                <div class="container collapse" id="addfaq" style="margin-top:30px;">

                                    <div class="row justify-content-center">
                                        <div class="col-sm-7">
                                            <form method="post" action="includes/process">
                                                <div class="form-group">
                                                    <label> Question </label>
                                                    <input class="form-control" id="question" type="text"
                                                        name="question" maxlength="200" placeholder="Add new Question"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Answer </label>
                                                    <textarea class="form-control" id="answer" rows="3" name="answer"
                                                        maxlength="400" required></textarea>
                                                </div>
                                                <div class="form-group">

                                                    <button class="btn btn-primary btn-lg" type="submit" name="submit"
                                                        data-toggle="collapse" data-target="#addfaq"> Save </button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <?php endif ?>


                                <br><br><br>





                            </div>


                        </div>

                    </div>
                    <!-- /#page-content-wrapper -->

                </div>
                <!-- /#wrapper -->

                <script>
                $("#menu-toggle").click(function(e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });

                $('#openfaq').click(function() {
                    if ($('#change').css('visibility') == 'hidden')
                        $('#change').css('visibility', 'visible');
                });


                $('#closefaq').click(function() {
                    if ($('#change').css('visibility') == 'visible')
                        $('#change').css('visibility', 'hidden');

                });
                </script>

    </body>

</html>


<?php else : ?>

<?php header("Location: ./index")   ?>


<?php endif ?>