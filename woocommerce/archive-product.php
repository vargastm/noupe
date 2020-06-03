<?php get_header(); ?>

<?php 
  if(have_posts()) { 
    while(have_posts()) { 
      the_post();
      $products[] = wc_get_product(get_the_ID());
    } 
  }
  
  $data['products'] = format_products($products, 'slide');
?>

<div class="container breadcrumb">
  <?php woocommerce_breadcrumb(['delimiter' => ' > ']) ?>
</div>



<article class="container products-archive">
  <nav class="filters">
    <div class="filter">
      <h3 class="filter-title">Categorias</h3>
      <?php 
        wp_nav_menu([
          'menu' => 'categorias-interna',
          'menu_class' => 'filter-cat',
          'container' => false,
        ]);
      ?>
    </div>
    <div class="filter">
      <?php
        $attribute_taxonomies = wc_get_attribute_taxonomies();
        foreach($attribute_taxonomies as $attribute) {
          the_widget('WC_Widget_Layered_Nav', [
            'title' => $attribute -> attribute_label,
            'attribute' => $attribute -> attribute_name,
          ]);
        }
      ?>
    </div>
    <div class="filter">
      <h3 class="filter-title"> Preço</h3>
      <form class="filter-price">
        <div>
          <label for="min_price">De R$</label>
          <input require type="text" name="min_price" id="min_price" value="<?= $_GET['min_price'] ?>">
        </div>
        <div>
          <label for="max_price">Até R$</label>
          <input required type="text" name="max_price" id="max_price" value="<?= $_GET['max_price'] ?>">
        </div>
        <button type="submit">Filtrar</button>
      </form>
    </div>
  </nav>
  <main>
  <button class="button-filters button">Filtros</button>
    <?php if($data['products'][0]) { ?>
        <?php woocommerce_catalog_ordering(); ?>
        <section class="products-shop">
          <div>
            <ul class="products-list">
              <?php 
                foreach($data['products'] as $product) { 
                  set_query_var( 'product', $product );
                  get_template_part('include/product-item');
                } 
              ?>
            </ul>
          </div>
        </section>
      <?= get_the_posts_pagination(); ?> 
    <?php } else { ?>
      <p>Nenhum resultado para a sua busca</p>
    <?php } ?>
  </main>
</article>

<?php get_footer(); ?> 