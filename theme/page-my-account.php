<?
get_header();
?>

<main class="main">
  <? get_template_part('template-parts/breadcrumbs') ?>
  <section class="lc">
    <div class="container">
      <h1 class="lc__title small-title"><? the_title() ?></h1>
      <? the_content() ?>
    </div>
  </section>
 
</main>

<?php

get_footer();
