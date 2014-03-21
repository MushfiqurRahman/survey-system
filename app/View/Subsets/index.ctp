<div class="subsets index">
	<h2><?php echo __('Subsets'); pr($subsets);?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('subset'); ?></th>
			<th><?php echo $this->Paginator->sort('task'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($subsets as $subset): ?>
	<tr>
		<td><?php echo h($subset['Subset']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($subset['Subset']['title'], array('controller' => 'subsets', 'action' => 'view', $subset['Subset']['id'])); ?>
		</td>
		<td><?php echo h($subset['Task']['title']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $subset['Subset']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $subset['Subset']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $subset['Subset']['id']), null, __('Are you sure you want to delete # %s?', $subset['Subset']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Subset'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Territories'), array('controller' => 'territories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Territory'), array('controller' => 'territories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Outlets'), array('controller' => 'outlets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Outlet'), array('controller' => 'outlets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
