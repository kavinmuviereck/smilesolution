<?php include '../config.php';
?>
<?php include 'header.php'; ?>
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

      <!-- Navigation -->
     <?php include 'menu.php';?>

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
                        <h1 class="white-text page-heading text-center">Blog List</h1>
                    </div>
                    <div class="panel-body">            
             
  
    
    <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="wrapper " >
      <div class=" divContent">

      <div class="panel-body">

          
          <?php
          $arrResult = $db->getRows("SELECT a.*, b.Category_Name FROM blog_details a, categories b WHERE b.Category_Id=a.Category ORDER BY Blog_ID DESC");
          if (count($arrResult) > 0) {
            $i = 1;
            echo "<div class='table-responsive'>";
            echo "<table id='table_content' class='table table-striped table-hover'><thead>";
            echo "<tr>"; 
            echo "<th>S.No</th>";
            echo "<th>Category</th>"; 
            echo "<th>Blog&nbsp;Heading</th>";
            // echo "<th>Short Description</th>";
            echo "<th>Date&nbsp;And&nbsp;Time</th>"; 
            echo "<th class='text-center'>Edit</th>"; 
            echo "<th class='text-center'>Delete</th>"; 
            echo "</tr></thead><tbody>"; 
            foreach($arrResult as $row) {
              $Description =  custom_character($row['Short_Description'],60);
              $timestamp = strtotime($row['DtTime']);
              $Blog_ID = $row['Blog_ID'];
              echo "<tr>"; 
              echo "<td>".$i."</td>";
              echo "<td>".$row['Category_Name']."</td>"; 
              echo "<td>".$row['Headings']."</td>"; 
              // echo "<td>".$Description."</td>"; 
              echo "<td>".date("d-m-Y h:i:s A", $timestamp)."</td>"; 
              echo "<td class='text-center'><a href='edit_blog_k.php?Blog_ID=".$Blog_ID."' class='btn btn-primary btn-circle' data-id='".$row['Blog_ID']."'><i class='fa fa-pencil-alt' aria-hidden='true'></i></a></td>"; 
              echo "<td class='text-center'><a id='btnDelete' class='btn btn-danger btn-circle' data-id='".$row['Blog_ID']."' data-key='Blog_ID' data-table='blog_details'><i class='fa fa-trash-alt' aria-hidden='true'></i></a></td>"; 
              echo "</tr>"; 
              $i++;
            } 
            echo "</tbody></table></div>"; 
          } 
          else { 
              echo "No matching records are found."; 
          } 
        ?>
      </div> <!-- panel-body -->

      </div> <!-- divContent -->
    </div> <!-- wrapper -->
  </main> <!-- page-content -->
