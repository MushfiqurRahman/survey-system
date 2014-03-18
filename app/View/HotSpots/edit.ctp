<div class="hot_spots form">
<?php echo $this->Form->create('HotSpot'); ?>
	<fieldset>
		<legend><?php echo __('Edit HotSpot'); ?></legend>
	<?php
            echo $this->Form->input('id');
		echo $this->Form->input('head', array('required' => true, 'size' => '30'));
                    echo $this->Form->input('descr', array('required' => true, 'size' => '30'));
                    echo $this->Form->input('first_compliance', array('required' => true, 'size' => '30'));
                    echo $this->Form->input('second_compliance', array('size' => '30'));
                    
                    echo $this->Form->input('OutletType', array('required' => true, 'size' => 13,
                        'type' => 'select', 'options' => $OutletType, 'multiple' => true));?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('HotSpot.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('HotSpot.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List HotSpots'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
