<div class="outlets index">
	<h2><?php echo __('Outlets'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('outlet_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('town_id'); ?></th>
			<th><?php echo $this->Paginator->sort('outlet_code'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('website'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($outlets as $outlet): ?>
	<tr>
		<td><?php echo h($outlet['Outlet']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($outlet['OutletType']['title'], array('controller' => 'outlet_types', 'action' => 'view', $outlet['OutletType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($outlet['Town']['title'], array('controller' => 'towns', 'action' => 'view', $outlet['Town']['id'])); ?>
		</td>
		<td><?php echo h($outlet['Outlet']['outlet_code']); ?>&nbsp;</td>
		<td><?php echo h($outlet['Outlet']['name']); ?>&nbsp;</td>
		<td><?php echo h($outlet['Outlet']['email']); ?>&nbsp;</td>
		<td><?php echo h($outlet['Outlet']['phone']); ?>&nbsp;</td>
		<td><?php echo h($outlet['Outlet']['address']); ?>&nbsp;</td>
		<td><?php echo h($outlet['Outlet']['website']); ?>&nbsp;</td>
		<td><?php echo h($outlet['Outlet']['status']); ?>&nbsp;</td>
		<td><?php echo h($outlet['Outlet']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $outlet['Outlet']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $outlet['Outlet']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $outlet['Outlet']['id']), null, __('Are you sure you want to delete # %s?', $outlet['Outlet']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Outlet'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Outlet Types'), array('controller' => 'outlet_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Outlet Type'), array('controller' => 'outlet_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Towns'), array('controller' => 'towns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Town'), array('controller' => 'towns', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('controller' => 'surveys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey'), array('controller' => 'surveys', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
