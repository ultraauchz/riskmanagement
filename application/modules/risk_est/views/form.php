<h3>ข้อมูลวิเคราะห์เหตุการณ์ความเสี่ยงและการประเมินความเสี่ยง (เพิ่ม/แก้ไข)</h3>
<form enctype="multipart/form-data" method="post">
<div id="btnBox">
</div>
<table class="table table-form table-bordered table-striped table-horizontal">	
	<tr>
		<td>ปีงบประมาณ</td>
		<td><?=form_dropdown('year_data',get_year_option(),@$_GET['year_data'],'','แสดงทุกปี');?></td>
	</tr>
	<tr>
		<td>กลุ่มวิชา</td>
		<td><?=form_dropdown('division_id',get_option('id','title','division order by title '),@$_GET['division'],'style="width:350px"','แสดงกลุ่มวิชาทั้งหมด');?></td>
	</tr>
	<tr>
	  <td>ภาควิชา</td>
	  <td><?=form_dropdown('section_id',get_option('id','title','section order by title '),@$_GET['section'],'style="width:370px"','แสดงภาควิชาทั้งหมด');?></td>
  </tr>
	<tr>
	  <td>วัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย</td>
	  <td><?=form_dropdown('objective_id_1',get_option('id','title','objective where objective_type = 1 order by title '),@$_GET['objective_id_1'],'style="width:390px"','--เลือกวัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย--');?></td>
  </tr>
	<tr>
	  <td>วัตถุประสงค์ตามยุทธศาสตร์ของหน่วยงาน/ส่วนงาน</td>
	  <td><?=form_dropdown('objective_id_2',get_option('id','title','objective where objective_type = 2 order by title '),@$_GET['objective_id_2'],'style="width:390px"','--เลือกวัตถุประสงค์ตามยุทธศาสตร์ของหน่วยงาน/ส่วนงาน--');?></td>
  </tr>
	<tr>
	  <td>วัตถุประสงค์ตามยุทธศาสตร์ของงาน</td>
	  <td><?=form_dropdown('objective_id_3',get_option('id','title','objective where objective_type = 3 order by title '),@$_GET['objective_id_3'],'style="width:390px"','--เลือกวัตถุประสงค์ตามยุทธศาสตร์ของงาน--');?></td>
  </tr>
	<tr>
	  <td>ภารกิจ</td>
	  <td><?=form_dropdown('mission_id',get_option('id','title','mission order by title '),@$_GET['mission_id'],'style="width:390px"','--เลือกภารกิจ--');?></td>
  </tr>
	<tr>
	  <td>กระบวนงาน</td>
	  <td><?=form_dropdown('process_id',get_option('id','title','process order by title '),@$_GET['process_id'],'style="width:390px"','--เลือกกระบวนงาน--');?></td>
  </tr>
	<tr>
	  <td>เหตุการณ์ความเสี่ยง</td>
	  <td><input name="textarea2" type="text" class="" value="" /></td>
  </tr>
	<tr>
	  <td>ทบทวนเหตุการณ์ความเสี่ยง</td>
	  <td><textarea name="textarea" class=""></textarea></td>
  </tr>
</table>
<fieldset>
  <legend>วิเคราะห์เหตุการณ์ความเสี่ยง</legend>
	<table class="table table-form table-bordered table-striped table-horizontal">	
    	<tr>
        	<th>ความเสี่ยงด้านยุทธศาสตร์</th>
            <td>
            	<textarea class=""></textarea>
            </td>
        </tr>
    	<tr>
        	<th>ความเสี่ยงด้านการเงิน</th>
            <td>
               	<textarea class=""></textarea>
            </td>
        </tr>
            	<tr>
        	<th>ความเสี่ยงด้านดำเนินงาน</th>
            <td>
               	<textarea class=""></textarea>
            </td>
        </tr>
            	<tr>
        	<th>ความเสี่ยงด้านกฎระเบียบหรือกฎหมายที่เกี่ยวข้อง</th>
            <td>
               	<textarea class=""></textarea>
            </td>
        </tr>        
    </table>
</fieldset>
<fieldset>
	<legend>สาเหตุ</legend>
  <table class="table table-form table-bordered table-striped table-horizontal">	
<tr>
        	<th>ปัจจัยภายใน</th>
            <td>
            	<textarea class=""></textarea>
            </td>
        </tr>
    	<tr>
        	<th>ปัจจัยภายนอก</th>
            <td>
               	<textarea class=""></textarea>
            </td>
        </tr>        
    </table>
</fieldset>
<table class="table table-form table-bordered table-striped table-horizontal">
  <tr>
    <td>ตัวชี้วัดความเสี่ยง</td>
    <td><input name="textarea3" type="text" class="" value="" /></td>
  </tr>
  <tr>
    <td>ทบทวนเหตุการณ์ความเสี่ยง</td>
    <td><textarea name="textarea3" class=""></textarea></td>
  </tr>
  <tr>
    <td>การควบคุมที่มีอยู่</td>
    <td><input name="textarea3" type="text" class="" value="" /></td>
  </tr>
  <tr>
    <td>การประเมินการควบคุมที่มีอยู่</td>
    <td><textarea name="textarea3" class=""></textarea></td>
  </tr>
</table>
<fieldset>
	<legend>ความเสี่ยงที่เหลืออยู่</legend>
  <table class="table table-form table-bordered table-striped table-horizontal">	
<tr>
        	<th>ระดับโอกาสเกิด</th>
            <td>
            	<input name="" type="text" class="" value="" />
            </td>
        </tr>
    	<tr>
        	<th>ระดับผลกระทบ</th>
            <td>
               	<input name="" type="text" class="" value="" />
            </td>
        </tr>
        <tr>
        	<th>ระดับความเสี่ยงที่เหลือ</th>
            <td>
               	<input name="" type="text" class="" value="" />
            </td>
        </tr>        
    </table>
</fieldset>
<table class="table table-form table-bordered table-striped table-horizontal">
  <tr>
    <td>แนวทางการจัดการ</td>
    <td><textarea name="" class=""></textarea></td>
  </tr>
  <tr>
    <td>ผู้รับผิดชอบ</td>
    <td><input name="" type="text" class="" value="" /></td>
  </tr>
  <tr>
    <td>วันที่เริ่มดำเนินการ</td>
    <td><input type="text" name="start_date" value="" style="width:150px" class="datepicker" /></td>
  </tr>
  <tr>
    <td>วันที่เสร็จสิ้น</td>
    <td><input type="text" name="end_date" value="" style="width:150px" class="datepicker" /></td>
  </tr>
</table>
<div align="center">
				<input type="submit" value="Save" class="btn btn-primary"> 
				<input type="button" value="  Back  " onclick="history.back();" class="btn btn-inverse">
</div>
</form>
