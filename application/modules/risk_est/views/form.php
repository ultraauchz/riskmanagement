<script type="text/javascript">
$(function(){
	
	$(".commentForm").validate({
	rules: 
	{
		year_data:{ required: true},
		divisionid:{ required: true},
		sectionid:{ required: true},
		missionid:{ required: true},
		objectiveid_1:{ required: true},
		objectiveid_2:{ required: true},
		objectiveid_3:{ required: true},
		processid:{ required: true},
		event_risk:{ required: true},
		review_risk:{ required: true},
		strategic_risk:{ required: true},
		finance_risk:{ required: true},
		operate_risk:{ required: true},
		law_risk:{ required: true},
		cause_in_risk:{ required: true},
		cause_out_risk:{ required: true},
		kpi_risk:{ required: true},
		control_risk:{ required: true},
		estimate_control_risk:{ required: true},
		remain_risk_1:{ required: true},
		remain_risk_2:{ required: true},
		remain_risk_3:{ required: true},
		manage_risk:{ required: true},
		owner_risk:{ required: true},
		start_date:{ required: true},
		end_date:{ required: true}
	},
	messages:
	{
		year_data:{required: " กรุณาเลือกปี"},
		divisionid:{required: " กรุณาเลือกกลุ่มวิชา"},
		sectionid:{ required: " กรุณาเลือกภาควิชา"},
		objectiveid_1:{ required: " กรุณาเลือกวัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย"},
		objectiveid_2:{ required: " กรุณาเลือกวัตถุประสงค์ตามยุทธศาสตร์ของหน่วยงาน/ส่วนงาน"},
		objectiveid_3:{ required: " กรุณาเลือกวัตถุประสงค์ตามยุทธศาสตร์ของงาน"},
		missionid:{ required: " กรุณาเลือกภารกิจ"},
		processid:{ required: " กรุณาเลือกกระบวนงาน"},
		event_risk:{ required: " กรุณาระบุเหตุการณ์ความเสี่ยง"},
		review_risk:{ required: " กรุณาระบุทบทวนเหตุการณ์ความเสี่ยง"},
		strategic_risk:{ required: " กรุณาระบุความเสี่ยงด้านยุทธศาสตร์"},
		finance_risk:{ required: " กรุณาระบุความเสี่ยงด้านการเงิน"},
		operate_risk:{ required: " กรุณาระบุความเสี่ยงด้านดำเนินงาน"},
		law_risk:{ required: "กรุณาระบุความเสี่ยงด้านกฎระเบียบหรือกฎหมายที่เกี่ยวข้อง"},
		cause_in_risk:{ required: "กรุณาระบุปัจจัยภายใน"},
		cause_out_risk:{ required: "กรุณาระบุปัจจัยภายนอก"},
		kpi_risk:{ required: "กรุณาระบุตัวชี้วัดความเสี่ยง"},
		control_risk:{ required: "กรุณาระบุการควบคุมที่มีอยู่"},
		estimate_control_risk:{ required: "กรุณาระบุการประเมินการควบคุมที่มีอยู่"},
		remain_risk_1:{ required: "กรุณาระบุระดับโอกาสเกิด"},
		remain_risk_2:{ required: "กรุณาระบุระดับผลกระทบ"},
		remain_risk_3:{ required: "กรุณาระบุระดับความเสี่ยงที่เหลือ"},
		manage_risk:{ required: "กรุณาระบุแนวทางการจัดการ"},
		owner_risk:{ required: "กรุณาระบุผู้รับผิดชอบ"},
		start_date:{ required: "กรุณาระบุวันที่เริ่มดำเนินการ"},
		end_date:{ required: "กรุณาระบุวันที่เสร็จสิ้น"}
	}
	});
});
</script>

<h3>ข้อมูลวิเคราะห์เหตุการณ์ความเสี่ยงและการประเมินความเสี่ยง (เพิ่ม/แก้ไข)</h3>
<form enctype="multipart/form-data" method="post" action="<? echo $urlpage?>/save" class="commentForm">
	<input type="hidden" name="id" value="<?=@$rs['id'];?>" />
