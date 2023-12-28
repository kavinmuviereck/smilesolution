<?php 



include '../config.php'; 



// $dbcon=mysqli_connect("localhost","root","","yetlosocial_com");







if(isset($_POST['update_details'])){

    $edit = $db->getRow("SELECT Image from blog_details where Blog_ID='".$_GET['Blog_ID']."'");

      $filename='';
      if ($_FILES['Image']['name'] != '') {
        $fname = $_FILES['Image']['name'];
        $ext = strtolower(substr($fname, strrpos($fname, '.') + 1));
        if (in_array($ext, array('jpeg', 'jpg', 'gif', 'png'))) {
            $newfile = md5($_FILES['Image']['tmp_name']) . "." . $ext;
            if (move_uploaded_file($_FILES['Image']['tmp_name'], '../images/'.$newfile)){
                
              $imagePath = $edit['Image'];
              if(!empty($imagePath)){

                // echo $imagePath;exit;
              
                if(file_exists('../images/'.$imagePath)){
                    // echo 3;exit;
                  unlink('../images/'.$imagePath);
               }
              }
              $filename = $newfile;                
            }
        } 
        else {
            $filename = "";
            $stat["error"] = "Please Select valid file";exit;
        }
      }
      else{
        if(!empty($edit['Image'])){
          $filename= $edit['Image'];
        }
      
      }

$Dtime = strtotime($_POST['dt_time']); 



$titleOfEdit = $_POST['title'];

$titleConvertedForUpdation = str_replace(' ', '-', strtolower($titleOfEdit));

$removing_spl_char = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['heading']);


$inputvalidation->addRule($titleConvertedForUpdation,'alphanum','Seo URL', true , 5 , 150);
    
$inputvalidation->addRule($removing_spl_char,'alphanum',' Blog Heading', true , 5 , 150 );

$inputvalidation->addRule($_POST['short_descp'],'','Short Description', true, 5 , 250);

$inputvalidation->addRule($_POST['description'],'','Description', true, 5 );

$inputvalidation->addRule( $filename,'file', 'Image Field',true);

$inputvalidation->addRule($_POST['tags'],'messagechar','Tags', true, 5 , 250);


if(!$inputvalidation->validate()){  

     echo "<script>alert('".$inputvalidation->errors()."');window.history.back()</script>" ;



}else {


      $plans = array(



                        'Category'          => $_POST['CategoryId'],



                        'Title'             =>  $titleConvertedForUpdation,



                        'Headings'          => $removing_spl_char,



                        'Blog_Url'          => $titleConvertedForUpdation,



                        'Short_Description' => $_POST['short_descp'],



                        'Full_Description'  => $_POST['description'],



                        'Image'=>$filename,



                        // plans                        // 'Video'       => $_POST['blog_video2'],



                        'DtTime'      =>     date("Y-m-d H:i:s" ), 



                        'TagKeys'           => $_POST['tags'],



                        



                    );



            // echo $plans; exit;



      $rest = $db->updateAry('blog_details',$plans,"where Blog_ID='".$_GET['Blog_ID']."'"); 



       //echo $db->getLastQuery(); exit;



       if (!is_null($rest))  {



            echo "<script>alert('updated successfully')</script>";



            echo "<script>window.location.href='blog_list.php';</script>";



        }else{



                       echo "<script>alert('update failed')</script>";







      }


    }
}











$get="SELECT * from blog_details where Blog_ID='".$_GET['Blog_ID']."'";







$result=$db->query($get);



// print_r($result);



while($key = $result->fetch_assoc()){



?>



<?php include 'header.php'; ?>















  











   <style type="text/css">



  .btn_update_details{



      



      position: relative;



      float: right;



  }



  #btn_btn{



     background-color: blue;



     color:aliceblue;



  }



</style>











        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



    <script src="//cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script>







</head>



<body >



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



                        <?php include 'menu.php';?>



    <div id="page-wrapper">



    <div class="container-fluid pdt-20">



                  <?php //alert



                if (isset($stat) && $stat != "") {



                    echo msg($stat);



                }



                ?>      



<div class="row panel panel-default mgt-20">



                    <div class="panel-heading">



                        <h1 class="white-text page-heading text-center">Edit Blog</h1>



                    </div>



<div class="panel-body">    



      <div class=" divContent">



     



          <br>



<form method="post" enctype="multipart/form-data">







<div class="col-md-12">



              <label>SEO URL Title</label><br>



              <textarea class="form-control" name="title" value="<?//=$key['Title']?>"><?//= $key['Title'] ?></textarea>



</div>







