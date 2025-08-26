<div class="catalog-sidebar">
  <?
  $args = [
    'taxonomy'      => ['product_cat'],
    'parent'         => 0,

  ];

  $categories = get_terms($args);
  $current_cat_id = get_queried_object_id();

  foreach ($categories as $term) {
    $active = $current_cat_id == $term->term_id ? 'style="text-decoration: underline"' : '';
  ?>

    <div class="catalog-sidebar-block">
      <h3 class="catalog-sidebar-block__title"><a href="<?= get_term_link($term) ?>" <?= $active ?>><?= $term->name ?><a></h3>
      <ul class="catalog-sidebar-list">
        <?
        $child_args = [
          'taxonomy'      => ['product_cat'],
          'parent'         => $term->term_id,
          'hide_empty' => false
        ];

        $child_categories = get_terms($child_args);

        foreach ($child_categories as $term) {
          $active = $current_cat_id == $term->term_id ? 'style="text-decoration: underline"' : '';
          $ter_child_args = [
            'taxonomy'      => ['product_cat'],
            'parent'         => $term->term_id,

          ];

          $ter_child_categories = get_terms($ter_child_args);
        ?>
          <li class="catalog-sidebar-list__item">
            <a href="<?= get_term_link($term) ?>" <?= $active ?>><?= $term->name ?>
              <? if ($ter_child_categories) : ?>
                <span class="arrow">
                  <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M1 8.05405H8.89189M8.89189 8.05405L5 4M8.89189 8.05405L5 12.1081"
                      stroke="#909CB5"
                      stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </span>
              <? endif ?>
            </a>
            <? if (!empty($ter_child_categories)) : ?>
              <ul class="catalog-sidebar-sublist">
                <li class="catalog-sidebar-sublist__item">

                  <?
                  foreach ($ter_child_categories as $term) { ?>
                    <h4 class="catalog-sidebar-sublist__item-title"><a href="<?= get_term_link($term) ?>">
                        <?= $term->name ?>:
                      </a></h4>

                    <?                 // параметры по умолчанию
                    $products = get_posts(array(
                      'numberposts' => -1,
                      'post_type'   => 'product',
                      'suppress_filters' => true,
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'product_cat',
                          'field'    => 'slug',
                          'terms'    => $term->slug
                        )
                      )
                    ));

                    global $post;

                    foreach ($products as $post) {
                      setup_postdata($post); ?>
                      <a href="<? the_permalink() ?>"><? the_title() ?></a>

                    <? }

                    wp_reset_postdata(); // сброс
                    ?>


                  <? } ?>
                </li>
              </ul>
            <? else : ?>
              <ul class="catalog-sidebar-sublist">
                <li class="catalog-sidebar-sublist__item">

                  <h4 class="catalog-sidebar-sublist__item-title"><a href="<?= get_term_link($term) ?>">
                      <?= $term->name ?>:
                    </a></h4>

                  <?                 // параметры по умолчанию
                  $products = get_posts(array(
                    'numberposts' => -1,
                    'post_type'   => 'product',
                    'suppress_filters' => true,
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => $term->slug
                      )
                    )
                  ));

                  global $post;

                  foreach ($products as $post) {
                    setup_postdata($post); ?>
                    <a href="<? the_permalink() ?>"><? the_title() ?></a>

                  <? }

                  wp_reset_postdata(); // сброс
                  ?>



                </li>
              </ul>
            <? endif ?>
          </li>
        <? } ?>


      </ul>
    </div>

  <? } ?>


</div>