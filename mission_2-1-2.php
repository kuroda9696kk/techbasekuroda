<!DOCTYPE html>
<html lang = "ja">
<head>
	<meta charset = "UTF-8">
	<title>mission_2-1</title>
</head>
<body>
	<form action="http://tt-940.99sv-coco.com/mission_2-1-2.php" method = "post">
	名前：<input type = "text" name ="name"/><br/>
	コメント：<input type = "text" name ="comment"/>
	<input type="submit" value="送信"/>
	</form>
	
	<br/>
	
	<?php
	$name = $_POST['name'];
	$comment = $_POST['comment'];
	date_default_timezone_set('Asia/Tokyo');
	
    if(!empty($name)&&!empty($comment)){
      echo "送信しました。　".date("Y/m/d H:i:s") . '<br/>';
      echo "名前：".$name. '<br/>';
      echo "コメント：".$comment. '<br/>';
  	  $num++;
  	  $filename = 'mission_2-1.txt' ;
  	  $fp = fopen($filename, 'a' );
  	  $count = count( file( $filename ) );
  	  $num = $count + 1;
  	  fwrite($fp, $num."<>".$name."<>".$comment."<>".(date("Y/m/d H:i:s"))."\n");
  	  fclose($fp);
    }
    

    ?>
</body>
</html>