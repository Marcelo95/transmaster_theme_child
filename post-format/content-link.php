<?php
	/**
	* The template for displaying posts in the Link post format.
	*
	* @package WordPress
	* @subpackage nt_amaze
	* @since nt_amaze 1.0
	*/


	$nt_amaze_image_id 			= get_post_thumbnail_id();
	$nt_amaze_image_url 		= wp_get_attachment_image_src( $nt_amaze_image_id, true );

	$nt_amaze_link 				= rwmb_meta( 'nt_amaze_the_link',			'type=text' );
	$nt_amaze_color 			= rwmb_meta( 'nt_amaze_link_bg',			'type=color' );
	$nt_amaze_opacity 			= rwmb_meta( 'nt_amaze_link_bg_opacity',	'type=slider' );
	$nt_amaze_opacity 			= $nt_amaze_opacity / 100;

	$nt_amaze_show_link_post_content 	= rwmb_meta('nt_amaze_show_link_post_heading', 	'type=select');
	$nt_amaze_show_link_meta 			= rwmb_meta('nt_amaze_show_link_meta', 			'type=select');
	$nt_amaze_show_link_social_icons 	= rwmb_meta('nt_amaze_show_link_social_icons', 	'type=select');
?>

<?php if ( ( ot_get_option( 'nt_blog_post_type' ) == 'masonry' ) && ( ! is_single() ) ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-sm-6 margin-b-30 masonry-post'); ?>>
	<div class="post-link post-bordered">
	<?php elseif ( ( ot_get_option( 'nt_blog_post_type' ) == 'default' ) || ( ot_get_option( 'nt_blog_post_type' ) == '' ) ) :  ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('margin-b-40'); ?>>
	<div class="post-link post-bordered">
	<?php else :  ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('margin-b-40'); ?>>
	<div class="post-link post-bordered">
<?php endif; ?>
	<?php if( has_post_thumbnail() ) : ?>
		<div class="post-thumb">
			<div class="ql_wrapper">
				<div class="entry-media" <?php if( has_post_thumbnail() ) : ?> style="background-image: url(<?php echo esc_url( $nt_amaze_image_url[0] ); ?>); " <?php endif; ?>>
					<div class="ql_overlay" style="background-color: <?php echo esc_attr($nt_amaze_color); ?>; opacity: <?php echo esc_attr($nt_amaze_opacity); ?>;"></div>
					<div class="row blog-custom-class wow fadeInUp margin-b-none">
						<div class="ql_textwrap">
				<?php
					if ( ! is_single() ) :
					 the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
					endif;
				?>
							<p><a href="<?php echo esc_url( $nt_amaze_link ); ?>" target="_blank" style="color: #ffffff;"><?php echo esc_html( $nt_amaze_link ); ?></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="post-content">
			<?php if( $nt_amaze_show_link_post_content == 'value1' || $nt_amaze_show_link_post_content == '' ) : ?>
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					esc_html__( 'Continue reading %s', 'nt-amaze' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );
				wp_link_pages( array(
					'before'      => '<div class="post-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'nt-amaze' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'nt-amaze' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			?>
			<?php endif; ?>

			<div class="text-right">
				<?php if ( ! is_single() ) : ?>
					<a class="btn btn-link" href="<?php echo esc_url( get_permalink() ); ?>" role="button"><?php esc_html_e( 'Continue...', 'nt-amaze' ); ?></a>
				<?php endif; // is_single() ?>
			</div>

			<?php if( $nt_amaze_show_link_meta == 'value1' || $nt_amaze_show_link_meta == '' ) : ?>
			<hr>
			<ul class="list-inline post-meta">
				<li><a href="<?php echo esc_url( get_permalink() ); ?>"><i class="ion-person"></i> <?php the_author(); ?></a></li>
			<?php if ( get_comments_number() != 0 ): ?>
				<li><a href="<?php get_comments_link(); ?>"><i class="ion-chatbubbles"></i> <?php comments_number( '0', '1', '%' ); ?> <?php esc_html_e( 'Comments', 'nt-amaze' ); ?></a></li>
			<?php endif; ?>
			<?php if ( has_tag() ) : ?>
				<li><a href="<?php echo esc_url( get_permalink() ); ?>"><i class="ion-pricetag"></i> <?php the_tags( '', ' | ', '</li> '); ?></a></li>
			<?php endif; ?>
			</ul>
			<?php endif; ?>

			<?php if( $nt_amaze_show_link_social_icons == 'value1' || $nt_amaze_show_link_social_icons == '' ) : ?>
			  <?php do_action( 'nt_amaze_social_icons' ); ?>
			<?php endif; ?>

		</div><!--post content-->
	</div><!--post-->
</article><!-- #post-## -->
