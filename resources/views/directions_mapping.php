<style>
.mapDivs {
	height: 380px;
	width: 100%;
	margin: 0px;
	padding: 0px;
	position:relative;
	margin: 10px 0 0;
}
#itineraryDiv {
	height: 380px;
	width: 100%;
	margin: 0px;
	padding: 0px;
	position:relative;
	margin: 10px 0 0;
}
.direction_list {
    border-radius: 2px;
    color: #fff;
    cursor: pointer;
    padding: 4px;
    text-align: center;
}
</style>    

<div class="direction_list label-info" id="show_direction<?php echo $mapping[0]->complaint_id;?>">
Click to directions Point to Point</div>
<div id="itineraryDiv<?php echo $mapping[0]->complaint_id;?>" style="display:none;"></div>                   
<div id="mapDiv<?php echo $mapping[0]->complaint_id;?>" class="mapDivs"></div>
<script type="text/javascript">
	 //alert('{!!$customer->complaint_id!!}');
	 var map = null;
	 var directionsManager = null;
	 function GetMap() {
		// Initialize the map
		map = new Microsoft.Maps.Map(document.getElementById("mapDiv<?php echo $mapping[0]->complaint_id;?>"),{
		credentials:"AjKooee1VBEYc6QbnONo0aLj-_N8FsmMW4HSjzH75B0KF_2YtfADw4lidhX2qQWN",		
		showMapTypeSelector: false,
		dragging :false
		});
		Microsoft.Maps.loadModule('Microsoft.Maps.Directions', { callback: directionsModuleLoaded });
	 }
	 function directionsModuleLoaded()
	 {
		// Initialize the DirectionsManager 
		directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);
		// Create start and end waypoints
		var startWaypoint = new Microsoft.Maps.Directions.Waypoint({location:new Microsoft.Maps.Location(<?php echo $mapping[0]->latitude; ?>, <?php echo $mapping[0]->longitude; ?>)}); 
		var endWaypoint = new Microsoft.Maps.Directions.Waypoint({location:new Microsoft.Maps.Location(<?php echo $mapping[0]->emp_latitude; ?>, <?php echo $mapping[0]->emp_longitude; ?>)});
		directionsManager.addWaypoint(startWaypoint);
		directionsManager.addWaypoint(endWaypoint);
		// Set request options
		directionsManager.setRequestOptions({ avoidTraffic: true, maxRoutes: 1 });
		// Set the render options
		directionsManager.setRenderOptions({ itineraryContainer: document.getElementById('itineraryDiv<?php echo $mapping[0]->complaint_id;?>'), displayWalkingWarning: false, walkingPolylineOptions:{strokeColor: new Microsoft.Maps.Color(200, 0, 255, 0)} });
		// Specify a handler for when an error occurs
		Microsoft.Maps.Events.addHandler(directionsManager, 'directionsError', displayError);
		// Calculate directions, which displays a route on the map
		directionsManager.calculateDirections();
	 } 

	 function displayError(e) {
		// Display the error message
		alert(e.message);
	 }
	 GetMap();
	 $('#show_direction<?php echo $mapping[0]->complaint_id; ?>').on('click', function(){
		 $('#itineraryDiv<?php echo $mapping[0]->complaint_id; ?>').toggle();
	 });
</script>