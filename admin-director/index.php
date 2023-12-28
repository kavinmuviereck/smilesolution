<?php 

include("../config.php");

include('header.php'); 

// $courses = $db->getVal("select count(id) from course");

// $users = $db->getVal("select count(id) from users");

// $videos = $db->getVal("select count(id) from videos");

// $payment = $db->getVal("select sum(amt) from payment");



?>

<style type="text/css">

.huge { font-size: 26px;}

.card{ box-shadow: 4px 2px 5px 0 rgb(193 142 142 / 16%), -4px 2px 10px 0 rgb(210 214 218);}

thead{background: #2b3252;color: white;}

h2{text-align: center;margin-top: 15px;color: grey;}

</style>

<body>



    <div id="wrapper">



		<?php include('menu.php'); ?>



        <div id="page-wrapper">

            <div class="row">

                <div class="col-lg-12">

                    <h1 class="page-header text-center">WELCOME</h1>
                    <h3 class="text-center">Doctor DCR | Admin</h3>

                </div>

                <!-- /.col-lg-12 -->

            </div>

         </div></div>



    <?php include('footer.php'); ?>



</body>



</html>

