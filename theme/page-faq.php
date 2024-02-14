<? get_header() ?>
<main class="main">
  <? get_template_part('template-parts/breadcrumbs') ?>

  <section class="content">
    <div class="container">
      <h1 class="small-title mb-5"><? the_title() ?></h1>
      <div class="page-top">
        <? 
        $page_top_title = get_field('page_top_title');
        $page_top_text = get_field('page_top_text');
        $page_top_link = get_field('page_top_link');
        $page_top_image = get_field('page_top_image');
        ?>
        <div class="row">
          <div class="col-xxl-4 col-lg-5 mb-4 mb-lg-0 order-2 order-lg-1">
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
      <? if (have_rows('faq')) : ?>
      <div class="row mt-5">
        <? while (have_rows('faq')) : the_row();
        $question = get_sub_field('question');
        $answer = get_sub_field('answer');
        ?>
        <div class="col-lg-6 mb-4">
          <div class="dropdown-item">
            <div class="dropdown-item__title">
              <span><?= $question ?></span>
              <svg class="dropdown-item__arrow" width="18" height="11" viewBox="0 0 18 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M1.90421 0.208615C2.02101 0.093014 2.20909 0.0929116 2.32602 0.208385L8.78921 6.59076C8.90605 6.70615 9.09395 6.70615 9.21079 6.59076L15.674 0.208385C15.7909 0.0929122 15.979 0.0930144 16.0958 0.208615L17.7845 1.87989C17.9032 1.99729 17.9032 2.18895 17.7845 2.30635L9.21103 10.7912C9.09413 10.9068 8.90587 10.9068 8.78897 10.7912L0.215462 2.30635C0.0968304 2.18894 0.0968304 1.99729 0.215462 1.87988L1.90421 0.208615Z"
                  fill="black"
                />
              </svg>
            </div>
            <div class="dropdown-item__body">
              <div class="dropdown-item__text">
               <?= $answer ?>
              </div>
            </div>
          </div>
        </div>
        <? endwhile ?>
      </div>
      <? endif ?>
    </div>
  </section>
  
  <? get_template_part('template-parts/blocks/contacts') ?>

</main>
<? get_footer() ?>