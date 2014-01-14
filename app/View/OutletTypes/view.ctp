<div class="outletTypes view">
<h2><?php echo __('Outlet Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($outletType['OutletType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($outletType['OutletType']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descr'); ?></dt>
		<dd>
			<?php echo h($outletType['OutletType']['descr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($outletType['OutletType']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Outlet Type'), array('action' => 'edit', $outletType['OutletType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Outlet Type'), array('action' => 'delete', $outletType['OutletType']['id']), null, __('Are you sure you want to delete # %s?', $outletType['OutletType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Outlet Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Outlet Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Outlets'), array('controller' => 'outlets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Outlet'), array('controller' => 'outlets', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Outlets'); ?></h3>
	<?php if (!empty($outletType['Outlet'])): ?>
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
		foreach ($outletType['Outlet'] as $outlet): ?>
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
