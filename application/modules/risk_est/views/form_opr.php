<script type="text/javascript">
$(document).ready(function(){
	$('.datepicker_1').datepick({
			showOn: 'both',defaultDate: new Date(<?=@$rs['year_data']-543-1?>,09,01), 
			maxDate: new Date(<?=@$rs['year_data']-543-1?>, 09 + 2, 31),
			minDate: new Date(<?=@$rs['year_data']-543-1?>, 09, 01), 
			buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png'}); 
});

$(document).ready(function(){
	$('.datepicker_2').datepick({
			showOn: 'both',defaultDate: new Date(<?=@$rs['year_data']-543?>,00,01),
			maxDate: new Date(<?=@$rs['year_data']-543?>, 00 + 2, 31),
			minDate: new Date(<?=@$rs['year_data']-543?>, 00, 01), 
			buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png'}); 
});

$(document).ready(function(){
	$('.datepicker_3').datepick({
			showOn: 'both',defaultDate: new Date(<?=@$rs['year_data']-543?>,03,01), 
			maxDate: new Date(<?=@$rs['year_data']-543?>, 03 + 2, 30),
			minDate: new Date(<?=@$rs['year_data']-543?>, 03, 01), 
			buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png'}); 
});

$(document).ready(function(){
	$('.datepicker_4').datepick({
			showOn: 'both',defaultDate: new Date(<?=@$rs['year_data']-543?>,06,01), 
			maxDate: new Date(<?=@$rs['year_data']-543?>, 06 + 2, 30),
			minDate: new Date(<?=@$rs['year_data']-543?>, 06, 01), 
			buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png'}); 
});

$(function(){
	$(".commentForm").validate({
	rules: 
	{
		event_risk_opr:{ required: true },
		outcome:{ required: true}
	
	},
	messages:
	{
		event_risk_opr:{ required: " กรุณาระบุกิจกรรมการดำเนินงาน"},
		outcome:{ required: "กรุณาระบุผลลัพธ์ที่ได้"}
	}
	});
});

</script>

<h3>ข้อมูลแผนการปฏิบัติการและรายงานผล</h3>
<form enctype="multipart/form-data" method="post" action="<? echo $urlpage?>/save_opr" class="commentForm">
	<input type="hidden" name="id" value="<?=@$rs['id'];?>" />
	<input type="hidden" name="risk_est_id" value="<?=@$rs['risk_est_id'];?>" />
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
	  <th width="400px">วัตถุประสงค์ตามยุทธศาสตร์ของงาน</th><td><?=@$rs['objective_title3'];?></td>
  </tr>
	<tr>
	  <th width="400px">ภารกิจ</th><td><?=@$rs['mission_title'];?></td>
  </tr>
	<tr>
	  <th width="400px">กระบวนงาน</th><td><?=@$rs['process_title'];?></td>
  </tr>
	<tr>
	  <th width="400px">เหตุการณ์ความเสี่ยง</th><td><?=@$rs['event_risk'];?></td>
  </tr>
  <tr>
    <th width="400px">แนวทางการจัดการ</th>
    <td><?=@$rs['manage_risk'];?></td>
  </tr>
  <tr>
    <th width="400px">กิจกรรมการดำเนินงาน</th>
    <td><input name="event_risk_opr" type="text" class="" value="<?=@$rs['event_risk_opr'];?>" /></td>
  </tr>
</table>
<fieldset>
	<legend>ระยะเวลาการดำเนินการ</legend>
<? for($i=1;$i<=4;$i++): ?>	
  <table class="table table-form table-bordered table-striped table-horizontal">
  <tr>
  	<th colspan="5"><div align="center">ไตรมาสที่ <?=$i;?></div></th>
  </tr>
  <tr>
  	<th rowspan="2" width="100" style="vertical-align:middle;"><div align="center">แผน</div></th>
    <th width="280px">วันที่เริ่ม</th>
    <td colspan="2"><input type="text" name="plot_start_date<?=$i;?>" id="plot_start_date<?=$i;?>" value="<?=@mysql_to_date($rs['plot_start_date'.$i]);?>" style="width:150px" class="datepicker_<?=$i;?>" /></td>
  </tr>
  <tr>
    <th width="280px">วันที่เสร็จสิ้น</th>
    <td colspan="2"><input type="text" name="plot_end_date<?=$i;?>" id="plot_end_date<?=$i;?>" value="<?=@mysql_to_date($rs['plot_end_date'.$i]);?>" style="width:150px" class="datepicker_<?=$i;?>" /></td>
  </tr>
  <tr>
  	<th rowspan="7" width="100" style="vertical-align:middle;"><div align="center">ผล</div></th>
    <th width="280px">วันที่เริ่ม</th>
    <td colspan="2"><input type="text" name="results_start_date<?=$i;?>" id="results_start_date<?=$i;?>" value="<?=@mysql_to_date($rs['results_start_date'.$i]);?>" style="width:150px" class="datepicker_<?=$i;?>" /></td>
  </tr>
  <tr>
    <th width="280px">วันที่เสร็จสิ้น</th>
    <td colspan="2"><input type="text" name="results_end_date<?=$i;?>" id="results_end_date<?=$i;?>" value="<?=@mysql_to_date($rs['results_end_date'.$i]);?>" style="width:150px" class="datepicker_<?=$i;?>" /></td>
  </tr>
  <tr>
  	<th>ผลลัพธ์ที่ได้</th>
  	<td colspan="2">
  		<textarea name="result<?=$i;?>" style="width:450px;height:150px;"><?=@$rs['result'.$i];?></textarea>
  	</td>
  </tr>
  <?
	$fl_upload = $this->file_upload->where("risk_est_id = ".@$rs['risk_est_id']." and quarter = $i")->get();
	 foreach($fl_upload as $fl){
	 	if($fl['id'] != ''){ ?>
  <tr>
  	<th>ไฟล์</th>
  	<td>
  		<a href="import_file/risk_est/<?=$fl['fl_import']?>"><?=$fl['fl_name']?></a>
  	</td>
  	<td width="80px">
  		<a href="<?=$urlpage;?>/delete_fl/<?php echo $fl['id']?>/<?=@$rs['risk_est_id']?>" style="text-decoration:none;" onclick="return confirm('<?php echo NOTICE_CONFIRM_DELETE?>')" title="Delete" class="btn btn-small btn-danger"><i class=" icon-trash"></i>ลบ</a>
  	</td>
  </tr> 		
	 		
  <?	 	}
	 }
  ?>
  <tr>
  	<th>ไฟล์</th>
  	<td colspan="2">
  		<input type="file" name="fl_import<?=$i;?>" >
  	</tr>
</table>
<? endfor;?>
<div align="center">
				<input type="submit" value="Save" class="btn btn-primary"> 
				<input type="button" value="  Back  " onclick="history.back();" class="btn btn-inverse">
</div>
</form>
