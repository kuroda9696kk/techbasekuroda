<html>
  <head>
      <title>mission1-3</title>
  </head>
  <body>
      <?php
         //テキストファイルの中身を関数で読み込んで変数に代入する
         $contents=file_get_contents("mission_1-2.txt");
         //変数をブラウザ表示する
         echo $contents;
      ?>
  </body>
</html>