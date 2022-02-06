<?php
//1.  DB接続します
require_once('funcs-2.php');
$pdo =db_conn();//$pdo=関数名();とする

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM kadai09_user_table");

//3. 実行
$status = $stmt->execute();

//4．データ表示
$view="";

$nameArray="";
$lidArray="";
$lpwArray="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<tr><td class='table'>";
    // $view .= $result['name'];
    // $view .= "</td><td class='table'>";
    $view .= '<a href="detail-2.php?id='.$result['id'].'">';
    $view .= $result['name'];
    $view .= '</a>';
    $view .= "</td><td class='table'>";
    $view .= '<a href="detail-2.php?id='.$result['id'].'">';
    $view .= $result['lid'];
    $view .= '</a>';
    $view .= "</td><td class='table'>";
    $view .= '<a href="detail-2.php?id='.$result['id'].'">';
    $view .= $result['lpw'];
    $view .= '</a>';
    $view .= "</td><td class='table'>";
    $view .= '<a href="delete-2.php?id='.$result['id'].'">';
    $view .= '×';
    $view .= '</a>';
    $view .= "</td></tr>";
    

    $indateArray= $result['name'];
    $weightArray= $result['lid'];
    $fatArray= $result['lpw'];

    // print_r($weightArray);
    // print_r($fatArray);
    // print_r($indateArray);
   
  }

 


// "<tr><td class='table'>".$arrayData[0]."</td><td class='table'>".$arrayData[1]."</td><td class='table'>".$arrayData[2]."</td><td class='table'>".$arrayData[3]."</td></tr>";
}











?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Body Building Tips</title>
<link rel="stylesheet" href="../sample2.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
<h1>Body Building Tips</h1>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
   
<div id="tableArea" style="overflow: auto; height: 300px; width: 1025px;" >
      <table border ="1" width = "1000" class="tableArea" >
      <tr class="table">
        <!-- <th class="table" >名前</th> -->
        <th class="table" >名前</th>
        <th class="table" >ID</th>
        <th  class="table" >PW</th>
        <th  class="table" >Del</th>
        
      </tr>
      <div class="container jumbotron"><?= $view ?></div>
      </div>
	</table>
    <!-- <div class="container jumbotron"><?= $view ?></div> -->
</div>

<!-- グラフ表示
<h3>あなたの体重推移はコチラ↓↓</h3>
          <div style="left: 30px; width: 725px; height: 400px;">
          <canvas id="myLineChart" ></canvas>
          </div>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
          </div>
 -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
     <p> <a class="navbar-brand" href="index-2.php">ユーザー登録ページ</a></p>
      <a class="navbar-brand" href="../index.php">トップページへ戻る</a>
      </div>
    </div>
  </nav>
<!-- Main[End] -->

</body>

<script>
const el=document.getElementById('tableArea');
el.scrollTo(0, el.scrollHeight);

/*グラフ描画
var ctx = document.getElementById('myLineChart');
   var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {  

      labels:[<?php echo $indateArray ?>],
      // labels: [1, 2, 3, 4, 5, 6],
      datasets: [
        {
          label: '体重(kg）',
       
          data: [<?php echo $weightArray ?>],
          // data: [12, 19, 3, 5, 2, 20],
          borderColor: "rgba(255,0,0,1)",
          backgroundColor: "rgba(0,0,0,0)",
          
        },
        {
          label: '体脂肪率(%)',
          data:[<?php echo $fatArray ?>],
          // data: [5, 6, 7, 7, 8, 9],
          borderColor: "rgba(0,0,255,1)",
          backgroundColor: "rgba(0,0,0,0)",
          yAxisID: "y2"
          
        }
      ],
    },
    
  });
   
*/

</script>
</html>
