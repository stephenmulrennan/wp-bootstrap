<?php
/* Template Name: News Template */
?>
<?php get_header();?>
<div>
	<div class="row">
		<div class="col-md-9 site-content">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="row">
					<div class="col-md-6">
						<h1><?php the_title();?></h1>
						<p><em><?php the_time('l, F jS, Y'); ?></em></p>
					</div>	
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
				<div class="row">
					<div class="col-md-12">
						<?php comments_template(); ?>	
					</div>
				</div>
			<?php endwhile; else: ?>
				<p><?php _e('Sorry, this page does not exist.'); ?></p>
			<?php endif; ?>
		</div>
		<div class="servicesSidebar col-md-3">
			<?php include('php/news-widget.php'); ?>
			<?php include('php/nav-collapse-services.php'); ?>
		</div><!-- sidebar -->
	</div>
</div><!-- content -->
<?php get_footer();?>
