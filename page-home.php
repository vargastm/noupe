<?php //Template name: Home ?>
<?php get_header(); ?>  

  <section class="introduction">
    <div class="container">
      <a href="#" class="button">Drop #1 Lançamento</a>
    </div>
  </section>

  <section class="releases container">
    <h1 class="subtitle">Lançamentos</h1>
  </section>

  <?php  get_template_part('include/all-products-home');?>

<?php get_footer(); ?>