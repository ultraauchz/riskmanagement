<h3>รายงานการวิเคราะห์เหตุการณ์ความเสี่ยงและการประเมินความเสี่ยง</h3>
<form enctype="multipart/form-data" method="get">
<div id="search">
  <div id="searchBox">
		<? if(@$rs['permis']=='on'){ ?>
			<?=form_dropdown('year_data',get_year_option(),@$_GET['year_data'],'','แสดงทุกปี');?>
			<?=form_dropdown('section_id',get_option('id','title','section order by section_type_id asc, title asc '),@$_GET['section_id'],'style="width:370px"','แสดงภาควิชา/งานทั้งหมด');?>
		<? }else{ ?>	
			<?=form_dropdown('year_data',get_year_option(),@$_GET['year_data'],'','แสดงทุกปี');?>
			<?=form_dropdown('section_id',get_option('id','title','section where id = "'.@$result1['id'].'" order by section_type_id asc, title asc  '),@$_GET['section_id'],'style="width:370px"');?>
		<? } ?>	
		<input type="submit" class="btn_search" value=" " title="ค้นหา" id="button9" name="button9"></div>
  </div>
</div>
</form>
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
		<th style="width: 250px">หน่วยงาน</th>
		<th style="width: 50px">รายงาน</th>
	</tr>
	<?php 
		  $rowStyle = '';
		  $page = (isset($_GET['page']))? $_GET['page']:1;
		  $i=(isset($_GET['page']))? (($_GET['page'] -1)* 12)+1:1;
		  foreach($result as $row):
			$condition_level = " risk_remain_1_val = ".$row['remain_risk_1'] . " AND risk_remain_2_val = ".$row['remain_risk_2'];
			$level = $this->risk_level->where($condition_level)->get_row();
		?>  	
	<tr>
		<td style="text-align:center;width:30px;" ><?=$i;?></td>
		<td ><?=$row['event_risk'];?></td>
		<td align="left" width="5%" style="background:<?=$level['level_color']?>;text-align:center;font-weight:bold;"><?=$level['level_desc']?></td>
		<td align="left" width="5%" style="text-align:center;"><?=$row['year_data']?></td>
		<td align="left" width="15%" ><?=$row['mission_title']?></td>
		<td align="left"  ><?=$row['section_title']?></td>
		<td><div align="center"><a href="<?=$urlpage;?>/index/index_view/?id=<?=@$row['id'];?>&sectionid=<?=$row['sectionid']?>" title="Edit" class="btn btn-primary">รายงาน</a></div></td>
	</tr>
	<? 
				$i++;
		  		endforeach; 
?>		
</table>