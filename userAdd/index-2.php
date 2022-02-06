<?php

session_start();

//関数を呼び出す
require_once('../funcs.php');

//ログインチェック
loginCheck();
?>

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
<form method="post" action="insert-2.php">
  <div class="jumbotron">
   <fieldset class="field">
    <legend>データ入力</legend>
     <!-- <label>名前：<input type="text" name="name"></label><br>  -->
     <!-- <label>Email：<input type="text" name="email"></label><br>  -->
     <table>
       <tr>
      <td><label class="col1">名前</td><td>：<input  class="col2" type="text" name="name"></label><br></td>
      </tr>
      <tr>
      <td><label  class="col1">ID</td><td>：<input class="col2" type="text" name="lid"></label><br></td>
      </tr>  
      <tr>
      <td><label  class="col1">PW</td><td>：<input class="col2" type="text" name="lpw"></label><br></td>
      </tr>  
    </table>
     <input class="sendButton" type="submit" value="送信">
    </fieldset>
  </div>
</form>

<nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select-2.php">ユーザー一覧</a></div>
    <div class="navbar-header">
      <a class="navbar-brand" href="../index.php">トップページへ戻る</a>
      </div>
  </div>
 
  </nav>
<!-- Main[End] -->


</body>
</html>

