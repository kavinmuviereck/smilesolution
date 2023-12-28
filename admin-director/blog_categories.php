<?php include('../config.php');
  if (isset($_SESSION['success']) && ($_SESSION['success'] != "")) {
    $stat['success'] = $_SESSION['success'];
    unset($_SESSION['success']);
  }
  if (isset($_SESSION['error']) && ($_SESSION['error'] != "")) {
    $stat['danger'] = $_SESSION['error'];
    unset($_SESSION['error']);
  } 

  //  to create the main menu
    // if (isset($_POST['create'])) {
    //     $categories = array(
    //                         'section'  => $_POST['section'],                                 
    //                     );

    //                     print_r($categories);exit;
    //     $rest = $db->insertAry('section',$categories);
    //     if(!is_null($rest)){
    //       $_SESSION['success'] = "Section Added Successfully.";
    //       unset($_POST);
    //       redirect('sections.php');
    //     }else{ 
    //       $_SESSION['error'] = "Section Insert Failed !"; 
    //       redirect('sections.php'); 
    //     }
    // } 

    if (isset($_POST['update'])) {

      
        $categories = array('section'  => $_POST['section']);
        $rest = $db->updateAry('section',$categories,"where id='".$_POST["tableid"]."'");
       // echo $db->getlastquery();exit;
        if(!is_null($rest)){
          $_SESSION['success'] = "Section Updated successfully.";
          unset($_POST);
          redirect('sections.php');
        }else{ 
          $_SESSION['error'] = "Section Update Failed !"; 
          redirect('sections.php'); 
        }
    } 

?> 
<head>
    <!-- <link href="../datepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen"> -->
    <!-- <script type="text/javascript" src="js/jquery-2.2.3.min.js" charset="UTF-8"></script> -->
  <!-- <script type="text/javascript" src="js/bootstrap.min.js"></script> -->
  <!-- <script type="text/javascript" src="datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script> -->
  <!-- Ends -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- <link href="../css/fontawesome-all.min.css" rel="stylesheet"> -->

  <!----------------Rich Text styles---------->
  <!-- <link rel="stylesheet" href="src/richtext.min.css"> -->
  <!------------------>

  <!----------------datatables---------->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.4/css/fixedHeader.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.bootstrap.min.css">
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <!------------------>
  <!----------------jquery alert plugin---------->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

  <link href="css/sidebar_styles.css" rel="stylesheet">
  <link href="css/custom_styles.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Tangerine|Inconsolata|Droid+Sans|Josefin+Sans|Roboto:400|Open+Sans:600
" rel="stylesheet">
<style>
  .fa-trash-alt{
    padding:7px;
  }
  </style>
<?php include 'header.php'; ?>
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
            <small class="error_throw"></small>
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
     <?php include 'menu.php';?>        
    <?php 
     $arrCategories = $db->getRows("select * from categories ");
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
        <h1 class="white-text page-heading text-center"> Categories </h1>
        </div>
        <div class="panel-body"> 
        <div class="col-md-12">
          <button id="ADD" class="btn btn-primary button-addnew pull-right" >Add category &nbsp;&nbsp;<i class="fa fa-angle-down" aria-hidden="true"></i>
          </button>
          <br/><br/>
          <form id="add_category_form" method="post">
            <div id="content" class="panel panel-default">
              <div class="panel-body">
                <div class="col-md-4">
                  <label for="category_name">Category Name</label>
                  <input type="text" class="form-control" id="category_name" name="category_name" required="">
                </div>
              
                <div class="col-md-3 add-post-action-btns" style="padding-top: 27px">
                  <button class="btn btn-primary" id="addnew" type="submit" name="create" ><i class="fa fa-check" aria-hidden="true"></i>Save</button>
                  <button type="reset" class="btn btn-warning "><i class="fa fa-times" aria-hidden="true"></i>Cancel</button>
                </div>
              </div>
            </div>
          </form>
        </div>
          <?php
          $arrResult = $db->getRows("SELECT * from categories");
          //  echo $db->getLastquery(); exit;
          // echo $arrResult; exit;
          // if (count($arrResult) > 0) {
            $i = 1;
            echo "<div class='table-responsive'>";
            echo "<table id='table_content' class='table table-striped table-hover'><thead>";
            echo "<tr>"; 
            echo "<th>S.No</th>";
            echo "<th>Category Name</th>"; 
            echo "<th>Date&nbsp;And&nbsp;Time</th>"; 
            echo "<th class='text-center'>Edit</th>"; 
            echo "<th class='text-center'>Delete</th>"; 
            echo "</tr></thead><tbody>"; 
            foreach($arrResult as $row) {
              //$Description =  custom_character($row['Short_Description'],60);
              // $timestamp = strtotime($row['CreatedDtAndTime']);
              $timestamp = strtotime($row['DtTime']);
              //$Blog_ID = $row['Blog_ID'];
              echo "<tr>"; 
              echo "<td>".$i."</td>";
              echo "<td>".$row['Category_Name']."</td>"; 
              echo "<td>".date("d-m-Y h:i:s A"
               , $timestamp
              )."</td>"; 
              echo "<td class='text-center'><a class='btn btn-primary btn-circle btnCategoryEdit' data-toggle='modal' data-target='#myModal' data-id='".$row['Category_Id']."'><i class='fa fa-pencil-alt' aria-hidden='true'></i></a></td>"; 
              echo "<td class='text-center'><a id='btnDelete' class='btn btn-danger btn-circle' data-id='".$row['Category_Id']."' data-key='Category_Id' data-table='categories'><i class='fa fa-trash-alt' aria-hidden='true'></i></a></td>"; 
              echo "</tr>"; 
              $i++;
            } 
            echo "</tbody></table></div>"; 
          // } 
          // else { 
          //     echo "No matching records are found."; 
          // } 
        ?>
      </div> <!-- panel-body -->

      </div> <!-- divContent -->
   
  
