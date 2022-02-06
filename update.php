<?php
// 1. POSTデータ取得
$weight = $_POST['weight'];
$fat = $_POST['fat'];
$id =$_POST['id'];

// 2. DB接続します
require_once('funcs.php');
$pdo =db_conn();//$pdo=関数名();とする

//３．データ更新SQL作成（UPDATE テーブル名 SET 更新対象1=:更新データ ,更新対象2=:更新データ2,... WHERE id = 対象ID;）


 $stmt = $pdo->prepare(
    "UPDATE kadai07_table SET 
    weight=:weight, fat=:fat, indate=sysdate() 
    WHERE id=:id"
  );

  // 4. バインド変数を用意
  $stmt->bindValue(':weight', $weight, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':fat', $fat, PDO::PARAM_INT);  //Integer（文字の場合 PDO::PARAM_STR)
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

   // 5. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  //以下を関数化
  sql_error($stmt);
}else{
  //５．index.phpへリダイレクト
  //以下を関数化
  redirect('select.php');
}