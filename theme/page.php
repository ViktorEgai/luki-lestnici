<?
get_header();
?>

	<main class="main">
    <? include('template-parts/page-blocks/breadcrumbs.php') ?>
	<div class="container">
    <div class="page-top">
      <h1 class=" page-title"><? the_title() ?></h1>
    </div>
    <div class="descr">
      <div class="row">
  
        <div class="descr-text"><? the_content() ?></div>
      </div>
    </div>
  </div>

	</main><!-- #main -->

<?php

get_footer();