</div> <!-- page-wrapper -->
</div> <!--container-fluid -->
          </div></div>
  <?php 
    // error_reporting(0);
    

    if(!isset($_SESSION['Active']) && empty($_SESSION['Active'])){ ?>
      <script type="text/javascript">
        $('#admin-login-modal').modal('show');
      </script>
  <?php } ?>

  <script src="src/jquery.richtext.js"></script>
  <script src="js/custom.js"></script>

  <script type="text/javascript">

    $('#table_content').DataTable({
        responsive: true
    });

    $(document).ready(function(){
        $("#ADD").click(function(){
            $("#content").toggle();
        });
         $("#content").toggle();
    });

    $( ".btnCategoryEdit" ).click(function( event ) {
      event.preventDefault();
      var value = $(this).attr('data-id');
      // alert(value);
      $.ajax({
        url: 'ajax_load.php',
        type: 'POST',
        data: 'action=edit_category&CatgId='+value,
        dataType: 'html'
      })
      .done(function(data){
        console.log(data);  
        $('#divLoad').empty().append(data); // load response 
        // hide ajax loader 
      })
      $('#myModal').modal('show');
      return false;
    });

    $(document).on('click','#btnDelete',function(){
      var Id = $(this).attr('data-id');
      var Key = $(this).attr('data-key');
      var TableName = $(this).attr('data-table');

      // $.confirm({
      //     title: 'Confirm!',
      //     content: 'Do you want to Delete this record ?',
      //     type: 'red',
      //     buttons: {
      //       YES: function () {
      //         $.ajax({
      //           type: 'post',
      //           url: 'delete.php',
      //           data: 'Key='+Key+'&Id='+Id+'&TableName='+TableName,
      //           dataType: "json",
      //           success: function (data) {
      //             if(data['validation'] == '1'){
      //               $.confirm({
      //                 icon: 'fa fa-check',
      //                 title: '',
      //                 content: data['message'],
      //                 type: 'green',
      //                 autoClose: 'Okay|2000',
      //                 buttons: {
      //                   Okay: function () {
      //                     window.location.reload();
      //                   }
      //                 }
      //               });                   
      //             }
      //             else{
      //               $.alert(data['message']);
      //             }
                             
      //           }
      //         });
      //       },
      //       NO: function () {
      //           //$.alert('Canceled!');
      //       },
      //     }
      // });

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
                                title: 'Confirm!',
                                content: 'Do you want to Delete this record ?',
                                type: 'red',
                                buttons: {
                                  YES: function () {
                                    $.ajax({
                                      type: 'post',
                                      url: 'ajax_load.php',
                                  
                                  data: 'action=delete_categories&Id='+Id+'&Key='+Key+'&TableName='+TableName,
                                      dataType: "json",
                                    
                                      success: function (data) {
                                  //       console.log(data);
                                  //  return false;
                                        if(data['validation'] == '1'){
                                          $.confirm({
                                            icon: 'fa fa-check',
                                            title: '',
                                            content: data['message'],
                                            type: 'green',
                                            autoClose: 'Okay|2000',
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
                                  },
                                  NO: function () {
                                      //$.alert('Canceled!');
                                  },
                                }
                            });

                          }
                          },
                    cancel: function() {},
                }
            });
      return false;   
      return false;              
    });

    $(document).on('click','#btnUpdateCatg',function(){
      var CatgId = $('#Category_Id').val();
      var CatgName = $('#Category_Name').val();
      $.ajax({
        type: 'post',
        url: 'ajax_load.php',
        data: 'action=updateCategory&CatgId='+CatgId+'&CatgName='+CatgName,
        dataType: "json",
        success: function (data) {
          if(data['validation'] == '1'){
            var message=data['message'];
            $('#myModal').find('.error_throw').html('<div class="thank-you-pop text-center"><i class="fa fa-check mb-md-3" aria-hidden="true"></i><h3>'+message+'</h3></div>');   
            $("#myModal").on("hidden.bs.modal", function () {
                window.location.reload();
            });    
          }
          else{
           var message=data['message'];
            $('#myModal').find('.error_throw').html('<div class="thank-you-pop text-center"><i class="fa fa-times mb-md-3" aria-hidden="true"></i><h3>'+message+'</h3></div>');
            return false;
          }
           setTimeout(function(){ window.location.reload() }, 2000);          
        }
      });
      return false;              
    });

    $('#login-form').on('submit', function (e) {
        e.preventDefault();
        // alert("checkboxValues");
        var Name = $('#ad_name').val();
        var Password = $('#ad_password').val();
        $.ajax({
            type: 'post',
            url: 'check_login.php',
            data: 'name='+Name+'&password='+Password,
            dataType: "json",
            success: function (data) {
                // alert(data);
                if(data['validation'] == 1){
                    $('.modal-body').addClass('text-center');
                    $('#sign-in-modal-form').find('.modal-body').html('<i class="glyphicon glyphicon-ok" aria-hidden="true"></i><p>'+data['message']+'</p><div class="modal-footer text-center"><button type="button" class="btn btn-default ml-auto mr-auto" data-dismiss="modal">Okay</button></div>');
                    setTimeout(function () {
                      window.location.reload();
                    }, 2000);
                }
                else if (data['validation'] == 2){
                    $('.text-danger').html(data['message']);
                    // alert("mobile error ! Please Try Again.");
                }
                else if (data['validation'] == 3){
                    $('.text-danger').html(data['message']);
                    // alert("mobile error ! Please Try Again.");
                }
            }
        });
    }); 

    $('#add_category_form').on('submit', function (e) {
        e.preventDefault();
        var CategoryName = $('#category_name').val();
        // alert(CategoryName);
        $.ajax({
            type: 'post',
            url: 'ajax_load.php',
            data: 'action=add_category&CategoryName='+CategoryName,
            dataType: "json",
         
            success: function (data) {
              if(data['validation'] == '1'){
                $.confirm({
                  icon: 'fa fa-check',
                  title: '',
                  content: 'Category Added Successfully !',
                  type: 'green',
                  autoClose: 'Okay|2000',
                  buttons: {
                    Okay: function () {
                      window.location.reload();
                    }
                  }
                });                        
              }
              else if(data['validation'] == '2'){
                $.confirm({
                  icon: 'fa fa-times',
                  title: '',
                  content: 'Sorry, This Category Is Already Exist !',
                  type: 'danger',
                  autoClose: 'Okay|2000',
                  buttons: {
                    Okay: function () {
                      // window.location.reload();
                    }
                  }
                }); 
              }
              
              else{
                $.confirm({
                  icon: 'fa fa-times',
                  title: '',
                  content: 'minimum 5 characters and only alphabets are alloweded in category feild !',
                  type: 'danger',
                  autoClose: 'Okay|2000',
                  buttons: {
                    Okay: function () {
                      // window.location.reload();
                    }
                  }
                }); 
              }
            }
        });
        return false;
    });


</script>

</body>
</html>
