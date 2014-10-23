<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Page thumbnail and title.
		// twentyfourteen_post_thumbnail(); //I made this change for full screen image
		the_post_thumbnail('full');

		the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );
	?>

	<div class="entry-content">

	<?php

			/*==========================================================
			=            This is my Shit from wp codex site            =
			==========================================================*/
			
			$args = array(
				'posts_per_page'   => 15,
				'offset'           => 0,
				'category'         => '',
				'category_name'    => 'Featured Country',
				'orderby'          => 'post_date',
				'order'            => 'DESC',
				'include'          => '',
				'exclude'          => '',
				'meta_key'         => '',
				'meta_value'       => '',
				'post_type'        => 'country',
				'post_mime_type'   => '',
				'post_parent'      => '',
				'post_status'      => 'publish',
				'suppress_filters' => true );

				$countrys = new WP_Query( $args );
					echo '<aside id="countrys" class="clear">';
					while ( $countrys->have_posts() ) : $countrys->the_post();
					    echo '<div class="country">';
					    echo '<figure class="country-thumb">';
					    the_post_thumbnail('full');
					    echo '</figure>';
					    echo '<h1 class="entry-title">' . get_the_title() . '</h1>';
					    echo '<div class="entry-content">';
					    the_content();
					    echo '</div>';
					    echo '</div>';
					endwhile;
					echo '</aside>';

				wp_reset_postdata();

			
			/*-----  End of This is my Shit from wp codex site  ------*/
	?>
	
	</div><!-- .entry-content -->
</article><!-- #post-## -->
