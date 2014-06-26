<div class="mappingPops form">
<?php echo $this->Form->create('MappingPop'); ?>
	<fieldset>
		<legend><?php echo __('Add Mapping Pop'); ?></legend>
	<?php
		echo $this->Form->input('outlet_type_id');
		echo $this->Form->input('pop_item_id');
		echo $this->Form->input('pop_order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Mapping Pops'), array('action' => 'index')); ?></li>
	</ul>
</div>
