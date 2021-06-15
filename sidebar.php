<?php if ( ! isset( $content_width ) ) $content_width = 900; ?>	
	<div class="sidebar">

			<div class="sidebar-box">
				<h2>User Profile</h2>
				<hr>
				<div class="profile-box">
					<div class="avatar-96">
					<?php echo get_avatar(get_the_author_meta('ID'));?>
					</div>
					<h2 class="name"><?php the_author_posts_link();?></h2>
					<p><?php the_author_meta('description');?></p>
					<div class="social-box">
						<span class="fab fa-facebook-f"><a href="<?php the_author_meta('facebook');?>">facebook</a></span>
						<span class="fab fa-twitter"><a href="<?php the_author_meta('twitter');?>">twitter</a></span>
						<span class="fab fa-instagram"><a href="<?php the_author_meta('instagram');?>">instagram</a></span>
						<span class="fab fa-pinterest"><a href="<?php the_author_meta('pinterest');?>">pinterest</a></span>
						<span class="fab fa-linkedin"><a href="<?php the_author_meta('linkedin');?>">linkedin</a></span>
						<span class="fab fa-youtube"><a href="<?php the_author_meta('youtube');?>">youtube</a></span>
					</div>
				</div>
			</div>




		<div class="sidebar-box">
			<h2>Popular Post</h2>
			<hr>
			<?php 
				$rand = new wp_query(array(
					'post_type' => 'post',
					'posts_per_page' => 5,
					'orderby' => 'rand'
				));
				if(have_posts()): while($rand-> have_posts()): $rand-> the_post();
			?>
			<div class="popular">
				<?php the_post_thumbnail();?>
				<span><a href="<?php the_permalink();?>"><?php the_title();?></a></span>
			</div>
			<hr>
		<?php endwhile;
			endif;
		?>


		</div>

	<!--sidebar widget-->
			<?php dynamic_sidebar('sidebar-widget-one');?>




	</div>