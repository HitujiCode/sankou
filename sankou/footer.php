<footer class="footer layout-footer">
  <div class="footer__inner inner">
    <div class="footer__container">
      <a href="<?php echo home_url(); ?>" class="footer__logo">
        <img src="<?php img_path('logo-sankouunyu.svg'); ?>" alt="" width="1440" height="800">
      </a>
      <address class="footer__info">
        <p class="footer__info-address">〒791-8014 愛媛県松山市山越町416番地1</p>
        <p class="footer__info-contact">Tel. 089-925-1041　Fax. 089-926-0888</p>
      </address>
      <div class="footer__copyright">
        <small>
          © <span class="upper">sankou unyu</span> All Rights Reserved.
        </small>
      </div>
    </div>
    <div class="footer__totop">
      <button class="totop js-totop">
        <img src="<?php img_path('totop.svg'); ?>" alt="" width="1440" height="800" loading="lazy" />
      </button>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>