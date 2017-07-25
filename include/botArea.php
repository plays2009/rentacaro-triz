<?php
// 상단 메인 이미지 출력 위한 데이터베이스 호출
$cntQuery = "SELECT count(idx) FROM main_images";
$cntResult = $mysqli->query($cntQuery);
$cntData = mysqli_fetch_array($cntResult);
for ($cnt = 0; $cnt < $cntData[0]; $cnt++)
{
  $topQuery = "SELECT * FROM main_images WHERE pos = $cnt+1";
  $topResult = $mysqli->query($topQuery);
  $topData = mysqli_fetch_array($topResult);

  if ($topData['image'])
  {
?>

<div class="" style="width: 960px; height: auto">
  <img src="img/<?=$topData['image']?>" style="width:960px"></img>
</div>

<?php  }  else  { ?>
  <div class="" style="width: 960px; height: auto">
    <img src="img/camera.png" style="background-color: #cccccc; width:960px"></img>
  </div>
  <?php }
}
?>
