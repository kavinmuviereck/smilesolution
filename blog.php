<?php include('starter.php'); ?>
<!DOCTYPE html>
<html lang="en">


    <?php 

$currentURL = $_SERVER['REQUEST_URI'];

$url = $currentURL;
// echo $url ; exit;

// Extract the path from the URL
$path = parse_url($url, PHP_URL_PATH);

// Split the path into individual segments
$segments = explode('/', $path);

// Get the last segment (assuming it represents the file or resource name)
$lastSegment = end($segments);

// Split the last segment into sentences
$sentences = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', $lastSegment);

// Get the last sentence
$lastSentence = end($sentences);

// Trim any leading or trailing whitespace
$lastSentence = trim($lastSentence);

// Output the last sentence



$BlogDetails = $db->getRow(" SELECT * from blog_details where Blog_Url = '".$lastSentence."'"); 
$BlogTitles = $BlogDetails['Title'];
?>
<head>
    <?php include 'header.php'; ?>

    <link rel="stylesheet" type="text/css" href="<?= $base_url ?>css/blog_page.css">

</head>

<body >
         <?php include "menu.php"?> 

        <?php

        $requestURI = explode('/', $_SERVER['REQUEST_URI']);

        $scriptName = explode('/', $_SERVER['SCRIPT_NAME']);

        $CurrentUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']

            === 'on' ? "https" : "http") . "://" .

            $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];



        // Display the complete URL 

        if (isset($_GET['blog_url']) && !empty($_GET['blog_url'])) {

            $BlogUrl = $_GET['blog_url'];

            $EncodedUrl = urlencode($CurrentUrl);
        } else {

            redirect($base_url);
        }
        // echo $base_url;

        $BlogDetail = $db->getRow(" SELECT * from blog_details where Blog_Url = '" . $BlogUrl . "'");



        $BlogTitle = $BlogDetail['Title'];


        ?>



        <link rel="stylesheet" href="<?= $base_url ?>css/service_style.css" />



        <!-- services -->





    <section class="pb-5 blogpage-space">



        <div class="wthree-inner-sec1 services-bg">









            <div class="col-sm-12">



                <div class="container-fluid" id="cont">

                    <div class="banner-btm-agile">

                        <!-- //btm-wthree-left -->

                        <div class="row">



                            <div class="col-lg-9 p-3 btm-wthree-left">

                                <div class="card" id="card">

                                    <div class="single-left">

                                        <div class="single-left1">

                                            <h3><?= $BlogDetail['Headings'] ?></h3>

                                            <div class="card_img">

                                                <div class="w3agile_special_deals_grid_left_grid">

                                                    <a><img src="<?= $base_url ?>images/<?= $BlogDetail['Image'] ?>" alt=" "  class="img-responsive blog-main-image" /></a>

                                                </div>

                                            </div>

                                            <div class="card_admin">

                                                <div class="admin">

                                                    <p class="text-white"><?php echo $BlogDetail['Short_Description'] ?></p>



                                                </div>

                                            </div>

                                            <div class="blog-description">

                                                <?php echo $BlogDetail['Full_Description'] ?>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <div class="break"><br></div>

                                <!-- <div id="result"></div> -->

                            </div> <!-- col-md-9  ends -->

                            <!-- //btm-wthree-left -->

                            <!-- btm-wthree-right -->

                            <div class="col-lg-3 w3agile_blog_left p-1">

                                <div class="wthreesearch">

                                    <form id="search-blog-form" action="<?= $base_url; ?>blog_search.php" method="post">

                                        <input type="text" name="Search_text" id="Search_text" placeholder="Search..." required="">

                                        <button type="submit" name="btn-search" class="btn btn-default btn-search" aria-label="Left Align">

                                            <i class="fa fa-search" aria-hidden="true"></i>

                                        </button>

                                    </form>

                                </div>



                                <div class="w3l_categories">

                                    <h3 class="mb-5">Categories</h3>

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

                                                            <div style="line-height:20px;">
                                                                <p class="mt-1 mb-1"><?= $value['Category_Name'] ?></p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>

                                            <?php } ?>

                                        </ul>

                                    </div>

                                </div>

                                <!-- <div class="break"><br></div> -->



                                <div class="pop-heading">

                                    <h3 style="margin-bottom: 10px;">RECENT POST<h3>

                                </div>

                                <!-- <div class="break"><br></div> -->

                                <?php

                                $arrRecentPost = $db->getRows("SELECT * from blog_details ORDER BY Blog_ID DESC LIMIT 3");

                                foreach ($arrRecentPost as $data) {



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
                                    <div class="break_popular"><br></div>

                                    <!-- <div class="break1"><br></div>        -->

                                <?php } ?>

                                <div class="w3ls_recent_posts">
                                    <div class="break_related_h"><br></div>

                                    <?php

                                    $arrRelatedPost = $db->getRows(" SELECT * FROM `blog_details` ORDER BY Blog_ID DESC LIMIT 3 ");

                                    if (count($arrRelatedPost) > 0) { ?>

                                        <h3 style="margin-bottom: 10px;">Related Posts</h3>

                                        <!-- <div class="break"><br></div> -->

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

                                                            <h6><i class="fa fa-calendar" aria-hidden="true"></i><?= $DtTime ?>
                                                        </h5>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="break_related"><br></div>

                                    <?php }
                                    } ?>

                                </div>

                            </div>

                            <div class="clearfix"> </div>



                        </div>

                        <!-- //btm-wthree-right -->

                    </div>





                </div>

            </div>



        </div>

        </div>





    </section>

    <!-- //services -->


    <!-- for hamburgermenu opening -->

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













<!--====== Javascripts & Jquery ======-->

<script src="/js/jquery-3.2.1.min.js"></script>

<script src="<?= $base_url ?>js/bootstrap.min.js"></script>

<script src="<?= $base_url ?>js/owl.carousel.min.js"></script>

<script src="<?= $base_url ?>js/circle-progress.min.js"></script>

<script src="<?= $base_url ?>js/main.js"></script>





<script src="<?= $base_url ?>js/services_jav.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>



<link rel="stylesheet" type="text/css" href="https://brokensquare.com/Code/jquery-flipster/dist/jquery.flipster.min.css">

<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>











<!----------------jquery alert plugin---------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<!--  -->

<?php include 'footer.php' ?>



<script>
    $('#search-blog-form').on('submit', function(e) {

        var Search = $('#Search_text').val();

        var URL = '<?php echo $base_url; ?>blog_search/';

        var Skey = Search.replace(/ /g, '-');

        var SearchKey = URL + Skey;

        // alert(SearchKey);

        window.location.href = SearchKey;

        return false;

    });


    $BlogTitle = str.replace(/\s+/g, '-').toLowerCase();
</script>

