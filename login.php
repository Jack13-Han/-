<?php 


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
    <h2>こんにちは!</h2>
    <p>ABC 安全確認サイトへ...</p>
    <form action="login.php" method="POST">
      <div class="form-group">
        <label for="idnum">社員番号</label>
        <input type="text" id="idnum" name="idnum" placeholder="あなたの社員番号" required>
      </div>
      <div class="form-group">
        <label for="password">パスワード</label>
        <input type="password" id="password" name="password" placeholder="••••••••" required>
      </div>
      <button type="submit" class="login-btn">ログイン</button>
    </form>
    <div><a href="email.php">Forget Password</a></div>
      
    </div>
  </div>
</body>
</html>