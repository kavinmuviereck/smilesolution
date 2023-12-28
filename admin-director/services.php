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
    $count = 0;
    // foreach ($_FILES['imagefiles']['name'] as $ab) {
    //     $count++;
    // }
 

    for ($i = 0; $i <= $count; $i++) {
        if (isset($_FILES['imagefiles']['name'][$i]) && $_FILES['imagefiles']['name'][$i] != '' && !empty($_FILES['imagefiles']['name'][$i])) {
            $fname = $_FILES['imagefiles']['name'][$i];
            $ext   = strtolower(substr($fname, strrpos($fname, '.') + 1));

            if (in_array($ext, array('jpeg','jpg','gif','png'))) {
                $newfile = md5($_FILES['imagefiles']['tmp_name'][$i]) . "." . $ext;
                if (move_uploaded_file($_FILES['imagefiles']['tmp_name'][$i], '../images/services/' . $newfile)) {
                    $newfile = "images/services/".$newfile;
                    $imgs  = array(                        
                        'image' => $newfile
                    );
                    // $rest   = $db->updateAry("services", $imgs, "WHERE id='" . $_POST['tableid'] . "'");
                }
            } else {
                $stat["error"] = "Please Select valid file";
            }
        }
    }


    $random = array(
        'service' => $_POST['service'],
        'short_description' =>$_POST['short_description'],
       
    );
   
    $rest   = $db->updateAry("publication", $random, "WHERE id='" . $_POST['tableid'] . "'");



    if (!is_null($rest)) {
        echo "<script>alert('Record Updated successfully !');</script>";
    } else {
        echo "<script>alert('Failed due to Database Error!');</script>";
    }
     echo "<script>window.location.href=window.location.href;</script>";
}

if (isset($_POST['create'])) {
    $count = 0;
    // foreach ($_FILES['imagefiles']['name'] as $ab) {
    //     $count++;
    // }

    for ($i = 0; $i <= $count; $i++) {

        if (isset($_FILES['imagefiles']['name'][$i]) && $_FILES['imagefiles']['name'][$i] != '' && !empty($_FILES['imagefiles']['name'][$i])) {
            $fname = $_FILES['imagefiles']['name'][$i];
            $ext   = strtolower(substr($fname, strrpos($fname, '.') + 1));

            if (in_array($ext, array('jpeg','jpg','gif','png'))) {
                $newfile = md5($_FILES['imagefiles']['tmp_name'][$i]) . "." . $ext;
                if (move_uploaded_file($_FILES['imagefiles']['tmp_name'][$i], '../images/services/' . $newfile)) {
                    $newfile = "images/services/".$newfile;
                    $service = $_POST['service'];
                    // $slug = slugify($_POST['service']);
                       
                    //         $servcs = $db->getRows("select slug from services where service='$service'");
                    //         if(count($servcs)>0){
                    //             $slug = $slug."-".count($servcs);                                
                    //         }
                        

                    $imgs  = array(
                        'service' => $service,
                        'short_description' => $_POST['short_description'],
                       
                        // 'slug' => $slug
                    );
                
                    $rests = $db->insertAry('publication', $imgs);
                }
            } else {
                $stat["error"] = "Please Select valid file";
            }
        }
    }

    $service = $_POST['service'];

    $imgs  = array(
        'service' => $service,
        'short_description' => $_POST['short_description'],
        
        // 'slug' => $slug
    );

    $rests = $db->insertAry('publication', $imgs);
    // var_dump($db->getLastQuery());
    // var_dump($rests);die;

    if (!is_null($rests)) {
        echo "<script>alert('Added successfully');</script>";
    } else {
        echo "<script>alert('Insert Failed !');</script>";
    }
    unset($_POST);

    echo "<script>window.location.href=window.location.href;</script>";
}

?>

<?php
include 'header.php';
?>

<head>
    <!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.0.3/tinymce.min.js"></script>
</head>

<style>
    .d-none
    {
        display: none !important;
    }

  
  @media (min-width: 768px){
.modal-sm {
    width: 600px !important;
}}
</style>


