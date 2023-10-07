<?php
// 1. POSTデータ取得
$name     = $_POST["name"];
$birth    = $_POST["birth"];
$hometown = $_POST["hometown"];
$job      = $_POST["job"];

// 2. ファイルアップロード処理
$image = $_FILES["image"];

if ($image["error"] === UPLOAD_ERR_OK) {
    // ファイルが正常にアップロードされた場合の処理
    $image_name = $image["name"];
    $image_tmp_name = $image["tmp_name"];

    // ファイルを保存するディレクトリを指定
    $upload_directory = "uploads/"; // 適切なディレクトリに変更してください
    $image_path = $upload_directory . $image_name;

    // ファイルを指定されたディレクトリに移動
    if (move_uploaded_file($image_tmp_name, $image_path)) {
        // ファイルのアップロードが成功した場合の処理
    } else {
        // ファイルのアップロードに失敗した場合の処理
    }
} else {
    // ファイルが正常にアップロードされなかった場合の処理
}

// 3. DB接続
include("funcs.php");
$pdo = db_conn();

// 4. データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_final_table(name, birth, hometown, job, image_path, indate) VALUES (:name, :birth, :hometown, :job, :image_path, sysdate())");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':birth', $birth, PDO::PARAM_STR);
$stmt->bindValue(':hometown', $hometown, PDO::PARAM_STR);
$stmt->bindValue(':job', $job, PDO::PARAM_STR);
$stmt->bindValue(':image_path', $image_path, PDO::PARAM_STR); // 画像のファイルパスを保存

// 5. 実行
$status = $stmt->execute();

// 6. データ登録処理後のリダイレクト
if ($status == false) {
    sql_error($stmt);
} else {
    redirect("index.php");
}
