jQuery(document).ready(function() {
	
	return;
	
	boxes = jQuery('.fixed');
	
	maxHeight = Math.max.apply(
  		Math, boxes.map(function() {
    	return jQuery(this).height();
	}).get());
	
	boxes.height(maxHeight + 200);
});

