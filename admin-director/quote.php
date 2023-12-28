<?php include('../config.php');?> 
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
          <form method="post" id="featuredCategory" enctype="multipart/form-data">
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
     <?php include 'menu.php';?>

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
            <h1 class="white-text page-heading">Quotes</h1>
          </div>
         
          <div class="row">
            <div class="">
              <div class="panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-bordered table-striped table-hover" id="dataTables-example">
                      <thead>
                        <tr>
                          <th width="50px">S.No</th>
                          <th>Created Date</th> 
                          <th>Name</th>
                          <th>Email</th>  
                          <th>Phone</th>                         
                          <th>Message</th> 
                          <th>Delete</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                              $counter = 0;
                              $reviews = $db->getRows("SELECT * from quote order by id desc");
                              if( count($reviews) > 0){
                                foreach($reviews as $data){ 
                                  $id = $data["id"];
                                  $name = $data["name"];        
                                  $email = $data["email"];
                                  $phone = $data["mobile"];
                                  $message = $data["message"]; 
                                  $created_date = $data["created_date"]; 
                                  $counter++;
                                ?>
                              <tr class="odd gradeX">
                                <td><?php echo $counter ?> </td>
                                <td><?php echo $created_date ?> </td>
                                <td><?php echo $name ?> </td>
                                <td><?php echo $email ?></td>   
                                <td><?php echo $phone ?> </td>
                                <td><?php echo $message ?></td>
                                    <td class="text-center ac_projects_delete">
                                  <button type="button" id="delete" onclick="DeleteConfirmation(this,'quote')" name="delete" value="<?php  echo $id ?>" class="btn btn-danger btn-circle"><i class="fa fa-times"></i>
                                  </button>
                                </td>
                               
                                               
                                
                                </td>
                              </tr>

                              <?php  } } ?>
  
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
    <?php include 'footer.php'; ?>
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
        data: 'action=edit_reviews&Id='+value,
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
                    data: 'action=delete&Id='+id+'&TableName='+tablename,
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

</body>

</html>
