<div class="mappingHotspots form">
<?php echo $this->Form->create('MappingHotspot'); ?>
	<fieldset>
		<legend><?php echo __('Edit Mapping Hotspot'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MappingHotspot.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MappingHotspot.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mapping Hotspots'), array('action' => 'index')); ?></li>
	</ul>
</div>
