<div class="surveyDetails view">
<h2><?php echo __('Survey Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($surveyDetail['SurveyDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Survey'); ?></dt>
		<dd>
			<?php echo $this->Html->link($surveyDetail['Survey']['id'], array('controller' => 'surveys', 'action' => 'view', $surveyDetail['Survey']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question Detail'); ?></dt>
		<dd>
			<?php echo $this->Html->link($surveyDetail['QuestionDetail']['title'], array('controller' => 'question_details', 'action' => 'view', $surveyDetail['QuestionDetail']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Answer'); ?></dt>
		<dd>
			<?php echo h($surveyDetail['SurveyDetail']['answer']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Survey Detail'), array('action' => 'edit', $surveyDetail['SurveyDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Survey Detail'), array('action' => 'delete', $surveyDetail['SurveyDetail']['id']), null, __('Are you sure you want to delete # %s?', $surveyDetail['SurveyDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Survey Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('controller' => 'surveys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey'), array('controller' => 'surveys', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Question Details'), array('controller' => 'question_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question Detail'), array('controller' => 'question_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
