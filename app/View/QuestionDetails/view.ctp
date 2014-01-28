<div class="questionDetails view">
<h2><?php echo __('Question Detail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($questionDetail['QuestionDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question'); ?></dt>
		<dd>
			<?php echo $this->Html->link($questionDetail['Question']['title'], array('controller' => 'questions', 'action' => 'view', $questionDetail['Question']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($questionDetail['QuestionDetail']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Answer Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($questionDetail['AnswerType']['title'], array('controller' => 'answer_types', 'action' => 'view', $questionDetail['AnswerType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($questionDetail['QuestionDetail']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Question Detail'), array('action' => 'edit', $questionDetail['QuestionDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Question Detail'), array('action' => 'delete', $questionDetail['QuestionDetail']['id']), null, __('Are you sure you want to delete # %s?', $questionDetail['QuestionDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Question Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Answer Types'), array('controller' => 'answer_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answer Type'), array('controller' => 'answer_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Survey Details'), array('controller' => 'survey_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey Detail'), array('controller' => 'survey_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Survey Details'); ?></h3>
	<?php if (!empty($questionDetail['SurveyDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Survey Id'); ?></th>
		<th><?php echo __('Question Detail Id'); ?></th>
		<th><?php echo __('Answer'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($questionDetail['SurveyDetail'] as $surveyDetail): ?>
		<tr>
			<td><?php echo $surveyDetail['id']; ?></td>
			<td><?php echo $surveyDetail['survey_id']; ?></td>
			<td><?php echo $surveyDetail['question_detail_id']; ?></td>
			<td><?php echo $surveyDetail['answer']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'survey_details', 'action' => 'view', $surveyDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'survey_details', 'action' => 'edit', $surveyDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'survey_details', 'action' => 'delete', $surveyDetail['id']), null, __('Are you sure you want to delete # %s?', $surveyDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Survey Detail'), array('controller' => 'survey_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
