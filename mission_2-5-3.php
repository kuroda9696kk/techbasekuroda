<!DOCTYPE html>
<html lang = "ja">
<head>
	<meta charset = "UTF-8">
	<title>mission2-5-3</title>
</head>
<body>
	<form action="http://tt-940.99sv-coco.com/mission_2-5-2.php" method = "post">
	<!--
	編集したい名前、コメントのデータの受け渡し
	-->
	<?php
	$password = $_POST['password'];
	if($password == "abehiroshi"){
		//echo $_POST['numEdit2']."<br/>";
	    echo $_POST['numEdit2']."を編集中<br/>";
	    $filename = 'mission_2-1.txt';
	    $lines = file($filename);
	    foreach($lines as $line):
	    $partsEditline = explode("<>", $line);
	    if($partsEditline[0] == $_POST['numEdit2']){ //編集行のみ
		    $nameData = $partsEditline[1]; //名前取得
		    $commentData = $partsEditline[2]; //コメント取得
	    }
	    endforeach;
	}
	?> 
	<input type = "text" name ="name" value="<?php echo $nameData; ?>" /><br/>
	<input type = "text" name ="comment" value="<?php echo $commentData; ?>" /><br/>
	<input type = "text" name ="password" placeholder="パスワード" />
	<input type = "hidden" name ="numEdit1" value="<?php echo $_POST['numEdit2']; ?>" /> <input type="submit" value="送信"/><br/>
	<!--編集番号を受け取る-->
	</form>
	<br/>
	<form action="http://tt-940.99sv-coco.com/mission_2-5-2.php" method = "post">
	<input type = "text" name ="numRemove" placeholder="削除番号"/><br/>
	<input type = "text" name ="password" placeholder="パスワード" /> <input type="submit" value="削除"/><br/>
	</form>
	<br/>
	<form action="http://tt-940.99sv-coco.com/mission_2-5-3.php" method = "post">
	<input type = "text" name ="numEdit2" placeholder="編集番号"/><br/>
	<input type = "text" name ="password" placeholder="パスワード" /> <input type="submit" value="編集"/><br/>
	</form>
	<br/>
	
	<?php
	$password = $_POST['password'];
	if($password == "abehiroshi"){
	    $filename = 'mission_2-1.txt';
	    $lines = file($filename);
	    foreach($lines as $line):
	    $partsEditline = explode("<>", $line);
	    if($partsEditline[0] == $_POST['numEdit2']){ //編集行のみ
		    $nameData = $partsEditline[1]; //名前取得
		    $commentData = $partsEditline[2]; //コメント取得
	    }
	    endforeach;
		edit();
	}else{
		$alert="パスワードが違います<br/>";
	}
	
	echo $alert;
	function edit(){
    /*
  	各行をブラウザ上に表示
  	*/
  	$filename = 'mission_2-1.txt';
  	$lines = file($filename);
    foreach ($lines as $line) :  //ファイルの各行について
      $parts = explode("<>",$line); //<>で区切る
      $numData = $parts[0]; //番号。でもこれを使うとあとあと狂うから使わない
      $nameData = $parts[1];
      $commentData = $parts[2];
      $dateData = $parts[3]; //改行含む
      echo $numData." ".$nameData." ".$commentData." ".$dateData.'<br/>'; //各行をブラウザ上に表示
    endforeach;
    }
    
	?>
        

</body>
</html>

