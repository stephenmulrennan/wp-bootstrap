<?php
	function send_notification($name, $phone, $email, $enquiry, $phone)
	{
		$title = 'Callback request from ' . $name;
		$message = $enquiry;
		
		curl_setopt_array($ch = curl_init(), array(
  			CURLOPT_URL => "http://api.pushover.net/1/messages.json",
  			CURLOPT_RETURNTRANSFER => true,
  			CURLOPT_POSTFIELDS => array(
    			"token" => "xTg7cMo56a15r2bWnDWtdi1SN5Z5Ge",
    			"user" => "RCzrrCvxdGxgB6YEDNPySt9wuj3pjJ",
    			"title" => $title,
    			"message" => $message,
    			"url" => "tel://" . $phone,
    			"url_title" => "Call (" . $phone . ")"
  			)
		));
		
		$result = curl_exec($ch);
		$error_no = curl_errno($ch);
		
		if($error_no != 0) {
			
		}
		
		curl_close($ch);
		
		return $result;	
	}
?>
