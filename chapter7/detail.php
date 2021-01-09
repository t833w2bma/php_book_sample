<!-- 7-4 p279 -->

<?php require 'header3.php'; ?> 

<?php
// if (empty($_REQUEST)) {
//   exit ("直接開かないでください。product.phpから開きます。");
// }


$sql=$pdo->prepare('select * from product where id=?');
$sql->execute([$_REQUEST['id']]);
foreach ($sql as $row) {  
?> 
<p><img src="image/<?=$row['id']?>.jpg" alt=""></p>
<form action="cart-insert.php" method="post">
<p> 商品番号:<?=$row['id']?></p>
<p> 商品名:<?=$row['name']?></p>
<p> 価格:<?=$row['price']?></p>
<p> 個数:<select name="count">
<?php 
for ($i=1; $i<=10; $i++) { 
  echo '<option value="',$i,'">',$i,'</option>';
}
?>
</select></p>
<input type="hidden" name="id" value="<?=$row['id']?>">
<input type="hidden" name="name" value="<?=$row['name']?>">
<input type="hidden" name="price" value="<?=$row['price']?>">
<p><input type="submit" value="カートに追加"></p>
</form>
<p><a href="favorite-insert.php?id=<?=$row['id']?>">お気に入りに追加</a></p>
<?php 
}
?>
<?php require '../footer.php'; ?>