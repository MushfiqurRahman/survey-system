<div class="mappingNewProducts form">
<?php echo $this->Form->create('MappingNewProduct'); ?>
	<fieldset>
		<legend><?php echo __('Add Mapping New Product'); ?></legend>
	<?php
		echo $this->Form->input('outlet_type_id');
		echo $this->Form->input('product_id', array('style' => 'width:400px;'));		
		echo $this->Form->input('product_order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Mapping New Products'), array('action' => 'index')); ?></li>
	</ul>
</div>
