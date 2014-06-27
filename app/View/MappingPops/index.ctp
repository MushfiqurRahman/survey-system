<div class="mappingPops index">
	<h2><?php echo __('Mapping Pops'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('outlet_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('pop_item_id'); ?></th>
			<th><?php echo $this->Paginator->sort('pop_order'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($mappingPops as $mappingPop): ?>
	<tr>
		<td><?php echo h($mappingPop['MappingPop']['id']); ?>&nbsp;</td>
		<td><?php echo h($mappingPop['OutletType']['title'].($mappingPop['OutletType']['class']==''?'':'_'.$mappingPop['OutletType']['class'])); ?>&nbsp;</td>
		<td><?php echo h($mappingPop['PopItem']['head'].' - '.$mappingPop['PopItem']['descr']); ?>&nbsp;</td>
		<td><?php echo h($mappingPop['MappingPop']['pop_order']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mappingPop['MappingPop']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $mappingPop['MappingPop']['id']), null, __('Are you sure you want to delete # %s?', $mappingPop['MappingPop']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mapping Pop'), array('action' => 'add')); ?></li>
	</ul>
</div>
