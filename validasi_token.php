<?php 
	require_once 'vendor/autoload.php';
	include 'config.php'; //file contains client id and client secret

	// Get $id_token via HTTPS POST.
	$client = new Google_Client(['client_id' => CLIENT_ID]);  // Specify the CLIENT_ID of the app that accesses the backend
	$payload = $client->verifyIdToken($_POST['idtoken']);
	if ($payload) {
	  $userid = $payload['sub'];
	  // If request specified a G Suite domain:
	  //$domain = $payload['hd'];
	  // $institute = $payload['hd'];
	  $output['name'] = $payload['name'];
	  $output['picture'] = $payload['picture'];
	  $output['email'] = $payload['email'];
	  echo json_encode($output);
	} else {
	  // Invalid ID token
		echo 'invalid';
	}
?>