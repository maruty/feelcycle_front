<?php

session_start();

//if(isset($_SESSION['loginStatus'])&& isset($_SESSION['loginId']) && isset($_SESSION['loginPass']))

// セッション変数を解除
$_SESSION = array();

// セッションcookieを削除
if (isset($_COOKIE['loginStatus']) || isset($_COOKIE['loginId'] || isset($_COOKIE['loginPass'] )) {

    setcookie("loginStatus", '', time()-42000, '/');
    setcookie("loginId", '', time()-42000, '/');
    setcookie("loginPass", '', time()-42000, '/');
}

// セッションを破棄
session_destroy();

header("Location: ./index.php");

?>