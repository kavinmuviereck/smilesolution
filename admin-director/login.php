<?php

session_start();

session_unset();

session_destroy();

session_write_close();

include("../config.php");

if(isset($_POST['submit']))

{

    if ($_POST['name'] === 'doctor' && $_POST['password'] === 'doctordcr'){

        $_SESSION["adminlogin"]="yes";

        header('Location:index.php');die();

    }

    else{

        echo "<script>alert('Invalid Password')</script>";

    }

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">

   <link rel="shortcut icon" type="image/x-icon" href="img/favouriteicon.png">



    <title>Doctor DCR | LOGIN</title>



    <!-- Bootstrap Core CSS -->

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <!-- MetisMenu CSS -->

    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">



    <!-- Custom CSS -->

    <link href="dist/css/sb-admin-2.css" rel="stylesheet">



    <!-- Custom Fonts -->

    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

   

    <style type="text/css">

    body {

        background-color: #2B3252;

    }

    .panel-title{

        font-size: 22px;

        text-align: center;

        color: white;

    }

    .panel-default>.panel-heading {

        background-color: orange;

        border-color: orange;

    }

    </style>

</head>



<body>



    <div class="container">

        <div class="row">

            <div class="col-md-4 col-md-offset-4">

                <div class="login-panel panel panel-default">

                    <div class="panel-heading">

                        <h3 class="panel-title">Admin Login</h3>

                    </div>

                    <div class="panel-body">

                        <form method="post">

                            <fieldset>

                                <div class="form-group">

                                    <label>Username</label>

                                    <input class="form-control" placeholder="username" name="name" type="text" autofocus>

                                </div>

                                <div class="form-group">

                                    <label>Password</label>                                    

                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">

                                </div>                               

                                <!-- Change this to a button or input when using this as a form -->

                                <button type="submit" name="submit" class="btn btn-success btn-block">Login</button>

                            </fieldset>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <!-- jQuery -->

    <script src="vendor/jquery/jquery.min.js"></script>



    <!-- Bootstrap Core JavaScript -->

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>



    <!-- Metis Menu Plugin JavaScript -->

    <script src="vendor/metisMenu/metisMenu.min.js"></script>



    <!-- Custom Theme JavaScript -->

    <script src="dist/js/sb-admin-2.js"></script>



</body>



</html>

