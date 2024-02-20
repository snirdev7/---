$(document).ready(function () {
  // let headerHeight = $(".site-header").outerHeight();
  // $(window).scroll(function () {
  //   if ($(window).scrollTop() >= headerHeight) {
  //     $(".site-header").addClass("sticky");
  //   } else {
  //     $(".site-header").removeClass("sticky");
  //   }
  // });
  // Hamburger
  $(".hamburger").click(function () {
    $(this).toggleClass("is-active");
    $(".site-header .main-navigation").toggleClass("menu-open");
    $(".site-header .user-log-in").toggleClass("open");
    $(".site-header .main-navigation ul li ul").removeClass("menu-open");
    $(".site-header .main-navigation ul li .sub-menu-arrow").removeClass(
      "flip"
    );
  });
  $(".sub-menu-arrow").click(function () {
    $(this).toggleClass("flip");
    $(this).next("ul").toggleClass("menu-open");
  });
  $(
    ".site-header .main-navigation ul li.menu-item-type-custom.menu-item-has-children a"
  ).click(function () {
    $(this).parent().find(".sub-menu-arrow").toggleClass("flip");
    $(this).parent().find("ul").toggleClass("menu-open");
    // $(".mobile-menu-overlay").fadeIn(500);
  });

  // FAQ
  $(".faq-main ul li .question").on("click", function () {
    // Get next element
    $(this).toggleClass("open");
    $(this).next().slideToggle(300);
  });
  // Home Slider
  const homeSlider = new Swiper(".hero-banner .carousel", {
    slidesPerView: 1,
    // spaceBetween: 30,
    loop: true,
    speed: 1500,
    autoplay: {
      delay: 5000,
    },
    pagination: {
      el: ".hero-banner .swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".hero-banner .swiper-button-next",
      prevEl: ".hero-banner .swiper-button-prev",
    },
  });

  // Social Share
  let shares_single_el = $(
    '.share a:not(".prevent_popup"):not(.printfriendly a)'
  );
  // Events
  shares_single_el.click(function (e) {
    e.preventDefault();
    let href = $(this).attr("href");
    let title = $(this).attr("title");
    PopupCenter(href, title, 500, 300);
  });
  function PopupCenter(url, title, w, h) {
    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft =
      window.screenLeft != undefined ? window.screenLeft : screen.left;
    var dualScreenTop =
      window.screenTop != undefined ? window.screenTop : screen.top;

    var width = window.innerWidth
      ? window.innerWidth
      : document.documentElement.clientWidth
      ? document.documentElement.clientWidth
      : screen.width;
    var height = window.innerHeight
      ? window.innerHeight
      : document.documentElement.clientHeight
      ? document.documentElement.clientHeight
      : screen.height;

    var left = width / 2 - w / 2 + dualScreenLeft;
    var top = height / 2 - h / 2 + dualScreenTop;
    var newWindow = window.open(
      url,
      title,
      "scrollbars=yes, width=" +
        w +
        ", height=" +
        h +
        ", top=" +
        top +
        ", left=" +
        left
    );

    // Puts focus on the newWindow
    if (window.focus) {
      newWindow.focus();
    }
  }

  // Recipes
  $(".recipe-content .left-content .ingredients ul li").on(
    "click",
    function () {
      // Get next element
      $(this).toggleClass("selected");
      // $(this).siblings().removeClass("selected");
    }
  );

  const step = document.querySelectorAll(
    ".recipe-content .left-content .process .step"
  );
  step.forEach((el) => {
    if (el.innerText.trim() === "") {
      el.style.display = "none";
    }
  });

  // Recipes Search
  $(".top-bar input").keyup(function () {
    let value = $(this).val().toLowerCase();
    console.log(value);
    $(".all-recipes .recipe-item").each(function () {
      let itemText = $(this).attr("data-title").toLowerCase();
      if (itemText.indexOf(value) > -1) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });
});
