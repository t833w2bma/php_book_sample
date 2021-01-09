<?php require 'header3.php'; ?> 

<form class="login" action="login-output.php" method="post">
  ログイン名<input type="text" name="login" id=""> <br>
  パスワード<input type="password" name="password" id=""> <br>
  <input type="submit" value="ログイン">
</form>

<?php require '../footer.php'; ?>