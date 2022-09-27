<?php
	/**
	* The template for displaying posts in the Aside post format.
	*
	* @package WordPress
	* @subpackage nt_amaze
	* @since nt_amaze 1.0
	*/
?>

<!-- Start .hentry -->
<?php if ( ( ot_get_option( 'nt_blog_post_type' ) == 'masonry' ) && ( ! is_single() ) ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-sm-6 margin-b-30 masonry-post'); ?>>
	<div class="post-aside post-bordered">
	<?php elseif ( ( ot_get_option( 'nt_blog_post_type' ) == 'default' ) || ( ot_get_option( 'nt_blog_post_type' ) == '' ) ) :  ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('margin-b-40'); ?>>
	<div class="post-aside post-bordered">
	<?php else :  ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('margin-b-40'); ?>>
	<div class="post-aside post-bordered">
<?php endif; ?>
		<div class="hentry-box">
			<div class="entry-wrap">
				<div class="entry-content">
					<?php
						the_content(esc_html__('Read More', 'nt-amaze'));

						wp_link_pages( array(
						'before'      => '<div class="post-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'nt-amaze' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'nt-amaze' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
						) );
					?>
				</div>
			</div>
		</div>

		  <?php do_action( 'nt_amaze_social_icons' ); ?>
</article>
