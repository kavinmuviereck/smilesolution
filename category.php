<?php include('starter.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'header.php'; 

if (isset($_GET['category']) && !empty($_GET['category'])) {

    $Category = $_GET['category'];
} else {

    redirect($base_url . '/blogs.php');
}



function pagination($query, $per_page = 10, $page = 1, $url = '?')
{

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

    $lastpage = ceil($total / $per_page);

    // $page = ($page > $lastpage ? 1 : $page);  

    if ($page > $lastpage) {

        // echo $_SERVER['HTTP_HOST'].'///'; exit;

        redirect($url . '1');
    }

    $lpm1 = $lastpage - 1;



    $pagination = "";



    if ($lastpage > 1) {

        $pagination .= "<ul class='pagination'>";

        $pagination .= "<li class='details' style='margin-top:2px'>Page $page of $lastpage</li>";

        if ($lastpage < 7 + ($adjacents * 2)) {

            for ($counter = 1; $counter <= $lastpage; $counter++) {

                if ($counter == $page)

                    $pagination .= "<li><a class='current'>$counter</a></li>";

                else

                    $pagination .= "<li><a href='{$url}$counter'>$counter</a></li>";
            }
        } elseif ($lastpage > 5 + ($adjacents * 2)) {

            if ($page < 1 + ($adjacents * 2)) {

                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {

                    if ($counter == $page)

                        $pagination .= "<li><a class='current'>$counter</a></li>";

                    else

                        $pagination .= "<li><a href='{$url}$counter'>$counter</a></li>";
                }

                $pagination .= "<li class='dot'>...</li>";

                $pagination .= "<li><a href='{$url}$lpm1'>$lpm1</a></li>";

                $pagination .= "<li><a href='{$url}$lastpage'>$lastpage</a></li>";
            } elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {

                $pagination .= "<li><a href='{$url}1'>1</a></li>";

                $pagination .= "<li><a href='{$url}2'>2</a></li>";

                $pagination .= "<li class='dot'>...</li>";

                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {

                    if ($counter == $page)

                        $pagination .= "<li><a class='current'>$counter</a></li>";

                    else

                        $pagination .= "<li><a href='{$url}$counter'>$counter</a></li>";
                }

                $pagination .= "<li class='dot'>..</li>";

                $pagination .= "<li><a href='{$url}$lpm1'>$lpm1</a></li>";

                $pagination .= "<li><a href='{$url}$lastpage'>$lastpage</a></li>";
            } else {

                $pagination .= "<li><a href='{$url}1'>1</a></li>";

                $pagination .= "<li><a href='{$url}2'>2</a></li>";

                $pagination .= "<li class='dot'>..</li>";

                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {

                    if ($counter == $page)

                        $pagination .= "<li><a class='current'>$counter</a></li>";

                    else

                        $pagination .= "<li><a href='{$url}$counter'>$counter</a></li>";
                }
            }
        }



        if ($page < $counter - 1) {

            $pagination .= "<li><a href='{$url}$next'>Next</a></li>";

            $pagination .= "<li><a href='{$url}$lastpage'>Last</a></li>";
        } else {

            $pagination .= "<li><a class='current'>Next</a></li>";

            // $pagination.= "<li><a class='current'>Last</a></li>";

        }

        $pagination .= "</ul>\n";
    }



    return $pagination;
}



?>




<!-- Stylesheets -->





<style>
    @media screen and (max-width: 1050px) {

        .card ul li a {

            font-size: 16px;

        }

    }

    .copyright {

        background: none !important;

    }

    /* .navbar-light{

    background-color: #e263a9;

    margin-top: -65px;

} */

    .card {

        border-radius: 20px;

    }

    .card:hover {

        transition-duration: 150ms;

        box-shadow: 0 5px 20px 5px #00000044;

    }

    .card {

        display: flex;

        flex-wrap: wrap;

        justify-content: space-between;

        /* box-shadow: none !important; */

        box-shadow: 0 0px 0px 0 rgb(0 0 0 / 20%) ! important;

        border: 2px solid rgba(0, 0, 0, .125);

        margin: 5px;

        /* box-shadow: 0 1px 5px #00000099; */

        border-radius: 10px;

    }

    .div-result-heading h2 {

        text-align: center;

    }

    .w3agile-middle ul li {

        list-style: none;

    }

    .w3l_categories ul li {

        list-style: none;

    }

    .flow-element {

        width: 95%;

        padding: 10px;

    }

    .header-title {

        text-align: center;

    }

    .card_design {

        width: 100%
    }

    .agileits_recent_posts_gridr h4 {

        text-align: center;

    }

    #search-blog-form {

        margin-top: -20px;

    }

    .nav-items {

        padding: 0px;

    }

    .nav-links {

        padding: 20px;

        color: white;

    }

    .nav-links:hover {

        color: #ed254c;

    }

    .navbar-nav {

        text-align: center;

        /* margin-left:10pc; */

    }

    .breaks {

        height: 2px;

        padding: 0px;

    }

    .w3agile-top h3 a {

        text-align: center;

    }

    .flow-element {

        position: relative;

        /* left: 20px; */

    }

    h5 a {

        color: #464646 !important;

        font-family: inherit !important;

        text-align: center;

    }

    .agileits_popular_posts_grid {

        text-align: center;

    }

    .w3l_categories ul li {

        font-size: 15px;

    }

    .img-responsive {

        border-radius: 10px;

    }

    h6 {

        color: #ff6700 !important;

        padding: 5px;

        text-align: center !important;

    }

    h5 {

        text-align: center !important;

    }

    #cont {

        /* margin-top: 50px; */

        position: relative;

        /* top:60px; */

    }

    .w3ls_recent_posts {

        margin-top: 0px;

    }

    .w3l_categories {

        margin-top: 30px;

    }

    .img-responsive {

        padding: 5px;

    }

    .a.agileits.w3layouts {

        background-color: #ff6700 !important;

        border: 1px solid #ff6700 !important;

    }
