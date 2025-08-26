<? $cat = get_queried_object() ?>
<section class="content mb-5">
  <div class="container">
    <h1 class="content__title small-title"><?= $cat->name ?></h1>
    <div class="content-block col-xl-10 mx-auto">
      <?= $cat->description ?>


    </div>

  </div>
</section>
<?
$gallery = get_field('gallery', $cat);
if ($gallery) :
?>
  <div class="gallery">
    <div class="container">
      <div class="row">
        <? foreach ($gallery as $image) : ?>
          <div class="col-lg-3 col-md-4 col-6">
            <a href="<?= $image['url'] ?>" data-fancybox="gallery">
              <img src="<?= $image['sizes']['large'] ?>" alt="<?= $image['alt'] ?>">
            </a>
          </div>
        <? endforeach ?>
      </div>
    </div>
  </div>
<? endif ?>