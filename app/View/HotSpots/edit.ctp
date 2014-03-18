<div class="hot_spots form">
<?php echo $this->Form->create('HotSpot'); ?>
	<fieldset>
		<legend><?php echo __('Edit HotSpot'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('HotSpot.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('HotSpot.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List HotSpots'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