<div class="col-md-4"><br>



              <div class="">



                <label for="CategoryId">Categories</label>



                <select class="form-control" name="CategoryId" id="CategoryId" required="">



                  <option value="">Select Category</option>



                  <?php



          $get1="SELECT * from categories";



          $result1=$db->query($get1);



          // print_r($result);



          while($value = $result1->fetch_assoc()){ ?>



                    <option value="<?= $value['Category_Id'] ?>" <?php if($key['Category']== $value['Category_Id']) {echo 'selected'; } ?> >



                      <?= $value['Category_Name'] ?>



                    </option>



                  <?php } ?>



                </select>



              </div>



</div>



<div class="col-md-8"><br>



            <div class="">



                    <label for="title">SEO URL</label><span class="text-notes">( Note: It will be the SEO Url. Don't use any special characters. Maximum 150 characters are allowed.)</span>



                    <textarea class="form-control" id="title" name="title"  required="" maxlength="150"><?=$key['Title']?></textarea>



            </div>



            <br>



</div>



<div class="col-md-12">



        <div class="">



              <label for="heading">Blog Heading</label><span class="text-notes">( Note: Maximum 150 characters are allowed. No special characters are allowed. )</span>



              <textarea class="form-control" id="heading" name="heading" required="" maxlength="150"><?= $key['Headings'] ?></textarea>



        </div>



        <br>



</div>



<div class="col-md-12">



            <div class="">



                    <label for="short_descp">Short Description</label> <span class="text-notes">( Note: Maximum 250 characters are allowed )</span>



                    <textarea class="form-control" id="short_descp" name="short_descp" rows="3" maxlength="250" required=""><?= $key['Short_Description'] ?></textarea> 



            </div>



            <br>



</div>







 <div class="col-md-12 mgt-20">



     <div class="Description">



              <label>Full Description<span class="redstar">*</span></label>



              <textarea name="description" class="form-control editor" id="editor" placeholder="description" required=""><?= $key['Full_Description'] ?></textarea>



         </div>



         <br>



     



<div class="col-md-12">



    <div class="row">



<div class="col-md-6">



                <label for="heading">Image</label><span class="redstar">( Note: Minimum Image Dimension 830 X 400 And Maximum Size of 3mb Are Allowed)</span>



                <div class="input-group image-preview">







             



                <?php if(!empty($key["Image"])) { ?>



                       <img class="example-image" src="<?=$base_url?>/images/<?= $key['Image']; ?>" style="width:50%;height:50%"  alt=""/>



                <input type="file" class="img"  accept="image/png, image/jpeg, image/gif" name="Image"  class="form-control" value="<?= $key['Image']; ?>"/>



            <?php }else{ ?>







<img class="example-image" src="<?= $key['Image']; ?>" style="width:50%;height:50%"  alt=""/>



<input type="file" class="img"  accept="image/png, image/jpeg, image/gif" name="Image"  class="form-control"   required />







                   <?php }?>



                </div>



                <br>            



</div>



<!--date picker--->



<div class="col-md-6">



            <div class="form-group">



            <label  class="col-sm-2 control-label">DateTime*</label><br><br>



                <div class='col-sm-10 input-group ' >



                <?php $time= strtotime($key['DtTime']);







                $time=date('Y-m-d');







                ?>



               <input  value="<?php echo $time ?>" type="date" name="dt_time"  >



                    



                </div>



            </div>



            </div>



<!--date picker--->



</div></div>



<div class="col-md-12">



            <div class="">



                  <label for="tags">Tag Keys</label> <span class="text-notes">( Note: Tag keywords are seperated by comma ( , ). Maximum 250 characters are allowed )</span>



                  <textarea class="form-control" id="tags" name="tags" required="" maxlength="150"><?php echo $key['TagKeys']; ?></textarea> 



            </div> 



            <br>



</div>







<div class="col-md-3 btn_update_details">



<button name="update_details" class="form-control" id="btn_btn" >UPDATE</button>



</div>



</form>



</div></div>







  </div>



  </div>



                <!-- /.row -->



            </div>



            <!-- /.container-fluid -->



        </div>







<?php } ?>



                    </div></div>



    <?php include 'footer.php'; ?>



    <!-- /#ends -->











 <script>



















      $(".img").change(function() {



    readURL(this);



  });



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







        function deleteproductimg(value,Id) {



            $.ajax({



                url: "ajax.php",



                type: 'POST',



                data: 'action=deleteotherimage&value=' + value+'&Id='+Id,



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



            $(function () {



                $('#dtpickerdemo').datetimepicker();



            });



        </script>



<!-----time &date picker----->



</body>







</html>