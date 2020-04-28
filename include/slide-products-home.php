<?php 
  $products_new = wc_get_products ([
    'limit' => 12,
    'tag' => ['drop1'],
  ]);

  $data['slide'] = format_products($products_new, 'slide');
?>

<section class="slide-wrapper">
    <ul class="slide products-list">
      <button class="slide-button"><img src="<?= get_images_uri(); ?>/leftarrow.svg"></button>
      <?php 
        foreach($data['slide'] as $product) { 
          set_query_var( 'product', $product );
          get_template_part('include/product-item');
        } 
      ?>
      <button class="slide-button"><img src="<?= get_images_uri(); ?>/rightarrow.svg"></button>
    </ul>
</section>