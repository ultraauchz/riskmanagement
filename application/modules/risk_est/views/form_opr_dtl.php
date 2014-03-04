
<script type="text/javascript">
$(document).ready(function(){
	////////////// ไตรมาสที่1 //////////////
    $("#plot_start_date1").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
          $("#plot_end_date1").datepick("option","minDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])+1))
        },
        defaultDate: new Date(<?=@$risk_est['year_data']-543-1?>,09,01),
        minDate: new Date(<?=@$risk_est['year_data']-543-1?>, 09, 01),
        maxDate: new Date(<?=@$risk_est['year_data']-543-1?>, 09 + 2, 31)
    });
    $("#plot_end_date1").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
        	selected = (parseInt(myarr[0])+543)+"-"+myarr[1]+"-"+myarr[2];
           $("#plot_start_date1").datepick("option","maxDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])-1))
        },
        defaultDate: new Date(<?=@$risk_est['year_data']-543-1?>,09,01),
        minDate: new Date(<?=@$risk_est['year_data']-543-1?>, 09, 01),
        maxDate: new Date(<?=@$risk_est['year_data']-543-1?>, 09 + 2, 31)
         
    });
    $("#results_start_date1").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
          $("#results_end_date1").datepick("option","minDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])+1))
        },
        defaultDate: new Date(<?=@$risk_est['year_data']-543-1?>,09,01),
        minDate: new Date(<?=@$risk_est['year_data']-543-1?>, 09, 01),
        maxDate: new Date(<?=@$risk_est['year_data']-543-1?>, 09 + 2, 31)
    });
    $("#results_end_date1").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
        	selected = (parseInt(myarr[0])+543)+"-"+myarr[1]+"-"+myarr[2];
           $("#results_start_date1").datepick("option","maxDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])-1))
        },
        defaultDate: new Date(<?=@$risk_est['year_data']-543-1?>,09,01),
        minDate: new Date(<?=@$risk_est['year_data']-543-1?>, 09, 01),
        maxDate: new Date(<?=@$risk_est['year_data']-543-1?>, 09 + 2, 31)
         
    });
    ////////////// ไตรมาสที่1 //////////////
    
    ////////////// ไตรมาสที่2 //////////////
    $("#plot_start_date2").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
          $("#plot_end_date2").datepick("option","minDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])+1))
        },
        defaultDate: new Date(<?=@$risk_est['year_data']-543?>,00,01),
		maxDate: new Date(<?=@$risk_est['year_data']-543?>, 00 + 2, 31),
		minDate: new Date(<?=@$risk_est['year_data']-543?>, 00, 01)
    });
    $("#plot_end_date2").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
        	selected = (parseInt(myarr[0])+543)+"-"+myarr[1]+"-"+myarr[2];
           $("#plot_start_date2").datepick("option","maxDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])-1))
        },
        defaultDate: new Date(<?=@$risk_est['year_data']-543?>,00,01),
		maxDate: new Date(<?=@$risk_est['year_data']-543?>, 00 + 2, 31),
		minDate: new Date(<?=@$risk_est['year_data']-543?>, 00, 01)
         
    });
    $("#results_start_date2").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
          $("#results_end_date2").datepick("option","minDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])+1))
        },
        defaultDate: new Date(<?=@$risk_est['year_data']-543?>,00,01),
		maxDate: new Date(<?=@$risk_est['year_data']-543?>, 00 + 2, 31),
		minDate: new Date(<?=@$risk_est['year_data']-543?>, 00, 01)
    });
    $("#results_end_date2").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
        	selected = (parseInt(myarr[0])+543)+"-"+myarr[1]+"-"+myarr[2];
           $("#results_start_date2").datepick("option","maxDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])-1))
        },
        defaultDate: new Date(<?=@$risk_est['year_data']-543?>,00,01),
		maxDate: new Date(<?=@$risk_est['year_data']-543?>, 00 + 2, 31),
		minDate: new Date(<?=@$risk_est['year_data']-543?>, 00, 01)
         
    });
    ////////////// ไตรมาสที่2 //////////////
    
    ////////////// ไตรมาสที่3 //////////////
    $("#plot_start_date3").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
          $("#plot_end_date3").datepick("option","minDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])+1))
        },
       	defaultDate: new Date(<?=@$risk_est['year_data']-543?>,03,01), 
		maxDate: new Date(<?=@$risk_est['year_data']-543?>, 03 + 2, 30),
		minDate: new Date(<?=@$risk_est['year_data']-543?>, 03, 01)
    });
    $("#plot_end_date3").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
        	selected = (parseInt(myarr[0])+543)+"-"+myarr[1]+"-"+myarr[2];
           $("#plot_start_date3").datepick("option","maxDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])-1))
        },
        defaultDate: new Date(<?=@$risk_est['year_data']-543?>,03,01), 
		maxDate: new Date(<?=@$risk_est['year_data']-543?>, 03 + 2, 30),
		minDate: new Date(<?=@$risk_est['year_data']-543?>, 03, 01)
         
    });
    $("#results_start_date3").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
          $("#results_end_date3").datepick("option","minDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])+1))
        },
        defaultDate: new Date(<?=@$risk_est['year_data']-543?>,03,01), 
		maxDate: new Date(<?=@$risk_est['year_data']-543?>, 03 + 2, 30),
		minDate: new Date(<?=@$risk_est['year_data']-543?>, 03, 01)
    });
    $("#results_end_date3").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
        	selected = (parseInt(myarr[0])+543)+"-"+myarr[1]+"-"+myarr[2];
           $("#results_start_date3").datepick("option","maxDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])-1))
        },
        defaultDate: new Date(<?=@$risk_est['year_data']-543?>,03,01), 
		maxDate: new Date(<?=@$risk_est['year_data']-543?>, 03 + 2, 30),
		minDate: new Date(<?=@$risk_est['year_data']-543?>, 03, 01)
         
    });
    ////////////// ไตรมาสที่3 //////////////
    
    ////////////// ไตรมาสที่4 //////////////
    $("#plot_start_date4").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
          $("#plot_end_date4").datepick("option","minDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])+1))
        },
       	defaultDate: new Date(<?=@$risk_est['year_data']-543?>,06,01), 
		maxDate: new Date(<?=@$risk_est['year_data']-543?>, 06 + 2, 30),
		minDate: new Date(<?=@$risk_est['year_data']-543?>, 06, 01)
    });
    $("#plot_end_date4").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
        	selected = (parseInt(myarr[0])+543)+"-"+myarr[1]+"-"+myarr[2];
           $("#plot_start_date4").datepick("option","maxDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])-1))
        },
        defaultDate: new Date(<?=@$risk_est['year_data']-543?>,06,01), 
		maxDate: new Date(<?=@$risk_est['year_data']-543?>, 06 + 2, 30),
		minDate: new Date(<?=@$risk_est['year_data']-543?>, 06, 01)
         
    });
    $("#results_start_date4").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
          $("#results_end_date4").datepick("option","minDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])+1))
        },
        defaultDate: new Date(<?=@$risk_est['year_data']-543?>,06,01), 
		maxDate: new Date(<?=@$risk_est['year_data']-543?>, 06 + 2, 30),
		minDate: new Date(<?=@$risk_est['year_data']-543?>, 06, 01)
    });
    $("#results_end_date4").datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'media/js/jquery.datepick/calendar.png',
        onSelect: function(selected) {
        	var myarr = selected.split("-");
        	selected = (parseInt(myarr[0])+543)+"-"+myarr[1]+"-"+myarr[2];
           $("#results_start_date4").datepick("option","maxDate", new Date(myarr[0],parseInt(myarr[1])-1,parseInt(myarr[2])-1))
        },
        defaultDate: new Date(<?=@$risk_est['year_data']-543?>,06,01), 
		maxDate: new Date(<?=@$risk_est['year_data']-543?>, 06 + 2, 30),
		minDate: new Date(<?=@$risk_est['year_data']-543?>, 06, 01)
         
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
	$("#btn_detail_risk").colorbox({inline:true, href:"#inline_content_risk", width:"80%",height:"80%"});
	
	$(".remain_risk").change(function(){		
		var b1 = $("[name=before_risk_chance]").val();
		var b2 = $("[name=before_risk_effect]").val();
		var b3 = parseInt(b1) * parseInt(b2);
		if(b1 != '' && b2 !=''){
			$("[name=before_risk_step]").val(b3);
		}
		
		var a1 = $("[name=after_risk_chance]").val();
		var a2 = $("[name=after_risk_effect]").val();
		var a3 = parseInt(a1) * parseInt(a2);
		if(a1 != '' && a2 !=''){
			$("[name=after_risk_step]").val(a3);
		}
			
	})
	
});

