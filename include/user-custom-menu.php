<?php
  function noupe_custom_menu($menu_links) {
    unset($menu_links['downloads']);

    return $menu_links;
  }
  add_filter('woocommerce_account_menu_items', 'noupe_custom_menu');

?>