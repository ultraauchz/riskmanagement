<h3>ข้อมูลพื้นฐาน > จัดการข้อมูลภาควิชา</h3>
<form enctype="multipart/form-data" method="get" action="">
<div id="search">
  <div id="searchBox">
  <h4>ค้นหา</h4>
  <?=form_dropdown('division_id',get_option('id','title','division order by title '),@$_GET['division_id'],'style="width:320px"','แสดงกลุ่มวิชาทั้งหมด');?>
  <?=form_dropdown('section_id',get_option('id','title','section order by title '),@$_GET['section_id'],'style="width:370px"','แสดงภาควิชาทั้งหมด');?>    
  <input type="submit" class="btn_search" value=" " title="ค้นหา" id="button9" name="button9"></div>
  </div>
</div>
</form>
<div id="btnBox">
<? if(permission($menu_id, 'canadd')!=''){ ?> <div><a class="btn btn-primary" href="<?=$urlpage;?>/form">เพิ่มรายการ</a></div><? } ?>
</div>   
<div id="paging" class="pagination">
<?php echo $pagination;?>
</div>

	<table class="table table-form table-bordered table-striped table-horizontal">
		<tr class="head">
					<th>ลำดับ</th>
					<th>ชื่อภาควิชา (ไทย)</th>
					<th>ชื่อภาควิชา (อังกฤษ)</th> 
					<th>กลุ่มวิชา</th>                    
					<th>จัดการข้อมูล</th>
		</tr>
		<?php 
		  $rowStyle = '';
		  $page = (isset($_GET['page']))? $_GET['page']:1;
		  $i=(isset($_GET['page']))? (($_GET['page'] -1)* 12)+1:1;
		  foreach($result as $row):
		?>  
		<tr>
		  <td><?=$i;?></td>
		  <td align="left" ><?=$row['title'];?></td>	  
		  <td align="left" ><?=$row['title_en'];?></td>	
		  <td align="left" ><?=$row['division_title'];?></td>		  
		  <td>
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
