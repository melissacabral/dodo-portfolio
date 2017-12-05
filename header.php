<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">

	<?php wp_head(); //HOOK. Required for plugins & the toolbar to work ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
</head>
<body <?php body_class(); ?>>
	<header class="header" style="background-image:url(<?php header_image(); ?>)">
		<div class="header-bar">
			<?php the_custom_logo(); ?>

			<h1 class="site-title"><a href="<?php echo home_url(); ?>">
				<?php bloginfo('name'); ?>				
			</a></h1>
			<h2><?php bloginfo( 'description' ) ?></h2>
			
			<?php 
			//TODO: upgrade this to the fancy menu system
			wp_list_pages(); ?>

			<?php get_search_form(); //default search form OR searchform.php ?>
		</div>
	</header>
	<div class="wrapper">