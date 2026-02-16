AOS.init({
    once: true,
    duration: 700,
    easing: "ease-out"
});

window.addEventListener('load', () => {
    AOS.refresh();
});

// --------------- header ---------------
const slideMenu = document.querySelector(".slide-menu");
const hamburgerBtn = document.querySelector(".hamburger-btn");
const closeBtn = document.querySelector(".close-btn");
const slideMenuItem = document.querySelectorAll(".slide-menu .menu-item");
const btnArr = [...slideMenuItem, hamburgerBtn, closeBtn];

btnArr.forEach((btn) => {
    btn.addEventListener("click", () => {
        let isExpanded = hamburgerBtn.getAttribute("aria-expanded") === "true";

        slideMenu.classList.toggle("hidden");
        hamburgerBtn.setAttribute("aria-expanded", String(!isExpanded));
    });
});

// --------------- treatment ---------------
const tabArr = document.querySelectorAll(".treatment__tab-item");
const panelArr = document.querySelectorAll(".treatment__panel");

tabArr.forEach((tab, idx) => {
    tab.addEventListener("click", function() {

        // 모든 .treatment__tab-item의 aria-selected를 false로 설정
        tabArr.forEach((tab) => {
            tab.setAttribute("aria-selected", "false");
        });

        // 모든 .treatment__panel에 show 클래스 제거 및 hidden 클래스 추가
        panelArr.forEach((panel) => {
            panel.classList.remove("show");
            panel.classList.add("hidden");
        });

        // 클릭된 .treatment__tab-item만 aria-selected를 true로 설정
        this.setAttribute("aria-selected", "true");

        // 선택된 탭과 매칭되는 panel에 hidden 클레스 제거 및 show 클래스 추가 
        panelArr[idx].classList.remove("hidden");
        panelArr[idx].classList.add("show");
    });
});

// --------------- equipment ---------------
let swiper = new Swiper(".equipmentSwiper", {
    slidesPerView: "auto",
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 1100,
        disableOnInteraction: false,
    }
});

// --------------- footer ---------------
const mapContainer = document.querySelector(".footer__location-map");

//지도를 생성할 때 필요한 기본 옵션
const options = { 
	center: new kakao.maps.LatLng(37.4503144, 126.7029167), //지도의 중심좌표.
	level: 3 //지도의 레벨(확대, 축소 정도)
};

const map = new kakao.maps.Map(mapContainer, options); //지도 생성 및 객체 리턴
const markerPosition  = new kakao.maps.LatLng(37.4503144, 126.7029167); 

// 마커 생성
const marker = new kakao.maps.Marker({
    position: markerPosition
});

// 마커가 지도 위에 표시되도록 설정
marker.setMap(map);
