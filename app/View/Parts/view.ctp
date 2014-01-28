<div class="parts view">
<h2><?php echo __('Part'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($part['Part']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($part['Part']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descr'); ?></dt>
		<dd>
			<?php echo h($part['Part']['descr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Optional'); ?></dt>
		<dd>
			<?php echo h($part['Part']['is_optional']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task Join Type'); ?></dt>
		<dd>
			<?php echo h($part['Part']['task_join_type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Part'), array('action' => 'edit', $part['Part']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Part'), array('action' => 'delete', $part['Part']['id']), null, __('Are you sure you want to delete # %s?', $part['Part']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Parts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Part'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Survey Types'), array('controller' => 'survey_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey Type'), array('controller' => 'survey_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Survey Types'); ?></h3>
	<?php if (!empty($part['SurveyType'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Descr'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($part['SurveyType'] as $surveyType): ?>
		<tr>
			<td><?php echo $surveyType['id']; ?></td>
			<td><?php echo $surveyType['title']; ?></td>
			<td><?php echo $surveyType['descr']; ?></td>
			<td><?php echo $surveyType['code']; ?></td>
			<td><?php echo $surveyType['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'survey_types', 'action' => 'view', $surveyType['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'survey_types', 'action' => 'edit', $surveyType['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'survey_types', 'action' => 'delete', $surveyType['id']), null, __('Are you sure you want to delete # %s?', $surveyType['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Survey Type'), array('controller' => 'survey_types', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Tasks'); ?></h3>
	<?php if (!empty($part['Task'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Descr'); ?></th>
		<th><?php echo __('Surv Attr Ids'); ?></th>
		<th><?php echo __('Guide Lines'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($part['Task'] as $task): ?>
		<tr>
			<td><?php echo $task['id']; ?></td>
			<td><?php echo $task['title']; ?></td>
			<td><?php echo $task['descr']; ?></td>
			<td><?php echo $task['surv_attr_ids']; ?></td>
			<td><?php echo $task['guide_lines']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tasks', 'action' => 'view', $task['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tasks', 'action' => 'edit', $task['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tasks', 'action' => 'delete', $task['id']), null, __('Are you sure you want to delete # %s?', $task['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