<body>
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
                        <h1 class="white-text page-heading text-center">Publications</h1>
                    </div>
                    <div class="panel-body">
                        <div class="ac_course_add">
                            <button id="ADD" class="btn btn-info button-addnew pull-right" onclick="showCustomPanel()"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Add New &nbsp;<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </button>
                 <br/><br/>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div id="content" class="panel panel-default custom-panel" style="display: none;">
                                <div class="panel-body">
                                    <div class="row">
                                        
                                        <div class="col-md-3 mgt-20">
                                            <label>Headings<span class="redstar">*</span></label>
                                            <input type="text" name="service" class="form-control" placeholder="service" required="">
                                        </div>
                                        <div class="col-md-12 mgt-20">
                                            <label>Full Description<span class="redstar">*</span></label>
                                            <textarea name="short_description" class="form-control editor" id="editor" placeholder="description" required=""></textarea>

                                            <!-- <textarea name="short_description" class="form-control editor" id="editor" placeholder="description" required=""></textarea> -->
                                        </div>

                                        <!-- <div class="col-md-4 mgt-20">
                                            <label>Web Link<span class="redstar"></span></label>
                                            <input type="text"  name="weblink" class="form-control" placeholder="Link" required="" />

                                        </div> -->
                                        
                                    </div>                                
                               
                                <div class="col-md-3 text-right" style="padding-top: 35px">
                                    <button class="btn btn-success" id="addnew" type="submit" name="create"><i class="fa fa-check" aria-hidden="true"></i> Save</button>
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
                                    <table width="100%" class="table table-bordered table-striped table-hover" id="dataTables-example-des-des">
                                        <thead>
                                            <tr>
                                                <th width="50px">S.No</th>
                                                <th>Service</th>
                                                <th>Description</th>
                                         
                                                <th width="60px" class="text-center ac_projects_edit">Edit</th>
                                                <th width="60px" class="text-center ac_projects_delete">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $counter = 0;
                                            $clients = $db->getRows("SELECT * from publication order by id desc");
                                            if (count($clients) > 0) {
                                                foreach ($clients as $data) {
                                                    $id = $data["id"];
                                                    $service  = $data["service"];
                                                    $short_description = substr($data["short_description"], 0, 200);
                                                   
                                                    $counter++;
                                            ?>
                                                    <tr class="odd gradeX">
                                                        <td><?= $counter; ?> </td>
                                                        <td><?= $service; ?> </td>
                                                        <td class="break_the_word_element"><?= $short_description; ?></td>
                                                        
                                                        <td class="text-center ac_projects_edit">
                                                            <button class="btn btn-primary btn-circle btnCategoryEdit" data-toggle="modal" data-target="#myModal" name="edit" data-id="<?= $id; ?>"><i class="fa fa-edit"></i></button>
                                                        </td>
                                                        <td class="text-center ac_projects_delete">
                                                            <button type="button" id="delete" onclick="DeleteConfirmation(this,'publication')" name="delete" value="<?= $id ?>" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>
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
    <script>
        function showCustomPanel()
        {
            console.log('ffff');
            var element = document.getElementById("content");
            if(element.style.display === 'block')
            {
                element.style.display = 'none';    
            }
            else
            {
                element.style.display = 'block';    
            }
            
        }
    </script>

<script>
    $(document).ready(function() {
        // Get all the <p> tags inside the specified <div>
        var paragraphs = $('.break_the_word_element').find('p');
        var paragraphsTwo = $('.break_the_word_element').find('em');

        // Loop through each <p> tag and replace &nbsp; with an empty string
        paragraphs.each(function() {
        var paragraphContent = $(this).html();
        if (paragraphContent.includes('&nbsp;')) {
            paragraphContent = paragraphContent.replace(/&nbsp;/g, ' ');
            $(this).html(paragraphContent);
        }
        });

		paragraphsTwo.each(function() {
        var paragraphContentTwo = $(this).html();
        if (paragraphContentTwo.includes('&nbsp;')) {
            paragraphContentTwo = paragraphContentTwo.replace(/&nbsp;/g, ' ');
            $(this).html(paragraphContentTwo);
        }
        });
    });
</script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.4/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.bootstrap.min.css">
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">


<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>

<script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>

<script src="//cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script>
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
            $('#dataTables-example-des').DataTable({
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
                    data: 'action=edit_services&Id=' + value,
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


$( "#btn_save_order" ).click(function( event ) {
    var table = $('#data_table').DataTable();
    var info = table.page.info();
    cur_page = info.page;

    $sno=(cur_page*10)+1;
    $("#row-cont tr").each(function( index ) {
      $(this).find('.data_ord').val($sno++);      
    });

    $('.frm-sort').submit();
  });  

        $(document).ready(function() {
            $("#ADD").click(function() {
                $("#content").toggle();
            });
            $('#dataTables-example-des').DataTable({
                responsive: true,
                rowReorder: true,
                "rowReorder" : [ "dataSrc", [1]]
                
            });
        });
        $("#content").toggle();

        // $(document).on("click", ".btnCategoryEdit", function(event) {
        //     event.preventDefault();
        //     var value = $(this).attr('data-id');
        //     $.ajax({
        //             url: 'ajax.php',
        //             type: 'POST',
        //             data: 'action=edit_services&Id=' + value,
        //             dataType: 'html'
        //         })
        //         .done(function(data) {
        //             console.log(data);
        //             $('#divLoad').empty().append(data);
        //         })
        //     $('#myModal').modal('show');
        //     return false;
        // });

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
                                                data: 'action=delete_product&Id=' + id + '&TableName=' + tablename,
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
    </script>

    
</body>

</html>