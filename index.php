<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Body Building Tips</title>
  <link rel="stylesheet" href="sample.css">
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
<h3 class="title">今日の体重・体脂肪率を入力して下さい。</h3>
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset class="field">
    <legend>データ入力</legend>
     <!-- <label>名前：<input type="text" name="name"></label><br>  -->
     <!-- <label>Email：<input type="text" name="email"></label><br>  -->
     <table>
       <tr>
      <td><label class="col1">体重（kg）</td><td>：<input  class="col2" type="text" name="weight"></label><br></td>
      </tr>
      <tr>
      <td><label  class="col1">体脂肪率（%）</td><td>：<input class="col2" type="text" name="fat"></label><br></td>
      </tr>  
    </table>
     <input class="sendButton" type="submit" value="送信">
    </fieldset>
  </div>
</form>

<nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="userAdd/index-2.php">ユーザー登録・確認</a></div>
    </div>
  </nav>
<!-- Main[End] -->


</body>
</html>
