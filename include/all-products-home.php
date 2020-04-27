<?php function format_products($products, $img_size) {
  $products_final = [];
  foreach($products as $product) {
    $products_final[] = [
      'name' => $product -> get_name(),
      'price' => $product -> get_price_html(),
      'link' => $product -> get_permalink(),
      'sku' => $product -> get_sku(),
      'img' => wp_get_attachment_image_src($product -> get_image_id(), $img_size)[0],
    ];
  }
  return $products_final;
}

$products_new = wc_get_products ([
  'limit' => 8,
  'orderby' => 'date',
  'order' => 'DESC',
]);

$data = [];
$data['slide'] = format_products($products_new, 'slide');
$data['releases'] = format_products($products_new, 'product');

$img_url = get_stylesheet_directory_uri() . '/assets/images';

?>

<section class="slide-wrapper">
    <ul class="slide products-list">
      <button class="slide-button"><img src="<?= $img_url ?>/leftarrow.svg"></button>
      <?php foreach($data['slide'] as $product) { ?>
      <li class="product-item">
        <a href="<?= $product['link']; ?>">
          <div class="product-info">
            <?php if($product['sku']) { ?>
              <span class="sku"><?= $product['sku']; ?></span>
            <?php } else {?> <span class="sku">noupe</span>
            <?php } ?>
            
            <img src="<?= $product['img']; ?>" alt="<?= $product['name']; ?>">
            <div class="product-price">
              <h2><?= $product['name']; ?> <span><?= $product['price']; ?></span></h2>
            </div>
          </div>
          <div class="product-overlay">
            <?php if($product['sku']) { ?>
              <span class="sku"><?= $product['sku']; ?></span>
            <?php }  else {?> <span class="sku">noupe</span>
            <?php } ?>
            <div>
              <h2><?= $product['name']; ?></h2>
              <span class="product-price"><?= $product['price']; ?></span>
            </div>
            <span class="button">Comprar</span>
          </div>
        </a>
      </li>
      <?php } ?>
      <button class="slide-button"><img src="<?= $img_url ?>/rightarrow.svg"></button>
    </ul>
</section>

<section class="all-products">
  <div class="container">
    <h1 class="subtitle">Todos os Produtos</h1>
    <ul class="products-list">
      <?php foreach($data['releases'] as $product) { ?>
      <li class="product-item">
        <a href="<?= $product['link']; ?>">
          <div class="product-info">
            <?php if($product['sku']) { ?>
              <span class="sku"><?= $product['sku']; ?></span>
            <?php } else {?> <span class="sku">noupe</span>
            <?php } ?>
            
            <img src="<?= $product['img']; ?>" alt="<?= $product['name']; ?>">
            <div class="product-price">
              <h2><?= $product['name']; ?> <span><?= $product['price']; ?></span></h2>
            </div>
          </div>
          <div class="product-overlay">
            <?php if($product['sku']) { ?>
              <span class="sku"><?= $product['sku']; ?></span>
            <?php }  else {?> <span class="sku">noupe</span>
            <?php } ?>
            <div>
              <h2><?= $product['name']; ?></h2>
              <span class="product-price"><?= $product['price']; ?></span>
            </div>
            <span class="button">Comprar</span>
          </div>
        </a>
      </li>
      <?php } ?>
    </ul>
    <a href="#" class="button">Carregar Mais</a>
  </div>
</section>