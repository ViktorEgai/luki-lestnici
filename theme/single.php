<? get_header(); ?>

<main class="main">
  <? get_template_part('template-parts/breadcrumbs') ?>

  <section class="single-news">
    <div class="container">
        <h1 class="single-news__title small-title"><? the_title() ?></h1>
        <div class="page-top">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0 order-2 order-lg-1">
                    <div class="page-top__info">
                        <h2 class="page-top__title">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                        </h2>
                    </div>
                </div>
                <div class="col-lg-8 order-1 order-lg-2">
                    <div class="page-top__image">
                        <? the_post_thumbnail('medium_large') ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-news-content">
            <h2 class="single-news__title small-title">Lorem ipsum dolor sit amet</h2>
            <div class="row">
                <div class="col-lg-9">
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque
                        penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                        sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus
                        ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus
                        elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.
                        Aliquam lorem ante,
                    </p>
                </div>
            </div>
        </div>
        <div class="single-news-block">
            <h2 class="single-news__title small-title">Lorem ipsum dolor sit amet</h2>
            <div class="single-news-slider">
                <div class="single-news-slider__item">
                    <img src="img/slide-1.png" alt="" />
                </div>
                <div class="single-news-slider__item">
                    <img src="img/slide-1.png" alt="" />
                </div>
                <div class="single-news-slider__item">
                    <img src="img/slide-1.png" alt="" />
                </div>
                <div class="single-news-slider__item">
                    <img src="img/slide-1.png" alt="" />
                </div>
            </div>
        </div>
        <div class="single-news-content">
            <h2 class="single-news__title small-title">Lorem ipsum dolor sit amet</h2>
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque
                        penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                        sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus
                        ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus
                        elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.
                        Aliquam lorem ante,
                    </p>
                </div>
                <div class="col-lg-6 mb-3">
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque
                        penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                        sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus
                        ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integ
                    </p>
                </div>
            </div>
        </div>
    </div>
  </section>
  <section class="other-news">
    <div class="container">
        <h2 class="other-news__title small-title">Вам может быть интересно</h2>
        <div class="row">
            <div class="col-lg-4 col-sm-6 mb-4">
                <a href="#" class="news-item">
                    <img src="img/news-thumbs.png" alt="" class="news-item__thumb" />
                    <p class="news-item__title">Lorem ipsum dolor sit amet</p>
                    <div class="news-item__excerpt">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                    </div>
                    <div class="news-item__date">09.08.23</div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <a href="#" class="news-item">
                    <img src="img/news-thumbs.png" alt="" class="news-item__thumb" />
                    <p class="news-item__title">Lorem ipsum dolor sit amet</p>
                    <div class="news-item__excerpt">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                    </div>
                    <div class="news-item__date">09.08.23</div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <a href="#" class="news-item">
                    <img src="img/news-thumbs.png" alt="" class="news-item__thumb" />
                    <p class="news-item__title">Lorem ipsum dolor sit amet</p>
                    <div class="news-item__excerpt">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                    </div>
                    <div class="news-item__date">09.08.23</div>
                </a>
            </div>
        </div>
    </div>
  </section>
</main>

<?php

get_footer();
