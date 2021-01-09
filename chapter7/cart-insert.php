<!-- 7-4 p283 -->

<?php session_start(); ?> 
<?php require 'header3.php'; ?>
<?php 
$id=$_REQUEST['id'];
if (!isset($_SESSION['product'])) {
  $_SESSION['product']=[];
}
$count=0;
if (isset($_SESSION['product'][$id])) {
  $count=$_SESSION['product'][$id]['count'];
}
$_SESSION['product'][$id]=[
  'name'=>$_REQUEST['name'],
  'price'=>$_REQUEST['price'],
  'count'=>$count+$_REQUEST['count'] 
  //$countがあることですでに入ってるものに追加できる
];
echo '<p>カートに商品を追加しました。</p>';
echo '<hr>';
require 'cart.php';
?>
<?php require '../footer.php'; ?>