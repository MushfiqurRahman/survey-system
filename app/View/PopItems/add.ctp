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
                    
                    <div class="add_prod_field">
                        <label>Title</label>
                        <input type="text" size="40" name="data[0][PopItem][head]" required="required"/>
                    </div>

                    <div class="add_prod_field">
                        <label>Description</label>
                        <input type="text" class="descr" required="required" name="data[0][PopItem][descr]"/>
                    </div>
                </div>
                
                <div>
                    <?php echo $this->Form->input('OutletType', array('required' => true, 'size' => 13));?>
                </div>
                
<!--                <div>
                    <a href="javascript:void(0);" id="addMorePopItem">(+)Add More</a>
                </div>                -->
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

