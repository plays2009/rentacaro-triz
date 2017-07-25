<?php
  session_start();

  if ($_SESSION['is_login'])
  {

  echo "<center><h4>메일 주소 추가</h4></center>";
?>

<form method=post action="sendmailaddress.php?idx=0">
  <input style="background-color:white" type="text" size="30" name="input_mail">
  <button type="submit">전송</button>
</form>

<?php } ?>
