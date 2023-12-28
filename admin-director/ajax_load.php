<?php include ('../config.php');

function seo_url($vp_string)
{
    $vp_string = trim($vp_string);
    $vp_string = html_entity_decode($vp_string);
    $vp_string = strip_tags($vp_string);
    $vp_string = strtolower($vp_string);
    $vp_string = preg_replace('~[^ a-z0-9_.]~', ' ', $vp_string);
    $vp_string = preg_replace('~ ~', '-', $vp_string);
    $vp_string = preg_replace('~-+~', '-', $vp_string);
    //$vp_string .= "/";
    return $vp_string;
}

$action = $_REQUEST['action'];
// exit;
switch ($action) {  
	case "edit_blogImage":{ ?>
        <input type="text" class="form-control image-preview-filename" name="blog-image" readonly=""> <!-- don't give a name === doesn't send on POST/GET -->
        <span class="input-group-btn">
            <!-- image-preview-clear button -->
            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                <span class="glyphicon glyphicon-remove"></span> Clear
            </button>
            <!-- image-preview-input -->
            <div class="btn btn-default image-preview-input">
                <span class="glyphicon glyphicon-folder-open"></span>
                <span class="image-preview-input-title">Browse</span>
                <input type="file" accept="image/png, image/jpeg, image/gif" name="blog-image2" id="blog-image2" required=""/> <!-- rename it -->
            </div>
        </span>
	<?php
	break;
	}

	case "edit_blogVideo":{ ?>
        <input type="text" class="form-control video-preview-filename" name="blog-video" readonly=""> <!-- don't give a name === doesn't send on POST/GET -->
        <span class="input-group-btn">
            <!-- image-preview-clear button -->
            <button type="button" class="btn btn-default video-preview-clear" style="display:none;">
                <span class="glyphicon glyphicon-remove"></span> Clear
            </button>
            <!-- image-preview-input -->
            <div class="btn btn-default video-preview-input">
                <span class="glyphicon glyphicon-folder-open"></span>
                <span class="video-preview-input-title">Choose Video</span>
                <input type="file" accept="video/mp4, video/3gp, video/mov" name="blog-video2" id="blog-video2" /> <!-- rename it -->
            </div>
        </span>
	<?php
	break;
	}

	case "GetBlogIds":{ 
		 $BlogDetails = $db->getRows("select * from blog_details where Category = '".$_REQUEST['CatgId']."'");
		 // echo $db->getLastQuery();
		?>
		<label for="BlogId">Blog</label>
		<select class="form-control" name="BlogId" id="BlogId" required="">
			<option value="">Select Blog</option>
			<?php foreach ($BlogDetails as $value) { ?>
			<option value="<?= $value['Blog_ID'] ?>" >
			  <?= $value['Headings'] ?>
			</option>
			<?php } ?>
		</select>
	<?php
	break;
	}


	case "delete_blog": {

        // echo 1; exit;

		//var_dump($_POST);

		// die;

        $res = $db->getrow("SELECT Image FROM blog_details where Blog_ID='".$_POST['Id']."'");
        // echo $db->getLastquery();
        
        $imagePath = $res['Image'];
        if(!empty($imagePath)){
      
          // echo $imagePath;exit;
        
          if(file_exists('../images/'.$imagePath)){
          //   echo 3;exit;
          unlink('../images/'.$imagePath);
         }
        }
        $rest = $db->delete($_POST['TableName'], " where Blog_ID='" . $_POST['Id'] . "'");

       

        if ($db->getAffectedRows() > 0) {

          echo json_encode(array('validation' => '1', 'message' => 'Record deleted successfully !'));
        
        } else {

          echo json_encode(array('validation' => '0', 'message' => 'Action Failed ! Please try again.'));

        }
     
        break;

      }

	  case "delete_categories": {

   
        $res = $db->getrow("SELECT Image FROM blog_details where Category='".$_POST['Id']."'");
		
		if(count($res)>0){

		// print_r($res);exit;
        // echo $db->getLastquery();
        
        $imagePath = $res['Image'];
		// echo $imagePath;exit;
        if(!empty($imagePath)){
      
          // echo $imagePath;exit;
        
          if(file_exists('../images/'.$imagePath)){
          //   echo 3;exit;
          unlink('../images/'.$imagePath);
         }
        }

	}

	    $rest2 = $db->delete('blog_details', " where Category='" . $_POST['Id'] . "'");
        $rest = $db->delete($_POST['TableName'], " where Category_Id='" . $_POST['Id'] . "'");


        if ($db->getAffectedRows() > 0) {

          echo json_encode(array('validation' => '1', 'message' => 'Record deleted successfully !'));
        
        } else {

          echo json_encode(array('validation' => '0', 'message' => 'Action Failed ! Please try again.'));

        }
     
        break;

      }



	case "add_Popular_Post":{ 
    	$popular_post = array(
                        'Category_Id'       => $_POST['CatgId'],
                        'Blog_Id'           => $_POST['BlogId'],
                        'CreatedDtTime'     => date('Y-m-d H:i:s')
                    );
    	$rest = $db->insertAry('popular_post',$popular_post);
	    // echo $db->getLastQuery(); exit;
	    if(!is_null($rest)){ 
	    	echo json_encode(array('validation'=>'1'));
	    }else{ 
	    	echo json_encode(array('validation'=>'0')); 
	    }
	break;
	}	


	case "add_category":{ 

		$inputvalidation->addRule($_POST['CategoryName'],'alpha','Category ', true , 5 , false);


		$check_category = $db->getRows("SELECT Category_Name FROM categories WHERE Category_Name ='".$_POST['CategoryName']."'");
		
		// echo $db->getLastQuery();exit;
		if(count($check_category)==0) 
		{
			if(!$inputvalidation->validate()){  

			
				// echo "<script>alert('".$inputvalidation->errors()."');window.history.back()</script>" ;
	//   this is not working actually just for the name sake i have added
				echo ('".$inputvalidation->errors()."'); 
	   
	   
	   }else {
			
			$CategoryLink = seo_url($_POST['CategoryName']);
			$details = array(
							'Category_Name'     => $_POST['CategoryName'],
							'Category_Link'     => $CategoryLink,
							'CreatedDtAndTime'  => date('Y-m-d H:i:s')
						);
			$rest = $db->insertAry('categories',$details);
			// echo $db->getLastQuery(); exit;
			if(!is_null($rest)){ 
				
				echo json_encode(array('validation'=>'1'));
				
			}else{ 
				// echo "aaaaaaaa";exit;
				echo json_encode(array('validation'=>'0')); 
				// print_r(ajay);
			}

		}


		}

		else{
			echo json_encode(array('validation'=>'2')); 
		}

	break;
	}	

	case "edit_category":{
    	$edit_catg = $db->getRow("SELECT * FROM categories where Category_Id='".$_POST["CatgId"]."'");
		// echo 3; exit;
    	?>
		<input type="text" class="form-control" value="<?= $edit_catg["Category_Name"] ?>" id="Category_Name" name="Category_Name"/>
		<input type="hidden" id="Category_Id" name="Category_Id" value="<?= $edit_catg["Category_Id"] ?>" />
		<?php		
		break;
	}

	case "updateCategory":{
		// var_dump($_POST);
		// echo 30; exit;

		$inputvalidation->addRule($_POST['CatgName'],'alpha','Category ', true , 5 , false);

		$check_category = $db->getRows("SELECT Category_Name FROM categories WHERE Category_Name ='".$_POST['CatgName']."' and  Category_Id!='".$_POST['CatgId']."' ");
		// echo count($check_category);
		//echo $db->getLastQuery();exit;
		if(count($check_category)>0) 
		{

			echo json_encode(array('validation'=>'0', 'message'=>'This category name already exist')); 
			exit;

		}
			if(!$inputvalidation->validate()){  
				
				echo json_encode(array('validation'=>'0', 'message'=>$inputvalidation->errors())); 
				exit;
	  		 }
	   else
	    {
		$CategoryLink = seo_url($_POST['CatgName']);
    	$details = array(
                        'Category_Name'      => $_POST['CatgName'],
                        'Category_Link'      => $CategoryLink,
                        'ModifiedDtAndTime'  => date('Y-m-d H:i:s'),
						'DtTime'  => date('Y-m-d H:i:s')
                    );
    	$result = $db->updateAry("categories", $details, "WHERE Category_Id='".$_REQUEST['CatgId']."'");
	    // echo $db->getLastQuery(); exit;
	    if(!is_null($result)){ 
	    	echo json_encode(array('validation'=>'1', 'message'=>'Update successfully'));
	    }else{ 
	    	echo json_encode(array('validation'=>'0', 'message'=>'Update Failed')); 
	    }	
	}

	    break;	
	}

}