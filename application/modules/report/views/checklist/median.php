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
<? if(@$_GET['year_data'] >0 ) {
	if(@$result['id'] != ''){?>
<div style="padding:10px; text-align:right;">
<a href="report/checklist/index/export<?=GetCurrentUrlGetParameter();?>"><img src="themes/front/images/excel.png" width="32" height="32" style="margin-bottom:-6px" class="vtip" title="ส่งออกข้อมูล"></a>
<a href="report/checklist/index/print<?=GetCurrentUrlGetParameter();?>" target="_blank"><img src="themes/front/images/print.png" width="32" height="32" style="margin:0 20px -5px 10px;" class="vtip" title="พิมพ์ข้อมูล"></a></div>
<br />		
<div id="print">
<div align="center">
	<B>ศูนย์บริหารจัดการความเสี่ยง มหาวิทยาลัยมหิดล <br />
	แบบ Checklist การประเมินองค์ประกอบของการควบคุมภายใน (ค่าเฉลี่ย) <br />
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
		 		<td style="width:60px;text-align:center;">ค่าเฉลี่ย (มี)</td>
		 	</tr>
		 	<tr>
				<td colspan="5"><?=$num. " ." . $main_item['title']; ?></td>
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
					@$check_detail_ok = $this->est_detail->select('count(*)')->where('check_value= 1 AND est_title_id ='.$third_item['id'] )->get_one();
					@$check_detail_on = $this->est_detail->select('count(*)')->where('check_value= 0 ANd est_title_id ='.$third_item['id'])->get_one();
					$i++
					?>
					<td class="third_title" >
						<?="$num.$num_second.$num_third " .$third_item['title'];?>
						
					</td>
					<td style="width:60px;text-align:center;">
						<?=$check_detail_ok?>
					</td>
					<td style="width:60px;text-align:center;">
						<?=$check_detail_on?>				
					</td>
					<td style="width:60px;text-align:center;">
						<?=$median = $check_detail_ok / ($check_detail_on+$check_detail_ok)?>				
					</td>
					<?
						@$total_check_detail_ok = @$total_check_detail_ok+$check_detail_ok;
						@$total_check_detail_on = @$total_check_detail_on+$check_detail_on;
					?>
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
		<table class="table table-form table-bordered table-striped table-horizontal">
		<tr>
			<td colspan="5" style="text-align: center">สรุป</td>
			<td style="width:60px;text-align:center;"><?=$total_check_detail_ok?></td>
			<td style="width:60px;text-align:center;"><?=$total_check_detail_on?></td>
			<td style="width:60px;text-align:center;"><?=$tatal_median=$total_check_detail_ok/($total_check_detail_ok+$total_check_detail_on)?></td>
		</tr>
		</table>
			<input type="hidden" name="num_i" value="<?=@$i;?>">
</div>
	<? }
	 }else{?>
	<div align="center" style="margin:0 auto;width:90%;height:30px;vertical-align:middle;text-align:middle;background:#FFFCCC;">ไม่พบข้อมูลที่ค้นหา</div>	
	 <? }
}else{ ?>
	<div align="center" style="margin:0 auto;width:90%;height:30px;vertical-align:middle;text-align:middle;background:#FFFCCC;">กรุณาเลือกปีงบประมาณ และ ภาควิชา/งาน</div>
	<? } ?>

	
