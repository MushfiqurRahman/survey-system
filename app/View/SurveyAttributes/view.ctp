<div class="surveyAttributes view">
<h2><?php echo __('Survey Attribute'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($surveyAttribute['SurveyAttribute']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($surveyAttribute['SurveyAttribute']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($surveyAttribute['SurveyAttribute']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Survey Attribute'), array('action' => 'edit', $surveyAttribute['SurveyAttribute']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Survey Attribute'), array('action' => 'delete', $surveyAttribute['SurveyAttribute']['id']), null, __('Are you sure you want to delete # %s?', $surveyAttribute['SurveyAttribute']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Survey Attributes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey Attribute'), array('action' => 'add')); ?> </li>
	</ul>
</div>
