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


			endif;
			?>
			

			<?php
			$args = array(
				'show_all'     => false, // показаны все страницы участвующие в пагинации
				'end_size'     => 1,     // количество страниц на концах
				'mid_size'     => 1,     // количество страниц вокруг текущей
				'prev_next'    => false,  // выводить ли боковые ссылки "предыдущая/следующая страница".
				'prev_text'    => __('« '),
				'next_text'    => __(' »'),
				'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
				'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
				'screen_reader_text' => __( 'Posts navigation' ),
				'class'        => ' pagination', // CSS класс, добавлено в 5.5.0.
			);
			echo '<div class="news__pagination ">';
			the_posts_pagination($args); 
			echo '</div>';
			?>
			
		</div>
	</section>
</main>

<?php

get_footer();
