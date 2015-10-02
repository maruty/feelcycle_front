<?php

	$FINAL_URL_STRING = "http://52.69.227.6/feelcyclebatch/apiRegist?";

    //POSTの受け取り
    var_dump($_POST);
    echo "<br />";
    echo "出力確認".$_POST['loginId'];


    //URL組み立て用
    $url = "";


    //共通部
    $url = $FINAL_URL_STRING."loginId=".$_POST['loginId']."&"
    						."loginPass=".$_POST['loginPass']."&"
    						."nickName=".$_POST['nickName']."&"
    						."feelcycleLoginId1=".$_POST['feelcycleLoginId1']."&"
    						."feelcycleLoginPass1=".$_POST['feelcycleLoginPass1']."&"
    						."feelcycleLoginId2=".$_POST['feelcycleLoginId2']."&"
    						."feelcycleLoginPass2=".$_POST['feelcycleLoginPass2']."&"
    						."remember=".$_POST['remember'];

    echo "<br />";
    echo "<br />";
    echo "URL出力確認：".$url;


    //curl初期化

    $conn = curl_init();

    curl_setopt($conn, CURLOPT_CONNECTTIMEOUT, 2);
	curl_setopt($conn, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($conn, CURLOPT_HEADER, true);
 
	curl_setopt($conn, CURLOPT_URL, $url);
	$response = curl_exec($conn);

    echo "<br />";
    echo "<br />";
	echo "レスポンス確認".$response;

	//curl
	//curl_close($conn);


?>

