<?php 
extract($_REQUEST);
require_once('config.inc.php');
if(!empty($fromEmail) && !empty($fromName) && !empty($hostServer) && !empty($userName) && !empty($password) && !empty($port))
{	// to required value exist or not
	require_once('libraries/email.php');	
	if(isset($testConnection))
	{
		$toEmail = $fromEmail;
		$body = str_replace('{name}',ucwords($name),TEST_SMTP_MAIL_BODY);
		$subject = TEST_SMTP_CONNCTION;
	}	
	$sendEmail = new SmtpMail($userName,$password,$toEmail,$fromEmail,$fromName,$subject,$body,$hostServer,$port,$smtpNumber);
	$sendEmail->sendEmail();
}