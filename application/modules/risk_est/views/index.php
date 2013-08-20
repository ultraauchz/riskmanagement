<h3>ข้อมูลวิเคราะห์เหตุการณ์ความเสี่ยงและการประเมินความเสี่ยง</h3>
<form enctype="multipart/form-data" method="get">
<div id="search">
  <div id="searchBox">
		<h4>ค้นหา</h4>
		<? if(@$rs['permis']=='on'){ ?>
		<script>
    	$(function(){
        	$('[name=section_id]').chainedSelect({parent: '[name=division_id]',url: 'risk_est/report_section',value: 'id',label: 'text'});
    	});
		</script>
			<?=form_dropdown('year_data',get_year_option(),@$_GET['year_data'],'','แสดงทุกปี');?>
			<?=form_dropdown('section_id',get_option('id','title','section order by section_type_id asc, title asc '),@$_GET['section_id'],'style="width:370px"','แสดงภาควิชาและหน่วยงานทั้งหมด');?>
		<? }else{ ?>	
			<?=form_dropdown('year_data',get_year_option(),@$_GET['year_data'],'','แสดงทุกปี');?>
			<?=form_dropdown('section_id',get_option('id','title','section where id = "'.@$result1['id'].'" order by section_type_id asc, title asc  '),@$_GET['section_id'],'style="width:370px"');?>
		<? } ?>		
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
		<th >ภารกิจ</th>
		<th >กระบวนงาน</th>
		<th>หน่วยงาน</th>
		<th>แผนการปฎิบัติการและรายงานผล</th>
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
		<td align="left" width="20%"><?=$row['event_risk'];?></td>
		<td align="left" width="5%"><?=$row['year_data']?></td>
		<td align="left" width="15%"><?=$row['mission_title']?></td>
		<td align="left" width="15%"><?=$row['process_title']?></td>
		<td align="left" width="5%"><?=$row['section_title']?></td>
		<td align="left" width="10%">
			<? if(permission($menu_id, 'canedit')!=''){ ?>
		  	<a href="<?=$urlpage;?>/form_opr/<?=@$row['id'];?>" title="Edit" class="btn btn-primary"><i class=" icon-pencil"></i>แผนการปฎิบัติการ</a>
		  	<? } ?>
		</td>
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