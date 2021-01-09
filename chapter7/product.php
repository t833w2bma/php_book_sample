<!-- 7-4 p277 -->

<?php require 'header3.php'; ?>
<form action="product.php" method="post">
  商品検索
  <input type="text" name="keyword">
  <input type="submit" value="検索">
</form>
<hr>
<table>
  <th>商品番号</th>
  <th>商品名</th>
  <th>価格</th>
<?php
if (isset($_REQUEST['keyword'])) {
  $sql=$pdo->prepare('select * from product where name like ?');
  $sql->execute(['%'.$_REQUEST['keyword'].'%']);
} else {
  $sql=$pdo->prepare('select * from product');
  $sql->execute([]);
}
foreach ($sql as $row) {
  $id=$row['id'];
?>
  <tr>
    <td> <?=$id?> </td>
    <td><a href="detail.php?id= <?=$id?> "> <?=$row['name']?> </a></td>
    <td> <?=$row['price']?> </td>
  </tr>
<?php
}
?>
</table>
<?php require '../footer.php'; ?>