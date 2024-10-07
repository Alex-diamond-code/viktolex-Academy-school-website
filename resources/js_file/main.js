/**
 * Mobile nav toggle
 */
const mobileNavToggleBtn = document.querySelector(".mobile-nav-toggle");

function mobileNavToogle() {
  document.querySelector("body").classList.toggle("mobile-nav-active");
  mobileNavToggleBtn.classList.toggle("bi-list");
  mobileNavToggleBtn.classList.toggle("bi-x");
}
mobileNavToggleBtn.addEventListener("click", mobileNavToogle);

/**
 * Hide mobile nav on same-page/hash links
 */
document.querySelectorAll("#navmenu a").forEach((navmenu) => {
  navmenu.addEventListener("click", () => {
    if (document.querySelector(".mobile-nav-active")) {
      mobileNavToogle();
    }
  });
});

/**
 * Toggle mobile nav dropdowns
 */
document.querySelectorAll(".navmenu .toggle-dropdown").forEach((navmenu) => {
  navmenu.addEventListener("click", function (e) {
    if (document.querySelector(".mobile-nav-active")) {
      e.preventDefault();
      this.parentNode.classList.toggle("active");
      this.parentNode.nextElementSibling.classList.toggle("dropdown-active");
      e.stopImmediatePropagation();
    }
  });
});

/**
 * Initiate Pure Counter
 */
document.addEventListener("DOMContentLoaded", () => {
  const counters = document.querySelectorAll(".number");
  counters.forEach((counter) => {
    counter.innerText = "0";

    const updateCounter = () => {
      const target = +counter.getAttribute("data-target");
      const count = +counter.innerText;

      const increment = target / 200;

      if (count < target) {
        counter.innerText = `${Math.ceil(count + increment)}`;
        setTimeout(updateCounter, 5);
      } else {
        counter.innerText = target;
      }
    };

    updateCounter();
  });
});

/**
 * Animation on scroll function and init
 */
function aosInit() {
  AOS.init({
    duration: 600,
    easing: "ease-in-out",
    once: true,
    mirror: false,
  });
}
window.addEventListener("load", aosInit);

// preloader
const preloader = document.querySelector("#preloader");
if (preloader) {
  window.addEventListener("load", () => {
    preloader.remove();
  });
}

/**
 * Scroll top button
 */
let scrollTop = document.querySelector(".scroll-top");

function toggleScrollTop() {
  if (scrollTop) {
    window.scrollY > 100
      ? scrollTop.classList.add("active")
      : scrollTop.classList.remove("active");
  }
}
scrollTop.addEventListener("click", (e) => {
  e.preventDefault();
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});

window.addEventListener("load", toggleScrollTop);
document.addEventListener("scroll", toggleScrollTop);

/**
 * Init swiper sliders
 */
function initSwiper() {
  document.querySelectorAll(".swiper").forEach(function (swiper) {
    let config = JSON.parse(
      swiper.querySelector(".swiper-config").innerHTML.trim()
    );
    new Swiper(swiper, config);
  });
}
window.addEventListener("load", initSwiper);




// form validation for contact form
let name = document.querySelector("#name");
