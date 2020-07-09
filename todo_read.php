<?php

session_start();
include('functions.php');
// include('getLocation.js');
check_session_id();

// DB接続
$pdo = connect_to_db();

// データ取得SQL作成
$sql = 'SELECT * FROM sachiko';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  // fetchAll()関数でSQLで取得したレコードを配列で取得できる
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
  $output = "";
  $lat = "";
  $long = "";
  // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$outputへデータを追加
  // `.=`は後ろに文字列を追加する，の意味
  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["todo"]}</td>";
    $output .= "<td>{$record["today"]}</td>";
    $lat .= "<td>{$record["latitude"]}</td>";
    $long .= "<td>{$record["longitude"]}</td>";
    // edit deleteリンクを追加
    $output .= "<td><a href='todo_edit.php?id={$record["No"]}'>edit</a></td>";
    $output .= "<td><a href='todo_delete.php?id={$record["No"]}'>delete</a></td>";
    $output .= "</tr>";
  }
  // $valueの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
  // 今回は以降foreachしないので影響なし
  unset($value);
};
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>todo一覧</title>
  <script src="getLocation.js"></script>
</head>

<body>
  <fieldset>
    <legend>ToDoリスト</legend>
    <a href="index.html">入力画面</a>
    <a href="todo_logout.php">logout</a>
    <table>
      <thead>
        <tr>
          <th>メモ</th>
          <th>いつまで</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
  <ul>
    <li>メモした緯度<?= $lat ?>
    <li>メモした経度<?= $long ?>
  </ul>

  <script>
    getLocation();
    var lat = $lat
    console.log(lat);
  </script>
</body>

</html>