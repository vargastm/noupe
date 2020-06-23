<?php get_header(); ?>

<?php 
  $products_new = wc_get_products ([
    'limit' => 4,
    'tag' => ['drop1'],
  ]);

  $data['related'] = format_products($products_new, 'product');
?>

<?php
  function format_single_product($id, $img_size = 'main_product') {
    $product = wc_get_product($id);

    $gallery_ids = $product -> get_gallery_attachment_ids();
    $gallery = [];
    if($gallery_ids) {
      foreach($gallery_ids as $img_id) {
        $gallery[] = wp_get_attachment_image_src($img_id, $img_size)[0];
      }
    }

    return [
      'id' => $id,
      'name' => $product -> get_name(),
      'price' => $product -> get_price_html(),
      'link' => $product -> get_permalink(),
      'sku' => $product -> get_sku(),
      'description' => $product -> get_description(),
      'img' => wp_get_attachment_image_src($product -> get_image_id(), $img_size)[0],
      'gallery' => $gallery,
    ];
  }
?>

<div class="container breadcrumb">
  <?php woocommerce_breadcrumb(['delimiter' => ' > ']) ?>
</div>

<div class="container notification">
  <?php wc_print_notices(); ?>
</div>
<main>
  <section class="container">
    <div class="product">
      <?php if(have_posts()): ?>
        <?php  while(have_posts()): ?>
          <?php the_post(); ?>
            <?php  $product_format = format_single_product(get_the_ID()); ?>
              <div class="product-gallery" data-gallery="gallery">
                  <div class="product-gallery-list">
                    <?php foreach($product_format['gallery'] as $img): ?>
                      <img data-gallery="list" src="<?= $img; ?>" alt="<?= $product_format['name'];?>">
                    <?php endforeach; ?>
                  </div>
                  <div class="product-gallery-main">
                      <img data-gallery="main" src="<?= $product_format['img'] ?>" alt="<?= $product_format['name'];?>">
                  </div>
              </div>
              <div class="product-detail">
                <small><?= $product_format['sku']; ?></small>
                <h1><?= $product_format['name'];?></h1>
                <p class="product-price"><?= $product_format['price'];?></p>
                <?php woocommerce_template_single_add_to_cart(); ?>
              </div>

      <?php endwhile; endif; ?>
    
    </div>

    <div class="product-description">
      <div class="col">
        <h4>Descrição</h4>
        <p><?= $product_format['description'];?></p>
      </div>
      <div class="col">
        <h4>Medidas</h4>
        <div class="table">
          <table>
            <thead> 
              <tr>
                <td><strong>Size</strong></td>
                <td><strong>Altura</strong></td>
                <td><strong>Largura</strong></td>
                <td><strong>Manga</strong></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                  <td>S</td>
                  <td>81</td>
                  <td>55</td>
                  <td>52</td>
              </tr>
              <tr>
                  <td>M</td>
                  <td>83</td>
                  <td>59</td>
                  <td>53</td>
              </tr>
              <tr>
                  <td>L</td>
                  <td>85</td>
                  <td>63</td>
                  <td>55</td>
              </tr>
              <tr>
                  <td>XL</td>
                  <td>87</td>
                  <td>67</td>
                  <td>56</td>
              </tr>
              <tr>
                  <td>XXL</td>
                  <td>89</td>
                  <td>71</td>
                  <td>57</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col">
        <h4>Compartilhar</h4>
        <ul>
          <li><a href="<?php the_permalink(); ?>"><i class="fab fa-facebook-square"></i></a></li>
          <li><a href="<?php the_permalink(); ?>"><i class="fab fa-instagram"></i></a></li>
          <li><a href="<?php the_permalink(); ?>"><i class="fab fa-twitter"></i></a></li>
          <li><a href="<?php the_permalink(); ?>"><i class="fab fa-pinterest"></i></a></li>
        </ul>
        <h4>Tags</h4>
        <?php 
            $current_tags = get_the_terms( get_the_ID(), 'product_tag' );

            if ( $current_tags && ! is_wp_error( $current_tags ) ) { 
                echo '<ul class="product_tags">';

                foreach ($current_tags as $tag) {
                    $tag_title = $tag->name; 
                    $tag_link = get_term_link( $tag );

                    echo '<li><a href="'.$tag_link.'">'.$tag_title.'</a></li>';
                }
                echo '</ul>';
            }
          ?>
      </div>
    </div>
  </section>
  <section class="related">
    <div class="container">
      <h1 class="subtitle">Relacionados</h1>
      <ul class="products-list">
        <?php 
          foreach($data['related'] as $product) { 
            set_query_var( 'product', $product );
            get_template_part('include/product-item');
          } 
        ?>
      </ul>
    </div>
  </section>
</main>

<?php get_footer();?>

