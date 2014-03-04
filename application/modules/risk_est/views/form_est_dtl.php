<script type="text/javascript">

$(document).ready(function(){
    $("#start_date").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
          $("#end_date").datepick("option","minDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])+1))
        }
    });
    $("#end_date").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
        	selected = (parseInt(myarr[0])+543)+"-"+myarr[1]+"-"+myarr[2];
           $("#start_date").datepick("option","maxDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])-1))
        }
         
    }); 
}); 
</script>
  
<h3>เหตุการณ์ความเสี่ยงและการประเมินความเสี่ยง (เพิ่ม/แก้ไข)</h3>
<input type="hidden" name="id" value="<?=@$rs['id'];?>" />
<div id="btnBox">
</div>
<table class="table table-form table-bordered table-striped table-horizontal">	
	<tr>
	  <th width="400px">เหตุการณ์ความเสี่ยง</th>
	  <td><textarea name="event_risk" rows="4" style="width:700px"><?=@$rs['event_risk']?></textarea></td>
  </tr>
  <tr>
  		<th width="400px">วิเคราะห์เหตุการณ์ความเสี่ยง</th>
	  <td>
	  		<?=form_dropdown('risk_type_id',get_option('id','title','risk_type order by id '),@$rs['risk_type_id'],'','--เลือก--');?><br />
	  </td>
  </tr>
</table>
<fieldset>
	<legend>สาเหตุ</legend>
  <table class="table table-form table-bordered table-striped table-horizontal">	
<tr>
        	<th width="400px">ปัจจัยภายใน</th>
            <td>
            	<textarea name="cause_in_risk" class="" rows="4" style="width:700px"><?=@$rs['cause_in_risk'];?></textarea>
            </td>
        </tr>
    	<tr>
        	<th width="400px">ปัจจัยภายนอก</th>
            <td>
               	<textarea name="cause_out_risk" class="" rows="4" style="width:700px"><?=@$rs['cause_out_risk'];?></textarea>
            </td>
        </tr>        
    </table>
</fieldset>
<fieldset>
	<legend>ตัวชี้วัดความเสี่ยง</legend>
	<a href="#" onclick="return false;" class="btn btn-warning btn_add_kri_risk"><i class="icon-plus-sign"></i> เพิ่มตัวชี้วัด </a>
	<p>&nbsp;</p>
	<table class="table table-form table-bordered table-striped table-horizontal">
	  <tr>
	    <th width="300">ตัวชี้วัดความเสี่ยง</th>
	    <th width="">จำนวน</th>
	    <th width="">หน่วยนับ</th>
	    <th style="text-align:center;">ลบ</th>
	  </tr>
	   <? $i = 1;
	   	 $risk_kri = 0;
	   	 $id = @$rs['id'];
		 if($id != ''){
	  	  	$risk_kri = $this->risk_kri->where('risk_est_id='.@$id)->get('','true');
		 }
			$chk_risk_kri = count($risk_kri);
		if(@$id != '' && $chk_risk_kri > 0){
	      	foreach ($risk_kri as $kri) {
	   ?>
			  <tr>	    
			    <td>
			    	<input name="kri_risk[<?=$i?>]" id="kri_risk" type="text" style="width:300px;" value="<?=$kri['kri_risk']?>" class="required" />	    	
			    </td>
			    <td>
			    	<input name="kri_risk_count[<?=$i?>]"  type="text" style="width:100px;" value="<?=$kri['kri_risk_count']?>" onKeyPress="return double(event)" class="required" />	    	
			    </td>
			    <td>
			    	<input name="kri_risk_unit[<?=$i?>]" type="text" style="width:150px;" value="<?=$kri['kri_risk_unit']?>" class="required" />	    	
			    </td>
			    <td style="width:80px;text-align:center;">
			    	<a href="#" onclick="return false;" class="btn btn-danger btn_delete_kri_risk"><i class="icon-trash"></i> ลบ </a>
			    </td>
			  </tr>
			
	  <? 	$i++;}
		 }else{?>
	  <tr>	    
	    <td>
	    	<input name="kri_risk[<?=$i?>]" type="text" style="width:300px;" value="" class="required" />	    	
	    </td>
	    <td>
	    	<input name="kri_risk_count[<?=$i?>]"  type="text" style="width:100px;" onKeyPress="return double(event)" value="" class="required" />	    	
	    </td>
	    <td>
	    	<input name="kri_risk_unit[<?=$i?>]" type="text"  style="width:150px;" value="" class="required" />	    	
	    </td>
	    <td style="width:80px;text-align:center;">
	    	<a href="#" onclick="return false;" class="btn btn-danger btn_delete_kri_risk"><i class="icon-trash"></i> ลบ </a>
	    </td>
	  </tr>
	  	
	  <? } ?>
	  <input type="hidden" name="num_i" value="<?=$i?>" />
	  <input type="hidden" name="i" value="<?=$i?>"/>
	  <tr class="tr_sum_kri_risk">
	  	<th colspan="4"></th>
	  </tr>
	</table>
