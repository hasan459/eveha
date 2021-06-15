<?php get_header(); ?>

		<!--home content-->
<div class="blog">
	<!--post area-->
	<div class="post">

		<div class="post-box">
			<div class="post-text">
				<h2>Search results for <b><i><?php _e('', 'eveha'); echo '&quot;'.$s.'&quot;'; ?></i></b> keyword </h2>
			</div>
		</div>


		<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
		<div class="post-box">
			<?php the_post_thumbnail('feature-image'); ?>
			<div class="post-text">
				<h2><?php the_title();?></h2>
				<?php the_excerpt(); ?>
				<span class=""><a href="<?php the_permalink(); ?>">Read more</a></span>
			</div>
		</div>


		<?php endwhile; ?>
		<?php endif; ?>


		<div class="post-box">
			<?php  the_posts_pagination();		 ?>
		</div>

	</div>
	<!--post area finished-->


	<!--start sidebar-->

		<?php get_template_part('sidebar'); ?>

	</div>
	<!--end sidebar-->


</div>







<!--footer section-->
<?php get_footer(); ?>