<?php
/**
 * The main template file
 * Template Name: Country Post
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sequel
 * @since Sequel 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

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
?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

				endwhile;
				// Previous/next post navigation.
				twentyfourteen_paging_nav();

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar( 'content' ); ?>
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
