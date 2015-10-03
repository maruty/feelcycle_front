<?php

    $FINAL_URL_STRING = "http://52.69.227.6/feelcyclebatch/apiRegist/checkUser/?";
    //URL組み立て用
    $url = "";

    $url = $FINAL_URL_STRING."loginId=".$_POST['loginId']."&"."loginPass=".$_POST['loginPass'];

    //curl初期化
    $conn = curl_init();

    curl_setopt($conn, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($conn, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($conn, CURLOPT_HEADER, true);
 
    curl_setopt($conn, CURLOPT_URL, $url);
    $response = curl_exec($conn);

    echo $response;


    //ログイン情報の会員が存在するかの確認






?>

