<div class="surveys view">
<h2><?php echo __($survey['Outlet']['name'].' Details<hr>');?></h2>
<table>
    <tr><td><?php echo __('Region'); ?></td>
        <td>
			<?php echo h($survey['Outlet']['Town']['Territory']['Region']['title']); ?>
			&nbsp;
        </td>
    </tr>
    <tr>
		<td><?php echo __('Territory'); ?></td>
		<td>
			<?php echo $survey['Outlet']['Town']['Territory']['title']; ?>
			&nbsp;
		</td>
                </tr>
                <tr>
		<td><?php echo __('Town'); ?></td>
		<td>
			<?php echo $survey['Outlet']['Town']['title']; ?>
			&nbsp;
		</td>
                </tr>
                <tr>
		<td><?php echo __('Shop Name'); ?></td>
		<td>
			<?php echo $survey['Outlet']['name']; ?>
			&nbsp;
		</td>
                </tr>
                <tr>
		<td><?php echo __('Shop Type'); ?></td>
		<td>
			<?php echo $survey['Outlet']['OutletType']['title'];?>
			&nbsp;
		</td>
                </tr>
                <tr>
		<td><?php echo __('Class'); ?></td>
		<td>
			<?php echo h($survey['Outlet']['OutletType']['class']); ?>
			&nbsp;
		</td>
                </tr>
                <tr>
		<td><?php echo __('Phone'); ?></td>
		<td>
			<?php echo h($survey['Outlet']['phone']); ?>
			&nbsp;
		</td>
                </tr>
                <tr>
		<td><?php echo __('DMS Code'); ?></td>
		<td>
			<?php echo h($survey['Outlet']['dms_code']); ?>
			&nbsp;
		</td>
                </tr>
                <tr>
		<td><?php echo __('Audit Date & Time'); ?></td>
		<td>
			<?php echo h($survey['Survey']['date_time']); ?>
			&nbsp;
		</td>
                </tr>
                <tr>
		<td><?php echo __('Location'); ?></td>
		<td>
			<div id="googleMap" style="width:380px;height:300px;"></div>
			&nbsp;
		</td>
                </tr>
                <tr>
		<td><?php echo __('Shop Images'); ?></td>
		<td>
                    <img src="<?php echo Configure::read('base_url').'/'.$survey['Survey']['first_image'];?>"/>
                    <img src="<?php echo Configure::read('base_url').'/'.$survey['Survey']['second_image'];?>"/>
		</td>
</table>
</div>


<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>

<script>

    var lattitude = "<?php echo $survey['Survey']['lattitude'];?>";
    var longitude = "<?php echo $survey['Survey']['longitude'];?>";

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