</script>
<h3>เพิ่ม ข้อมูลแผนการปฏิบัติการและรายงานผล</h3>
<div id="btnBox">
<input type="button" class="btn btn-primary" id="btn_detail" value="คำอธิบาย" />
</div>
<br />
	<input type="hidden" name="id" value="<?=@$rs['id'];?>" />
<div id="btnBox">
</div>
<table class="table table-form table-bordered table-striped table-horizontal">
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
    <td colspan="2"><input type="text" id="plot_start_date<?=$i?>" name="plot_start_date<?=$i;?>" id="plot_start_date<?=$i;?>" value="<?=@mysql_to_date($rs['plot_start_date'.$i]);?>" style="width:150px"  readonly="readonly"/></td>
  </tr>
  <tr>
    <th width="280px">วันที่เสร็จสิ้น</th>
    <td colspan="2"><input type="text" id="plot_end_date<?=$i;?>" name="plot_end_date<?=$i;?>" id="plot_end_date<?=$i;?>" value="<?=@mysql_to_date($rs['plot_end_date'.$i]);?>" style="width:150px"  readonly="readonly" /></td>
  </tr>
  <tr>
  	<th rowspan="7" width="100" style="vertical-align:middle;"><div align="center">ผล</div></th>
    <th width="280px">วันที่เริ่ม</th>
    <td colspan="2"><input type="text" id="results_start_date<?=$i;?>" name="results_start_date<?=$i;?>" id="results_start_date<?=$i;?>" value="<?=@mysql_to_date($rs['results_start_date'.$i]);?>" style="width:150px"  readonly="readonly"  /></td>
  </tr>
  <tr>
    <th width="280px">วันที่เสร็จสิ้น</th>
    <td colspan="2"><input type="text" id="results_end_date<?=$i;?>" name="results_end_date<?=$i;?>" id="results_end_date<?=$i;?>" value="<?=@mysql_to_date($rs['results_end_date'.$i]);?>" style="width:150px"  readonly="readonly" /></td>
  </tr>
  <tr>
  	<th>ผลลัพธ์ที่ได้</th>
  	<td colspan="2">
  		<textarea name="result<?=$i;?>" style="width:450px;height:150px;"><?=@$rs['result'.$i];?></textarea>
  	</td>
  </tr>
  <? if(@$rs['id']){ ?>
  <tr>
  	<th >หลักฐาน</th>
  	<td>
  		<div class="fl_dtl<?=$i?>">
  		<?
		  
			$fl_upload = $this->file_upload->where("risk_est_id = ".@$risk_est['id']." and quarter = $i and risk_opr_id = ".@$rs['id'])->get('','true');
			 foreach($fl_upload as $fl){
			 	if($fl['id'] != ''){ ?>
			  		<div style="width: 600px;display: inline-block; margin-top: 10px"><a href="import_file/risk_est/<?=$fl['fl_import']?>" target="_blank" ><?=$fl['fl_name']?></a></div>
			  		<a href="<?php echo $fl['id']?>" rel_id="<?=$i?>" risk_opr_id = "<?=$rs['id']?>" style="text-decoration:none;" onclick="return false;" title="Delete" class="btn btn-small btn-danger del_fl"><i class=" icon-trash"></i>ลบ</a>
			  		<br />
		  		<?	}
			 }
		?>
		</div>
  	</td>
  </tr> 	
  <? } ?>	
  <tr>
  	<th>หลักฐาน</th>
  	<td colspan="2">
  		<input type="file" name="fl_import<?=$i;?>" >
  	</tr>
