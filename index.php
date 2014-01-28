<?php get_header();?>

<!-- Main hero unit for a primary marketing message or call to action -->
<div class="hero-unit">
	<h1>Hello, world!</h1>
	<p>
		This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
	</p>
	<p>
		<a class="btn btn-primary btn-large">Learn more &raquo;</a>
	</p>
</div>

<?php if(have_posts()) :
?>
<div class="row">
	<?php while (have_posts()) : the_post();
	?>
	<div id="post-<?php the_ID();?>" class="span4">
		<h2><?php the_title();?></h2>
		<p>
			<?php the_content();?>
		</p>
		<p>
			<a href="<?php the_permalink() ?>" class="btn"><?php the_title();?></a>
		</p>
	</div>
	<?php endwhile;?>
</div>
<?php else :?>
<h2 class="center">Not Found</h2>
<p class="center">
	Sorry, but you are looking for something that isn't here
</p>
<?php endif;?>

<?php get_footer();?>