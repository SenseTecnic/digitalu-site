<?php

	$to='sara.bainbridge@gmail.com';
	$subject='[REG]';
	$message='hello';
	$headers='From: sara.bainbridge@gmail.com'."\r\n".'Reply-To: sara.bainbridge@gmail.com'."\r\n".'X-Mailer: PHP/'.phpversion();	
	
	$mailResp = mail($to,$subject,$message,$headers);
	
	$success =array('success'=> 'true','message'=>'Successful!', 'data' => $_POST);
	echo json_encode($success);
?>