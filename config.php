<?php

/*
Name: PHP Contact Form
Author: Shameem Reza
URI: hyyp://shameemreza.com
*/

/* ######################### Form Settings (Change values accordingly) ######################### */

$styleSheet = 0; //0 for default skin, 1 for grey skin 
$contact_form_title = "Contact Us";


/* ########################## Email settings  ###################### */

$send_to = "send@email.com"; // Send requests from the form to this email address

$cc_to   = "myotheremail@email.com"; // Will CC to this email address

$bcc_to   = "secret@email.com"; // Will BCC to this email address

$mail_title = "Hello from feedback form"; // Subject of the mail

/* ########################## Email settings - END  ###################### */

/* ########################## Confirmation email settings  ###################### */


$send_confirmation = "Y"; //Send confirmation email to the user who submit the request - Y for "Yes" N for "No"

$confirmation_message = "We have recieved your inquiry. We will respond shortly"; //Message in the confirmation email

$confirmation_mail_title = "Thank you for contacting us"; // Subject of the confirmation mail

$confirmation_mail_from = "donotreply@email.com"; // from address of confirmation mail  


/* ########################## Confirmation email settings  ###################### */




/* ########################## Name field settings  ###################### */

$validate_name = "N"; //Validate Name field - Y for "Yes" N for "No"
$name_required = "Y"; //Name field required - Y for "Yes" N for "No"

/* ########################## Name field settings - END  ###################### */


/* ########################## Email field settings  ###################### */

$validate_email = "Y"; //Validate Email field - Y for "Yes" N for "No"
$email_required ="Y"; //Email field required - Y for "Yes" N for "No"

/* ########################## Email field settings - END  ###################### */

/* ########################## Phone field settings  ###################### */

$validate_phone = "Y"; //Validate Phone field - Y for "Yes" N for "No"
$phone_required ="N"; //Phone field required - Y for "Yes" N for "No"

/* ########################## Email field settings - END  ###################### */


/* ########################## Department field settings  ###################### */


$department_list = "Support,Sales,Technical,Political, Other"; //Items to appear on dropdown list (Seperate each item with a comma)  


/* ########################## Department field settings - END  ###################### */

/* ########################## Subject field settings  ###################### */


$subject_required = "Y"; //Subject field required - Y for "Yes" N for "No" 


/* ########################## Subject field settings - END  ###################### */


/* ########################## Message field settings  ###################### */


$message_required ="Y"; //Message field required - Y for "Yes" N for "No"



/* ########################## Message field settings  ###################### */


/* ######################### CForm Settings  - END ############################################ */



/* ######################### Configurations ######################### */



//CAPTCHA Settings

$length = 6;

$salt = 's+(_a*';

$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

$hash = md5($randomString.$salt);


//Select a style sheet

$cssFile =  array('stylesheet.css' , 'skin-stylesheet.css');


$error=array();


/* Validate name  */


if (isset($_POST["submit"])) {


if(empty($_POST['name']) && empty ($_POST['email']) && empty ($_POST['phone']) && empty ($_POST['message']) && empty ($_POST['captcha'])) {
$error[0]='<span class="not-valid">You must fill in all of the required fields.</span>';  	
}



if($validate_name=="Y"){

if((!empty($_POST['name']) && !(preg_match("/^[a-zA-Z ]+$/",$_POST['name'])))){
$error[1]='<span class="not-valid">Name not valid.</span>';
}

}



if($name_required=="Y"){

if(empty($_POST['name'])){
 
$error[2]='<span class="def-error">Name required.</span>';     
}

}

/* Validate name END  */


/* Validate email */


if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && (!empty($_POST['email'])) ) {
$error[3]='<span class="not-valid">Email address is not valid</span>';	
} 

if($email_required=="Y"){

if(empty($_POST['email'])){
$error[4]='<span class="def-error">Email address is required.</span>';  
}

}
  
/* Validate email - END */


/* Validate phone numbers */


/*if((!empty($_POST['phone']) && !preg_match ("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/",$_POST['phone']))){
 
$error2[7]='<span class="not-valid">Phone number is not valid.</span>';
}*/

if($validate_phone=="Y"){

if((!empty($_POST['phone']) && !preg_match ("/^[0-9]{8,15}$/",$_POST['phone']))){
 
$error[5]='<span class="not-valid">Phone number is not valid. (min. 8 numbers)</span>';
}

}


if($phone_required=="Y"){

if(empty($_POST['phone'])){
  
$error[6]='<span class="def-error">Phone number is required.</span>';      
}

}

/* Validate phone numbers - END */



/* Validate message box*/

if($message_required=="Y"){

if(empty($_POST['message'])){
 
$error[7]='<span class="def-error">Message required.</span>';     
}

} 


/* Validate message box - END */


/* Validate Subject  */


if($subject_required=="Y"){

if(empty($_POST['subject'])){
 
$error[9]='<span class="def-error">Subject required.</span>';     
}

}

/* Validate Subject - END */



/* Validate CAPTCHA */

$input_hash = md5(trim($_POST['captcha']).$salt);
$compare_hash = trim($_POST['confirm']);


if($input_hash===$compare_hash) {}else $error[11]='<span class="def-error">invalid security code.</span>';;

/* Validate CAPTCHA - END  */


// Send the email if no errors found.


$mail_name = strip_tags($_POST['name']);
$mail_email =  strip_tags($_POST['email']);
$mail_phone = strip_tags($_POST['phone']);
$mail_department = $_POST['department'];
$mail_subject = strip_tags($_POST['subject']);
$mail_message = strip_tags($_POST['message']);


if(!count($error)){
$to = "$send_to";
$subject = "$mail_title - $mail_subject - $mail_department ";
$body = "Name: $mail_name <br/><br/> Email: $mail_email <br/><br/> Phone: $mail_phone<br/><br/>Subject: $mail_subject <br/><br/>
Department: $mail_department <br/><br/> Message: $mail_message";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From:".$mail_email."\r\n";
$headers .= "Reply-To:".$mail_email."\r\n";
$headers .= "Cc: $cc_to\r\n";
$headers .= "Bcc:$bcc_to\r\n";

mail($to,$subject,$body,$headers);

$error[10]='<span class="valid-tip">All ok</span>';

//Sending confirmation mail if set yes
if($send_confirmation=="Y"){


$conf_to = "$mail_email";
$conf_subject = "$confirmation_mail_title";
$conf_body = "Hi $mail_name,"."<br/><br/>"."$confirmation_message";
$conf_headers .= "MIME-Version: 1.0" . "\r\n";
$conf_headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$conf_headers .= "From:".$confirmation_mail_from."\r\n";

mail($conf_to,$conf_subject,$conf_body,$conf_headers);		

}
}





}/*End of POST*/

/* ######################### Configurations - END ################### */
