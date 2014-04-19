<div class="surveys index">
    <?php
        
    ?>
    
	<h2><?php echo __('Surveys'); ?></h2>
        
        <?php echo $this->Form->create(array('action' => 'index','type' => 'post'));?>
        
        <table>
            <tr>
                <td>
                    <?php echo $this->Form->input('month', array('type' => 'select',
                    'options' => array('1' => 'January',
                        '2' => 'February',
                        '3' => 'March',
                        '4' => 'April',
                        '5' => 'May',
                        '6' => 'June',
                        '7' => 'July',
                        '8' => 'August',
                        '9' => 'September',
                        '10' => 'October',
                        '11' => 'November',
                        '12' => 'December'), 
                    'empty' => '-Select Month-',
                        'label' => false,
                        'id' => 'selectMonth'));
                    ?>
                </td>
                <td>
                    <?php echo $this->Form->input('year',array('type' => 'select',
                        'options' => array('2014' => '2014', '2015' => '2015', '2016' => '2016'),
                        'empty' => '-Select Year-', 'label' => false,
                        'id' => 'selectYear'));
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php 
                        echo $this->Form->input('region_id', array('type' => 'select', 
                            'options' => $regions,
                            'empty' => '-Select Region-',
                            'label' => false,
                            'id' => 'regionId'));
                    ?>
                </td>
                <td>
                    <?php 
                        echo $this->Form->input('territory_id', array('type' => 'select',
                            'empty' => '-Select Territory-',
                            'label' => false,
                            'id' => 'territoryId'
                            ));
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php 
                        echo $this->Form->input('town_id', array('type' => 'select', 
                            'empty' => '-Select Town-',
                            'label' => false,
                            'id' => 'townId'));
                    ?>
                </td>
                <td><?php echo $this->Form->input('dms_code',array('type' => 'text', 'placeholder' => 'dms code', 'label' => false));?></td>
            </tr>
        </table>
                
        <?php echo $this->Form->input('Search', array('type' => 'submit', 'value' => 'Search', 
            'id' => 'btnSearch', 'label' => false));
        echo $this->Form->end();?>
        
        
	<table cellpadding="0" cellspacing="0" style="margin-top:70px;">
	<tr>
			<th><?php echo __('Region'); ?></th>
			<th><?php echo __('Territory'); ?></th>
                        <th><?php echo __('Town');?></th>
                        <th><?php echo __('Store Name');?></th>
                        <th><?php echo __('Store Type');?></th>
                        <th><?php echo __('Phone Number');?></th>
                        <th><?php echo __('Slab');?></th>
                        <th><?php echo __('DMS-Code');?></th>
                        <th><?php echo __('Audit Date & Time');?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($surveys as $survey): ?>
	<tr>
		<td><?php echo h($survey['Outlet']['Town']['Territory']['Region']['title']); ?>&nbsp;</td>
                <td><?php echo h($survey['Outlet']['Town']['Territory']['title']);?>&nbsp;</td>
                <td><?php echo h($survey['Outlet']['Town']['title']);?>&nbsp;</td>
                <td><?php echo h($survey['Outlet']['name']);?>&nbsp;</td>
                <td><?php echo h($survey['Outlet']['OutletType']['title']);?>&nbsp;</td>
                <td><?php echo h($survey['Outlet']['phone']);?>&nbsp;</td>
                <td><?php echo h($survey['Outlet']['OutletType']['class']);?>&nbsp;</td>
                <td><?php echo h($survey['Outlet']['dms_code']);?>&nbsp;</td>
                <td><?php echo h($survey['Survey']['date_time']);?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Details'), array('action' => 'view', $survey['Survey']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $survey['Survey']['id']), null, __('Are you sure you want to delete # %s?', $survey['Survey']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

<script>
    $(document).ready(function(){
        var base_url = "<?php echo Configure::read('base_url');?>";
        $("#regionId").change(function(e){
           if( $(this).val()>0 ){               
                $.ajax({
                    url: base_url + "/surveys/ajaxGetListData",
                    data: "region_id="+$(this).val(),
                    type: "post",
                    success: function(response){
                        alert(response);
                        var decodedData = $.parseJSON(response);
                        if( decodedData['success']!=true){
                            alert(decodedData['data']);
                        }else{                        
                            $.each(decodedData['data'], function(i,v){
                                $("#territoryId").append('<option value="'+i+'">'+v+'</option>');
                            });
                        }
                    }
                });
           }
        });
        
        $("#territoryId").change(function(e){
           if( $(this).val()>0 ){               
                $.ajax({
                    url: base_url + "/surveys/ajaxGetListData",
                    data: "territory_id="+$(this).val(),
                    type: "post",
                    success: function(response){
                        alert(response);
                        var decodedData = $.parseJSON(response);
                        if( decodedData['success']!=true){
                            alert(decodedData['data']);
                        }else{                        
                            $.each(decodedData['data'], function(i,v){
                                $("#townId").append('<option value="'+i+'">'+v+'</option>');
                            });
                        }
                    }
                });
           }
        });
        
        $("#btnSearch").click(function(e){
            e.preventDefault();
            
            if( $("#selectMonth").val()>0 && $("#selectYear").val()<1 ){
                alert("Please select a year");
                return false;
            }else{
                $("#SurveyIndexForm").submit();
            }
        });
    });
</script>