<?php
  $cntQuery = "SELECT count(address) FROM admin_mail";   // 카운트 얻기 위한 쿼리
  $cntResult = $mysqli->query($cntQuery);
  $cntData = mysqli_fetch_array($cntResult);
?>

<div class="w3-modal-content w3-card-4" style="padding-left: 12px">
  <header class="w3-container">
    <span onclick="document.getElementById('modifyAdminEmail').style.display='none'" class="w3-button w3-display-topright">&times;</span>

    <h3>사용자가 입력한 상담 내용이 전송되는 메일 주소를 수정합니다.</h3>
    <h5>현재 <b><?=$cntData[0]?></b>개의 주소가 등록되어 있습니다.</h5>
  </header>

  <div class="w3-container w3-center" style="margin-bottom: 30px; max-height: 480px; padding: 16px; overflow: auto">
  <?php
    $getMailQuery = "SELECT * FROM admin_mail";
    $getMailResult = $mysqli->query($getMailQuery);

    while ($getMailData = mysqli_fetch_array($getMailResult)) {
  ?>
    <div>
      <h6><b><?=$getMailData[address]?><b>&nbsp;&nbsp;&nbsp;&nbsp;
      이 메일 주소를 &nbsp;&nbsp;<button onclick="window.open('editMailAddress.php?idx=<?=$getMailData[idx]?>', '_blank', 'width=600 height=200 left=500 top=400')" class="w3-button w3-blue w3-round-large">수정</button>
      &nbsp;<button onclick="location.href='deleteMailAddress.php?idx=<?=$getMailData[idx]?>'" class="w3-button w3-blue w3-round-large">삭제</button></h6>
    </div>
  <?php
    }
  ?>
  </div>


  <footer class="w3-container">
    <h5>상담 내용을 받아 볼 메일 주소를 추가하려면 <a onclick="window.open('addMailAddress.php', '_blank', 'width=600 height=500 left=500 top=400')" style="color: blue; cursor: pointer"><i>여기</i></a>를 눌러주세요</h5>
  </footer>
</div>
