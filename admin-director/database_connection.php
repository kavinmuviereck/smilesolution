<?php    
	date_default_timezone_set("Asia/Calcutta");
         $servername = "localhost";
      
        $username = "root";
       $password = "";
       $dbname = "jubiliant";


        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);


        if(isset($_POST['submit'])){
            if(!empty($_POST['FullName']) && !empty($_post['email']) && !empty($_post['message'])){


                $FullName=$_POST['fullname'];
                $email=$_post['email'];
                $message=$_post['message'];


                $query ="INSERT into contact_us(FullName , email , message) VALUES(  $FullName,$email,$message)";

                $run = mysqli_query( $conn, $query)

                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                if($run){
                    echo "Form Submitted successfully";
                }

                else{
                    echo "Form Not submitted";
                }

                }

                else{
                    echo "All Feilds Are Required";
                }
           
         



        }

       
?>