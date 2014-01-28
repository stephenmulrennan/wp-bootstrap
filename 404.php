<?php get_header(); ?>
<div class="row-fluid">
	<div class="alert alert-block alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<h3 class="alert-heading">Couldn't find what you were looking for ?</h4>
		<p>Why not request a callback or browse the links below ?</p>
		<p>
		  <a href="#callbackModal" role="button" class="btn btn-info" data-toggle="modal">Request a Callback</a>
		</p>
    </div>
    <?php include('php/sitemap.php'); ?>
</div>
<?php get_footer(); ?>