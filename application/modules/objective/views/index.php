<script>
	$(document).ready(function(){
		$("select[name=objective_type]").change(function(){
			window.location='objective/?objective_type='+this.value;
		})
	})
</script>
<h3>ข้อมูลพื้นฐาน > จัดการข้อมูลวัตถุประสงค์</h3>
<div class="form-search">
	<table class="search">
		<tr>
			<th>เลือกประเภทวัตถุประสงค์</th>
			<td>
				<?=form_dropdown('objective_type',get_option('id','title','objective_type'),@$objective_type,'style="width:450px;"','กรุณาเลือกประเภทวัตถุประสงค์');?>
			</td>
		</tr>
	</table>
</div>
<? if($objective_type){ ?>
<div id="btnBox">
<? if(permission($menu_id, 'canadd')!=''){ ?> <div><a class="btn btn-primary" href="<?=$urlpage;?>/form">เพิ่มรายการ</a></div><? } ?>
</div>   
<div id="paging" class="pagination">
<?php echo $pagination;?>
</div>

	<table class="table table-form table-bordered table-striped table-horizontal">
		<tr class="head">
					<th>ลำดับ</th>
					<th>ชื่อวัตถุประสงค์</th>
					<th>ประเภทวัตถุประสงค์</th>                  
					<th>จัดการข้อมูล</th>
		</tr>
		<?php 
		  $rowStyle = '';
		  $page = (isset($_GET['page']))? $_GET['page']:1;
		  $i=(isset($_GET['page']))? (($_GET['page'] -1)* 10)+1:1;
		  foreach($result as $row):
		?>  
		<tr>
		  <td><?=$i;?></td>
		  <td align="left" ><?=$row['title'];?></td>	  
		  <td align="left" ><?=$row['objective_type'];?></td>		  
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
<? } ?>