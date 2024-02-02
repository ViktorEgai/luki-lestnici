<? 
$footer_logo = get_field('footer_logo', 'options');
$phone = get_field('phone', 'options');
$email = get_field('email', 'options');
?>
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="footer-top order-lg-1 order-2">
						<? wp_nav_menu( ['theme_location' => 'footer-menu'] ) ?>
						<div class="footer-col">
							<form action="#" class="footer-subscribe">
								<div class="footer-subscribe__field">
									<input type="email" placeholder="Подписаться на рассылку" class="footer-subscribe__input" />
									<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_313_5)">
											<path
												d="M7.87207 14.6768V18.5417C7.87207 18.8117 8.04813 19.0509 8.30884 19.1359C8.37402 19.1567 8.44089 19.1667 8.50691 19.1667C8.70498 19.1667 8.89628 19.0751 9.01817 18.9117L11.3146 15.8351L7.87207 14.6768Z"
												fill="white"
											/>
											<path
												d="M20.5142 0.115907C20.3195 -0.0199262 20.0639 -0.0382595 19.8523 0.0709072L0.80698 9.86257C0.581823 9.97841 0.448929 10.2151 0.467551 10.4642C0.487019 10.7142 0.655464 10.9276 0.895011 11.0084L6.1896 12.7901L17.4652 3.29841L8.73997 13.6476L17.6134 16.6334C17.6794 16.6551 17.7488 16.6667 17.8182 16.6667C17.9333 16.6667 18.0476 16.6359 18.1483 16.5759C18.3092 16.4792 18.4184 16.3167 18.4463 16.1342L20.774 0.717574C20.8088 0.484241 20.7089 0.252574 20.5142 0.115907V0.115907Z"
												fill="white"
											/>
										</g>
										<defs>
											<clipPath id="clip0_313_5">
												<rect width="20.315" height="20" fill="white" transform="translate(0.46582)" />
											</clipPath>
										</defs>
									</svg>
								</div>
							</form>
							<? if ($phone) :  ?>
							<div class="footer__phone">
								<?= '<a href="tel:'. get_phone_href($phone) .'">'. $phone .'</a>' ?>
							</div>
							<? endif ?>
							<a href="#popup" data-fancybox  class="footer__callback">Заказать звонок</a>
							<? if ($email) : ?>
							<div class="footer__email">
								<div class="footer__email-text"><?= $email ?></div>
								<a href="mailto:<?= $email ?>">Написать</a>
							</div>
							<? endif ?>
							<? wp_nav_menu( ['theme_location' => 'footer-links'] ) ?>

						</div>
					</div>
					<div class="footer-bottom order-lg-2 order-1 mb-3 mb-lg-0">
						<a href="<? bloginfo('url') ?>" class="footer__logo">
							<img src="<?= $footer_logo['url'] ?>" alt="Логотип <? bloginfo('name') ?>" />
						</a>
						<? if (have_rows('social', 'options' )) : ?>
						<div class="footer__social social">
							<? while (have_rows('social', 'options' )) : the_row();
							$icon = get_sub_field('icon');
							$link = get_sub_field('link');
							?>

							<a href="<?= $link ?>" target="_blank" class="social__item">
							<img src="<?= $icon?>" class="svg" alt="">
							</a>
							<? endwhile ?>
						</div>
						<? endif ?>
						<div class="footer-payment">
							<div class="footer-payment__item">
								<img src="<?= get_template_directory_uri(  )?>/img/visa.svg" alt="" />
							</div>
							<div class="footer-payment__item">
								<img src="<?= get_template_directory_uri(  )?>/img/mc.svg" alt="" />
							</div>
							<div class="footer-payment__item">
								<img src="<?= get_template_directory_uri(  )?>/img/wm.svg" alt="" />
							</div>
							<div class="footer-payment__item">
								<img src="<?= get_template_directory_uri(  )?>/img/paypal.svg" alt="" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>				

		<?php include('template-parts/popup.php') ?>
		<?php wp_footer(); ?>
		</div>
	</body>
</html>
