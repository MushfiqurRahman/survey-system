<div class="mappingNewProducts view">
<h2><?php echo __('Mapping New Product'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mappingNewProduct['MappingNewProduct']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Outlet Type Id'); ?></dt>
		<dd>
			<?php echo h($mappingNewProduct['MappingNewProduct']['outlet_type_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Id'); ?></dt>
		<dd>
			<?php echo h($mappingNewProduct['MappingNewProduct']['product_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sku'); ?></dt>
		<dd>
			<?php echo h($mappingNewProduct['MappingNewProduct']['sku']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Order'); ?></dt>
		<dd>
			<?php echo h($mappingNewProduct['MappingNewProduct']['product_order']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mapping New Product'), array('action' => 'edit', $mappingNewProduct['MappingNewProduct']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Mapping New Product'), array('action' => 'delete', $mappingNewProduct['MappingNewProduct']['id']), null, __('Are you sure you want to delete # %s?', $mappingNewProduct['MappingNewProduct']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mapping New Products'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mapping New Product'), array('action' => 'add')); ?> </li>
	</ul>
</div>
