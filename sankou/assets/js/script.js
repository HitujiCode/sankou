document.addEventListener("DOMContentLoaded",(function(){const e=document.querySelector(".js-totop");function t(e){const{hamburger:t,drawer:r}=e;t.focus(),document.body.classList.remove("is-noscroll"),t.classList.remove("is-open"),r.classList.remove("is-open"),t.setAttribute("aria-expanded","false"),t.setAttribute("aria-label","メニューを開く"),r.setAttribute("inert",""),r.removeAttribute("aria-hidden")}e&&e.addEventListener("click",(function(e){e.preventDefault(),window.scrollTo({top:0,behavior:"smooth"})})),function(){const e={hamburger:document.querySelector(".js-hamburger"),drawer:document.querySelector(".js-drawer"),header:document.querySelector(".js-header"),drawerLinks:document.querySelectorAll(".js-drawer a[href]")},{hamburger:r,drawer:o,drawerLinks:n}=e;r&&o&&(r.addEventListener("click",(function(){o.classList.contains("is-open")?t(e):function(e){const{hamburger:t,drawer:r}=e;document.body.classList.add("is-noscroll"),t.classList.add("is-open"),r.classList.add("is-open"),t.setAttribute("aria-expanded","true"),t.setAttribute("aria-label","メニューを閉じる"),r.removeAttribute("inert"),r.setAttribute("aria-hidden","false")}(e)})),o.addEventListener("click",(function(){t(e)})),n.forEach((r=>{r.addEventListener("click",(function(){t(e)}))})))}(),document.addEventListener("scroll",(function(){const e=document.querySelector(".js-header");(window.scrollY||document.documentElement.scrollTop)>0?e.classList.add("is-scroll"):e.classList.remove("is-scroll")})),document.querySelectorAll('a[href^="#"]').forEach((function(e){e.addEventListener("click",(function(t){t.preventDefault();const r=document.querySelector(".js-header").offsetHeight,o=e.getAttribute("href"),n="#"===o||""===o?document.documentElement:document.querySelector(o);if(n){const e=n.offsetTop-r;window.scrollTo({top:e,behavior:"smooth"})}}))}))}));