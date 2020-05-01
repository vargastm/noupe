<?php 
  $products_new = wc_get_products ([
    'limit' => 8,
    'meta_key' => 'total_sales',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
  ]);

  $data['releases'] = format_products($products_new, 'product');
?>

<section class="all-products">
  <div class="container">
    <h1 class="subtitle">Todos os Produtos</h1>
    <ul class="products-list">
      <?php 
        foreach($data['releases'] as $product) { 
          set_query_var( 'product', $product );
          get_template_part('include/product-item');
        } 
      ?>
    </ul>
    <a href="/shop" class="button-noupe">Ver Mais</a>
  </div>
</section>