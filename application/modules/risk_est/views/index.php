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
			<span>ปีงบประมาณ : </span>
			<?=form_dropdown('year_data',get_year_option(),@$_GET['year_data'],'','แสดงทุกปี');?>
			<span>ภาควิชา : </span>
			<?=form_dropdown('section_id',get_option('id','title','section order by section_type_id asc, title asc '),@$_GET['section_id'],'style="width:370px"','แสดงภาควิชา/งานทั้งหมด');?>
		<? }else{ ?>
			<span>ปีงบประมาณ : </span>	
			<?=form_dropdown('year_data',get_year_option(),@$_GET['year_data'],'','แสดงทุกปี');?>
			<span>ภาควิชา : </span>
			<?=form_dropdown('section_id',get_option('id','title','section where id = "'.@$result1['id'].'" order by section_type_id asc, title asc  '),@$_GET['section_id'],'style="width:370px"');?>
		<? } ?>	
			<span>ภารกิจ : </span>
			<?=form_dropdown('missionid',get_option('id','title','mission order by title '),@$_GET['missionid'],'style="width:390px"','แสดงภารกิจทั้งหมด');?>
			<br />เหตุการณ์ความเสี่ยง <input type="text" name="event_risk" value="<?=@$_GET['event_risk']?>" style="width:370px" />
		<input type="submit" class="btn_search" value=" " title="ค้นหา" id="button9" name="button9"></div>
  </div>
</div>
</form>
<div id="btnBox">
<a href="risk_est/form_head" class="btn btn-primary">เพิ่มรายการ</a>
</div>
<div id="paging" class="pagination">
<?php echo $pagination;?>
</div>
<table class="table table-form table-bordered table-striped table-horizontal">
	<tr>
		<th >ลำดับ</th>
		<th >เหตุการณ์ความเสี่ยง</th>
		<th >ระดับความเสี่ยง</th>
		<th >ปีงบประมาณ</th>
		<th >ภารกิจ</th>
		<th>หน่วยงาน</th>
		<th>เพิ่มเหตุการความเสี่ยง</th>
		<th >จัดการข้อมูล</th>
	</tr>
	<?php 
		  $rowStyle = '';
		  $page = (isset($_GET['page']))? $_GET['page']:1;
		  $i=(isset($_GET['page']))? (($_GET['page'] -1)* 12)+1:1;
		  foreach($result as $row):
			$sql_risk_est = "select risk_est.* , risk_type.title as risk_type_title
							 from risk_est 
							 left join risk_type on risk_est.risk_type_id = risk_type.id
							 where risk_est.risk_est_head_id = '".$row['id']."' ";
			$result_risk_est =  $this->risk->get($sql_risk_est);
		    $num_row = count($result_risk_est);
			if($num_row != '0'){
			foreach ($result_risk_est as $key => $risk) {
			
			$condition_level = " risk_remain_1_val = ".$risk['remain_risk_1'] . " AND risk_remain_2_val = ".$risk['remain_risk_2'];
			$level = $this->risk_level->where($condition_level)->get_row();
			
					if($key == '0'){
		?>  	
							<tr>
								<td style="text-align:center;width:30px;" rowspan="<?=@$num_row?>"><?=$i;?></td>
								<td ><?=$risk['event_risk'];?></td>
								<td align="left" width="5%" style="background:<?=$level['level_color']?>;text-align:center;font-weight:bold;"><?=$level['level_desc']?></td>
								<td align="left" width="5%" style="text-align:center;" rowspan="<?=@$num_row?>"><?=$row['year_data']?></td>
								<td align="left" width="15%" rowspan="<?=@$num_row?>"><?=$row['mission_title']?></td>
								<td align="left"  rowspan="<?=@$num_row?>"><?=$row['section_title']?></td>
								<td align="left" width="10%" rowspan="<?=@$num_row?>" >
									<? if(permission($menu_id, 'canedit')!=''){ ?>
								  	<a href="<?=$urlpage;?>/form_head_view/<?=@$row['id'];?>" title="Edit" class="btn btn-primary">เพิ่มเหตุการความเสี่ยง</a>
								  	<? } ?>
								</td>
								<td align="left" width="12%" rowspan="<?=@$num_row?>">
								  	<? if(permission($menu_id, 'canedit')!=''){ ?>
								  	<a href="<?=$urlpage;?>/form_head/<?=@$row['id'];?>" title="Edit" class="btn btn-small btn-info"><i class=" icon-pencil"></i>แก้ไข</a>
								  	<? } ?>
								  	<? if(permission($menu_id, 'candelete')!=''){ ?>
								  	<a href="<?=$urlpage;?>/delete_risk_head/<?php echo @$row['id']?>" style="text-decoration:none;" onclick="return confirm('<?php echo NOTICE_CONFIRM_DELETE?>')" title="Delete" class="btn btn-small btn-danger"><i class=" icon-trash"></i>ลบ</a>
								  	<? } ?> 
								</td>		
							</tr>
	
		<? 
					}else{
		?>
							<tr>
								<td ><?=$risk['event_risk'];?></td>
								<td align="left" width="5%" style="background:<?=$level['level_color']?>;text-align:center;font-weight:bold;"><?=$level['level_desc']?></td>
							</tr>
		<?
						
					}//if($key == '0')
			 }
			 }else{ ?>
			 				<tr>
								<td style="text-align:center;width:30px;" rowspan="<?=@$num_row?>"><?=$i;?></td>
								<td >ยังไม่มีการเพิ่มเหตุการณ์ความเสี่ยง</td>
								<td align="left" width="5%" style="text-align:center;font-weight:bold;">-</td>
								<td align="left" width="5%" style="text-align:center;" rowspan="<?=@$num_row?>"><?=$row['year_data']?></td>
								<td align="left" width="15%" rowspan="<?=@$num_row?>"><?=$row['mission_title']?></td>
								<td align="left"  rowspan="<?=@$num_row?>"><?=$row['section_title']?></td>
								<td align="left" width="10%" rowspan="<?=@$num_row?>" >
									<? if(permission($menu_id, 'canadd')!=''){ ?>
								  	<a href="<?=$urlpage;?>/form_head_view/<?=@$row['id'];?>" title="Edit" class="btn btn-primary">เพิ่มเหตุการความเสี่ยง</a>
								  	<? } ?>
								</td>
								<td align="left" width="12%" rowspan="<?=@$num_row?>">
								  	<? if(permission($menu_id, 'canedit')!=''){ ?>
								  	<a href="<?=$urlpage;?>/form_head/<?=@$row['id'];?>" title="Edit" class="btn btn-small btn-info"><i class=" icon-pencil"></i>แก้ไข</a>
								  	<? } ?>
								  	<? if(permission($menu_id, 'candelete')!=''){ ?>
								  	<a href="<?=$urlpage;?>/delete_risk_head/<?php echo @$row['id']?>" style="text-decoration:none;" onclick="return confirm('<?php echo NOTICE_CONFIRM_DELETE?>')" title="Delete" class="btn btn-small btn-danger"><i class=" icon-trash"></i>ลบ</a>
								  	<? } ?> 
								</td>		
							</tr>
			 	
		<?	 }//if($num_row != '0')
				$i++;
		  		endforeach; 
?>		
</table>