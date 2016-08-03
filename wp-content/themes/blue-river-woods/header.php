<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blue-river-woods
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include_once("analyticstracking.php") ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="container">
	<header class="jumbotron" id="header" role="banner">
		<div class="container">
			<?php the_field('header_content'); ?>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->
	<?php if ( has_nav_menu( 'primary' ) ) { ?>

	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
		</div>
		<?php 
			wp_nav_menu( array(	
				'theme_location'	=> 'primary',
				'depth'             => 2,
				'container'         => 'div',
				'container_class'   => 'collapse navbar-collapse',
				'container_id'      => 'bs-example-navbar-collapse-1',
				'menu_class'        => 'nav navbar-nav',
				'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				'walker'            => new wp_bootstrap_navwalker())
			); 
		?>
		</div>
	</nav>
	<?php } ?>

	<div id="content" class="site-content">
