<?php include('starter.php'); ?>
<!DOCTYPE html>
<html lang="en">

<?php 
function pagination($query, $per_page = 10,$page = 1 , $url='?'){        

    include 'db_connection.php';
    $sql = "SELECT COUNT(*) as num FROM {$query}";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    $total = $row['num'];
    $adjacents = "5"; 
    $page = ($page == 0 ? 1 : $page); 
    $start = ($page - 1) * $per_page;                               
    $prev = $page - 1;                          
    $next = $page + 1;
    $lastpage = ceil($total/$per_page);
    // $page = ($page > $lastpage ? 1 : $page);  
    if($page > $lastpage){
     // echo $_SERVER['HTTP_HOST'].'///'; exit;
        redirect('/blogs/1');
    }

    $lpm1 = $lastpage - 1;
    $pagination = "";
    if($lastpage > 1)

    {   
      $pagination .= "<ul class='pagination'>";
      $pagination .= "<li class='details' style='margin-top:11px'>Page $page of $lastpage</li>";
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
$limit = 5; //if you want to dispaly 10 records per page then you have to change here
$startpoint = ($page * $limit) - $limit;
$statement = "blog_details order by Blog_ID DESC"; //you have to pass your query over here
// $TotalRecord = $db->getVal("SELECT COUNT(*) as num FROM {$statement}");
$TotalRecord = "SELECT COUNT(*) AS Num FROM {$statement}";
//echo $TotalRecord; exit;
//$arrResult = $db->getRows("SELECT * from {$statement} LIMIT {$startpoint} , {$limit}");
$arrResult = "SELECT * from {$statement} LIMIT {$startpoint} , {$limit}";

//  echo $db->getLastquery(); exit;

//echo $arrResult; exit;
?>

<head>
    <title>Expert Cardiology Advice: Explore DrDCR's Insightful Blogs</title>
    <meta name="description" content="Explore DrDCR's Insightful Cardiologist Blogs. Enhance your heart knowledge and well-being. Dive into expert insights for a healthier life today.">
    <meta name="keywords" content="Cardiac health, heart health, cardiac diseases, heart diseases, cardiac care, heart care, cardiac surgery, heart surgery, cardiac specialists, heart specialists, cardiac diagnosis, heart diagnosis, cardiac treatment, heart treatment, cardiac rehabilitation, heart rehabilitation, cardiac medications">
	
    <!-- OGTC -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Expert Cardiology Advice: Explore DrDCR's Insightful Blogs">
    <meta property="og:description" content="Explore DrDCR's Insightful Cardiologist Blogs. Enhance your heart knowledge and well-being. Dive into expert insights for a healthier life today.">
    <meta property="og:url" content="https://www.drdcr.com/blogs.php">
    <meta property="og:image" content="https://www.drdcr.com/new-images/doctor4.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="DrDCR">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Expert Cardiology Advice: Explore DrDCR's Insightful Blogs">
    <meta property="twitter:description" content="Explore DrDCR's Insightful Cardiologist Blogs. Enhance your heart knowledge and well-being. Dive into expert insights for a healthier life today.">
    <meta property="twitter:image:src" content="https://www.drdcr.com/new-images/doctor4.png">
    <meta property="twitter:image:width" content="1200">
    <meta property="twitter:image:height" content="630">

    <!--Include common header links -->
    <link href="<?= $base_url ?>pagination/css/pagination.css" rel="stylesheet" type="text/css" />
    <link href="<?= $base_url ?>pagination/css/A_green.css" rel="stylesheet" type="text/css" />
    <link href="<?= $base_url ?>css/blog_css.css" type="text/css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="<?= $base_url ?>css/restyle.css">
    <link rel="canonical" href="https://www.drdcr.com/blogs.php">
    <?php include "header.php"; ?>

    <style type="text/css">
        @media screen and (max-width: 2000px) {
            #left_grid {
                padding-bottom: 5px;
            }
        }

        @media screen and (max-width: 400px) {
            .single-left {
                margin-left: -5px;
                width: 50%;
            }
        }

        @media screen and (max-width: 1050px) {
            .card ul li a {
                font-size: 16px;
            }
        }

        .w3agile_special_deals_grid_left_grid {
            /* flex: 0 1 calc(25% - 1em); */
            box-shadow: none !important;
            border: 2px solid rgba(0, 0, 0, .125);
            border-radius: 10px;
            margin: 10px;
        }

        .card:hover {
            box-shadow: none !important;
        }

        .card {
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-between;
            /* box-shadow: none !important; */
            box-shadow: 0 2px 8px 0 rgb(0 0 0 / 20%) ! important;
            border: 2px solid rgba(0, 0, 0, .125);
            margin: 5px;
            /* box-shadow: 0 1px 5px #00000099; */
            border-radius: 10px;

        }

        .break {
            height: 25px;
        }

        .break1 {
            height: 25px;
        }

        .img_special {
            width: 220px;
        }

        #align-item {
            padding: -10px;
        }

        .card__heading__text {
            padding: 15px;
            margin-top: 10px;
        }

        h6 {
            color: #ff6700 !important;
            padding: 5px;
            text-align: center;
        }

        h5 {
            box-shadow: none !important;
            text-align: center;
            padding: 5px;
            font-family: inherit;
        }

        h5 a {
            color: #464646 !important;
        }

        .card:hover {
            transition-duration: 150ms;
            box-shadow: 0 5px 20px 5px #00000044;
        }

        .card:hover.card_data_head {
            transform: scale(1.25) rotate(2deg);
        }

        .img_special {
            left: -10px;
            margin-top: 0px;
            width: 100%;
            padding: 5px;
        }

        .pagination {
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
            background: -moz-linear-gradient(top, #fe5454, #fe5454);
            background: -webkit-gradient(linear, 0 0, 0 100%, from(#fe5454), to(#fe5454));
            padding: 10px 10px;
        }

        a:not([href]):not([tabindex]) {
            color: white;
            text-decoration: none;
        }

        .w3agile_blog_left {
            line-height: 0px !important;
        }

        .w3l_categories h3 {
            margin-top: 40px;
            margin-bottom: 10px;
        }

        h4 {
            color: #464646 !important;
        }

        .wthreesearch .btn-default {
            margin-top: -5px;
            height: 35px;
        }

        .w3l_categories ul li a {
            /* white-space: nowrap; */
        }

        .break {
            height: 15px;
        }

        .break_popular_h {
            height: 23px;
        }

        .break_popular {
            height: 15px;
        }

        .w3ls_recent_posts {
            margin-top: 5px
        }

        .break_related {
            height: 15px;
        }

        .site-footer {
            margin-top: 0px;
        }

        #img_res {
            border: none !important;
        }

        .img_align:hover {
            transition: all 1s;
            transition: .3s all ease;
        }

        #left_grid {
            border: none !important;
        }
    </style>
</head>

<body>
    <?php include 'menu.php' ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container-fluid" id="cont">
        <section>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-9 btm-wthree-left ">
                        <?php 
        $query = "SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}";
        $result= $db->query($query);

        if($result->num_rows>0){
        while($data =$result->fetch_assoc()){
        $Headings =  $data['Headings'];
        $Short_Description =  $data['Short_Description'];

            // $DtTime = $data['Full_Description'];    
        ?>
                        <div class="card">
                            <div class="card_design" id="align-item">
                                <div class="row">
                                    <div class="col-md-3">
                                        <!-- <div class="col-lg-12"> -->
                                        <div class="w3agile_special_deals_grid_left_grid" id="left_grid" ;>

                                            <a href="<?= $base_url ?>blog/<?php echo $data['Blog_Url']; ?>">
                                                <img style="width:100%; height:auto; padding:10px;  object-fit: cover;"
                                                    src="<?= $base_url ?>images/<?php echo $data['Image']; ?>"
                                                    class="img_resp" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-9 card_data_head" style="width:100%; height:100%;">
                                        <div class="card__heading__text">
                                            <a href="<?= $base_url ?>blog/<?php echo $data['Blog_Url']; ?>">
                                                <h4>
                                                    <?php echo $data['Headings']; ?>
                                                </h4>
                                            </a>
                                            <p>
                                                <?php echo $data['Short_Description']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="break"></br></div>
                        <?php } 
            } else{?>

                        <h2 class="text-center mt-5">No datas to show</h2>

                        <?php } ?>
                        <?php
					$abc =$db->getVal("SELECT COUNT(*) AS Num FROM {$statement}");

          			  if($abc >5){
               			$url = $base_url.'blogs/';
                		echo "<div id='pagingg'>";
                		echo pagination($statement,$limit,$page,$url);
                		echo "</div>";
           		 } ?>
                    </div>
                    <div class="col-lg-3 w3agile_blog_left p-1">

                        <div class="wthreesearch">

                            <form id="search-blog-form" action="<?= $base_url; ?>blog_search.php" method="post">
                                <input type="text" name="Search_text" id="Search_text" placeholder="Search..."
                                    required="">
                                <button type="submit" name="btn-search" class="btn btn-default btn-search"
                                    aria-label="Left Align">

                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>

                            </form>
                        </div>
                        <div class="w3l_categories">
                            <h3>Categories</h3>
                            <div class="card">
                                <ul class="m-0">

                                    <?php

                    $arrCategories = $db->getRows("select * from categories ");
                    foreach ($arrCategories as $value) { ?>
                                    <li>
                                        <a href="<?= $base_url ?>category/<?= $value['Category_Link'] ?>"
                                            data-id="<?= $value['Category_Id'] ?>">
                                            <div class="d-flex ">
                                                <div>
                                                    <i class="fa fa-long-arrow-right" aria-hidden="true"
                                                        style="color:#fe5454;padding: 6px 10px 10px 10px;font-weight:900"></i>
                                                </div>

                                                <div style=" line-height: 20px;">
                                                    <p class="mt-1 mb-1">
                                                        <?= $value['Category_Name'] ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="pop-heading">
                            <div class="break_popular_h"><br></div>
                            <h3 style="margin-bottom: 10px;">RECENT POST<h3>
                        </div>
                        <?php
            $arrRecentPost = $db->getRows("SELECT * from blog_details ORDER BY Blog_ID DESC LIMIT 3");
            foreach($arrRecentPost as $data){ 
            $DtTime = date("M d, Y", strtotime($data['DtTime'])); ?>
                        <div class="card">
                            <div class="w3agile_special_deals_grid_left_grid img_special">
                                <a href="<?= $base_url ?>blog/<?php echo $data['Blog_Url']; ?>">

                                    <img src="<?= $base_url ?>images/<?php echo $data['Image']; ?>"
                                        class="img-responsive" alt="" />
                                </a>

                            </div>
                            <div class="col-lg-12">
                                <div class="agileits_recent_posts_gridr">
                                    <h5><a href="<?= $base_url ?>blog/<?php echo $data['Blog_Url']; ?>">
                                            <?= $data['Headings']; ?>
                                        </a></h5>
                                    <h6><i class="fa fa-calendar" aria-hidden="true"></i>

                                        <?= $DtTime; ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="break_popular"><br></div>
                        <?php } ?>
                        <div class="w3ls_recent_posts">
                            <div class="break_related_h"><br></div>

                            <?php

                // $arrRelatedimg = $db->getRows(" SELECT * FROM `blog_details` ORDER BY Blog_ID DESC LIMIT 3 "); 

                //$arrRelatedPost = $db->getRows(" SELECT * FROM `categories`  ");

                $arrRelatedPost = $db->getRows("SELECT Blog_Url,blog_details.image as blog_image,categories.Category_Name,categories.Category_Link,categories.Category_Id,blog_details.Headings as blog_Headings,blog_details.DtTime as blog_DtTime FROM `blog_details` JOIN categories ON blog_details.Category=categories.Category_Id");
                if(count($arrRelatedPost) > 0){ ?>

                            <h3 style="margin-bottom: 10px;">Related Posts</h3>

                            <?php
                    foreach ($arrRelatedPost as $row_cat) { 
                        $DtTime = date("M d, Y", strtotime($row_cat['blog_DtTime'])); ?>

                            <div class="card">

                                <div class="w3agile_special_deals_grid_left_grid img_special">

                                    <a href="<?= $base_url ?>category/<?= $row_cat['Category_Link'] ?>"
                                        data-id="<?= $row_cat['Category_Id'] ?>">
                                        <p class="my-3 px-3 text-center"
                                            style="color:#C84B31 !important; line-height: 20px; ">
                                            <?= $row_cat['Category_Name'] ?>
                                        </p>
                                    </a>

                                    <!-- <a href="<?//= $base_url ?>blog/<?php// echo $row_cat['blog_Headings'] ?>"><img src="<?//= $base_url ?>/images/<?//= $row_cat['blog_image'] ?>" class="img-responsive" alt="" style="margin-top: 20px;" /></a> -->
                                    <a href="<?= $base_url ?>blog/<?php echo $row_cat['Blog_Url']; ?>"><img
                                            src="<?= $base_url ?>images/<?= $row_cat['blog_image'] ?>"
                                            class="img-responsive" alt="" style="margin-top: 20px;" /></a>

                                </div>

                                <div class="col-lg-12">

                                    <div class="agileits_recent_posts_gridr">

                                        <h5><a href="<?= $base_url ?>blog/<?php echo $row_cat['Blog_Url']; ?>">
                                                <?= $row_cat['blog_Headings'] ?>
                                            </a></h4>
                                            <h6><i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?= $DtTime ?>
                                        </h5>

                                    </div>

                                </div>

                            </div>
                            <div class="break_related"><br></div>
                            <?php } ?>
                            <?php } ?>

                        </div>
                    </div>

                    <div class="clearfix"> </div>

                </div>

            </div>

        </section>

    </div>

    <!---CARD---->

    <?php include 'footer.php'?>

    <!--====== Javascripts & Jquery ======-->

    <script src="<?= $base_url ?>js/jquery-3.2.1.min.js"></script>

    <script src="<?= $base_url ?>js/bootstrap.min.js"></script>

    <script src="<?= $base_url ?>js/owl.carousel.min.js"></script>

    <script src="<?= $base_url ?>js/circle-progress.min.js"></script>

    <script src="<?= $base_url ?>js/main.js"></script>

    <script src="<?= $base_url ?>js/services_jav.js"></script>

    <!----------------datatables---------->

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

    <!------------------>

    <script>

        $(document).ready(function () {

            $('#table_content').DataTable();

        });

    </script>

    <script>
        $('#search-blog-form').on('submit', function (e) {

            var Search = $('#Search_text').val();

            var URL = '<?php echo $base_url; ?>blog_search/';

            var Skey = Search.replace(/ /g, '-');

            var SearchKey = URL + Skey;

            // alert(SearchKey);

            window.location.href = SearchKey;

            return false;

        });

    </script>

    <!----------------jquery alert plugin---------->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<?php include "footer.php" ; ?>
</body>
</html>