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

    $product = $db->getRow("Select other_images from products where id='" . $_POST['tableid'] . "'");



    $name = $_POST['name'];

    $service_id = $_POST['service_id'];

    $price = $_POST['price'];



    foreach ($_FILES['imagefiles']['name'] as $ab) {

        $count++;

    }

    $random = array(

        'service_id' => $service_id,

        'name' => $name,

        'price' => $price,

        'short_description' => base64_encode($_POST['short_description']),

        'description' => base64_encode($_POST['description']),

    );

    $rest = $db->updateAry("products", $random, "WHERE id='" . $_POST['tableid'] . "'");

    // echo $db->getLastQuery();



    $count = 0;



    for ($i = 0; $i <= $count; $i++) {

        if (isset($_FILES['imagefiles']['name'][$i]) && $_FILES['imagefiles']['name'][$i] != '' && !empty($_FILES['imagefiles']['name'][$i])) {

            $fname = $_FILES['imagefiles']['name'][$i];

            $ext   = strtolower(substr($fname, strrpos($fname, '.') + 1));



            if (in_array($ext, array('jpeg', 'jpg', 'gif', 'png'))) {

                $newfile = md5($_FILES['imagefiles']['tmp_name'][$i]) . rand(1000, 10000) . "." . $ext;

                if (move_uploaded_file($_FILES['imagefiles']['tmp_name'][$i], '../images/products/' . $newfile)) {

                    $newfile = "images/products/" . $newfile;

                    $imgs  = array(

                        'main_image' => $newfile

                    );

                    $rest   = $db->updateAry("products", $imgs, "WHERE id='" . $_POST['tableid'] . "'");



                }

            } 

        }

    }





                    $otherfiles = json_decode($product["other_images"]);

                    for ($i = 0; $i <= count($_FILES['otherimagefiles']['name']); $i++) {

                        if (isset($_FILES['otherimagefiles']['name'][$i]) && $_FILES['otherimagefiles']['name'][$i] != '' && !empty($_FILES['otherimagefiles']['name'][$i])) {

                            $fname = $_FILES['otherimagefiles']['name'][$i];

                            $ext   = strtolower(substr($fname, strrpos($fname, '.') + 1));



                            if (in_array($ext, array('jpeg', 'jpg', 'gif', 'png'))) {

                                $othernewfile = md5($_FILES['otherimagefiles']['tmp_name'][$i]) . rand(1000, 10000) . "." . $ext;

                                if (move_uploaded_file($_FILES['otherimagefiles']['tmp_name'][$i], '../images/products/' . $othernewfile)) {

                                    array_push($otherfiles, "images/products/" . $othernewfile);

                                }

                            }

                        }

                    }



                    $name = $_POST['name'];

                    $service_id = $_POST['service_id'];

                    $price = $_POST['price'];



                    $slug = slugify($_POST['name']);

                    $slugs = $slug;

                    for ($i = 1; $i < 100; $i++) {

                        $slugs = $slugs . "-" . $i;

                        $servcs = $db->getRow("select slug from products where slug='$slugs'");

                        if (count($servcs) == 0) {

                            break;

                        }

                        $slug = $slugs;

                    }



                    $imgs  = array(

                        'other_images' => json_encode($otherfiles)

                    );

                    $rest   = $db->updateAry("products", $imgs, "WHERE id='" . $_POST['tableid'] . "'");

                    // echo $db->getLastQuery();

               

    if (!is_null($rest)) {

        echo "<script>alert('Record Updated successfully !');</script>";

    } else {

        echo "<script>alert('Failed due to Database Error!');</script>";

    }

     echo "<script>window.location.href=window.location.href;</script>";

}



