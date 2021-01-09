<!-- 7-3 p270 -->

<?php session_start(); ?> 
<?php require 'header3.php'; ?>
<?php 
  $name=$address=$login=$password=$mail='';
  if (isset($_SESSION['customer'])) {
    $name=$_SESSION['customer']['name'];
    $address=$_SESSION['customer']['address'];
    $login=$_SESSION['customer']['login'];
    $password=$_SESSION['customer']['password'];
  } 
?> 
<form class="customer" action="customer-output.php" method="post">
  <table>
    <tr>
      <td>お名前</td>
      <td><input type="text" name="name" value="<?=$name?>"></td>
    </tr>
    <tr>
      <td>ご住所</td>
      <td><input type="text" name="address" value="<?=$address?>"></td>
    </tr>
    <tr>
      <td>ログイン名</td>
      <td><input type="text" name="login" value="<?=$login?>"></td>
    </tr>
    <tr>
      <td>パスワード</td>
      <td><input type="text" name="password" value="<?=$password?>"></td>
    </tr>
    
  </table>
  <input type="submit" value="確定">
</form>
<?php require '../footer.php'; ?>