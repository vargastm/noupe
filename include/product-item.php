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
      <span class="button">Ver Produto</span>
    </div>
  </a>
</li>