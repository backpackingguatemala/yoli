<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yoli - Tu pared merece tus fotografías</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>
  <div class="row">
    <div class="small-12 columns">
      <a href="https://api.instagram.com/oauth/authorize/?client_id=c5f2f7c10403482f9d10a56036212b79&redirect_uri=http://carambamoreno.com/yoli/&response_type=token"> CONNECT</a>      
    </div>
  </div>
  
  
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


	<?php foreach ($result-> data as $post){ ?>
		<a class="group" rel="group1" href="<?= $post->images->standard_resolution->url ?>"><img src="<?= $post->images->thumbnail->url ?>"></a>
	<?php }; ?>
	
	
	
  
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
