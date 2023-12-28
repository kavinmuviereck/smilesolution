<?php
include '../config.php';

// if (isset($_POST['create_contact'])) {



//     $inputvalidation->addRule($_POST['name'],'alphanum','Name', true, 3, false);
    
//       $inputvalidation->addRule($_POST['mobile'],'num','Mobile', true, 10, false);
    
//       $inputvalidation->addRule($_POST['email'],'mail','Email', false, 5, false);
    
//       if(isset($_POST['message'])){
    
//         $inputvalidation->addRule($_POST['message'],'messagechar','Message', true, 10, 1000);
    
//       }
    
    
    
      
    
//       if($inputvalidation->validate()){
    
//        $data = array(                             
    
                 
    
//       'name' => $_POST['name'],
    
//       'email'=> $_POST ['email'],
    
//       'phone'=> $_POST ['mobile'],
    
//       'message'=> isset($_POST['message'])?$_POST['message']:"",
    
//                  );
    
              
    
//        $rest = $db->insertAry('contact',$data );
    
              
    
//       echo "<script>window.localStorage.setItem('popupfilled','yes');alert('Thank you For Reaching Us, We Value Your Enquire, Our Team Will Connect You Shortly');</script>";
    
                    
    
//       unset($_POST);
    
//     } else {
    
//        echo "<script>alert('".$inputvalidation->errors()."');</script>" ;
    
//      }
    
//     }
    
//     ?>
<?php

if (isset($_POST['create'])) {
    $filename = $_FILES["blog_image2"]["name"];
    $tempname = $_FILES["blog_image2"]["tmp_name"];
    // echo $tempname; exit;  
    //$folder = $filename;
    $folder = "../images/" . $filename;
    $Dtime = strtotime($_POST['dt_time']);

    $title = $_POST['title'];

    $titleConverted = str_replace(' ', '-', strtolower($title));


    //  function clean($string) {
    //     $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    //     return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    //  }


    $removing_spl_char_heading = preg_replace('/[^A-Za-z0-9\-]/', ' ', $_POST['heading']);

    //  echo $removing_spl_char;exit;


    $inputvalidation->addRule($titleConverted,'alphanum','Seo URL', true , 5 , 150);
    
    $inputvalidation->addRule($removing_spl_char_heading,'alphanum',' Blog Heading', true , 5 , 150 );
    
    $inputvalidation->addRule($_POST['short_descp'],'','Short Description', true, 5 , 250);

    $inputvalidation->addRule($_POST['description'],'','Description', true, 5 );
    
    $inputvalidation->addRule( $filename,'file', 'Image Field',true);
    
    $inputvalidation->addRule($_POST['tags'],'messagechar','Tags', true, 5 , 250);

   
    if(!$inputvalidation->validate()){  

         echo "<script>alert('".$inputvalidation->errors()."');window.history.back()</script>" ;



}else {
        $plans = array(
        'Category'    => $_POST['CategoryId'],
        'Blog_Url'    => $titleConverted,
        'Title'       =>  $titleConverted,
        'Headings'    => $removing_spl_char_heading,

        'Short_Description' => addslashes($_POST['short_descp']),
        'Full_Description'  => addslashes($_POST['description']),
        'Image'       => $filename,
        // 'Video'       => $_POST['blog_video2'],
        'DtTime'      =>     date("Y-m-d H:i:s"
        // , $Dtime
    ),

        'TagKeys'     => $_POST['tags'],


        // 'plan_name'           => $_POST['plan']

    );

    // print_r($plans); exit;
    $rest = $db->insertAry('blog_details', $plans);
    // echo $db->getLastQuery(); exit;
    if (move_uploaded_file($tempname, $folder)) {


        //  echo $tempname;


        echo "<script>alert('added successfully')</script>";
        echo "<script>window.location.href='blog_list.php';</script>";
    } else {
        echo "<script>alert('added failed')</script>";
    }
   
    // $_SESSION['error'] = "Image Update Failed !"; 
    //   redirect('add_blog.php');
    //  unset($_POST);
  }


}
?>


<!----------------datatables---------->



<?php
include 'header.php';
?>


<style type="text/css">
    #blog_image2 {
        border-radius: 1px;
        border-color: red;
    }
</style>


<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script>


