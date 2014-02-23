<?php
/* Template Name: Services Template */
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
				<div class="row hidden-md hidden-lg">
					<div class="col-xs-12">
						<div class="thumbnail">
    						<img src="<?php bloginfo('template_directory');?>/images/art/<?php get_custom_field_value('highlight', true, 'general_litigation.jpg');?>" alt="" />
						</div>	
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
		</div>
		<div class="servicesSidebar col-md-3">
			<?php include('php/services-highlight.php'); ?>
			<?php include('php/services-widgets.php'); ?>
			<?php include('php/news-widget.php'); ?>
			<?php include('php/nav-collapse-services.php'); ?>
			<?php include('php/questions-widget.php'); ?>
		</div><!-- sidebar -->
	</div>

<?php get_footer();?>
