<script type="text/javascript">
$(document).ready(function(){
	////////////// ไตรมาสที่1 //////////////
    $("#plot_start_date1").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
          $("#plot_end_date1").datepick("option","minDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])+1))
        },
        defaultDate: new Date(<?=@$rs['year_data']-543-1?>,09,01),
        minDate: new Date(<?=@$rs['year_data']-543-1?>, 09, 01),
        maxDate: new Date(<?=@$rs['year_data']-543-1?>, 09 + 2, 31)
    });
    $("#plot_end_date1").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
        	selected = (parseInt(myarr[0])+543)+"-"+myarr[1]+"-"+myarr[2];
           $("#plot_start_date1").datepick("option","maxDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])-1))
        },
        defaultDate: new Date(<?=@$rs['year_data']-543-1?>,09,01),
        minDate: new Date(<?=@$rs['year_data']-543-1?>, 09, 01),
        maxDate: new Date(<?=@$rs['year_data']-543-1?>, 09 + 2, 31)
         
    });
    $("#results_start_date1").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
          $("#results_end_date1").datepick("option","minDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])+1))
        },
        defaultDate: new Date(<?=@$rs['year_data']-543-1?>,09,01),
        minDate: new Date(<?=@$rs['year_data']-543-1?>, 09, 01),
        maxDate: new Date(<?=@$rs['year_data']-543-1?>, 09 + 2, 31)
    });
    $("#results_end_date1").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
        	selected = (parseInt(myarr[0])+543)+"-"+myarr[1]+"-"+myarr[2];
           $("#results_start_date1").datepick("option","maxDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])-1))
        },
        defaultDate: new Date(<?=@$rs['year_data']-543-1?>,09,01),
        minDate: new Date(<?=@$rs['year_data']-543-1?>, 09, 01),
        maxDate: new Date(<?=@$rs['year_data']-543-1?>, 09 + 2, 31)
         
    });
    ////////////// ไตรมาสที่1 //////////////
    
    ////////////// ไตรมาสที่2 //////////////
    $("#plot_start_date2").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
          $("#plot_end_date2").datepick("option","minDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])+1))
        },
        defaultDate: new Date(<?=@$rs['year_data']-543?>,00,01),
		maxDate: new Date(<?=@$rs['year_data']-543?>, 00 + 2, 31),
		minDate: new Date(<?=@$rs['year_data']-543?>, 00, 01)
    });
    $("#plot_end_date2").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
        	selected = (parseInt(myarr[0])+543)+"-"+myarr[1]+"-"+myarr[2];
           $("#plot_start_date2").datepick("option","maxDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])-1))
        },
        defaultDate: new Date(<?=@$rs['year_data']-543?>,00,01),
		maxDate: new Date(<?=@$rs['year_data']-543?>, 00 + 2, 31),
		minDate: new Date(<?=@$rs['year_data']-543?>, 00, 01)
         
    });
    $("#results_start_date2").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
          $("#results_end_date2").datepick("option","minDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])+1))
        },
        defaultDate: new Date(<?=@$rs['year_data']-543?>,00,01),
		maxDate: new Date(<?=@$rs['year_data']-543?>, 00 + 2, 31),
		minDate: new Date(<?=@$rs['year_data']-543?>, 00, 01)
    });
    $("#results_end_date2").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
        	selected = (parseInt(myarr[0])+543)+"-"+myarr[1]+"-"+myarr[2];
           $("#results_start_date2").datepick("option","maxDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])-1))
        },
        defaultDate: new Date(<?=@$rs['year_data']-543?>,00,01),
		maxDate: new Date(<?=@$rs['year_data']-543?>, 00 + 2, 31),
		minDate: new Date(<?=@$rs['year_data']-543?>, 00, 01)
         
    });
    ////////////// ไตรมาสที่2 //////////////
    
    ////////////// ไตรมาสที่3 //////////////
    $("#plot_start_date3").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
          $("#plot_end_date3").datepick("option","minDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])+1))
        },
       	defaultDate: new Date(<?=@$rs['year_data']-543?>,03,01), 
		maxDate: new Date(<?=@$rs['year_data']-543?>, 03 + 2, 30),
		minDate: new Date(<?=@$rs['year_data']-543?>, 03, 01)
    });
    $("#plot_end_date3").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
        	selected = (parseInt(myarr[0])+543)+"-"+myarr[1]+"-"+myarr[2];
           $("#plot_start_date3").datepick("option","maxDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])-1))
        },
        defaultDate: new Date(<?=@$rs['year_data']-543?>,03,01), 
		maxDate: new Date(<?=@$rs['year_data']-543?>, 03 + 2, 30),
		minDate: new Date(<?=@$rs['year_data']-543?>, 03, 01)
         
    });
    $("#results_start_date3").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
          $("#results_end_date3").datepick("option","minDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])+1))
        },
        defaultDate: new Date(<?=@$rs['year_data']-543?>,03,01), 
		maxDate: new Date(<?=@$rs['year_data']-543?>, 03 + 2, 30),
		minDate: new Date(<?=@$rs['year_data']-543?>, 03, 01)
    });
    $("#results_end_date3").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
        	selected = (parseInt(myarr[0])+543)+"-"+myarr[1]+"-"+myarr[2];
           $("#results_start_date3").datepick("option","maxDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])-1))
        },
        defaultDate: new Date(<?=@$rs['year_data']-543?>,03,01), 
		maxDate: new Date(<?=@$rs['year_data']-543?>, 03 + 2, 30),
		minDate: new Date(<?=@$rs['year_data']-543?>, 03, 01)
         
    });
    ////////////// ไตรมาสที่3 //////////////
    
    ////////////// ไตรมาสที่4 //////////////
    $("#plot_start_date4").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
          $("#plot_end_date4").datepick("option","minDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])+1))
        },
       	defaultDate: new Date(<?=@$rs['year_data']-543?>,06,01), 
		maxDate: new Date(<?=@$rs['year_data']-543?>, 06 + 2, 30),
		minDate: new Date(<?=@$rs['year_data']-543?>, 06, 01)
    });
    $("#plot_end_date4").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
        	selected = (parseInt(myarr[0])+543)+"-"+myarr[1]+"-"+myarr[2];
           $("#plot_start_date4").datepick("option","maxDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])-1))
        },
        defaultDate: new Date(<?=@$rs['year_data']-543?>,06,01), 
		maxDate: new Date(<?=@$rs['year_data']-543?>, 06 + 2, 30),
		minDate: new Date(<?=@$rs['year_data']-543?>, 06, 01)
         
    });
    $("#results_start_date4").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
          $("#results_end_date4").datepick("option","minDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])+1))
        },
        defaultDate: new Date(<?=@$rs['year_data']-543?>,06,01), 
		maxDate: new Date(<?=@$rs['year_data']-543?>, 06 + 2, 30),
		minDate: new Date(<?=@$rs['year_data']-543?>, 06, 01)
    });
    $("#results_end_date4").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
        	selected = (parseInt(myarr[0])+543)+"-"+myarr[1]+"-"+myarr[2];
           $("#results_start_date4").datepick("option","maxDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])-1))
        },
        defaultDate: new Date(<?=@$rs['year_data']-543?>,06,01), 
		maxDate: new Date(<?=@$rs['year_data']-543?>, 06 + 2, 30),
		minDate: new Date(<?=@$rs['year_data']-543?>, 06, 01)
         
    });
    ////////////// ไตรมาสที่4 //////////////
});


