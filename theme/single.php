<? get_header(); ?>

<main class="main">
<? get_template_part('template-parts/breadcrumbs') ?>

<section class="single-news">
  <div class="container">
      <h1 class="single-news__title small-title"><? the_title() ?></h1>
      <div class="page-top">
          <div class="row">
              <div class="col-lg-4 mb-4 mb-lg-0 order-2 order-lg-1">
                  <div class="page-top__info">
                      <h2 class="page-top__title">
                          <? the_field('page_top_title') ?>
                      </h2>
                  </div>
              </div>
              <div class="col-lg-8 order-1 order-lg-2">
                  <div class="page-top__image">
                      <? the_post_thumbnail('large') ?>
                  </div>
              </div>
          </div>
      </div>
      <? if (have_rows('content')) :
          while ( have_rows('content') ) : the_row();
          if( get_row_layout() == 'text_block' ) :
            $title = get_sub_field('title');
            $text_1 = get_sub_field('text_1');
            $text_2 = get_sub_field('text_2');
            $column_count = get_sub_field('column_count'); ?>
            <div class="single-news-content">
              <? if ($title ) : ?>
              <h2 class="single-news__title small-title"><?= $title ?></h2>
              <? endif ?>
              <div class="row">
                <? if ($column_count == 1) :  ?>
                  <div class="col-lg-9">
                    <?= $text_1 ?>
                  </div>
                <? else : ?>
                  <div class="col-lg-6 mb-3">
                    <?= $text_1 ?>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <?= $text_2 ?>
                  </div>
                <? endif ?>
              </div>
            </div>
          <? elseif( get_row_layout() == 'slider' ) : 
            $title = get_sub_field('title');
            $gallery = get_sub_field('gallery');
            ?>
              
            <div class="single-news-block">
              <? if ($title) : ?>
              <h2 class="single-news__title small-title"><?= $title ?></h2>
              <? endif ?>
              <? if (!empty($gallery)) :  ?>
              <div class="single-news-slider">
                <? foreach($gallery as $image) : ?>
                  <div class="single-news-slider__item">
                      <a href="<?= $image['url'] ?>" data-fancybox="gallery"><img src="<?= $image['sizes']['medium_large'] ?>" alt="<?= $image['alt'] ?>" /></a>
                  </div>
                <? endforeach ?>
              </div>
              <? endif ?>
            </div>
          <? endif;
          endwhile;
      endif;   ?>
    
      
  </div>
</section>

<? $relative = get_field("relative");
if (!empty($relative)) :  ?>
<section class="other-news">
  <div class="container">
      <h2 class="other-news__title small-title"><? the_field('relative_title')  ?></h2>
      <div class="row">
        <? foreach ($relative as $post) :
          setup_postdata( $post ); ?>
          <div class="col-lg-4 col-sm-6 mb-4">
              <a href="<? the_permalink() ?>" class="news-item">
                  <? the_post_thumbnail( 'medium_large', ['class'=>'news-item__thumb'] ) ?>
                  <p class="news-item__title"><? the_title() ?></p>
                  <div class="news-item__excerpt">
                      <? the_excerpt(  ) ?>
                  </div>
                  <div class="news-item__date"><?= get_the_date('d.m.Y') ?></div>
              </a>
          </div>
          <? endforeach;
          wp_reset_postdata() ?>
      </div>
  </div>
</section>
<? endif ?>
</main>

<?php

get_footer();
