<?php include "config.php" ?>
<?php $pageName = basename($_SERVER['PHP_SELF']); ?>
<?php
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include library files 
require 'testmail/PHPMailer/Exception.php';
require 'testmail/PHPMailer/PHPMailer.php';
require 'testmail/PHPMailer/SMTP.php';


if (isset($_POST['send_contacts'])) {

	$inputvalidation->addRule($_POST['name'],'alpha','Name', true , 3 , 150);
    
	$inputvalidation->addRule($_POST['mobile'],'num','phone', true , 10);
	
	$inputvalidation->addRule($_POST['email'],'','email', true, 5);

	// $inputvalidation->addRule($_POST['subject'],'messagechar','subject', true, 5 );
	
	$inputvalidation->addRule($_POST['message'],'messagechar','message', true, 5 , 250);

   
	if(!$inputvalidation->validate()){  

		 echo "<script>alert('".$inputvalidation->errors()."');window.history.back();</script>" ;



}else{



//     //our content
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    // $subject = $_POST['subject'];
    $message = $_POST['message'];

//     $o_mobile = "8667551412";
// // echo $name,$mobile,$email;exit;

//     //fake key
//     $SMSapiKey = urlencode('CWExuBiI7Uo-bSk5CvzGRmGYVgKR5MXb3hvAr1');
//     $senderID = urlencode('MURCK');
//     //original key
//     // $SMSapiKey = urlencode('CWExuBiI7Uo-bSk5CvzP2OpGRmGYVgKR5MXb3hvAr1');
//     // $senderID = urlencode('MUVRCK');

//     $numbers = array($o_mobile);
//   $message = rawurlencode("You have a new enquiry from Bright Vision Website - Name: ".$name.", Mobile: ".$mobile.", Email: ".$email." Powered by Muviereck Technologies.");
//     $numbers = implode(',', $numbers);
//     $data = array('apikey' => $SMSapiKey, 'numbers' => $numbers, "sender" => $senderID, "message" => $message);
//     // dd($data);
//     $ch = curl_init('https://api.textlocal.in/send/');
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     $response = curl_exec($ch);
//        print_r($response);
//     curl_close($ch);
//     $DecodeResponse = json_decode($response);

    


    // Create an instance; Pass `true` to enable exceptions 
    $mail = new PHPMailer;

    // Server settings 
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output 
    $mail->isSMTP();                            // Set mailer to use SMTP 
    $mail->Host = 'smtp.gmail.com';           // Specify main and backup SMTP servers 
    $mail->SMTPAuth = true;                     // Enable SMTP authentication 
    $mail->Username = 'prasanth@muvierecktech.com';       // SMTP username 
    $mail->Password = 'tprplvbvizpceqyt';         // SMTP password 

    // $mail->Password = 'Virat@0806';         // SMTP password 
    $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted 
    $mail->Port = 587;

  
    // Sender info 
    $mail->setFrom('prasanth@muvierecktech.com', 'Smilesolution');

    // Add a recipient 
    $mail->addAddress('prasanth@muvierecktech.com');



    // Set email format to HTML 
    $mail->isHTML(true);

    // Mail subject 
    $mail->Subject = 'Mail from Contact us form';

    // Mail body content 

    $bodyContent = "<b>Name: </b>" . $name . "<br/><br/><b>Mobile: </b>" . $mobile . "<br/><br/><b>Email: </b>" . $email . "<br/><br/><b>Message: </b>" . $message . "";;

    $mail->Body  = $bodyContent;

    // Send email 
    if (!$mail->send()) {
        echo "<script>alert('Failed! Please Try Later')</script>";
    } else {
        $save = array();
        $save['name']    = $_POST['name'];
        $save['email']    = $_POST['email'];
        $save['phone']   = $_POST['mobile'];
        // $save['subject']   = $_POST['subject'];
        $save['message']  = $_POST['message'];

        $set = $db->insertAry("contact", $save);
        echo "<script>alert('Message Sent Successfully.');window.location.href = '$pageName';</script>";    }



}
}


if (isset($_POST['contacts_send'])) {

	$inputvalidation->addRule($_POST['name'],'alpha','Name', true , 3 , 150);
    
	$inputvalidation->addRule($_POST['mobile'],'num','phone', true , 10);
	
	$inputvalidation->addRule($_POST['email'],'','email', true, 5);

   
	if(!$inputvalidation->validate()){  

		 echo "<script>alert('".$inputvalidation->errors()."');window.history.back();</script>" ;



}else{



//     //our content
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];


//     $o_mobile = "8667551412";
// // echo $name,$mobile,$email;exit;

//     //fake key
//     $SMSapiKey = urlencode('CWExuBiI7Uo-bSk5CvzGRmGYVgKR5MXb3hvAr1');
//     $senderID = urlencode('MURCK');
//     //original key
//     // $SMSapiKey = urlencode('CWExuBiI7Uo-bSk5CvzP2OpGRmGYVgKR5MXb3hvAr1');
//     // $senderID = urlencode('MUVRCK');

//     $numbers = array($o_mobile);
//   $message = rawurlencode("You have a new enquiry from Bright Vision Website - Name: ".$name.", Mobile: ".$mobile.", Email: ".$email." Powered by Muviereck Technologies.");
//     $numbers = implode(',', $numbers);
//     $data = array('apikey' => $SMSapiKey, 'numbers' => $numbers, "sender" => $senderID, "message" => $message);
//     // dd($data);
//     $ch = curl_init('https://api.textlocal.in/send/');
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     $response = curl_exec($ch);
//        print_r($response);
//     curl_close($ch);
//     $DecodeResponse = json_decode($response);

    


    // Create an instance; Pass `true` to enable exceptions 
    $mail = new PHPMailer;

    // Server settings 
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output 
    $mail->isSMTP();                            // Set mailer to use SMTP 
    $mail->Host = 'smtp.gmail.com';           // Specify main and backup SMTP servers 
    $mail->SMTPAuth = true;                     // Enable SMTP authentication 
    $mail->Username = 'prasanth@muvierecktech.com';       // SMTP username 
    $mail->Password = 'tprplvbvizpceqyt';         // SMTP password 

    // $mail->Password = 'Virat@0806';         // SMTP password 
    $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted 
    $mail->Port = 587;

  
    // Sender info 
    $mail->setFrom('prasanth@muvierecktech.com', 'Smilesolution');

    // Add a recipient 
    $mail->addAddress('prasanth@muvierecktech.com');



    // Set email format to HTML 
    $mail->isHTML(true);

    // Mail subject 
    $mail->Subject = 'Mail from Contact us form';

    // Mail body content 

    $bodyContents = "<b>Name: </b>" . $name . "<br/><br/><b>Mobile: </b>" . $mobile . "<br/><br/><b>Email: </b>" . $email ."";;

    $mail->Body  = $bodyContents;

    // Send email 
    if (!$mail->send()) {
        echo "<script>alert('Failed! Please Try Later')</script>";
    } else {
        $save = array();
        $save['name']    = $_POST['name'];
        $save['email']    = $_POST['email'];
        $save['phone']   = $_POST['mobile'];
    

        $set = $db->insertAry("contact", $save);
        echo "<script>alert('Message Sent Successfully.');window.location.href = '$pageName';</script>";    }



}
}
?>


