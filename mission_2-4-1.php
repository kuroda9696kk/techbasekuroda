<!DOCTYPE html>
<html lang = "ja">
<head>
	<meta charset = "UTF-8">
	<title>mission2-4-1</title>
</head>
<body>
	<form action="http://tt-940.99sv-coco.com/mission_2-4-1.php" method = "post">
	<input type = "text" name ="name" placeholder="名前"/><br/>
	<input type = "text" name ="comment" placeholder="コメント"/>
	<input type = "hidden" name ="numEdit1" value="<php echo $numEdit1 = 0; ?>" />   <input type="submit" value="送信"/><br/>
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
	$name = $_POST['name']; //投稿者の名前
	$comment = $_POST['comment']; //投稿されたコメント
	date_default_timezone_set('Asia/Tokyo'); //投稿日時
	$filename = 'mission_2-1.txt' ; //テキストファイルのタイトル
	$editCheck = $_POST['numEdit1']; //1で編集モード。
	
	
    /*
    普通にコメントを投稿した時
    */
    if($editCheck==0&&!empty($name)&&!empty($comment)&&empty($_POST['numRemove'])){ //名前とコメントが両方入っててかつ削除欄が空の時
      /*
      送信した投稿とコメントをブラウザに表示
      */
      echo "送信しました。　".date("Y/m/d H:i:s") . '<br/>';
      echo "名前：".$name. '<br/>';
      echo "コメント：".$comment. '<br/><br/>'; //ブラウザに日付、名前、コメントを表示
      $fp = fopen($filename, 'a' );  //ファイルを作成、書き込み準備
  	  
  	  /*
  	  ファイルに書き込む内容の準備。すでにある内容のバックアップ、新しい内容の追加
  	  */
      $lines = file($filename); //ファイルを配列に格納
      array_push($lines, "1"."<>".$name."<>".$comment."<>".(date("Y/m/d H:i:s"))."\n"); //番号はどうせ消すからとりあえず１を入れる
      
      /*
  	  新規ファイルの作成
  	  */
      unlink($filename); //ファイルを削除
      $fp = fopen($filename, 'a' );  //ファイルを作成、書き込み準備
	
      /*
  	  各行のファイルへの書き込み、ブラウザ上に表示
  	  */
      $numloop = 1;
      foreach ($lines as $line) :  //ファイルの各行について
      $parts = explode("<>",$line); //<>で区切る
      $numData = $parts[0]; //番号。でもこれを使うとあとあと狂うから使わない
      $nameData = $parts[1];
      $commentData = $parts[2];
      $dateData = $parts[3]; //改行含む
      echo $numloop." ".$nameData." ".$commentData." ".$dateData.'<br/>'; //各行をブラウザ上に表示
      fwrite($fp, $numloop."<>".$nameData."<>".$commentData."<>".$dateData); //$numloopで改めて番号をつける
      $numloop++; //番号を1足す
      endforeach;
      fclose($fp); //ファイルを閉じる
     
     /*
     削除指定欄に数字が入った時
     */ 
     }elseif(ctype_digit($_POST['numRemove'])){ //削除指定番号が半角数字の時
     
     $removedName = "none";
     $removedComment = "none";
     
      /*
  	  ファイルに書き込む内容の準備。削除内容を表示するためバックアップをとる。
  	  */
	  $lines = file($filename);  //ファイルの内容を配列に格納する
	  $numRemove = $_POST['numRemove']; //削除指定番号の取得
	  foreach($lines as $line):
	  	$parts = explode("<>",$line); //削除行を区切り文字で切り分ける
	  	if($parts[0] == $numRemove){
	  		$removedName = $parts[1]; //削除行の名前を取得
      		$removedComment = $parts[2]; //削除行のコメントを取得
      	}
      endforeach;
      
      /*
	  $lineRemove = $lines[$numRemove]; //削除する行の内容の取得
      $parts = explode("<>",$lineRemove); //削除行を区切り文字で切り分ける
      $removedName = $parts[1]; //削除行の名前を取得
      $removedComment = $parts[2]; //削除行のコメントを取得
      */
	  
     /*
      削除行の投稿とコメントをブラウザに表示
      */
      echo "コメント".$numRemove."を"."削除しました。　".date("Y/m/d H:i:s") . '<br/>';
      echo "名前：".$removedName. '<br/>';
      echo "コメント：".$removedComment. '<br/><br/>'; //ブラウザに日付、名前、コメントを表示
	  
	  /*
      ファイル削除
      */
	  unlink($filename); //ファイルの削除
	  
	  /*
      ブラウザ表示、ファイルへの書き込み
      */
	  $fp= fopen($filename, 'a' ); //ファイル作成、書き込み準備
	  foreach ($lines as $line) : 
      $parts = explode("<>",$line);
      $numData = $parts[0];
      $nameData = $parts[1];
      $commentData = $parts[2];
      $dateData = $parts[3];
      if($numData !== $numRemove){ //削除行以外は
      	echo $numData." ".$nameData." ".$commentData." ".$dateData.'<br/>'; //これから書き込まれる各行の内容を表示
      	fwrite($fp, $numData."<>".$nameData."<>".$commentData."<>".$dateData); //各行をファイルに書き込む
      }
      endforeach;
     	
      fclose($fp); //ファイルを閉じる
      
    /*
    編集データを受け取った時
    */
	}elseif($editCheck!==0){
	  $lines = file($filename);
	  $countLine = 1;
	  $numEdit = $_POST['numEdit1'];
	  /*
      ファイル削除
      */
	  unlink($filename); //ファイルの削除
	  
	  /*
      ブラウザ表示、ファイルへの書き込み
      */
      $fp= fopen($filename, 'a' ); //ファイル作成、書き込み準備
	
	  foreach($lines as $line):
		$parts = explode("<>", $line);
		$numData = $parts[0];
		if($numData == $numEdit){
			$nameData = $_POST['name'];
			$commentData = $_POST['comment'];
			$dateData = (date("Y/m/d H:i:s"))."\n";
		}else{
			$nameData = $parts[1];
			$commentData = $parts[2];
			$dateData = $parts[3];
		}
		echo $numData." ".$nameData." ".$commentData." ".$dateData.'<br/>';
		fwrite($fp, $numData."<>".$nameData."<>".$commentData."<>".$dateData);
		$countLine++;
	  endforeach;
	  fclose($fp); //ファイルを閉じる
	  }
		
  ?>
 </body>
 </html>