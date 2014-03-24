<div class="surveys index">
	<h2><?php echo __('Surveys'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('outlet_id'); ?></th>
<!--                        <th><?php echo $this->Paginator->sort('failure_cause');?></th>-->
                        <th><?php echo $this->Paginator->sort('must_sku');?></th>
                        <th><?php echo $this->Paginator->sort('fixed_display');?></th>
                        <th><?php echo $this->Paginator->sort('new_product');?></th>
                        <th><?php echo $this->Paginator->sort('trade_promotion');?></th>
                        <th><?php echo $this->Paginator->sort('pop');?></th>
                        <th><?php echo $this->Paginator->sort('hot_spot');?></th>
                        <th><?php echo $this->Paginator->sort('additional_info');?></th>
			<th><?php echo $this->Paginator->sort('first_image'); ?></th>
			<th><?php echo $this->Paginator->sort('second_image'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($surveys as $survey): ?>
	<tr>
		<td><?php echo h($survey['Survey']['id']); ?>&nbsp;</td>
                <td><?php echo h($survey['Survey']['outlet_id']);?>&nbsp;</td>
<!--                <td><?php echo h($survey['Survey']['failure_cause']);?>&nbsp;</td>-->
                <td><?php echo h($survey['Survey']['must_sku']);?>&nbsp;</td>
                <td><?php echo h($survey['Survey']['fixed_display']);?>&nbsp;</td>
                <td><?php echo h($survey['Survey']['new_product']);?>&nbsp;</td>
                <td><?php echo h($survey['Survey']['trade_promotion']);?>&nbsp;</td>
                <td><?php echo h($survey['Survey']['pop']);?>&nbsp;</td>
                <td><?php echo h($survey['Survey']['hot_spot']);?>&nbsp;</td>
                <td><?php echo h($survey['Survey']['additional_info']);?>&nbsp;</td>
                <td><img src="<?php echo $survey['Survey']['first_image'];?>" width="200" height="160"/>&nbsp;</td>
                <td><img src="<?php echo $survey['Survey']['second_image'];?>" width="200" height="160"/>&nbsp;</td>
                
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $survey['Survey']['id'])); ?>			
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $survey['Survey']['id']), null, __('Are you sure you want to delete # %s?', $survey['Survey']['id'])); ?>
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