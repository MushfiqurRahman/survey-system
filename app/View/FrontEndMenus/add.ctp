<div class="categories form">
<?php echo $this->Form->create('FrontEndMenu'); ?>
	<fieldset>
		<legend><?php echo __('Add Front End Menu'); ?></legend>
	<?php
		echo $this->Form->input('title');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	
</div>
