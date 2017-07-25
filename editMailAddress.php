<?php
  session_start();

  if ($_SESSION['is_login'])
  {

  $targetIdx = $_REQUEST['idx'];
  echo "<center><h4>메일 주소 수정</h4></center>";
?>

<form method=post enctype= "multipart/form-data" action="sendmailAddress.php?idx=<?=$targetIdx?>">
  <input style="background-color:white" type="text" size="30" name="input_mail">
  <button type="submit">전송</button>
</form>

<?php } ?>
