!function(){"use strict";const e=(e,t=!1)=>(e=e.trim(),t?[...document.querySelectorAll(e)]:document.querySelector(e)),t=(t,o,i,s=!1)=>{let l=e(o,s);l&&(s?l.forEach(e=>e.addEventListener(t,i)):l.addEventListener(t,i))},o=(e,t)=>{e.addEventListener("scroll",t)};let i=e("#navbar .scrollto",!0);const s=()=>{let t=window.scrollY+200;i.forEach(o=>{if(!o.hash)return;let i=e(o.hash);i&&(t>=i.offsetTop&&t<=i.offsetTop+i.offsetHeight?o.classList.add("active"):o.classList.remove("active"))})};window.addEventListener("load",s),o(document,s);const l=t=>{let o=e("#header"),i=o.offsetHeight;o.classList.contains("header-scrolled")||(i-=16);let s=e(t).offsetTop;window.scrollTo({top:s-i,behavior:"smooth"})};let a=e("#header");if(a){let e=a.offsetTop,t=a.nextElementSibling;const i=()=>{e-window.scrollY<=0?(a.classList.add("fixed-top"),t.classList.add("scrolled-offset")):(a.classList.remove("fixed-top"),t.classList.remove("scrolled-offset"))};window.addEventListener("load",i),o(document,i)}let n=e(".back-to-top");if(n){const e=()=>{window.scrollY>100?n.classList.add("active"):n.classList.remove("active")};window.addEventListener("load",e),o(document,e)}t("click",".mobile-nav-toggle",function(t){e("#navbar").classList.toggle("navbar-mobile"),this.classList.toggle("bi-list"),this.classList.toggle("bi-x")}),t("click",".navbar .dropdown > a",function(t){e("#navbar").classList.contains("navbar-mobile")&&(t.preventDefault(),this.nextElementSibling.classList.toggle("dropdown-active"))},!0),t("click",".scrollto",function(t){if(e(this.hash)){t.preventDefault();let o=e("#navbar");if(o.classList.contains("navbar-mobile")){o.classList.remove("navbar-mobile");let t=e(".mobile-nav-toggle");t.classList.toggle("bi-list"),t.classList.toggle("bi-x")}l(this.hash)}},!0),window.addEventListener("load",()=>{window.location.hash&&e(window.location.hash)&&l(window.location.hash)});let r=e("#preloader");r&&window.addEventListener("load",()=>{r.remove()}),window.addEventListener("load",()=>{let o=e(".portfolio-container");if(o){let i=new Isotope(o,{itemSelector:".portfolio-item"}),s=e("#portfolio-flters li",!0);t("click","#portfolio-flters li",function(e){e.preventDefault(),s.forEach(function(e){e.classList.remove("filter-active")}),this.classList.add("filter-active"),i.arrange({filter:this.getAttribute("data-filter")}),i.on("arrangeComplete",function(){AOS.refresh()})},!0)}});GLightbox({selector:".portfolio-lightbox"});new Swiper(".portfolio-details-slider",{speed:400,loop:!0,autoplay:{delay:5e3,disableOnInteraction:!1},pagination:{el:".swiper-pagination",type:"bullets",clickable:!0}}),window.addEventListener("load",()=>{AOS.init({duration:1e3,easing:"ease-in-out",once:!0,mirror:!1})})}();