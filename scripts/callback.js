function initializeMap() {
	if(GBrowserIsCompatible()) {
		var map = new GMap2(document.getElementById("map_canvas"));
		map.addControl(new GSmallZoomControl3D());
		map.addControl(new GMapTypeControl());
		map.removeMapType(G_HYBRID_MAP);
		map.setCenter(new GLatLng(54.6548566, -8.1090246), 15);
		// Enter the latitude + longitude of your desired location here - if you want to change map zoom level alter the number 12

		var bounds = map.getBounds();
		var southWest = bounds.getSouthWest();
		var northEast = bounds.getNorthEast();
		var lngSpan = northEast.lng() - southWest.lng();
		var latSpan = northEast.lat() - southWest.lat();

		var officePoint = new GLatLng(54.6548566, -8.1090246);
		// Enter the latitude + longitude of your desired location here
		var officeMarker = new GMarker(officePoint, {
			title : "McIntyre O\'Brien Solicitors"
		});

		var mob = "<ul>";
		mob = mob + "<li>McIntyre O\'Brien Solicitors</li>";
		ret = mob + "<li>Castle Streen,</li>";
		mob = mob + "<li>Donegal Town</li>"
		mob = mob + "</ul>"

		officeMarker.bindInfoWindowHtml(mob);

		map.addOverlay(officeMarker);

		var courtHousePoint = new GLatLng(54.65455, -8.110458);
		var courtMarker = new GMarker(courtHousePoint, {
			title : "Court House"
		});
		courtMarker.bindInfoWindowHtml("Court House");
		map.addOverlay(courtMarker);

	}
}