</div> <!-- page-wrapper -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- /#footer -->
    <?php include 'footer.php'; ?>
    <!-- /#ends -->


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

    function edit_blogImage(blogId){ 
      $.ajax({
         url : "ajax.php",
         async : false,
         data : "action=edit_productImage&P_Img_id="+P_Img_id+"&catId="+catId+"&SubcatID="+SubcatID,
         type : "POST",
         success : function(data){                           
            $('#Edit_p_Img'+P_Img_id).html(data);
            
         }
      });
    }

    $(document).on('click','#btnDelete',function(){
      var Id = $(this).attr('data-id');
      var Key = $(this).attr('data-key');
      var TableName = $(this).attr('data-table');

      // $.confirm({
      //     title: 'Confirm!',
      //     content: 'Do you want to Delete this Blog ?',
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
      //                 content: 'Blog Deleted Successfully !',
      //                 type: 'green',
      //                 autoClose: 'Okay|1000',
      //                 buttons: {
      //                   Okay: function () {
      //                     window.location.reload();
      //                   }
      //                 }
      //               });                  
      //             }
      //             else{
      //               $.confirm({
      //                 icon: 'fa fa-check',
      //                 title: '',
      //                 content: 'Action Failed ! Please try again.',
      //                 type: 'green',
      //                 autoClose: 'Okay|1000',
      //                 buttons: {
      //                   Okay: function () {
      //                     // window.location.reload();
      //                   }
      //                 }
      //               });    
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
                            icon: 'fa fa-warning',
                            title: 'Confirm!',
                            content: 'Do you want to Delete this Blog?',
                            type: 'red',
                            buttons: {
                              YES: function () {
                                $.ajax({
                                  type: 'post',
                                  url: 'ajax_load.php',
                                  // data: 'Key='+Key+'&action=delete_blog&Id='+Id+'&TableName='+Tablename,
                                  // data: 'Key='+Key+'&Id='+Id+'&TableName='+TableName,
                                  data: 'action=delete_blog&Id='+Id+'&Key='+Key+'&TableName='+TableName,
                                  dataType: "json",
                                  success: function (data) {
                                   // console.log(data);
                                   // return false;
                                    if(data['validation'] == '1'){
                                      $.confirm({
                                        icon: 'fa fa-check',
                                        title: '',
                                        content: 'Blog Deleted Successfully !',
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
                                      $.confirm({
                                        icon: 'fa fa-check',
                                        title: '',
                                        content: 'Action Failed ! Please try again.',
                                        type: 'green',
                                        autoClose: 'Okay|1000',
                                        buttons: {
                                          Okay: function () {
                                            // window.location.reload();
                                          }
                                        }
                                      });    
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
                    // setTimeout(, 3000);
                    //$("#sign-in-modal-form").on("hidden.bs.modal", function () {
                        //window.location.reload();
                    //});
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

    $('form').on('submit', function (e) {
        e.preventDefault();
        var file_data = $('#blog-image2').prop('files')[0];
        var form_data = new FormData(this);  // Create a FormData object
        form_data.append('file', file_data);  // Append all element in FormData  object

        $.ajax({
            type: 'post',
            url: 'save_blog_details.php',
            data: form_data,
            dataType: "json",
            cache       : false,
            processData: false,
            contentType: false,            
            success: function (data) {
              if(data['status'] == 'success'){
                  //$("#result").html('<div class="alert alert-success">Record Successfully<strong> Inserted!</strong></div>');
                  $.confirm({
                    icon: 'fa fa-check',
                    title: '',
                    content: 'Blog Details Inserted Successfully !',
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
                $.confirm({
                  icon: 'fa fa-check',
                  title: '',
                  content: 'Record Insert Failed',
                  type: 'green',
                  autoClose: 'Okay|1000',
                  buttons: {
                    Okay: function () {
                      // window.location.reload();
                    }
                  }
                }); 
              }
              // window.setTimeout(function () {
              //   $(".alert").fadeTo(500, 0).slideUp(500, function () {
              //     $(this).remove();
              //   });
              // }, 2000);                
            }
        });
        return false;
    });


    $('#editplan').on('submit', function (e) {
        e.preventDefault();        
        var form_data = new FormData(this);  // Create a FormData object
        form_data.append('action', "updateplans"); 
         var objEditor1 = CKEDITOR.instances["full_descp"].getData();
        form_data.append('description', objEditor1); 

         $.ajax({
            type: 'post',
            url: 'ajax_load.php',
            data: form_data,
            dataType: "json",
            cache       : false,
            processData: false,
            contentType: false,  
            beforeSend: function() {
              $('.btnUpdate').prop('disabled', true);
              $('.btnUpdate').html('<i class="fa fa-spinner fa-spin"></i> Loading..');
            },                      
            success: function (data) {
              if(data['validation'] == '1'){
                  //$("#result").html('<div class="alert alert-success">Record Successfully<strong> Inserted!</strong></div>');
                  $.confirm({
                    icon: 'fa fa-check',
                    title: '',
                    content: 'Updated Successfully !',
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
                $.confirm({
                  icon: 'fa fa-times',
                  title: '',
                  content: 'Details Updated Failed',
                  type: 'red',
                  autoClose: 'Okay|2000',
                  buttons: {
                    Okay: function () {
                      // window.location.reload();
                    }
                  }
                }); 
                $('.btnUpdate').prop('disabled', false);
                $('.btnUpdate').html('Update Details');
              }
            }
        });
        return false;
    });

</script>

</body>
</html>
