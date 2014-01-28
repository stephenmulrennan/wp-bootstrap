	    </div> <!-- /container -->
	    <div id="push"></div>
	</div> <!-- /wrap -->

	<div id="footer">
		<div class="container">
			<footer>
				<div id="footerContent" class="row">
					<address class="col-md-4">
					  	<strong>McIntyre O'Brien Solicitors</strong><br>
					  	<?php echo get_option('contact_address_line1');?><br>
					  	<?php echo get_option('contact_address_line2');?><br>
					  	<?php echo get_option('contact_address_line3');?>
					</address>
					<address class="col-md-4">
						<strong>Fax: </strong> <?php echo get_option('contact_phone');?><br>
						<strong>Phone: </strong> <?php echo get_option('contact_fax');?><br>
						<strong>Email:</strong>	<a href="mailto:<?php echo get_option('contact_email');?>"><?php echo get_option('contact_email');?></a>
					</address>
				</div>
	      	</footer>	
		</div>
	</div>
    <?php wp_footer(); ?>

  </body>
</html>