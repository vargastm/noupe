<?php get_header(); ?>

<?php if (have_posts()) { while (have_posts()) { the_post(); ?>

<main class="container container-index">
  <h1 class="subtitle"><?php the_title(); ?></h1>
  <?php the_content(); ?>
</main>


<?php } }?>

<?php get_footer(); ?>