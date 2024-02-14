<? get_header() ?>
<main class="main">
  <? get_template_part('template-parts/breadcrumbs') ?>

  <section class="reviews">
    <div class="container">
      <h1 class="reviews__title section-title"><? the_title() ?></h1>
      <? get_template_part('template-parts/blocks/reviews-slider') ?>

      
    </div>
  </section>
  <? get_template_part('template-parts/blocks/contacts') ?>
  
</main>
<? get_footer() ?>