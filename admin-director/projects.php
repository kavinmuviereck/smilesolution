 <?php

include('../config.php'); 

if (isset($_SESSION['success']) && ($_SESSION['success'] != "")) {

    $stat['success'] = $_SESSION['success'];

    unset($_SESSION['success']);

}

if (isset($_SESSION['error']) && ($_SESSION['error'] != "")) {

    $stat['danger'] = $_SESSION['error'];

    unset($_SESSION['error']);

}



if (isset($_POST['update'])) {

    

    $random = array(



        'name' => $_POST['person'],

        'title' => $_POST['title']

      

    );

    $rest   = $db->updateAry("projects", $random, "WHERE id='" . $_POST['id'] . "'");

    if (!is_null($rest)) {

        echo "<script>alert('Record Updated successfully !');</script>";

    } else {

        echo "<script>alert('Failed due to Database Error!');</script>";

    }

    echo "<script>window.location.href=window.location.href;</script>";

    

}



if (isset($_POST['create'])) {

    $categories = $gallery["image"] = array();

    

    $filename = '';

    if ($_FILES['pdffile']['name'] != '') {

        $fname = $_FILES['pdffile']['name'];

        $ext   = strtolower(substr($fname, strrpos($fname, '.') + 1));

        if ('pdffile') {

            $newfile = md5($_FILES['pdffile']['tmp_name']) . "." . $ext;

            if (move_uploaded_file($_FILES['pdffile']['tmp_name'], '../pdf' . '/' . 'uploads' . '/' . $newfile)) {

                $filename = 'pdf' . '/' . 'uploads' . '/' . $newfile;

                }

        } else {

            $filename      = "";

            $stat["error"] = "Please Select valid file";

        }

    }

    

    $categories = array(

        

        'type' => $_POST['type'],

        'title' => $_POST['title'],

        'description' => base64_encode($_POST['description']),

        'pdf' => $filename

    );

    

    $rest = $db->insertAry('projects', $categories);

    $project_id = $db->getLastId();

    

    $count = 1;

    foreach ($_FILES['imagefiles']['name'] as $ab) {

        $count++;

        

    }

    

    for ($i = 0; $i <= $count; $i++) {

        if (isset($_FILES['imagefiles']['name'][$i]) && $_FILES['imagefiles']['name'][$i] != '' && !empty($_FILES['imagefiles']['name'][$i])) {

            $fname = $_FILES['imagefiles']['name'][$i];

            $ext   = strtolower(substr($fname, strrpos($fname, '.') + 1));

            

            if (in_array($ext, array(

                'jpeg',

                'jpg',

                'gif',

                'png'

            ))) {

                $newfile = md5($_FILES['imagefiles']['tmp_name'][$i]) . "." . $ext;

                if (move_uploaded_file($_FILES['imagefiles']['tmp_name'][$i], '../assets/img/project/' . $newfile)) {

                    

                    $imgs  = array(

                        'image' => $newfile,

                        'project_id' => $project_id

                    );

                    $rests = $db->insertAry('images', $imgs);

                    

                }

                

            } else {

                $stat["error"] = "Please Select valid file";

            }

        }

    }

    

    if (!is_null($rest)) {

        echo "<script>alert('project Added successfully');</script>";

    } else {

        echo "<script>alert('project Insert Failed !');</script>";

    }

    unset($_POST);

    

    echo "<script>window.location.href=window.location.href;</script>";

}



?> 



<?php

include 'header.php';

?>

<head>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.0.3/tinymce.min.js"></script>

  <script>

    tinyMCE.init({

      selector: 'textarea.tinymce',

      external_plugins: {

        'bootstrap4grid': 'https://www.spprealty.com/admin/tiny/plugins/TinyMCE5/bootstrap4grid/plugin.min.js'

      },

      height: 500,

      theme: 'silver',

      schema: 'html5',

      plugins: [

        'advlist autolink lists link image charmap print preview anchor autoresize',

        'searchreplace visualblocks code fullscreen',

        'insertdatetime media table paste code help wordcount bootstrap4grid'

      ],

      toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat code visualblocks bootstrap4grid | help',

      content_css: [

        'https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'

      ],

    });

  </script>

