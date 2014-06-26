<div class="mappingTradePromotions form">
<?php echo $this->Form->create('MappingTradePromotion'); ?>
	<fieldset>
		<legend><?php echo __('Add Mapping Trade Promotion'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Mapping Trade Promotions'), array('action' => 'index')); ?></li>
	</ul>
</div>
