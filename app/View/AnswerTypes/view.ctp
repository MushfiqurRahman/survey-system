<div class="answerTypes view">
<h2><?php echo __('Answer Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($answerType['AnswerType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($answerType['AnswerType']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($answerType['AnswerType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($answerType['AnswerType']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Answer Type'), array('action' => 'edit', $answerType['AnswerType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Answer Type'), array('action' => 'delete', $answerType['AnswerType']['id']), null, __('Are you sure you want to delete # %s?', $answerType['AnswerType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Answer Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answer Type'), array('action' => 'add')); ?> </li>
	</ul>
</div>
