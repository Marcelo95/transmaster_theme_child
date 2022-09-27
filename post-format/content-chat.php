<?php
	/**
	* The default template for displaying content
	*
	* Used for both single and index/archive/search.
	*
	* @package WordPress
	* @subpackage nt_amaze
	* @since nt_amaze 1.0
	*/
	$nt_amaze_show_chat_post_heading 	= rwmb_meta('nt_amaze_show_chat_post_heading', 		'type=select');
	$nt_amaze_show_chat_post_content 	= rwmb_meta('nt_amaze_show_chat_post_content', 		'type=select');
	$nt_amaze_show_chat_meta 			= rwmb_meta('nt_amaze_show_chat_meta', 				'type=select');
	$nt_amaze_show_chat_social_icons 	= rwmb_meta('nt_amaze_show_chat_social_icons', 		'type=select');
?>

<?php if ( ( ot_get_option( 'nt_blog_post_type' ) == 'masonry' ) && ( ! is_single() ) ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-sm-6 margin-b-30 masonry-post'); ?>>
	<div class="post-chat post-bordered">
	<?php elseif ( ( ot_get_option( 'nt_blog_post_type' ) == 'default' ) || ( ot_get_option( 'nt_blog_post_type' ) == '' ) ) :  ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('margin-b-40'); ?>>
	<div class="post-chat post-bordered">
	<?php else :  ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('margin-b-40'); ?>>
	<div class="post-chat post-bordered">
<?php endif; ?>

		<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<?php
				$nt_amaze_att=get_post_thumbnail_id();
				$nt_amaze_image_src = wp_get_attachment_image_src( $nt_amaze_att, 'full' );
				$nt_amaze_image_src = $nt_amaze_image_src[0]; ?>
				<img class="img-responsive" src="<?php echo esc_url( $nt_amaze_image_src ); ?>" alt="<?php esc_attr( the_title_attribute() ); ?>">
			<?php  ?>
		</a>
		<?php endif; ?>

		<div class="post-content">

			<?php if( $nt_amaze_show_chat_post_heading == 'value1' || $nt_amaze_show_chat_post_heading == '' ) : ?>
				<?php
					if ( ! is_single() ) :
					 the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
					endif;
				   ?>
			<?php endif; ?>

			<?php if( $nt_amaze_show_chat_post_content == 'value1' || $nt_amaze_show_chat_post_content == '' ) : ?>
			<div class="chat-transcript">
				<?php the_content(__('Read More', 'nt-amaze')); ?>
				<?php wp_link_pages( array( 'before' => '<div class="post-pagination"><em class="page-links-title">' . esc_html__('Pages:', 'nt-amaze' ) . '</em>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
			</div>
			<?php endif; ?>

			<div class="text-right">
				<?php if ( ! is_single() ) : ?>
					<a class="btn btn-link" href="<?php echo esc_url( get_permalink() ); ?>" role="button"><?php esc_html_e( 'Continue...', 'nt-amaze' ); ?></a>
				<?php endif; // is_single() ?>
			</div>

			<?php if( $nt_amaze_show_chat_meta == 'value1'  || $nt_amaze_show_chat_meta == '' ) : ?>
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

			<?php if( $nt_amaze_show_chat_social_icons == 'value1'  || $nt_amaze_show_chat_social_icons == '' ) : ?>
			  <?php do_action( 'nt_amaze_social_icons' ); ?>
			<?php endif; ?>

		</div><!--post content-->
	</div><!--post-->
</article><!-- #post-## -->
