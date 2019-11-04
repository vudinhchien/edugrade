<?php
		
	function gramotech_mailchimp_subscription_status( $email, $status, $list_id, $api_key, $merge_fields = array('FNAME' => '','LNAME' => '') ){
		$data = array(
			'apikey'        => $api_key,
			'email_address' => $email,
			'status'        => $status,
			'merge_fields'  => $merge_fields
		);
		$mch_api = curl_init(); // initialize cURL connection
	 
		curl_setopt($mch_api, CURLOPT_URL, 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members/' . md5(strtolower($data['email_address'])));
		curl_setopt($mch_api, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.base64_encode( 'user:'.$api_key )));
		curl_setopt($mch_api, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
		curl_setopt($mch_api, CURLOPT_RETURNTRANSFER, true); // return the API response
		curl_setopt($mch_api, CURLOPT_CUSTOMREQUEST, 'PUT'); // method PUT
		curl_setopt($mch_api, CURLOPT_TIMEOUT, 10);
		curl_setopt($mch_api, CURLOPT_POST, true);
		curl_setopt($mch_api, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($mch_api, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json
	 
		$result = curl_exec($mch_api);
		return $result;
	}
	
	add_action( 'wp_ajax_nopriv_mailchimp_subscription', 'gramotech_mailchimp_subscription' );
	add_action( 'wp_ajax_mailchimp_subscription', 'gramotech_mailchimp_subscription' );
	
	function gramotech_mailchimp_subscription(){
		
		$mailchimp_api = '';
		$mailchimp_listid = '';
		if(function_exists('fw_get_db_settings_option')){
			$mailchimp_api = fw_get_db_settings_option('mail-chimp-api');
			$mailchimp_listid = fw_get_db_settings_option('mail-chimp-listid');
		}
		
		$email = $_POST['email'];
		if(isset($_POST['fname'])){
			$fname = $_POST['fname'];
		}else{
			$fname = '';
		}
		
		if(isset($_POST['lname'])){
			$lname = $_POST['lname'];
		}else{
			$lname = '';
		}
		
		$status = 'subscribed'; // "subscribed" or "unsubscribed" or "cleaned" or "pending"
		
		$merge_fields = array('FNAME' => $fname,'LNAME' => $lname);
		
		$result = json_decode(gramotech_mailchimp_subscription_status($email, $status, $mailchimp_listid, $mailchimp_api, $merge_fields ),true);
		
		if( $result['status'] == 400 ){
			echo json_encode(array('fail'=>false, 'message'=>$result['detail']));			
		} elseif( $result['status'] == 'subscribed' ){
			echo json_encode(array('success'=>true, 'message'=>'Thank you. Subscription Successfull'));
		}else{
			echo json_encode(array('fail'=>false, 'message'=>'Error! Please configure mailchimp api keys from theme settings >> Api Settings.'));			
		}
		die();
	} ?>