<?
get_header();
?>

<main class="main">
  <? get_template_part('template-parts/breadcrumbs') ?>

  <section class="content mb-5">
    <div class="container">
      <h1 class="content__title small-title"><? the_title() ?></h1>
      <div class="content-block col-xl-10 mx-auto">
        <? the_content() ?>

        <a href="#" onclick="history.back()" class="content__btn btn btn--transparent btn--red">Назад</a>
      </div>
    </div>
  </section>
</main>

<?php

get_footer();
