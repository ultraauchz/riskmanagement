<h3>ข้อมูลพื้นฐาน > จัดการข้อมูลหัวข้อการประเมินองค์ประกอบของการควบคุมภายใน</h3>
<? if($pid > 0 ): ?>
	
		<h4><a href="est_title/index/0">หัวข้อหลัก</a> > <a href="est_title/index/<?=@$main['id'];?>"><?=@$main['title'];?></a> <?if(@$main2['title'] != '' ){?> <a href="est_title/index/<?=$main2['id'];?>"><?echo " > ".@$main2['title'];}?></a></h4>
	
	<? endif;?>
	<tr>
<div id="btnBox">
<? if(permission($menu_id, 'canadd')!=''){ ?> <div><a class="btn btn-primary" href="<?=$urlpage;?>/form/<?=$pid;?>">เพิ่มรายการ</a></div><? } ?>
</div>   
<div id="paging" class="pagination">
<?php echo $pagination;?>
</div>

	<table class="table table-form table-bordered table-striped table-horizontal">
		<tr class="head">
					<th>ลำดับ</th>
					<th>หัวข้อการประเมินองค์ประกอบของการควบคุมภายใน</th> 
					<th colspan="2"><div align="center">จัดการข้อมูล</div></th>
		</tr>
		<?php 
		  $rowStyle = '';
		  $page = (isset($_GET['page']))? $_GET['page']:1;
		  $i=(isset($_GET['page']))? (($_GET['page'] -1)* 12)+1:1;
		  foreach($result as $row):
		?>  
		<tr>
		  <td width="5%"><?=$i;?></td>
		  <td align="left" width="65%" ><?=$row['title'];?></td>
		  <? if(@$main2['id']== ''){ ?>	  
		  <td><a href="est_title/index/<?=$row['id'];?>" class="btn">จัดการหัวข้อภายใต้</a></td>	
		  <? } ?>	  
		  <td width="15%">
		  	<? if(permission($menu_id, 'canedit')!=''){ ?>
		  	<a href="<?=$urlpage;?>/form/<?=$pid;?>/<?=$row['id'];?>" title="Edit" class="btn btn-small btn-info"><i class=" icon-pencil"></i>แก้ไข</a>
		  	<? } ?>
		  	<? if(permission($menu_id, 'candelete')!=''){ ?>
		  	<a href="<?=$urlpage;?>/delete/<?=$pid;?>/<?php echo $row['id']?>" style="text-decoration:none;" onclick="return confirm('<?php echo NOTICE_CONFIRM_DELETE?>')" title="Delete" class="btn btn-small btn-danger"><i class=" icon-trash"></i>ลบ</a>
		  	<? } ?> 
		  </td>
		  </tr>
		<tr>
		<? 
				$i++;
		  		endforeach; 
?>		
	</table>
