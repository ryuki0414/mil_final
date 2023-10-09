<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続
//rocal_ver

// function db_conn()
// {
//   try {
//     $db_name = "gs_dbx";    //データベース名
//     $db_id   = "root";      //アカウント名
//     $db_pw   = "";      //パスワード：XAMPPはパスワード無しに修正してください。
//     $db_host = "localhost"; //DBホスト
//     return new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
//   } catch (PDOException $e) {
//     exit('DB Connection Error:' . $e->getMessage());
//   }
// }

//deploy_ver

try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=ryuki0414_gs_db_kadai;charset=utf8;host=mysql57.ryuki0414.sakura.ne.jp', 'ryuki0414', 'ryuki0414_');
  // $pdo = new PDO('mysql:dbname=gs_db_kadai;charset=utf8;host=localhost','root','');
  //ローカルに存在するファイルをディプロイに行わないと、データベースのみデプロイしても作動しない。


} catch (PDOException $e) {
  exit('DB Connection Error:' . $e->getMessage());
}


//SQLエラー
function sql_error($stmt)
{
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:" . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
  header("Location: " . $file_name);
  exit();
}

//SessionCheck(スケルトン)
function sschk()
{
  if (!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()) {
    exit("Login Error");
  } else {
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
  }
}
