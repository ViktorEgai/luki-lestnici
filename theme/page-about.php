<? get_header() ?>
<main class="main">
  <? get_template_part('template-parts/breacrumbs') ?>
  <section class="about-hero">
    <div class="container">
      <h1 class="about-section__title small-title"><? the_title() ?></h1>
      <div class="about-hero__page-top page-top">
        <div class="row">
          <div class="col-lg-5 order-lg-1 order-2">
            <div class="page-top__info">
              <h2 class="page-top__title">
                <? the_field('page_top_text') ?>
              </h2>
            </div>
          </div>
          <div class="col-lg-7 order-lg-2 order-1">
            <? $page_top_image = get_field('page_top_image'); ?>
            <div class="page-top__image">
              <img src="<?= $page_top_image['sizes']['medium_large'] ?>" alt="<?= $page_top_image['alt'] ?>" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <? 
  $about_us_nav_title = get_field('about_us_nav_title');
  $about_us_text = get_field('about_us_text');
  $advantages_nav_title = get_field('advantages_nav_title');
  $advantages_title = get_field('advantages_title');
  $bonuses_nav_title = get_field('bonuses_nav_title');
  $bonuses_title = get_field('bonuses_title');
  $objects_nav_title = get_field('objects_nav_title');
  $objects_title = get_field('objects_title');
  $partners_nav_title = get_field('partners_nav_title');
  $partners_title = get_field('partners_title');
  $partners = get_field('partners');
  $sertificates_nav_title = get_field('sertificates_nav_title');
  $sertificates_title = get_field('sertificates_title');
  $sertificates_text = get_field('sertificates_text');
  $sertificates = get_field('sertificates');
  $requisites_nav_title = get_field('requisites_nav_title');
  $requisites_title = get_field('requisites_title');
  ?>
  <section class="about-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 d-none d-lg-block">
          <ul class="about-nav">
            <? if ($about_us_nav_title) : ?>
            <li class="about-nav__item">
              <a href="#about-us"><?= $about_us_nav_title ?></a>
            </li>
            <? endif;
            if ($advantages_nav_title) : ?>
            <li class="about-nav__item">
              <a href="#advantages"><?= $advantages_nav_title ?></a>
            </li>
            <? endif;
            if ($bonuses_nav_title) : ?>
            <li class="about-nav__item">
              <a href="#bonuses"><?= $bonuses_nav_title ?></a>
            </li>
            <? endif;
            if ($objects_nav_title) : ?>
            <li class="about-nav__item">
              <a href="#objects"><?= $objects_nav_title ?></a>
            </li>
            <? endif;
            if ($partners_nav_title) : ?>
            <li class="about-nav__item">
              <a href="#partners"><?= $partners_nav_title ?></a>
            </li>
            <? endif;
            if ($sertificates_nav_title) : ?>
            <li class="about-nav__item">
              <a href="#sertificates"><?= $sertificates_nav_title ?></a>
            </li>
            <? endif;
            if ($requisites_nav_title) : ?>
            <li class="about-nav__item">
              <a href="#requisites"><?= $requisites_nav_title ?></a>
            </li>
            <? endif ?>
          </ul>
        </div>
        <div class="col-lg-9">
          <div class="about-us about-section__block" id="about-us">
            <? if ($about_us_text) :  ?>
            <div class="about-section__text">
              <?= $about_us_text ?>
            </div>
            <? endif ?>
            <? if (have_rows('about_us_nums')) : ?>
            <div class="about-us-numbers">
              <? while (have_rows('about_us_nums')) : the_row();
              $num = get_sub_field('num');
              $text = get_sub_field('text');
               ?>
              
              <div class="about-us-numbers__item">
                <div class="about-us-numbers__item-num"><?= $num ?></div>
                <p>
                  <?= $text ?>
                </p>
              </div>
              <? endwhile ?>
            </div>
            <? endif ?>
          </div>
          <div class="about-section__block" id="advantages">
            <h3 class="about-section__title small-title"><?= $advantages_title ?></h3>
            <? if ( have_rows('advantages')) :  ?>
            <div class="hero-bullets">
              <? while ( have_rows('advantages')) : the_row();
              $icon = get_sub_field('icon');
              $text = get_sub_field('text');
              ?>
              <div class="hero-bullets__item">
                <?= $icon['url'] ? '<img src="'. $icon['url'] .'" alt="" class="svg">' : '' ?>
                <p>
                  <?= $text ?>
                </p>
              </div>
                <? endwhile ?>
            </div>
            <? endif ?>
          </div>
          <div class="about-section__block" id="bonuses">
            <h3 class="about-section__title small-title"><?= $bonuses_title ?></h3>
            <? if ( have_rows('bonuses')) :  ?>

            <div class="about-bonuses-grid">
            <? while ( have_rows('bonuses')) : the_row();
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $image = get_sub_field('image');
            ?>
              <div class="about-bonuses-grid__item">
                <div class="about-bonuses-grid__item-title"><?= $title ?></div>
                <div class="about-bonuses-grid__item-text"><?= $text ?></div>
                <? if (!empty($image)) :
                  echo '<img src="'. $image['sizes']['medium_large'] .'" alt="'. $image['alt'] .'" class="about-bonuses-grid__item-image" />';                  
                endif?>                
              </div>
              <? endwhile ?>
            </div>
            <? endif ?>
          </div>
          <div class="about-section__block" id="objects">
            <h3 class="about-section__title small-title">
              <?= $objects_title ?>
            </h3>
            <? if ( have_rows('objects')) :  ?>

            <div class="about-objects-slider">
            <? while ( have_rows('objects')) : the_row();
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $image = get_sub_field('image');
            ?>

              <div class="about-objects-slider__item">
                <img src="<?= $image['sizes']['large'] ?>" alt="<?= $image['alt'] ?>" />
                <div class="about-objects-slider__info">
                  <div class="about-objects-slider__title"><?= $title ?></div>
                  <? if ($text):  ?>
                  <div class="about-objects-slider__text"><?= $text ?></div>
                  <? endif ?>
                </div>
              </div>
            <? endwhile ?>
            </div>
            <? endif ?>
          </div>
          <div class="about-section__block" id="partners">
            <h3 class="about-section__title small-title"><?= $partners_title ?></h3>
            <? if ($partners) : ?>
            <div class="about-partners row">
              <? foreach ( $partners as $image ) : ?>
              <div class="col-md-4 col-sm-6 mb-3">
                <div class="about-partners__item">
                  <img src="<?= $image['url'] ?>" alt="Логотип <?= $image['alt'] ?>" />
                </div>
              </div>
              <? endforeach ?>
            </div>
            <? endif ?>
          </div>
          <div class="about-section__block" id="sertificates">
            <h3 class="about-section__title small-title"><?= $sertificates_title ?></h3>
            <? if ($sertificates_text) : ?>
            <div class="about-section__text">
              <?= $sertificates_text ?>
            </div>
            <? endif ?>
            <? if ($sertificates):  ?>
            <div class="about-sertificates-wrapper">
              <div class="row">
              <? foreach ( $sertificates as $image ) : ?>

                <div class="col-lg-3 col-6 mb-3">
                  <a href="<?= $image['url']?>" class="about-sertificates-item" data-fancybox="gallery">
                    <img src="<?= $image['sizes']['medium_large']?>" alt="<?= $image['alt']?>" />
                  </a>
                </div>
              <? endforeach ?>

              </div>
            </div>
            <? endif ?>
          </div>
          <div class="about-section__block" id="requisites">
            <h3 class="about-section__title small-title"><?= $requisites_title ?></h3>

            <div class="about-requisites">
              <? if ( have_rows('requisites')) : ?>

              <div class="about-requisites__text">
              <? while ( have_rows('requisites')) : the_row();
              $title = get_sub_field('title');
              $text = get_sub_field('text');              
              ?>
                <strong><?= $title ?></strong> <br />
                <?= $text ?> <br /><br />
               
                <? endwhile ?>
              </div>
              <? endif ?>

              <? if (have_rows('social', 'options' )) : ?>
              <div class="about-social social">
                <? while (have_rows('social', 'options' )) : the_row();
                $icon = get_sub_field('icon');
                $link = get_sub_field('link');
                ?>

                <a href="<?= $link ?>" target="_blank" class="social__item">
                <img src="<?= $icon?>" class="svg" alt="">
                </a>
                <? endwhile ?>
              </div>
              <? endif ?>             
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <? get_template_part('template-parts/block/contacts') ?>
</main>
<? get_footer() ?>