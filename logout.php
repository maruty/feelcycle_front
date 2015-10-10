<?php

session_start();
echo "ここ";
//if(isset($_SESSION['loginStatus'])&& isset($_SESSION['loginId']) && isset($_SESSION['loginPass']))

// セッション変数を解除
$_SESSION = array();

// セッションcookieを削除

if (isset($_COOKIE['loginStatus']) || isset($_COOKIE['loginId'] || isset($_COOKIE['loginPass'] )) {

    setcookie("loginStatus", '', time()-420000);
    //setcookie("loginId", '', time()-420000);
    //setcookie("loginPass", '', time()-420000);
}

// セッションを破棄

session_destroy();


header("Location: ./");

?>