</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header light-blue darken-3 white-text">
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="title"><i class="fa fa-pencil-alt"></i> EDIT</h4>
                </div>
                <!--Body-->
                <div class="modal-body mb-0">
                    <form action="" method="post" id="featuredCategory" enctype="multipart/form-data">
                        <div id="divLoad"></div>
                        <div class="text-center">
                            <button type="submit" name="update" id="btnUpdateCatg" class=" btn btn-success button-update mgt-20"><i class="fa fa-check" aria-hidden="true"></i> Update
                            </button>
                            <button type="button" data-dismiss="modal" class="btn btn-warning button-cancel mgt-20"><i class="fa fa-times"></i> Cancel</button>
                        </div>
                        <br />
                    </form>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- modal ends -->
    <!--------------------->
    <div id="wrapper">

        <!-- Navigation -->
        <?php
        include 'menu.php';
        ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid pdt-20">

                <?php //alert
                if (isset($stat) && $stat != "") {
                    echo msg($stat);
                }
                ?>
                <div class="row panel panel-default mgt-20">
                    <div class="panel-heading">
                        <h1 class="white-text page-heading text-center">Create Blog</h1>
                    </div>
                    <div class="panel-body">

                        <!----form start---->
                        <form name="create-blog" id="add_post_form" class="form-horizontal" enctype="multipart/form-data" role="form" method="post">
                            <div id="result"></div>
                            <div class="col-md-4">
                                <div class="">
                                    <label for="CategoryId">Categories</label>
                                    <select class="form-control" name="CategoryId" id="CategoryId" required="">
                                        <option value="">Select Category</option>
                                        <?php
                                        $arrCategories = $db->getRows("select * from categories ");
                                        foreach ($arrCategories as $value) {
                                        ?>
                                            <option value="<?= $value['Category_Id'] ?>"><?= $value['Category_Name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="">
                                    <label for="title">Blog Title</label> <span class="text-notes">( Note: It will be the SEO Url. Don't use any special characters. Maximum 150 characters are allowed.)</span>
                                    <textarea class="form-control" id="title" name="title" required="" maxlength="150"></textarea>
                                </div>
                                <br>
                            </div> 

                            <div class="col-md-8">
                                <div class="">
                                    <label for="title">SEO URL</label> <span class="text-notes">( Note: It will be the SEO Url. Don't use any special characters and spaces here. Maximum 150 characters are allowed.)</span>
                                    <textarea class="form-control" id="title" name="title" required="" maxlength="150"></textarea>
                                </div>
                                <br>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="">
                                    <label for="heading">Blog Heading</label> <span class="text-notes">( Note: Maximum 150 characters are allowed. No special chracters are allowed. )</span>
                                    <textarea class="form-control" id="heading" name="heading" required="" maxlength="150"></textarea>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-12">
                                <div class="">
                                    <label for="short_descp">Short Description</label> <span class="text-notes">( Note: Maximum 250 characters are allowed )</span>
                                    <textarea class="form-control" id="short_descp" name="short_descp" required="" maxlength="250"></textarea>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-12 mgt-20">
                                <div class="Description">
                                    <label>Full Description<span class="redstar">*</span></label>
                                    <textarea name="description" class="form-control editor" id="editor" placeholder="description" required="" maxlength="250"></textarea>
                                </div>
                                <br>
                            </div>
                            <!-- <div class="col-md-6 ">
                     <label>Image<span class="redstar"></span></label>
                     <input type="file" accept="image/png, image/jpeg, image/gif" name="imagefiles[]" id="imagefiles" class="form-control" required="" />
             </div> -->
                            <div class="col-md-6">
                                <div class="img_res">
                                    <label for="heading">Image</label><span class="text-notes">( Note: Minimum Image Dimension 830 X 400 and Maximum 3mb is Allowed )</span>
                                    <div class="input-group image-preview">
                                        <!-- <input type="text" class="form-control image-preview-filename" name="blog-image" readonly=""> don't give a name === doesn't send on POST/GET -->
                                        <span class="input-group-btn">
                                            <!-- image-preview-clear button -->
                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                            <!-- image-preview-input -->
                                            <div class="btn btn-default image-preview-input">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                <span class="image-preview-input-title">Browse</span>
                                                <div class="input-group">
                                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="blog_image2" id="blog_image2"  required=""/> <!-- rename it -->
                                                </div>
                                            </div>
                                        </span>
                                    </div><!-- /input-group image-preview [TO HERE]-->
                                    <!-- <p class="image-dimension">Minimum Image Dimension 830 X 400</p>               -->
                                </div>
                            </div>




                            <!--date picker--->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dtpickerdemo" class="col-sm-2 control-label">DateTime*</label><br><br>
                                    <div class='col-sm-10 input-group date' id='dtpickerdemo'>
                                        <input class="form-control" type="text" name="dt_time" id="dt_time" >
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--date picker--->


                            <div class="col-md-12">
                                <div class="">
                                    <label for="tags">Tag Keys</label><span class="text-notes">( Note: Tag keywords are seperated by comma ( , ). Maximum 250 characters are allowed )</span>
                                    <textarea class="form-control" id="tags" name="tags" required=""0 maxlength="150"></textarea>

                                </div>
                                <br>
                            </div>
                            <div class="col-md-12">
                                <div class="top25 pull-right">
                                    <button class="btn btn-primary" id="addnew" type="submit" name="create"><i class="fa fa-check" aria-hidden="true"></i> Post Blog</button>
                                    <button class="btn btn-default">Cancel</button>
                                </div>
                            </div><br>

                        </form><br>
                        <div class="row">
                            <div class="">
                                <div class="panel-default">
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">

                                        <!-- /.panel-body -->
                                    </div>
                                    <!-- /.panel -->
                                </div>
                                <!-- /.col-lg-12 -->
                            </div>
                        </div>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- /#footer -->
    <?php
    include 'footer.php';
    ?>
    <!-- /#ends -->

    <script>
        $(document).ready(function() {
            CKEDITOR.replace('editor');

            $("#ADD").click(function() {
                $("#content").toggle();
            });
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
        $("#content").toggle();

        $(document).on("click", ".btnCategoryEdit", function(event) {
            event.preventDefault();
            var value = $(this).attr('data-id');
            $.ajax({
                    url: 'ajax.php',
                    type: 'POST',
                    data: 'action=edit_products&Id=' + value,
                    dataType: 'html'
                })
                .done(function(data) {
                    console.log(data);
                    $('#divLoad').empty().append(data);
                    CKEDITOR.replace('editor1');

                })
            $('#myModal').modal('show');
            return false;
        });

        function DeleteConfirmation(e, tablename) {

            var id = e.value;

            // var tablename = 'attribute';
            // call jquery confirm plugin
            $.confirm({
                icon: 'fa fa-warning',
                title: 'Confirm!',
                content: 'Do you want to Delete ?',
                type: 'red',
                buttons: {
                    confirm: {
                        btnClass: 'btn-red',
                        action: function() {
                            $.confirm({
                                icon: 'fa fa-warning',
                                title: 'Confirm!',
                                content: 'If you Delete, You cant restore this record !',
                                type: 'red',
                                buttons: {
                                    Okay: {
                                        btnClass: 'btn-red',
                                        action: function() {
                                            $.ajax({
                                                type: 'post',
                                                url: 'ajax.php',
                                                data: 'action=delete&Id=' + id + '&TableName=' + tablename,
                                                dataType: "json",
                                                success: function(data) {
                                                    if (data['validation'] == '1') {
                                                        $.confirm({
                                                            icon: 'fa fa-check',
                                                            title: '',
                                                            content: data['message'],
                                                            type: 'green',
                                                            autoClose: 'Okay|1000',
                                                            buttons: {
                                                                Okay: function() {
                                                                    window.location.reload();
                                                                }
                                                            }
                                                        });
                                                    } else {
                                                        $.alert(data['message']);
                                                    }
                                                }
                                            });
                                        }
                                    },
                                    Cancel: function() {},
                                }
                            });
                        }
                    },
                    cancel: function() {},
                }
            });
        }

        function deleteproductimg(value, Id) {
            $.ajax({
                url: "ajax.php",
                type: 'POST',
                data: 'action=deleteotherimage&value=' + value + '&Id=' + Id,
                dataType: "json",
                success: function(data) {
                    if (data['validation'] == '1') {
                        $.confirm({
                            icon: 'fa fa-check',
                            title: '',
                            content: data['message'],
                            type: 'green',
                            autoClose: 'Okay|1000',
                            buttons: {
                                Okay: function() {
                                    window.location.reload();
                                }
                            }
                        });
                    } else {
                        $.alert(data['message']);
                    }
                }

            });
        }
    </script>


    <!-----time &date picker----->
    <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#dtpickerdemo').datetimepicker();
        });
    </script>
    <!-----time &date picker----->
</body>

</html>