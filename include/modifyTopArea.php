<?php
  $cntQuery = "SELECT count(idx) FROM main_images";   // 카운트 얻기 위한 쿼리
  $cntResult = $mysqli->query($cntQuery);
  $cntData = mysqli_fetch_array($cntResult);
?>

<div class="w3-modal-content w3-card-4" style="padding-left: 12px">
  <header class="w3-container">
    <span onclick="document.getElementById('modifyTopArea').style.display='none'" class="w3-button w3-display-topright">&times;</span>

    <h3>페이지의 위쪽에 표시되는 회사 소개 및 광고 이미지를 수정합니다.</h3>
    <h5>현재 <b><?=$cntData[0]?></b>개의 항목이 등록되어 있습니다.</h5>
  </header>
  <div class="w3-container w3-center" style="margin-bottom: 30px">
  <?php
    $getImageQuery = "SELECT * FROM main_images";
    $getImageResult = $mysqli->query($getImageQuery);

    while ($getImageData = mysqli_fetch_array($getImageResult)) {

      if ($getImageData['image']) {
        // 이미지가 데이터베이스에 등록이 되어 있을 시
  ?>
    <div class="w3-dropdown-hover w3-display-container">
      <img class="w3-hover-sepia" src=img/<?=$getImageData['image']?> style="width: 360px; height: 200px"></img>
      <div class="w3-dropdown-content w3-display-middle" style="background-color: rgba(0, 0, 0, 0)">
        <button onclick="window.open('editTopImage.php?idx=<?=$getImageData[idx]?>', '_blank', 'width=600 height=200 left=500 top=400')" class="w3-button w3-round-large w3-blue" style="margin: 4px; font-size: 16px;">수정</button>
        <button onclick="location.href='deleteTopImage.php?idx=<?=$getImageData[idx]?>'" class="w3-button w3-round-large w3-blue" style="margin: 4px; font-size: 16px;">삭제</button>
      </div>
    </div>
    <?php } else { // 이미지가 데이터베이스에 등록이 되어 있지 않을 시 ?>
      <div class="w3-dropdown-hover w3-display-container">
        <img class="w3-hover-sepia" src=img/camera.png style="background-color: #cccccc; width: 360px; height: 200px"></img>
        <div class="w3-dropdown-content w3-display-middle" style="background-color: rgba(0, 0, 0, 0)">
          <button onclick="window.open('editTopImage.php?idx=<?=$getImageData[idx]?>', '_blank', 'width=600 height=200 left=500 top=400')" class="w3-button w3-round-large w3-blue" style="margin: 4px; font-size: 16px;">수정</button>
          <button onclick="location.href='deleteTopImage.php?idx=<?=$getImageData[idx]?>'" class="w3-button w3-round-large w3-blue" style="margin: 4px; font-size: 16px;">삭제</button>
        </div>
      </div>
  <?php }  } ?>
  </div>


  <footer class="w3-container">
    <h5>이미지를 수정하거나 삭제하려면 해당 이미지를 클릭하시고, 추가하려면 <a onclick="window.open('addTopImage.php', '_blank', 'width=600 height=200 left=500 top=400')" style="color: blue; cursor: pointer"><i>여기</i></a>를 눌러주세요</h5>
  </footer>
</div>
