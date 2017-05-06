<?php
    //レッスンマスター情報を取得
    $json = file_get_contents('/var/www/html/json/lesson_master.json');
    if ($json === false) {
        throw new \RuntimeException('file not found.');
    }
    $dataLessonMaster = json_decode($json, true);

    //var_dump($dataLessonMaster);




?>


<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Feel Cycleとb-monsterの俺俺取得</title>

    <!-- Bootstrap Core CSS -->
    <link href="./bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://unpkg.com/flatpickr/dist/flatpickr.min.css">
    <script src="https://unpkg.com/flatpickr"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>

    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css" >

    <script>
  $(function() {
    $("#datepicker").datepicker();
  });
</script>

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
                        <form role="form" method="post" action="./lesson_controller.php" >
                            <fieldset>


                                <div class="form-group">
                                  <input type="radio" name="gym" value="1" checked="checked">feelcycle
                                  <input type="radio" name="gym" value="2">b-monster
                                </div>


                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="loginId" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="loginPass" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="datepicker" placeholder="b-monは3月21日・(火)的な・FCは9/19(月)かっこは半角" name="date" type="text" value="">
                                </div>
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
                                        //var_dump($value1);
                                        //echo "==========================";
                                        echo "<div class='form-group'>";
                                        if($count === 0){
                                            echo "<select name='lesson' class='form-control'>";

                                        }
                                        if($count === 1){
                                            echo "<select name='tenpo' class='form-control'>";
                                        }

                                        if($count === 2){
                                            echo "<select name='time' class='form-control'>";
                                        }


                                        foreach ($value1 as $key2 => $value2) {
                                            echo "<option value='" . $key2 ."'>" . $key2 . "</option>";
                                        }

                                        echo "</select>";
                                        echo "</div>";
                                        $count++;

                                    }

                                ?>
                                <div class="form-group">
                                  <select name='b_tenpo' class='form-control'>
                                    <option value='GINZA'>GINZA</option>
                                    <option value='AOYAMA'>AOYAMA</option>
                                    <option value='EBISU'>EBISU</option>
                                    <option value='SHINJUKU'>SHINJUKU</option>
                                  </select>
                                </div>


                                <!-- b-monster用の設定-->
                                <div class="form-group">
                                  <select name='b_time' class='form-control'>
                                    <option value='07:00'>07:00</option>
                                    <option value='08:05'>08:05</option>
                                    <option value='09:20'>09:20</option>
                                    <option value='10:35'>10:35</option>
                                    <option value='11:50'>11:50</option>
                                    <option value='13:05'>13:05</option>
                                    <option value='14:20'>14:20</option>
                                    <option value='15:35'>15:35</option>
                                    <option value='16:50'>16:50</option>
                                    <option value='18:05'>18:05</option>
                                    <option value='19:20'>19:20</option>
                                    <option value='20:35'>21:30</option>
                                    <option value='21:50'>21:50</option>
                                  </select>
                                </div>




                                 <input type="submit" value="レッスンを取得する" class="btn btn-lg btn-success btn-block">

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

    <!-- bmonster改修-->

    <script>
      $(function() {


        jQuery(document).ready(function() {
          $('[name="b_tenpo"]').hide();
          $('[name="b_time"]').hide();
        });

        //ラジオボタンをチェックしたら発動
        $('input[type="radio"]').change(function() {

          //選択したvalue値を変数に格納
          var val = $(this).val();

          if(val == 1 ){
            //
            $('[name="lesson"]').show();
            $('[name="time"]').show();
            $('[name="tenpo"]').show();
            $('[name="b_tenpo"]').hide();
            $('[name="b_time"]').hide();

          }
          if(val == 2) {
            //2の場合はb-monster なのでプログラムをhide 店舗をhideしてb-monster用の表示に 時間もb-monster用の表示にする
            $('[name="lesson"]').hide();
            $('[name="time"]').hide();
            $('[name="tenpo"]').hide();
            $('[name="b_tenpo"]').show();
            $('[name="b_time"]').show();

          }

          //選択したvalue値をp要素に出力
          ///$('p').text(val);
        });
      });
    </script>


</body>

</html>
