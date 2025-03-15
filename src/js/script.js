document.addEventListener("DOMContentLoaded", function () {
  // ===== ページトップへ戻る =====
  const topBtn = document.querySelector('.js-totop');
  if (topBtn) {
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

  // ===== スクロールしたらヘッダーにクラス付与 =====
  document.addEventListener('scroll', function () {
    const header = document.querySelector('.js-header');
    const scrollTop = window.scrollY || document.documentElement.scrollTop;

    if (scrollTop > 0) {
      header.classList.add('is-scroll');
    } else {
      header.classList.remove('is-scroll');
    }
  });

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
});