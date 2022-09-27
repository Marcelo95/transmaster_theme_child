<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage nt_amaze
 * @since nt_amaze 1.0
 */
?>


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
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
	<div class="post-standart post-bordered">


		<div class="post-content">
				<?php
					if ( is_single() ) :
					the_title( '<h3 class="entry-title-off all-caps-off">', '</h3>' );
					else :
					the_title( sprintf( '<h3 class="entry-title-off all-caps-off"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
					endif;
				?>

		

		</div><!--post content-->
	</div><!--masonry-post-->
</article><!--masonry-post-article-->