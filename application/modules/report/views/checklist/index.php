<style>
#print label {
    border-bottom: 1px dashed #333333;
    display: inline-block;
    overflow: hidden;
    padding: 2px 10px;
    text-align: left;
}</style>
<h3>รายงานการประเมินองค์ประกอบของการควบคุมภายใน</h3>
<form enctype="multipart/form-data" method="get">
<div id="search">
  <div id="searchBox">
		<h4>ค้นหา</h4>
		<? if(permission($menu_id, 'can_access_all')=='on'){ ?>
			<?=form_dropdown('year_data',get_year_option(),@$_GET['year_data'],'','แสดงทุกปี');?>
			<?=form_dropdown('sectionid',get_option('id','title','section order by section_type_id asc, title asc'),@$_GET['sectionid'],'style="width:370px"','แสดงภาควิชา/งานทั้งหมด');?>
		<? }else{ ?>	
			<?=form_dropdown('year_data',get_year_option(),@$_GET['year_data'],'','แสดงทุกปี');?>
			<?=form_dropdown('sectionid',get_option('id','title','section where id = "'.@$result1['id'].'" order by title '),@$rs['sectionid'],'style="width:370px"');?>
		<? } ?>	
		<input type="submit" class="btn_search" value=" " title="ค้นหา" id="button9" name="button9"></div>
  </div>
</div>
</form>
<? if(@$_GET['year_data'] >0 && @$_GET['sectionid']>0 ) {
	if(@$result['id'] != ''){?>
<div style="padding:10px; text-align:right;">
<a href="report/checklist/index/export<?=GetCurrentUrlGetParameter();?>"><img src="themes/front/images/excel.png" width="32" height="32" style="margin-bottom:-6px" class="vtip" title="ส่งออกข้อมูล"></a>
<a href="report/checklist/index/print<?=GetCurrentUrlGetParameter();?>" target="_blank"><img src="themes/front/images/print.png" width="32" height="32" style="margin:0 20px -5px 10px;" class="vtip" title="พิมพ์ข้อมูล"></a></div>
<br />		
<div id="print">
<div align="center">
	<B>ศูนย์บริหารจัดการความเสี่ยง มหาวิทยาลัยมหิดล <br />
	แบบ Checklist การประเมินองค์ประกอบของการควบคุมภายใน <br />
	ภาควิชา/งาน  <?=$result['section_title'];?>
	</B><br />

	แบบ Checklist ใช้สำหรับประเมินความเพียงพอเหมาะสมของระบบการควบคุมภายในที่มหาวิทยาลัยและส่วนงานได้ออกแบบ <br />
	ไว้ตามองค์ประกอบ 5 ด้านของระเบียบคณะกรรมการตรวจเงินแผ่นดินว่าด้วยการกำหนดมาตรฐานการควบคุมภายใน พ.ศ. <?=$result['year_data']?>
</div><br />

<? 
	if($result['year_data'] != ''){
		$i = 1;
		$num = 1;
		$id = $result['id'];
		$year_data = $result['year_data'];
	$main_title = $this->est_title->where('pid=0 and year_data = (select max(year_data) from est_title where year_data <='.$year_data.' )')->get(false,true);
	foreach($main_title as $main_item):?>
	<fieldset>
		<table class="table table-form table-bordered table-striped table-horizontal">
			<tr>
		 		<td colspan="2" style="text-align:center;">รายการประเมิน</td>
		 		<td style="width:60px;text-align:center;">มี</td>
		 		<td style="width:60px;text-align:center;">ไม่มี</td>
		 	</tr>
		 	<tr>
				<td colspan="4"><?=$num. " ." . $main_item['title']; ?></td>
			</tr>
		<? 
			$second_title = $this->est_title->where('pid='.$main_item['id'])->get();
			$num_second = 1 ;
			foreach($second_title as $second_item):			
		?>
			
			
			<? 
				 $nrow = $this->est_title->select('count(*)')->where('pid='.$second_item['id'])->get_one();
				$third_title = $this->est_title->where('pid='.$second_item['id'])->get();
				$check_id = 0;
				$num_third = 1 ;
				foreach($third_title as $third_item):			
			?>
				<tr>
					<?
						if($check_id!= $third_item['pid']){
							$check_id = $third_item['pid'];
					?>
					<td style="width:250px;" rowspan="<?=$nrow;?>"><?="$num.$num_second ".$second_item['title'];?></td>
					<?
						}
					@$check_detail = $this->est_detail->where('pid='.$id.' AND est_title_id ='.$third_item['id'])->get_row();
					
					$i++
					?>
					<td class="third_title" >
						<?="$num.$num_second.$num_third " .$third_item['title'];?>
						
					</td>
					<td style="width:60px;text-align:center;">
						<input type="hidden" name="est_title_id[<?=$i?>]" value="<?=$third_item['id'];?>">
						<input type="hidden" name="detail_id[<?=$i?>]" value="<?=@$check_detail['id'];?>">
						<? if(@$check_detail['check_value'] == '1'){ ?>
						X
						<? } ?>
					</td>
					<td style="width:60px;text-align:center;">
						<? if(@$check_detail['check_value'] == '0'){ ?> 
						X
						<? } ?>				
					</td>
				</tr>
			<? $num_third ++;
			endforeach;?>
		<?  $num_second++;
		endforeach;
		$num++;
		?>
		</table>
		</fieldset>
	<? endforeach; ?>
	    <br />

			<input type="hidden" name="num_i" value="<?=@$i;?>">
		<div align="right">
			<div style="padding-left:30%;">ลงชื่อผู้ประเมิน<label style="width:25%; text-align:center;">&nbsp</label></div>
			<div style="padding-left:30%;">(<label style="width:25%; text-align:center;"><?=$result['est_name'];?></label>)</div>
			<?
					$est_date = explode('-',@$result['est_date']);
					@$result['est_date'] = $est_date[2]."/".$est_date[1]."/".$est_date[0];
			?>
			<div style="padding-left:30%;">วันที่<label style="width:25%; text-align:center;"><?=$result['est_date'];?></label></div>
		</div>
</div>
	<? }
	 }else{?>
	<div align="center" style="margin:0 auto;width:90%;height:30px;vertical-align:middle;text-align:middle;background:#FFFCCC;">ไม่พบข้อมูลที่ค้นหา</div>	
	 <? }
}else{ ?>
	<div align="center" style="margin:0 auto;width:90%;height:30px;vertical-align:middle;text-align:middle;background:#FFFCCC;">กรุณาเลือกปีงบประมาณ และ ภาควิชา/งาน</div>
	<? } ?>

	
