<?php

include '../config.php';



if(isset($_POST)){

	$Key = $_POST['Key'];

	$Id = $_POST['Id'];

	$TableName = $_POST['TableName'];

	$rest = $db->delete($TableName,"WHERE ".$Key."='".$Id."' ");


    // print $db->getLastQuery(); 

  	if($db->getAffectedRows() > 0){

    	echo json_encode(array('validation'=>'1','message'=>'Record deleted successfully !'));

  	}else{

    	echo json_encode(array('validation'=>'0','messag'=>'Failed due to Database Error!'));

	} 



}

?>