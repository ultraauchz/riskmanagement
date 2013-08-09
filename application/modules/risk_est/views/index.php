<h3>ข้อมูลวิเคราะห์เหตุการณ์ความเสี่ยงและการประเมินความเสี่ยง</h3>
<form enctype="multipart/form-data" method="get">
<div id="search">
  <div id="searchBox">
		<h4>ค้นหา</h4>
		<?=form_dropdown('year_data',get_year_option(),@$_GET['year_data'],'','แสดงทุกปี');?>
		<?=form_dropdown('division_id',get_option('id','title','division order by title '),@$_GET['division'],'','แสดงกลุ่มวิชาทั้งหมด');?>
		<?=form_dropdown('section_id',get_option('id','title','section order by title '),@$_GET['section'],'','แสดงภาควิชาทั้งหมด');?>				
		<input type="submit" class="btn_search" value=" " title="ค้นหา" id="button9" name="button9"></div>
  </div>
</div>
</form>
<div id="btnBox">
<a href="risk_est/form" class="btn btn-primary">เพิ่มรายการ</a>
</div>
<div id="paging" class="pagination">
<?php echo $pagination;?>
</div>
<table class="table table-form table-bordered table-striped table-horizontal">
	<tr>
		<th >ลำดับ</th>
		<th >เหตุการณ์ความเสี่ยง</th>
		<th >ปีงบประมาณ</th>
		<th >วัตถุประสงค์</th>
		<th >ภารกิจ</th>
		<th >กระบวนงาน</th>
		<th>หน่วยงาน</th>
		<th >จัดการข้อมูล</th>
	</tr>
	<?php 
		  $rowStyle = '';
		  $page = (isset($_GET['page']))? $_GET['page']:1;
		  $i=(isset($_GET['page']))? (($_GET['page'] -1)* 12)+1:1;
		  foreach($result as $row):
		?>  	
	<tr>
		<td width="5%"><?=$i;?></td>
		<td align="left" width="30%"><?=$row['event_risk'];?></td>
		<td align="left" width="5%"><?=$row['year_data']?></td>
		<td align="left" width="5%">
			<img src="media/images/department_ico.png" title="วัตถุประสงค์ของส่วนงานตามแผนยุทธศาสตร์ ::: <?=$row['objective_title'];?>">
		</td>
		<td align="left" width="15%"><?=$row['mission_title']?></td>
		<td align="left" width="15%"><?=$row['process_title']?></td>
		<td align="left" width="5%"><img src="media/images/department_ico.png" title="กลุ่มวิชา ::: <?=$row['division_title']?> ภาควิชา ::: <?=$row['section_title']?> "></td>
		<td align="left" width="12%">
		  	<? if(permission($menu_id, 'canedit')!=''){ ?>
		  	<a href="<?=$urlpage;?>/form/<?=@$row['id'];?>" title="Edit" class="btn btn-small btn-info"><i class=" icon-pencil"></i>แก้ไข</a>
		  	<? } ?>
		  	<? if(permission($menu_id, 'candelete')!=''){ ?>
		  	<a href="<?=$urlpage;?>/delete/<?php echo @$row['id']?>" style="text-decoration:none;" onclick="return confirm('<?php echo NOTICE_CONFIRM_DELETE?>')" title="Delete" class="btn btn-small btn-danger"><i class=" icon-trash"></i>ลบ</a>
		  	<? } ?> 
		</td>		
	</tr>
	<? 
				$i++;
		  		endforeach; 
?>		
</table>