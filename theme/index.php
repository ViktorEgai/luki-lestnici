<?php


get_header();
?>
<main class="main">
	<? get_template_part('template-parts/breadcrumbs'); ?>
	<section class="news">
		<div class="container">
			<h1 class="small-title news__title">Новости</h1>
			<div class="news-categories mb-3">
				<a href="/blog/" class="news-categories-item active">Статьи</a>
				<a href="#" class="news-categories-item">Последние новости</a>
			</div>
			
			<?php
			if ( have_posts() ) :
				echo '<div class="row">';

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();?>


					<div class="col-lg-4 col-sm-6 mb-4">
						<a href="<? the_permalink() ?>" class="news-item">
							<? the_post_thumbnail( 'medium', ['class'=> 'news-item__thumb'] ) ?>
							<p class="news-item__title"><? the_title() ?></p>
							<div class="news-item__excerpt">
								<? the_excerpt() ?>
							</div>
							<div class="news-item__date"><?= get_the_date('d.m.Y') ?></div>
						</a>
					</div>


				<? endwhile;
				echo '</div>';
				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
				
			
			</div>
			<div class="news__pagination pagination">
				<a href="#" class="active">1</a>
				<a href="#">2</a>
				<a href="#">3</a>
				<a href="#">4</a>
				...
				<a href="#">10</a>
			</div>
		</div>
	</section>
</main>

<?php

get_footer();
