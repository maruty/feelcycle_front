<?php
session_start();
//ini_set('display_errors',1);
//phpinfo();
//クッキー処理


?>



<?php if ($_SESSION["loginStatus"] === "true"): ?>
<!DOCTYPE html>
<html lang="ja">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Feel Analytics マイページ</title>


    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


    <!-- Bootstrap Core CSS -->
    <link href="./bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="./dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="./bower_components/morrisjs/morris.css" rel="stylesheet">

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

<?php
/*
if(isset($_COOKIE["loginStatus"]) && $_COOKIE["loginStatus"] != ""
    && isset($_COOKIE["loginId"]) && $_COOKIE["loginId"] != ""
    && isset($_COOKIE["loginPass"]) && $_COOKIE["loginPass"] != ""){

    $_SESSION["loginStatus"] = $_COOKIE["loginStatus"];
    $_SESSION["loginId"] = $_COOKIE["loginId"];
    $_SESSION["loginPass"] = $_COOKIE["loginPass"];
}
*/

/////レッスン情報取得関係

$FINAL_URL_STRING = "http://133.242.235.62:8080/feelcyclebatch/apiRegist/";
$FINAL_GET_LESSION = "Lesson?";
$FINAL_GET_USERDATA = "UserData?";
$FINAL_GET_MONTHLY = "LessonMonthlyData?";
$FINAL_GET_SHUKEI = "shukeiData?";


$url = $FINAL_URL_STRING.$FINAL_GET_LESSION."loginId=".$_SESSION['loginId']."&"."loginPass=".$_SESSION['loginPass'];

//echo "URL:".$url;

//curl初期化
$conn = curl_init();

