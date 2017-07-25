<?php
  $categoryQuery = "SELECT DISTINCT(category) FROM mid_products"; // 카테고리를 중복 없이 선택하기 위한 쿼리
  $categoryResult = $mysqli->query($categoryQuery);
  while ($categoryData = mysqli_fetch_array($categoryResult)) {
    $getProductQuery = "SELECT * FROM mid_products WHERE category = '$categoryData[0]'";  // 카테고리에 해당하는 데이터를 가져오는 쿼리
    $getProductResult = $mysqli->query($getProductQuery);
   ?>
    <div class="w3-panel w3-black">
      <h3><?=$categoryData[0]?></h3>
    </div>

    <?php
    while ($getProductData = mysqli_fetch_array($getProductResult)) {

      if ($getProductData['is_hot']) {// hot 지정된 상품일 경우 border 처리
    ?>
      <div style="width: 100%; height: auto; margin-top: 10px; margin-bottom: 8px; border: 5px solid #2b8cd9">   <!-- hot 상품일 경우 -->
        <img src="img/hoticon.png" style="width: 100px; margin: 8px; height: 100px; z-index: 1; position: absolute"></img>
        <?php } else { ?>
      <div style="width: 960px; height: auto; margin-top: 10px; margin-bottom: 8px"> <!-- hot 상품이 아닐 경우 -->
          <?php } ?>

          <div class="w3-cell">
            <img src="img/<?=$getProductData['image']?>" style="width:360px; display: inline-block; height: 240px; margin: 16px"></img>
          </div>
          <div class="w3-container w3-cell w3-padding-16">
            <h3 style="margin: 0px"><?=$getProductData['name']?></h3>
            <table class="w3-table w3-striped w3-bordered" style="width: 500px">
             <tr>
               <td><b>차량 가격</b></td>
               <td><?=$getProductData['product_price']?>원</td>
             </tr>
             <tr>
               <td style="background-color: #3a4547; color: #ffffff" colspan="2"><center><b>월 렌탈료</b><center></td>
             </tr>
             <tr>
               <td><b>초기비용 0원</b></td>
               <td style="color: blue"><?=$getProductData['first_cost']?>원</td>
             </tr>
             <tr>
               <td><b>선수금 30%</b></td>
               <td style="color: red"><?=$getProductData['pre_pay_30']?>원</td>
             </tr>
           </table>

           <h5 class="w3-right"><?=$getProductData['note']?></h5>
          </div>
      </div>


  <?php }
  }
?>
