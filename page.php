<?php get_header(); ?>


		<!--home content-->
<div class="blog">
	<!--post area-->
	<div class="post">
		<div class="single-post">
			<?php if (have_posts()) : while(have_posts()) : the_post(); ?>

			<h2><?php the_title(); ?></h2>
			<div class="post-data">
				<span class="far fa-calendar-alt"><a href=""> <?php the_date(); ?></a></span>
				<span class="far fa-list-alt"><a href=""> list</a></span>
				<span class="far fa-user"><a href=""> <?php the_author(); ?></a></span>
			</div>
			<?php the_content(); ?>
	


			<?php endwhile; ?>
			<?php endif; ?>
		</div>

		<!--related post-->
		<h2>Related post</h2>



	


	</div>
	<!--post area finished-->

	<!--start sidebar-->

		<?php get_template_part('sidebar'); ?>

	</div>
	<!--end sidebar-->


</div>







<!--footer section-->
<?php get_footer(); ?>