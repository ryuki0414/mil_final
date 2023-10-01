<?php
//1. POSTデータ取得
$name   = $_POST["name"];
$birth  = $_POST["birth"];
$hometown = $_POST["hometown"];
$job    = $_POST["job"];
$id     = $_POST["id"];

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データアップデートSQL作成
$stmt = $pdo->prepare("UPDATE gs_final_table SET name=:name, birth=:birth, hometown=:hometown, job=:job WHERE id=:id");
$stmt->bindValue(':name',   $name,   PDO::PARAM_STR);
$stmt->bindValue(':birth',  $birth,  PDO::PARAM_STR);
$stmt->bindValue(':hometown',    $hometown,    PDO::PARAM_STR);
$stmt->bindValue(':job', $job, PDO::PARAM_STR);
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データアップデート処理後
if ($status == false) {
  sql_error($stmt);
} else {
  redirect("select.php");
}
?>


// $stmt = $pdo->prepare("UPDATE gs_an_table SET name=:name,email=:email,age=:age,naiyou=:naiyou WHERE id=:id");
// $stmt = $pdo->prepare("INSERT INTO gs_final_table(name,birth,hometown,job,indate) VALUES(:name,:birth,:hometown,:job,NOW())");