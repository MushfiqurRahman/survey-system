<div class="surveys export_report">
	<h2><?php echo __('Export Survey Report'); ?></h2>
        
        <?php echo $this->Form->create(array('action' => 'export_report','type' => 'get'));?>
        
        <table>
            <tr>
                <td>
                    <?php 
                        echo $this->Form->input('month_id', array('type' => 'select',
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
                            'selected' => empty($data['month_id'])?'':$data['month_id'],
                            'label' => false,
                            'id' => 'selectMonth'));
                    ?>
                </td>
                <td>
                    <?php echo $this->Form->input('year_id',array('type' => 'select',
                        'options' => array('2014' => '2014', '2015' => '2015', '2016' => '2016'),
                        'empty' => '-Select Year-', 'label' => false,
                        'selected' => empty($data['year_id'])?'':$data['year_id'],
                        'id' => 'selectYear'));
                    ?>
                </td>
            </tr>
            
            
        </table>
                
        <?php echo $this->Form->input('Search', array('type' => 'submit', 'value' => 'Search', 
            'id' => 'btnSearch', 'label' => false));
        //echo $this->Form->end();?>
        </form>
        
        
	<table cellpadding="0" cellspacing="0" style="margin-top:70px;">
	
	</table>
	
</div>

<script>
    $(document).ready(function(){
        var base_url = "<?php echo Configure::read('base_url');?>";
        
        if( $("#regionId").val()>0 ){
            populate_territory($("#regionId").val());
        }
        
        if( $("#territoryId").val()>0 ){
            populate_town($("#territoryId").val());
        }
        
        $("#regionId").change(function(e){
            $('#territoryId option[value!=""]').remove();
            if( $(this).val()>0 ){               
                 populate_territory($(this).val());
            }
        });
        $("#territoryId").change(function(e){
           if( $(this).val()>0 ){               
                populate_town($(this).val());
           }
        });
        function populate_territory(regionId){
            $.ajax({
                    url: base_url + "/surveys/ajaxGetListData",
                    data: "region_id="+regionId,
                    type: "post",
                    success: function(response){
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
        
        function populate_town(territoryId){
            $.ajax({
                    url: base_url + "/surveys/ajaxGetListData",
                    data: "territory_id="+territoryId,
                    type: "post",
                    success: function(response){
                        //alert(response);
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