<div id="btnBox">
</div>
<table class="table table-form table-bordered table-striped table-horizontal">	
	<tr>
		<th width="400px">ปีงบประมาณ</th>
		<td><?=form_dropdown('year_data',get_year_option(),@$rs['year_data'],'','--เลือกปี--');?></td>
	</tr>
	<tr>
		<th width="400px">กลุ่มวิชา</th>
		<td><?=form_dropdown('divisionid',get_option('id','title','division order by title '),@$rs['divisionid'],'style="width:350px"','--เลือกกลุ่มวิชา--');?></td>
	</tr>
	<tr>
	  <th width="400px">ภาควิชา</th>
	  <td><?=form_dropdown('sectionid',get_option('id','title','section order by title '),@$rs['sectionid'],'style="width:370px"','--เลือกภาควิชา--');?></td>
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
</table>
<fieldset>
  <legend>วิเคราะห์เหตุการณ์ความเสี่ยง</legend>
	<table class="table table-form table-bordered table-striped table-horizontal">	
    	<tr>
        	<th width="400px">ความเสี่ยงด้านยุทธศาสตร์</th>
            <td>
            	<textarea name="strategic_risk" class="" rows="4" style="width:700px"><?=@$rs['strategic_risk'];?></textarea>
            </td>
        </tr>
    	<tr>
        	<th width="400px">ความเสี่ยงด้านการเงิน</th>
            <td>
               	<textarea name="finance_risk" class="" rows="4" style="width:700px"><?=@$rs['finance_risk'];?></textarea>
            </td>
        </tr>
            	<tr>
        	<th width="400px">ความเสี่ยงด้านดำเนินงาน</th>
            <td>
               	<textarea name="operate_risk" class="" rows="4" style="width:700px"><?=@$rs['operate_risk'];?></textarea>
            </td>
        </tr>
            	<tr>
        	<th width="400px">ความเสี่ยงด้านกฎระเบียบหรือกฎหมายที่เกี่ยวข้อง</th>
            <td>
               	<textarea name="law_risk" class="" rows="4" style="width:700px"><?=@$rs['law_risk'];?></textarea>
            </td>
        </tr>        
    </table>
</fieldset>
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
<table class="table table-form table-bordered table-striped table-horizontal">
  <tr>
    <th width="400px">ตัวชี้วัดความเสี่ยง</th>
    <td><input name="kpi_risk" type="text" class="" value="<?=@$rs['kpi_risk'];?>" /></td>
  </tr>
  <tr>
    <th width="400px">การควบคุมที่มีอยู่</th>
    <td><input name="control_risk" type="text" class="" value="<?=@$rs['control_risk'];?>" /></td>
  </tr>
  <tr>
    <th width="400px">การประเมินการควบคุมที่มีอยู่</th>
    <td><textarea name="estimate_control_risk" class="" rows="4" style="width:700px"><?=@$rs['estimate_control_risk'];?></textarea></td>
  </tr>
</table>
<fieldset>
	<legend>ความเสี่ยงที่เหลืออยู่</legend>
  <table class="table table-form table-bordered table-striped table-horizontal">	
<tr>
        	<th width="400px">ระดับโอกาสเกิด</th>
            <td>
            	<input name="remain_risk_1" type="text" class="" value="<?=@$rs['remain_risk_1'];?>" />
            </td>
        </tr>
    	<tr>
        	<th width="400px">ระดับผลกระทบ</th>
            <td>
               	<input name="remain_risk_2" type="text" class="" value="<?=@$rs['remain_risk_2'];?>" />
            </td>
        </tr>
        <tr>
        	<th width="400px">ระดับความเสี่ยงที่เหลือ</th>
            <td>
               	<input name="remain_risk_3" type="text" class="" value="<?=@$rs['remain_risk_3'];?>" />
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
    <th width="400px">วันที่เริ่มดำเนินการ</th>
    <td><input type="text" name="start_date" value="<?=@$rs['start_date'];?>" style="width:150px" class="datepicker" /></td>
  </tr>
  <tr>
    <th width="400px">วันที่เสร็จสิ้น</th>
    <td><input type="text" name="end_date" value="<?=@$rs['end_date'];?>" style="width:150px" class="datepicker" /></td>
  </tr>
</table>
<div align="center">
				<input type="submit" value="Save" class="btn btn-primary"> 
				<input type="button" value="  Back  " onclick="history.back();" class="btn btn-inverse">
</div>
</form>
