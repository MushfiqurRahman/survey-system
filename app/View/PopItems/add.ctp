<div style="margin-left:40px;">
    
<?php echo $this->Form->create('PopItem'); ?>
	<fieldset>
		<legend><?php echo __('Add PopItem'); ?></legend>
	<?php
//		echo $this->Form->input('title');
//		echo $this->Form->input('descr');
//		echo $this->Form->input('sku', array('size' => 20));
	?>      
                <div id="product_fields">
                    <?php
                        echo $this->Form->input('head', array('required' => true));
                        echo $this->Form->input('descr', array('required' => true));
                        echo $this->Form->input('OutletType', array('required' => true, 'size' => 13,
                        'type' => 'select', 'options' => $OutletType, 'multiple' => true));?>
                </div>
                
<!--                <div>
                    <a href="javascript:void(0);" id="addMorePopItem">(+)Add More</a>
                </div>                -->
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