</head>



<body >  

   <!-- Modal -->

  <div class="modal fade" id="myModal" role="dialog">

    <div class="modal-dialog modal-sm cascading-modal" role="document">

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

              <button type="submit" name="update" id="btnUpdateCatg"  class=" btn btn-success button-update mgt-20"><i class="fa fa-check" aria-hidden="true"></i> Update

              </button>

              <button type="button" data-dismiss="modal" class="btn btn-warning button-cancel mgt-20"><i class="fa fa-times"></i> Cancel</button>

            </div>

            <br/>

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

       <div class="row panel panel-default mgt-20"  >

          <div class="panel-heading">

            <h1 class="white-text page-heading text-center">SPP Realty</h1>

          </div>

          <div class="panel-body">

          <div class="ac_course_add">          

          <button id="ADD"  class="btn btn-info button-addnew pull-right" ><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Add New &nbsp;<i class="fa fa-angle-down" aria-hidden="true"></i>

          </button>

          <br/><br/>

          </div> 

          <form  action="" method="post" enctype="multipart/form-data">

            <div id="content" class="panel panel-default" >

              <div class="panel-body">

            <div class="row">

                <div class="col-md-4 mgt-20">

                  <label>Type<span class="redstar">*</span></label>

                  <select class="form-control" name="type" required="">

                        <option value="">Select</option>

                          <option value="On-Going">On-Going</option>

                            <option value="Completed">Completed</option>

                      

                      </select>

                </div>

                <div class="col-md-3 mgt-20">

                  <label>Title<span class="redstar">*</span></label>

                <input type="text" name="title" class="form-control" placeholder="Title"required="">

                </div>

           <!--      <div class="col-md-3 mgt-20">

                  <label>description<span class="redstar">*</span></label>

                <input type="text" name="description" class="form-control" placeholder="description" required="" >

                </div> -->

              



              

                <div class="col-md-3 mgt-20">

                  <label>Upload pdf<span class="redstar"></span></label>

<input type="file" name="pdffile" accept = "application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">

</div></div>

                <div class="row" style="margin-top:20px">

                <div class="col-md-4 mgt-20">

              <label> Banner Images<span class="redstar"></span></label>

              <input type="file" accept="image/png, image/jpeg, image/gif" name="imagefiles[]" id="imagefiles" multiple="" />



                </div>   </div>                  

              <div class="row"style="margin-top: 60px;" >

              <div class="col-md-12">

                 <label>Description<span class="redstar"></span></label>

              <textarea rows="20" cols="10" id="editor" class="form-control tinymce" name="description"id="projects"  ></textarea>





                </div>







              </div>                

              </div>

                <div class="col-md-3 text-right" style="padding-top: 35px">

                  <button class="btn btn-success" id="addnew" type="submit" name="create" ><i class="fa fa-check" aria-hidden="true"></i> Save</button>

                  <button type="reset" class="btn danger-gradient btn-warning"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button>

                </div>

              </div>

              </div>

          </form>

          <div class="row">

            <div class="">

              <div class="panel-default">

                <!-- /.panel-heading -->

                <div class="panel-body">

                    <table width="100%" class="table table-bordered table-striped table-hover" id="dataTables-example">

                      <thead>

                        <tr>

                          <th width="50px">S.No</th>

                          <th>Company</th>

                           <th>Type</th>

                            

                        

                        

                       <!--    <th width="60px" class="text-center ac_projects_edit">Edit</th> -->

                          <th width="60px" class="text-center ac_projects_edit">View</th>

                          <th width="60px" class="text-center ac_projects_delete">Delete</th>

                        </tr>

                      </thead>

                      <tbody>

                        <?php

$counter = 0;

$clients = $db->getRows("SELECT * from projects order by id desc");

