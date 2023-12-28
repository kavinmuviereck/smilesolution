    
<?php include 'inc_permission.php';?>

    <nav class="navbar navbar-default navbar-static-top w3-card-2" role="navigation" style="margin-bottom: 0px;background-color: #1f2278;">
    <div class="navbar-header" style="background-color: white">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- <img src="../images/them-logo/petbuttylogo3.jpg" class="img-responsive" style="height: 60px;"> -->
    </div>
    <!-- /.navbar-header -->

    <div class="nav navbar-top-links navbar-right">
       
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #fff;">
                Welcome, <?php echo $LoggedInName ?>
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
              <!--   <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li> -->
               <!--  <li class="divider"></li> -->
                <li><a href="login.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </div>
    <!-- /.navbar-top-links -->
<?php include 'menu.php';?>
<style type="text/css">
  th, td {
  text-align: left;
  padding: 12px;
  border: solid 1px #f2f2f2;;
}

tr:nth-child(even) {background-color: #f2f2f2;}
h3,h2{
  margin: 20px 10px 20px 10px;
}
</style>