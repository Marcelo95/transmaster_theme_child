<?php

get_header();



 if ( ot_get_option( 'nt_blog_post_type' ) == 'masonry' ) {

	wp_enqueue_script( 'theme-masonry' );

	wp_enqueue_script( 'custom-masonry' );

 }

 $nt_amaze_menu_sticky = ot_get_option( 'nt_amaze_menu_sticky' );

?>

	<?php if ( $nt_amaze_menu_sticky == 'top' || $nt_amaze_menu_sticky == 'topstatic' ) : ?>

		<?php get_template_part( 'sticky-header' );?>

	<?php endif; ?>



	<!--page header-->

	<div class="dzsparallaxer auto-init" data-options='{ direction: "reverse" }'>

		<div class="divimage dzsparallaxer--target"></div>

		<div class=" parallax-text center-it">



			<!--page title-->

			<?php if ( ot_get_option( 'nt_amaze_blog_disable_heading' ) != 'off' ) : ?>

				<?php if ( ot_get_option( 'nt_amaze_blog_heading' ) != '' ) : ?>

					<h2 class="font-700"><?php echo ( ot_get_option( 'nt_amaze_blog_heading' ) ); ?></h2>

				<?php else : ?>

					<h2 class="font-700"><?php bloginfo( 'name' ); ?></h2>

				<?php endif; ?>

			<?php endif; ?>



			<!--page subtitle-->

			<?php if ( ot_get_option( 'nt_amaze_blog_slogan_visibility' ) != 'off' ) : ?>

				<?php if ( ot_get_option( 'nt_amaze_blog_slogan' ) != '' ) : ?> 

					<p class="text-muted blog-muted"><?php echo ( ot_get_option( 'nt_amaze_blog_slogan' )); ?></p>

				<?php else : ?>

					<p class="text-muted blog-muted"><?php bloginfo( 'description' ); ?></p>

				<?php endif; ?>

			<?php endif; ?>



		</div>

	</div>

	<!--/page header-->

	<?php 
      $category_id = get_cat_ID('english');
	  query_posts( [
		  'category__not_in' => $category_id
	  ]);


?>




	<!--logo and sticky-header-->

	<?php if ( $nt_amaze_menu_sticky == 'sticky' || $nt_amaze_menu_sticky == 'bottomstatic' || $nt_amaze_menu_sticky == '' ) : ?>

		<?php get_template_part( 'sticky-header' );?>

	<?php endif; ?>

	<?php if ( $nt_amaze_menu_sticky == 'top'  || $nt_amaze_menu_sticky == 'topstatic' || $nt_amaze_menu_sticky == '' ) : ?>

		<div class="space-90"></div>

	<?php endif; ?>

	<!--page default content type-->

	<?php if ( ( ot_get_option( 'nt_blog_post_type' ) == 'default' ) || ( ot_get_option( 'nt_blog_post_type' ) == '' ) ) : ?>

    <section class="section-blog">

        <div class="container">

            <div class="row">

					<?php if( ot_get_option( 'nt_amaze_bloglayout' ) == 'right-sidebar' || ot_get_option( 'nt_amaze_bloglayout' ) == '') { ?>

					<div class="col-md-9 col-sm-12 index float-right margin-b-50">

					<?php } elseif( ot_get_option( 'nt_amaze_bloglayout' ) == 'left-sidebar') { ?>

					<?php get_sidebar(); ?>

					<div class="col-md-9 col-sm-12 index float-left margin-b-50">

					<?php } elseif( ot_get_option( 'nt_amaze_bloglayout' ) == 'full-width') { ?>

					<div class="col-xs-12 full-width-index v margin-b-50">

					<?php } ?>

					<?php if ( have_posts() ) : ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'post-format/content', get_post_format() ); ?>

						<?php endwhile; ?>

						<?php the_posts_pagination( array(

								'prev_text'          => esc_html__( 'Previous page', 'nt-amaze' ),

								'next_text'          => esc_html__( 'Next page', 'nt-amaze' ),

								'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',

							) ); ?>

					<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>

					</div>

					<?php if( ot_get_option( 'nt_amaze_bloglayout' ) == 'right-sidebar' || ot_get_option( 'nt_amaze_bloglayout' ) == '') { ?>

					<?php get_sidebar(); ?>

				<?php } ?>

			</div>

		</div>

	</section>

	<!--page default content type-->



	<!--page masonry content type-->

	<?php elseif ( ot_get_option( 'nt_blog_post_type' )== 'masonry' ) :  ?>

    <section class="section-blog">

        <div class="container">

            <div class="row">

					<?php if( ot_get_option( 'nt_amaze_bloglayout' ) == 'right-sidebar' || ot_get_option( 'nt_amaze_bloglayout' ) == '') { ?>

					<div class="col-md-9 index float-right margin-b-50">

						<div class="row masonry-blog">

					<?php } elseif( ot_get_option( 'nt_amaze_bloglayout' ) == 'left-sidebar') { ?>

					<?php get_sidebar(); ?>

					<div class="col-md-9 index float-left margin-b-50">

						<div class="row masonry-blog">

					<?php } elseif( ot_get_option( 'nt_amaze_bloglayout' ) == 'full-width') { ?>

					<div class="col-xs-12 full-width-index v margin-b-50">

						<div class="row masonry-blog">

					<?php } ?>

					

						<?php if ( have_posts() ) : ?>

							<?php while ( have_posts() ) : the_post(); ?>

								<?php get_template_part( 'post-format/content', get_post_format() ); ?>

							<?php endwhile; ?>

							<?php the_posts_pagination( array(

									'prev_text'          => esc_html__( 'Previous page', 'nt-amaze' ),

									'next_text'          => esc_html__( 'Next page', 'nt-amaze' ),

									'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',

								) ); ?>

						<?php else : ?>

						<?php get_template_part( 'content', 'none' ); ?>

						<?php endif; ?>

					

						</div>

					</div>

					

					<?php if( ot_get_option( 'nt_amaze_bloglayout' ) == 'right-sidebar' || ot_get_option( 'nt_amaze_bloglayout' ) == '') { ?>

						<?php get_sidebar(); ?>

					<?php } ?>

			</div>

		</div>

	</section>

	<?php endif; ?>

	<!--page masonry content type-->

	

	<!--page footer widgetize-->

	<?php if ( ot_get_option( 'nt_amaze_top_footerwd') == 'on' ){

		echo get_template_part( 'template-part/footer-widgetize' );



		if ( ot_get_option( 'nt_amaze_top_footerwd' ) == 'on' || ( is_active_sidebar( 'footer' ) ) ) {

		echo '<div class="space-40"></div>';

		}

	}

	?>



<!--page footer-->

<?php get_template_part('footer-content');?>

<?php get_footer();?>