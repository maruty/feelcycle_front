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

    //jekins ログインの情報取得
    $jsonJenins = file_get_contents("../json/jenkins.json");
    $jsonJenins = mb_convert_encoding($jsonJenins, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $arrayJenkins = json_decode($jsonJenins,true);

    $jeninsId = $arrayJenkins["id"];
    $jeninsPass = $arrayJenkins["pass"];


    //ファイルへの書き込みは終了

    //var_dump($array);

    echo "レッスン情報はサーバーに送信されました";

    //jenkinsのjobを起動する
    $url = "http://133.242.226.123:8008/job/b-monster/build?token=maruty";
    $curl = curl_init($url); // 初期化！
    curl_setopt($curl , CURLOPT_USERPWD, $jeninsId  . ":" . $jeninsPass);
    $result = curl_exec($curl); // リクエスト実行
    echo $result;


?>
