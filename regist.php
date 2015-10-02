<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Feel Analytics">
    <meta name="author" content="Feel Analytics@tiritiri">

    <title>Feel Analytics</title>

    <!-- Bootstrap Core CSS -->
    <link href="./bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--バリデーション用 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> <!-- or use local jquery -->
    <script src="./js/jqBootstrapValidation.js"></script>

    <script>
     $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
    </script>

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
                        <h3 class="panel-title">Feel Analytics会員登録</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="./regist_controller.php" >
                            <fieldset>
                                <p>Feel Analytics用のログイン情報登録</p>

                                <div class="form-group">
                                    <input class="form-control" placeholder="Feel Analytics ログイン用ID(E-mail)※必須" name="loginId" type="email"  required autofocus>
                                     <p class="help-block"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Feel Analytics ログイン用Password" name="loginPass" type="password" value="" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Feel Analytics ニックネーム" name="nickName" type="text" value="" required>
                                </div>
                                <hr/>
                                <p>Feelcycleのログイン情報登録</p>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Feelcycle ログイン用ID(E-mail)" name="feelcycleLoginId1" type="email" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Feelcycleログイン用Password" name="feelcycleLoginPass1" type="password" value="" required>
                                </div>
                                <hr/>
                                 <p>（ダブル会員の方はこちらも入力）</p>
                                 <p>Feelcycleのログイン情報登録</p>
                                 <div class="form-group">
                                    <input class="form-control" placeholder="Feelcycle ログイン用ID(E-mail)" name="feelcycleLoginId2" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Feelcycleログイン用Password" name="feelcycleLoginPass2" type="password" value="">
                                </div>
                                <hr/>
                                <div class="form-group">
                                <p>本サイトは一般的なセキュリティー対策はしていますが、個人サービスの為不正利用などに対しての情報流出などの問題に対しては責任を負いかねます。すべて自己責任のもと、ご利用下さい</p>
                                <p>個人サービスの為、データ破損やトラブルがあった場合にも責任を負いかねます</p>
                                <p>現在β版となるため、突然記録が消えたりする可能性があります。あくまでもマスターデータは別にとっておくことをおすすめします</p>  
                                </div>
                                <hr/>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="ok" required>注意事項を理解し登録します
                                    </label>
                                </div>

                                <!-- Change this to a button or input when using this as a form -->
                                <!--<a href="index.html" class="btn btn-lg btn-success btn-block">会員登録</a>-->
                                <input type="submit" value="会員登録" class="btn btn-lg btn-success btn-block">
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
