<?php


	$teamName=$_POST['teamName'];
	$to='sara.bainbridge@gmail.com';
	$subject='[REG]';
	$message='hello';
	$headers='From: webmaster@example.com'."\r\n".'Reply-To: webmaster@example.com'."\r\n".'X-Mailer: PHP/'.phpversion();
	
	
	mail($to,$subject,$message,$headers);
	
	
	
	$success=array('success'=> 'true','message'=>'Successful!');
	echo json_encode($success);
?>