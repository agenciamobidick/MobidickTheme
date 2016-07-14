<?php
/**
 * @package WordPress
 * @subpackage Conexão Inteligente
 * @since Conexão Inteligente 1.0
**/
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<!--[if IE 9]> <html lang="pt-br" class="ie9"> <![endif]-->
		<!--[if IE 8]> <html lang="pt-br" class="ie8"> <![endif]-->
		<!--[if IE 7]> <html lang="pt-br" class="ie7"> <![endif]-->

		<!--[if IE]> 
		    <script type="text/javascript">         
		        document.createElement("header");        
		        document.createElement("section");
		        document.createElement("article");
		        document.createElement("aside");
		        document.createElement("nav");        
		        document.createElement("figure");
		        document.createElement("legend");
		        document.createElement("footer");
		    </script> 
	    <![endif] -->

	    <?php if (have_posts()):while(have_posts()):the_post(); endwhile; endif;?>
			<!-- the default values -->
			<meta property="fb:app_id" content="1018692624818786" />
			<meta property="fb:admins" content="100008209847217" />
			 
		<!-- if page is content page -->
		<?php if ( is_single() ){ ?>
			<meta property="og:url" content="<?php the_permalink() ?>"/>
			<meta property="og:title" content="<?php single_post_title(''); ?>" />
			<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
			<meta property="og:type" content="article" />
			<meta property="og:image" content="<?php if (function_exists('wp_get_attachment_thumb_url')) {echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); }?>" />
			 
		<!-- if page is others -->
		<?php }else{ ?>
			<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
			<meta property="og:description" content="<?php bloginfo('description'); ?>" />
			<meta property="og:type" content="website" />
			<meta property="og:image" content="logo.jpg" /> 
		<?php } ?>

	    <!-- Meta -->
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	

		<title><?php wp_title('-', true, 'right'); bloginfo() ?></title>
		
		<link rel="profile" href="http://gmpg.org/xfn/11" />	
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php if(is_page(304)):?>
			<link href="<?php bloginfo('template_directory'); ?>/css/jquery-ui.css" rel="stylesheet">
		<?php endif?>		
		<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );?>
		<?php wp_head(); ?>	

		<script>
			if(typeof jQuery == 'undefined'){
				window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"><\/script>')
			}
		</script>
	</head>

	<body
		<?php 
			if (function_exists('identificaBodyID')){
				identificaBodyID();
			}body_class();
		?>
	>
	

		<div id="all">
			<header id="header">

			</header>


			<section id="main">