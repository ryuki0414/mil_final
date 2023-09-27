<?php
//1. POSTデータ取得
$name   = $_POST["name"];
$birth  = $_POST["birth"];
$hometown = $_POST["hometown"];
$job    = $_POST["job"]; //追加されています

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_final_table(name,birth,hometown,job,indate)VALUES(:name,:birth,:hometown,:job,sysdate())");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':birth', $birth, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':hometown', $hometown, PDO::PARAM_STR);        //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':job', $job, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//３．データ登録SQL作成
// $stmt = $pdo->prepare("INSERT INTO gs_an_table(name,email,age,naiyou,indate)VALUES(:name,:email,:age,:naiyou,sysdate())");
// $stmt->bindValue(':name', $name, PDO::PARAM_STR);      
// $stmt->bindValue(':email', $email, PDO::PARAM_STR);    
// $stmt->bindValue(':age', $age, PDO::PARAM_INT);       
// $stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  
// $status = $stmt->execute(); 


//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("index.php");
}
//正常にpost作動後はindexに戻る
?>
