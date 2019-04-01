<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<html lang="ja">
<title>mission1-4</title>
</head>

<body>
<!-- ここの部分からデータを扱うよ！-->
<!-- このページを動かすからmission_1-4.php を指定するよ！ -->
<!-- データを送信するから、送信用のメソッド post を指定するよ！ -->
<form action="mission_1-4answer.php" method = "post">
<!-- テキストボックスを作るよ -->
<input type="text" name="comment" value="コメント"></input>
<br>
<!-- 送信ボタンを作るよ -->
<input type="submit" value="送信"></input>
</form>


<?php
//条件分岐
//もしコメント部分に文字が入っていたら
if(isset($_POST['comment'])){

//コメント部分の文字列を変数 $comment に代入
$comment = $_POST['comment'];

//出力
echo "「".$comment."」を受け付けました";

}
?>
</body>
</html>