<!DOCTYPE html>
<html lang = "ja">
<head>
	<meta charset = "UTF-8">
	<title>フォームからデータを受け取る</title>
</head>
<body>
	コメント<br/>
	<form action="http://tt-940.99sv-coco.com/mission_1-5-1exa.php" method = "post">
	<input type = "text" name ="comment"/><br/>
	<input type="submit" value="送信"/>
	</form>
	<br/>
	<?php
  $name = $_POST['comment'];
  if($name == "complete"){
  	print("おめでとう！congratulation");
  	
  	$filename = 'mission_1-5.txt' ;
  	$fp = fopen($filename, 'w' );
  	fwrite($fp, $name );
  	fclose($fp);
  }
  elseif(!empty($_POST['comment'])){
  	print ("ご入力ありがとうございます。<br />");
  	print ("コメントを受け付けました。<br />");
  	//$name = mb_convert_encoding($name, "UTF-8");
  
  	$filename = 'mission_1-5.txt' ;
  	$fp = fopen($filename, 'w' );
  	fwrite($fp, $name );
  	fclose($fp);
  }
?>

</body>
</html>