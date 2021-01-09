<a href="product.php">商品</a>
<a href="favorite-show.php">お気に入り</a>
<a href="history.php">購入履歴</a>
<a href="cart-show.php">カート</a>
<a href="purchase-input.php">購入</a>
<a href="customer-input.php">会員登録</a>
<?php if (isset($_SESSION['customer'])) {
 echo '<a href="logout-input.php"><i class="fas fa-sign-out-alt"></i>ログアウト</a>' ;
}else {
echo '<a href="login-input.php"><i class="fas fa-sign-in-alt"></i>ログイン</a>';
}
?>
<hr>