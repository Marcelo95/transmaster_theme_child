<?php


// menu position
$nt_amaze_onepage_menu_position        = rwmb_meta('nt_amaze_onepage_menu_position');
$nt_amaze_onepage_menu_list            = rwmb_meta('nt_amaze_onepage_menu_list');
$nt_amaze_onepage_menu_list            = $nt_amaze_onepage_menu_list ? $nt_amaze_onepage_menu_list : 'main-menu';

// menu item
$nt_amaze_onepage_menu_option          = rwmb_meta('nt_amaze_onepage_menu_option');
$nt_amaze_onepage_menu_item_name       = rwmb_meta('nt_amaze_onepage_menu_item_name');
$nt_amaze_onepage_menu_item_url        = rwmb_meta('nt_amaze_onepage_menu_item_url');

// Logo options
$nt_amaze_onepage_hide_logo            = rwmb_meta('nt_amaze_onepage_hide_logo');

// header top visibility
$nt_amaze_header_top_visibility        = rwmb_meta('nt_amaze_header_top_all_visibility');

// header top info
$nt_amaze_header_top_info_visibility   = rwmb_meta('nt_amaze_header_top_info_visibility');
$nt_amaze_header_phone_icon            = rwmb_meta('nt_amaze_header_phone_icon');
$nt_amaze_header_phone_number          = rwmb_meta('nt_amaze_header_phone_number');
$nt_amaze_header_phone_number_link     = rwmb_meta('nt_amaze_header_phone_number_link');

$nt_amaze_header_mail_icon             = rwmb_meta('nt_amaze_header_mail_icon');
$nt_amaze_header_mail_text             = rwmb_meta('nt_amaze_header_mail_text');
$nt_amaze_header_mail_link             = rwmb_meta('nt_amaze_header_mail_link');

$nt_amaze_header_custom_info           = rwmb_meta('nt_amaze_header_custom_info');

// header top social
$nt_amaze_header_top_social_visibility = rwmb_meta('nt_amaze_header_top_social_visibility');
$nt_amaze_header_social_icon_name      = rwmb_meta('nt_amaze_header_social_icon_name');
$nt_amaze_header_social_url            = rwmb_meta('nt_amaze_header_social_url');

// widgetize top footer
$nt_amaze_disable_footer_widgetize     = rwmb_meta('nt_amaze_disable_footer_widgetize');

?>

<?php if (ot_get_option('nt_amaze_menu_sticky') == 'sticky' || ot_get_option('nt_amaze_menu_sticky') == 'bottomstatic' || ot_get_option('nt_amaze_menu_sticky') == 'top') : ?>
	<?php if ($nt_amaze_onepage_menu_position != 'left') : ?>
		<?php if ($nt_amaze_header_top_info_visibility != '2' || $nt_amaze_header_top_social_visibility != '2') : ?>
			<!--top bar start-->
			<div class="top-bar">
				<div class="container">
					<div class="row">
						<?php if ($nt_amaze_header_top_info_visibility != '2') : ?>
							<?php if ($nt_amaze_header_custom_info != '') : ?>
								<?php echo wp_kses($nt_amaze_header_custom_info, nt_amaze_allowed_html()); ?>
							<?php else : ?>
								<div class="col-sm-6">
									<ul class="list-inline">
										<?php
										if ($nt_amaze_header_phone_number  != '') {
											echo '<li class="header-info"><a href="' . esc_url($nt_amaze_header_phone_number_link) . '"><i class="' . esc_attr($nt_amaze_header_phone_icon) . '"></i> ' . esc_html($nt_amaze_header_phone_number) . '</a></li> ';
										}

										if ($nt_amaze_header_mail_text  != '') {
											echo '<li class="header-info"><a href="' . esc_url($nt_amaze_header_mail_link) . '"><i class="' . esc_attr($nt_amaze_header_mail_icon) . '"></i> ' . esc_html($nt_amaze_header_mail_text) . '</a></li>';
										}
										?>
									</ul>
								</div>
								<!--top left col end-->
							<?php endif; ?>
						<?php endif; ?>

						<?php
						if ($nt_amaze_header_top_info_visibility == '2') {
							$textalign = 'text-left';
						} else {
							$textalign = 'text-right';
						}
						if ($nt_amaze_header_top_social_visibility  != '2') : ?>

							<div class="col-sm-6 hidden-xs-teste <?php echo esc_attr($textalign); ?>">
								<ul class="list-inline top-socials">
									<li>
										<a href="<?php echo esc_url(get_url_page_translate()); ?>" style="font-size: 15px;">
											Português
										</a>
									</li>
									<li>
										<a style="font-size: 15px;">
											|
										</a>
									</li>
									<li>
										<a href="<?php echo esc_url(get_url_page_translate("en/")); ?>" style="font-size: 15px;">
											English
										</a>
									</li>
									<?php
									// if ( ! empty ( $nt_amaze_header_social_icon_name ) ) {
									// 	foreach (
									// 		array_combine( $nt_amaze_header_social_icon_name, $nt_amaze_header_social_url ) as $social_icon_name => $social_url ) {
									// 		echo '<li><a href="'.esc_url( $social_url ).'"><i class="'.esc_attr( $social_icon_name ).'"></i></a></li> ';
									// 	}
									// }
									?>
								</ul>
							</div>
							<!--top social col end-->
						<?php endif; ?>
					</div>
					<!--row-->
				</div>
				<!--container-->
			</div>
			<!--top bar end-->
		<?php endif; ?>
	<?php endif; ?>

