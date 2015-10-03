<?php

    $FINAL_URL_STRING = "http://52.69.227.6/feelcyclebatch/apiRegist/checkUser?";
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

    //セッション開始
    session_start();
    //ログイン情報の会員が存在するかの確認
    // $stringにABCが含まれているか
    if (strpos($response, "resultMessage:true") === FALSE)
    {
        // 文字列が無かった場合
        $_SESSION["loginStatus"] = "false";
        header("Location: ./index.html");
    }
    else
    {
        // 文字列があった場合
        $_SESSION["loginStatus"] = "true";

        echo $_SESSION["loginStatus"];
    
    }


    






?>

