document.addEventListener("DOMContentLoaded", function () {
  // ===== ページトップへ戻る =====
  const topBtn = document.querySelector('.js-totop');

  if (topBtn) {
    // 初期状態を非表示に
    // topBtn.style.opacity = '0';
    // topBtn.style.pointerEvents = 'none';
    // topBtn.style.transition = 'opacity 0.3s ease-in-out, transform 0.3s ease-in-out';

    // スクロールイベントの追加
    // window.addEventListener('scroll', () => {
    //   if (window.scrollY > 70) {
    //     topBtn.style.opacity = '1';
    //     topBtn.style.pointerEvents = 'auto';
    //   } else {
    //     topBtn.style.opacity = '0';
    //     topBtn.style.pointerEvents = 'none';
    //   }
    // });

    // クリックイベント
    topBtn.addEventListener('click', function (event) {
      event.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }


  // ===== ハンバーガーメニュー =====
  // ===== 初期要素取得 =====
  function getHamburgerElements() {
    return {
      hamburger: document.querySelector(".js-hamburger"),
      drawer: document.querySelector(".js-drawer"),
      header: document.querySelector(".js-header"),
      drawerLinks: document.querySelectorAll(".js-drawer a[href]"),
    };
  }

  function closeHamburgerMenu(elements) {
    const { hamburger, drawer } = elements;

    // フォーカスをハンバーガーボタンに戻す
    hamburger.focus();

    document.body.classList.remove("is-noscroll");
    hamburger.classList.remove("is-open");
    drawer.classList.remove("is-open");
    hamburger.setAttribute("aria-expanded", "false");
    hamburger.setAttribute("aria-label", "メニューを開く");

    // inert 属性でアクセシビリティを確保
    drawer.setAttribute("inert", "");
    drawer.removeAttribute("aria-hidden");
  }

  function openHamburgerMenu(elements) {
    const { hamburger, drawer } = elements;

    document.body.classList.add("is-noscroll");
    hamburger.classList.add("is-open");
    drawer.classList.add("is-open");
    hamburger.setAttribute("aria-expanded", "true");
    hamburger.setAttribute("aria-label", "メニューを閉じる");

    // inert 属性を解除
    drawer.removeAttribute("inert");
    drawer.setAttribute("aria-hidden", "false");
  }

  function initHamburgerMenu() {
    const elements = getHamburgerElements();
    const { hamburger, drawer, drawerLinks } = elements;

    if (hamburger && drawer) {
      // ハンバーガーボタンのクリックイベント
      hamburger.addEventListener("click", function () {
        const isOpen = drawer.classList.contains("is-open");
        if (isOpen) {
          closeHamburgerMenu(elements);
        } else {
          openHamburgerMenu(elements);
        }
      });

      // ドロワー全体をクリックした場合に閉じる
      drawer.addEventListener("click", function () {
        closeHamburgerMenu(elements);
      });

      // ドロワー内のリンクをクリックした場合に閉じる
      drawerLinks.forEach(link => {
        link.addEventListener("click", function () {
          closeHamburgerMenu(elements);
        });
      });
    }
  }

  initHamburgerMenu();

  // ===== ページ内リンクのスムーススクロール =====
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener("click", function (event) {
      event.preventDefault();
      const headerHeight = document.querySelector(".js-header").offsetHeight;
      const href = anchor.getAttribute("href");
      const target = href === "#" || href === "" ? document.documentElement : document.querySelector(href);

      if (target) {
        const position = target.offsetTop - headerHeight;
        window.scrollTo({ top: position, behavior: "smooth" });
      }
    });
  });

  // ===== リクルートブロック =====
  setUpAccordion();

});

// ===== リクルートブロックの開閉アニメーション =====
const setUpAccordion = () => {
  const details = document.querySelectorAll(".js-details");
  const RUNNING_VALUE = "running";
  const IS_OPENED_CLASS = "is-opened";

  details.forEach((element) => {
    const summary = element.querySelector(".js-summary");
    const content = element.querySelector(".js-content");

    element.dataset.animStatus = "";

    summary.addEventListener("click", (event) => {
      event.preventDefault();

      if (element.dataset.animStatus === RUNNING_VALUE) return;

      if (element.open) {
        element.classList.remove(IS_OPENED_CLASS);

        const closingAnim = content.animate(closingAnimKeyframes(content), animTiming);
        element.dataset.animStatus = RUNNING_VALUE;

        closingAnim.onfinish = () => {
          element.removeAttribute("open");
          element.dataset.animStatus = "";
        };
      } else {
        element.setAttribute("open", "true");
        element.classList.add(IS_OPENED_CLASS);
        const openingAnim = content.animate(openingAnimKeyframes(content), animTiming);
        element.dataset.animStatus = RUNNING_VALUE;

        openingAnim.onfinish = () => {
          element.dataset.animStatus = "";
        };
      }
    });
  });
};

const animTiming = { duration: 400, easing: "ease-out" };

const closingAnimKeyframes = (content) => [
  { height: content.offsetHeight + "px", opacity: 1 },
  { height: 0, opacity: 0 }
];

const openingAnimKeyframes = (content) => [
  { height: 0, opacity: 0 },
  { height: content.offsetHeight + "px", opacity: 1 }
];
