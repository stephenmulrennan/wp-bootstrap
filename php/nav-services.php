<?php query_posts('post_type=page&post_parent=6&orderby=title&order=asc');?>
<?php if ( have_posts() ) :
?>

<div id="servicesList">
	<ul class="nav nav-list">
		<?php $current_post_name = $post->post_name; ?>
		<?php while ( have_posts() ) : the_post();
		?>
			<?php $slug = sanitize_title( get_the_title() ); ?>
			<?php if( $current_post_name == $slug ): ?>
				<li class="active">
					<a href="<?php the_permalink() ?>">
						<?php the_title();?>
					</a>
				</li>
			<?php else: ?>
				<li>
					<a href="<?php the_permalink() ?>"><?php the_title();?></a>
				</li>	
			<?php endif; ?>
		<?php endwhile;?>
	</ul>
</div>

<?php endif;?>
<?php wp_reset_query();?>