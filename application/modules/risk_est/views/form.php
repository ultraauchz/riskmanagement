<h3>ข้อมูลวิเคราะห์เหตุการณ์ความเสี่ยงและการประเมินความเสี่ยง (เพิ่ม/แก้ไข)</h3>
<form enctype="multipart/form-data" method="post">
<div id="btnBox">
<a href="risk_est/form" class="btn btn-primary">เพิ่มรายการ</a>
</div>
<table class="table table-form table-bordered table-striped table-horizontal">	
	<tr>
		<td>ปีงบประมาณ</td>
		<td><?=form_dropdown('year_data',get_year_option(),@$_GET['year_data'],'','แสดงทุกปี');?></td>
	</tr>
	<tr>
		<td>กลุ่มวิชา</td>
		<td><?=form_dropdown('division_id',get_option('id','title','division order by title '),@$_GET['division'],'','แสดงกลุ่มวิชาทั้งหมด');?></td>
	</tr>
	<tr>
	  <td>ภาควิชา</td>
	  <td><?=form_dropdown('section_id',get_option('id','title','section order by title '),@$_GET['section'],'','แสดงภาควิชาทั้งหมด');?></td>
  </tr>
	<tr>
	  <td>วัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย</td>
	  <td>&nbsp;</td>
  </tr>
	<tr>
	  <td>วัตถุประสงค์ตามยุทธศาสตร์ของหน่วยงาน/ส่วนงาน</td>
	  <td>&nbsp;</td>
  </tr>
	<tr>
	  <td>วัตถุประสงค์ตามยุทธศาสตร์ของงาน</td>
	  <td>&nbsp;</td>
  </tr>
	<tr>
	  <td>ภารกิจ</td>
	  <td>&nbsp;</td>
  </tr>
	<tr>
	  <td>กระบวนงาน</td>
	  <td>&nbsp; </td>
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
</table>
