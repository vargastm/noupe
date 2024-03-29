<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('name')?> <?php wp_title('|'); ?></title>
  <?php wp_head(); ?>
  <script src="https://kit.fontawesome.com/56f393793a.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/tiny-slider.css">
</head>
<body <?php body_class(); ?>>

<?php $cart_count = WC() -> cart -> get_cart_contents_count(); ?>

<header class="header">
  <div class="container">
    <div class="menu">
      <a href="/shop">T-Shirts</a>
    </div>
    <a href="/"><img src="<?= get_images_uri(); ?>/noupe.svg" alt="Noupe"/></a>
    <div class="account">
      <a href="/minha-conta" class="my-account">Conta</a>
      <a href="/carrinho" class="cart">Cart
        <span class="cart-count"><?= $cart_count ; ?></span>
      </a>
    </div>
    <div class="menu-mobile">
      <div class="menu">
        <a href="/shop">T-Shirts</a>
        <a href="/minha-conta" class="my-account">Conta</a>
        <a href="/carrinho" class="cart">Cart
          <span class="cart-count"><?= $cart_count ; ?></span>
        </a>
      </div>
    </div>
  </div>
</header>