<div class="outlets view">
<h2><?php echo __('Outlet'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($outlet['Outlet']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Outlet Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($outlet['OutletType']['title'], array('controller' => 'outlet_types', 'action' => 'view', $outlet['OutletType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Town'); ?></dt>
		<dd>
			<?php echo $this->Html->link($outlet['Town']['title'], array('controller' => 'towns', 'action' => 'view', $outlet['Town']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Outlet Code'); ?></dt>
		<dd>
			<?php echo h($outlet['Outlet']['outlet_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($outlet['Outlet']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($outlet['Outlet']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($outlet['Outlet']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($outlet['Outlet']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($outlet['Outlet']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($outlet['Outlet']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($outlet['Outlet']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Outlet'), array('action' => 'edit', $outlet['Outlet']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Outlet'), array('action' => 'delete', $outlet['Outlet']['id']), null, __('Are you sure you want to delete # %s?', $outlet['Outlet']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Outlets'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Outlet'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Surveys'); ?></h3>
	<?php if (!empty($outlet['Survey'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Subcategory Id'); ?></th>
		<th><?php echo __('Outlet Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Responder Name'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Responder Role'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Time'); ?></th>
		<th><?php echo __('Lattitude'); ?></th>
		<th><?php echo __('Longitude'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($outlet['Survey'] as $survey): ?>
		<tr>
			<td><?php echo $survey['id']; ?></td>
			<td><?php echo $survey['category_id']; ?></td>
			<td><?php echo $survey['subcategory_id']; ?></td>
			<td><?php echo $survey['outlet_id']; ?></td>
			<td><?php echo $survey['user_id']; ?></td>
			<td><?php echo $survey['responder_name']; ?></td>
			<td><?php echo $survey['phone']; ?></td>
			<td><?php echo $survey['responder_role']; ?></td>
			<td><?php echo $survey['image']; ?></td>
			<td><?php echo $survey['time']; ?></td>
			<td><?php echo $survey['lattitude']; ?></td>
			<td><?php echo $survey['longitude']; ?></td>
			<td><?php echo $survey['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'surveys', 'action' => 'view', $survey['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'surveys', 'action' => 'edit', $survey['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'surveys', 'action' => 'delete', $survey['id']), null, __('Are you sure you want to delete # %s?', $survey['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Survey'), array('controller' => 'surveys', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($outlet['User'])): ?>
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
		foreach ($outlet['User'] as $user): ?>
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