if (count($clients) > 0) {

    foreach ($clients as $data) {

        $id = $data["id"];

        

        $type  = $data["type"];

        $title = $data["title"];

        // $image = $data["imagefiles"]; 

        $counter++;

?>

                             <tr class="odd gradeX">

                                <td><?php

        echo $counter;

?> </td>

                                 <td><?php

        echo $title;

?> </td>

                                <td><?php

        echo $type;

?></td>  

                              

                              <!-- <td><?php

        $value = '';

        if (strpos($icon, "http") !== false) {

            $value = $icon;

        } else if ($icon != '') {

            $value = '../' . $icon;

        }

?><img src='<?= $value ?>'  /></td>   -->



                                    

                       <!--          <td class="text-center ac_projects_edit">

                                  <button class="123 btn btn-primary btn-circle  btnCategoryEdit" data-toggle="modal" data-target="#myModal" name="edit" data-id="<?php

        echo $id;

?>" data-myvalue="<?php

        echo $id;

?>" ><i class="fa fa-pencil-alt"></i>

                                  </button>



                                </td> -->

                                <td>

                                 <button class="btn btn-success btn-circle" onclick="window.location.href='edit-projects.php?id=<?= $id ?>'" ><i class="fas fa-angle-double-right"></i>

                                  </button></td>

                                <td class="text-center ac_projects_delete">

                                  <button type="button" id="delete" onclick="DeleteConfirmation(this)" name="delete" value="<?php

        echo $id;

?>" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>

                                  </button>

                                </td>

                              </tr>



                              <?php

    }

}

?>

 

                                </tbody>

                            </table>

                            <!-- /.table-responsive -->

                          

                        </div>

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

$(document).ready(function(){

    $("#ADD").click(function(){

        $("#content").toggle();

    });

    $('#dataTables-example').DataTable({

     responsive: true

    });

});

 $("#content").toggle();



  $(document).on("click",".btnCategoryEdit",function( event ) {

      event.preventDefault();

      var value = $(this).attr('data-id');

      $.ajax({

        url: 'ajax.php',

        type: 'POST',

        data: 'action=edit_projects&id='+value,

        dataType: 'html'

      })

      .done(function(data){

        console.log(data);  

        $('#divLoad').empty().append(data);        

      })

      $('#myModal').modal('show');

      return false;

    });



function DeleteConfirmation(e,tablename) {



  var id = e.value;

  

  // var tablename = 'attribute';

  // call jquery confirm plugin

  $.confirm({

    icon: 'fa fa-warning',

    title: 'Confirm!',

    content: 'Do you want to Delete ?',

    type: 'red',

    buttons: {

      confirm:  {

        btnClass: 'btn-red',

        action: function(){

          $.confirm({

            icon: 'fa fa-warning',

            title: 'Confirm!',

            content: 'If you Delete, You cant restore this record !',

            type: 'red',

            buttons: {

              Okay: {

                btnClass: 'btn-red',

                action: function(){

                  $.ajax({

                    type: 'post',

                    url: 'ajax.php',

                    data: 'action=delete_projects&Id='+id+'&TableName='+tablename,

                    dataType: "json",

                    success: function (data) {

                      if(data['validation'] == '1'){

                        $.confirm({

                          icon: 'fa fa-check',

                          title: '',

                          content: data['message'],

                          type: 'green',

                          autoClose: 'Okay|1000',

                          buttons: {

                            Okay: function () {

                              window.location.reload();

                            }

                          }

                        });

                      }

                      else{

                        $.alert(data['message']);

                      }

                    }

                  });

                }

              },

              Cancel: function () { },

            }

          });

        }

      },

      cancel: function () { },

    }

  });

}



</script>

<!-- <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>

       <script type="text/javascript">

    var config = {

       extraPlugins: 'image2',

      filebrowserImageUploadUrl: 'upload.php',

      image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],

      // image2_disableResizer: true,

    };





       CKEDITOR.replace('projects',config);

</script> -->

              

    

</body>



</html>