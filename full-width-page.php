<?php
/**
 * Template Name: Full-width, no sidebar.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package IFN
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
	<div class="row">

        <div class="col-md-8 col-md-offset-2 col-sm-11 col-xs-10 col-xs-offset-1 blog-main">

          <div class="blog-post">	
				<?php get_template_part( 'content', 'page' ); ?>
		  </div><!--blog-post-->
		</div><!--blog-main-->
	</div><!--row-->	

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	</div><!--container-->

<?php get_footer(); ?>
