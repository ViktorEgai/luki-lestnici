<? get_header() ?>
<main class="main">
  <? get_template_part('template-parts/breadcrumbs') ?>
  <section class="content">
    <div class="container">
      <h1 class="small-title news__title"><? the_title() ?></h1>
      <div class="page-top">
        <div class="row">
          <div class="col-xxl-4 col-lg-5 mb-4 mb-lg-0 order-2 order-lg-1">
            <? 
            $page_top_title = get_field('page_top_title');
            $page_top_text = get_field('page_top_text');
            $page_top_link = get_field('page_top_link');
            $page_top_image = get_field('page_top_image');
            ?>
            <div class="page-top__info justify-content-center">
              <?= $page_top_title ? '<h2 class="page-top__title">'. $page_top_title .'</h2>' : '' ?>
              <?= $page_top_text ? '<div class="page-top__text">'. $page_top_text .'</div>' : '' ?>
              <?= $page_top_link ? '<a href="'. $page_top_link['url'] .'" class="page-top__link">'. $page_top_link['title'] .'</a>
              ' : '' ?>
            </div>
          </div>
          <div class="col-xxl-8 col-lg-7 order-1 order-lg-2">
            <div class="page-top__image">
              <?= !empty ($page_top_image) ? '<img src="'. $page_top_image['sizes']['medium_large'] .'" alt="'. $page_top_image['alt'] .'" />
              ' : '' ?>
            </div>
          </div>
        </div>
      </div>
      <div class="content-wrapper">
        <div class="col-lg-10">
          <? the_content() ?>
        </div>
      </div>
    </div>
  </section>
  <? get_template_part('template-parts/blocks/contacts') ?>
</main>

<? get_footer() ?>