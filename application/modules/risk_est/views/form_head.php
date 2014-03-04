<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript" src="media/js/jquery.colorbox.js"></script>
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

		$(".commentForm").validate({
			rules: 
			{
				year_data:{ required: true},
				sectionid:{ required: true},
				missionid:{ required: true},
				objectiveid_1:{ required: true},
				objectiveid_2:{ required: true},
				objective_3:{ required: true},
				process:{ required: true}
			},
			messages:
			{
				year_data:{required: " กรุณาเลือกปี"},
				sectionid:{ required: " กรุณาเลือกภาควิชา/งาน"},
				objectiveid_1:{ required: " กรุณาเลือกวัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย"},
				objectiveid_2:{ required: " กรุณาเลือกวัตถุประสงค์ตามยุทธศาสตร์ของหน่วยงาน/ส่วนงาน"},
				objective_3:{ required: " กรุณาเลือกวัตถุประสงค์ตามยุทธศาสตร์ของงาน"},
				missionid:{ required: " กรุณาเลือกภารกิจ"},
				process:{ required: " กรุณาระบุกระบวนงาน"}
			}
		});
	
	
	 // ทำให้ผ่าน tiny ผ่าน validate 
	    $('#save').click(function() {
	     tinymce.triggerSave();
		});
});
</script>

<h3>ข้อมูลวิเคราะห์เหตุการณ์ความเสี่ยงและการประเมินความเสี่ยง(ส่วนที่หนึ่ง) (เพิ่ม/แก้ไข)</h3>
<div id="btnBox">
<input type="button" class="btn btn-primary" id="btn_detail" value="คำอธิบาย" />
</div>
<br />
<form enctype="multipart/form-data" method="post" action="<? echo $urlpage?>/save_head" class="commentForm">
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
	  <td><textarea name="objective_3" rows="4" style="width:700px"><?=@$rs['objective_3'];?></textarea></td>
  </tr>
	<tr>
	  <th width="400px">ภารกิจ</th>
	  <td><?=form_dropdown('missionid',get_option('id','title','mission order by title '),@$rs['missionid'],'style="width:390px"','--เลือกภารกิจ--');?></td>
  </tr>
	<tr>
	  <th width="400px">กระบวนงาน</th>
	  <td><textarea name="process" rows="4" style="width:700px"><?=@$rs['process'];?></textarea></td>
  </tr>
</table>
<div align="center">
				<input type="submit" id="save" value="Save" class="btn btn-primary"> 
				<input type="button" value="  Back  " onclick="history.back();" class="btn btn-inverse">
</div>
</form>
<div style='display:none'>
			<div id='inline_content' style='padding:10px; background:#fff;'>
			<?=$detail_est['detail']?>
			</div>
</div>
