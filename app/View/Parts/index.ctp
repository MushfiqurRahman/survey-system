<div class="parts index">
	<h2><?php echo __('Parts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('descr'); ?></th>
			<th><?php echo $this->Paginator->sort('is_optional'); ?></th>
			<th><?php echo $this->Paginator->sort('task_join_type'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($parts as $part): ?>
	<tr>
		<td><?php echo h($part['Part']['id']); ?>&nbsp;</td>
		<td><?php echo h($part['Part']['title']); ?>&nbsp;</td>
		<td><?php echo h($part['Part']['descr']); ?>&nbsp;</td>
		<td><?php echo h($part['Part']['is_optional']); ?>&nbsp;</td>
		<td><?php echo h($part['Part']['task_join_type']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $part['Part']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $part['Part']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $part['Part']['id']), null, __('Are you sure you want to delete # %s?', $part['Part']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Part'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Survey Types'), array('controller' => 'survey_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey Type'), array('controller' => 'survey_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
