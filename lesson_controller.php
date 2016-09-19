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

    echo $json;

    $filepath = "../json/lesson.json"; // ファイルへのパスを変数に格納
    
    $fp = fopen($filepath, "w"); // 新規書き込みモードで開く

    if ($fp){
        if (flock($fp, LOCK_EX)){
            if (fwrite( $fp, $json, strlen($json)  === FALSE){
                print('ファイル書き込みに失敗しました');
            }else{
                print($json.'をファイルに書き込みました');
            }

            flock($fp, LOCK_UN);
        }else{
            print('ファイルロックに失敗しました');
    }

    fclose($fp);
    //ファイルへの書き込みは終了

    var_dump($array);

    echo "レッスン情報はサーバーに送信されました";

?>

