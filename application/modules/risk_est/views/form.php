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
$(function(){
	function validate_form(){
		$(".commentForm").validate({
			rules: 
			{
				year_data:{ required: true},
				sectionid:{ required: true},
				missionid:{ required: true},
				objectiveid_1:{ required: true},
				objectiveid_2:{ required: true},
				objectiveid_3:{ required: true},
				processid:{ required: true},
				event_risk:{ required: true},
				review_risk:{ required: true},
				risk_type_id:{	required: true},
				risk_analyze:{	required: true},
				cause_in_risk:{ required: true},
				cause_out_risk:{ required: true},
				remain_risk_1:{ required: true ,number: true},
				remain_risk_2:{ required: true ,number: true},
				remain_risk_3:{ required: true ,number: true},
				manage_risk:{ required: true},
				owner_risk:{ required: true},
				owner_risk_position:{ required: true},
				start_date:{ required: true},
				end_date:{ required: true}
			},
			messages:
			{
				year_data:{required: " กรุณาเลือกปี"},
				sectionid:{ required: " กรุณาเลือกภาควิชา/งาน"},
				objectiveid_1:{ required: " กรุณาเลือกวัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย"},
				objectiveid_2:{ required: " กรุณาเลือกวัตถุประสงค์ตามยุทธศาสตร์ของหน่วยงาน/ส่วนงาน"},
				objectiveid_3:{ required: " กรุณาเลือกวัตถุประสงค์ตามยุทธศาสตร์ของงาน"},
				missionid:{ required: " กรุณาเลือกภารกิจ"},
				processid:{ required: " กรุณาเลือกกระบวนงาน"},
				event_risk:{ required: " กรุณาระบุเหตุการณ์ความเสี่ยง"},
				review_risk:{ required: " กรุณาระบุทบทวนเหตุการณ์ความเสี่ยง"},
				risk_type_id:{	required: " กรุณาเลือกวิเคราะห์เหตุการณ์ความเสี่ยง"},
				risk_analyze:{	required: " กรุณาระบุรายละเอียดวิเคราะห์เหตุการณ์ความเสี่ยง"},
				cause_in_risk:{ required: "กรุณาระบุปัจจัยภายใน"},
				cause_out_risk:{ required: "กรุณาระบุปัจจัยภายนอก"},
				remain_risk_1:{ required: "กรุณาระบุระดับโอกาสเกิด" ,number: "กรุณาระบุเป็นตัวเลข"},
				remain_risk_2:{ required: "กรุณาระบุระดับผลกระทบ" ,number: "กรุณาระบุเป็นตัวเลข"},
				remain_risk_3:{ required: "กรุณาระบุระดับความเสี่ยงที่เหลือ" ,number: "กรุณาระบุเป็นตัวเลข"},
				manage_risk:{ required: "กรุณาระบุแนวทางการจัดการ"},
				owner_risk:{ required: "กรุณาระบุผู้รับผิดชอบ"},
				owner_risk_position:{ required: "กรุณาระบุตำแหน่ง"},
				start_date:{ required: "กรุณาระบุวันที่เริ่มดำเนินการ"},
				end_date:{ required: "กรุณาระบุวันที่เสร็จสิ้น"}
			}
			});
	}
	
	$(".btn_add_control_risk").click(function(){
		var i = $('input[name=control_i ]').val();
		var num =  parseInt(i)+1;
		var newrow = '<tr>';
	    newrow +='<td><input name="control_risk['+num+']" type="text" class="" value="" style="width:300px;" /></td>';
	    newrow +='<td><textarea name="estimate_control_risk['+num+']" class="" rows="4" style="width:700px"></textarea></td>';
	    newrow +='<td style="width:80px;text-align:center;"><a href="#" onclick="return false;" class="btn btn-danger btn_delete_control_risk"><i class="icon-trash"></i> ลบ </a>';
	    newrow +='</td>';
	    newrow +='</tr>';
	    		
		$('.tr_sum_control_risk').before(newrow);
		$("[name=control_risk["+num+"]]").rules( 'add', {required: true , messages: {required: "กรุณาระบุการควบคุมที่มีอยู่"}});
		$("[name=estimate_control_risk["+num+"]]").rules( 'add', {required: true , messages: {required: "กรุณาระบุการประเมินการควบคุมที่มีอยู่"}});
		$('input[name=control_i]').val(num);
		validate_form();
	})
	
	$(".btn_add_kri_risk").click(function(){
		  var i = $('input[name=i]').val();
		  var num =  parseInt(i)+1;
		  var newrow ='<tr>';
		  	    
		  newrow +='<td><input name="kri_risk['+num+']"  type="text" style="width:300px;" value="" class="required" /></td>';
		  newrow +='<td><input name="kri_risk_count['+num+']"  type="text" style="width:100px;" onKeyPress="return double(event)" value="" class="required double" /></td>';
		  newrow +='<td><input name="kri_risk_unit['+num+']" type="text"  style="width:150px;" value="" class="required" /></td>';
		  newrow +='<td style="width:80px;text-align:center;"><a href="#" onclick="return false;" class="btn btn-danger btn_delete_kri_risk"><i class="icon-trash"></i> ลบ </a></td>';
		  newrow +='</tr>';	
		$('.tr_sum_kri_risk').before(newrow);
		$("[name=kri_risk["+num+"]]").rules( 'add', {required: true , messages: {required: "กรุณาระบุตัวชี้วัดความเสี่ยง"}});
		$("[name=kri_risk_count["+num+"]]").rules( 'add', {required: true , messages: {required: "กรุณาระบุจำนวน"}});
		$("[name=kri_risk_unit["+num+"]]").rules( 'add', {required: true , messages: {required: "กรุณาระบุหน่วยนับ"}});
		$('input[name=i]').val(num);
		validate_form();
	})
	
	$(".remain_risk").change(function(){		
		var r1 = $("[name=remain_risk_1]").val();
		var r2 = $("[name=remain_risk_2]").val();
		var r3 = parseInt(r1) * parseInt(r2);
		if(r1 != '' && r2 !=''){
			$("[name=remain_risk_3]").val(r3);
		}
			
	})
	
	$(".btn_delete_control_risk").live("click",function(){
		if(confirm('ลบรายการนี้ ?')){
		  	  $(this).closest("tr").remove();
		}
	})
	
	$(".btn_delete_kri_risk").live("click",function(){
		  if(confirm('ลบรายการนี้ ?')){
		  	  $(this).closest("tr").remove();
		  }		
	})
	
	validate_form();
});
$(document).ready(function(){
		 var i = $('input[name=num_i]').val();
		 if(i != 1){
		 	i = parseInt(i)-1;
		 }
		 for(j=1;j<=i;j++){
		 	$("[name=kri_risk_count["+j+"]]").rules( 'add', {required: true , messages: {required: "กรุณาระบุตัวชี้วัดความเสี่ยง"}});
			$("[name=kri_risk_count["+j+"]]").rules( 'add', {required: true , messages: {required: "กรุณาระบุจำนวน"}});
			$("[name=kri_risk_unit["+j+"]]").rules( 'add', {required: true , messages: {required: "กรุณาระบุหน่วยนับ"}});
		}
		
		var ii = $('input[name=num_i]').val();
		 if(ii != 1){
		 	ii = parseInt(i)-1;
		 }
		 for(jj=1;jj<=ii;jj++){
		 	$("[name=control_risk["+jj+"]]").rules( 'add', {required: true , messages: {required: "กรุณาระบุการควบคุมที่มีอยู่"}});
		$("[name=estimate_control_risk["+jj+"]]").rules( 'add', {required: true , messages: {required: "กรุณาระบุการประเมินการควบคุมที่มีอยู่"}});
		}
});

