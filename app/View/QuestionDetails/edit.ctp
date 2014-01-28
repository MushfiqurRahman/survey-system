<div class="questionDetails form">
<?php echo $this->Form->create('QuestionDetail'); ?>
	<fieldset>
		<legend><?php echo __('Edit Question Detail'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('question_id');
		echo $this->Form->input('title');
		echo $this->Form->input('answer_type_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('QuestionDetail.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('QuestionDetail.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Question Details'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Answer Types'), array('controller' => 'answer_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answer Type'), array('controller' => 'answer_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Survey Details'), array('controller' => 'survey_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey Detail'), array('controller' => 'survey_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
