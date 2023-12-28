<?php include('../config.php');

if (isset($_POST["action"])) {

  $action = $_POST["action"];

  switch ($action) {


    case "delete-section": {	

      // echo $_POST['Id'];exit;
      // var_dump($_POST);
      // die;
      
      $res = $db->getRows("SELECT * FROM images WHERE project_id='".$_POST['Id']."'");	
      $section_res = $db->getRows("SELECT image FROM section WHERE id='".$_POST['Id']."'");	
      // echo count($res);
      // echo count($section_res);exit;
      $mp4 = '.mp4';
			$mkv = '.mkv';
			$avi = '.avi';
      
     if(count($res)>0)	
     {	
      // echo 2; exit;
        foreach($res as $res2)	
        {	
          // echo "jjj".($res2['image']);exit;
          if (!empty($res2['image'])){
// echo 5; exit;
            unlink('../'.$res2['image']);	

          }	

          if ((substr($res2['video'], -strlen($mp4)) === $mp4) || (substr($res2['video'], -strlen($mkv)) === $mkv) || (substr($res2['video'], -strlen($avi)) === $avi))
					{
            if (!empty($res2['video']))	
            {	
              unlink('../'.$res2['video']);	
            }	
          }	
            
        }	
        //  echo count($res);exit;	
        $rest1 = $db->delete('images',"where project_id='".$_POST['Id']."'");	
        

      }	

      if(count($section_res)>0)
      {
        foreach($section_res as $section_res2)
        {
          // echo 8; exit;
          
          // echo $section_res2['image'];exit;
          if (!empty($section_res2['image'])){
            unlink('../'.$section_res2['image']);
          }

          $rest = $db->delete($_POST['TableName'], "where id='" . $_POST['Id'] . "'");	

          // if (!empty($res2['image'])){

          //   unlink('../'.$res2['image']);	

          // }	
        }
      }


      



     
      // echo $db->getLastquery();
      // exit;
      if ($db->getAffectedRows() > 0) {	
        echo json_encode(array('validation' => '1', 'message' => 'Record deleted successfully !'));	
        
      } else {	
        echo json_encode(array('validation' => '0', 'message' => 'Action Failed ! Please try again.'));	
      }	
    
      break;	
    }


      case "deletecontact":{
        $rest = $db->delete($_POST['TableName'],"where id='".$_POST['Id']."'");
        if($db->getAffectedRows() > 0){
          echo json_encode(array('validation'=>'1','message'=>'contact deleted successfully !'));
        } else{
          echo json_encode(array('validation'=>'0','message'=>'Action Failed ! Please try again.'));
        }
      break;
      }

      case "delete": {
       // for unlink
       $res = $db->getrow("SELECT Image FROM blog_details where Blog_ID='".$_POST['Id']."'");
       // echo $db->getLastquery();
        if(!empty($res)){
      
           if (!empty($res['image']))
            unlink('../'.$res['image']);
  
            $rest = $db->delete($_POST['TableName'], "where Blog_ID ='" . $_POST['Id'] . "'");
      }


      


        if ($db->getAffectedRows() > 0) {

          echo json_encode(array('validation' => '1', 'message' => 'Record deleted successfully !'));
        
        } else {

          echo json_encode(array('validation' => '0', 'message' => 'Action Failed ! Please try again.'));

        }
     
        break;

      }


      case "delete_product": {

        $rest = $db->delete($_POST['TableName'], "where id='" . $_POST['Id'] . "'");

        if ($db->getAffectedRows() > 0) {

          echo json_encode(array('validation' => '1', 'message' => 'Record deleted successfully !'));

        } else {

          echo json_encode(array('validation' => '0', 'message' => 'Action Failed ! Please try again.'));

        }

        break;

      }

      case "delete_invited": {

        $rest = $db->delete($_POST['TableName'], "where id='" . $_POST['Id'] . "'");

        if ($db->getAffectedRows() > 0) {

          echo json_encode(array('validation' => '1', 'message' => 'Record deleted successfully !'));

        } else {

          echo json_encode(array('validation' => '0', 'message' => 'Action Failed ! Please try again.'));

        }

        break;

      }


      case "del":{
        // for unlink
      $res = $db->getrow("SELECT image , video FROM images where image_id='".$_POST['Id']."'");
      $mp4 = '.mp4';
			$mkv = '.mkv';
			$avi = '.avi';
      if(!empty($res)){
    
         if (!empty($res['image']))
          unlink('../'.$res['image']);

          if ((substr($res['video'], -strlen($mp4)) === $mp4) || (substr($res['video'], -strlen($mkv)) === $mkv) || (substr($res['video'], -strlen($avi)) === $avi))
					{

          
            if (!empty($res['video']))
            {
              unlink('../'.$res['video']);
            }
          }
          

          $rest = $db->delete($_POST['TableName'],"where image_id='".$_POST['Id']."'");
        
    }
    //  unlink end
        if($db->getAffectedRows() > 0){
        
          echo json_encode(array('validation'=>'1','message'=>'Record deleted successfully !'));
          
        } else{

          echo json_encode(array('validation'=>'0','message'=>'Action Failed ! Please try again.'));

        }

       

      break;
      
    }



    case "del_speciality_gallery":{
      // for unlink
    $res = $db->getrow("SELECT image , video FROM speciality_gallery where id='".$_POST['Id']."'");
    $mp4 = '.mp4';
    $mkv = '.mkv';
    $avi = '.avi';
    if(!empty($res)){
  
       if (!empty($res['image']))
        unlink('../'.$res['image']);

        if ((substr($res['video'], -strlen($mp4)) === $mp4) || (substr($res['video'], -strlen($mkv)) === $mkv) || (substr($res['video'], -strlen($avi)) === $avi))
        {

        
          if (!empty($res['video']))
          {
            unlink('../'.$res['video']);
          }
        }
        

        $rest = $db->delete($_POST['TableName'],"where id='".$_POST['Id']."'");
      
  }
  //  unlink end
      if($db->getAffectedRows() > 0){
      
        echo json_encode(array('validation'=>'1','message'=>'Record deleted successfully !'));
        
      } else{

        echo json_encode(array('validation'=>'0','message'=>'Action Failed ! Please try again.'));

      }

     

    break;
    
  }

    case "edit_services": { 

        $arrCategories = $db->getRows("SELECT * from publication where id='" . $_POST["Id"] . "'");



        foreach ($arrCategories as $value) {

          $service = $value['service'];

          $short_description =$value['short_description'];

          // $weblink = $value['weblink'];

?>

          <div class="col-md-12 mgt-20">

            <label>Service<span class="redstar">*</span></label>

            <input type="text" name="service" class="form-control" placeholder="service" required="" value="<?= $service ?>">

          </div>

          <div class="col-md-12 mgt-20">

            <label>Full Description<span class="redstar">*</span></label>

            <textarea name="short_description" class="form-control editor" id="editor" placeholder="description"><?= $short_description ?></textarea>

          </div>

          <!-- <div class="col-md-12 mgt-20">

          <label>web Link<span class="redstar">*</span></label>

          <input type="text" name="weblink" class="form-control" placeholder="Web link" value="<?= $weblink ?>">

          </div> -->

          <!-- <div class="col-md-12 mgt-20">

            <label>Image<span class="redstar">*</span></label> -->

            <?php // $values = '';

           // if (strpos($icon, "http") !== false) {

             // $values = $icon;

           // } else if ($icon != '') {

            //  $values = '../' . $icon;

          //  } //?>

            <!-- <div style="margin: 10px 0"><img src='<?//= $values ?>' style='max-width: 100px;' /></div>

            <input type="file" accept="image/png, image/jpeg, image/gif" name="imagefiles[]" id="imagefiles" />

          < </div> -->

          <input type="text" name="tableid" value="<?= $value['id'] ?>" id="tableid" class="form-control" hidden="" style="display: none;"> 



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
</script>
<script src="//cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script>
        <?php    }










        break;

      }

      case "edit_invitedfaculty": { 

        $arrCategories = $db->getRows("SELECT * from invited_faculty where id='" . $_POST["Id"] . "'");



        foreach ($arrCategories as $value) {

          $service = $value['service'];

          $short_description = $value['short_description'];

          // $icon = $value['image'];

?>

          <div class="col-md-12 mgt-20">

            <label>Service<span class="redstar">*</span></label>

            <input type="text" name="service" class="form-control" placeholder="service" required="" value="<?= $service ?>">

          </div>

          <div class="col-md-12 mgt-20">

            <label>Short Description<span class="redstar">*</span></label>

            <textarea name="short_description" class="form-control editor" id="editor" placeholder="description"><?= $short_description ?></textarea>

          </div>

          <!-- <div class="col-md-12 mgt-20">

            <label>Image<span class="redstar">*</span></label> -->

            <?php // $values = '';

           // if (strpos($icon, "http") !== false) {

             // $values = $icon;

           // } else if ($icon != '') {

            //  $values = '../' . $icon;

          //  } //?>

            <!-- <div style="margin: 10px 0"><img src='<?//= $values ?>' style='max-width: 100px;' /></div>

            <input type="file" accept="image/png, image/jpeg, image/gif" name="imagefiles[]" id="imagefiles" />

          < </div> -->

          <input type="text" name="tableid" value="<?= $value['id'] ?>" id="tableid" class="form-control" hidden="" style="display: none;"> 



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
            data: 'action=edit_invitedfaculty&Id=' + value,
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
</script>
<script src="//cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script>
        <?php    }

        break;

      }

      case "edit_conferences": { 

        $arrCategories = $db->getRows("SELECT * from conferences where id='" . $_POST["Id"] . "'");



        foreach ($arrCategories as $value) {

          $service = $value['service'];

          $short_description = $value['short_description'];

          // $icon = $value['image'];

?>

          <div class="col-md-12 mgt-20">

            <label>Service<span class="redstar">*</span></label>

            <input type="text" name="service" class="form-control" placeholder="service" required="" value="<?= $service ?>">

          </div>

          <div class="col-md-12 mgt-20">

            <label>Short Description<span class="redstar">*</span></label>

            <textarea name="short_description" class="form-control editor" id="editor" placeholder="description"><?= $short_description ?></textarea>

          </div>

          <!-- <div class="col-md-12 mgt-20">

            <label>Image<span class="redstar">*</span></label> -->

            <?php // $values = '';

           // if (strpos($icon, "http") !== false) {

             // $values = $icon;

           // } else if ($icon != '') {

            //  $values = '../' . $icon;

          //  } //?>

            <!-- <div style="margin: 10px 0"><img src='<?//= $values ?>' style='max-width: 100px;' /></div>

            <input type="file" accept="image/png, image/jpeg, image/gif" name="imagefiles[]" id="imagefiles" />

          < </div> -->

          <input type="text" name="tableid" value="<?= $value['id'] ?>" id="tableid" class="form-control" hidden="" style="display: none;"> 



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
            data: 'action=edit_invitedfaculty&Id=' + value,
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
</script>
<script src="//cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script>
        <?php    }

        break;

      }

    case "edit_products": {

        $arrCategories = $db->getRows("SELECT * from products where id='" . $_POST["Id"] . "'");

        foreach ($arrCategories as $value) {

          $service_id = $value['service_id'];

          $short_description = $value['short_description'];

          $icon = $value['main_image'];

          $name = $value['name'];

          $price = $value['price'];

          $description = $value['description'];

          $other_image = json_decode($value['other_images']);



        ?>

          <div class="col-md-12 mgt-20">

            <label>Category/ Service<span class="redstar">*</span></label>

            <select name="service_id" class="form-control">

              <?php

              $service = $db->getRows("select service, id from services order by id");

              if (count($service) > 0) {

                foreach ($service as $key => $vals) { ?>

                 <option <?= $vals['id']==$value['service_id']?'selected="true"':''; ?> value="<?= $vals["id"] ?>" 

               ><?= $vals["service"] ?> </option>

              <?php }

              } ?>

            </select>

          </div>

          <div class="col-md-12 mgt-20">

            <label>Product Name<span class="redstar">*</span></label>

            <input type="text" name="name" class="form-control" placeholder="product" value="<?= $name ?>" required="">

          </div>

          <div class="col-md-12 mgt-20">

            <label>Approx Price<span class="redstar">*</span></label>

            <input type="text" name="price" class="form-control" placeholder="Approximate Price" value="<?= $price ?>" required="">

          </div>



          <div class="col-md-12 mgt-20">

            <label>Description<span class="redstar">*</span></label>

            <textarea name="description" class="form-control editor" id="editor1" placeholder="description" required=""><?= base64_decode($description) ?></textarea>

          </div>

          <div class="col-md-12 mgt-20">

            <label>Short Description</label>

            <textarea name="short_description" class="form-control" placeholder="Short Description"><?= base64_decode($short_description) ?></textarea>

          </div>

          <div class="col-md-12 mgt-20">

            <label>Main Image<span class="redstar"></span></label>

            <?php $values = '';

            if (strpos($icon, "http") !== false) {

              $values = $icon;

            } else if ($icon != '') {

              $values = '../' . $icon;

            } ?>

            <div style="margin: 10px 0"><img src='<?= $values ?>' style='max-width: 100px;' /></div>

            <input type="file" class="form-control" accept="image/png, image/jpeg, image/gif" name="imagefiles[]" id="imagefiles" />

          </div>

          <div class="col-md-12 mgt-20">

            <label>Other Image<span class="redstar"></span></label><br /><br />

            <?php

            foreach ($other_image as $key => $icon) {

              $values = '';

              if (strpos($icon, "http") !== false) {

                $values = $icon;

              } else if ($icon != '') {

                $values = '../' . $icon;

              } ?>

              <div class="col-md-3" style="margin: 10px 0"><button type="button" class="btn btn-round btn-danger pull-right" onclick='deleteproductimg("<?= $icon ?>","<?= $value['id'] ?>")'><i class="fa fa-times"></i></button><img src='<?= $values ?>' style='max-width: 100px;' /></div>

            <?php } ?>

            <input type="file" class="form-control" accept="image/png, image/jpeg, image/gif" name="otherimagefiles[]" id="otherimagefiles" multiple="" />

          </div>

          <input type="text" name="tableid" value="<?= $value['id'] ?>" id="tableid" class="form-control" hidden="" style="display: none;">

        <?php }

        break;

      }


      case "deletetestimonails":{

        $res = $db->getrow("SELECT image FROM testimonails where s_no ='".$_POST['Id']."'");

        if(!empty($res)){
    
          if (!empty($res['image']))
          unlink($res['image']);
 
           $name = $db->delete($_POST['TableName'],"where s_no='".$_POST['Id']."'");
          }


        if($db->getAffectedRows() > 0){
          echo json_encode(array('validation'=>'1','message'=>'Testimonials Deleted Successfully !'));
        } else{
          echo json_encode(array('validation'=>'0','message'=>'Action Failed ! Please try again.'));
        }
      break;
      }


      case "deletecaseperformed":{

        $res = $db->getrow("SELECT image FROM cases_performed where id ='".$_POST['Id']."'");

        if(!empty($res)){
    
          if (!empty($res['image']))
          unlink($res['image']);
 
           $name = $db->delete($_POST['TableName'],"where id='".$_POST['Id']."'");
          }


        if($db->getAffectedRows() > 0){
          echo json_encode(array('validation'=>'1','message'=>'Testimonials Deleted Successfully !'));
        } else{
          echo json_encode(array('validation'=>'0','message'=>'Action Failed ! Please try again.'));
        }
      break;
      }

      case "delete_service_gallery":{

        $res = $db->getrow("SELECT image FROM service_gallery where id ='".$_POST['Id']."'");

        if(!empty($res)){
    
          if (!empty($res['image']))
          unlink($res['image']);
 
           $name = $db->delete($_POST['TableName'],"where id='".$_POST['Id']."'");
          }


        if($db->getAffectedRows() > 0){
          echo json_encode(array('validation'=>'1','message'=>'Testimonials Deleted Successfully !'));
        } else{
          echo json_encode(array('validation'=>'0','message'=>'Action Failed ! Please try again.'));
        }
      break;
      }

    case "deleteotherimage": {

        if (isset($_POST["value"])) {

          $product = $db->getRow("Select other_images from products where id='" . $_POST['Id'] . "'");

          // echo $db->getLastQuery();

          $otherimage = json_decode($product["other_images"]);

          // print_r($otherimage);

          // print_r($_POST["value"]);



          $ary_key = array_search($_POST["value"], $otherimage);

          if (isset($ary_key) && array_key_exists($ary_key, $otherimage)) {

            unset($otherimage[$ary_key]);

            unlink("../" . $_POST["value"]);

          }

          $imgs = array('other_images' => $otherimage);

          $otherimage = json_encode(array_merge($otherimage));

          $imgs = array('other_images' => $otherimage);

          $rest = $db->updateAry("products", $imgs, "WHERE id='" . $_POST['Id'] . "'");

          if (!is_null($rest)) {

            echo json_encode(array('validation' => '1', 'message' => 'Deleted successfully !'));

          } else {

            echo json_encode(array('validation' => '0', 'message' => 'Deletion failed'));

          }

        }

        break;

      }

    case "edit_section": {

        $arrCategories = $db->getRows("SELECT * from section where id='" . $_POST["Id"] . "'");



        foreach ($arrCategories as $value) {

          $section = $value['section'];
          $folder_image = $value['image'];

        ?>

          <div class="col-md-12 mgt-20">

            <label>Section<span class="redstar">*</span></label>

            <input type="text" name="section" class="form-control" placeholder="Section"  pattern="^[a-z A-Z]{2,50}$" required="" value="<?= $value['section'] ?>"><br /><br />

            <div class="avatar-upload">
              <div class="avatar-edit">
                <input type="file" id="img27" name="folder_image" class="img_gal" accept=".png, .jpg, .jpeg, .bmp">
                <label for="img27"><i class="fa fa-pencil-alt"></i></label>
              </div>
              <div class="avatar-preview">
                <div class="imagePreview" style="background-image: url(<?php echo !empty($value['image'])?'../'.$value["image"]:'../images/no-product-found.png'; ?>)">
                </div>
              </div>
                  <span style="color: red;margin: -5px;"><b>(Note:upload Imgae Size of 500*500px And below 3mb of Image Size Are Allowed)</b></span>
                    
            </div>



            <!-- <input type="file"  name="folder_image" class="form-control" placeholder="image" required="" value="<?//= $value['image'] ?>"><br /><br /> -->

          </div>

          <input type="text" name="tableid" value="<?= $value['id'] ?>" id="tableid" class="form-control" hidden="" style="display: none;">



          <script>
            function readURLTwo(input) {
            $tis=$(input);
            if (input.files && input.files[0]) {
              var extension = input.files[0].name.split('.').pop().toLowerCase();
              var reader = new FileReader();
              reader.onload = function(e) {
                $tis.parent().parent().find('.imagePreview').css('background-image', 'url('+e.target.result +')');
                $tis.parent().parent().find('.imagePreview').hide();
                $tis.parent().parent().find('.imagePreview').fadeIn(650);
              }
              reader.readAsDataURL(input.files[0]);
            }
          }
          $(".img_gal").change(function() {
            readURLTwo(this);
          });

          $(document).on("change", ".vid", function(evt) {
          var $source = $('#video_here');
          $source[0].src = URL.createObjectURL(this.files[0]);
          $source.parent()[0].load();
        });
  
         </script>   
      
      <?php    }


        break;

      }



      case "edittestimonials":{

                // for unlink
                $arrCategories = $db->getRows("SELECT * from testimonails where s_no='".$_POST["Id"]."' "); 
                // echo $db->getLastquery();
    //    if(!empty($arrCategories)){
     
    //     echo $arrCategories['image'];exit;
    //       unlink($arrCategories['image']);
    //        $arrCategories = $db->getRows("SELECT * from testimonails where s_no='".$_POST["Id"]."' "); 

    //  }


         foreach ($arrCategories as $value) { 
          // echo 2;exit;

         $name = $value['name'];  
         $image = $value['image'];

         $save1 = $value['feedback']; 
         ?>     
              <div class="Name">
              <label>Name</label>
                 <input type="textarea" name="name"  class="form-control" value="<?=$name?>" pattern="^[a-z A-Z]{2,50}$" maxlength="30">
                </div> 

                <div class="col-md-12 mgt-20">
          <label>Select Image <span style="color: red;">(Note:upload Imgae Size of 500*500px And below 3mb of Image Size Are Allowed)</span></label>
           <?php $values=''; if(strpos($image, "http") !== false){ $values= $image; } else if($image !=''){ $values= '../'.$image; } ?>
             <div style="margin: 10px 0"><img src='<?=$image?>' style='max-width: 200px;' /></div>
           <!-- <input type="file" name="image" placeholder="Image" class="form-control" > -->
           <input type="file"   accept="image/png, image/jpeg, image/gif" name="image"  class="form-control" value="<?= $value['image']; ?>"/>

       </div>
        
        
       <input type="text" name="tableid" value="<?= $value['s_no'] ?>"  id="tableid" class="form-control" hidden="" style="display: none;">

                <div class=" mgt-20">
                 <label>Edit Feedbacks</label>
                   <!-- <input type="textarea" name="feeds"  class="form-control" value="<?//=$feedback?>">   -->
                   <textarea name="feeds" class="form-control" pattern="[a-zA-Z0-9 \n]+"  cols="30" rows="10"><?=$save1?></textarea>    
                   
                    
                </div>
                 
            
           <input type="text" name="tableid" value="<?= $value['s_no'] ?>"  id="tableid" class="form-control" hidden="" style="display: none;">
       <?php    }   
       break;
      }


      case "editcasesperformed":{

        // for unlink
        $arrCategories = $db->getRows("SELECT * from cases_performed where id ='".$_POST["Id"]."' "); 
        foreach ($arrCategories as $value) { 

        $title = $value['tittle'];  
        $image = $value['image'];

        $save1 = $value['content']; 
        ?>     
      <div class="Name">
      <label>Name</label>
         <input type="textarea" name="title"  class="form-control" value="<?=$title?>" pattern="^[a-z A-Z]{2,50}$" maxlength="30">

        </div> 

        <div class="col-md-12 mgt-20">
  <label>Select Image <span style="color: red;">(Note:upload Imgae Size of 500*500px And below 3mb of Image Size Are Allowed)</span></label>
   <?php $values=''; if(strpos($image, "http") !== false){ $values= $image; } else if($image !=''){ $values= '../'.$image; } ?>
     <div style="margin: 10px 0"><img src='<?=$image?>' style='max-width: 200px;' /></div>
   <!-- <input type="file" name="image" placeholder="Image" class="form-control" > -->
   <input type="file"   accept="image/png, image/jpeg, image/gif" name="image"  class="form-control" value="<?= $value['image']; ?>"/>

</div>


<input type="text" name="tableid" value="<?= $value['id'] ?>"  id="tableid" class="form-control" hidden="" style="display: none;">

        <div class=" mgt-20">
         <label>Edit content</label>
           <!-- <input type="textarea" name="feeds"  class="form-control" value="<?//=$feedback?>">   -->
           <textarea name="content" class="form-control editor" id="editor" pattern="[a-zA-Z0-9 \n]+"  cols="30" rows="10"><?=$save1?></textarea>    
           <!-- <textarea name="title" class="form-control editor" id="editor" placeholder="description" pattern="^[a-z A-Z]{2,50}$" maxlength="30"> <?=$title?> </textarea> -->

            
        </div>
         
    
   <input type="text" name="tableid" value="<?= $value['id'] ?>"  id="tableid" class="form-control" hidden="" style="display: none;">

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
            data: 'action=editcasesperformed&Id=' + value,
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
</script>
<script src="//cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script>

<?php    }   
break;
}




case "edit_gallery_services":{

  // for unlink
  $arrCategories = $db->getRows("SELECT * from service_gallery where id ='".$_POST["Id"]."' "); 
  foreach ($arrCategories as $value) { 

  // $title = $value['tittle'];  
  $image = $value['image'];

  // $save1 = $value['content']; 
  ?>     
<!-- <div class="Name">
<label>Name</label>
   <input type="textarea" name="title"  class="form-control" value="<?=$title?>" pattern="^[a-z A-Z]{2,50}$" maxlength="30">
  </div>  -->

  <div class="col-md-12 mgt-20">
<label>Select Image <span style="color: red;">(Note:upload Imgae Size of 500*500px And below 7mb of Image Size Are Allowed)</span></label>
<?php $values=''; if(strpos($image, "http") !== false){ $values= $image; } else if($image !=''){ $values= '../'.$image; } ?>
<div style="margin: 10px 0"><img src='<?=$image?>' style='max-width: 200px;' /></div>
<!-- <input type="file" name="image" placeholder="Image" class="form-control" > -->
<input type="file"   accept="image/png, image/jpeg, image/gif" name="image"  class="form-control" value="<?= $value['image']; ?>"/>

</div>


<input type="text" name="tableid" value="<?= $value['id'] ?>"  id="tableid" class="form-control" hidden="" style="display: none;">

  <!-- <div class=" mgt-20">
   <label>Edit content</label>
     <textarea name="content" class="form-control" pattern="[a-zA-Z0-9 \n]+"  cols="30" rows="10"><?//=$save1?></textarea>    
     
      
  </div> -->
   

<input type="text" name="tableid" value="<?= $value['id'] ?>"  id="tableid" class="form-control" hidden="" style="display: none;">
<?php    }   
break;
}





      case "edittestimonials11":{
        $arrCategories = $db->getRows("SELECT * from testimonails where s_no='".$_POST["Id"]."'"); 
         foreach ($arrCategories as $value) { 
         $name = $value['name'];  
         $image = $value['image'];
         $feedback = $value['feedback'];
         ?>     
         <div class="Name">
              <label>Name</label>
                 <input type="textarea" name="name" placeholder="Image Name" class="form-control" value="<?=$name?>">
                </div> 


                <div class="col-md-12 mgt-20">
              <label>Selct Image</label>
               <?php $values=''; if(strpos($image, "http") !== false){ $values= $image; } else if($image !=''){ $values= '../'.$image; } ?>
                 <div style="margin: 10px 0"><img src='<?=$values?>' style='max-width: 200px;' /></div>
               <input type="file" name="image" placeholder="Image" class="form-control" >
           </div>
            
            
           
           <input type="text" name="tableid" value="<?= $value['s_no'] ?>"  id="tableid" class="form-control" hidden="" style="display: none;">
       

           <div class=" mgt-20">
                 <label>Edit Feedbacks</label>
                   <!-- <input type="textarea" name="feeds"  class="form-control" value="<?//=$feedback?>">   -->
                   <textarea name="feeds" class="form-control"  cols="30" rows="10"><?=$feedback?></textarea>    
                   
                    
                </div>


       <?php    }   
       break;
      }



      case "edit_galleryimage": {

        $arrCategories = $db->getRows("SELECT * from images where image_id='" . $_POST["Id"] . "'");



        foreach ($arrCategories as $value) {

          $icon = $value['image'];
          $edit_video = $value['video'];





        ?>

          <div class="col-md-12 mgt-20">

          <?php 

          if(!empty($icon)){
         
          ?>

           
            <span class="badge-label">Image<span class="redstar"></span></span>
            <div class="avatar-upload">
              <div class="avatar-edit">
                <input type='file' id="img26" name="image" class="img" accept=".png, .jpg, .jpeg, .bmp" />
                <label for="img26"><i class="fa fa-pencil-alt"></i></label>
              </div>
              <div class="avatar-preview">
                <div class="imagePreview" style="background-image: url(<?php echo !empty($value['image'])?'../'.$value["image"]:'../images/no-product-found.png'; ?>">
                </div>
              </div>
                  <span style="color: red;margin: -5px;"><b>upload Imgae Size of 500*500px And Below 3mb of Image Size Are Allowed</b></span>
                    
            </div>

            <?php } ?>

            <?php 

              if(!empty($edit_video)){

                $mp4 = '.mp4';
								$mkv = '.mkv';
								$avi = '.avi';

                if ((substr($edit_video, -strlen($mp4)) === $mp4) || (substr($edit_video, -strlen($mkv)) === $mkv) || (substr($edit_video, -strlen($avi)) === $avi))
								{ 
               
                //   if((str_ends_with($edit_video, '.mp4')) || (str_ends_with($edit_video, '.avi')) || (str_ends_with($edit_video, '.mkv')))
                // { 
                  
                  ?>
                <span class="badge-label">Video<span class="redstar"></span></span>
                <div class="avatar-upload">
                  <div class="avatar-edit">
                    <input type='file' id="video" name="video" class="vid" accept=".mp4, .avi, .mkv" />
                    <label for="video"><i class="fa fa-pencil-alt"></i></label>
                  </div>
                  <!-- <input type="file" name="file[]" class="file_multi_video" accept="video/*"> -->
                  <div class="avatar-preview">
                    <div class="imagePreview">
                      <video controls style="border-radius: 100%; width: 195px; height: 195px;">  
                        <source src="<?='../'.$edit_video?>" type="video/mp4" class="videoPreview" id="video_here">  
                        Your browser does not support the html video tag.  
                      </video>
                    </div>
                  </div>
                      <span style="color: red;margin: -5px;"><b>(Upload video below 15mb Only mp4, Avi and mkv Formats Are Awolled)</b></span>
                        
                </div>

                <?php } 
                else
                { ?>
                  <span class="badge-label">Video URL<span class="redstar"></span></span>
                  <input type="text" name="video_url" value="<?= $edit_video?>">
               <?php }
              } ?>
            


          </div>
          

            </div>

            <input type="text" name="tableid" value="<?= $value['image_id'] ?>" id="tableid" class="form-control" hidden="" style="display: none;">

<script>
function readURL(input) {
    $tis=$(input);
    if (input.files && input.files[0]) {
      var extension = input.files[0].name.split('.').pop().toLowerCase();
      var reader = new FileReader();
      reader.onload = function(e) {
        $tis.parent().parent().find('.imagePreview').css('background-image', 'url('+e.target.result +')');
        $tis.parent().parent().find('.imagePreview').hide();
        $tis.parent().parent().find('.imagePreview').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $(".img").change(function() {
    readURL(this);
  });

  $(document).on("change", ".vid", function(evt) {
  var $source = $('#video_here');
  $source[0].src = URL.createObjectURL(this.files[0]);
  $source.parent()[0].load();
});
  
  </script>






  <?php    }

        break;

      }


      case "edit_speciality_galleryimage": {

        $arrCategories = $db->getRows("SELECT * from speciality_gallery where id='" . $_POST["Id"] . "'");



        foreach ($arrCategories as $value) {

          $icon = $value['image'];
          $edit_video = $value['video'];





        ?>

          <div class="col-md-12 mgt-20">

          <?php 

          if(!empty($icon)){
         
          ?>

           
            <span class="badge-label">Image<span class="redstar"></span></span>
            <div class="avatar-upload">
              <div class="avatar-edit">
                <input type='file' id="img26" name="image" class="img" accept=".png, .jpg, .jpeg, .bmp" />
                <label for="img26"><i class="fa fa-pencil-alt"></i></label>
              </div>
              <div class="avatar-preview">
                <div class="imagePreview" style="background-image: url(<?php echo !empty($value['image'])?'../'.$value["image"]:'../images/no-product-found.png'; ?>">
                </div>
              </div>
                  <span style="color: red;margin: -5px;"><b>upload Imgae Size of 500*500px And Below 3mb of Image Size Are Allowed</b></span>
                    
            </div>

            <?php } ?>

            <?php 

              if(!empty($edit_video)){

                $mp4 = '.mp4';
								$mkv = '.mkv';
								$avi = '.avi';

                if ((substr($edit_video, -strlen($mp4)) === $mp4) || (substr($edit_video, -strlen($mkv)) === $mkv) || (substr($edit_video, -strlen($avi)) === $avi))
								{ 
               
                //   if((str_ends_with($edit_video, '.mp4')) || (str_ends_with($edit_video, '.avi')) || (str_ends_with($edit_video, '.mkv')))
                // { 
                  
                  ?>
                <span class="badge-label">Video<span class="redstar"></span></span>
                <div class="avatar-upload">
                  <div class="avatar-edit">
                    <input type='file' id="video" name="video" class="vid" accept=".mp4, .avi, .mkv" />
                    <label for="video"><i class="fa fa-pencil-alt"></i></label>
                  </div>
                  <!-- <input type="file" name="file[]" class="file_multi_video" accept="video/*"> -->
                  <div class="avatar-preview">
                    <div class="imagePreview">
                      <video controls style="border-radius: 100%; width: 195px; height: 195px;">  
                        <source src="<?='../'.$edit_video?>" type="video/mp4" class="videoPreview" id="video_here">  
                        Your browser does not support the html video tag.  
                      </video>
                    </div>
                  </div>
                      <span style="color: red;margin: -5px;"><b>(Upload video below 15mb Only mp4, Avi and mkv Formats Are Awolled)</b></span>
                        
                </div>

                <?php } 
                else
                { ?>
                  <span class="badge-label">Video URL<span class="redstar"></span></span>
                  <input type="text" name="video_url" value="<?= $edit_video?>">
               <?php }
              } ?>
            


          </div>
          

            </div>

            <input type="text" name="tableid" value="<?= $value['id'] ?>" id="tableid" class="form-control" hidden="" style="display: none;">

<script>
function readURL(input) {
    $tis=$(input);
    if (input.files && input.files[0]) {
      var extension = input.files[0].name.split('.').pop().toLowerCase();
      var reader = new FileReader();
      reader.onload = function(e) {
        $tis.parent().parent().find('.imagePreview').css('background-image', 'url('+e.target.result +')');
        $tis.parent().parent().find('.imagePreview').hide();
        $tis.parent().parent().find('.imagePreview').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $(".img").change(function() {
    readURL(this);
  });

  $(document).on("change", ".vid", function(evt) {
  var $source = $('#video_here');
  $source[0].src = URL.createObjectURL(this.files[0]);
  $source.parent()[0].load();
});
  
  </script>






  <?php    }

        break;

      }



      case "editePublicationgallery":{

        // for unlink
        $arrCategories = $db->getRows("SELECT * from publication_gallery where id='".$_POST["Id"]."' "); 



 foreach ($arrCategories as $value) { 
 

//  $title = $value['title'];  
 $image = $value['image'];

 $content = $value['content']; 
 ?>     
      <!-- <div class="Name">
      <label>Title</label>
         <input type="textarea" name="title"  class="form-control" value="<?//=$title?>">
        </div>  -->

        <div class="col-md-12 mgt-20">
  <label>Select Image Note: (upload Imgae Size of 600*300px And Below 3mb)</label>
   <?php $values=''; if(strpos($image, "http") !== false){ $values= $image; } else if($image !=''){ $values= '../'.$image; } ?>
     <div style="margin: 10px 0"><img src='<?=$image?>' style='max-width: 200px;' /></div>
   <input type="file"   accept="image/png, image/jpeg, image/gif" name="image"  class="form-control" value="<?= $value['image']; ?>"/>

</div>


<!-- <input type="text" name="tableid" value="<?//= $value['id'] ?>"  id="tableid" class="form-control" hidden="" style="display: none;"> -->

      <div class="col-md-12 mgt-20">
      <label>content:</label>
         <!-- <input type="textarea" name="title"  class="form-control" value="<?//= $title ?>"> -->
         <textarea name="content"><?= $content ?></textarea>
        </div> 
         
    
   <input type="text" name="tableid" value="<?= $value['id'] ?>"  id="tableid" class="form-control" hidden="" style="display: none;">
<?php    }   
break;
}


case "deletepublicationgallery":{

  $res = $db->getrow("SELECT * FROM publication_gallery where id ='".$_POST['Id']."'");

  if(!empty($res)){

    if (!empty($res['image']))
    unlink($res['image']);
    // unlink($res['pdf_attachments']);

     $name = $db->delete($_POST['TableName'],"where id='".$_POST['Id']."'");
    }


  if($db->getAffectedRows() > 0){
    echo json_encode(array('validation'=>'1','message'=>'Image deleted successfully !'));
  } else{
    echo json_encode(array('validation'=>'0','message'=>'Action Failed ! Please try again.'));
  }
break;
}

   

  }

}

  ?>