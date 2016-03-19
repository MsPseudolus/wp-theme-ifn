<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package IFN
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<div id="ifn-footer" class="col-md-12">
			<div id="first-footer-menu" class="col-md-3">
			<?php wp_nav_menu( array('menu' => 'Footer Menu 1' )); ?>
			</div><!--first-footer-menu-->
			
			<div id="second-footer-menu" class="col-md-3">
			<?php wp_nav_menu( array('menu' => 'Footer Menu 2' )); ?>
			</div><!--second-footer-menu-->
			
			<div id="third-footer-menu" class="col-md-3">
			<?php wp_nav_menu( array('menu' => 'Footer Menu 3' )); ?>
			</div><!--third-footer-menu-->
			
			<div id="fourth-footer-menu" class="col-md-3">
			<?php wp_nav_menu( array('menu' => 'Footer Menu 4' )); ?>
			</div><!--third-footer-menu-->
			
		</div><!--ifn-footer-->
	
		<div class="site-info col-md-12">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'ifn' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'ifn' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme built on: %1$s by %2$s.', 'ifn' ), 'IFN', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</div><!--container-->	
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