if (isset($_POST['create'])) {

    $count = 0;

    foreach ($_FILES['imagefiles']['name'] as $ab) {

        $count++;

    }

    for ($i = 0; $i <= $count; $i++) {

        if (isset($_FILES['imagefiles']['name'][$i]) && $_FILES['imagefiles']['name'][$i] != '' && !empty($_FILES['imagefiles']['name'][$i])) {

            $fname = $_FILES['imagefiles']['name'][$i];

            $ext   = strtolower(substr($fname, strrpos($fname, '.') + 1));



            if (in_array($ext, array('jpeg', 'jpg', 'gif', 'png'))) {

                $newfile = md5($_FILES['imagefiles']['tmp_name'][$i]) . rand(1000, 10000) . "." . $ext;

                if (move_uploaded_file($_FILES['imagefiles']['tmp_name'][$i], '../images/products/' . $newfile)) {

                    $newfile = "images/products/" . $newfile;





                    $otherfiles = array();

                    for ($i = 0; $i <= count($_FILES['otherimagefiles']['name']); $i++) {

                        if (isset($_FILES['otherimagefiles']['name'][$i]) && $_FILES['otherimagefiles']['name'][$i] != '' && !empty($_FILES['otherimagefiles']['name'][$i])) {

                            $fname = $_FILES['otherimagefiles']['name'][$i];

                            $ext   = strtolower(substr($fname, strrpos($fname, '.') + 1));



                            if (in_array($ext, array('jpeg', 'jpg', 'gif', 'png'))) {

                                $othernewfile = md5($_FILES['otherimagefiles']['tmp_name'][$i]) . rand(1000, 10000) . "." . $ext;

                                if (move_uploaded_file($_FILES['otherimagefiles']['tmp_name'][$i], '../images/products/' . $othernewfile)) {

                                    array_push($otherfiles, "images/products/" . $othernewfile);

                                }

                            }

                        }

                    }



                    $name = $_POST['name'];

                    $service_id = $_POST['service_id'];

                    $price = $_POST['price'];

                    $slug = slugify($_POST['name']);



                    $servcs = $db->getRows("select slug from products where name='$name'");

                    if (count($servcs) > 0) {

                        $slug = $slug . "-" . count($servcs);

                    }



                    $imgs  = array(

                        'service_id' => $service_id,

                        'name' => $name,

                        'price' => $price,

                        'short_description' => base64_encode($_POST['short_description']),

                        'description' => base64_encode($_POST['description']),

                        'main_image' => $newfile,

                        'other_images' => json_encode($otherfiles),

                        'slug' => $slug

                    );

                    $rests = $db->insertAry('products', $imgs);

    // echo $db->getLastQuery();exit;



                }

            } else {

                $stat["error"] = "Please Select valid file";

            }

        }

    }

    // echo $db->getLastQuery();exit;

    if (!is_null($rests)) {

        echo "<script>alert('Product Added successfully');</script>";

    } else {

        echo "<script>alert('Product Insert Failed !');</script>";

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

                        <h1 class="white-text page-heading text-center">Products</h1>

                    </div>

                    <div class="panel-body">

                        <div class="ac_course_add">

                            <button id="ADD" class="btn btn-info button-addnew pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Add New &nbsp;<i class="fa fa-angle-down" aria-hidden="true"></i>

                            </button>

                            <br /><br />

                        </div>

                        <form action="" method="post" enctype="multipart/form-data">

                            <div id="content" class="panel panel-default">

                                <div class="panel-body">

                                    <div class="row">

                                        <div class="col-md-4 mgt-20">

                                            <label>Category/ Service<span class="redstar">*</span></label>

                                            <select name="service_id" class="form-control">

                                                <?php

                                                $service = $db->getRows("select service, id from services order by id");

                                                if (count($service) > 0) {

                                                    foreach ($service as $key => $value) { ?>

                                                        <option value="<?= $value["id"] ?>"><?= $value["service"] ?></option>

                                                <?php }

                                                } ?>

                                            </select>

                                        </div>

                                        <div class="col-md-4 mgt-20">

                                            <label>Product Name<span class="redstar">*</span></label>

                                            <input type="text" name="name" class="form-control" placeholder="product" required="">

                                        </div>

                                        <div class="col-md-4 mgt-20">

                                            <label>Approx Price<span class="redstar">*</span></label>

                                            <input type="text" name="price" class="form-control" placeholder="Approximate Price" required="">

                                        </div>



                                        <div class="col-md-12 mgt-20">

                                            <label>Description<span class="redstar">*</span></label>

                                            <textarea name="description" class="form-control editor" id="editor" placeholder="description" required=""></textarea>

                                        </div>

                                        <div class="col-md-4 mgt-20">

                                            <label>Short Description<span class="redstar">*</span></label>

                                            <textarea name="short_description" class="form-control" placeholder="Short Description"></textarea>

                                        </div>

                                        <div class="col-md-4 mgt-20">

                                            <label>Main Image<span class="redstar"></span></label>

                                            <input type="file" accept="image/png, image/jpeg, image/gif" name="imagefiles[]" id="imagefiles" class="form-control" required="" />

                                        </div>

                                        <div class="col-md-4 mgt-20">

                                            <label>Other Image<span class="redstar"></span></label>

                                            <input type="file" accept="image/png, image/jpeg, image/gif" name="otherimagefiles[]" id="otherimagefiles" class="form-control" multiple="" />

                                        </div>

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

                                        <table width="100%" class="table table-bordered table-striped table-hover" id="dataTables-example">

                                            <thead>

                                                <tr>

                                                    <th width="50px">S.No</th>

                                                    <th>Product</th>

                                                    <th>Service</th>

                                                    <th>Approx.Price</th>

                                                    <th>Short Description</th>

                                                    <th>Image</th>

                                                    <th width="60px" class="text-center ac_projects_edit">Edit</th>

                                                    <th width="60px" class="text-center ac_projects_delete">Delete</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <?php

                                                $counter = 0;

                                                $clients = $db->getRows("SELECT products.*, services.service from products inner join services on products.service_id=services.id order by id desc");

                                                if (count($clients) > 0) {

                                                    foreach ($clients as $data) {

                                                        $id = $data["id"];

                                                        $product  = $data["name"];

                                                        $service  = $data["service"];

                                                        $price  = $data["price"];

                                                        $short_description = substr(base64_decode($data["short_description"]), 0, 200);

                                                        $image = $data["main_image"];

                                                        $counter++;

                                                ?>

                                                        <tr class="odd gradeX">

                                                            <td><?= $counter; ?> </td>

                                                            <td><?= $product; ?> </td>

                                                            <td><?= $service; ?> </td>

                                                            <td><?= $price; ?> </td>

                                                            <td><?= $short_description; ?></td>

                                                            <td><img src='../<?= $image ?>' style="max-width: 100px;" /></td>

                                                            <td class="text-center ac_projects_edit">

                                                                <button class="btn btn-primary btn-circle btnCategoryEdit" data-toggle="modal" data-target="#myModal" name="edit" data-id="<?= $id; ?>"><i class="fa fa-edit"></i></button>

                                                            </td>

                                                            <td class="text-center ac_projects_delete">

                                                                <button type="button" id="delete" onclick="DeleteConfirmation(this,'products')" name="delete" value="<?= $id ?>" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>

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

</body>



</html>