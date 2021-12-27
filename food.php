<?php
$foot="";
$img = "";
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
if($foot!=="" || isset($_POST['food'])){
  $food = $_POST['food'];  
}


curl_setopt_array($curl, [
	CURLOPT_URL => "https://edamam-food-and-grocery-database.p.rapidapi.com/parser?ingr=".$food."",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: edamam-food-and-grocery-database.p.rapidapi.com",
		"x-rapidapi-key: 39ac6c85ebmsh6b6e308a4061cbfp1b0061jsn5e48f2a2f866"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {

	$response = json_decode($response,true);
	$article = $response["text"];
	$article_img = $response["parsed"][0]["food"]["image"];
	// var_dump($response["text"]);
	// var_dump($response["parsed"][0]["food"]["image"]);	
	$img .= "<img src=".$article_img.">";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

	<form method="post" action="">
		<input id="food" name="food">
		<button type ="submit">go</button>
	</form>

	<h1><?= $article; ?></h1>
	<?= $img; ?>
</body>
</html>