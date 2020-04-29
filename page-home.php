<?php //Template name: Home ?>
<?php get_header(); ?>  

  <section class="introduction">
    <a href="/shop" class="tag">
    <div class="container">
      <span class="button-noupe tag">Drop #1 Lançamento</span>
    </div>
    </a>
  </section>

  <section class="releases container">
    <h1 class="subtitle">Lançamentos</h1>
  </section>

  <?php  get_template_part('include/slide-products-home');?>

  <?php  get_template_part('include/all-products-home');?>

<?php get_footer(); ?>