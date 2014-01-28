<script>
	jQuery(document).ready(function() {
		jQuery('.carousel').carousel({
		 	interval: 5000
		})
	});
</script>
<?php query_posts('category_name=News'); ?>
<?php if ( have_posts() ) : ?>
	<div id="newsCarousel" class="carousel slide">
		<h4>Latest News</h4>
		<hr>
		<div class="carousel-inner">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ($wp_query->current_post == 0): ?>
					<div class="active item">
						<h4><?php the_title();?></h4>
						<p><?php the_excerpt();?></p>
						<p>
							<a href="<?php the_permalink() ?>">Read More</a>
						</p>
					</div>
				<?php else:?>
					<div class="item">
						<h4><?php the_title();?></h4>
						<?php the_excerpt();?>
						<p>
							<a href="<?php the_permalink() ?>">Read More</a>
						</p>
					</div>	
				<?php endif;?>
			<?php endwhile; ?>
		</div>
	</div>
<?php endif;?>
<?php wp_reset_query(); ?>