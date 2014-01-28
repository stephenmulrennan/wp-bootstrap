	<?php get_header();?>
		<div class="row">
		<!-- Main hero unit for a primary marketing message or call to action -->
			<div class="col-md-12 jumbotron">
				<div class="row">
					<?php query_posts('post_type=page&meta_key=key&meta_value=welcome');?>
					<?php if ( have_posts() ) : the_post();?>
						<div class="col-md-7">
							<h1><?php the_title();?></h1>
							<p>
								<?php the_excerpt();?>
							</p>
							<p>
								<a href="<?php the_permalink() ?>" class="btn btn-primary">Learn more &raquo;</a>
							</p>
						</div>
					<?php endif; ?>
					<?php wp_reset_query(); ?>
					<div class="col-md-5 hidden-sm">
					  <img class="img-responsive" src="<?php bloginfo('template_directory');?>/images/art/justice.jpg" alt="" />
					  <!--<? include('php/news-widget.php'); ?> -->
					</div>
				</div>
			</div>
		</div>
		<?php query_posts('category_name=Home'); ?>
			<?php if(have_posts()) : ?>
			<div class="row showcase">
				<?php while (have_posts()) : the_post();
				?>
				<div class="col-md-4">
				    <div class="thumbnail">
				      <div class="caption">
				        <h3><?php the_title();?></h3>
				      </div>
				      <a href="<?php the_permalink() ?>" class="thumbnail">
				        <img src="<?php bloginfo('template_directory');?>/images/art/<?php get_custom_field_value('thumbnail', true);?>" alt="" />
				      </a>
				      <a class="btn btn-primary" href="<?php the_permalink() ?>">Learn more &raquo;</a>
				    </div>
				  </div>

				
				<?php endwhile;?>
			</div>
			<?php else :?>
			<h2 class="center">Not Found</h2>
			<p class="center">
				Sorry, but you are looking for something that isn't here
			</p>
			<?php endif;?>
		<?php wp_reset_query(); ?>
	<?php get_footer();?>