<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blue-river-woods
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
			the_content();
		?>
		<div class="row">
			<div class="col-sm-4"> 
				<?php the_field('feature_1'); ?>
			</div>
			<div class="col-sm-4"> 
				<?php the_field('feature_2'); ?>
			</div>
			<div class="col-sm-4"> 	
				<?php the_field('feature_3'); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-5 col-sm-offset-1"> 
				<a href="http://gladheartrealty.com/" target="_blank">
					<img src="../wp-content/themes/blue-river-woods/images/ghr-logo.png">
				</a>
			</div>
			<div class="col-sm-5"> 
				<img src="../wp-content/themes/blue-river-woods/images/ghr-logo.png">
			</div>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