</table>
<? endfor;?>
<fieldset>
	<legend>แนวทางการจัดการความเสี่ยง</legend>	
<div id="btnBox">
<input type="button" class="btn btn-primary" id="btn_detail_risk" value="คำธิบายแนวทางการจัดการความเสี่ยง" />
</div>
<br />
  <table class="table table-form table-bordered table-striped table-horizontal">
	  	<tr>
	  		<th colspan="2"><div align="center">ก่อนวางแผน</div></th>
	  	</tr>	
		<tr>
        	<th width="400px">ระดับโอกาสเกิด</th>
            <td>
            	<select name="before_risk_chance" class="remain_risk" style="width:50px;">
            		<option value="" <? if(@$rs['before_risk_chance']=='')echo 'selected="selected"';?>>--</option>
            		<? for($i=1;$i<=5;$i++): ?>
            		<option value="<?=$i;?>" <? if(@$rs['before_risk_chance']==$i)echo 'selected="selected"';?>><?=$i;?></option>
            		<? endfor;?>
            	</select>
            </td>
        </tr>
    	<tr>
        	<th width="400px">ระดับผลกระทบ</th>
            <td>
               	<select name="before_risk_effect" class="remain_risk"  style="width:50px;">
               		<option value="" <? if(@$rs['before_risk_effect']=='')echo 'selected="selected"';?>>--</option>
            		<? for($i=1;$i<=5;$i++): ?>
            		<option value="<?=$i;?>" <? if(@$rs['before_risk_effect']==$i)echo 'selected="selected"';?>><?=$i;?></option>
            		<? endfor;?>
            	</select>
            </td>
        </tr>
        <tr>
        	<th width="400px">ระดับความเสี่ยง</th>
            <td>
               	<input name="before_risk_step" type="text" style="width:30px;" readonly="readonly" value="<?=(@$rs['before_risk_chance'] * @$rs['before_risk_effect']);?>" />
            </td>
        </tr>        
    </table>
    
  
    <table class="table table-form table-bordered table-striped table-horizontal">
	  	<tr>
	  		<th colspan="2"><div align="center">หลังดำเนินการ ตามแผน</div></th>
	  	</tr>	
		<tr>
        	<th width="400px">ระดับโอกาสเกิด</th>
            <td>
            	<select name="after_risk_chance" class="remain_risk" style="width:50px;">
            		<option value="" <? if(@$rs['after_risk_chance']=='')echo 'selected="selected"';?>>--</option>
            		<? for($i=1;$i<=5;$i++): ?>
            		<option value="<?=$i;?>" <? if(@$rs['after_risk_chance']==$i)echo 'selected="selected"';?>><?=$i;?></option>
            		<? endfor;?>
            	</select>
            </td>
        </tr>
    	<tr>
        	<th width="400px">ระดับผลกระทบ</th>
            <td>
               	<select name="after_risk_effect" class="remain_risk"  style="width:50px;">
               		<option value="" <? if(@$rs['after_risk_effect']=='')echo 'selected="selected"';?>>--</option>
            		<? for($i=1;$i<=5;$i++): ?>
            		<option value="<?=$i;?>" <? if(@$rs['after_risk_effect']==$i)echo 'selected="selected"';?>><?=$i;?></option>
            		<? endfor;?>
            	</select>
            </td>
        </tr>
        <tr>
        	<th width="400px">ระดับความเสี่ยง</th>
            <td>
               	<input name="after_risk_step" type="text" style="width:30px;" readonly="readonly" value="<?=(@$rs['after_risk_chance'] * @$rs['after_risk_effect']);?>" />
            </td>
        </tr>        
    </table>
    <div align="center">
				<input type="submit" value="Save" class="btn btn-primary"> 
				<input type="button" value="  Back  "  class="btn btn-inverse bt_cancel">
	</div>
</fieldset>
<div style='display:none'>
			<div id='inline_content' style='padding:10px; background:#fff;'>
			<?=$detail_opr['detail']?>
			</div>

<div style='display:none'>
			<div id='inline_content_risk' style='padding:10px; background:#fff;'>
			<?=$detail_risk_manage['detail']?>
			</div>
</div>
