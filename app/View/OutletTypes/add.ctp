<div class="outletTypes form">
<?php echo $this->Form->create('OutletType'); ?>
	<fieldset>
		<legend><?php echo __('Add Outlet Type'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('descr');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Outlet Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Outlets'), array('controller' => 'outlets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Outlet'), array('controller' => 'outlets', 'action' => 'add')); ?> </li>
	</ul>
</div>
