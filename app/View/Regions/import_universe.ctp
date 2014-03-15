<h1><?php echo __('Import Universe data');?></h1>
<?php
    echo $this->Form->create('Region',array('type' => 'file'));
    echo $this->Form->input('xls_file',array('type' => 'file','label' => 'Select the universe file'));
    
    echo $this->Form->end('Import');
?>