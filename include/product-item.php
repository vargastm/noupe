<li class="product-item">
  <div class="product-wrap">
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
        <a href="<?= $product['link']; ?>" class="button-noupe">Ver Produto</a>
      </div>
  </div>
</li>