curl_setopt($conn, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($conn, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($conn, CURLOPT_HEADER, false);

curl_setopt($conn, CURLOPT_URL, $url);
$response = curl_exec($conn);


$response = str_replace(array("\r\n", "\r", "\n"), '', $response );
$response = preg_replace('/(\s|　)/','',$response);
mb_language('Japanese');
//$response = mb_convert_encoding($response, "UTF-8", "EUC-JP")
$response = str_replace('&#034;', '"', $response);


//echo $response;

$lessonObject = json_decode( $response ,true);

//var_dump($lessonObject);


//lessonをレッスン名でソート

foreach ($lessonObject  as $key => $value){
  $key_id[$key] = $value['lessonDate'];
}
array_multisort ( $key_id , SORT_DESC , $lessonObject );

////////ニックネーム取得
//とりあえずイケてないベタ書き処理で実施
$url = "";
$url = $FINAL_URL_STRING.$FINAL_GET_USERDATA."loginId=".$_SESSION['loginId']."&"."loginPass=".$_SESSION['loginPass'];

//curl初期化
$conn = curl_init();

curl_setopt($conn, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($conn, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($conn, CURLOPT_HEADER, false);

curl_setopt($conn, CURLOPT_URL, $url);
$response = curl_exec($conn);


$response = str_replace(array("\r\n", "\r", "\n"), '', $response );
$response = preg_replace('/(\s|　)/','',$response);
mb_language('Japanese');
//$response = mb_convert_encoding($response, "UTF-8", "EUC-JP")
$responseUserData = str_replace('&#034;', '"', $response);

$userObject = json_decode( $responseUserData ,true);


////////マンスリーレッスンデータ
$url = "";
$url = $FINAL_URL_STRING.$FINAL_GET_MONTHLY."loginId=".$_SESSION['loginId'];

//echo $url;
//curl初期化
$conn = curl_init();

curl_setopt($conn, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($conn, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($conn, CURLOPT_HEADER, false);

curl_setopt($conn, CURLOPT_URL, $url);
$response = curl_exec($conn);

//echo $response;

$response = str_replace(array("\r\n", "\r", "\n"), '', $response );
$response = preg_replace('/(\s|　)/','',$response);
mb_language('Japanese');
//$response = mb_convert_encoding($response, "UTF-8", "EUC-JP")
$responseMonthlyData = str_replace('&#034;', '"', $response);
//monthlyCountが配列
$monthlyObject = json_decode( $responseMonthlyData ,true);

//var_dump($monthlyObject);

/////////集計関数系

$url = "";
$url = $FINAL_URL_STRING.$FINAL_GET_SHUKEI."loginId=".$_SESSION['loginId'];

echo $url;
//curl初期化
$conn = curl_init();

$response = "";

curl_setopt($conn, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($conn, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($conn, CURLOPT_HEADER, false);

curl_setopt($conn, CURLOPT_URL, $url);
$response = curl_exec($conn);

//echo $response;

$response = str_replace(array("\r\n", "\r", "\n"), '', $response );
$response = preg_replace('/(\s|　)/','',$response);
mb_language('Japanese');
//$response = mb_convert_encoding($response, "UTF-8", "EUC-JP")
$responseShukeiData = str_replace('&#034;', '"', $response);
//monthlyCountが配列
$shukeiObject = json_decode( $responseShukeiData ,true);

var_dump($shukeiObject);

?>




<?php //if ($_SESSION["loginStatus"] === "true"): ?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Feel Analytics</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!--
                <li class="dropdown">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>


                </li> -->
                <!-- /.dropdown -->
                <!--
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>

                </li>
                    -->
                <!-- /.dropdown -->
                <!--
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>

                </li>
                -->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>プロフィール確認</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>設定</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>ログアウト</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>コンテンツ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">何かのためのリンク</a>
                                </li>
                                <li>
                                     <a href="morris.html">過去データのインポート</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $userObject["userNickName"]; ?>さんのFeel Analytics</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <!--
                <div class="col-lg-3 col-md-6">

                    <div class="panel panel-primary">

                        <div class="panel-heading">

                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>

                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>New Comments!</div>
                                </div>

                            </div>

                        </div>

                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>

                </div>
                 -->

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo count($lessonObject); ?></div>
                                    <div>Total Lesson</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">詳細</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo count($monthlyObject); ?></div>
                                    <div>Monthly Lesson</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">詳細</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


            </div>

            <script type="text/javascript">
                $(function(){
                    // 実行したい処理
                    $(".summeryInstructor").click(function(){
                      //alert("ajax処理開始");

                    $.ajax({
                            url:  'http://133.242.235.62:8080/feelcyclebatch/apiRegist/monthlyLessonData',
                            type: 'GET',
                            data: {
                                loginId: '<?php echo $_SESSION['loginId']; ?>',
                                //loginPass: 'yutaka467',
                            },
                            dataType: 'text',
                            cache: false
                           // contentType: 'application/json'
                        })
                        .done(function( data ) {
                            //alert("通信成功");

                            //データをhtmlのエスケープで変換されているのでそれを元に戻す
                            data = data.replace(/&#034;/g,'"');
                            var jsonString = data.replace(/^\s+|\s+$/g, "");
                            var jsonString = jsonString.replace(/\r?\n/g,"");
                            var jsonString = jsonString.replace(/\\'/g, "'");

                            //json型に変換する
                            var json_obj = JSON.parse(jsonString);
                            //alert(json_obj.shukei[0].shukeiValue);
                            //実際のappend処理

                            $(".lessonName").text("レッスン月");
                            $(".zyukobi").text("回数");
                            $(".IRName").remove();
                            $(".kaizyo").remove();
                            $(".lessonData").remove();
                            $('.summeryInstructor').css('pointer-events', 'none');
                            $('.summeryInstructor').css('font-color', 'gray');

                            for (var i = 0; i < json_obj.shukei.length; i++) {
                                    //$(".lessonName").prepend("<tr>");
                                    $(".rowDisplayedData").append("<tr><td class='lessonName'>" + json_obj.shukei[i].shukeiName + "</td><td class='zyukobi'>"
                                                                                                + json_obj.shukei[i].shukeiValue+ "回</td></tr>");
                                    //$(".zyukobi").append("</tr>");

                            }





                        })
                        .fail(function( data ) {
                            //alert("通信失敗");
                                // ...
                        })
                        .always(function( data ) {
                                // ...
                            //alert("通信いつもの");
                            //alert(data);

                        });

                    });
                    //Ajax後の処理？


                });
            </script>



            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> 過去レッスンの受講履歴
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        表示変更
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a class="summeryInstructor" href="#">月ごとのレッスン回数</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="lessonName">Lesson名</th>
                                                    <th class="zyukobi">受講日</th>
                                                    <th class="IRName">IR</th>
                                                    <th class="kaizyo">会場</th>
                                                </tr>
                                            </thead>
                                            <tbody class="rowDisplayedData">

                                              <?php
                                                    $count = 0;
                                                    foreach ($lessonObject as $id => $rec) {
                                                      //echo $id . PHP_EOL;
                                                        //if($count <= 40){
                                                          echo "<tr class='lessonData'>";
                                                          echo "<td class='lessonNameData'>" . $rec['lessonName'] . "</td>";
                                                          echo "<td class='lessonDateData'>" . $rec['lessonDate'] . "</td>";
                                                          echo "<td class='instructorData'>" . $rec['instructor'] . "</td>";
                                                          echo "<td class='lessonTenpoData'>" . $rec['lessonTenpo'] . "</td>";
                                                          echo " </tr>";
                                                        //}
                                                        //$count++;
                                                    }
                                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-8">
                                    <div id="morris-bar-chart"></div>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i> 各種データ
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-badge"><i class="fa fa-check"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">一番受講しているレッスン</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 更新日:<?php echo date('Y年m月d日'); ?>現在</small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">


                                            <p>

                                              <?php

                                              foreach ($shukeiObject as $key1 => $value1) {
                                                print $key1;
                                                foreach ($value1 as $key2 => $value2) {
                                                    print "key2" . $key2;
                                                    print $value2 . ", "; //「.」は文字列連結
                                                }
                                              }

                                                    /*
                                                    foreach ($shukeiObject as $id => $rec) {
                                                        if($rec['shukeiName'] === "MaxLessoname"){
                                                            echo $rec['shukeiValue'];
                                                        }
                                                    }
                                                    */
                                                ?>



                                            </p>
                                        </div>
                                    </div>
                                </li>

                                <li class="timeline-inverted">
                                    <div class="timeline-badge success"><i class="fa fa-check"></i>
                                    </div>
                                    <div class="timeline-panel">
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">一番受講しているインストラクター</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 更新日:<?php echo date('Y年m月d日'); ?>現在</small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">


                                            <p>
                                              <?php
                                                    foreach ($shukeiObject as $id => $rec) {
                                                        if($rec['shukeiName'] === "MaxInstroctor"){
                                                            echo $rec['shukeiValue'];
                                                        }
                                                    }
                                                ?>
                                            </p>
                                        </div>
                                    </div>

                                <li>
                                    <div class="timeline-badge"><i class="fa fa-check"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">項目募集中！</h4>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> 更新日:<?php echo date('Y年m月d日'); ?> 現在</small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <p>2015年12月</p>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
           </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="./bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="./bower_components/raphael/raphael-min.js"></script>
    <script src="./bower_components/morrisjs/morris.min.js"></script>
    <script src="./js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>

        <script>
        /*
        $(window).load(function () {
            //$("#test").html("Hello World!")
            alert("テスト");
            var obj = $.parseJSON('<?php echo $response; ?>');
            alert(obj);
        });
*/
    </script>





</body>

</html>

<?php else : ?>
    <p>直アクセスはダメよ</p>

<?php endif; ?>
