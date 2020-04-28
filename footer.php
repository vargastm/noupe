<?php wp_footer(); ?>

<footer class="footer">
  <div class="container">
    <div>
      <a href="/"><img src="<?= get_images_uri(); ?>/noupe.svg" alt="Noupe"/></a>
      <a href="#"><i class="fab fa-facebook-square"></i></a>
      <a href="https://www.instagram.com/use.noupe/" target="_blank"><i class="fab fa-instagram"></i></a>
    </div>
    <form class="promotions">
      <label for="promotions">Receba Promoções</label>
      <div class="button-singup">
        <input type="text" id="email" placeholder="Inscreva-se">
        <button><i class="right-arrow"></i></button>
      </div>
    </form>
  </div>
  <div class="footer-copy">
    <div class="container">
      <img src="<?= get_images_uri(); ?>/n-logo.svg" alt="Noupe"/>
      <small> &copy; <?= date('Y'); ?> - NOUPE | CNPJ: 35.597.838/0001-99</small>
    </div>
  </div>
</footer>
<script src="<?= get_template_directory_uri(); ?>/assets/js/slide.js"></script>
<script src="<?= get_template_directory_uri(); ?>/assets/js/script.js"></script>
</body>
</html> 