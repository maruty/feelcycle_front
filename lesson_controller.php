<?php

    //連想配列でjob用の情報を作成する
    // 連想配列($array)
    $array = array(
        "userId" => $_POST["loginId"],
        "userPass" => $_POST["loginPass"],
        "lessonName" => $_POST["lesson"] ,
        "lessonDate" => $_POST["date"] ,
        "lessonTime" => $_POST["time"] ,
        "lessonState" => $_POST["tenpo"] 
    );

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
    $url = "http://133.242.235.62:8008/job/feelcycleFront/build?token=8ea577e85d1a155c9d038cae3ebf50c1";
    $curl = curl_init($url); // 初期化！
    $result = curl_exec($curl); // リクエスト実行
    echo $result;


?>

