<div style="margin-left:40px;">
    
<?php echo $this->Form->create('Program'); ?>
	<fieldset>
		<legend><?php echo __('Add Program'); ?></legend>
	<?php
//		echo $this->Form->input('title');
//		echo $this->Form->input('descr');
//		echo $this->Form->input('sku', array('size' => 20));
	?>      
                <div id="product_fields">
                    
                    <div class="add_prod_field">
                        <label>Title</label>
                        <input type="text" size="40" name="data[0][Program][title]" required="required"/>
                    </div>

                    <div class="add_prod_field">
                        <label>Description</label>
                        <input type="text" class="descr" name="data[0][Program][descr]"/>
                    </div>
                    
                    
                </div>
                
<!--                <div>
                    <a href="javascript:void(0);" id="addMoreProgram">(+)Add More</a>
                </div>                -->
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

