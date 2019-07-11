<?php 
	require_once 'vendor/autoload.php';

	// Get $id_token via HTTPS POST.
	$CLIENT_ID = '911706458791-0tu98raksnbn2v2uobo8n7c77u8qqanr.apps.googleusercontent.com';
	$client = new Google_Client(['client_id' => $CLIENT_ID]);  // Specify the CLIENT_ID of the app that accesses the backend
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