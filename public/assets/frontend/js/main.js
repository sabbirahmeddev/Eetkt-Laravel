// ========== Itinerary slider ==========
var swiper = new Swiper(".Itinerary", {
  slidesPerView: 3,
  spaceBetween: 20,
  loop:true,
  speed:1000,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    350: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    992: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    1400: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
  },
});
// ========= haeder banner slider =========
var swiper = new Swiper(".headerBnnr", {
  spaceBetween: 30,
  effect: "fade",
  loop: true,
  allowTouchMove: false,
  speed: 2000,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
// =========== rentel slider ============
var swiper = new Swiper(".rentelSlider", {
  autoplay: {
    delay: 1000,
    disableOnInteraction: false,
  },
  speed: 2000,
  loop: true,
  slidesPerView: 1,
  spaceBetween: 20,
  breakpoints: {
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    992: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    1400: {
      slidesPerView: 3,
      spaceBetween: 40,
    },
  },
});
// ================ top destination slider =================
var swiper = new Swiper(".topDesSlider", {
  loop: true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  spaceBetween: 25,
  speed: 2000,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
// ============ wow animate =============
new WOW().init();
// ================ otp number =================
function clickEvent(first, last) {
  if (first.value.length) {
    document.getElementById(last).focus();
  }
}
// ================ sponser slider js =================
var swiper = new Swiper(".airlinesLogo", {
  slidesPerView: 6,
  spaceBetween: 20,
  freeMode: true,
  loop: true,
  autoplay: {
    delay: 500,
    disableOnInteraction: false,
  },
  speed: 1500,
  breakpoints: {
    350: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    500: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
    992: {
      slidesPerView: 5,
      spaceBetween: 20,
    },
    1200: {
      slidesPerView: 6,
      spaceBetween: 20,
    },
  },
});
// ================== bus stand slider ====================
var swiper = new Swiper(".busStandSlider", {
  loop: true,
  spaceBetween: 10,
  slidesPerView: 4,
  freeMode: true,
  watchSlidesProgress: true,
});
var swiper2 = new Swiper(".busStandSlider2", {
  loop: true,
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiper,
  },
});
var swiper = new Swiper(".busStandSlider32", {
  loop: true,
  spaceBetween: 10,
  slidesPerView: 4,
  freeMode: true,
  watchSlidesProgress: true,
});
var swiper2 = new Swiper(".busStandSlider3", {
  loop: true,
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiper,
  },
});
var swiper = new Swiper(".busStandSlider23", {
  loop: true,
  spaceBetween: 10,
  slidesPerView: 4,
  freeMode: true,
  watchSlidesProgress: true,
});
var swiper2 = new Swiper(".busStandSlider4", {
  loop: true,
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiper,
  },
});

// ================== flight booking price range ===================
var inputLeft = document.getElementById("input-left");
var inputRight = document.getElementById("input-right");

var thumbLeft = document.querySelector(".slider > .thumb.left");
var thumbRight = document.querySelector(".slider > .thumb.right");
var range = document.querySelector(".slider > .range");

function setLeftValue() {
  var _this = inputLeft,
    min = parseInt(_this.min),
    max = parseInt(_this.max);

  _this.value = Math.min(parseInt(_this.value), parseInt(inputRight.value) - 1);

  var percent = ((_this.value - min) / (max - min)) * 100;

  thumbLeft.style.left = percent + "%";
  range.style.left = percent + "%";
}
setLeftValue();

function setRightValue() {
  var _this = inputRight,
    min = parseInt(_this.min),
    max = parseInt(_this.max);

  _this.value = Math.max(parseInt(_this.value), parseInt(inputLeft.value) + 1);

  var percent = ((_this.value - min) / (max - min)) * 100;

  thumbRight.style.right = (100 - percent) + "%";
  range.style.right = (100 - percent) + "%";
}
setRightValue();

inputLeft.addEventListener("input", setLeftValue);
inputRight.addEventListener("input", setRightValue);

inputLeft.addEventListener("mouseover", function () {
  thumbLeft.classList.add("hover");
});
inputLeft.addEventListener("mouseout", function () {
  thumbLeft.classList.remove("hover");
});
inputLeft.addEventListener("mousedown", function () {
  thumbLeft.classList.add("active");
});
inputLeft.addEventListener("mouseup", function () {
  thumbLeft.classList.remove("active");
});

inputRight.addEventListener("mouseover", function () {
  thumbRight.classList.add("hover");
});
inputRight.addEventListener("mouseout", function () {
  thumbRight.classList.remove("hover");
});
inputRight.addEventListener("mousedown", function () {
  thumbRight.classList.add("active");
});
inputRight.addEventListener("mouseup", function () {
  thumbRight.classList.remove("active");
});

// ========================= Departure Time range =============================
var inputLeft2 = document.getElementById("input-left2");
var inputRight2 = document.getElementById("input-right2");

var thumbLeft2 = document.querySelector(".slider > .thumb.left2");
var thumbRight2 = document.querySelector(".slider > .thumb.right2");
var range2 = document.querySelector(".slider > .range2");

function setLeftValue() {
  var _this = inputLeft2,
    min = parseInt(_this.min),
    max = parseInt(_this.max);

  _this.value = Math.min(parseInt(_this.value), parseInt(inputRight2.value) - 1);

  var percent = ((_this.value - min) / (max - min)) * 100;

  thumbLeft.style.left2 = percent + "%";
  range.style.left2 = percent + "%";
}
setLeftValue();

function setRightValue() {
  var _this = inputRight2,
    min = parseInt(_this.min),
    max = parseInt(_this.max);

  _this.value = Math.max(parseInt(_this.value), parseInt(inputLeft2.value) + 1);

  var percent = ((_this.value - min) / (max - min)) * 100;

  thumbRight.style.right2 = (100 - percent) + "%";
  range.style.right2 = (100 - percent) + "%";
}
setRightValue();

inputLeft2.addEventListener("input", setLeftValue);
inputRight2.addEventListener("input", setRightValue);

inputLeft2.addEventListener("mouseover", function () {
  thumbLeft2.classList.add("hover");
});
inputLeft2.addEventListener("mouseout", function () {
  thumbLeft2.classList.remove("hover");
});
inputLeft2.addEventListener("mousedown", function () {
  thumbLeft2.classList.add("active");
});
inputLeft2.addEventListener("mouseup", function () {
  thumbLeft2.classList.remove("active");
});

inputRight2.addEventListener("mouseover", function () {
  thumbRight2.classList.add("hover");
});
inputRight2.addEventListener("mouseout", function () {
  thumbRight2.classList.remove("hover");
});
inputRight2.addEventListener("mousedown", function () {
  thumbRight2.classList.add("active");
});
inputRight2.addEventListener("mouseup", function () {
  thumbRight2.classList.remove("active");
});

