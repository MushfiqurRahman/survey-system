<div class="outlets form">
<?php echo $this->Form->create('Outlet'); ?>
	<fieldset>
		<legend><?php echo __('Add Outlet'); ?></legend>
	<?php
		echo $this->Form->input('outlet_type_id');
		echo $this->Form->input('town_id');
		echo $this->Form->input('outlet_code');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('address');
		echo $this->Form->input('website');
		echo $this->Form->input('status');
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Outlets'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Outlet Types'), array('controller' => 'outlet_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Outlet Type'), array('controller' => 'outlet_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Towns'), array('controller' => 'towns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Town'), array('controller' => 'towns', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('controller' => 'surveys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey'), array('controller' => 'surveys', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
