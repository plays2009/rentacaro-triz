<?php
// 상단 메인 이미지 출력 위한 데이터베이스 호출
$cntQuery = "SELECT count(idx) FROM bot_image";
$cntResult = $mysqli->query($cntQuery);
$cntData = mysqli_fetch_array($cntResult);
$BotQuery = "SELECT * FROM bot_image";
$botResult = $mysqli->query($BotQuery);
while ($BotData = mysqli_fetch_array($botResult))
{
  if ($BotData['image'])
  {
?>

<div class="" style="width: 960px; height: auto">
  <img src="img/<?=$BotData['image']?>" style="width:960px"></img>
</div>

<?php  }  else  { ?>
  <div class="" style="width: 960px; height: auto">
    <img src="img/camera.png" style="background-color: #cccccc; width:960px"></img>
  </div>
  <?php }
}
?>