</style>
</head>

<body >

    <?php include "menu.php"?> 

    <link rel="stylesheet" href="<?= $base_url ?>/css/service_style.css" />


    <!----services---->



    <!-- services -->



    <?php

    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);

    $limit = 5; //if you want to dispaly 10 records per page then you have to change here

    $startpoint = ($page * $limit) - $limit;

    $statement = "blog_details where Category = (SELECT Category_Id from categories WHERE Category_Link='" . $Category . "') ORDER BY Blog_ID DESC"; //you have to pass your query over here

    $TotalRecord = $db->getVal("SELECT COUNT(*) as num FROM {$statement}");

    $arrResult = $db->getRows(" SELECT * from {$statement} LIMIT {$startpoint} , {$limit}");

    // echo $db->getLastQuery();



    $CatgName = $db->getRow(" SELECT * from categories WHERE Category_Link = '" . $Category . "' ");


    $get_categories_id = $CatgName['Category_Id'];


    ?>











    <br><br><br><br><br>

    <div class="container-fluid" id="cont">

        <div class="col-lg-12">

            <div class="row">



                <div class="col-lg-9 btm-wthree-left p-3">



                    <div class="btn_card">

                        <?php

                        foreach ($arrResult as $data) {

                            $Description =  $data['Short_Description'];

                            //$DtTime = $data['Description'];

                            $DtTime = date("M d, Y", strtotime($data['DtTime'])); ?>

                            <div class="card card_design">

                                <div class="flow-element">

                                    <div class="wthree-top">





                                        <div class="w3agile-top">

                                            <div class="header-title">

                                                <h3><a href="<?= $base_url ?>/blog/<?php echo $data['Blog_Url']; ?>"><?= $data['Headings']; ?> </a></h3>

                                            </div>

                                            <div class="w3agile_special_deals_grid_left_grid">

                                                <a href="<?= $base_url ?>/blog/<?php echo $data['Blog_Url']; ?>">

                                                    <img src="<?= $base_url ?>/images/<?php echo $data['Image']; ?>" class="img-responsive" alt="" />

                                                </a>

                                            </div>

                                            <div class="w3agile-middle">

                                                <ul>

                                                    <li><a href="<?= $base_url ?>/blog/<?php echo $data['Blog_Url']; ?>">

                                                            <i class="fa fa-calendar" aria-hidden="true"></i><?php echo $DtTime ?></a>

                                                    </li>

                                                </ul>

                                            </div>

                                        </div>



                                        <div class="w3agile-bottom">

                                            <div class="col-md-12 w3agile-right">

                                                <p><?php echo $Description; ?></p>

                                                <a class="agileits w3layouts" href="<?= $base_url ?>/blog/<?php echo $data['Blog_Url']; ?>">Read More <span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>

                                            </div>

                                            <div class="clearfix"></div>

                                        </div>



                                    </div>

                                </div>

                            </div>
                            <div class="break"><br></div>





                        <?php }
                        if (count($arrResult) == 0) {  ?>
                            <div>
                                <p class="text-center" style="font-size: 30px; color: #C84B31 !important; padding: 30px;">
                                    No Data To Show
                                </p>
                            </div>

                        <?php }



                        if ($TotalRecord > 5) {

                            $url = $base_url . '/category/' . $Category . '/';

                            echo "<div id='pagingg' >";

                            echo pagination($statement, $limit, $page, $url);

                            echo "</div>";
                        }


                        ?>



                    </div>



                </div>



                <!-- //btm-wthree-left -->

                <!-- btm-wthree-right -->

                <div class="col-lg-3 w3agile_blog_left p-1">

                    <div class="wthreesearch">

                        <form id="search-blog-form" action="<?= $base_url; ?>blog_search.php" method="post">

                            <input type="text" name="Search_text" id="Search_text" placeholder="Search..." required="">

                            <button type="submit" name="btn-search" class="btn btn-default btn-search" aria-label="Left Align" style=" padding: 5px 10px;">

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
                                        <a href="<?= $base_url ?>/category/<?= $value['Category_Link'] ?>" data-id="<?= $value['Category_Id'] ?>">
                                            <div class="d-flex">
                                                <div style=" margin-top: -5px;">
                                                    <i class="fa fa-long-arrow-right" aria-hidden="true" style="color:#fe5454;padding: 11px 10px 10px 10px;font-weight:900"></i>
                                                </div>

                                                <div style="line-height: 20px;">
                                                    <p class="mt-1 mb-1"><?= $value['Category_Name'] ?></p>
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

                        <h3 style="margin-bottom: 10px;">RECENT POST<h3>

                    </div>



                    <?php

                    $arrRecentPost = $db->getRows("SELECT * from blog_details ORDER BY Blog_ID DESC LIMIT 3");

                    foreach ($arrRecentPost as $data) {



                        $DtTime = date("M d, Y", strtotime($data['DtTime'])); ?>

                        <div class="card">









                            <div class="w3agile_special_deals_grid_left_grid img_special">

                                <a href="<?= $base_url ?>/blog/<?php echo $data['Blog_Url']; ?>">

                                    <img src="<?= $base_url ?>/images/<?php echo $data['Image']; ?>" class="img-responsive" alt="" />

                                </a>



                            </div>



                            <div class="col-lg-12">



                                <div class="agileits_recent_posts_gridr">

                                    <h5><a href="<?= $base_url ?>/blog/<?php echo $data['Blog_Url']; ?>"><?= $data['Headings']; ?></a></h5>



                                    <h6><i class="fa fa-calendar" aria-hidden="true"></i>

                                        <?= $DtTime; ?>

                                    </h6>



                                </div>



                            </div>



                        </div>
                        <div class="break"><br></div>

                    <?php } ?>



                    <div class="w3ls_recent_posts">

                        <?php

                        // $arrRelatedPost = $db->getRows(" SELECT * FROM `blog_details` ORDER BY Blog_ID DESC LIMIT 3 ");

                        // echo $get_categories_id;
                        $arrRelatedPost = $db->getRows("SELECT Blog_Url, blog_details.image as blog_image,categories.Category_Name,blog_details.Headings as blog_Headings,blog_details.DtTime as blog_DtTime FROM `blog_details` JOIN categories ON blog_details.Category=categories.Category_Id WHERE blog_details.Category='$get_categories_id'");


                        if (count($arrRelatedPost) > 0) { ?>

                            <h3 style="margin-bottom: 10px;">Related Posts</h3>



                            <?php

                            foreach ($arrRelatedPost as $row_blog) {

                                $DtTime = date("M d, Y", strtotime($row_blog['blog_DtTime'])); ?>

                                <div class="card">





                                    <div class="w3agile_special_deals_grid_left_grid img_special">

                                        <a href="<?= $base_url ?>/blog/<?php echo $row_blog['Blog_Url']; ?>"><img src="<?= $base_url ?>images/<?= $row_blog['blog_image'] ?>" class="img-responsive" alt="" /></a>

                                    </div>

                                    <div class="col-lg-12">

                                        <div class="agileits_recent_posts_gridr">

                                            <h5><a href="<?= $base_url ?>/blog/<?php echo $row_blog['Blog_Url']; ?>"><?= $row_blog['blog_Headings'] ?></a></h4>

                                                <h6><i class="fa fa-calendar" aria-hidden="true"></i><?= $DtTime ?>
                                            </h5>

                                        </div>

                                    </div>





                                </div>
                                <div class="break"><br></div>



                        <?php }
                        } ?>

                    </div>

                </div>

                <div class="clearfix"> </div>

            </div>







        </div>

        </section>

    </div>



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

    <!---CARD---->

    <?php include "footer.php" ; ?>	
</body>
</html>