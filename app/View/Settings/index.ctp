<div>
    <ul>
        <li><?php echo $this->Html->link('Products', array('controller' => 'Products', 'action' => 'index'));?></li>
        <li><?php echo $this->Html->link('Survey Attributes', array('controller' => 'SurveyAttributes', 'action' => 'index'));?></li>
        <li><?php echo $this->Html->link('Tasks', array('controller' => 'Tasks', 'action' => 'index'));?></li>
        <li><?php echo $this->Html->link('Parts', array('controller' => 'Parts', 'action' => 'index'));?></li>        
        <li><?php echo $this->Html->link('Trade Promotion Items', array('controller' => 'Programs', 'action' => 'index'));?></li>
        <li><?php echo $this->Html->link('Import Universe', array('controller' => 'Regions', 'action' => 'import_universe'));?></li>
     </ul>
</div>
<div class="settings index">
	<h2><?php echo __('Settings'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('variable_name'); ?></th>
			<th><?php echo $this->Paginator->sort('variable_label'); ?></th>
			<th><?php echo $this->Paginator->sort('value'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($settings as $setting): ?>
	<tr>
		<td><?php echo h($setting['Setting']['id']); ?>&nbsp;</td>
		<td><?php echo h($setting['Setting']['variable_name']); ?>&nbsp;</td>
		<td><?php echo h($setting['Setting']['variable_label']); ?>&nbsp;</td>
		<td><?php echo h($setting['Setting']['value']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $setting['Setting']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $setting['Setting']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $setting['Setting']['id']), null, __('Are you sure you want to delete # %s?', $setting['Setting']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Setting'), array('action' => 'add')); ?></li>
	</ul>
</div>
