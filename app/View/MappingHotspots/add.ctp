<div class="mappingHotspots form">
<?php echo $this->Form->create('MappingHotspot'); ?>
	<fieldset>
		<legend><?php echo __('Add Mapping Hotspot'); ?></legend>
	<?php
		echo $this->Form->input('outlet_type_id');
		echo $this->Form->input('hot_spot_id');
		echo $this->Form->input('hotspot_order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Mapping Hotspots'), array('action' => 'index')); ?></li>
	</ul>
</div>