<?php endif; ?>

<?php if ($nt_amaze_onepage_menu_position == 'left') : ?>
	<aside class="left-menu">
		<!--  navbar -->

		<?php if (ot_get_option('nt_amaze_themeskin') == 'usedarkskin') : ?>
			<nav class="navbar navbar-inverse navbar-static-top">
			<?php else : ?>
				<nav class="navbar navbar-default navbar-static-top">
				<?php endif; ?>
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only"><?php esc_html('Toggle navigation'); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<?php if ($nt_amaze_onepage_hide_logo != '2') : ?>
							<!-- hide logo -->

							<?php if (ot_get_option('nt_amaze_logo_type') == 'text') : ?>
								<a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand"><?php echo esc_html(ot_get_option('nt_amaze_textlogo')) ?></a>
							<?php elseif (ot_get_option('nt_amaze_logo_type') == 'img') : ?>
								<?php if (ot_get_option('nt_amaze_logoimg') != '') : ?>
									<a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand "><img class="responsive-img logo" src="<?php echo esc_url(ot_get_option('nt_amaze_logoimg')) ?>"></a>
								<?php endif; ?>
								<?php if (ot_get_option('nt_amaze_mobil_logo') != '') : ?>
									<a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand "><img class="responsive-img m-logo" src="<?php echo esc_url(ot_get_option('nt_amaze_mobil_logo')) ?>"></a>
								<?php endif; ?>
							<?php else : ?>
								<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html_e('Amaze', 'nt-amaze'); ?></a>
							<?php endif; ?>

						<?php endif; ?>
						<!-- end hide logo -->
					</div>

					<div id="navbar" class="navbar-collapse collapse">

						<?php if ($nt_amaze_onepage_menu_option == 'metabox') : ?>
							<ul class="nav navbar-nav scroll-to">
								<?php
								if ((!empty($nt_amaze_onepage_menu_item_name)) && (!empty($nt_amaze_onepage_menu_item_url))) {
									foreach (array_combine($nt_amaze_onepage_menu_item_name, $nt_amaze_onepage_menu_item_url) as $nt_amaze_content => $nt_amaze_url) {
										echo '<li class="nasil"><a href="' . esc_url($nt_amaze_url) . '">' . esc_html($nt_amaze_content) . '</a></li>';
									}
								}
								?>
							</ul>
						<?php endif; ?>

						<?php if ($nt_amaze_onepage_menu_option == 'primary' || $nt_amaze_onepage_menu_option == '') : ?>
							<?php
							wp_nav_menu(
								array(
									'menu'               => $nt_amaze_onepage_menu_list,
									'theme_location'     => '',
									'depth'              => 2,
									'container'          => '',
									'container_class'    => '',
									'menu_class'         => 'nav navbar-nav navbar-right scroll-to',
									'menu_id'            => 'main-menu',
									'echo'               => true,
									'fallback_cb'        => 'Nt_Amaze_Wp_Bootstrap_Navwalker::fallback',
									'walker'             => new Nt_Amaze_Wp_Bootstrap_Navwalker()
								)
							);
							?>
						<?php endif; ?>

					</div>
					<!--/.nav-collapse -->
				</div>
				<!--/.container -->
				</nav>
				<?php if ($nt_amaze_header_top_info_visibility != '2' || $nt_amaze_header_top_social_visibility != '2') : ?>
					<div class="hidden-xs-teste">
						<?php if ($nt_amaze_header_top_social_visibility  != '2') : ?>

							<ul class="list-inline text-center top-socials">
								<li>
									<a href="<?php echo esc_url($url); ?>" style="font-size: 15px;">
										Português
									</a>
								</li>
								<li>
									<a style="font-size: 15px;">
										|
									</a>
								</li>
								<li>
									<a href="<?php echo esc_url($url_en); ?>" style="font-size: 15px;">
										English
									</a>
								</li>
								<?php
								// if (!empty($nt_amaze_header_social_icon_name)) {
								// 	foreach (array_combine($nt_amaze_header_social_icon_name, $nt_amaze_header_social_url) as $social_icon_name => $social_url) {
								// 		echo '<li><a href="' . esc_url($social_url) . '"><i class="' . esc_attr($social_icon_name) . '"></i></a></li>';
								// 	}
								// }
								?>
							</ul>
							<!--social icons list-->
						<?php endif; ?>

						<?php if ($nt_amaze_header_top_info_visibility != '2') : ?>
							<?php if ($nt_amaze_header_custom_info != '') : ?>
								<?php echo wp_kses($nt_amaze_header_custom_info, nt_amaze_allowed_html()); ?>
							<?php else : ?>
								<?php
								if ($nt_amaze_header_phone_number  != '') {
									echo '<p class="header-info"><a href="' . esc_url($nt_amaze_header_phone_number_link) . '"><i class="' . esc_attr($nt_amaze_header_phone_icon) . '"></i> ' . esc_html($nt_amaze_header_phone_number) . '</a></p>';
								}

								if ($nt_amaze_header_mail_text  != '') {
									echo '<p class="header-info"><a href="' . esc_url($nt_amaze_header_mail_link) . '"><i class="' . esc_attr($nt_amaze_header_mail_icon) . '"></i> ' . esc_html($nt_amaze_header_mail_text) . '</a></p>';
								}
								?>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<!--end navigation-->
	</aside>
<?php endif; ?>