<?php session_start(); ?> 
<?php require 'header3.php'; ?>
<?php 
if (isset($_SESSION['customer'])) {
  $sql=$pdo->prepare('insert into favorite values(?,?)');
  $sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]); //sessionではなくrequest
  echo 'お気に入りに商品を追加しました。';
  echo '<hr>';
  require 'favorite.php';
} else {
  echo 'お気に入りに商品を追加するには、ログインしてください。';
}
?>
<?php require '../footer.php'; ?>