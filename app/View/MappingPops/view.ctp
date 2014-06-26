<div class="mappingPops view">
<h2><?php echo __('Mapping Pop'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mappingPop['MappingPop']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Outlet Type Id'); ?></dt>
		<dd>
			<?php echo h($mappingPop['MappingPop']['outlet_type_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pop Item Id'); ?></dt>
		<dd>
			<?php echo h($mappingPop['MappingPop']['pop_item_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pop Order'); ?></dt>
		<dd>
			<?php echo h($mappingPop['MappingPop']['pop_order']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mapping Pop'), array('action' => 'edit', $mappingPop['MappingPop']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Mapping Pop'), array('action' => 'delete', $mappingPop['MappingPop']['id']), null, __('Are you sure you want to delete # %s?', $mappingPop['MappingPop']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mapping Pops'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mapping Pop'), array('action' => 'add')); ?> </li>
	</ul>
</div>
