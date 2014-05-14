<div class="surveyAttributes form">
<?php echo $this->Form->create('SurveyAttribute'); ?>
	<fieldset>
		<legend><?php echo __('Add Survey Attribute'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('type', array('type' => 'select', 
                    'options' => array('numeric' => 'Numeric','boolean' => 'Boolean','text' => 'Text')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Survey Attributes'), array('action' => 'index')); ?></li>
	</ul>
</div>
