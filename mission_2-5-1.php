<!DOCTYPE html>
<html lang = "ja">
<head>
	<meta charset = "UTF-8">
	<title>mission2-5-1</title>
</head>
<body>
	<form action="http://tt-940.99sv-coco.com/mission_2-5-2.php" method = "post">
	<input type = "text" name ="name" placeholder="名前"/><br/>
	<input type = "text" name ="comment" placeholder="コメント"/><br/>
	<input type = "text" name ="password" placeholder="パスワード" />
	<input type = "hidden" name ="numEdit1" value="<?php echo $numEdit1 = 'なし' ; ?>" />   <input type="submit" value="送信"/><br/>
	</form>
	<br/>
	<form action="http://tt-940.99sv-coco.com/mission_2-5-2.php" method = "post">
	<input type = "text" name ="numRemove" placeholder="削除番号"/><br/>
	<input type = "text" name ="password" placeholder="パスワード" /> 
	<input type = "hidden" name ="numEdit1" value="<?php echo $numEdit1 = 'なし' ; ?>" /><input type="submit" value="削除"/><br/>
	</form>
	<br/>
	<form action="http://tt-940.99sv-coco.com/mission_2-5-3.php" method = "post">
	<input type = "text" name ="numEdit2" placeholder="編集番号"/><br/>
	<input type = "text" name ="password" placeholder="パスワード" /> <input type="submit" value="編集"/><br/>
	</form>
	<br/>
	<?php
	//echo "editCheck".$editCheck."<br/>";
	//echo $numEdit1;
	$fp = fopen('mission_2-1.txt','a');
	$lines=file('mission_2-1.txt');
	foreach ($lines as $numloop=>$line) :  //ファイルの各行について
      $parts = explode("<>",$line); //<>で区切る
      $numData = $parts[0]; //番号。でもこれを使うとあとあと狂うから使わない
      $nameData = $parts[1];
      $commentData = $parts[2];
      $dateData = $parts[3]; //改行含む
      $num=$numloop + 1;
      echo $num." ".$nameData." ".$commentData." ".$dateData.'<br/>'; //各行をブラウザ上に表示
      //fwrite($fp, $numloop."<>".$nameData."<>".$commentData."<>".$dateData); //$numloopで改めて番号をつける
      //$numloop++; //番号を1足す
    endforeach;
    ?>

</body>
</html>