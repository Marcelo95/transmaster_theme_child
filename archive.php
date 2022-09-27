<?php

get_header();

if (ot_get_option('nt_blog_post_type') == 'masonry') {

	wp_enqueue_script('theme-masonry');

	wp_enqueue_script('custom-masonry');
}

$nt_amaze_archivelayout = ot_get_option('nt_amaze_archivelayout');

$nt_amaze_menu_sticky = ot_get_option('nt_amaze_menu_sticky');

?>

<?php
global $post;
$parent_slug = get_post_field('post_name', $post->post_parent);


$language = 'pt-BR';

if ($parent_slug === 'en') {
	$language = 'en';
}




?>




<?php if ($nt_amaze_menu_sticky == 'top' || $nt_amaze_menu_sticky == 'topstatic') : ?>

	<?php get_template_part('sticky-header'); ?>

<?php endif; ?>



<!--page header-->

<div class="dzsparallaxer auto-init" data-options='{ direction: "reverse" }'>

	<div class="divimage dzsparallaxer--target"></div>

	<div class=" parallax-text center-it">



		<!--page title-->

		<?php if (ot_get_option('nt_amaze_archive_disable_heading') != 'off') : ?>

			<?php if (ot_get_option('nt_amaze_archive_heading') != '') : ?>

				<h2 class="font-700"><?php echo (ot_get_option('nt_amaze_archive_heading')); ?></h2>

			<?php else : ?>

				<h2 class="font-700"><?php echo the_archive_title(); ?></h2>

			<?php endif; ?>

		<?php endif; ?>



		<!--page subtitle-->

		<?php if (ot_get_option('nt_amaze_archive_slogan_visibility') != 'off') : ?>

			<?php if (ot_get_option('nt_amaze_archive_slogan') != '') : ?>

				<p class="text-muted blog-muted"><?php echo (ot_get_option('nt_amaze_archive_slogan')); ?></p>

			<?php endif; ?>

		<?php endif; ?>



		<!-- Start breadcrumb -->

		<?php if (ot_get_option('nt_amaze_breadcrubms_visibility') != 'off') : ?>

			<?php if (function_exists('bcn_display')) : ?>

				<p class="breadcrubms"><?php bcn_display(); ?></p>

			<?php else : ?>

				<?php if (function_exists('nt_amaze_breadcrubms')) : ?>

					<p class="breadcrubms"><?php nt_amaze_breadcrubms(); ?></p>

				<?php endif; ?>

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

				<?php if ($nt_amaze_archivelayout == 'right-sidebar' || $nt_amaze_archivelayout == '') { ?>

					<div class="col-md-9 col-sm-12 index float-right margin-b-50">

					<?php } elseif ($nt_amaze_archivelayout == 'left-sidebar') { ?>

						<?php get_sidebar(); ?>

						<div class="col-md-9 col-sm-12 index float-left margin-b-50">

						<?php } elseif ($nt_amaze_archivelayout == 'full-width') { ?>

							<div class="col-xs-12 full-width-index v margin-b-50">

							<?php } ?>

							<?php if (have_posts()) : ?>

							<?php while (have_posts()) : the_post();

									get_template_part('post-format/content', get_post_format());

								endwhile;

								the_posts_pagination(array(

									'prev_text'          => esc_html__('Previous page', 'nt-amaze'),

									'next_text'          => esc_html__('Next page', 'nt-amaze'),

									'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__('Page', 'nt-amaze') . ' </span>',

								));

							else :

								get_template_part('content', 'none');

							endif;

							?>

							</div>

							<?php if ($nt_amaze_archivelayout == 'right-sidebar' || $nt_amaze_archivelayout == '') { ?>


								<?php do_action('my_custom_html_right', $language); ?>

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

				<?php if ($nt_amaze_archivelayout == 'right-sidebar' || $nt_amaze_archivelayout == '') { ?>

					<div class="col-md-9 index float-right margin-b-50">

						<div class="row masonry-blog">

						<?php } elseif ($nt_amaze_archivelayout == 'left-sidebar') { ?>

							<?php get_sidebar(); ?>

							<div class="col-md-9 index float-left margin-b-50">

								<div class="row masonry-blog">

								<?php } elseif ($nt_amaze_archivelayout == 'full-width') { ?>

									<div class="col-xs-12 full-width-index v margin-b-50">

										<div class="row masonry-blog">

										<?php } ?>

										<?php if (have_posts()) : ?>

										<?php while (have_posts()) : the_post();

												get_template_part('post-format/content', get_post_format());

											endwhile;

											the_posts_pagination(array(

												'prev_text'          => esc_html__('Previous page', 'nt-amaze'),

												'next_text'          => esc_html__('Next page', 'nt-amaze'),

												'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__('Page', 'nt-amaze') . ' </span>',

											));

										else :

											get_template_part('content', 'none');

										endif;

										?>

										</div>

									</div>

									<?php if ($nt_amaze_archivelayout == 'right-sidebar' || $nt_amaze_archivelayout == '') { ?>

										<?php do_action('my_custom_html_right', $language); ?>

									<?php } ?>

								</div>

							</div>

	</section>

<?php endif; ?>

<!--page masonry content type-->



<!--page footer widgetize-->

<?php if (ot_get_option('nt_amaze_top_footerwd') == 'on') {

	echo get_template_part('template-part/footer-widgetize');



	if (ot_get_option('nt_amaze_top_footerwd') != 'on') {

		echo '<div class="space-40"></div>';
	}
}

?>



<!--page footer-->

<?php get_template_part('footer-content'); ?>

<?php get_footer(); ?>