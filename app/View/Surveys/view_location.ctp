<div class="surveys view">
<h2><?php echo __('Survey'); ?></h2>
	
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>

<script>

    var lattitude = "<?php echo $lattitude;?>";
    var longitude = "<?php echo $longitude;?>";

var myCenter=new google.maps.LatLng(lattitude, longitude);

function initialize()
{
	
	var mapProp = {
	  center:myCenter,
	  zoom:13,
	  mapTypeId:google.maps.MapTypeId.ROADMAP
	  };
	var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
	
	
	var marker=new google.maps.Marker({
		  position:myCenter,
		  });

	marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);

</script>


<div id="googleMap" style="width:500px;height:380px;"></div>

</div>
