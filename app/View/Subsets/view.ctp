<div class="towns view">
<h2><?php echo __('Town'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($town['Town']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Territory'); ?></dt>
		<dd>
			<?php echo $this->Html->link($town['Territory']['title'], array('controller' => 'territories', 'action' => 'view', $town['Territory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($town['Town']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($town['Town']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Town'), array('action' => 'edit', $town['Town']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Town'), array('action' => 'delete', $town['Town']['id']), null, __('Are you sure you want to delete # %s?', $town['Town']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Towns'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Town'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Territories'), array('controller' => 'territories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Territory'), array('controller' => 'territories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Outlets'), array('controller' => 'outlets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Outlet'), array('controller' => 'outlets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Outlets'); ?></h3>
	<?php if (!empty($town['Outlet'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Outlet Type Id'); ?></th>
		<th><?php echo __('Town Id'); ?></th>
		<th><?php echo __('Outlet Code'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($town['Outlet'] as $outlet): ?>
		<tr>
			<td><?php echo $outlet['id']; ?></td>
			<td><?php echo $outlet['outlet_type_id']; ?></td>
			<td><?php echo $outlet['town_id']; ?></td>
			<td><?php echo $outlet['outlet_code']; ?></td>
			<td><?php echo $outlet['name']; ?></td>
			<td><?php echo $outlet['email']; ?></td>
			<td><?php echo $outlet['phone']; ?></td>
			<td><?php echo $outlet['address']; ?></td>
			<td><?php echo $outlet['website']; ?></td>
			<td><?php echo $outlet['status']; ?></td>
			<td><?php echo $outlet['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'outlets', 'action' => 'view', $outlet['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'outlets', 'action' => 'edit', $outlet['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'outlets', 'action' => 'delete', $outlet['id']), null, __('Are you sure you want to delete # %s?', $outlet['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Outlet'), array('controller' => 'outlets', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($town['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Role Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Is Surveyor'); ?></th>
		<th><?php echo __('Town Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($town['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['role_id']; ?></td>
			<td><?php echo $user['category_id']; ?></td>
			<td><?php echo $user['is_surveyor']; ?></td>
			<td><?php echo $user['town_id']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
