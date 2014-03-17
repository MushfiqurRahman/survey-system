<div class="categories form">
<?php echo $this->Form->create('FrontEndMenu'); ?>
	<fieldset>
		<legend><?php echo __('Edit FrontEndMenu'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('menu_code');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('List Front End Menu')); ?></li>
	</ul>
</div>
