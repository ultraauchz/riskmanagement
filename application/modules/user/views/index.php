<h3>จัดการข้อมูลผู้ใช้</h3>
<div id="btnBox">
<? if(permission($menu_id, 'canadd')!=''){ ?> <div><a class="btn btn-primary" href="<?=$urlpage;?>/form">เพิ่มรายการ</a></div><? } ?>
</div>   
<div id="paging" class="pagination">
<?php echo $pagination;?>
</div>

	<table class="table table-form table-bordered table-striped table-horizontal">
		<tr class="head">
			<th></th>
			<th>Name</th>
			<th>Email</th>
			<th>Admin Group</th>
			<th>Register Date</th>
			<th>Manage</th>
		</tr>
		<?php 
		  $rowStyle = '';
		  $page = (isset($_GET['page']))? $_GET['page']:1;
		  $i=(isset($_GET['page']))? (($_GET['page'] -1)* 10)+1:1;
		  foreach($result as $row):
		?>  
		<tr <? if($rowStyle =='')$rowStyle = 'class="odd"';else $rowStyle = "";echo $rowStyle;?> >
		  <td><?=$i;?></td>
		  <td style="cursor: pointer;" onclick="window.location='<?=$urlpage;?>/form/<?=$row['id'];?>'">
		  	<?=$row['name'];?> 
		  </td>		  
		  <td style="cursor: pointer;" align="center" onclick="window.location='<?=$urlpage;?>/form/<?=$row['id'];?>'"><?=$row['email'];?></td>
		  <td style="cursor: pointer;" align="center" onclick="window.location='<?=$urlpage;?>/form/<?=$row['id'];?>'">
		  	<?
		  		echo @$this->db->getone("SELECT name FROM usertype WHERE id=".$row['usertype']);
		  	?>
		  </td>
		  <td style="cursor: pointer;" align="center" onclick="window.location='<?=$urlpage;?>/form/<?=$row['id'];?>'"><?=$row['registerdate'];?></td>		  
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
