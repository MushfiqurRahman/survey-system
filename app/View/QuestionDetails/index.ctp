<div class="questionDetails index">
	<h2><?php echo __('Question Details'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('question_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('answer_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($questionDetails as $questionDetail): ?>
	<tr>
		<td><?php echo h($questionDetail['QuestionDetail']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($questionDetail['Question']['title'], array('controller' => 'questions', 'action' => 'view', $questionDetail['Question']['id'])); ?>
		</td>
		<td><?php echo h($questionDetail['QuestionDetail']['title']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($questionDetail['AnswerType']['title'], array('controller' => 'answer_types', 'action' => 'view', $questionDetail['AnswerType']['id'])); ?>
		</td>
		<td><?php echo h($questionDetail['QuestionDetail']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $questionDetail['QuestionDetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $questionDetail['QuestionDetail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $questionDetail['QuestionDetail']['id']), null, __('Are you sure you want to delete # %s?', $questionDetail['QuestionDetail']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Question Detail'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Answer Types'), array('controller' => 'answer_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answer Type'), array('controller' => 'answer_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Survey Details'), array('controller' => 'survey_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey Detail'), array('controller' => 'survey_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
