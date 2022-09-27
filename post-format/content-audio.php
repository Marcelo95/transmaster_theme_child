<?php
	$nt_amaze_mp3 		= rwmb_meta( 'nt_amaze_audio_mp3' );
	$nt_amaze_oga 		= rwmb_meta( 'nt_amaze_audio_ogg' );
	$nt_amaze_sc_url 	= rwmb_meta( 'nt_amaze_audio_sc' );
	$nt_amaze_sc_color 	= rwmb_meta( 'nt_amaze_audio_sc_color' );
	$nt_amaze_wp_audio 	= '[audio mp3="'.$nt_amaze_mp3.'"  ogg="'.$nt_amaze_oga.'"]';

	$nt_amaze_show_audio_post_heading 	= rwmb_meta('nt_amaze_show_audio_post_heading');
	$nt_amaze_show_audio_post_content 	= rwmb_meta('nt_amaze_show_audio_post_heading');
	$nt_amaze_show_audio_meta 			= rwmb_meta('nt_amaze_show_audio_meta');
	$nt_amaze_show_audio_social_icons 	= rwmb_meta('nt_amaze_show_audio_social_icons');

	$t_amaze_soundcloud_audio = '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.urlencode($nt_amaze_sc_url).'&amp;show_comments=true&amp;auto_play=false&amp;color='.$nt_amaze_sc_color.'"></iframe>';
?>
<?php if ( ( ot_get_option( 'nt_blog_post_type' )	== 'masonry' ) && ( ! is_single() ) ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-sm-6 margin-b-30 masonry-post'); ?>>
	<div class="post-audio post-bordered">
<?php elseif ( ( ot_get_option( 'nt_blog_post_type' )	== 'default' ) || ( ot_get_option( 'nt_blog_post_type' ) == '' ) ) :  ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('margin-b-40'); ?>>
	<div class="post-audio post-bordered">
<?php else :  ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('margin-b-40'); ?>>
	<div class="post-audio post-bordered">
<?php endif; ?>

		<?php	if( $nt_amaze_sc_url !='' ) : ?>
		<div class="post-thumb blog-bg">
		<?php echo wp_kses( $t_amaze_soundcloud_audio, nt_amaze_allowed_html() ); ?>
		</div>

		<?php else : ?>
		<div class="post-thumb blog-bg">
			<?php if( has_post_thumbnail() ) : the_post_thumbnail(); endif; ?>
			<?php echo do_shortcode ( $nt_amaze_wp_audio ); ?>
		</div>
		<?php endif; ?>

		<div class="post-content">
			<?php if( $nt_amaze_show_audio_post_heading == 'value1' || $nt_amaze_show_audio_post_heading == '' ) : ?>
				<?php
					if ( ! is_single() ) :
					 the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
					endif;
				   ?>
			<?php endif; ?>

			<?php if( $nt_amaze_show_audio_post_content == 'value1' || $nt_amaze_show_audio_post_content == '' ) : ?>
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


			<?php if( $nt_amaze_show_audio_meta == 'value1' || $nt_amaze_show_audio_meta == '' ) : ?>
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

			<?php if( $nt_amaze_show_audio_social_icons == 'value1' || $nt_amaze_show_audio_social_icons == '' ) : ?>
			  <?php do_action( 'nt_amaze_social_icons' ); ?>
			<?php endif; ?>

		</div><!--post content-->
	</div><!--post-->
</article><!-- #post-## -->
