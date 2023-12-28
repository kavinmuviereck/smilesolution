<?php include('starter.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'header.php'; 


    if (isset($_GET['searchkey']) && !empty($_GET['searchkey'])) { 

        $SKey = $_GET['searchkey'];

        $SearchKey = str_replace('-', ' ', $SKey);

    }else{

        redirect($base_url.'/blogs.php');

    }



    function pagination($query, $per_page = 10,$page = 1 , $url='?'){        

        include 'db_connection.php';

        $sql = "SELECT COUNT(*) as num FROM {$query}";

        $res = mysqli_query($conn, $sql);

        $row = mysqli_fetch_array($res);

        $total = $row['num'];

        $adjacents = "2"; 



        $page = ($page == 0 ? 1 : $page); 

        $start = ($page - 1) * $per_page;                               

        

        $prev = $page - 1;                          

        $next = $page + 1;

        $lastpage = ceil($total/$per_page);

        // $page = ($page > $lastpage ? 1 : $page);  

        if($page > $lastpage){

            // echo $_SERVER['HTTP_HOST'].'///'; exit;

            redirect($url.'1');

        }

        $lpm1 = $lastpage - 1;

        

        $pagination = "";



        if($lastpage > 1)

        {   

            $pagination .= "<ul class='pagination'>";

            $pagination .= "<li class='details' style='margin-top:2px'>Page $page of $lastpage</li>";

            if ($lastpage < 7 + ($adjacents * 2))

            {   

                for ($counter = 1; $counter <= $lastpage; $counter++)

                {

                    if ($counter == $page)

                        $pagination.= "<li><a class='current'>$counter</a></li>";

                    else

                        $pagination.= "<li><a href='{$url}$counter'>$counter</a></li>";

                }

            }

            elseif($lastpage > 5 + ($adjacents * 2))

            {

                if($page < 1 + ($adjacents * 2))        

                {

                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)

                    {

                        if ($counter == $page)

                            $pagination.= "<li><a class='current'>$counter</a></li>";

                        else

                            $pagination.= "<li><a href='{$url}$counter'>$counter</a></li>";

                    }

                    $pagination.= "<li class='dot'>...</li>";

                    $pagination.= "<li><a href='{$url}$lpm1'>$lpm1</a></li>";

                    $pagination.= "<li><a href='{$url}$lastpage'>$lastpage</a></li>";      

                }

                elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))

                {

                    $pagination.= "<li><a href='{$url}1'>1</a></li>";

                    $pagination.= "<li><a href='{$url}2'>2</a></li>";

                    $pagination.= "<li class='dot'>...</li>";

                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)

                    {

                        if ($counter == $page)

                            $pagination.= "<li><a class='current'>$counter</a></li>";

                        else

                            $pagination.= "<li><a href='{$url}$counter'>$counter</a></li>";                    

                    }

                    $pagination.= "<li class='dot'>..</li>";

                    $pagination.= "<li><a href='{$url}$lpm1'>$lpm1</a></li>";

                    $pagination.= "<li><a href='{$url}$lastpage'>$lastpage</a></li>";      

                }

                else

                {

                    $pagination.= "<li><a href='{$url}1'>1</a></li>";

                    $pagination.= "<li><a href='{$url}2'>2</a></li>";

                    $pagination.= "<li class='dot'>..</li>";

                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)

                    {

                        if ($counter == $page)

                            $pagination.= "<li><a class='current'>$counter</a></li>";

                        else

                            $pagination.= "<li><a href='{$url}$counter'>$counter</a></li>";                    

                    }

                }

            }

            

            if ($page < $counter - 1){ 

                $pagination.= "<li><a href='{$url}$next'>Next</a></li>";

                $pagination.= "<li><a href='{$url}$lastpage'>Last</a></li>";

            }else{

                $pagination.= "<li><a class='current'>Next</a></li>";

                // $pagination.= "<li><a class='current'>Last</a></li>";

            }

            $pagination.= "</ul>\n";        

        }

        

        return $pagination;

    } 



    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);

    $limit = 25; //if you want to dispaly 10 records per page then you have to change here

    $startpoint = ($page * $limit) - $limit;

    // echo $startpoint; exit;

    $statement = "blog_details where (Headings LIKE '%".$SearchKey."%' OR TagKeys LIKE '%".$SearchKey."%') ORDER BY Blog_ID DESC"; //you have to pass your query over here

    // echo $statement; exit;

    $TotalRecord = "SELECT COUNT(*) as num FROM {$statement}";

    // echo $TotalRecord; exit;

    $arrResult = " SELECT * from {$statement} LIMIT {$startpoint} , {$limit}";

    //  echo $db->getLastQuery(); exit;

    $Result = 'Search Result for - '.$SearchKey;

    // unset($_POST);exit;

    // echo $Result; exit;

