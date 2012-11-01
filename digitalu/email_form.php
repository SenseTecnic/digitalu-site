<?php



	$to='sara.bainbridge@gmail.com';
	$subject='[REG] '.$_POST['projectName'];
	$message=$_POST['projectName'];
	$headers='From: sara.bainbridge@gmail.com'."\r\n".'Reply-To: sara.bainbridge@gmail.com'."\r\n".'X-Mailer: PHP/'.phpversion();	
	
	$mailResp = mail($to,$subject,$message,$headers);
	
	if (!$mailResp){
		$success =array('success'=> 'false','message'=>'Sorry! We were unable to process your registration. Please try again, or email us at digitalu@magic.ubc.ca.', 'data' => $_POST);
	} else{
		$success =array('success'=> 'true','message'=>'Successful!', 'data' => $_POST);
	}
	
	echo json_encode($success);
?>