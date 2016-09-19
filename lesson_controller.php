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
    $json = json_encode( $array , JSON_PRETTY_PRINT ) ;

    $filepath = "../json/lesson.json"; // ファイルへのパスを変数に格納
    
    $fp = fopen($filepath, "w"); // 新規書き込みモードで開く
    @fwrite( $fp, $json, strlen($json) ); // ファイルへの書き込み
    fclose($fp);
    //ファイルへの書き込みは終了

    var_dump($array);

    echo "レッスン情報はサーバーに送信されました";

?>

