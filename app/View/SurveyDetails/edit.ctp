<div class="surveyDetails form">
<?php echo $this->Form->create('SurveyDetail'); ?>
	<fieldset>
		<legend><?php echo __('Edit Survey Detail'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('survey_id');
		echo $this->Form->input('question_detail_id');
		echo $this->Form->input('answer');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SurveyDetail.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('SurveyDetail.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Survey Details'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('controller' => 'surveys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey'), array('controller' => 'surveys', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Question Details'), array('controller' => 'question_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question Detail'), array('controller' => 'question_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
