<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript" src="media/js/jquery.colorbox.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    
	    // ทำให้ผ่าน tiny ผ่าน validate 
	    $("#save").live("click",function() {
	     tinymce.triggerSave();
		});
});


$(function(){
	function validate_form(){
		$(".commentForm").validate({
			rules: 
			{
				event_risk:{ required: true},
				risk_type_id:{	required: true},
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
				event_risk:{ required: " กรุณาระบุเหตุการณ์ความเสี่ยง"},
				risk_type_id:{	required: " กรุณาเลือกวิเคราะห์เหตุการณ์ความเสี่ยง"},
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
	
	$(".btn_add_control_risk").live("click",function(){
		var i = $('input[name=control_i ]').val();
		var num =  parseInt(i)+1;
		var newrow = '<tr>';
	    newrow +='<td><input name="control_risk['+num+']" type="text" class="" value="" style="width:300px;" class="title" /></td>';
	    newrow +='<td><textarea name="estimate_control_risk['+num+']" class="" rows="4" style="width:700px" class="title2" ></textarea></td>';
	    newrow +='<td style="width:80px;text-align:center;"><a href="#" onclick="return false;" class="btn btn-danger btn_delete_control_risk"><i class="icon-trash"></i> ลบ </a>';
	    newrow +='</td>';
	    newrow +='</tr>';
	    
		$('.tr_sum_control_risk').before(newrow);
		tiny1('control_risk['+num+']');
		tiny2('estimate_control_risk['+num+']');
		$("[name=control_risk["+num+"]]").rules( 'add', {required: true , messages: {required: "กรุณาระบุการควบคุมที่มีอยู่"}});
		$("[name=estimate_control_risk["+num+"]]").rules( 'add', {required: true , messages: {required: "กรุณาระบุการประเมินการควบคุมที่มีอยู่"}});
		$('input[name=control_i]').val(num);
		validate_form();
		
	})
	
	$(".btn_add_kri_risk").live("click",function(){
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
	
	
	$(".remain_risk").live("change",function(){		
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
	function add_tiny(){
		 var i = $('input[name=num_i]').val();
		 if(i != 1){
		 	i = parseInt(i)-1;
		 }
		 for(j=1;j<=i;j++){
		 	$("[name=kri_risk_count["+j+"]]").rules( 'add', {required: true , messages: {required: "กรุณาระบุตัวชี้วัดความเสี่ยง"}});
			$("[name=kri_risk_count["+j+"]]").rules( 'add', {required: true , messages: {required: "กรุณาระบุจำนวน"}});
			$("[name=kri_risk_unit["+j+"]]").rules( 'add', {required: true , messages: {required: "กรุณาระบุหน่วยนับ"}});
		}
		
		var ii = $('input[name=num_c]').val();
		 if(ii != 1){
		 	ii = parseInt(ii)-1;
		 }
		 for(jj=1;jj<=ii;jj++){
		 	$("[name=control_risk["+jj+"]]").rules( 'add', {required: true , messages: {required: "กรุณาระบุการควบคุมที่มีอยู่"}});
			$("[name=estimate_control_risk["+jj+"]]").rules( 'add', {required: true , messages: {required: "กรุณาระบุการประเมินการควบคุมที่มีอยู่"}});
		
		tiny1('control_risk['+jj+']');
		tiny2('estimate_control_risk['+jj+']');
		}
		}
		$("#btn_detail").colorbox({inline:true, href:"#inline_content", width:"80%",height:"80%"});

		      $('.add_rist').live("click",function(){ //เพิ่มกิจกรรม
		       		$(".dtl").html("<img class='loading' src='themes/Front/images/loading.gif' style='vertical-align:bottom'>");
		       		var risk_est_head_id = $('[name=risk_est_head_id]').val();
		       	  	$.post('risk_est/risk_dtl',{
						'risk_est_head_id' : risk_est_head_id
					},function(data){
						$(".loading").remove();
						$(".dtl").html(data);
						add_tiny();
						$('[name=event_risk]').focus();
					})
			  });
		

		      $('.edit_risk_dtl').live("click",function(){ //เพิ่มกิจกรรม
		       		$(".dtl").html("<img class='loading' src='themes/Front/images/loading.gif' style='vertical-align:bottom'>");
		       		var risk_est_head_id = $('[name=risk_est_head_id]').val();
		       		var id = $(this).attr('href');
		       	  	$.post('risk_est/risk_dtl',{
						'risk_est_head_id' : risk_est_head_id,
						'id' : id
					},function(data){
						$(".loading").remove();
						$(".dtl").html(data);
						add_tiny();
						$('[name=event_risk]').focus();
					})
				});
				
			$('.bt_cancel').live("click",function(){
				$(".dtl").html('');
			});

});

</script>

<h3>ข้อมูลวิเคราะห์เหตุการณ์ความเสี่ยงและการประเมินความเสี่ยง(ส่วนที่สอง) (เพิ่ม/แก้ไข)</h3>
<div id="btnBox">
<input type="button" class="btn btn-primary" id="btn_detail" value="คำอธิบาย" />
</div>
<br />
<form enctype="multipart/form-data" method="post" action="<? echo $urlpage?>/save" class="commentForm">
	<input type="hidden" name="risk_est_head_id" value="<?=@$rs['id'];?>" />
<div id="btnBox">
</div>
		<? if(permission($menu_id, 'can_access_all')=='on'){ ?>
			<? $section = form_dropdown('sectionid',get_option('id','title','section order by section_type_id asc, title asc'),@$rs['sectionid'],'style="width:370px"','แสดงภาควิชา/งานทั้งหมด');?>
		<? }else{ ?>	
			<? $section=form_dropdown('sectionid',get_option('id','title','section where id = "'.@$result1['id'].'" order by section_type_id asc, title asc'),@$rs['sectionid'],'style="width:370px"');?>
		<? } ?>	
<table class="table table-form table-bordered table-striped table-horizontal">	
 <tr>
	<th width="400px">ปีงบประมาณ</th><td><?=@$rs['year_data']?></td>
	</tr>
	<tr>
	  <th width="400px">ภาควิชา</th><td><?=@$rs['section_title'];?></td>
  </tr>
	<tr>
	  <th width="400px">วัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย</th><td><?=@$rs['objective_title1']?></td>
  </tr>
	<tr>
	  <th width="400px">วัตถุประสงค์ตามยุทธศาสตร์ของหน่วยงาน/ส่วนงาน</th><td><?=@$rs['objective_title2'];?></td>
  </tr>
	<tr>
	  <th width="400px">วัตถุประสงค์ตามยุทธศาสตร์ของงาน</th><td><?=@$rs['objective_3'];?></td>
  </tr>
	<tr>
	  <th width="400px">ภารกิจ</th><td><?=@$rs['mission_title'];?></td>
  </tr>
	<tr>
	  <th width="400px">กระบวนงาน</th><td><?=@$rs['process'];?></td>
  </tr>
</table>
<fieldset>
	<legend>รายละเอียดกิจกรรมการดำเนินงาน</legend>
<div id="btnBox">
<a href="#" onclick="return false;" class="btn btn-primary add_rist">เพิ่มรายการ</a>
</div>
<br />
  <table class="table table-form table-bordered table-striped table-horizontal">
	<tr>
		<th style="width: 10%">ลำดับที่</th>
		<th style="width: 45%">เหตุการณ์ความเสี่ยง</th>
		<th style="width: 15%">วิเคราะห์เหตุการณ์ความเสี่ยง</th>
		<th style="width: 15%">แผนการปฎิบัติการ<br />และรายงานผล</th>
		<th style="width: 15%">จัดการ</th>
	</tr>
	<? 
	$sql_risk_est = "select risk_est.* , risk_type.title as risk_type_title
							 from risk_est 
							 left join risk_type on risk_est.risk_type_id = risk_type.id
							 where risk_est.risk_est_head_id = '".$rs['id']."' order by risk_est.id asc ";
	$result_risk_est =  $this->risk->get($sql_risk_est,'true');
	$i = 1;
	foreach ($result_risk_est as $risk) {?>
	<tr>
		<td ><?=$i?></td>
		<td ><?=$risk['event_risk']?></td>
		<td ><?=$risk['risk_type_title']?></td>
		<td align="left">
			<? if(permission(53, 'canadd')!=''){ ?>
			<a href="<?=$urlpage;?>/form_opr/<?=@$risk['id'];?>" title="Edit" class="btn btn-primary">แผนการปฎิบัติการ</a>
			<? } ?>
		</td>
		<td align="left" >
		  	<? if(permission($menu_id, 'canedit')!=''){ ?>
		  	<a href="<?=$risk['id']?>" title="Edit" class="btn btn-small btn-info edit_risk_dtl" onclick="return false;"><i class=" icon-pencil"></i>แก้ไข</a>
		  	<? } ?>
		  	<? if(permission($menu_id, 'candelete')!=''){ ?>
		  	<a href="<?=$urlpage;?>/delete_risk/<?php echo $risk['id']?>/<?php echo $rs['id'];?>" style="text-decoration:none;" onclick="return confirm('<?php echo NOTICE_CONFIRM_DELETE?>')" title="Delete" class="btn btn-small btn-danger del_risk_dtl"><i class=" icon-trash"></i>ลบ</a>
		  	<? } ?> 
		</td>	
	</tr>
   <?
   	$i++;	} ?>
  </table>
    <div class="dtl"></div>
</fieldset>
</form>
<div style='display:none'>
			<div id='inline_content' style='padding:10px; background:#fff;'>
			<?=$detail_est['detail']?>
			</div>
</div>
