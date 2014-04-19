<div class="surveys index">
	<h2><?php echo __('Surveys'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo __('Region'); ?></th>
			<th><?php echo __('Territory'); ?></th>
                        <th><?php echo __('Town');?></th>
                        <th><?php echo __('Store Name');?></th>
                        <th><?php echo __('Store Type');?></th>
                        <th><?php echo __('Phone Number');?></th>
                        <th><?php echo __('Slab');?></th>
                        <th><?php echo __('DMS-Code');?></th>
                        <th><?php echo __('Audit Date & Time');?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($surveys as $survey): ?>
	<tr>
		<td><?php echo h($survey['Outlet']['Town']['Territory']['Region']['title']); ?>&nbsp;</td>
                <td><?php echo h($survey['Outlet']['Town']['Territory']['title']);?>&nbsp;</td>
                <td><?php echo h($survey['Outlet']['Town']['title']);?>&nbsp;</td>
                <td><?php echo h($survey['Outlet']['name']);?>&nbsp;</td>
                <td><?php echo h($survey['Outlet']['OutletType']['title']);?>&nbsp;</td>
                <td><?php echo h($survey['Outlet']['phone']);?>&nbsp;</td>
                <td><?php echo h($survey['Outlet']['OutletType']['class']);?>&nbsp;</td>
                <td><?php echo h($survey['Outlet']['dms_code']);?>&nbsp;</td>
                <td><?php echo h($survey['Survey']['date_time']);?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Details'), array('action' => 'view', $survey['Survey']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $survey['Survey']['id']), null, __('Are you sure you want to delete # %s?', $survey['Survey']['id'])); ?>
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