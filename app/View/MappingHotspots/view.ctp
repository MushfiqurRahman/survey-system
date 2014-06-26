<div class="mappingHotspots view">
<h2><?php echo __('Mapping Hotspot'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mappingHotspot['MappingHotspot']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Outlet Type Id'); ?></dt>
		<dd>
			<?php echo h($mappingHotspot['MappingHotspot']['outlet_type_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hot Spot Id'); ?></dt>
		<dd>
			<?php echo h($mappingHotspot['MappingHotspot']['hot_spot_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hotspot Order'); ?></dt>
		<dd>
			<?php echo h($mappingHotspot['MappingHotspot']['hotspot_order']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mapping Hotspot'), array('action' => 'edit', $mappingHotspot['MappingHotspot']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Mapping Hotspot'), array('action' => 'delete', $mappingHotspot['MappingHotspot']['id']), null, __('Are you sure you want to delete # %s?', $mappingHotspot['MappingHotspot']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mapping Hotspots'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mapping Hotspot'), array('action' => 'add')); ?> </li>
	</ul>
</div>
