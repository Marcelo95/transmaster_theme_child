<?php

get_header();



if (ot_get_option('nt_blog_post_type') == 'masonry') {

	wp_enqueue_script('theme-masonry');

	wp_enqueue_script('custom-masonry');
}

$nt_amaze_menu_sticky = ot_get_option('nt_amaze_menu_sticky');

?>

<?php if ($nt_amaze_menu_sticky == 'top' || $nt_amaze_menu_sticky == 'topstatic') : ?>

	// menu position
	$nt_amaze_onepage_menu_position = rwmb_meta('nt_amaze_onepage_menu_position');
	$nt_amaze_onepage_menu_list = rwmb_meta('nt_amaze_onepage_menu_list');
	$nt_amaze_onepage_menu_list = $nt_amaze_onepage_menu_list ? $nt_amaze_onepage_menu_list : 'main-menu';

	// menu item
	$nt_amaze_onepage_menu_option = rwmb_meta('nt_amaze_onepage_menu_option');
	$nt_amaze_onepage_menu_item_name = rwmb_meta('nt_amaze_onepage_menu_item_name');
	$nt_amaze_onepage_menu_item_url = rwmb_meta('nt_amaze_onepage_menu_item_url');

	// Logo options
	$nt_amaze_onepage_hide_logo = rwmb_meta('nt_amaze_onepage_hide_logo');

	// header top visibility
	$nt_amaze_header_top_visibility = rwmb_meta('nt_amaze_header_top_all_visibility');

	// header top info
	$nt_amaze_header_top_info_visibility = rwmb_meta('nt_amaze_header_top_info_visibility');
	$nt_amaze_header_phone_icon = rwmb_meta('nt_amaze_header_phone_icon');
	$nt_amaze_header_phone_number = rwmb_meta('nt_amaze_header_phone_number');
	$nt_amaze_header_phone_number_link = rwmb_meta('nt_amaze_header_phone_number_link');

	$nt_amaze_header_mail_icon = rwmb_meta('nt_amaze_header_mail_icon');
	$nt_amaze_header_mail_text = rwmb_meta('nt_amaze_header_mail_text');
	$nt_amaze_header_mail_link = rwmb_meta('nt_amaze_header_mail_link');

	$nt_amaze_header_custom_info = rwmb_meta('nt_amaze_header_custom_info');

	// header top social
	$nt_amaze_header_top_social_visibility = rwmb_meta('nt_amaze_header_top_social_visibility');
	$nt_amaze_header_social_icon_name = rwmb_meta('nt_amaze_header_social_icon_name');
	$nt_amaze_header_social_url = rwmb_meta('nt_amaze_header_social_url');

	// widgetize top footer
	$nt_amaze_disable_footer_widgetize = rwmb_meta('nt_amaze_disable_footer_widgetize');

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

<?php endif; ?>



<!--page header-->


<div class="dzsparallaxer auto-init" data-options='{ direction: "reverse" }'>

	<div class="divimage dzsparallaxer--target"></div>

	<div class=" parallax-text center-it">



		<!--page title-->

		<?php if (ot_get_option('nt_amaze_blog_disable_heading') != 'off') : ?>

			<?php if (ot_get_option('nt_amaze_blog_heading') != '') : ?>

				<h2 class="font-700"><?php echo (ot_get_option('nt_amaze_blog_heading')); ?></h2>

			<?php else : ?>

				<h2 class="font-700"><?php bloginfo('name'); ?></h2>

			<?php endif; ?>

		<?php endif; ?>



		<!--page subtitle-->

		<?php if (ot_get_option('nt_amaze_blog_slogan_visibility') != 'off') : ?>

			<?php if (ot_get_option('nt_amaze_blog_slogan') != '') : ?>

				<p class="text-muted blog-muted"><?php echo (ot_get_option('nt_amaze_blog_slogan')); ?></p>

			<?php else : ?>

				<p class="text-muted blog-muted"><?php bloginfo('description'); ?></p>

			<?php endif; ?>

		<?php endif; ?>



	</div>

</div>

<!--/page header-->



<!--logo and sticky-header-->

<?php if ($nt_amaze_menu_sticky == 'sticky' || $nt_amaze_menu_sticky == 'bottomstatic' || $nt_amaze_menu_sticky == '') : ?>

	<?php get_template_part('sticky-header'); ?>

