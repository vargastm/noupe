<?php 

  function noupe_add_woocommerce_support() {
    add_theme_support('woocommerce');
  }

  add_action('after_setup_theme', 'noupe_add_woocommerce_support');

  function noupe_css() {
    wp_register_style('noupe-style', get_template_directory_uri() . '/style.css', [], '1.0.0');
    wp_enqueue_style('noupe-style');
  }

  add_action('wp_enqueue_scripts', 'noupe_css');

  function noupe_custom_images() {
    add_image_size('product', 279, 399, ['center', 'center']);
    add_image_size('slide', 344, 447, ['center', 'center']);
    update_option('medium_crop', 1);
  }

  add_action('after_setup_theme', 'noupe_custom_images');

  function noupe_loop_shop_per_page() {
    return 6;
  }

  add_filter('loop_shop_per_page', 'noupe_loop_shop_per_page');

  function format_products($products, $img_size) {
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

  function get_images_uri(){
    return get_template_directory_uri() . '/assets/images';
  }

