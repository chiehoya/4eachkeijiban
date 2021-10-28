<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>4each 掲示板</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <?php
    mb_internal_encoding("utf8");
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
    $stmt = $pdo -> query("select * from 4each_keijiban");

    
  ?>

  <div class="logo">
    <img src="./4eachblog_logo.jpg" alt="4eachロゴ">
  </div>
  <header>
    <ul class="black_box">
      <li>トップ</li>
      <li>プロフィール</li>
      <li>4eachについて</li>
      <li>登録フォーム</li>
      <li>問い合わせ</li>
      <li>その他</li>
    </ul>
  </header>
  
  <main>
    <div class="left">
      <h1>プログラミングに役立つ掲示板</h1>
      
      <div class="gray_box">
        <h2>入力フォーム</h2>

        <form method="post" action="insert.php">
          <div>
            <label>ハンドルネーム</label>
            <br>
            <input type="text" class="text" size="35" name="handlename">
          </div>
          <div>
            <label>タイトル</label>
            <br>
            <input type="text" class="text" size="35" name="title">
          </div>
          <div>
            <label>コメント</label>
            <br>
            <textarea cols="35" row=7 name="comments"></textarea>
          </div>
          <div>
            <button class="post">投稿する</button>
          </div>

        </form>
    
      </div>

      <?php
        while($row = $stmt->fetch()){
          echo "<div class='kiji'>";
            echo "<h3>".$row['title']."</h3>";
            echo "<div class='contents'>";
              echo $row['comments'];
              echo "<div class='handlename'>posted by".$row['handlename']."</div>";
            echo "</div>";
          echo "</div>";
        }    
        ?>    
      
    </div>
    
    <div class="right">
      <h1>人気の記事</h1>
        <p>PHPオススメ本</p>
        <p>PHP MyAdminの使い方</p>
        <p>今人気のエディタ Top5</p>
        <p>HTMLの基礎</p>
      <h1>オススメリンク</h1>
        <p>インターノウス株式会社</p>
        <p>XAMPPのダウンロード</p>
        <p>Eclipseのダウンロード</p>
        <p>Bracketsのダウンロード</p>
      <h1>カテゴリ</h1>
        <p>HTML</p>
        <p>PHP</p>
        <p>MySQL</p>
        <p>JavaScript</p>
    </div>
  </main>

  <footer>copyright©internous|4each blog the which provides A to Z about programing.</footer>
</body>

</html>