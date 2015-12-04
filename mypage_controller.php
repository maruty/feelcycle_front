<?php
    //セッション開始
    session_start();
    //var_dump($_POST);
    //クッキーチェックが付いてた場合はここで保存してあげる

    if( $_POST['remember'] === "Remember Me"){
        //echo "ここきた";
        
        setcookie("loginStatus", $_POST["loginStatus"], time()+3600*24*14);
        setcookie("loginId", $_POST["loginStatus"], time()+3600*24*14);
        setcookie("loginPass", $_POST["loginStatus"], time()+3600*24*14);
        //echo "クッキー:" . $_COOKIE["loginStatus"];
    }


    $FINAL_URL_STRING = "http://52.193.59.127/feelcyclebatch/apiRegist/checkUser?";
    //URL組み立て用
    $url = "";

    $url = $FINAL_URL_STRING."loginId=".$_POST['loginId']."&"."loginPass=".$_POST['loginPass'];

    //echo $url;
    //curl初期化
    $conn = curl_init();

    curl_setopt($conn, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($conn, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($conn, CURLOPT_HEADER, false);
 
    curl_setopt($conn, CURLOPT_URL, $url);
    $response = curl_exec($conn);

    //echo $response;


    $_SESSION["loginStatus"] = "false";
    //ログイン情報の会員が存在するかの確認
    // $stringにABCが含まれているか
    if (strpos($response, "resultMessage:true") === FALSE)
    {
        // 文字列が無かった場合
        //$_SESSION["loginStatus"] = "false";

        //TOPに戻ろうか
        header("Location: ./index.php");
    }else{
        // 文字列があった場合
        $_SESSION["loginStatus"] = "true";
        $_SESSION["loginId"] = $_POST['loginId'];
        $_SESSION["loginPass"] = $_POST["loginPass"];

        //echo "セッション".$_SESSION["loginId"];
        header("Location: ./mypage.php");
    }
?>

