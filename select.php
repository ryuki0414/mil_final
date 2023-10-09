<?php
//0. SESSION開始！！
session_start();

//１．関数群の読み込み
include("funcs.php");

//LOGINチェック → funcs.phpへ関数化しましょう！
// if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
//    exit("Login Error");
// }else{
//    session_regenerate_id(true);
//    $_SESSION["chk_ssid"] = session_id();
// }
// sschk();
//ログイン関連はMVPとして搭載していない。

//２．データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare("SELECT * FROM gs_final_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
  sql_error($stmt);
} else {
  while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $view .= '<p>';
    $view .= '<a href="detail.php?id=' . $r["id"] . '">';
    $view .= $r["id"] . "|" . $r["name"] . "<br>" . $r["birth"] . "|" . $r["hometown"] . "|" . $r["job"];
    $view .= '</a>';
    $view .= "　";
    $view .= '<a class="btn btn-danger" href="delete.php?id=' . $r["id"] . '">';
    //削除機能を付与
    $view .= '[<i class="glyphicon glyphicon-remove"></i>削除]';
    $view .= '</a>';
    $view .= '</p>';
  }
}

?>
<!-- php記述の終わり -->

<!-- html記述の開始 -->
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>登録データ一覧</title>
  <link rel="stylesheet" href="css/range.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- CSS記述の開始 -->
  <style>
    div {
      padding: 10px;
      font-size: 16px;
    }

    .family-tree {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .person {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .person img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin-right: 10px;
    }
  </style>
  <!-- CSS記述の終了 -->
</head>

<body id="main">

  <!-- Head[Start] -->
  <header>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">データ登録</a>
          <!-- <a class="navbar-brand" href="login.php">ログイン</a> -->
          <!-- <a class="navbar-brand" href="logout.php">ログアウト</a> -->
        </div>
      </div>
    </nav>
  </header>
  <!-- Head[End] -->

  <!-- Main[Start] -->
  <div>
    <div class="container jumbotron"><?= $view ?></div>

  </div>
  <!-- Main[End] -->

</body>

</html>