<!-- テーブルにinsertするのは$pswdの方 -->
<?php session_start(); ?>
<?php require 'header3.php'; ?> 
<?php 
if (isset($_SESSION['customer'])) {
  $id=$_SESSION['customer']['id'];
  $sql=$pdo->prepare('select * from customer where id!=? and login=?');
  $sql->execute([$id, $_REQUEST['login']]);
} else {
  $sql=$pdo->prepare('select * from customer where login=?');
  $sql->execute([$_REQUEST['login']]);
}

if (empty($sql->fetchAll())) {

  $pswd = password_hash($_REQUEST['password'], PASSWORD_DEFAULT); 
    // パスワードをハッシュ化する

  if (isset($_SESSION['customer'])) {
    $sql=$pdo->prepare('update customer set name=?, address=?, login=?, password=? where id=?');
    $sql->execute([
      $_REQUEST['name'], $_REQUEST['address'],
      $_REQUEST['login'], password_hash($_REQUEST['password'], PASSWORD_DEFAULT)
      , $id
      ]); 

    $_SESSION['customer']=[
      'id'=>$id, 
      'name'=>$_REQUEST['name'],
      'address'=>$_REQUEST['address'], 
      'login'=>$_REQUEST['login'],
      'password'=>$pswd //$_REQUEST['password']を変更
    ];
    echo 'お客様情報を更新しました。';
  } else {
    $sql=$pdo->prepare('insert into customer values(null,?,?,?,?)');
    $sql->execute(
      [$_REQUEST['name'], $_REQUEST['address'],
      $_REQUEST['login'], $pswd]);
    echo 'お客様情報を登録しました。';
    //セッションに代入してログイン済みにする
		$_SESSION['customer']['name']=$_REQUEST['name'];
		$_SESSION['customer']['address']=$_REQUEST['address'];
		$_SESSION['customer']['login']=$_REQUEST['login'];
  }
} else {
  echo 'ログイン名がすでに使用されていますので変更してください。';
}
?> 

<?php require '../footer.php'; ?>