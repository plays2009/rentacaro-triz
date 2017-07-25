<?php
  session_start();

  if ($_SESSION['is_login'])
  {

  $targetIdx = $_REQUEST['idx'];
  echo "<center><h4>사진 첨부</h4></center>";
?>

<form method=post enctype= "multipart/form-data" action="include/sendfile.php?idx=<?=$targetIdx?>">
  <input style="background-color:white" type="file" size="30" name="imgFileName">
  <button type="submit">전송</button>
</form>

<?php } ?>
