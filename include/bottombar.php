<?php
  session_start();
  if ($_SESSION['is_login'] == false)  {
 ?>

<form name="submitcontact" method="POST" action="submit.php">
  <div>
    <h4>필수 항목</h4>
    <div class="w3-container" style="width:100%">
      <input style="font-size: 18px" type="text" placeholder="&nbsp;이름 (*)" name="customername" required></input>
      <input style="font-size: 18px" type="text" placeholder="&nbsp;연락처 (*)" name="contact" required></input>
      <input style="font-size: 18px" type="text" placeholder="&nbsp;관심차량 (*)" name="carmodel" required></input>
    </div>
  </div>
  <hr/>
  <div>
    <h4>선택 항목</h4>

    <div class="w3-container" style="width:100%">
      <div class="w3-twothird">
        <input type="text" style="font-size: 18px; width: 32%" placeholder="&nbsp;이메일" name="email"></input>
        <input type="text" style="font-size: 18px; width: 32%" placeholder="&nbsp;지역" name="region"></input>
        <input type="text" style="font-size: 18px; width: 32%" placeholder="&nbsp;예상주행거리 / 년" name="mileage"></input>
        <textarea placeholder="&nbsp;문의사항" style="width: 98%; font-size: 18px; margin-top: 6px; height: 100px" name="question"></textarea>
      </div>
      <button type="submit" class="w3-button w3-round-large w3-blue w3-third" style="min-height: 135px; font-size: 24px; height: 100%">상담 요청</button>
    </div>
  </div>
</form>

<?php
  } else {
 ?>

<button onclick="document.getElementById('modifyTopArea').style.display='block'" class="w3-button w3-round-large w3-blue" style="width: 100%; margin: 4px; font-size: 16px;">상단 회사 소개 및 광고 이미지 추가/제거</button>
<button onclick="document.getElementById('modifyMidArea').style.display='block'" class="w3-button w3-round-large w3-blue" style="width: 100%; margin: 4px; font-size: 16px;">중단 차량 소개 영역 정보 추가/제거/수정</button>
<button onclick="document.getElementById('modifyBotArea').style.display='block'" class="w3-button w3-round-large w3-blue" style="width: 100%; margin: 4px; font-size: 16px;">하단 기타 홍보 영역 이미지 추가/제거</button>
<button onclick="document.getElementById('modifyAdminEmail').style.display='block'" class="w3-left w3-button w3-round-large w3-blue" style="margin: 4px; font-size: 16px;">관리자 이메일 추가/제거/수정</button>
<button onclick="location.href='logout.php'" class="w3-right w3-button w3-round-large w3-red" style="margin: 4px; font-size: 16px;">관리자 로그아웃</button>

<div id="modifyTopArea" class="w3-modal">
  <?php include("include/modifyTopArea.php"); ?>
</div>

<div id="modifyMidArea" class="w3-modal">
  <?php include("include/modifyMidArea.php"); ?>
</div>

<div id="modifyBotArea" class="w3-modal">
  <?php include("include/modifyBotArea.php"); ?>
</div>

<div id="modifyAdminEmail" class="w3-modal">
  <?php include("modifyTopArea"); ?>
</div>

 <?php } ?>