$(function(){
	$(".commentForm").validate({
	rules: 
	{
		event_risk_opr:{ required: true },
		outcome:{ required: true},
		plot_start_date1:{ required : function(element) {
        return $("#plot_end_date1").val() != '';}
        },
        plot_start_date2:{ required : function(element) {
        return $("#plot_end_date2").val() != '';}
        },
        plot_start_date3:{ required : function(element) {
        return $("#plot_end_date3").val() != '';}
        },
        plot_start_date4:{ required : function(element) {
        return $("#plot_end_date4").val() != '';}
        },
		plot_end_date1:{ required : function(element) {
        return $("#plot_start_date1").val() != '';}
        },
        plot_end_date2:{ required : function(element) {
        return $("#plot_start_date2").val() != '';}
        },
        plot_end_date3:{ required : function(element) {
        return $("#plot_start_date3").val() != '';}
        },
        plot_end_date4:{ required : function(element) {
        return $("#plot_start_date4").val() != '';}
        },
        results_start_date1:{ required : function(element){
        return $("#results_end_date1").val() != '';	}
        },
        results_start_date2:{ required : function(element){
        return $("#results_end_date2").val() != '';	}
        },
        results_start_date3:{ required : function(element){
        return $("#results_end_date3").val() != '';	}
        },
        results_start_date4:{ required : function(element){
        return $("#results_end_date4").val() != '';	}
        },
        results_end_date1:{ required : function(element){
        return $("#results_start_date1").val() != ''; }
        },
        results_end_date2:{ required : function(element){
        return $("#results_start_date2").val() != ''; }
        },
        results_end_date3:{ required : function(element){
        return $("#results_start_date3").val() != ''; }	
        },
        results_end_date4:{ required : function(element){
        return $("#results_start_date4").val() != ''; }
        }

	},
	messages:
	{
		event_risk_opr:{ required: " กรุณาระบุกิจกรรมการดำเนินงาน"},
		outcome:{ required: "กรุณาระบุผลลัพธ์ที่ได้"},
		plot_end_date1:{ required: "กรุณาระบุวันที่เสร็จสินของแผน"},
		plot_end_date2:{ required: "กรุณาระบุวันที่เสร็จสินของแผน"},
		plot_end_date3:{ required: "กรุณาระบุวันที่เสร็จสินของแผน"},
		plot_end_date4:{ required: "กรุณาระบุวันที่เสร็จสินของแผน"},
		plot_start_date1:{ required: "กรุณาระบุวันที่เริ่มแผน"},
		plot_start_date2:{ required: "กรุณาระบุวันที่เริ่มแผน"},
		plot_start_date3:{ required: "กรุณาระบุวันที่เริ่มแผน"},
		plot_start_date4:{ required: "กรุณาระบุวันที่เริ่มแผน"},
		results_start_date1:{ required: "กรุณาระบุวันที่เริ่มของผลลัพธ์"},
		results_start_date2:{ required: "กรุณาระบุวันที่เริ่มของผลลัพธ์"},
		results_start_date3:{ required: "กรุณาระบุวันที่เริ่มของผลลัพธ์"},
		results_start_date4:{ required: "กรุณาระบุวันที่เริ่มของผลลัพธ์"},
		results_end_date1:{ required: "กรุณาระบุวันที่เสร็จสิ้นของผลลัพธ์"},
		results_end_date2:{ required: "กรุณาระบุวันที่เสร็จสิ้นของผลลัพธ์"},
		results_end_date3:{ required: "กรุณาระบุวันที่เสร็จสิ้นของผลลัพธ์"},
		results_end_date4:{ required: "กรุณาระบุวันที่เสร็จสิ้นของผลลัพธ์"}
	}
	});
	$("#btn_detail").colorbox({inline:true, href:"#inline_content", width:"80%",height:"80%"});
});

