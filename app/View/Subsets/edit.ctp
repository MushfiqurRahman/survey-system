<div class="subsets form">
<?php echo $this->Form->create('Subset'); ?>
	<fieldset>
		<legend><?php echo __('Edit Subset'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('style' => 'width:600px;'));
                echo $this->Form->input('task_id', array('style' => 'width:600px;'));
                echo $this->Form->input('Product', array('size' => 40));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Subset.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Subset.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Subsets'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Territories'), array('controller' => 'territories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Territory'), array('controller' => 'territories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Outlets'), array('controller' => 'outlets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Outlet'), array('controller' => 'outlets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
