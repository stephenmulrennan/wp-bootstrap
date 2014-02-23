<?php
/* Template Name: News Template */
?>
<?php get_header();?>

	<div class="row">
		<div class="col-md-9 site-content">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
			?>
				<div class="row">
					<div class="col-md-6"><h1><?php the_title();?></h1></div>	
					<div class="col-md-6">
						<?php include('php/share.php'); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?php the_content();?>
						<hr>	
					</div>
				</div>
			<?php endwhile; else:?>
			<p>
				<?php _e('Sorry, this page does not exist.');?>
			</p>
			<?php endif;?>
			<?php query_posts('category_name=News'); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<h4 class="post-title">
						<?php the_title(); ?>
					</h4>
					<p><?php the_content() ?></p>
				<?php endwhile; ?>
				<?php endif; ?>
			<?php wp_reset_query(); ?>
		</div>
		<div class="servicesSidebar col-md-3">
			<div class="thumbnail servicesHighlight visible-md visible-lg">
    			<img src="<?php bloginfo('template_directory');?>/images/art/news_events.jpg" alt="" />
			</div>
			<?php include('php/news-widget.php'); ?>
			<?php include('php/nav-collapse-services.php'); ?>
		</div><!-- sidebar -->
	</div>
<!-- content -->
<?php get_footer();?>
