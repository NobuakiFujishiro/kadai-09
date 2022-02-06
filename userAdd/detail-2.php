<?php
session_start();
//selsect.phpから処理を持ってくる
//1.外部ファイル読み込みしてDB接続(funcs.phpを呼び出して)
require_once('funcs-2.php');
$pdo =db_conn();//$pdo=関数名();とする

//2.対象のIDを取得
$id = $_GET['id'];

//3．データ取得SQLを作成（SELECT文）
$stmt =$pdo->prepare('SELECT * FROM kadai09_user_table WHERE id=:id');
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ表示
$view = '';

if($status == false){
    sql_error($stmt);
}else{
    $result =$stmt->fetch();
}

?>

<!-- 以下はindex.phpのHTMLをまるっと持ってくる -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Body Building Tips</title>
  <link rel="stylesheet" href="../sample.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
<h1>Body Building Tips</h1>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<h3 class="title">ユーザー情報を入力して下さい。</h3>
<form method="post" action="update-2.php">
  <div class="jumbotron">
   <fieldset class="field">
    <legend>データ入力</legend>
     <!-- <label>名前：<input type="text" name="name"></label><br>  -->
     <!-- <label>Email：<input type="text" name="email"></label><br>  -->
     <table >
       <tr>
      <td><label class="col1">名前</td><td>：<input  class="col2" type="text" name="name" ></label><br></td>
      </tr>
      <tr>
      <td><label  class="col1">ID</td><td>：<input class="col2" type="text" name="lid" ></label><br></td>
      </tr>  
      <tr>
      <td><label  class="col1">PW</td><td>：<input class="col2" type="text" name="lpw" ></label><br></td>
      </tr>  
    </table>
    <input type="hidden" name="id" value="<?= $result['id'] ?>">
     <input class="sendButton" type="submit" value="送信">
    </fieldset>
  </div>
</form>

<nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select-2.php">データ一覧</a></div>
    </div>
  </nav>
<!-- Main[End] -->


</body>
</html>
