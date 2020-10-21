<?php 
  require '../header.php'; 

   echo "なにか";

?>
<p>お名前を入力してください。</p>
<form action="user-output2.php" method="post">
  <input type="text" name="user">
  <input type="submit" value="確定">
</form>
<?php require '../footer.php'; ?>