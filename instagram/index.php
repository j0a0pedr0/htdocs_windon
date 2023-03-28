<?php
	
	include('vendor/autoload.php');

	use MetzWeb\Instagram\Instagram;

	$instagram = new Instagram(array(
		'apiKey'      => '9c63d8ce1a8a4f44b95d9a110c827b26',
		'apiSecret'   => '188bfaf4fe9f4e929db0cf5419bca470',
		'apiCallback' => 'http://localhost/instagram'
	));

	
	if(isset($_GET['code'])){
	// grab OAuth callback code
		$code = $_GET['code'];
		$data = $instagram->getOAuthToken($code);

		var_dump($data);
	}else{
		echo "<a href='{$instagram->getLoginUrl()}'>Login with Instagram</a>";
	}
?>