<? // Template name: Шаблон оплата и доставка ?>
<? get_header() ?>
<main class="main">
  <? get_template_part('template-parts/breadcrumbs') ?>
  <section class="content mb-5">
    <h1 class="d-none"><? the_title() ?></h1>

    <div class="container">
      <? 
      if( have_rows('content') ):

        while ( have_rows('content') ) : the_row();

          if( get_row_layout() == 'text' ):
              $title = get_sub_field('title');
              $text = get_sub_field('text');
              $underline = get_sub_field('underline');
                          ?>
            <div class="content-block col-lg-10">
              <?= $title ? '<h2 class="content__title small-title">'. $title .'</h2>' : '' ?>
    
              <?= $text ?>
            </div>
            <?= $underline ? '<hr>' : '' ?>
          <? elseif( get_row_layout() == 'content_list' ): 
              $title = get_sub_field('title'); ?>
              <div class="content-list col-lg-10">
                <?= $title ? '<h2 class="content__title small-title">'. $title .'</h2>' : '' ?>
                <? if (have_rows('list')) :  ?>
                <div class="row">
                  <? while (have_rows('list')) : the_row();
                  $icon = get_sub_field('icon');
                  $text = get_sub_field('text');
                  ?>

                  <div class="col-md-4 mb-4 mb-md-0 ps-md-0 d-flex align-items-center">
                    <?= !empty($icon) ? '<img src="'.$icon['url'].'" alt="'.$icon['alt'].'" />' : ''; ?>
                    
                    <?= $text ? '<p>'. $text .'</p>' : ''; ?>
                    
                  </div>
                  <? endwhile ?>
                </div>
                <? endif ?>
              </div>

        <? endif;
        endwhile;
      endif;
      ?>

    </div>
  </section>
</main>

<? get_footer() ?>