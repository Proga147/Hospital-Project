<?php
require_once('includes/config.php');
session_start();
$loginStatus = new applicationHelperClass();
$getUsers = new manageUsersClass();
$users = $getUsers->getAllUsers();
$countGuest = 0;
$countStaff = 0;
?>

<?php $user = $_SESSION['user']; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboardUsers</title>
</head>

<body class="bg-light">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    </head>

    <body class="bg-light">

        <div class="d-flex" id="wrapper">

            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading">Welcome, <?php echo $user ?> (admin)</div>
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                    <a href=dashboardFaqs class="list-group-item list-group-item-action bg-light">Edit FaQs</a>
                    <a href="dashboardUsers" class="list-group-item list-group-item-action bg-light">Users</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
                    <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">

                <nav class="navbar navbar-expand-lg navbar-expand-sm navbar-light bg-light border-bottom "
                    role="tablist">
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




                        <div class="table-responsive-sm">
                            <table class="table mt-5" id="faqtable">
                                <h2>Guests</h2>
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Child's Name</th>
                                        <th scope="col">GuestID</th>
                                        <th scope="col">Last Login</th>
                                        <th colspan="2" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($users as $user) :  ?>
                                    <?php if ($user['role'] != "admin") : ?>
                                    <tr>
                                        <th scope="row"><?php echo ++$countGuest ?></th>
                                        <td><?php echo $user['name'] ?></td>
                                        <td><?php echo $user['child_name'] ?></td>
                                        <td><?php echo $user['username'] ?></td>
                                        <td><?php echo $user['last_login'] ?></td>
                                        <td><a href="dashboardUsers?edit_user=<?php echo $user['id']; ?>"
                                                class="btn btn-primary float-right" id="openuser">Edit</a></td>&nbsp
                                        <td> <a href="includes/process?delete_user=<?php echo $user['id']; ?>"
                                                class="btn btn-danger float-left">Delete</a></td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>




                            <?php if (isset($_GET['edit_user'])) : ?>
                            <?php require_once('includes/process.php');    ?>

                            <div class="container" id="change" style="margin-top:30px;">

                                <div class="row justify-content-center">
                                    <div class="col-sm-7">
                                        <form method="post" action="includes/process">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <div class="form-group text-left">
                                                <label><strong>UserName</strong></label>
                                                <input class="form-control" type="text" name="saveusername"
                                                    maxlength="40" value="<?php echo $U_username ?>" required>
                                            </div>
                                            <div class="form-group text-left">
                                                <label><strong>Password</strong></label>
                                                <input class="form-control" type="text" name="savepwd" maxlength="20"
                                                    value="<?php echo $U_password ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-lg" type="submit" name="update_user"
                                                    data-toggle="collapse"> Update </button>
                                                <button class="btn btn-danger btn-lg" type="button"
                                                    id="closeuser">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <?php endif ?>
                        </div>





                        <div class="table-responsive-sm">
                            <table class="table mt-5 text-center" id="stafftable">
                                <hr>
                                <h2>Staff</h2>
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">User Id</th>
                                        <th scope="col">UserName</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">last_login</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user) :  ?>
                                    <?php if ($user['role'] == "admin") : ?>
                                    <tr>
                                        <th scope="row"><?php echo ++$countStaff ?></th>
                                        <td><?php echo $user['username'] ?></td>
                                        <td><?php echo $user['role'] ?></td>
                                        <td><?php echo $user['last_login'] ?></td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach ?>

                                </tbody>
                            </table>


                            <button class="btn btn-success mt-5" data-toggle="collapse" data-target="#createuser"> Add
                                New User</button>
                            <div class="container collapse " id="createuser" style="margin-top:30px;">

                                <div class="row justify-content-center">
                                    <div class="col-sm-7">
                                        <form method="post" action="includes/process">
                                            <div class="form-group text-left">
                                                <label><strong>Username</strong></label>
                                                <input class="form-control" type="text" name="create_username"
                                                    maxlength="40" placeholder="Add Username" required>
                                            </div>
                                            <div class="form-group text-left">
                                                <label><strong>Password</strong></label>
                                                <input class="form-control" type="text" name="create_password"
                                                    maxlength="20" placeholder="Add Password" required>
                                            </div>
                                            <div class="form-group text-left">
                                                <label><strong>Choose Role: </strong></label>
                                                <select class="browser-default custom-select" name="create_role">
                                                    <option value="guest">guest</option>
                                                    <option value="admin">admin</option>
                                                </select>
                                            </div>
                                            <button class="btn btn-primary btn-lg" type="submit" name="create_user">
                                                Save </button>
                                            <button class="btn btn-danger btn-lg" type="button" data-toggle="collapse"
                                                data-target="#createuser">Close</button>
                                    </div>
                                    </form>
                                </div>
                            </div>


                            <form method="post" action="includes/process">
                                <button type="submit" class="btn btn-primary mt-5 mb-10" name="output"><a
                                        href="./file.txt" style="color:white;" download>Output Data To Text File</a>
                                </button>
                            </form>

                        </div>

                    </div>











                </div>
                <br><br><br>
            </div>




            <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });

            $('#openuser').click(function() {
                if ($('#change').css('visibility') == 'hidden')
                    $('#change').css('visibility', 'visible');

            });
            $('#closeuser').click(function() {
                if ($('#change').css('visibility') == 'visible')
                    $('#change').css('visibility', 'hidden');


            });
            </script>

    </body>

</html>