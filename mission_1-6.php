<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<html lang="ja">
<title>mission1-6</title>
</head>

<body>
<form action="http://tt-940.99sv-coco.com/mission_1-6.php" method = "post">
<input type="text" name="comment" value="コメント"></input>
<input type="submit" value="送信"></input>
</form>


<?php
$name = $_POST['comment'];

  if($name == "完成！" ){
  	print("おめでとう！");
  	
  	$filename = 'mission_1-6.txt' ;
  	$fp = fopen($filename, 'a' );
  	fwrite($fp, $name."\n" );
  	fclose($fp);
     }
  else if(!empty($name)){

     echo "「".$name."」を受け付けました";
	$filename = 'mission_1-6.txt' ;
  	$fp = fopen($filename, 'a' );
  	fwrite($fp, $name."\n" );
  	fclose($fp);
    } else
     {
  	print("入力して下さい。");
     }

?>
</body>
</html>