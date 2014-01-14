<div class="territories view">
<h2><?php echo __('Territory'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($territory['Territory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Region'); ?></dt>
		<dd>
			<?php echo $this->Html->link($territory['Region']['title'], array('controller' => 'regions', 'action' => 'view', $territory['Region']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($territory['Territory']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($territory['Territory']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Territory'), array('action' => 'edit', $territory['Territory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Territory'), array('action' => 'delete', $territory['Territory']['id']), null, __('Are you sure you want to delete # %s?', $territory['Territory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Territories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Territory'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), array('controller' => 'regions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('controller' => 'regions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Towns'), array('controller' => 'towns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Town'), array('controller' => 'towns', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Towns'); ?></h3>
	<?php if (!empty($territory['Town'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Territory Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($territory['Town'] as $town): ?>
		<tr>
			<td><?php echo $town['id']; ?></td>
			<td><?php echo $town['territory_id']; ?></td>
			<td><?php echo $town['title']; ?></td>
			<td><?php echo $town['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'towns', 'action' => 'view', $town['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'towns', 'action' => 'edit', $town['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'towns', 'action' => 'delete', $town['id']), null, __('Are you sure you want to delete # %s?', $town['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Town'), array('controller' => 'towns', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
