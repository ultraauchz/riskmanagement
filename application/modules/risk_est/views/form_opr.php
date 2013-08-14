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
	<input type="hidden" name="id" value="<?=@$rs['risk_opr.id'];?>" />
	<input type="hidden" name="risk_est_id" value="<?=@$rs['risk_est_id'];?>" />
<div id="btnBox">
</div>
<table class="table table-form table-bordered table-striped table-horizontal">
  <tr>
		<th width="400px">ปีงบประมาณ</th><td><?=@$rs['year_data']?></td>
	</tr>
	<tr>
		<th width="400px">กลุ่มวิชา</th><td><?=@$rs['division_title'];?></td>
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
    <th width="400px">กิจกรรมการดำเนินงาน</th>
    <td><input name="event_risk_opr" type="text" class="" value="<?=@$rs['event_risk_opr'];?>" /></td>
  </tr>
</table>
<fieldset>
	<legend>ระยะเวลาการดำเนินการ</legend>
  <table class="table table-form table-bordered table-striped table-horizontal">
  <tr>
  	<th colspan="4"><div align="center">ไตรมาสที่ 1</div></th>
  </tr>
  <tr>
  	<th rowspan="2" width="100" style="vertical-align:middle;"><div align="center">แผน</div></th>
    <th width="280px">วันที่เริ่ม</th>
    <td><input type="text" name="plot_start_date1" id="plot_start_date1" value="<?=@$rs['plot_start_date1'];?>" style="width:150px" class="datepicker_1" /></td>
  </tr>
  <tr>
    <th width="280px">วันที่เสร็จสิ้น</th>
    <td><input type="text" name="plot_end_date1" id="plot_end_date1" value="<?=@$rs['plot_end_date1'];?>" style="width:150px" class="datepicker_1" /></td>
  </tr>
  <tr>
  	<th rowspan="2" width="100" style="vertical-align:middle;"><div align="center">ผล</div></th>
    <th width="280px">วันที่เริ่ม</th>
    <td><input type="text" name="results_start_date1" id="results_start_date1" value="<?=@$rs['results_start_date1'];?>" style="width:150px" class="datepicker_1" /></td>
  </tr>
  <tr>
    <th width="280px">วันที่เสร็จสิ้น</th>
    <td><input type="text" name="results_end_date1" id="results_end_date1" value="<?=@$rs['results_end_date1'];?>" style="width:150px" class="datepicker_1" /></td>
  </tr>
</table>

<table class="table table-form table-bordered table-striped table-horizontal">
  <tr>
  	<th colspan="4"><div align="center">ไตรมาสที่ 2</div></th>
  </tr>
  <tr>
  	<th rowspan="2" width="100" style="vertical-align:middle;"><div align="center">แผน</div></th>
    <th width="280px">วันที่เริ่ม</th>
    <td><input type="text" name="plot_start_date2" id="plot_start_date2" value="<?=@$rs['plot_start_date2'];?>" style="width:150px" class="datepicker_2" /></td>
  </tr>
  <tr>
    <th width="280px">วันที่เสร็จสิ้น</th>
    <td><input type="text" name="plot_end_date2" id="plot_end_date2" value="<?=@$rs['plot_end_date2'];?>" style="width:150px" class="datepicker_2" /></td>
  </tr>
  <tr>
  	<th rowspan="2" width="100" style="vertical-align:middle;"><div align="center">ผล</div></th>
    <th width="280px">วันที่เริ่ม</th>
    <td><input type="text" name="results_start_date2" id="results_start_date2" value="<?=@$rs['results_start_date2'];?>" style="width:150px" class="datepicker_2" /></td>
  </tr>
  <tr>
    <th width="280px">วันที่เสร็จสิ้น</th>
    <td><input type="text" name="results_end_date2" id="results_end_date2" value="<?=@$rs['results_end_date2'];?>" style="width:150px" class="datepicker_2" /></td>
  </tr>
</table>

<table class="table table-form table-bordered table-striped table-horizontal">
  <tr>
  	<th colspan="4"><div align="center">ไตรมาสที่ 3</div></th>
  </tr>
  <tr>
  	<th rowspan="2" width="100" style="vertical-align:middle;"><div align="center">แผน</div></th>
    <th width="280px">วันที่เริ่ม</th>
    <td><input type="text" name="plot_start_date3" id="plot_start_date3" value="<?=@$rs['plot_start_date3'];?>" style="width:150px" class="datepicker_3" /></td>
  </tr>
  <tr>
    <th width="280px">วันที่เสร็จสิ้น</th>
    <td><input type="text" name="plot_end_date3" id="plot_end_date3" value="<?=@$rs['plot_end_date3'];?>" style="width:150px" class="datepicker_3" /></td>
  </tr>
  <tr>
  	<th rowspan="2" width="100" style="vertical-align:middle;"><div align="center">ผล</div></th>
    <th width="280px">วันที่เริ่ม</th>
    <td><input type="text" name="results_start_date3" id="results_start_date3" value="<?=@$rs['results_start_date3'];?>" style="width:150px" class="datepicker_3" /></td>
  </tr>
  <tr>
    <th width="280px">วันที่เสร็จสิ้น</th>
    <td><input type="text" name="results_end_date3" id="results_end_date3" value="<?=@$rs['results_end_date3'];?>" style="width:150px" class="datepicker_3" /></td>
  </tr>
</table>

<table class="table table-form table-bordered table-striped table-horizontal">
  <tr>
  	<th colspan="4"><div align="center">ไตรมาสที่ 4</div></th>
  </tr>
  <tr>
  	<th rowspan="2" width="100" style="vertical-align:middle;"><div align="center">แผน</div></th>
    <th width="280px">วันที่เริ่ม</th>
    <td><input type="text" name="plot_start_date4" id="plot_start_date4" value="<?=@$rs['plot_start_date4'];?>" style="width:150px" class="datepicker_4" /></td>
  </tr>
  <tr>
    <th width="280px">วันที่เสร็จสิ้น</th>
    <td><input type="text" name="plot_end_date4" id="plot_end_date4" value="<?=@$rs['plot_end_date4'];?>" style="width:150px" class="datepicker_4" /></td>
  </tr>
  <tr>
  	<th rowspan="2" width="100" style="vertical-align:middle;"><div align="center">ผล</div></th>
    <th width="280px">วันที่เริ่ม</th>
    <td><input type="text" name="results_start_date4" id="results_start_date4" value="<?=@$rs['results_start_date4'];?>" style="width:150px" class="datepicker_4" /></td>
  </tr>
  <tr>
    <th width="280px">วันที่เสร็จสิ้น</th>
    <td><input type="text" name="results_end_date4" id="results_end_date4" value="<?=@$rs['results_end_date4'];?>" style="width:150px" class="datepicker_4" /></td>
  </tr>
</table>

<table class="table table-form table-bordered table-striped table-horizontal">
  <tr>
  	<th width="400px">ผลลัพธ์ที่ได้</th>
  	<td><textarea name="outcome" rows="4" style="width:700px"><?=@$rs['outcome'];?></textarea></td>
  </tr>
</table>
<div align="center">
				<input type="submit" value="Save" class="btn btn-primary"> 
				<input type="button" value="  Back  " onclick="history.back();" class="btn btn-inverse">
</div>
</form>
