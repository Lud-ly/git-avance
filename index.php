
<?php 
// require 'iris.php';
require 'astronomy.php';
require 'food.php';

$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt_array($curl, [
	CURLOPT_URL => "https://free-to-play-games-database.p.rapidapi.com/api/games?platform=pc",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: free-to-play-games-database.p.rapidapi.com",
		"x-rapidapi-key: 39ac6c85ebmsh6b6e308a4061cbfp1b0061jsn5e48f2a2f866"
	],
]);
$img = "";
$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$response = json_decode($response,true);
	
	$test = "test";
	foreach ($response as $key => &$val) {
		$img .= "<img src=".$response[$key]["thumbnail"].">";
	}
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="main.js"></script>
    <title>Test</title>
</head>
<body>

</body>
</html>
<?php


