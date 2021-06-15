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
				<span class="far fa-user"><a href=""> <?php the_author(); ?></a></span>
			</div>
			<?php the_content(); ?>
			<div class="tag">
			<?php the_tags();?>
			</div>
			<div class="share-button">
				<span><a href="">Share this: </a></span>
				<span class="fab fa-facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=&t=" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;">Facebook</a></span>

				<span class="fab fa-twitter"><a href="https://twitter.com/home?status= " target="_blank" title="twitte" onclick="window.open('https://twitter.com/home?status=' + encodeURIComponent(document.URL) + '&description=' + encodeURIComponent(document.title)); return false;">twitter</a></span>

				<span class="fab fa-linkedin"><a href="http://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' + encodeURIComponent(document.title)); return false;">Linkedin</a></span>
				
				<span class="fab fa-pinterest"><a href="http://pinterest.com/pin/create/button/?url=&description=" target="_blank" title="Pin it" onclick="window.open('http://pinterest.com/pin/create/button/?url=' + encodeURIComponent(document.URL) + '&description=' + encodeURIComponent(document.title)); return false;">Pinterest</a></span>

				<span class="fas fa-envelope"><a href="mailto:info@example.com?&subject=&body=https://hasansir.com/">Email</a></span>
			</div>

			<div class="post-pagination">
					<div >
						<?php previous_post_link('
						<h3>%link</h3>', 'Previous ', false
						);?>
					</div>
					<div >
						<?php next_post_link('
						<h3>%link</h3>', 'Next ', false
						);?>
					</div>									
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>

		<!--related post-->
		<h2>Related post</h2>
		<div class="related-post"> 
	<?php 
			$myTags = wp_get_post_tags($post -> ID);

			if($myTags){
				$finalTag = $myTags[0]->term_id;

				$my_query = new wp_query(array(
					'tag_in' => array($finalTag),
					'post_not_in' => array($post->ID),
					'posts_per_page' => 3,
					'ignore_sticky_posts' =>1
				));

				if($my_query->have_posts()){
					while($my_query->have_posts()): $my_query->the_post(); ?>

			
			<div class="related-post-box">
				<?php the_post_thumbnail();?>
				<span><a href="<?php the_permalink(); ?>"><?php the_title();?></a></span>
			</div>



				<?php 
					endwhile;
				}
				wp_reset_query();
			}
			?>
			</div>	



		<div class="comment">
			<div class=" ">
			<?php comments_template('comments.php', true); ?>

			<!--comment reply-->
			<?php
			if ( is_single('1740') ||
			( !is_home() || !is_front_page() || !is_single() ) ) {
			    wp_enqueue_script( 'comment-reply' );
			} ?>
		</div>

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