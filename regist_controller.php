<?php

    //POSTの受け取り
    var_dump($_POST);
    echo "<br />";
    echo "出力確認".$_POST['loginId'];





    //URL組み立て用
    $url = "";



    //curl初期化

    /*

    $conn = curl_init();

    curl_setopt($conn, CURLOPT_CONNECTTIMEOUT, 2);
	curl_setopt($conn, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($conn, CURLOPT_HEADER, true);

	$url = 'http://www.google.co.jp/';
 
	curl_setopt($conn, CURLOPT_URL, $url);
	$response = curl_exec($conn);
	*/
	//curl
	//curl_close($conn);


?>

