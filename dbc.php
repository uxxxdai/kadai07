<?php
header('Expires: Tue, 1 Jan 2019 00:00:00 GMT');
header('Last-Modified:'. gmdate( 'D, d M Y H:i:s' ). 'GMT');
header('Cache-Control:no-cache,no-store,must-revalidate,max-age=0');
header('Cache-Control:pre-check=0,post-check=0',false);
header('Pragma:no-cache');
?>

<?php

function dbc(){
    $host = "localhost";
    $dbname = "otoshimono_db";
    $user = "root";
    $pass = "root";

    $dns="mysql:host=$host;dbname=$dbname;charset=utf8";

    try{
        $pdo = new PDO($dns, $user, $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $pdo;
    } catch(PDOException $e){
        exit($e->getMessage());
    }
}

//ファイルデータをDBに保存する
function fileSave($filename, $save_path, $hinmei, $color, $size, $brands, $caption, $latitude, $longitude){
    $result = False;

    $sql = "INSERT INTO otoshimono_table(file_name, file_path, hinmei, color, size, brand, description, latitude, longitude) VALUE(?,?,?,?,?,?,?,?,?)";
    try{
        $stmt = dbc()->prepare($sql);
        $stmt->bindValue(1, $filename);
        $stmt->bindValue(2, $save_path);
        $stmt->bindValue(3, $hinmei);
        $stmt->bindValue(4, $color);
        $stmt->bindValue(5, $size);
        $stmt->bindValue(6, $brands);
        $stmt->bindValue(7, $caption);
        $stmt->bindValue(8, $latitude);
        $stmt->bindValue(9, $longitude);
        $result = $stmt->execute();
        return $result;
    } catch(\Exception $e){
        echo $e->getMessage();
        return $result;
    }
}

//ファイルデータを取得する
function getAllFile(){
    $sql = "SELECT * FROM otoshimono_table ORDER BY id DESC";

    $fileData = dbc()->query($sql);

    return $fileData;
}

function h($s) {
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
    }