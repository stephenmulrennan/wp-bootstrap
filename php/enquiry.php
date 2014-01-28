<?php
	require_once('notify.php');
	
	$titles = array(
		0 => 'Mr',
		1 => 'Mrs',
		2 => 'Miss',
		3 => 'Dr'
	);
	
	class enquiry_result {
		public $status = 0, $validationMessages = array();
	}
	
	function validate_field($field, $name, $message, $result) {
		if($field == '') {
			$returnMessage = array(
				'field' => $name,
				'message' => $message
			);
			array_push($result->validationMessages, $returnMessage);
			return false;
		}	
		return true;
	}
	
	function get_message($title, $name, $phone, $email, $enquiry) {
		
		$message = 'Name : ' + $titles[$title] . ' ' . $name . '<br>';
		$message = $message . 'Email Address : ' . $email . '<br>';
		$message = $message . 'Phone Number : ' . $phone . '<br>';
		$message = $message . 'Enquiry : ' . $enquiry;
		
		return $message;
	}
	
	$result = new enquiry_result();
	
	$inputJSON = file_get_contents('php://input');
	
	$input = json_decode( $inputJSON, TRUE );
	
	$title = $input['title'];
	$name = $input['name'];
	$phone = $input['phoneNumber'];
	$email = $input['email'];
	$enquiry = $input['enquiry'];
	
	$isValid = true;
	
	$isValid = !validate_field($title,'title','Title is required', $result) ? false : $isValid;
	$isValid = !validate_field($name,'name','Name is required', $result) ? false : $isValid;
	$isValid = !validate_field($phone,'phoneNumber','Phone number is required', $result) ? false : $isValid;
	$isValid = !validate_field($email,'email','Email address is required', $result) ? false : $isValid;
	$isValid = !validate_field($enquiry,'enquiry','Nature of enquiry is required', $result) ? false : $isValid;
	
	if($isValid) {
		$message = get_message($title, $name, $phone, $email, $enquiry);
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: ' . $name . '<' . $email . '>' . "\r\n";
		
	   	$mailResult = mail('stephen.mulrennan@ntlworld.com', 'Enquiry', $message, $headers, $attachments);
		$notifyResult = send_notification($name, $phone, $email, $enquiry, $phone);
		
		$pushoverJson = json_decode ( $notifyResult, true);
		
		$pushoverStatus = $pushoverJson['status'];
		
		if( !$mailResult ) 
		{
			$result->status = 1;		
		}
		
		if($pushoverStatus != 1) 
		{
			$result->status = 1;
		}
	}
	else {
		$result->status = 2;
	}
	
	$returnedJson = json_encode($result);
	echo $returnedJson;
	
?>