<?php
/**
 * Template Name: Front Page
 *
 * @package IFN
 */

get_header(); 

/*the important page content elements are held in custom fields in the page - get the contents of all the page custom fields and hold in an array*/
	$custom_fields = get_post_custom();
	

?>
<div id="front-page">
	<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background: url(<?php echo $custom_fields['hero_image'][0];?>) center no-repeat;">
      <div class="container">
      	<div class="hero-text-wrapper col-lg-6 col-md-7 col-sm-12 col-xs-12">
        <h1><?php echo $custom_fields['hero_headline'][0];?></h1>
        <p><?php echo $custom_fields['hero_text'][0];?> </p>
        <!--<p><a class="btn btn-success btn-lg" role="button">Learn more &raquo;</a></p>-->
        </div>
      </div>
    </div>

    <div id="front-page-svcs" class="container">
    	<div class="col-md-9" id="services-grid">
		  <!-- First row -->
		  <div class="row row-1">
			<div class="col-md-3">
			  <h2><?php echo $custom_fields['feature_1_heading'][0];?></h2>
			  <p class="ifn-feature-text"><?php echo $custom_fields['feature_1_text'][0];?></p>
			  <p><a class="btn btn-success" href="<?php echo $custom_fields['feature_1_button_link'][0];?>" role="button"><?php echo $custom_fields['feature_1_button_text'][0];?></a></p>
			</div>
			<div class="col-md-3">
			  <h2><?php echo $custom_fields['feature_2_heading'][0];?></h2>
			  <p class="ifn-feature-text"><?php echo $custom_fields['feature_2_text'][0];?></p>
			  <p><a class="btn btn-success" href="<?php echo $custom_fields['feature_2_button_link'][0];?>" role="button"><?php echo $custom_fields['feature_2_button_text'][0];?></a></p>
		   </div>
			<div class="col-md-3">
			  <h2><?php echo $custom_fields['feature_3_heading'][0];?></h2>
			  <p class="ifn-feature-text"><?php echo $custom_fields['feature_3_text'][0];?></p>
			  <p><a class="btn btn-success" href="<?php echo $custom_fields['feature_3_button_link'][0];?>" role="button"><?php echo $custom_fields['feature_3_button_text'][0];?></a></p>
			</div>
			<div class="col-md-3">
			  <h2><?php echo $custom_fields['feature_4_heading'][0];?></h2>
			  <p class="ifn-feature-text"><?php echo $custom_fields['feature_4_text'][0];?></p>
			  <p><a class="btn btn-success" href="<?php echo $custom_fields['feature_4_button_link'][0];?>" role="button"><?php echo $custom_fields['feature_4_button_text'][0];?></a></p>
			</div>
		  </div>
		  <!--SECOND ROW-->
		  <div class="row row-2">
			<div class="col-md-3">
			  <h2><?php echo $custom_fields['feature_5_heading'][0];?></h2>
			  <p class="ifn-feature-text"><?php echo $custom_fields['feature_5_text'][0];?></p>
			  <p><a class="btn btn-success" href="<?php echo $custom_fields['feature_5_button_link'][0];?>" role="button"><?php echo $custom_fields['feature_5_button_text'][0];?></a></p>
			</div>
			<div class="col-md-3">
			  <h2><?php echo $custom_fields['feature_6_heading'][0];?></h2>
			  <p class="ifn-feature-text"><?php echo $custom_fields['feature_6_text'][0];?></p>
			  <p><a class="btn btn-success" href="<?php echo $custom_fields['feature_6_button_link'][0];?>" role="button"><?php echo $custom_fields['feature_6_button_text'][0];?></a></p>
		   </div>
			<div class="col-md-3">
			  <h2><?php echo $custom_fields['feature_7_heading'][0];?></h2>
			  <p class="ifn-feature-text"><?php echo $custom_fields['feature_7_text'][0];?></p>
			  <p><a class="btn btn-success" href="<?php echo $custom_fields['feature_7_button_link'][0];?>" role="button"><?php echo $custom_fields['feature_7_button_text'][0];?></a></p>
			</div>
			<div class="col-md-3">
			  <h2><?php echo $custom_fields['feature_8_heading'][0];?></h2>
			  <p class="ifn-feature-text"><?php echo $custom_fields['feature_8_text'][0];?></p>
			  <p><a class="btn btn-success" href="<?php echo $custom_fields['feature_8_button_link'][0];?>" role="button"><?php echo $custom_fields['feature_8_button_text'][0];?></a></p>
			</div>
		  </div>
      </div><!--left side-->
      <div class="col-md-3" id="front-page-right">
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
      </div><!--right side-->
	</div>	
</div>	
		<?php get_footer(); ?>