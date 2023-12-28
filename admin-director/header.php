<?php

if(isset($_SESSION["adminlogin"])){

    if($_SESSION["adminlogin"] == 'yes')

    {

    }

    else{

        header("Location: login.php");die();    

    }

}

else{

    header("Location: login.php");die();

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

    <title>Admin | Doctor Dcr</title>



    <!-- Bootstrap Core CSS -->

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <!-- MetisMenu CSS -->

    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">



    <!-- Custom CSS -->

    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



     <!-- DataTables CSS -->

    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">



    <!-- DataTables Responsive CSS -->

    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

	<!----------------jquery alert plugin---------->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

	<!-- select2 -->

	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />



    <link

    rel="stylesheet"

    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"

  />

    <style>

        .mgt-20{

            margin-top: 20px

        }

    </style>



</head>