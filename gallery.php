	<?php
		// Supply a user id and an access token
		$userid = "182663178";
		$accessToken = "182663178.c5f2f7c.0be8ecc031494667a92ddfd51e1c2ac4";

		// Gets our data
		function fetchData($url){
		     $ch = curl_init();
		     curl_setopt($ch, CURLOPT_URL, $url);
		     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		     curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		     $result = curl_exec($ch);
		     curl_close($ch); 
		     return $result;
		}

		// Pulls and parses data.
		$result = fetchData("https://api.instagram.com/v1/users/{$userid}/media/recent/?access_token={$accessToken}");
		$result = json_decode($result);
	?>


	<?php foreach ($result-> data as $post): ?>
		<a class="group" rel="group1" href="<?= $post->images->standard_resolution->url ?>"><img src="<?= $post->images->thumbnail->url ?>"></a>
	<?php endforeach ?>
