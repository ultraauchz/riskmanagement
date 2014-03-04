<script type="text/javascript" src="media/js/jquery.colorbox.js"></script>
<script type="text/javascript">
$(document).ready(function() {
		      $('.add_event').live("click",function(){ //เพิ่มกิจกรรม
		       		$(".dtl").html("<img class='loading' src='themes/Front/images/loading.gif' style='vertical-align:bottom'>");
		       		var risk_est_id = $('[name=risk_est_id]').val();
		       	  	$.post('risk_est/opr_dtl',{
						'risk_est_id' : risk_est_id
					},function(data){
						$(".loading").remove();
						$(".dtl").html(data);
						$('[name=event_risk_opr]').focus();
					})
			  });
			  $('.edit_event').live("click",function(){ //แก้ไขกิจกรรม
		       		$(".dtl").html("<img class='loading' src='themes/Front/images/loading.gif' style='vertical-align:bottom'>");
		       		var risk_est_id = $('[name=risk_est_id]').val();
		       		var risk_opr_id = $(this).attr('href');
		       	  	$.post('risk_est/opr_dtl',{
						'risk_est_id' : risk_est_id , 'risk_opr_id' : risk_opr_id
					},function(data){
						$(".loading").remove();
						$(".dtl").html(data);
						$('[name=event_risk_opr]').focus();
					})
			  });
			  
			  $('.del_fl').live("click",function(){ //ลบไฟล์หลักฐาน
		       	
		       	if(confirm('ต้องการลบหลักฐานนี้ ใช่หรือไหม')){		       		
		       		var id = $(this).attr('href');
		       		var rel_id = $(this).attr('rel_id');
		       		
		       		var risk_est_id = $('[name=risk_est_id]').val();
		       		var risk_opr_id = $(this).attr('risk_opr_id');
		       		
		       		
		       		$(".fl_dtl"+rel_id).html("<img class='loading' src='themes/Front/images/loading.gif' style='vertical-align:bottom'>");
		       	  	$.post('risk_est/del_fl',{
						'id' : id , 'risk_est_id' : risk_est_id , 'risk_opr_id' : risk_opr_id , 'rel_id' : rel_id
					},function(data){
						$(".loading").remove();
						$(".fl_dtl"+rel_id).html(data);
					})
				}
			  });
			  
			 $('.bt_cancel').live("click",function(){
				$(".dtl").html('');
			});
});

</script>

<h3>ข้อมูลแผนการปฏิบัติการและรายงานผล</h3>
<br />
<form enctype="multipart/form-data" method="post" action="<? echo $urlpage?>/save_opr" class="commentForm">
	<input type="hidden" name="risk_est_id" value="<?=@$rs['id'];?>" />
<div id="btnBox">
</div>
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
	<tr>
	  <th width="400px">เหตุการณ์ความเสี่ยง</th><td><?=@$rs['event_risk'];?></td>
  </tr>
  <tr>
    <th width="400px">แนวทางการจัดการ</th>
    <td><?=@$rs['manage_risk'];?></td>
  </tr>
</table>
<fieldset>
	<legend>รายละเอียดกิจกรรมการดำเนินงาน</legend>
<div id="btnBox">
<a href="#" onclick="return false;" class="btn btn-primary add_event">เพิ่มรายการ</a>
</div>
<br />
  <table class="table table-form table-bordered table-striped table-horizontal">
	<tr>
		<th rowspan="2">กิจกรรมการ</th>
		<th colspan="4"><div align="center">แผน</div></th>
		<th colspan="4"><div align="center">ผล</div></th>
		<th rowspan="2">จัดการ</th>
	</tr>
	<tr>
		<th>ไตรมาสที่ 1</th>
		<th>ไตรมาสที่ 2</th>
		<th>ไตรมาสที่ 3</th>
		<th>ไตรมาสที่ 4</th>
		
		<th>ไตรมาสที่ 1</th>
		<th>ไตรมาสที่ 2</th>
		<th>ไตรมาสที่ 3</th>
		<th>ไตรมาสที่ 4</th>
	</tr>
	<? foreach ($rs_opr as $opr) {?>
	<tr>
		<td width="200px"><?=$opr['event_risk_opr']?></td>
		<? for($i=1;$i<=4;$i++){?>
		<td width="150px">
			<?=mysql_to_date($opr['plot_start_date'.$i])?>
			<? if(mysql_to_date($opr['plot_start_date'.$i] > 0)) echo " ถึง "; ?>
			<?=mysql_to_date($opr['plot_end_date'.$i])?>
		</td>
		<? } ?>
		
		<? for($i=1;$i<=4;$i++){?>
		<td width="150px">
			<?=mysql_to_date($opr['results_start_date'.$i])?>
			<? if(mysql_to_date($opr['results_start_date'.$i] > 0)) echo " ถึง "; ?>
			<?=mysql_to_date($opr['results_end_date'.$i])?>
		</td>
		<? } ?>
		<td align="left" width="12%" >
		  	<? if(permission($menu_id, 'canedit')!=''){ ?>
		  	<a href="<?=$opr['id']?>" title="Edit" class="btn btn-small btn-info edit_event" onclick="return false;"><i class=" icon-pencil"></i>แก้ไข</a>
		  	<? } ?>
		  	<? if(permission($menu_id, 'candelete')!=''){ ?>
		  	<a href="<?=$urlpage;?>/delete_risk_opr/<?php echo @$opr['id']?>/<?=@$rs['id'];?>" style="text-decoration:none;" onclick="return confirm('<?php echo NOTICE_CONFIRM_DELETE?>')" title="Delete" class="btn btn-small btn-danger del_opr_dtl"><i class=" icon-trash"></i>ลบ</a>
		  	<? } ?> 
		</td>	
	</tr>
   <?	} ?>
  </table>
  <div class="dtl"></div>
</fieldset>
</form>