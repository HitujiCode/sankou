<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <!-- 404ページの自動遷移 -->
  <?php if (is_404()) : ?>
    <meta http-equiv="refresh" content=" 5; url=<?php echo esc_url(home_url("/")); ?>">
  <?php endif; ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(''); ?>>
  <?php wp_body_open(); ?>

  <header class="header js-header">
    <div class="header__inner">
      <div class="header__logo">
        <a class="header__logo-link" href="/">
          <div class="header__logo-icon">
            <img src="<?php img_path('icon-logo.svg'); ?>" alt="ロゴ" width="143" height="135">
          </div>
          <h1 class="header__logo-company">
            <img src="<?php img_path('sankouunyu.svg'); ?>" alt="三光運輸株式会社" width="210" height="22">
          </h1>
        </a>
      </div>

      <?php
      $navItem = [
        [
          'label' => '私たちについて',
          'label_en' => 'Message',
          'link' => '#message',
        ],
        [
          'label' => 'サービス一覧',
          'label_en' => 'Service',
          'link' => '#service',
        ],
        [
          'label' => '会社概要',
          'label_en' => 'Company',
          'link' => '#company',
        ],
        [
          'label' => '採用情報',
          'label_en' => 'Recruit',
          'link' => '#recruit',
        ],
      ];
      ?>

      <nav class="header__nav">
        <ul class="header__nav-list">
          <?php foreach ($navItem as $item) : ?>
            <li class="header__nav-item">
              <a class="header__nav-link" href="<?php echo esc_url($item['link']); ?>"><?php echo esc_html($item['label']); ?></a>
            </li>
          <?php endforeach; ?>
          <li class="header__nav-item header__nav-item--contact">
            <a class="header__nav-contact button" href="#contact">お問い合わせ</a>
          </li>
        </ul>
      </nav>
      <button type="button" class="header__hamburger js-hamburger" aria-expanded="false" aria-label="メニューを開く"></button>
    </div>
    <div class="header__drawer js-drawer" aria-hidden="true">
      <div class="header__drawer-wrapper">
        <div class="header__drawer-inner inner">
          <nav class="header__drawer-nav">
            <ul class="header__drawer-list">
              <li class="header__drawer-item">
                <a href="" class="header__drawer-link">
                  トップ<span class="header__drawer-link-en">Top</span>
                </a>
              </li>
              <?php foreach ($navItem as $item) : ?>
                <li class="header__drawer-item">
                  <a class="header__drawer-link" href="<?php echo esc_url($item['link']); ?>"><?php echo esc_html($item['label']); ?><span class="header__drawer-link-en"><?php echo esc_html($item['label_en']); ?></span></a>
                </li>
              <?php endforeach; ?>
              <li class="header__drawer-item">
                <a class="header__drawer-contact" href="#contact">お問い合わせ<span class="header__drawer-contact-en">Contact</span></a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>