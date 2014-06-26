<div class="mappingNewProducts index">
	<h2><?php echo __('Mapping New Products'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('outlet_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sku'); ?></th>
			<th><?php echo $this->Paginator->sort('product_order'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($mappingNewProducts as $mappingNewProduct): ?>
	<tr>
		<td><?php echo h($mappingNewProduct['MappingNewProduct']['id']); ?>&nbsp;</td>
		<td><?php echo h($mappingNewProduct['MappingNewProduct']['outlet_type_id']); ?>&nbsp;</td>
		<td><?php echo h($mappingNewProduct['MappingNewProduct']['product_id']); ?>&nbsp;</td>
		<td><?php echo h($mappingNewProduct['MappingNewProduct']['sku']); ?>&nbsp;</td>
		<td><?php echo h($mappingNewProduct['MappingNewProduct']['product_order']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $mappingNewProduct['MappingNewProduct']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mappingNewProduct['MappingNewProduct']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $mappingNewProduct['MappingNewProduct']['id']), null, __('Are you sure you want to delete # %s?', $mappingNewProduct['MappingNewProduct']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mapping New Product'), array('action' => 'add')); ?></li>
	</ul>
</div>