</fieldset>
<fieldset>
	<legend>การควบคุมที่มีอยู่และการประเมินการควบคุมที่มีอยู่</legend>
	<a href="#" onclick="return false;" class="btn btn-warning btn_add_control_risk"><i class="icon-plus-sign"></i> เพิ่มการควบคุมที่มีอยู่ </a>
	<p>&nbsp;</p>
	<table class="table table-form table-bordered table-striped table-horizontal">	  
	  <tr>
	    <th width="400px">การควบคุมที่มีอยู่</th>
	    <th >การประเมินการควบคุมที่มีอยู่</th>
	    <th style="text-align:center;width:80px;">ลบ</th>	    
	  </tr>
	  <?   $control_i = 1;
	  	   $control_risk = 0;
	  	   if(@$id != ''){
	  	  	$control_risk = $this->risk_control->where('risk_est_id='.@$id)->get('','true');
		   }
			$chk_control_risk = count($control_risk);
			if(@$id != '' && $chk_control_risk > 0){
	      	foreach ($control_risk as $com_risk) {
	   ?>
	  		<tr>
	   		 <td><input name="control_risk[<?=$control_i?>]" style="width:300px;" type="text" class="title" value="<?=@$com_risk['control_risk']?>" /></td>
	   		 <td><textarea name="estimate_control_risk[<?=$control_i?>]" class="title2" rows="4" style="width:700px"><?=@$com_risk['estimate_control_risk']?></textarea></td>
	    	 <td style="width:80px;text-align:center;">
	    		<a href="#" onclick="return false;" class="btn btn-danger btn_delete_control_risk"><i class="icon-trash"></i> ลบ </a>
	       	 </td>
	 	   </tr>
	  <? $control_i++;	} 
	  	  }else{ ?>
	  <tr>
	    <td><input name="control_risk[<?=$control_i?>]" style="width:300px;" type="text" class="title" value="" /></td>
	    <td><textarea name="estimate_control_risk[<?=$control_i?>]" class="title2" rows="4" style="width:700px"></textarea></td>
	    <td style="width:80px;text-align:center;">
	    	<a href="#" onclick="return false;" class="btn btn-danger btn_delete_control_risk"><i class="icon-trash"></i> ลบ </a>
	    </td>
	  </tr>
	  <? } ?>
	  <input type="hidden" name="num_c" value="<?=$control_i?>" />
	  <input type="hidden" name="control_i" value="<?=$control_i?>"/>
	  <tr class="tr_sum_control_risk">
	  	<th colspan="3"></th>
	  </tr>
	</table>
</fieldset>
<fieldset>
	<legend>ความเสี่ยงที่เหลืออยู่</legend>	
  <table class="table table-form table-bordered table-striped table-horizontal">	
		<tr>
        	<th width="400px">ระดับโอกาสเกิด</th>
            <td>
            	<select name="remain_risk_1" class="remain_risk" style="width:50px;">
            		<option value="" <? if(@$rs['remain_risk_1']=='')echo 'selected="selected"';?>>--</option>
            		<? for($i=1;$i<=5;$i++): ?>
            		<option value="<?=$i;?>" <? if(@$rs['remain_risk_1']==$i)echo 'selected="selected"';?>><?=$i;?></option>
            		<? endfor;?>
            	</select>
            </td>
        </tr>
    	<tr>
        	<th width="400px">ระดับผลกระทบ</th>
            <td>
               	<select name="remain_risk_2" class="remain_risk"  style="width:50px;">
               		<option value="" <? if(@$rs['remain_risk_2']=='')echo 'selected="selected"';?>>--</option>
            		<? for($i=1;$i<=5;$i++): ?>
            		<option value="<?=$i;?>" <? if(@$rs['remain_risk_2']==$i)echo 'selected="selected"';?>><?=$i;?></option>
            		<? endfor;?>
            	</select>
            </td>
        </tr>
        <tr>
        	<th width="400px">ระดับความเสี่ยงที่เหลือ</th>
            <td>
               	<input name="remain_risk_3" type="text" style="width:30px;" disabled="disabled" value="<?=(@$rs['remain_risk_1'] * @$rs['remain_risk_2']);?>" />
            </td>
        </tr>        
    </table>
</fieldset>
<table class="table table-form table-bordered table-striped table-horizontal">
  <tr>
    <th width="400px">แนวทางการจัดการ</th>
    <td><textarea name="manage_risk" class="" rows="4" style="width:700px"><?=@$rs['manage_risk'];?></textarea></td>
  </tr>
  <tr>
    <th width="400px">ผู้รับผิดชอบ</th>
    <td><input name="owner_risk" type="text" class="" value="<?=@$rs['owner_risk'];?>" /></td>
  </tr>
  <tr>
    <th width="400px">ตำแหน่ง</th>
    <td><input name="owner_risk_position" type="text" class="" value="<?=@$rs['owner_risk_position'];?>" /></td>
  </tr>
  <tr>
    <th width="400px">วันที่เริ่มดำเนินการ</th>
    <td><input type="text" name="start_date" id="start_date" value="<?=@mysql_to_date($rs['start_date']);?>" style="width:100px" readonly="readonly" /></td>
  </tr>
  <tr>
    <th width="400px">วันที่เสร็จสิ้น</th>
    <td><input type="text" name="end_date" id="end_date" value="<?=@mysql_to_date($rs['end_date']);?>" style="width:100px" readonly="readonly" /></td>
  </tr>
</table>
<div align="center">
				<input type="submit" id="save" value="Save" class="btn btn-primary"> 
				<input type="button" value="  Back  "  class="btn btn-inverse bt_cancel">
</div>

