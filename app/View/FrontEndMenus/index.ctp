<div class="front_end_menus index">
	<h2><?php echo __('Front End Menus'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
                        <th><?php echo $this->Paginator->sort('menu_code'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($front_end_menus as $category): ?>
	<tr>
		<td><?php echo h($category['FrontEndMenu']['id']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(h($category['FrontEndMenu']['title']), 
                        array('controller' => 'front_end_menus', 'action' => 'view', $category['FrontEndMenu']['id'])); ?>&nbsp;</td>
		
		<td><?php echo h($category['FrontEndMenu']['menu_code']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $category['FrontEndMenu']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['FrontEndMenu']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['FrontEndMenu']['id']), null, __('Are you sure you want to delete # %s?', $category['FrontEndMenu']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New FrontEndMenu'), array('action' => 'add')); ?></li>
		
</div>
