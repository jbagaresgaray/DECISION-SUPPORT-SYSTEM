<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message'])	|| !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
   	return print json_encode(array( 
         'msg'=> "No arguments Provided!", 
         'success'=> false
      ));
      die();
}
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
	
// Create the email and send the message
$to = 'philipgaray2@gmail.com';
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: philipgaray2@gmail.com.com\n";
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);

return print json_encode(array(
         'msg'=> "Mail successfully sent",
         'success'=> true
      ));		
?>