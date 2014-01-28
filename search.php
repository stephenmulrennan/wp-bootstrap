<?php get_header(); ?>
<div>
	<div class="row">
		<?php if (have_posts()) : ?>
			<div class="col-md-12 site-content">
				<?php while (have_posts()) : the_post(); ?>
					<div class="row">
						<div class="col-md-12">
							<h3>
								<?php the_title(); ?>
							</h3>
							<p><?php the_excerpt() ?></p>
							<a href="<?php the_permalink() ?>" rel="bookmark">Read More</a>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php else : ?>
			<div class="alert alert-block alert-info fade in">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<h3 class="alert-heading">Couldn't find what you were looking for ?</h4>
				<p>Why not request a callback or browse the links below ?</p>
				<p>
				  <a href="#callbackModal" role="button" class="btn btn-info" data-toggle="modal">Request a Callback</a>
				</p>
		    </div>
		    <div class="col-md-12 site-content" style="margin:0">
		    	<?php include('php/sitemap.php'); ?>
		    </div>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>