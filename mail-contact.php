<?php
    require_once 'scripts/init.php';  


	if(!valid_email($_POST['email'])){
		$data = array('error' => 1, 'msg' => "Please Enter Valid Email.");        
            header('Content-Type: application/json');
            echo json_encode($data);
			die();
		}
		
    //var_dump($_POST);die();
    if(isset($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'])){
        
         if($_POST['name'] != "" && $_POST['email'] != "" && $_POST['subject'] != "" && $_POST['message'] != "" ){
       

            $msg = $_POST['message'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            //$_POST['product_image'] = "images/product/".$file_name;
            
            //var_dump($orders);die();
            
            
            //$cat = sanitize_sql($_POST['product_title']);
            //$data =   array('error' => 1, 'msg' => "Please Fillup All Fields Marked With <span style='color:#d2322d;'>*</span>");    
            
            $_POST['date'] =date("Y-m-d h:i:sa");
            foreach($_POST as $key => $val){
                $_POST[$key] = sanitize_sql($val);
            }
			
			 
                   
                   //  $to = "arushroy000@gmail.com";
                   $to = "devtechniman@gmail.com";
                    $subject = $_POST['subject'];

                    $message = "
                    <html>
                    <head>
                    <title>Contact us Form</title>
                    </head>
                    <body>

                    <p>Name: $name</p></br>
                    <p>Email: $email</p></br>
                    <p>Subject: $subject</p></br>
                    <p>Message: $msg</p></br></br>
                    <p>-- Mail from Contact Page on aklsari3.com</p></br>


                 
                    
                    </body>
                    </html>
                    ";

                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    // More headers
                    //$headers .= 'From: <webmaster@store.mdfcabinetdoors.ca/>' . "\r\n";
                   

                    	    
                    
			
                if(mail($to,$subject,$message,$headers)){
                //if(mail($to,$subject,$message,$headers) && add_table_data('contact_mail', $_POST)){
                     
                    $data = array('success' => 1, 'msg' => "تم إرسال الرسالة بنجاح! ");
                   

 
                   
                }else{
                    $data = array('error' => 1, 'msg' => "Cannot Add Product Because of ". mysqli_error($con));            
                }
            /* } */
            header('Content-Type: application/json');
            echo json_encode($data);
           
        }else{
            $data = array('error' => 1, 'msg' => "Please Fillup All Fields!");        
            header('Content-Type: application/json');
            echo json_encode($data);
        }

    }    
    
	
	
	function valid_email($str) {
		return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
		}

    
?>