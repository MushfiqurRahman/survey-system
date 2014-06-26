<div class="mappingTradePromotions view">
<h2><?php echo __('Mapping Trade Promotion'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mappingTradePromotion['MappingTradePromotion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Outlet Type Id'); ?></dt>
		<dd>
			<?php echo h($mappingTradePromotion['MappingTradePromotion']['outlet_type_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Program Id'); ?></dt>
		<dd>
			<?php echo h($mappingTradePromotion['MappingTradePromotion']['program_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trade Promotion Order'); ?></dt>
		<dd>
			<?php echo h($mappingTradePromotion['MappingTradePromotion']['trade_promotion_order']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mapping Trade Promotion'), array('action' => 'edit', $mappingTradePromotion['MappingTradePromotion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Mapping Trade Promotion'), array('action' => 'delete', $mappingTradePromotion['MappingTradePromotion']['id']), null, __('Are you sure you want to delete # %s?', $mappingTradePromotion['MappingTradePromotion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mapping Trade Promotions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mapping Trade Promotion'), array('action' => 'add')); ?> </li>
	</ul>
</div>
