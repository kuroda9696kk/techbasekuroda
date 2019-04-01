<!DOCTYPE html>
<html lang = "ja">
<head>
	<meta charset = "UTF-8">
	<title>mission2-4-2</title>
</head>
<body>
	<form action="http://tt-940.99sv-coco.com/mission_2-4-1.php" method = "post">
	<?php
	$filename = 'mission_2-1.txt';
	$lines = file($filename);
	foreach($lines as $line):
	$partsEditline = explode("<>", $line);
	if($partsEditline[0] == $_POST['numEdit2']){
		$nameData = $partsEditline[1];
		$commentData = $partsEditline[2];
		echo '<input type = "text" name ="name" value="'.$nameData.'"/><br/>';
		echo '<input type = "text" name ="comment" value="'.$commentData.'"/>';
	}
	endforeach;
	?>
	<input type = "hidden" name ="numEdit1" value="<?php echo $_POST['numEdit2']; ?>" />   <input type="submit" value="送信"/><br/>
	</form>
	<br/>
	<form action="http://tt-940.99sv-coco.com/mission_2-4-1.php" method = "post">
	削除対象番号：<input type = "text" name ="numRemove" placeholder="削除番号"/>  <input type="submit" value="削除"/><br/>
	</form>
	<br/>
	<form action="http://tt-940.99sv-coco.com/mission_2-4-2.php" method = "post">
	編集対象番号：<input type = "text" name ="numEdit2" placeholder="編集番号"/>  <input type="submit" value="編集"/><br/>
	</form>
	<br/>
	
	<?php
    /*
  	各行をブラウザ上に表示
  	*/
  	$filename = 'mission_2-1.txt';
  	$lines = file($filename);
    $numloop = 1;
    foreach ($lines as $line) :  //ファイルの各行について
      $parts = explode("<>",$line); //<>で区切る
      $numData = $parts[0]; //番号。でもこれを使うとあとあと狂うから使わない
      $nameData = $parts[1];
      $commentData = $parts[2];
      $dateData = $parts[3]; //改行含む
      echo $numData." ".$nameData." ".$commentData." ".$dateData.'<br/>'; //各行をブラウザ上に表示
      //$numloop++; //番号を1足す
    endforeach;
    
	?>
        

</body>
</html>

