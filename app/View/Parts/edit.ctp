<div class="parts form">
<?php echo $this->Form->create('Part'); ?>
	<fieldset>
		<legend><?php echo __('Edit Part'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
                echo $this->Form->input('front_end_menu_id');
		echo $this->Form->input('descr');
		echo $this->Form->input('is_optional');
		echo $this->Form->input('task_join_type');
		//echo $this->Form->input('SurveyType');
		echo $this->Form->input('Task');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Part.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Part.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Parts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Survey Types'), array('controller' => 'survey_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey Type'), array('controller' => 'survey_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