?>


   



    <script>

        addEventListener("load", function () {

            setTimeout(hideURLbar, 0);

        }, false);



        function hideURLbar() {

            window.scrollTo(0, 1);

        }

    </script>



    <!--Include common header links -->

    

    

    <link href="<?= $base_url ?>css/blog_css.css" type="text/css" rel="stylesheet" media="all">

    <link href="<?= $base_url ?>pagination/css/pagination.css" rel="stylesheet" type="text/css" />

    <link href="<?= $base_url ?>pagination/css/A_green.css" rel="stylesheet" type="text/css" />



    <link rel="stylesheet" href="<?= $base_url ?>css/restyle.css">

  

    <style type="text/css">





 @media screen and (max-width: 1050px){

    .card ul li a{

     font-size:16px;

     }

   }

.w3agile_special_deals_grid_left_grid{

    /* flex: 0 1 calc(25% - 1em); */

    box-shadow: none !important;

    border: 2px solid rgba(0,0,0,.125);

    border-radius: 10px;

    margin: 10px;
  

}



.card:hover {

      box-shadow: none !important;

}



.card {

    display: flex;

    flex-wrap: wrap;

    justify-content: space-between;

    /* box-shadow: none !important; */

    box-shadow: 0 2px 8px 0 rgb(0 0 0 / 20%)! important;

    border: 2px solid rgba(0,0,0,.125);

    margin: 5px;

    /* box-shadow: 0 1px 5px #00000099; */

    border-radius: 10px;

}



.break{

    height:25px;

}

.break1{

    height:25px;

}

.img_special {

  width: 220px;

}

#align-item{

    padding: -10px;

}

.card__heading__text {

    padding:15px;

    margin-top:10px;

}



h6{

    color:red;

    padding:20px;

    text-align: center;

}

h5 {

    box-shadow: none !important;

    text-align: center;

    padding: 5px;

    font-family: inherit;

}

h5 a{

    color: #464646 !important;

}



.card:hover {

  transition-duration: 150ms;

  box-shadow: 0 5px 20px 5px #00000044;

}

.card:hover.card_data_head{

transform: scale(1.25) rotate(2deg);

}

.img_special{

    left:-10px;

    margin-top:0px;

    width:100%;

    padding: 5px;

}





.pagination{

display: flex;

    /* padding-left: 0; */

    list-style: none;

    border-radius: 0.25rem;

}

#pagingg ul li {

   padding: 10px;

    font-size: 14px;

}



