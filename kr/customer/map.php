<?php include $_SERVER["DOCUMENT_ROOT"]."/kr/_inc/head.php"; ?>
  <div id="wrap">
    <?php include $_SERVER["DOCUMENT_ROOT"]."/kr/_inc/header.php"; ?>
    <main>
      <div class="menu-title menu4">
        <div class="menu-title__inner">
          <div class="title">
            <h1 class="tit">고객센터</h1>
            <span class="sub">Global No.1 Paint EUCNC</span>
          </div>
          <ul class="breadcrumb">
            <li class="home"></li>
            <li>고객센터</li>
            <li>오시는 길</li>
          </ul>
          <div class="sub-menu">
            <ul class="submenu_list">
              <li><a href="./online.php">온라인 문의</a></li>
              <li class="active"><a href="./map.php">오시는 길</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="wide-container customer_cont">
        <div class="map__inner">
          <div class="cm_title">
            <h3 class="title">오시는 길</h3>
            <p>친환경 에너지 세이빙 도료 전문기업,<br> EUCNC로 찾아오시는 길을 확인해보세요.</p>
          </div>
          <div class="map__contents">
            <ul class="map-select__list">
              <li data-tab="tab1" class="active">
                <div class="bg"></div>
                <div class="contents">
                  <h3>본사</h3>
                  <p class="address">인천시 서구 정서진로 410 창업·벤처 녹색융합클러스터</p>
                  <p class="tel">TEL. 032-566-0650</p>
                  <p class="fax">FAX. 032-568-0651</p>
                  <button type="button" class="btn_come">찾아오시는 길</button>
                </div>
              </li>
              <li data-tab="tab2">
                <div class="bg"></div>
                <div class="contents">
                  <h3>공장</h3>
                  <p class="address">인천시 서구 보듬로 158, 검단지식산업센터블루텍</p>
                  <p class="tel">TEL. 032-566-0650</p>
                  <p class="fax"></p>
                  <button type="button" class="btn_come">찾아오시는 길</button>
                </div>
              </li>
            </ul>
            <div class="map__result">
              <a id="tab1" class="active" href="https://www.google.co.kr/maps/place/%EC%B0%BD%EC%97%85%C2%B7%EB%B2%A4%EC%B2%98+%EB%85%B9%EC%83%89%EC%9C%B5%ED%95%A9%ED%81%B4%EB%9F%AC%EC%8A%A4%ED%84%B0/data=!3m1!4b1!4m6!3m5!1s0x357c802959f50471:0xbc6eb36c37207f55!8m2!3d37.5689871!4d126.6464424!16s%2Fg%2F11f00xwpck?hl=ko&entry=ttu" target="_blank">
                <img src="/_img/customer/map_img1.png" alt="">
              </a>
              <a id="tab2" href="https://www.google.co.kr/maps/place/%EB%B8%94%EB%A3%A8%ED%85%8D(%EA%B2%80%EB%8B%A8%EC%A7%80%EC%8B%9D%EC%82%B0%EC%97%85%EB%8B%A8%EC%A7%80)/data=!4m6!3m5!1s0x357c81c4ca30fe83:0xeeb86d3d710e887e!8m2!3d37.5976544!4d126.615077!16s%2Fg%2F11hyk3c866?hl=ko&entry=ttu" target="_blank">
                <img src="/_img/customer/map_img2.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php include $_SERVER["DOCUMENT_ROOT"]."/kr/_inc/footer.php"; ?>
  </div>

  <script>
    // function showMap(address) {
    //   const container = document.getElementById('map');
    //   let options = {
    //     center: new kakao.maps.LatLng(37.60602711070171,
    //         126.91577375763062),
    //     level: 3,
    //   };
    //   let map = new kakao.maps.Map(container, options);

    //   let geocoder = new daum.maps.services.Geocoder();

    //   let marker = new kakao.maps.Marker({});

    //   marker.setMap(map);

    //   geocoder.addressSearch(address, function (result, status) {
    //     if (status === daum.maps.services.Status.OK) {
    //       let coords = new daum.maps.LatLng(result[0].y, result[0].x);
    //       let marker = new daum.maps.Marker({
    //         map: map,
    //         position: coords
    //       });
    //       map.setCenter(coords);
    //     }
    //   });
    // }

    $(function() {
      $('.btn_come').click(function() {
        $(this).parents('li').siblings().removeClass('active')
        $(this).parents('li').addClass('active')

        var indexId = $(this).parents('li').data('tab')
        console.log(indexId)
        $('.map__result>a').removeClass('active')
        $(`#${indexId}`).addClass('active')
      })
    })
  </script>
</body>
</html>