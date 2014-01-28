<?php
/* Template Name: Contact Template */
?>
<?php get_header();?>
<script>
	function initializeV3Map() {
		var officePosition = new google.maps.LatLng(54.6548566, -8.1090246);
		var courthousePosition = new google.maps.LatLng(54.65455, -8.110458);

		var mapOptions = {
			center : new google.maps.LatLng(54.6548566, -8.1090246),
			zoom : 15,
			mapTypeId : google.maps.MapTypeId.ROADMAP
		};
		var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		var officeMarker = new google.maps.Marker({
			position : officePosition,
			map : map,
			title : "McIntyre O'Brien Solicitors"
		});
		var courthouseMarker = new google.maps.Marker({
			position : courthousePosition,
			map : map,
			title : "Court House"
		});
	}


	jQuery(document).ready(function() {
		initializeV3Map();
	});

</script>

	<div class="row">
		<div class="col-md-8">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
			?>
			<h3><?php the_title();?></h3>
			<hr>
			<?php the_content();?>

			<?php endwhile; else:?>
			<p>
				<?php _e('Sorry, this page does not exist.');?>
			</p>
			<?php endif;?>
			<div class="row">
				<h4 class="col-md-9">Address</h4>
			</div>
			<div class="row">
				<address class="col-md-4">
				  	McIntyre O'Brien Solicitors<br>
				  	<?php echo get_option('contact_address_line1');?><br>
				  	<?php echo get_option('contact_address_line2');?><br>
				  	<?php echo get_option('contact_address_line3');?>
				</address>
				<address class="col-md-4 col-md-offset-1">
					<strong>Fax: </strong> <?php echo get_option('contact_phone');?><br>
					<strong>Phone: </strong> <?php echo get_option('contact_fax');?><br>
					<strong>Email:</strong>	<a href="mailto:<?php echo get_option('contact_email');?>"><?php echo get_option('contact_email');?></a>
				</address>
			</div>
			</br />
			<div class="row">
				<p class="col-md-9">Alternatively, submit your details below to contact us regarding any queries.</p>
			</div>
			<div class="row" id="contactCallbackForm">
				<div class="col-md-9">
					<?php include('php/enquiry-form.php'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-9">
					<button class="btn btn-primary" data-bind="click: sendEnquiry ">
						Send Request
					</button>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<h3>How to find us</h3>
			<hr>
			<p>
				<small>Located in the heart of Donegal Town on Castle Street, around the corner from the Courthouse and the Diamond.</small>
			</p>
			<div id="map_canvas"></div>
			<p>
				<a id="directions" href="http://maps.google.com/maps?q=castle%20street,%20donegal%20town,%20ireland" target="_blank">Click here for directions</a>
			</p>
			<h3>Spread the word</h3>
			<hr>
			<p>
				<small>Use the links below to tell your friends about us or add this site to your favourites</small>
			</p>
			<?php include('php/share.php'); ?>
		</div><!-- sidebar -->
	</div>

<?php get_footer();?>
