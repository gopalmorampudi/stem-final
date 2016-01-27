<?php
session_start();
include "dbconnection.php";
require_once('lib/swift_required.php');
$name=$_REQUEST['name'];
$emailid=$_REQUEST['emailid'];
$phoneNumber=$_REQUEST['phoneNumber'];
$subject=$_REQUEST['subject'];
$desc=$_REQUEST['desc'];
$sql="insert into contact(customer_name,email,phone,subject,description) values('$name','$emailid',$phoneNumber,'$subject','$desc')";
$res=mysql_query($sql);
if($res){
$br=<<<BR
  Hello\r\n
 Contact  details are below:-\r\n
 Name:$name.\r\n
 Email:$emailid.\r\n
 Phone:$phoneNumber.\r\n
 Subject:$subject.\r\n
 Desicription:$desc.\r\n
 
 Thank you,
 Administrator,
 STEM CENTER.
BR;
$new=$br;
$message=Swift_Message::newInstance() ;
$message->setSubject('Contact Us Enquiry');
$message->setFrom(array('info@ourstemcenter.com'=>"STEM"));
$message->setTo(array('stem.teamproject@gmail.com' =>"STEM"));
$message->setBody($new);
$transport=Swift_SmtpTransport::newInstance('mail.ourstemcenter.com', 25);
$transport->setUsername('info@ourstemcenter.com');
$transport->setPassword('stem@123');
$mailer=Swift_Mailer::newInstance($transport);
$mailer->send($message);	
$_SESSION['flag']="success";
header('Location: contact.php');
}else{  
$_SESSION['flag']="failed";
header('Location: contact.php');
} 

?>