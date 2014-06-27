<div class="mappingHotspots index">
	<h2><?php echo __('Mapping Hotspots'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('outlet_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('hot_spot_id'); ?></th>
			<th><?php echo $this->Paginator->sort('hotspot_order'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($mappingHotspots as $mappingHotspot): ?>
	<tr>
		<td><?php echo h($mappingHotspot['MappingHotspot']['id']); ?>&nbsp;</td>
		<td><?php echo h($mappingHotspot['OutletType']['title'].($mappingHotspot['OutletType']['class']==''?'': (' - '.$mappingHotspot['OutletType']['class']))); ?>&nbsp;</td>
		<td><?php echo h($mappingHotspot['HotSpot']['head']. ' - '.$mappingHotspot['HotSpot']['descr']. ' - '.$mappingHotspot['HotSpot']['first_compliance'] .' - '.$mappingHotspot['HotSpot']['second_compliance']); ?>&nbsp;</td>
		<td><?php echo h($mappingHotspot['MappingHotspot']['hotspot_order']); ?>&nbsp;</td>
		<td class="actions">			
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mappingHotspot['MappingHotspot']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $mappingHotspot['MappingHotspot']['id']), null, __('Are you sure you want to delete # %s?', $mappingHotspot['MappingHotspot']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Mapping Hotspot'), array('action' => 'add')); ?></li>
	</ul>
</div>
