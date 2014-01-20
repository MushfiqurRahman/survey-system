<div class="products form">
<?php echo $this->Form->create('Product'); ?>
	<fieldset>
		<legend><?php echo __('Add Product'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('descr');
		echo $this->Form->input('sku', array('size' => 20));
	?>
                
<!--                <label>Title</label>
                <input type="text" size="40" name="data[Product][1][title]" required="required"/>
                
                <label>SKU</label>
                <input type="text" size="40" name="data[Product][1][title]" required="required"/>
                
                <label>Description</label>
                <input type="text" size="40" name="data[Product][1][title]" required="required"/>-->
                
                
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
