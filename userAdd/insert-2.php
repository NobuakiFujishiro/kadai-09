<?php
// 1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
// $name = $_POST['name'];
// $email = $_POST['email'];
$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

$pw = password_hash($lpw, PASSWORD_DEFAULT);

// 2. DB接続します
require_once('funcs-2.php');
$pdo =db_conn();//$pdo=関数名();とする


// ３．SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(

  
  "INSERT INTO kadai09_user_table (id,name,lid,lpw,indate)
  VALUES( NULL, :name, :lid, :pw, sysdate())"
);
// $name, $eamilを仮想変数:name, :naiyouに変える

// 4. バインド変数を用意
// $stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':pw', $pw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// 5. 実行
$status = $stmt->execute();

//6．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  //以下を関数化
  sql_error($stmt);
}else{
  //５．index.phpへリダイレクト
  //以下を関数化
  redirect('index-2.php');
}
?>
