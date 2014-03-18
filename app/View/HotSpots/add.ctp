<div style="margin-left:40px;">
    
<?php echo $this->Form->create('HotSpot'); ?>
	<fieldset>
		<legend><?php echo __('Add HotSpot'); ?></legend>
	<?php
//		echo $this->Form->input('title');
//		echo $this->Form->input('descr');
//		echo $this->Form->input('sku', array('size' => 20));
	?>      
                <div id="product_fields">
                    
<!--                    <div class="add_prod_field">
                        <label>Title</label>
                        <input type="text" size="40" name="data[0][HotSpot][head]" required="required"/>
                    </div>

                    <div class="add_prod_field">
                        <label>Description</label>
                        <input type="text" class="descr" required="required" name="data[0][HotSpot][descr]"/>
                    </div>
                    
                    <div class="add_prod_field">
                        <label>First Comliance</label>
                        <input type="text" class="first_compliance" size="30" name="data[0][HotSpot][first_compliance]" required="required"/>
                    </div>
                    
                    <div class="add_prod_field">
                        <label>Second Compliance</label>
                        <input type="text" class="first_compliance" size="30"  name="data[0][HotSpot][second_compliance]"/>
                    </div>-->
                    
                    <?php 
                    
                    echo $this->Form->input('head', array('required' => true, 'size' => '30'));
                    echo $this->Form->input('descr', array('required' => true, 'size' => '30'));
                    echo $this->Form->input('first_compliance', array('required' => true, 'size' => '30'));
                    echo $this->Form->input('second_compliance', array('size' => '30'));
                    
                    echo $this->Form->input('OutletType', array('required' => true, 'size' => 13,
                        'type' => 'select', 'options' => $OutletType, 'multiple' => true));?>
                    
                    
                </div>
                
<!--                <div>
                    <a href="javascript:void(0);" id="addMoreHotSpot">(+)Add More</a>
                </div>                -->
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

