<div class="surveyDetails index">
	<h2><?php echo __('Survey Details'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('survey_id'); ?></th>
			<th><?php echo $this->Paginator->sort('question_detail_id'); ?></th>
			<th><?php echo $this->Paginator->sort('answer'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($surveyDetails as $surveyDetail): ?>
	<tr>
		<td><?php echo h($surveyDetail['SurveyDetail']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($surveyDetail['Survey']['id'], array('controller' => 'surveys', 'action' => 'view', $surveyDetail['Survey']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($surveyDetail['QuestionDetail']['title'], array('controller' => 'question_details', 'action' => 'view', $surveyDetail['QuestionDetail']['id'])); ?>
		</td>
		<td><?php echo h($surveyDetail['SurveyDetail']['answer']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $surveyDetail['SurveyDetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $surveyDetail['SurveyDetail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $surveyDetail['SurveyDetail']['id']), null, __('Are you sure you want to delete # %s?', $surveyDetail['SurveyDetail']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Survey Detail'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('controller' => 'surveys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey'), array('controller' => 'surveys', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Question Details'), array('controller' => 'question_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question Detail'), array('controller' => 'question_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
