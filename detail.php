<?php
//0. SESSION開始！！
session_start();

$id = $_GET["id"]; //?id~**を受け取る
include("funcs.php");
// sschk();
//データログイン管理をしない
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_final_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if ($status == false) {
  sql_error($stmt);
} else {
  $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    div {
      padding: 10px;
      font-size: 16px;
    }
  </style>
</head>

<body>

  <!-- Head[Start] -->
  <header>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
      </div>
    </nav>
  </header>
  <!-- Head[End] -->

  <!-- Main[Start] -->
  <form method="POST" action="update.php">
    <div class="jumbotron">
      <fieldset>
        <legend>[編集]</legend>
        <label>名前：<input type="text" name="name" value="<?= $row["name"] ?>"></label><br>
        <label>生年月日：<input type="date" name="birth" value="<?= $row["birth"] ?>"></label><br>
        <label>出身地：<input type="text" name="hometown" value="<?= $row["hometown"] ?>"></label><br>
        <label>職業：<input type="text" name="job" value="<?= $row["job"] ?>"></label><br>
        <input type="submit" value="送信">
        <input type="hidden" name="id" value="<?= $id ?>">
      </fieldset>
    </div>
  </form>
  <!-- Main[End] -->


</body>

</html>