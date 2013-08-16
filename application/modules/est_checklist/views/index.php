<h3>การประเมินองค์ประกอบของการควบคุมภายใน</h3>
<form enctype="multipart/form-data" method="get">
<div id="search">
  <div id="searchBox">
		<h4>ค้นหา</h4>
		<? if(permission($menu_id, 'can_access_all')=='on'){ ?>
		<script>
    	$(function(){
        	$('[name=sectionid]').chainedSelect({parent: '[name=divisionid]',url: 'est_checklist/report_section',value: 'id',label: 'text'});
    	});
		</script>
			<?=form_dropdown('year_data',get_option('year_data','year_data as year','est_title where year_data != " "'),@$_GET['year_data'],'','แสดงทุกปี');?>
			<?=form_dropdown('divisionid',get_option('id','title','division order by title'),@$_GET['divisionid'],'style="width:320px"','แสดงกลุ่มวิชาทั้งหมด');?>
			<?=form_dropdown('sectionid',get_option('id','title','section order by title'),@$_GET['sectionid'],'style="width:370px"','แสดงภาควิชาทั้งหมด');?>
		<? }else{ ?>	
			<?=form_dropdown('year_data',get_option('year_data','year_data as year','est_title where year_data != " "'),@$_GET['year_data'],'','แสดงทุกปี');?>
			<?=form_dropdown('divisionid',get_option('id','title','division where id = "'.@$_GET['divisionid'].'" order by title '),@$rs['divisionid'],'style="width:320px"','');?>
			<?=form_dropdown('sectionid',get_option('id','title','section where id = "'.@$_GET['sectionid'].'" order by title '),@$rs['sectionid'],'style="width:370px"');?>
		<? } ?>	
		<input type="submit" class="btn_search" value=" " title="ค้นหา" id="button9" name="button9"></div>
  </div>
</div>
</form> 
<div id="btnBox">
<? if(permission($menu_id, 'canadd')!=''){ ?> <div><a class="btn btn-primary" href="<?=$urlpage;?>/form/">เพิ่มรายการ</a></div><? } ?>
</div>
<div id="paging" class="pagination">
<?php echo $pagination;?>
</div>

	<table class="table table-form table-bordered table-striped table-horizontal">
		<tr class="head">
					<th>ลำดับ</th>
					<th>ปีงบประมาณ</th> 
					<th>กลุ่มวิชา</th>
					<th>ภาควิชา</th> 
					<th><div align="center">จัดการข้อมูล</div></th>
		</tr>
		<?php 
		  $rowStyle = '';
		  $page = (isset($_GET['page']))? $_GET['page']:1;
		  $i=(isset($_GET['page']))? (($_GET['page'] -1)* 12)+1:1;
		  foreach($result as $row):
		?>  
		<tr>
		  <td width="5%"><?=$i;?></td>
		  <td align="left" width="10%" ><?=$row['year_data'];?></td>
		  <td width="35%"><?=$row['division_title'];?></td>
		  <td width="35%"><?=$row['section_title'];?></td>
		  <td width="15%">
		  	<? if(permission($menu_id, 'canedit')!=''){ ?>
		  	<a href="<?=$urlpage;?>/form/<?=$row['id'];?>" title="Edit" class="btn btn-small btn-info"><i class=" icon-pencil"></i>แก้ไข</a>
		  	<? } ?>
		  	<? if(permission($menu_id, 'candelete')!=''){ ?>
		  	<a href="<?=$urlpage;?>/delete/<?php echo $row['id']?>" style="text-decoration:none;" onclick="return confirm('<?php echo NOTICE_CONFIRM_DELETE?>')" title="Delete" class="btn btn-small btn-danger"><i class=" icon-trash"></i>ลบ</a>
		  	<? } ?> 
		  </td>
		  </tr>
		<tr>
		<? 
				$i++;
		  		endforeach; 
?>		
	</table>