ul.pagination li a {

    color: #fff;

    /* background: #b32525; */

    background: -moz-linear-gradient(top,#fe5454,#fe5454);

    background: -webkit-gradient(linear,0 0,0 100%,from(#fe5454),to(#fe5454));

    padding:10px 10px;

   

}

a:not([href]):not([tabindex]) {

    color: white;

    text-decoration: none;

   

}

.w3agile_blog_left{

    line-height: 0px !important;

}

.w3l_categories h3{

    margin-top: 40px;

    margin-bottom: 20px;

}

 

        .div-result-heading p{

            font-family: var(--font-family_new) !important;

        }

        .wthree-inner-sec {

            background: #Fe5454;

            margin-top: -120px;

            padding: 0em 1.5em 1.5em;

            border-radius: 7px;

        }        

        .inner-banner-agile {

            min-height: 180px;

        }   

        .sec-head {

            margin: 4em 0 0em;

        }




      /* .blog-main-image{
        width: 100%;
        height: 200px;
      }
      


      @media only screen and (max-width: 762px){
        .blog-main-image{
        width: 100% !important;
        height: 0%;
      }

    
      } */

      .wthreesearch .btn-default {
    margin-top: -5px;
    height: 34px;
}

      

    </style>

</head>


<body >

         <?php include "menu.php"?> 

<!---CARD--->

            <!-- <div class="card">

                    <div class="card-heading">

                             <h3><center><span>CATEGORY</span></center><h3>

                    </div>

            </div> -->

            
<div class="container-fluid blogpage-space" id="cont">

<section>

<div class="col-lg-12">       

    <div class="row">



    <div class="col-lg-9 col-md-12 col-sm-12  btm-wthree-left p-3">

        

        <?php 

        $query = "SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}";

        $result=$db->query($query);



        if($result->num_rows>0){

        while($data =$result->fetch_assoc()){

        $Headings = $data['Headings'];

        $Short_Description =  $data['Short_Description'];

            // $DtTime = $data['Full_Description'];    

        ?>

        <div class="card">

        

            <div class="card_design" id="align-item">

           



                <div class="row">    

                <div class="col-md-3 card_data_img">

                    <!-- <div class="col-lg-12"> -->

                    

                    

                        <div class="w3agile_special_deals_grid_left_grid" >

                        <a href="<?= $base_url ?>blog/<?php echo $data['Blog_Url']; ?>">

                         <img src="<?= $base_url ?>images/<?php echo $data['Image']; ?>" class="img-responsive blog-main-image" style="height: 150px;" alt="" />

                        </a>

                    

                     </div>

                        

                </div>

                <div class="col-md-9 card_data_head"> 

                    <div class="card__heading__text">

                    <a href="<?= $base_url ?>blog/<?php echo $data['Blog_Url']; ?>"><h4><?php echo $data['Headings']; ?></h4></a>

                        <p><?php echo $data['Short_Description']; ?></p>
                        

                    </div>

                </div>

                </div>

            

            </div> 

            

        </div>

        <div class="break">

                     <br>

            </div>

            <?php } 

        }
        else{ ?>



            <div class="text-center mt-5">
            <h1>NO DATA MATCHES</h1>
            </div>
            
            
            <?php  }   ?>

            <?php

					$sql = "SELECT COUNT(*) AS Num FROM {$statement}";

                    $res=$db->query($sql);

					// $res = mysqli_query($conn, $sql);



    				$row = mysqli_fetch_array($res);

	

   					$total = $row['Num'];



            if($total > 5){

                // echo "yes"; exit;

                $url = $base_url.'blog_search'.$SearchKey.'/';

                echo "<div id='pagingg' >";

                echo pagination($statement,$limit,$page,$url);

                echo "</div>";

                    }

             ?>
          

               

        

                

            </div>

            <div class="col-lg-3 w3agile_blog_left"> 

     <div class="wthreesearch">

                    <form id="search-blog-form" action="<?= $base_url; ?>blog_search.php" method="post">

                        <input type="text"  name="Search_text" id="Search_text" placeholder="Search..." required="">

                        <button type="submit" name="btn-search" class="btn btn-default btn-search" aria-label="Left Align">

                            <i class="fa fa-search" aria-hidden="true"></i>

                        </button>

                    </form>

        </div>



            <div class="w3l_categories">

                    <h3 style="margin-bottom: 10px;">Categories</h3>

                <div class="card">

                    <ul class="m-0">

                      <?php

                    $arrCategories = $db->getRows("select * from categories ");

                    foreach ($arrCategories as $value) { ?>

                      <li>
                        <a href="<?= $base_url ?>category/<?= $value['Category_Link'] ?>" data-id="<?= $value['Category_Id'] ?>">
                        <div class="d-flex">
                            <div> 
                                <i class="fa fa-long-arrow-right" aria-hidden="true" style="color:#fe5454;padding: 6px 10px 10px 10px;font-weight:900"></i>
                            </div>

                            <div style="line-height: 20px;">
                              <p class="mb-1 mt-1"><?= $value['Category_Name'] ?></p>
                            </div>
                        </div>
                        </a>
                    </li>

                    <?php } ?>

                    </ul>

                </div>

            </div>

            <div class="break"><br></div>

         

         <div class="pop-heading">

                <h3  style="margin-bottom: 10px;">RECENT POST<h3>

         </div> 

         <div class="break"><br></div>

     <?php

            $arrRecentPost = $db->getRows("SELECT * from blog_details ORDER BY Blog_ID DESC LIMIT 2");

            foreach($arrRecentPost as $data){ 

     

     $DtTime = date("M d, Y", strtotime($data['DtTime'])); ?>

     <div class="card">

                

    

                        

                        

                            <div class="w3agile_special_deals_grid_left_grid img_special">

                                    <a href="<?= $base_url ?>blog/<?php echo $data['Blog_Url']; ?>">

                                         <img src="<?= $base_url ?>images/<?php echo $data['Image']; ?>" class="img-responsive" alt="" />

                                    </a>

                                

                            </div>

                    

                   <div class="col-lg-12">    

                        

                        <div class="agileits_recent_posts_gridr">

                            <h5><a href="<?= $base_url ?>blog/<?php echo $data['Blog_Url']; ?>"><?= $data['Headings']; ?></a></h5>

                            

                            <h6><i class="fa fa-calendar" aria-hidden="true"></i>

                                <?= $DtTime; ?>

                            </h6>

                            

                        </div>

                  </div>

                        

                        

            

        </div>

        

        <div class="break1"><br></div>

                         

    <?php } ?>    

                   

        

      

     

    <div class="w3ls_recent_posts">

                <?php

                $arrRelatedPost = $db->getRows(" SELECT * FROM `blog_details` ORDER BY Blog_ID DESC LIMIT 2 "); 

                if(count($arrRelatedPost) > 0){ ?>

                    <h3  style="margin-bottom: 10px;">Related Posts</h3>

                    <div class="break"><br></div>

                    <?php

                    foreach ($arrRelatedPost as $row) { 

                        $DtTime = date("M d, Y", strtotime($row['DtTime'])); ?>  

                        <div class="card">                 

                        

                            

                                <div class="w3agile_special_deals_grid_left_grid img_special">

                                    <a href="<?= $base_url ?>blog/<?php echo $row['Blog_Url']; ?>"><img src="<?= $base_url ?>images/<?= $row['Image'] ?>" class="img-responsive" alt="" /></a>

                                </div>

                            <div class="col-lg-12">

                            <div class="agileits_recent_posts_gridr">

                                <h5><a href="<?= $base_url ?>blog/<?php echo $row['Blog_Url']; ?>"><?= $row['Headings'] ?></a></h4>

                                <h6><i class="fa fa-calendar" aria-hidden="true"></i><?= $DtTime ?></h5>

                            </div>

                            </div>

                            

                        

                        </div>

                        <div class="break1"><br></div>

                    <?php } 

                } ?>                  

            </div>

                </div>

     <div class="clearfix"> </div>

     </div>

  

     

        

    </div>

    </section> 

</div>

            







   





<!--====== Javascripts & Jquery ======-->

<script src="<?= $base_url ?>js/jquery-3.2.1.min.js"></script>

<script src="<?= $base_url ?>js/bootstrap.min.js"></script>

<script src="<?= $base_url ?>js/owl.carousel.min.js"></script>

<script src="<?= $base_url ?>js/circle-progress.min.js"></script>

<script src="<?= $base_url ?>js/main.js"></script>





<!----------------datatables---------->

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<!------------------>



<script>

$(document).ready( function () {

$('#table_content').DataTable();

} );

</script>

    <script type="text/javascript">

        jQuery(document).ready(function($) {

            $(".scroll").click(function(event){     

                event.preventDefault();

                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);

            });

        });

    </script>

    <!-- <script type="text/javascript">

        $(document).ready(function() {

            /*

                var defaults = {

                containerID: 'toTop', // fading element id

                containerHoverID: 'toTopHover', // fading element hover id

                scrollSpeed: 1200,

                easingType: 'linear' 

                };

            */

            

            $().UItoTop({ easingType: 'easeOutQuart' });

                                

            });

    </script> -->

    <!-- //here ends scrolling icon -->



    <script src="<?= $base_url ?>js/bootstrap.js"></script>



    <script type="text/javascript">

        var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);

        $("#menu li a").each(function(){

            var menuurl = $(this).attr("href");

            if(menuurl == pgurl ){

                $(this).addClass("active"); 

            }else{

                $(this).removeClass("active"); 

            }

            if(menuurl == 'index.php' && pgurl == ''){

                $(this).addClass("active"); 

            }

            if(menuurl == 'viewportfolio.php' && pgurl == 'portfolio.php'){

                $(this).addClass("active"); 

            } 

            if(menuurl == 'services.php' && (pgurl=='MobileAppDevelopment.php' || pgurl == 'EcommerceDevelopment.php' || pgurl == 'DigitalMarketing.php' || pgurl == 'ERPandCRMDevelopment.php' || pgurl == 'WebDesignandApplications.php' || pgurl == 'GraphicDesigning.php')){

                $(this).addClass("active"); 

            }       

        });



    </script>

    <?php 

    error_reporting(0);

    session_start();

    //session_destroy();



    //$pgurl = "<script>document.writeln(pgurl);</script>";

    if(time() - $_SESSION['time'] > 600){

        session_destroy();

    } ?>



<script type="text/javascript">

    $('.nav-item').click(function(){

        //$('.nav-item').removeClass('active');

        $('.nav-item').removeClass('active');

        $(this).addClass('active');

        //return false;

    });



    //Search Submit function

    //Jun-10-2019

    $('#search-blog-form').on('submit', function (e) {

        var Search = $('#Search_text').val();

        var URL = '<?php echo $base_url; ?>blog_search/';

        var Skey = Search.replace(/ /g,'-');

        var SearchKey = URL+Skey;

        //alert(SearchKey);

        window.location.href = SearchKey;

        return false;

    }); 

</script>

<script>
    function mobileMenu() {
        var mobileMenuLinks = document.getElementById('menuDropdown');
        mobileMenuLinks.classList.remove('collapse');
        mobileMenuLinks.classList.add('collapsing');

        setTimeout(function() {
            // Code to run after the pause
            mobileMenuLinks.classList.add('collapse');
            mobileMenuLinks.classList.remove('collapsing');
            mobileMenuLinks.classList.toggle("show");
        }, 800);

    }
</script>
<?php include "footer.php" ; ?>	
</body>
</html>