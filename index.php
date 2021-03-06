<?php session_start();

//クッキー処理


if(isset($_COOKIE["loginStatus"]) && $_COOKIE["loginStatus"] != "" 
    && isset($_COOKIE["loginId"]) && $_COOKIE["loginId"] != ""
    && isset($_COOKIE["loginPass"]) && $_COOKIE["loginPass"] != ""){
     
    $_SESSION["loginStatus"] = $_COOKIE["loginStatus"];
    $_SESSION["loginId"] = $_COOKIE["loginId"];
    $_SESSION["loginPass"] = $_COOKIE["loginPass"];
}

if( isset( $_SESSION["loginStatus"]) &&  $_SESSION["loginStatus"] != null
 && isset( $_SESSION["loginId"]) &&  $_SESSION["loginId"] != null
 && isset( $_SESSION["loginPass"]) &&  $_SESSION["loginPass"] != null ){
    header("Location: ./mypage.php");
}else{
    session_destroy();//セッション破棄
    //header("Location:./");
}

 

?>

<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Feel Analytics</title>

    <!-- Bootstrap Core CSS -->
    <link href="./bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Feel Analytics ログインページ</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="./mypage_controller.php" >
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="loginId" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="loginPass" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">ログイン情報を保存する
                                    </label>
                                </div>
                                <p><a href="http://line.me/R/msg/text/?http://marubloc.com">Lineで送るテスト※使わないで下さい</a></p>
                                <!-- Change this to a button or input when using this as a form -->
                                 <input type="submit" value="ログイン" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="./bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>

</body>

</html>
