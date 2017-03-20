<?php

    //連想配列でjob用の情報を作成する
    // 連想配列($array)


    //fcの場合
    if($_POST["gym"] =="1"){
      $array = array(
          "gym" => $_POST["gym"],
          "userId" => $_POST["loginId"],
          "userPass" => $_POST["loginPass"],
          "lessonName" => $_POST["lesson"] ,
          "lessonDate" => $_POST["date"] ,
          "lessonTime" => $_POST["time"] ,
          "lessonState" => $_POST["tenpo"]
      );
    }

    //b-monsterの場合
    if($_POST["gym"] =="2"){
      $array = array(
          "gym" => $_POST["gym"],
          "userId" => $_POST["loginId"],
          "userPass" => $_POST["loginPass"],
          "lessonName" => "none" ,
          "lessonDate" => $_POST["date"] ,
          "lessonTime" => $_POST["b_time"] ,
          "lessonState" => $_POST["b_tenpo"]
      );
    }





    // 連想配列($array)をJSONに変換(エンコード)する
    $json = json_encode( $array);

    echo $json;


    if(!$FP = fopen("../json/lesson.json","w"))
        echo "error";


    else{
        fwrite($FP,$json);
        fclose($FP);
    }


    //ファイルへの書き込みは終了

    //var_dump($array);

    echo "レッスン情報はサーバーに送信されました";

    //jenkinsのjobを起動する
    $url = "http://133.242.235.62:8008/job/feelcycle_get_selenium/build?token=8ea577e85d1a155c9d038cae3ebf50c1";
    $curl = curl_init($url); // 初期化！
    $result = curl_exec($curl); // リクエスト実行
    echo $result;


?>
