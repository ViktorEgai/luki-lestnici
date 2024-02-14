<? get_header(); ?>

<main class="main">
  <? if ( have_rows('hero_slider')) :  ?>
    <section class="hero">
      <div class="container">
        <div class="hero-slider">
          <? while ( have_rows('hero_slider')) : the_row();
          $title = get_sub_field('title');
          $text = get_sub_field('text');
          $btn = get_sub_field('btn');
          $image = get_sub_field('image');
          $index = get_row_index();
          ?>
          
          <div class="hero-slider__item">
            <div class="row">
              <div class="col-lg-6 mb-4 mb-lg-0 order-lg-1 order-2">
                <div class="hero-slider__info">
                  <? if ($index == 1) : ?>
                  <h1 class="hero-slider__title section-title"><?= $title ?></h1>
                  <? else : ?>
                  <p class="hero-slider__title section-title"><?= $title ?></p>
                  <? endif ?>
                  <? if ( $text ) : ?>
                  <div class="hero-slider__text">
                    <?= $text ?>
                  </div>
                  <? endif ?>
                  <? if($btn) :  ?>
                  <a href="<?= $btn['url'] ?>" class="hero-slider__btn btn"
                    ><?= $btn['title'] ?>
                    <svg width="5" height="8" viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M0.211901 7.0156C0.0948336 6.89853 0.0947303 6.70876 0.21167 6.59156L2.73105 4.06669C2.8479 3.94958 2.8479 3.75999 2.73105 3.64288L0.21167 1.11801C0.0947304 1.00081 0.0948339 0.81104 0.211901 0.693973L0.693743 0.212132C0.8109 0.0949745 1.00085 0.0949747 1.11801 0.212132L4.54853 3.64265C4.66568 3.75981 4.66568 3.94976 4.54853 4.06692L1.11801 7.49744C1.00085 7.61459 0.8109 7.61459 0.693742 7.49744L0.211901 7.0156Z"
                        fill="white"
                      />
                    </svg>
                  </a>
                  <? endif ?>
                </div>
              </div>
              <div class="col-lg-6 mb-4 mb-lg-0 order-lg-2 order-1">
                <div class="hero-slider__image">
                  <img src="<?= $image['sizes']['medium_large'] ?>" alt="<?= $image['alt'] ?>" />
                </div>
              </div>
            </div>
          </div>
          <? endwhile ?>
        </div>
        <? if ( have_rows('advantages')) :  ?>
        <div class="hero-bullets">
          <? while ( have_rows('advantages')) : the_row();
          $icon = get_sub_field('icon');
          $text = get_sub_field('text');
          ?>
          <div class="hero-bullets__item">
            <?= $icon ? '<img src="'. $icon .'" alt="" class="svg">' : '' ?>
            <p>
              <?= $text ?>
            </p>
          </div>
            <? endwhile ?>
        </div>
        <? endif ?>
      </div>
    </section>
  <? endif ?>
  <section class="products">
    <? 
    $products = get_field('products');
    $products_link = get_field('products_link');
     ?>
    <div class="container">
      <h2 class="products__title section-title">
        <? the_field('products_title') ?>
      </h2>
      <? 
      if ($products) : 
      ?>
      <div class="row">
        <? foreach ($products as $post) :
          $id = $post -> ID ;
          $product = wc_get_product( $id );
          setup_postdata($post);
          ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
          <div class="products-item">
            <?  if ( $product->is_on_sale()) {
            echo ' <div class="products-item__sale">-'.apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ).'</div>';
          }  ?>
            <a href="#" class="products-item__favorite"
              ><svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M9.74367 3.26422C9.42123 3.57365 8.91211 3.57365 8.58967 3.26422L8.01267 2.7105C7.33731 2.06239 6.42495 1.66667 5.41667 1.66667C3.3456 1.66667 1.66667 3.3456 1.66667 5.41667C1.66667 7.40219 2.74149 9.04171 4.29313 10.3888C5.8461 11.737 7.70283 12.6312 8.8122 13.0876C9.04416 13.183 9.28917 13.183 9.52113 13.0876C10.6305 12.6312 12.4872 11.737 14.0402 10.3888C15.5918 9.04171 16.6667 7.40218 16.6667 5.41667C16.6667 3.3456 14.9877 1.66667 12.9167 1.66667C11.9084 1.66667 10.996 2.06239 10.3207 2.7105L9.74367 3.26422ZM9.16667 1.50798C8.19342 0.574004 6.87208 0 5.41667 0C2.42512 0 0 2.42512 0 5.41667C0 10.7235 5.80862 13.6542 8.17816 14.6289C8.8163 14.8914 9.51703 14.8914 10.1552 14.6289C12.5247 13.6542 18.3333 10.7235 18.3333 5.41667C18.3333 2.42512 15.9082 0 12.9167 0C11.4613 0 10.1399 0.574004 9.16667 1.50798Z"
                  fill="#6C7275"
                />
              </svg>
            </a>
            <a href="<?= get_permalink( $id ) ?>" class="products-item__thumb">
              <?= get_the_post_thumbnail( $id, 'medium_large' ) ?>
            </a>
            <a href="<?= get_permalink( $id ) ?>" class="products-item__title"><?= $product->get_title(); ?></a>
            <div class="products-item__price"><?= $product->get_price_html(); ?></div>
          </div>
        </div>
        <? endforeach; ?>
      </div>
      <?  wp_reset_postdata();
       endif ?>
      <? if ($products_link) : ?>
      <a href="<?= $products_link['url']?>" class="products__btn btn"
        ><?= $products_link['title'] ?>
        <svg width="5" height="8" viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M0.211901 7.0156C0.0948336 6.89853 0.0947303 6.70876 0.21167 6.59156L2.73105 4.06669C2.8479 3.94958 2.8479 3.75999 2.73105 3.64288L0.21167 1.11801C0.0947304 1.00081 0.0948339 0.81104 0.211901 0.693973L0.693743 0.212132C0.8109 0.0949745 1.00085 0.0949747 1.11801 0.212132L4.54853 3.64265C4.66568 3.75981 4.66568 3.94976 4.54853 4.06692L1.11801 7.49744C1.00085 7.61459 0.8109 7.61459 0.693742 7.49744L0.211901 7.0156Z"
            fill="white"
          />
        </svg>
      </a>
      <? endif ?>
    </div>
  </section>
  <? if ( get_field('reviews_visibility') ) : 
    $reviews_title = get_field('reviews_title');
    
    ?>
  <section class="reviews">
    <div class="container">
      <h2 class="reviews__title section-title"><?= $reviews_title ?></h2>

      <? get_template_part('template-parts/blocks/reviews-slider') ?>
    </div>
  </section>
  <? endif ?>
  <section class="about">
    <? 
    $about_title = get_field('about_title');
    $about_text = get_field('about_text');
    $about_btn = get_field('about_btn');
    $about_image = get_field('about_image');
    ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <div class="about__info">
            <h2 class="about__title section-title"><?= $about_title ?></h2>
            <? if ($about_text) : ?>
            <div class="about__text">
              <?= $about_text ?>
            </div>
            <? endif ?>
            <? if ($about_btn) : ?>
            <a href="<?= $about_btn['url']?>" class="about__btn btn"
              ><?= $about_btn['title'] ?>
              <svg width="5" height="8" viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M0.211901 7.0156C0.0948336 6.89853 0.0947303 6.70876 0.21167 6.59156L2.73105 4.06669C2.8479 3.94958 2.8479 3.75999 2.73105 3.64288L0.21167 1.11801C0.0947304 1.00081 0.0948339 0.81104 0.211901 0.693973L0.693743 0.212132C0.8109 0.0949745 1.00085 0.0949747 1.11801 0.212132L4.54853 3.64265C4.66568 3.75981 4.66568 3.94976 4.54853 4.06692L1.11801 7.49744C1.00085 7.61459 0.8109 7.61459 0.693742 7.49744L0.211901 7.0156Z"
                  fill="white"
                />
              </svg>
            </a>
            <? endif ?>
          </div>
        </div>
        <div class="col-lg-6 mb-4 mb-lg-0">
          <div class="about__right">
            <? if (have_rows('about_nums')) :  ?>
            <div class="about-nums">
              <? while (have_rows('about_nums')) : the_row();
              $num = get_sub_field('num');
              $text = get_sub_field('text');
              ?>
              <div class="about-nums__item">
                <div class="about-nums__item-num"><?= $num ?></div>
                <div class="about-nums__item-text"><?= $text ?></div>
              </div>
              <? endwhile ?>
            </div>
            <? endif ?>
            <? 
            if (!empty($about_image)):  ?>
            <div class="about__image">
              <?= '<img src="'. $about_image['sizes']['medium_large'] .'" alt="'. $about_image['alt'] .'" />'; ?>
            </div>
            <? endif ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <? 
  $categories = get_field('categories');
  if ($categories) :  ?>
  <section class="category-section">
    <div class="container">
      <div class="category-grid">
        <? foreach ($categories as $cat) : ?>
        <a href="<?= get_term_link($cat) ?>" class="category-grid-item">
          <div class="category-grid-item__title"><?= $cat-> name ?></div>
          <? if ($cat -> description) : ?>
          <div class="category-grid-item__text"><?= $cat -> description ?></div>
          <? endif ?>
          <div class="category-grid-item__next">
            Далее
            <svg width="5" height="8" viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M0.211901 7.0156C0.0948336 6.89853 0.0947303 6.70876 0.21167 6.59156L2.73105 4.06669C2.8479 3.94958 2.8479 3.75999 2.73105 3.64288L0.21167 1.11801C0.0947304 1.00081 0.0948339 0.81104 0.211901 0.693973L0.693743 0.212132C0.8109 0.0949745 1.00085 0.0949747 1.11801 0.212132L4.54853 3.64265C4.66568 3.75981 4.66568 3.94976 4.54853 4.06692L1.11801 7.49744C1.00085 7.61459 0.8109 7.61459 0.693742 7.49744L0.211901 7.0156Z"
                fill="#3A3A3A"
                fill-opacity="0.7"
              />
            </svg>
          </div>
          <? $thumb_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
          $cat_image = wp_get_attachment_url(  $thumb_id ); ?>
          <img src="<?= $cat_image ?>" alt="" class="category-grid-item__image" />
        </a>
       <? endforeach ?>
      </div>
    </div>
  </section>
  <? endif ?>

  <? get_template_part('template-parts/blocks/contacts') ?>

</main>

<? get_footer(); ?>
