document.addEventListener("DOMContentLoaded",(function(){const e=document.querySelector(".js-totop");function t(e){const{hamburger:t,drawer:n}=e;t.focus(),document.body.classList.remove("is-noscroll"),t.classList.remove("is-open"),n.classList.remove("is-open"),t.setAttribute("aria-expanded","false"),t.setAttribute("aria-label","メニューを開く"),n.setAttribute("inert",""),n.removeAttribute("aria-hidden")}e&&e.addEventListener("click",(function(e){e.preventDefault(),window.scrollTo({top:0,behavior:"smooth"})})),function(){const e={hamburger:document.querySelector(".js-hamburger"),drawer:document.querySelector(".js-drawer"),header:document.querySelector(".js-header"),drawerLinks:document.querySelectorAll(".js-drawer a[href]")},{hamburger:n,drawer:i,drawerLinks:o}=e;n&&i&&(n.addEventListener("click",(function(){i.classList.contains("is-open")?t(e):function(e){const{hamburger:t,drawer:n}=e;document.body.classList.add("is-noscroll"),t.classList.add("is-open"),n.classList.add("is-open"),t.setAttribute("aria-expanded","true"),t.setAttribute("aria-label","メニューを閉じる"),n.removeAttribute("inert"),n.setAttribute("aria-hidden","false")}(e)})),i.addEventListener("click",(function(){t(e)})),o.forEach((n=>{n.addEventListener("click",(function(){t(e)}))})))}(),document.querySelectorAll('a[href^="#"]').forEach((function(e){e.addEventListener("click",(function(t){t.preventDefault();const n=document.querySelector(".js-header").offsetHeight,i=e.getAttribute("href"),o="#"===i||""===i?document.documentElement:document.querySelector(i);if(o){const e=o.offsetTop-n;window.scrollTo({top:e,behavior:"smooth"})}}))})),setUpAccordion()}));const setUpAccordion=()=>{const e=document.querySelectorAll(".js-details"),t="running",n="is-opened";e.forEach((e=>{const i=e.querySelector(".js-summary"),o=e.querySelector(".js-content");e.dataset.animStatus="",i.addEventListener("click",(i=>{if(i.preventDefault(),e.dataset.animStatus!==t)if(e.open){e.classList.remove(n);const i=o.animate(closingAnimKeyframes(o),animTiming);e.dataset.animStatus=t,i.onfinish=()=>{e.removeAttribute("open"),e.dataset.animStatus=""}}else{e.setAttribute("open","true"),e.classList.add(n);const i=o.animate(openingAnimKeyframes(o),animTiming);e.dataset.animStatus=t,i.onfinish=()=>{e.dataset.animStatus=""}}}))}))},animTiming={duration:400,easing:"ease-out"},closingAnimKeyframes=e=>[{height:e.offsetHeight+"px",opacity:1},{height:0,opacity:0}],openingAnimKeyframes=e=>[{height:0,opacity:0},{height:e.offsetHeight+"px",opacity:1}];