<div class="mappingNewProducts form">
<?php echo $this->Form->create('MappingNewProduct'); ?>
	<fieldset>
		<legend><?php echo __('Edit Mapping New Product'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('outlet_type_id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('sku');
		echo $this->Form->input('product_order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MappingNewProduct.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MappingNewProduct.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mapping New Products'), array('action' => 'index')); ?></li>
	</ul>
</div>
