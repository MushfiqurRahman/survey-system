<div class="questions view">
<h2><?php echo __('Question'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($question['Question']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($question['Category']['title'], array('controller' => 'categories', 'action' => 'view', $question['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subcategory'); ?></dt>
		<dd>
			<?php echo $this->Html->link($question['Subcategory']['title'], array('controller' => 'subcategories', 'action' => 'view', $question['Subcategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($question['Question']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($question['Question']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Optional'); ?></dt>
		<dd>
			<?php echo h($question['Question']['is_optional']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($question['Question']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($question['Question']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Question'), array('action' => 'edit', $question['Question']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Question'), array('action' => 'delete', $question['Question']['id']), null, __('Are you sure you want to delete # %s?', $question['Question']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subcategories'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subcategory'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Question Details'), array('controller' => 'question_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question Detail'), array('controller' => 'question_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Question Details'); ?></h3>
	<?php if (!empty($question['QuestionDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Question Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Answer Type Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($question['QuestionDetail'] as $questionDetail): ?>
		<tr>
			<td><?php echo $questionDetail['id']; ?></td>
			<td><?php echo $questionDetail['question_id']; ?></td>
			<td><?php echo $questionDetail['title']; ?></td>
			<td><?php echo $questionDetail['answer_type_id']; ?></td>
			<td><?php echo $questionDetail['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'question_details', 'action' => 'view', $questionDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'question_details', 'action' => 'edit', $questionDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'question_details', 'action' => 'delete', $questionDetail['id']), null, __('Are you sure you want to delete # %s?', $questionDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Question Detail'), array('controller' => 'question_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
