<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package IFN
 */

get_header(); ?>
	<div class="container">
		<div id="page-top-border" class="col-md-12"></div>
	</div><!--container-->
	
	<div class="container">
		<div id="page-main-content" class="col-md-9">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
		
					<?php while ( have_posts() ) : the_post(); ?>
			<div class="row">
		
				<div class="blog-main">
		
				  <div class="blog-post">	
						<?php get_template_part( 'content', 'page' ); ?>
				  </div><!--blog-post-->
				</div><!--blog-main-->
			</div><!--row-->	

			<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->
	</div> <!--page-main-content-->
	
		<div id="page-right-sidebar" class="col-md-3">
			<div id="ifn-announcements">
      		<?php /*Announcements are held in a custom post type named ifn_announcement. Get the most recent announcements*/
			$ifn_announcements = new WP_Query( 'post_type=ifn_announcement&posts_per_page=-1' );
				  while ($ifn_announcements->have_posts()) : $ifn_announcements->the_post();
				  
				  static $announce_count = 0;
				  if ($announce_count == "4") { break; }
				  else {

				  
					$custom_fields = get_post_custom(); ?>
					<div class="ifn-announcement">
					<h2><?php echo $custom_fields['announce_headline'][0];?></h2>
					<p><?php echo $custom_fields['announce_description'][0];?></p>
					<a href="<?php echo $custom_fields['announce_link_url'][0];?>">
					<?php echo $custom_fields['announce_link_text'][0];?>
					</a>
					</div>
					<?php $announce_count++; }?>
					
			<?php endwhile;  wp_reset_query(); ?>
      	</div>
	
		</div><!--page-right-sidebar-->
	</div><!--container-->
	</div><!--container-->

<?php get_footer(); ?>
