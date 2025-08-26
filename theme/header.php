
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" rel="stylesheet" />
	<?php wp_head(); ?>
	<meta name="robots" content="noindex">
</head>

<body >
<div class="preloader">
	<div class="preloader-inner">
		<img src="<?= get_template_directory_uri(  ) ?>/img/preloader.gif" alt="" />
		<span>0%</span>
	</div>
</div>
<div class="wrapper">
	<? 
	$header_logo = get_field('header_logo','options');
	$phone = get_field('phone','options');
	$address = get_field('address','options');
	$schedule = get_field('schedule','options');
	?>
	<header class="header">
		<div class="header-top">
			<div class="container">
				
				<div class="header-top-wrapper">
					<? if ($address) : ?>
					<div class="header-top__address">
						<?= $address ?>
					</div>
					<? endif ?>
					<div class="header-top__info">
						<? if ($schedule) : ?>
						<div class="header-top__info-item">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M12.75 9C12.75 11.0711 11.0711 12.75 9 12.75C6.92893 12.75 5.25 11.0711 5.25 9C5.25 6.92893 6.92893 5.25 9 5.25C11.0711 5.25 12.75 6.92893 12.75 9Z"
									stroke="#C4C4C4"
									stroke-width="1.125"
								/>
								<path
									d="M13.7338 4.26626L13.8215 4.17857M4.17858 13.8215L4.26624 13.7338M9 2.30545V2.25M9 15.75V15.6946M2.30545 9H2.25M15.75 9H15.6946M4.26624 4.26625L4.17855 4.17857M13.8214 13.8214L13.7338 13.7338"
									stroke="#C4C4C4"
									stroke-width="1.125"
									stroke-linecap="round"
									stroke-linejoin="round"
								/>
							</svg>
							<?= $schedule ?>
						</div>
						<? endif; ?>
						<? if ($phone) : ?>
						<div class="header-top__info-item">
							<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M9.11021 12.9223C9.6979 13.0259 10.3021 13.0259 10.8898 12.9223C11.8344 12.7559 12.5952 12.1217 12.8573 11.2824L12.9129 11.1044C12.9707 10.9193 13 10.7279 13 10.5356C13 9.68751 12.2416 9 11.306 9H8.69404C7.75845 9 7 9.68751 7 10.5356C7 10.7279 7.02931 10.9193 7.08709 11.1044L7.14268 11.2824C7.40475 12.1217 8.16561 12.7559 9.11021 12.9223ZM9.11021 12.9223C5.02797 12.1659 1.83405 8.97203 1.07767 4.88979M1.07767 4.88979C0.97411 4.3021 0.974111 3.6979 1.07767 3.11021C1.24412 2.16561 1.8783 1.40475 2.71761 1.14268L2.89563 1.08709C3.08069 1.02931 3.27208 1 3.46441 1C4.31249 1 5.00001 1.75845 5 2.69404L5 5.30596C5 6.24155 4.31249 7 3.4644 7C3.27208 7 3.08068 6.97069 2.89563 6.91291L2.71761 6.85732C1.87829 6.59525 1.24412 5.83439 1.07767 4.88979Z"
									stroke="#C4C4C4"
								/></svg>
								<?= '<a href="tel:'. get_phone_href($phone) .'">'. $phone .'</a>'; ?>
						</div>
						<? endif ?>
						<? if (have_rows('social', 'options' )) : ?>
						<div class="header-top__info-item social">
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
					</div>
				</div>
				
			</div>
		</div>
		<div class="header-center">
			<div class="container">
				<div class="header-center-wrapper">
					<a href="<? bloginfo('url') ?>" class="header-center__logo">
					<img src="<?= $header_logo['url']?>" alt="Логотип <? bloginfo('name') ?>" />
					</a>
					<button class="header-center__catalog catalog-btn">
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M4.61439 0.13862C3.82644 -0.0462069 3.00642 -0.0462067 2.21847 0.13862C1.18648 0.380693 0.380693 1.18648 0.138621 2.21847C-0.0462069 3.00642 -0.0462069 3.82645 0.138621 4.61439C0.380693 5.64638 1.18648 6.45217 2.21847 6.69424C3.00642 6.87907 3.82644 6.87907 4.61439 6.69424C5.64638 6.45217 6.45217 5.64638 6.69424 4.61439C6.87907 3.82644 6.87907 3.00642 6.69424 2.21847C6.45217 1.18648 5.64638 0.380693 4.61439 0.13862Z"
								fill="white"
							/>
							<path
								d="M4.61439 9.30576C3.82644 9.12093 3.00642 9.12093 2.21847 9.30576C1.18648 9.54783 0.380693 10.3536 0.138621 11.3856C-0.0462069 12.1736 -0.0462069 12.9936 0.138621 13.7815C0.380693 14.8135 1.18648 15.6193 2.21847 15.8614C3.00642 16.0462 3.82644 16.0462 4.61439 15.8614C5.64638 15.6193 6.45217 14.8135 6.69424 13.7815C6.87907 12.9936 6.87907 12.1736 6.69424 11.3856C6.45217 10.3536 5.64638 9.54783 4.61439 9.30576Z"
								fill="white"
							/>
							<path
								d="M13.7815 0.13862C12.9936 -0.0462069 12.1736 -0.0462067 11.3856 0.13862C10.3536 0.380693 9.54783 1.18648 9.30576 2.21847C9.12093 3.00642 9.12093 3.82645 9.30576 4.61439C9.54783 5.64638 10.3536 6.45217 11.3856 6.69424C12.1736 6.87907 12.9936 6.87907 13.7815 6.69424C14.8135 6.45217 15.6193 5.64638 15.8614 4.61439C16.0462 3.82644 16.0462 3.00642 15.8614 2.21847C15.6193 1.18648 14.8135 0.380693 13.7815 0.13862Z"
								fill="white"
							/>
							<path
								d="M13.7815 9.30576C12.9936 9.12093 12.1736 9.12093 11.3856 9.30576C10.3536 9.54783 9.54783 10.3536 9.30576 11.3856C9.12093 12.1736 9.12093 12.9936 9.30576 13.7815C9.54783 14.8135 10.3536 15.6193 11.3856 15.8614C12.1736 16.0462 12.9936 16.0462 13.7815 15.8614C14.8135 15.6193 15.6193 14.8135 15.8614 13.7815C16.0462 12.9936 16.0462 12.1736 15.8614 11.3856C15.6193 10.3536 14.8135 9.54783 13.7815 9.30576Z"
								fill="white"
							/>
						</svg>
						Каталог
					</button>
					<div class="d-none d-lg-flex header-center__search "><?php echo do_shortcode('[fibosearch]'); ?></div>
					
					<div class="header-center-buttons">

						<a href="<?= wc_get_cart_url() ?>" class="header-center-buttons__item header-center-cart"
							>
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M21 6H18C18 4.4087 17.3679 2.88258 16.2426 1.75736C15.1174 0.632141 13.5913 0 12 0C10.4087 0 8.88258 0.632141 7.75736 1.75736C6.63214 2.88258 6 4.4087 6 6H3C2.20435 6 1.44129 6.31607 0.87868 6.87868C0.31607 7.44129 0 8.20435 0 9L0 19C0.00158786 20.3256 0.528882 21.5964 1.46622 22.5338C2.40356 23.4711 3.67441 23.9984 5 24H19C20.3256 23.9984 21.5964 23.4711 22.5338 22.5338C23.4711 21.5964 23.9984 20.3256 24 19V9C24 8.20435 23.6839 7.44129 23.1213 6.87868C22.5587 6.31607 21.7956 6 21 6ZM12 2C13.0609 2 14.0783 2.42143 14.8284 3.17157C15.5786 3.92172 16 4.93913 16 6H8C8 4.93913 8.42143 3.92172 9.17157 3.17157C9.92172 2.42143 10.9391 2 12 2ZM22 19C22 19.7956 21.6839 20.5587 21.1213 21.1213C20.5587 21.6839 19.7956 22 19 22H5C4.20435 22 3.44129 21.6839 2.87868 21.1213C2.31607 20.5587 2 19.7956 2 19V9C2 8.73478 2.10536 8.48043 2.29289 8.29289C2.48043 8.10536 2.73478 8 3 8H6V10C6 10.2652 6.10536 10.5196 6.29289 10.7071C6.48043 10.8946 6.73478 11 7 11C7.26522 11 7.51957 10.8946 7.70711 10.7071C7.89464 10.5196 8 10.2652 8 10V8H16V10C16 10.2652 16.1054 10.5196 16.2929 10.7071C16.4804 10.8946 16.7348 11 17 11C17.2652 11 17.5196 10.8946 17.7071 10.7071C17.8946 10.5196 18 10.2652 18 10V8H21C21.2652 8 21.5196 8.10536 21.7071 8.29289C21.8946 8.48043 22 8.73478 22 9V19Z"
									fill="black"
								/>
							</svg>
							<? $items_count = WC()->cart->get_cart_contents_count(); 							 ?>
							<span id="cart-count"><?php
							$cart_count = WC()->cart->get_cart_contents_count();
							echo sprintf ( _n( '%d', '%d', $cart_count ), $cart_count );
							?>
							</span>
						</a>
						<?= do_shortcode( '[yith_wcwl_items_count]' ) ?>
						
						<a href="/my-account/" class="header-center-buttons__item header-center-login"
						><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M15.6186 11.1284C17.1543 10.0084 18.1544 8.19581 18.1544 6.15384C18.1544 2.76061 15.3937 0 12.0005 0C8.60727 0 5.84666 2.76061 5.84666 6.15384C5.84666 8.19581 6.84665 10.0084 8.38237 11.1284C4.56487 12.5892 1.84668 16.2905 1.84668 20.6154C1.84668 22.4817 3.36501 24 5.23129 24H18.7697C20.636 24 22.1543 22.4817 22.1543 20.6154C22.1543 16.2905 19.4361 12.5892 15.6186 11.1284ZM7.69284 6.15384C7.69284 3.77859 9.62526 1.84617 12.0005 1.84617C14.3758 1.84617 16.3082 3.77859 16.3082 6.15384C16.3082 8.52909 14.3758 10.4616 12.0005 10.4616C9.62526 10.4616 7.69284 8.52909 7.69284 6.15384ZM18.7697 22.1538H5.23129C4.38299 22.1538 3.69285 21.4637 3.69285 20.6153C3.69285 16.0344 7.4196 12.3076 12.0006 12.3076C16.5815 12.3076 20.3083 16.0344 20.3083 20.6153C20.3082 21.4637 19.6181 22.1538 18.7697 22.1538Z"
								fill="black"
							/>
						</svg>
					</a>
						<button class="header-menu-btn d-flex d-lg-none" data-src="#mobile-menu" data-fancybox data-options='{"touch" : false}'>
							<svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect width="26" height="2.78571" rx="1.39286" fill="#000" />
								<rect y="7.42859" width="26" height="2.78571" rx="1.39286" fill="#000" />
								<rect y="14.8571" width="26" height="2.78571" rx="1.39286" fill="#000" />
							</svg>
						</button>
					</div>
				</div>
			</div>
		</div>
		<nav class="header-nav d-none d-lg-block pb-0">
			<div class="container">
				<? wp_nav_menu(['theme_location' => 'header-menu']) ?>
			</div>
		</nav>
		<div class="header-text mt-4 pb-3" style="text-align:center">
			<div class="container">
				<p>Наша компания изготовит люки под Ваши индивидуальные размеры и в короткие сроки</p>
			</div>
		</div>
	</header>
	<div class="mobile-menu" id="mobile-menu">
		<div class="container">
			
			<a href="<? bloginfo('url') ?>" class="mobile-menu__logo">
				<img src="<?= $header_logo['url']?>" alt="Логотип <? bloginfo('name') ?>" />
			</a>
			<div class="header-center__search">
				<?php echo do_shortcode('[fibosearch]'); ?>
							</div>
			<? wp_nav_menu(['theme_location' => 'header-menu']) ?>
		</div>
	</div>
	

<? get_template_part( 'template-parts/catalog-menu' ) ?>