</script>

<h3>ข้อมูลแผนการปฏิบัติการและรายงานผล</h3>
<div id="btnBox">
<input type="button" class="btn btn-primary" id="btn_detail" value="คำอธิบาย" />
</div>
<br />
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
    <td colspan="2"><input type="text" id="plot_start_date<?=$i?>" name="plot_start_date<?=$i;?>" id="plot_start_date<?=$i;?>" value="<?=@mysql_to_date($rs['plot_start_date'.$i]);?>" style="width:150px"  /></td>
  </tr>
  <tr>
    <th width="280px">วันที่เสร็จสิ้น</th>
    <td colspan="2"><input type="text" id="plot_end_date<?=$i;?>" name="plot_end_date<?=$i;?>" id="plot_end_date<?=$i;?>" value="<?=@mysql_to_date($rs['plot_end_date'.$i]);?>" style="width:150px"  /></td>
  </tr>
  <tr>
  	<th rowspan="7" width="100" style="vertical-align:middle;"><div align="center">ผล</div></th>
    <th width="280px">วันที่เริ่ม</th>
    <td colspan="2"><input type="text" id="results_start_date<?=$i;?>" name="results_start_date<?=$i;?>" id="results_start_date<?=$i;?>" value="<?=@mysql_to_date($rs['results_start_date'.$i]);?>" style="width:150px"  /></td>
  </tr>
  <tr>
    <th width="280px">วันที่เสร็จสิ้น</th>
    <td colspan="2"><input type="text" id="results_end_date<?=$i;?>" name="results_end_date<?=$i;?>" id="results_end_date<?=$i;?>" value="<?=@mysql_to_date($rs['results_end_date'.$i]);?>" style="width:150px" /></td>
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
  	<th>หลักฐาน</th>
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
  	<th>หลักฐาน</th>
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
<div style='display:none'>
			<div id='inline_content' style='padding:10px; background:#fff;'>
			<?=$detail_opr['detail']?>
			</div>
</div>