<? get_header() ?>
<main class="main">
    <? get_template_part('template-parts/breadcrumbs') ?>

  <section class="contacts-top contacts-block">
    <div class="container">
      <div class="contacts-top-wrapper">
        <div class="d-flex justify-content-between align-item-center"><h1 class="contacts__title small-title"><? the_title() ?></h1>
      <a href="#popup" class="contacts-top__btn" data-fancybox>Написать нам</a>
      </div>
        <!-- <div class="contacts-top-nav">
          <a href="#" class="contacts-top-nav__item active" data-index="0"> Контакты в Москве </a>
          <a href="#" class="contacts-top-nav__item" data-index="1"> Контакты в Санкт-Петербурге </a>
          <a href="#popup" class="contacts-top__btn" data-fancybox>Написать нам</a>
        </div> -->
        <? 
        $page_top_title = get_field('page_top_title');
        $page_top_text = get_field('page_top_text');
        $page_top_link = get_field('page_top_link');
        $page_top_image = get_field('page_top_image');
        $page_top_map = get_field('page_top_map');
        ?>
        <div class="page-top">
          <div class="row">
            <div class="col-xxl-4 col-lg-5 mb-4 mb-lg-0 order-2 order-lg-1">
              <div class="page-top__info justify-content-center pe-0">
                <? if ($page_top_title): ?>
                <h2 class="page-top__title" style="max-width: 100%"><?= $page_top_title ?></h2>
                <? endif ?>
                <? if ($page_top_text): ?>
                <div class="page-top__text">
                  <?= $page_top_text ?>
                </div>
                <? endif ?>
                <? if ($page_top_link) : ?>
                <a href="<?= $page_top_link['url'] ?>" class="page-top__link"><?= $page_top_link['title'] ?></a>
                <? endif ?>
              </div>
            </div>
            <? if (!empty($page_top_image)): ?>
            <div class="col-xxl-8 col-lg-7 order-1 order-lg-2">
              <div class="page-top__image">
                <img src="<?= $page_top_image['sizes']['medium_large']?>" alt="<?= $page_top_image['alt']?>" />
              </div>
            </div>
            <? endif ?>
          </div>
        </div>
        <? if($page_top_map) : ?>
        <div class="contacts-top-map">
          <?= $page_top_map ?>
        </div>
        <? endif ?>
      </div>
    </div>
  </section>
  <?
  $office_text = get_field('office_text'); 
  $office_map = get_field('office_map'); 
  ?>
   <? if ($office_text) : ?>
  <div class="contacts-block">
    <div class="container">
      <div class="contacts-block-wrapper">
        <div class="row">
          <div class="col-lg-3 mb-4 mb-lg-0"><h3 class="small-title">Офис</h3></div>
          <div class="col-lg-3 col-sm-6 mb-4 mb-sm-0 pt-2">
            <?= $office_text ?>
          </div>
          <? if ($office_map) :  ?>
          <div class="col-sm-6 pt-2">
            <?= $office_map ?>
          </div>
          <? endif ?>
        </div>
      </div>
    </div>
  </div>
          <? endif ?>

  <? if (have_rows('blocks')) : ?>
  <div class="contacts-block">
    <div class="container">
      <div class="contacts-block-wrapper">
        <? while (have_rows('blocks')) : the_row();
        $title  = get_sub_field('title');
        $phone  = get_sub_field('phone');
        $text  = get_sub_field('text');
        ?>

        <div class="row">
          <? if ($title ) : ?>
          <div class="col-lg-3 mb-4 mb-lg-0">
            <h3 class="small-title"><?= $title ?></h3>
          </div>
          <? endif ?>
          <? if ($phone ) : ?>
          <div class="col-lg-3 col-sm-6 mb-4 mb-sm-0 pt-2">
            <p>
              <a href="tel: <?= get_phone_href($phone) ?>"><?= $phone ?></a>
            </p>
          </div>
          <? endif ?>
          <? if ($text) : ?>
          <div class="col-sm-6 pt-2">
            <?= $text ?>
          </div>
          <? endif ?>
        </div>
        <? endwhile ?>
      </div>
    </div>
  </div>
  <? endif ?>
  <? if (have_rows('places')) : ?>

    <div class="contacts-block">
      <div class="container">
        <h2 class="small-title mb-4">Склады</h2>

        <div class="contacts-block-wrapper">
          <div class="row">
            <? while (have_rows('places')) : the_row();  
              $text  = get_sub_field('text');
              ?>
            <div class="col-lg-4 mb-4 mb-lg-0">
              <div class="contacts-block-item">
                <?= $text ?>
              </div>
            </div>
            <? endwhile ?>
          </div>
        </div>
      </div>
    </div>
  <? endif ?>
</main>
<? get_footer() ?>