<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	
	<!-- Meta Data -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- favicons -->
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/production/img/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/production/img/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/production/img/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/production/img/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/production/img/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/production/img/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/production/img/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/production/img/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/production/img/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_stylesheet_directory_uri(); ?>/production/img/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/production/img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri(); ?>/production/img/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/production/img/favicon-16x16.png">

	<!-- Trackback -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php
		if(get_theme_mod( 'streamium_social_twitter_enabled' )){

			$twitter_url    = get_permalink();
	 		$twitter_title  = get_the_title();
	 		$twitter_desc   = get_the_content();
	 		$twitter_thumbs = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), full );
	 		$twitter_name   = get_theme_mod( 'streamium_social_twitter_handler', '@s3bubble' );
            
            // Check if video is in a series
	 		if(isset($_GET['v'])){

	            $id             = $_GET['v'];
	 			$episodes       = get_post_meta(get_the_ID(), 'repeatable_fields' , true);
	 			$twitter_url    = get_permalink() . '?v=' . $id;
				$twitter_title  = $episodes[$id]['titles'];
				$twitter_desc   = wp_trim_words( strip_tags($episodes[$id]['descriptions']), $num_words = 21, $more = null );
				$twitter_thumbs = $episodes[$id]['thumbnails'];

	 		}
	?><!-- Twitter cards -->
	<meta name="twitter:card" value="summary" />
	<meta name="twitter:url" value="<?php echo $twitter_url; ?>" />
	<meta name="twitter:title" value="<?php echo $twitter_title; ?>" />
	<meta name="twitter:description" value="<?php echo $twitter_desc; ?>" />
	<meta name="twitter:image" value="<?php echo $twitter_thumbs; ?>" />
	<meta name="twitter:site" value="<?php echo $twitter_name; ?>" />
	<meta name="twitter:creator" value="<?php echo $twitter_name; ?>" />
	<? } ?>
	
	<!-- Wordpress Scripts -->
	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>