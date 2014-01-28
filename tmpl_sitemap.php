<?php
/* Template Name: Sitemap Template */
?>
<php get_header(); ?>
<div id="container">
	<div id="content">
		<div class="entry-content">
			<h3>Pages</h3>
			<ul>
				<ul>
					<?php query_posts('post_type=page');?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
					?>
					<li>
						<?php the_title(); ?>
						(<?php comments_number('0', '1', '%'); ?>
						)
					</li>
					<?php endwhile; ?>
					<?php endif;?>
					<?php wp_reset_query();?>
				</ul>
			</ul>
			<h3>Feeds</h3>
			<ul>
				<li>
					<a title="Full content" href="feed:<?php bloginfo('rss2_url');?>">Main RSS</a>
				</li>
				<li>
					<a title="Comment Feed" href="feed:<?php bloginfo('comments_rss2_url');?>">Comment Feed</a>
				</li>
			</ul>
			<h3>Categories</h3>
			<h3>All Blog Posts:</h3>
			<ul>
				<ul>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
					?>
					<li>
						<?php the_title(); ?>
						(<?php comments_number('0', '1', '%'); ?>
						)
					</li>
					<?php endwhile; ?>
					<?php endif;?>
				</ul>
			</ul>
			&nbsp; <h3>Archives</h3>
			&nbsp;
		</div>
		&nbsp;
	</div>
</div>
<?php get_footer(); ?>