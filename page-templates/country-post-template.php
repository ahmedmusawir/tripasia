<?php
/**
 * Template Name: Country Post Template 
 *
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title pull-left">
					<?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'twentyfourteen' ), get_the_date() );

						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'twentyfourteen' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyfourteen' ) ) );

						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'twentyfourteen' ), get_the_date( _x( 'Y', 'yearly archives date format', 'twentyfourteen' ) ) );

						else :
							_e( 'More Countries to visit ...', 'twentyfourteen' );

						endif;
					?>
				</h1>
			</header><!-- .page-header -->

			<?php

			/*========================================================
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
		

				

			
			/*-----  End of This is my Shit from wp codex site  ------*/


					// Start the Loop.
					while ( $countrys->have_posts() ) : $countrys->the_post();
						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', 'country' );
						// get_template_part( 'content', get_post_format() );

					endwhile;

					wp_reset_postdata();
					// Previous/next page navigation.
					twentyfourteen_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
		</div><!-- #content -->
	</section><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
