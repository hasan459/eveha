<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?php bloginfo('name'); ?></title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"  />
		<meta name="viewport" content="width=device-width, initial-scale-1">
		<meta charset="<?php bloginfo('charset');?>">		
		<?php wp_head();?>
	</head>
<body <?php body_class();?>>
		 <?php wp_body_open(); ?>


		<!--menu-->
				<?php get_template_part('template-part/menu'); ?>



		<!--header bottom-->
		<div class="header-bottom">
			<div class="title"><h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php  bloginfo('title'); ?></a></h1></div>
			<div class="header-widget">	
			</div>
			<!--footer widget-->
			<?php dynamic_sidebar('header-widget');?>
		</div>