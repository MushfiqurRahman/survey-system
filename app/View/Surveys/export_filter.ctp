<div class="surveys index">
	<h2><?php echo __('Export Survey Report<hr/>');?></h2>
        
        <?php echo $this->Form->create(array('action' => 'export_report','type' => 'get'));?>
        <table style="width:60%">
            <tr>
                <td>
                    <label>From</label>
                    <input size="25" name="start_date" id="startDate" onFocus="this.value=''" onClick="showCalendarControl(this);" type="text"  value="<?php echo isset($this->data['start_date']) ? $this->data['start_date'] : '';?>" />
                </td>
                <td>
                    <label>To</label>
                    <input size="25" name="end_date" id="endDate" onFocus="this.value=''" onClick="showCalendarControl(this);" type="text"  value="<?php echo isset($this->data['end_date']) ? $this->data['end_date'] : '';?>" />
                </td>
            </tr>
            <tr>
                <td><label>Report Type</label></td><td></td>
            </tr>
            <tr>
                <td>                    
                    <input type="radio" name="report_type" value="must_sku" checked="checked"/>Perfect Must Sku</td>
                <td></td>
            </tr>
            <tr>
                <td><input type="radio" name="report_type" value="fixed_display"/>Fixed Display</td>
                <td></td>
            </tr>
            <tr>
                <td><input type="radio" name="report_type" value="pf_rest"/>Perfect Rest</td>
                <td></td>
            </tr>
        </table>
                
        <?php echo $this->Form->input('Export', array('type' => 'submit', 'value' => 'Export', 
            'id' => 'btnExport', 'label' => false));
        //echo $this->Form->end();?>
        </form>
        
</div>

<script>
    $(document).ready(function(){
        $("#btnExport").click(function(e){
            e.preventDefault();
            
            if( $.trim($("#startDate").val()).length==0 && $.trim($("#endDate").val()).length==0 ){
                alert("Please Select the date range");
            }else{
                $("#SurveyExportReportForm").submit();
            }
        });
    });
</script>