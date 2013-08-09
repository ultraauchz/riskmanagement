<h3>ข้อมูลวิเคราะห์เหตุการณ์ความเสี่ยงและการประเมินความเสี่ยง (เพิ่ม/แก้ไข)</h3>
<form enctype="multipart/form-data" method="post">
<div id="btnBox">
</div>
<table class="table table-form table-bordered table-striped table-horizontal">	
	<tr>
		<th width="400px">ปีงบประมาณ</th>
		<td><?=form_dropdown('year_data',get_year_option(),@$_GET['year_data'],'','แสดงทุกปี');?></td>
	</tr>
	<tr>
		<th width="400px">กลุ่มวิชา</th>
		<td><?=form_dropdown('division_id',get_option('id','title','division order by title '),@$_GET['division'],'style="width:350px"','แสดงกลุ่มวิชาทั้งหมด');?></td>
	</tr>
	<tr>
	  <th width="400px">ภาควิชา</th>
	  <td><?=form_dropdown('section_id',get_option('id','title','section order by title '),@$_GET['section'],'style="width:370px"','แสดงภาควิชาทั้งหมด');?></td>
  </tr>
	<tr>
	  <th width="400px">วัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย</th>
	  <td><?=form_dropdown('objective_id_1',get_option('id','title','objective where objective_type = 1 order by title '),@$_GET['objective_id_1'],'style="width:390px"','--เลือกวัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย--');?></td>
  </tr>
	<tr>
	  <th width="400px">วัตถุประสงค์ตามยุทธศาสตร์ของหน่วยงาน/ส่วนงาน</th>
	  <td><?=form_dropdown('objective_id_2',get_option('id','title','objective where objective_type = 2 order by title '),@$_GET['objective_id_2'],'style="width:390px"','--เลือกวัตถุประสงค์ตามยุทธศาสตร์ของหน่วยงาน/ส่วนงาน--');?></td>
  </tr>
	<tr>
	  <th width="400px">วัตถุประสงค์ตามยุทธศาสตร์ของงาน</th>
	  <td><?=form_dropdown('objective_id_3',get_option('id','title','objective where objective_type = 3 order by title '),@$_GET['objective_id_3'],'style="width:390px"','--เลือกวัตถุประสงค์ตามยุทธศาสตร์ของงาน--');?></td>
  </tr>
	<tr>
	  <th width="400px">ภารกิจ</th>
	  <td><?=form_dropdown('mission_id',get_option('id','title','mission order by title '),@$_GET['mission_id'],'style="width:390px"','--เลือกภารกิจ--');?></td>
  </tr>
	<tr>
	  <th width="400px">กระบวนงาน</th>
	  <td><?=form_dropdown('process_id',get_option('id','title','process order by title '),@$_GET['process_id'],'style="width:390px"','--เลือกกระบวนงาน--');?></td>
  </tr>
	<tr>
	  <th width="400px">เหตุการณ์ความเสี่ยง</th>
	  <td><input name="textarea2" type="text" class="" value="" /></td>
  </tr>
	<tr>
	  <th width="400px">ทบทวนเหตุการณ์ความเสี่ยง</th>
	  <td><textarea name="textarea" class=""></textarea></td>
  </tr>
</table>
<fieldset>
  <legend>วิเคราะห์เหตุการณ์ความเสี่ยง</legend>
	<table class="table table-form table-bordered table-striped table-horizontal">	
    	<tr>
        	<th width="400px">ความเสี่ยงด้านยุทธศาสตร์</th>
            <td>
            	<textarea class=""></textarea>
            </td>
        </tr>
    	<tr>
        	<th width="400px">ความเสี่ยงด้านการเงิน</th>
            <td>
               	<textarea class=""></textarea>
            </td>
        </tr>
            	<tr>
        	<th width="400px">ความเสี่ยงด้านดำเนินงาน</th>
            <td>
               	<textarea class=""></textarea>
            </td>
        </tr>
            	<tr>
        	<th width="400px">ความเสี่ยงด้านกฎระเบียบหรือกฎหมายที่เกี่ยวข้อง</th>
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
        	<th width="400px">ปัจจัยภายใน</th>
            <td>
            	<textarea class=""></textarea>
            </td>
        </tr>
    	<tr>
        	<th width="400px">ปัจจัยภายนอก</th>
            <td>
               	<textarea class=""></textarea>
            </td>
        </tr>        
    </table>
</fieldset>
<table class="table table-form table-bordered table-striped table-horizontal">
  <tr>
    <th width="400px">ตัวชี้วัดความเสี่ยง</th>
    <td><input name="textarea3" type="text" class="" value="" /></td>
  </tr>
  <tr>
    <th width="400px">ทบทวนเหตุการณ์ความเสี่ยง</th>
    <td><textarea name="textarea3" class=""></textarea></td>
  </tr>
  <tr>
    <th width="400px">การควบคุมที่มีอยู่</th>
    <td><input name="textarea3" type="text" class="" value="" /></td>
  </tr>
  <tr>
    <th width="400px">การประเมินการควบคุมที่มีอยู่</th>
    <td><textarea name="textarea3" class=""></textarea></td>
  </tr>
</table>
<fieldset>
	<legend>ความเสี่ยงที่เหลืออยู่</legend>
  <table class="table table-form table-bordered table-striped table-horizontal">	
<tr>
        	<th width="400px">ระดับโอกาสเกิด</th>
            <td>
            	<input name="" type="text" class="" value="" />
            </td>
        </tr>
    	<tr>
        	<th width="400px">ระดับผลกระทบ</th>
            <td>
               	<input name="" type="text" class="" value="" />
            </td>
        </tr>
        <tr>
        	<th width="400px">ระดับความเสี่ยงที่เหลือ</th>
            <td>
               	<input name="" type="text" class="" value="" />
            </td>
        </tr>        
    </table>
</fieldset>
<table class="table table-form table-bordered table-striped table-horizontal">
  <tr>
    <th width="400px">แนวทางการจัดการ</th>
    <td><textarea name="" class=""></textarea></td>
  </tr>
  <tr>
    <th width="400px">ผู้รับผิดชอบ</th>
    <td><input name="" type="text" class="" value="" /></td>
  </tr>
  <tr>
    <th width="400px">วันที่เริ่มดำเนินการ</th>
    <td><input type="text" name="start_date" value="" style="width:150px" class="datepicker" /></td>
  </tr>
  <tr>
    <th width="400px">วันที่เสร็จสิ้น</th>
    <td><input type="text" name="end_date" value="" style="width:150px" class="datepicker" /></td>
  </tr>
</table>
<div align="center">
				<input type="submit" value="Save" class="btn btn-primary"> 
				<input type="button" value="  Back  " onclick="history.back();" class="btn btn-inverse">
</div>
</form>
