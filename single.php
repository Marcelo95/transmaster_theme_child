<?php 

	get_header();



    $nt_amaze_postlayout = ot_get_option( 'nt_amaze_postlayout' );

	$nt_amaze_menu_sticky = ot_get_option( 'nt_amaze_menu_sticky' );

?>



	<?php if ( $nt_amaze_menu_sticky == 'top' || $nt_amaze_menu_sticky == 'topstatic' ) : ?>

		<?php get_template_part( 'sticky-header' );?>

	<?php endif; ?>



	<!--page header-->

	<div class="dzsparallaxer auto-init" data-options='{ direction: "reverse" }'>

		<div class="divimage dzsparallaxer--target "></div>

		<div class=" parallax-text center-it">



			<!--page title-->

			<?php if ( ot_get_option( 'nt_amaze_single_disable_heading' ) != 'off' ) : ?>

				<h2 class="font-700"><?php echo the_title();?></h2>

			<?php endif; ?>



			<!-- Start breadcrumb -->

			<?php if ( ot_get_option( 'nt_amaze_breadcrubms_visibility' ) != 'off' ) : ?>

				<?php if ( function_exists( 'bcn_display' ) ) : ?>

					<p class="breadcrubms"><?php bcn_display(); ?></p>

				<?php else : ?>

					<?php if ( function_exists( 'nt_amaze_breadcrubms' ) ) : ?>

						<p class="breadcrubms"><?php nt_amaze_breadcrubms(); ?></p>

					<?php endif; ?>

				<?php endif; ?>

			<?php endif; ?>



		</div>

	</div>

	<!--/page header-->



	<!--logo and sticky-header-->

	<?php if ( $nt_amaze_menu_sticky == 'sticky' || $nt_amaze_menu_sticky == 'bottomstatic' || $nt_amaze_menu_sticky == '' ) : ?>

		<?php get_template_part( 'sticky-header' );?>

	<?php endif; ?>

	<?php if ( $nt_amaze_menu_sticky == 'top'  || $nt_amaze_menu_sticky == 'topstatic' || $nt_amaze_menu_sticky == '' ) : ?>

		<div class="space-90"></div>

	<?php endif; ?>



	<!--page content-->

    <section class="section-blog">

        <div class="container">

            <div class="row">

				<?php if ( $nt_amaze_postlayout == 'right-sidebar' || $nt_amaze_postlayout == '' ) { ?>

				<div class="col-md-9 col-sm-12 index float-right posts margin-b-90">

				<?php } elseif ( $nt_amaze_postlayout == 'left-sidebar' ) { ?>

				<?php get_sidebar(); ?>

				<div class="col-md-9 col-sm-12 index float-left posts margin-b-90">

				<?php } elseif ( $nt_amaze_postlayout == 'full-width' ) { ?>

				<div class="col-xs-12 full-width-index v margin-b-50">

				<?php } ?>

				<!-- get_post_format= <?php echo get_post_format(); ?>  -->
				<?php 

					while ( have_posts() ) : the_post();

						get_template_part( 'post-format/content', get_post_format() );

						if ( comments_open() || '0' != get_comments_number() ) :

							// hiddem comments
							//comments_template();

						endif;

					endwhile; // end of the loop.

					nt_amaze_post_nav();  // single post navigation

				?>

				</div><!-- #end sidebar+ content -->

				<?php if ( $nt_amaze_postlayout == 'right-sidebar' || $nt_amaze_postlayout == '' ) { ?>

					<?php get_sidebar(); ?>

				<?php } ?>

			</div>

		</div>

	</section>

	<!--/page content-->



	<!--page footer widgetize-->

	<?php if ( ot_get_option( 'nt_amaze_top_footerwd' ) == 'on' ){

		echo get_template_part( 'template-part/footer-widgetize' );



		if ( ot_get_option( 'nt_amaze_top_footerwd' ) != 'on' ) {

		echo '<div class="space-40"></div>';

		}

	}

	?>



<!--page footer-->

<?php get_template_part('footer-content');?>

<?php get_footer();?>