<div class="tasks form">
<?php echo $this->Form->create('Task'); ?>
	<fieldset>
		<legend><?php echo __('Edit Task'); ?></legend>
	<?php
            
		echo $this->Form->input('id');
		echo $this->Form->input('title');
                echo $this->Form->input('outlet_type_id');
//                echo $this->Form->input('front_end_menu_id');
		echo $this->Form->input('descr');
                echo $this->Form->input('guide_lines', array('rows' => 3));
		//echo $this->Form->input('surv_attr_ids');
                
                echo $this->Form->input('surv_attr_ids', array('type' => 'select', 
                    'label' => __('Survey Attributes'),
                    'multiple' => 'checkbox', 'options' => $surveyAttribs,
                    'required' => false,
                    'selected' => unserialize($this->request->data['Task']['surv_attr_ids'])));
		
		echo $this->Form->input('Product', array('size' => 20));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Task.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Task.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Parts'), array('controller' => 'parts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Part'), array('controller' => 'parts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
