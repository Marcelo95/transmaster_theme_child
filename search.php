<?php

get_header();



$nt_amaze_searchlayout = ot_get_option('nt_amaze_searchlayout');

$nt_amaze_menu_sticky = ot_get_option('nt_amaze_menu_sticky');

?>

<?php

$language = 'pt-BR';

if (isset($_GET['lang'])){
    $language = $_GET['lang'];
}


?>


<?php if ($nt_amaze_menu_sticky == 'top' || $nt_amaze_menu_sticky == 'topstatic') : ?>

	<?php get_template_part('sticky-header'); ?>

<?php endif; ?>



<!--page header-->

<div class="dzsparallaxer auto-init" data-options='{ direction: "reverse" }'>

	<div class="divimage dzsparallaxer--target "></div>

	<div class=" parallax-text center-it">



		<!--page title-->

		<?php if (ot_get_option('nt_amaze_search_disable_heading') != 'off') : ?>

			<?php if (ot_get_option('nt_amaze_search_heading') != '') : ?>

				<h2 class="font-700"><?php echo (ot_get_option('nt_amaze_search_heading')); ?></h2>

			<?php else : ?>

				<h2 class="font-700"><?php echo esc_html($wp_query->found_posts); ?> <?php esc_html_e('Search Results Found For', 'nt-amaze'); ?>: "<?php the_search_query(); ?>"</h2>

			<?php endif; ?>

		<?php endif; ?>



		<!--page subtitle-->

		<?php if (ot_get_option('nt_amaze_search_slogan_visibility') != 'off') : ?>

			<?php if (ot_get_option('nt_amaze_search_slogan') != '') : ?>

				<p class="text-muted blog-muted"><?php echo (ot_get_option('nt_amaze_search_slogan')); ?></p>

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



<!--page content-->

<section class="section-search">

	<div class="container">

		<h4 class=""> <?php echo $language == "en" ? "Results" : "Resultados encontrado:"; ?>  
			<div class="border-width"></div>
			<div class="space-10"></div>
		</h4>

		<div class="row">

			<?php if ($nt_amaze_searchlayout == 'right-sidebar' || $nt_amaze_searchlayout == '') { ?>

				<div class="col-md-9 index float-right posts margin-b-50">

				<?php } elseif ($nt_amaze_searchlayout == 'left-sidebar') { ?>

					<?php get_sidebar(); ?>

					<div class="col-md-9 index float-left posts margin-b-50">

					<?php } elseif ($nt_amaze_searchlayout == 'full-width') { ?>

						<div class="col-xs-12 full-width-index v margin-b-50">

						<?php } ?>

						<?php if (have_posts()) : ?>

						<?php

							// Start the loop.

							while (have_posts()) : the_post();

								get_template_part('content', 'search');

							// End the loop.

							endwhile;

							// Previous/next page navigation.

							the_posts_pagination(array(

								'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__('Page', 'nt-amaze') . ' </span>',

							));

						// If no content, include the "No posts found" template.

						else :

							get_template_part('content', 'none');

						endif;

						?>

						<?php wp_link_pages(); ?>

						</div><!-- #end sidebar+ content -->

						<?php if ($nt_amaze_searchlayout == 'right-sidebar' || $nt_amaze_searchlayout == '') { ?>

							<?php  do_action('my_custom_html_right', $language); ?>

						<?php } ?>

					</div>

				</div>

</section>

<!--/page content-->



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