<div class="surveys index">
	<h2><?php echo __('Surveys'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('subcategory_id'); ?></th>
			<th><?php echo $this->Paginator->sort('outlet_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('responder_name'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('responder_role'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('time'); ?></th>
			<th><?php echo $this->Paginator->sort('lattitude'); ?></th>
			<th><?php echo $this->Paginator->sort('longitude'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($surveys as $survey): ?>
	<tr>
		<td><?php echo h($survey['Survey']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($survey['Category']['title'], array('controller' => 'categories', 'action' => 'view', $survey['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($survey['Subcategory']['title'], array('controller' => 'subcategories', 'action' => 'view', $survey['Subcategory']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($survey['Outlet']['name'], array('controller' => 'outlets', 'action' => 'view', $survey['Outlet']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($survey['User']['name'], array('controller' => 'users', 'action' => 'view', $survey['User']['id'])); ?>
		</td>
		<td><?php echo h($survey['Survey']['responder_name']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['phone']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['responder_role']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['image']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['time']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['lattitude']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['longitude']); ?>&nbsp;</td>
		<td><?php echo h($survey['Survey']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $survey['Survey']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $survey['Survey']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $survey['Survey']['id']), null, __('Are you sure you want to delete # %s?', $survey['Survey']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Survey'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subcategories'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subcategory'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Outlets'), array('controller' => 'outlets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Outlet'), array('controller' => 'outlets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Survey Details'), array('controller' => 'survey_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey Detail'), array('controller' => 'survey_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
