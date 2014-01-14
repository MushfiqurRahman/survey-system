<div class="outletTypes form">
<?php echo $this->Form->create('OutletType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Outlet Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('descr');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OutletType.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('OutletType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Outlet Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Outlets'), array('controller' => 'outlets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Outlet'), array('controller' => 'outlets', 'action' => 'add')); ?> </li>
	</ul>
</div>
