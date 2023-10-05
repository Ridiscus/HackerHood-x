var swiper = new Swiper(".banner-slider", {
    spaceBetween: 100,
    centeredSlides: true,
    autoplay: {
      delay: 7500,
      disableOnInteraction: false,
    },
    loop: true
});

var goTopBtn = document.querySelector(".button");

window.addEventListener("scroll", cheickHeight)

function cheickHeight() {
  if(window.scrollY > 500) {
    goTopBtn.style.display = "flex"
  } else {
    goTopBtn.style.display = "none"
  }
}


var swiper = new Swiper(".view-slider", {
  effect: "cards",
  grabCursor: true,
});