</script>

<h3>ข้อมูลวิเคราะห์เหตุการณ์ความเสี่ยงและการประเมินความเสี่ยง (เพิ่ม/แก้ไข)</h3>
<form enctype="multipart/form-data" method="post" action="<? echo $urlpage?>/save" class="commentForm">
	<input type="hidden" name="id" value="<?=@$rs['id'];?>" />
<div id="btnBox">
</div>
		<? if(permission($menu_id, 'can_access_all')=='on'){ ?>
			<? $section = form_dropdown('sectionid',get_option('id','title','section order by section_type_id asc, title asc'),@$rs['sectionid'],'style="width:370px"','แสดงภาควิชา/งานทั้งหมด');?>
		<? }else{ ?>	
			<? $section=form_dropdown('sectionid',get_option('id','title','section where id = "'.@$result1['id'].'" order by section_type_id asc, title asc'),@$rs['sectionid'],'style="width:370px"');?>
		<? } ?>	
<table class="table table-form table-bordered table-striped table-horizontal">	
	<tr>
		<th width="400px">ปีงบประมาณ</th>
		<td><?=form_dropdown('year_data',get_year_option(),@$rs['year_data'],'','--เลือกปี--');?></td>
	</tr>
	<tr>
	  <th width="400px">ภาควิชา/งาน</th>
	  <td><?=$section;?></td>
  </tr>
	<tr>
	  <th width="400px">วัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย</th>
	  <td><?=form_dropdown('objectiveid_1',get_option('id','title','objective where objective_type = 1 order by title '),@$rs['objectiveid_1'],'style="width:390px"','--เลือกวัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย--');?></td>
  </tr>
	<tr>
	  <th width="400px">วัตถุประสงค์ตามยุทธศาสตร์ของหน่วยงาน/ส่วนงาน</th>
	  <td><?=form_dropdown('objectiveid_2',get_option('id','title','objective where objective_type = 2 order by title '),@$rs['objectiveid_2'],'style="width:390px"','--เลือกวัตถุประสงค์ตามยุทธศาสตร์ของหน่วยงาน/ส่วนงาน--');?></td>
  </tr>
	<tr>
	  <th width="400px">วัตถุประสงค์ตามยุทธศาสตร์ของงาน</th>
	  <td><?=form_dropdown('objectiveid_3',get_option('id','title','objective where objective_type = 3 order by title '),@$rs['objectiveid_3'],'style="width:390px"','--เลือกวัตถุประสงค์ตามยุทธศาสตร์ของงาน--');?></td>
  </tr>
	<tr>
	  <th width="400px">ภารกิจ</th>
	  <td><?=form_dropdown('missionid',get_option('id','title','mission order by title '),@$rs['missionid'],'style="width:390px"','--เลือกภารกิจ--');?></td>
  </tr>
	<tr>
	  <th width="400px">กระบวนงาน</th>
	  <td><?=form_dropdown('processid',get_option('id','title','process order by title '),@$rs['processid'],'style="width:390px"','--เลือกกระบวนงาน--');?></td>
  </tr>
	<tr>
	  <th width="400px">เหตุการณ์ความเสี่ยง</th>
	  <td><input name="event_risk" type="text" class="" value="<?=@$rs['event_risk'];?>" /></td>
  </tr>
	<tr>
	  <th width="400px">ทบทวนเหตุการณ์ความเสี่ยง</th>
	  <td><textarea name="review_risk" class="" rows="4" style="width:700px"><?=@$rs['review_risk'];?></textarea></td>
  </tr>
  <tr>
  		<th width="400px">วิเคราะห์เหตุการณ์ความเสี่ยง</th>
	  <td>
	  		<?=form_dropdown('risk_type_id',get_option('id','title','risk_type order by id '),@$rs['risk_type_id'],'','--เลือก--');?><br />
            <textarea name="risk_analyze" class="" rows="4" style="width:700px"><?=@$rs['risk_analyze'];?></textarea>
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
	     if(@$id != '' ){
	  	  	$risk_kri = $this->risk_kri->where('risk_est_id='.@$id)->get();
	      	foreach ($risk_kri as $kri) {
	   ?>
			  <tr>	    
			    <td>
			    	<input name="kri_risk[<?=$i?>]" id="kri_risk" type="text" style="width:300px;" value="<?=$kri['kri_risk']?>" class="required" />	    	
			    </td>
			    <td>
			    	<input name="kri_risk_count[<?=$i?>]"  type="text" style="width:100px;" value="<?=$kri['kri_risk_count']?>" class="required double" />	    	
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
	    	<input name="kri_risk_count[<?=$i?>]"  type="text" style="width:100px;" value="" class="required double" />	    	
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
	  	if(@$id != '' ){
	  	  	$control_risk = $this->risk_control->where('risk_est_id='.@$id)->get();
	      	foreach ($control_risk as $com_risk) {
	   ?>
	  		<tr>
	   		 <td><input name="control_risk[<?=$control_i?>]" style="width:300px;" type="text" class="" value="<?=@$com_risk['control_risk']?>" /></td>
	   		 <td><textarea name="estimate_control_risk[<?=$control_i?>]" class="" rows="4" style="width:700px"><?=@$com_risk['estimate_control_risk']?></textarea></td>
	    	 <td style="width:80px;text-align:center;">
	    		<a href="#" onclick="return false;" class="btn btn-danger btn_delete_control_risk"><i class="icon-trash"></i> ลบ </a>
	       	 </td>
	 	   </tr>
	  <? $control_i++;	} 
	  	  }else{ ?>
	  <tr>
	    <td><input name="control_risk[<?=$control_i?>]" style="width:300px;" type="text" class="" value="" /></td>
	    <td><textarea name="estimate_control_risk[<?=$control_i?>]" class="" rows="4" style="width:700px"></textarea></td>
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
    <td><input type="text" name="start_date" id="start_date" value="<?=@mysql_to_date($rs['start_date']);?>" style="width:100px" /></td>
  </tr>
  <tr>
    <th width="400px">วันที่เสร็จสิ้น</th>
    <td><input type="text" name="end_date" id="end_date" value="<?=@mysql_to_date($rs['end_date']);?>" style="width:100px" /></td>
  </tr>
</table>
<div align="center">
				<input type="submit" value="Save" class="btn btn-primary"> 
				<input type="button" value="  Back  " onclick="history.back();" class="btn btn-inverse">
</div>
</form>
