<?php
    //レッスンマスター情報を取得
    $json = file_get_contents('/var/www/html/json/lesson_master.json');
    if ($json === false) {
        throw new \RuntimeException('file not found.');
    }
    $dataLessonMaster = json_decode($json, true);

    var_dump($dataLessonMaster);




?>


<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Feel 俺俺取得</title>

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
                        <h3 class="panel-title">Feel 俺俺取得</h3>
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
                                <div class="form-group">
                                <?php
                                /*
                                    foreach ($array as $value) { //3回繰り返し
                                      echo $value['ID'];    // 7 → 6 → 5
                                      echo $value['title']; // 多次元配列の扱い →（略）
                                    }
                                    連想配列の連想配列から値を取得したい場合はforeach文のネスト。
                                    foreach ($array as $key1 => $value1) {
                                      foreach ($value1 as $key2 => $value2) {
                                        print $value2 . ", "; //「.」は文字列連結
                                      }
                                

                                */
                                    $count = 0;
                                    foreach ($dataLessonMaster as $key1 => $value1) {
                                        var_dump($value1);
                                        echo "==========================";
                                        if($count === 0){
                                            echo "<select name='example1'>";

                                        }
                                        if($count === 1){
                                            echo "<select name='example2'>";
                                        }

                                        if($count === 2){
                                            echo "<select name='example3'>";
                                        }


                                        foreach ($value1 as $key2 => $value2) {
                                            echo "<option value='" . $value2 ."'>" . $key2 . "</option>";
                                        }

                                        echo "</select>";
                                        $count++;

                                    }

                                ?>



                                    <select name="example">
                                        <option value="選択肢1">選択肢1</option>
                                        <option value="選択肢2">選択肢2</option>
                                        <option value="選択肢3">選択肢3</option>
                                    </select>
                                    <input class="form-control" placeholder="Password" name="loginPass" type="password" value="">
                                </div>

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