<?php endif; ?>

<?php if ($nt_amaze_menu_sticky == 'top'  || $nt_amaze_menu_sticky == 'topstatic' || $nt_amaze_menu_sticky == '') : ?>

	<div class="space-90"></div>

<?php endif; ?>

<!--page default content type-->

<?php if ((ot_get_option('nt_blog_post_type') == 'default') || (ot_get_option('nt_blog_post_type') == '')) : ?>

	<section class="section-blog">

		<div class="container">

			<div class="row">

				<?php if (ot_get_option('nt_amaze_bloglayout') == 'right-sidebar' || ot_get_option('nt_amaze_bloglayout') == '') { ?>

					<div class="col-md-9 col-sm-12 index float-right margin-b-50">

					<?php } elseif (ot_get_option('nt_amaze_bloglayout') == 'left-sidebar') { ?>

						<?php get_sidebar(); ?>

						<div class="col-md-9 col-sm-12 index float-left margin-b-50">

						<?php } elseif (ot_get_option('nt_amaze_bloglayout') == 'full-width') { ?>

							<div class="col-xs-12 full-width-index v margin-b-50">

							<?php } ?>

							<?php if (have_posts()) : ?>

								<?php while (have_posts()) : the_post(); ?>

									<?php get_template_part('post-format/content', get_post_format()); ?>

								<?php endwhile; ?>

								<?php the_posts_pagination(array(

									'prev_text'          => esc_html__('Previous page', 'nt-amaze'),

									'next_text'          => esc_html__('Next page', 'nt-amaze'),

									'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',

								)); ?>

							<?php else : ?>

								<?php get_template_part('content', 'none'); ?>

							<?php endif; ?>

							</div>

							<?php if (ot_get_option('nt_amaze_bloglayout') == 'right-sidebar' || ot_get_option('nt_amaze_bloglayout') == '') { ?>

								<?php get_sidebar(); ?>

							<?php } ?>

						</div>

					</div>

	</section>

	<!--page default content type-->



	<!--page masonry content type-->

<?php elseif (ot_get_option('nt_blog_post_type') == 'masonry') :  ?>

	<section class="section-blog">

		<div class="container">

			<div class="row">

				<?php if (ot_get_option('nt_amaze_bloglayout') == 'right-sidebar' || ot_get_option('nt_amaze_bloglayout') == '') { ?>

					<div class="col-md-9 index float-right margin-b-50">

						<div class="row masonry-blog">

						<?php } elseif (ot_get_option('nt_amaze_bloglayout') == 'left-sidebar') { ?>

							<?php get_sidebar(); ?>

							<div class="col-md-9 index float-left margin-b-50">

								<div class="row masonry-blog">

								<?php } elseif (ot_get_option('nt_amaze_bloglayout') == 'full-width') { ?>

									<div class="col-xs-12 full-width-index v margin-b-50">

										<div class="row masonry-blog">

										<?php } ?>



										<?php if (have_posts()) : ?>

											<?php while (have_posts()) : the_post(); ?>

												<?php get_template_part('post-format/content', get_post_format()); ?>

											<?php endwhile; ?>

											<?php the_posts_pagination(array(

												'prev_text'          => esc_html__('Previous page', 'nt-amaze'),

												'next_text'          => esc_html__('Next page', 'nt-amaze'),

												'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',

											)); ?>

										<?php else : ?>

											<?php get_template_part('content', 'none'); ?>

										<?php endif; ?>



										</div>

									</div>



									<?php if (ot_get_option('nt_amaze_bloglayout') == 'right-sidebar' || ot_get_option('nt_amaze_bloglayout') == '') { ?>

										<?php get_sidebar(); ?>

									<?php } ?>

								</div>

							</div>

	</section>

<?php endif; ?>

<!--page masonry content type-->



<!--page footer widgetize-->

<?php if (ot_get_option('nt_amaze_top_footerwd') == 'on') {

	echo get_template_part('template-part/footer-widgetize');



	if (ot_get_option('nt_amaze_top_footerwd') == 'on' || (is_active_sidebar('footer'))) {

		echo '<div class="space-40"></div>';
	}
}

?>



<!--page footer-->

<?php get_template_part('footer-content'); ?>

<?php get_footer(); ?>