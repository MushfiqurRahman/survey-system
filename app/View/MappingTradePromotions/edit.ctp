<div class="mappingTradePromotions form">
<?php echo $this->Form->create('MappingTradePromotion'); ?>
	<fieldset>
		<legend><?php echo __('Edit Mapping Trade Promotion'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('outlet_type_id');
		echo $this->Form->input('program_id');
		echo $this->Form->input('trade_promotion_order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MappingTradePromotion.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MappingTradePromotion.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mapping Trade Promotions'), array('action' => 'index')); ?></li>
	</ul>
</div>
