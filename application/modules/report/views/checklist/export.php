<html>
    <head>
<?php
header('Content-type:application/xls');
$filename= "checklisk_data_".date("Y-m-d_H_i_s").".xls";
header("Content-Disposition: attachment; filename=".$filename);
?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
#print label {
    border-bottom: 1px dashed #333333;
    display: inline-block;
    overflow: hidden;
    padding: 2px 10px;
    text-align: left;
}
</style>
	</head>
<body>
<div align="center">
	<B>ศูนย์บริหารจัดการความเสี่ยง มหาวิทยาลัยมหิดล <br />
	แบบ Checklist การประเมินองค์ประกอบของการควบคุมภายใน <br />
	ภาควิชา/งาน  <?=$result['section_title'];?>
	</B><br />
	แบบ Checklist ใช้สำหรับประเมินความเพียงพอเหมาะสมของระบบการควบคุมภายในที่มหาวิทยาลัยและส่วนงานได้ออกแบบ <br />
	ไว้ตามองค์ประกอบ 5 ด้านของระเบียบคณะกรรมการตรวจเงินแผ่นดินว่าด้วยการกำหนดมาตรฐานการควบคุมภายใน พ.ศ. <?=$result['year_data']?>
</div><br />
<?
		$i = 1;
		$num = 1;
		$id = $result['id'];
		$year_data = $result['year_data'];
	$main_title = $this->est_title->where('pid=0 and year_data = (select max(year_data) from est_title where year_data <='.$year_data.' )')->get(false,true);
	foreach($main_title as $main_item):?>
		<table border="1" width="100%">
			<tr>
		 		<td colspan="2" style="text-align:center;">รายการประเมิน</td>
		 		<td style="width:150px;text-align:center;">มี</td>
		 		<td style="width:150px;text-align:center;">ไม่มี</td>
		 	</tr>
		 	<tr>
				<td colspan="4"><?=$num. ". " . $main_item['title'];?></td>
			</tr>
		<? 
			$second_title = $this->est_title->where('pid='.$main_item['id'])->get();
			$num_second = 1 ;
			foreach($second_title as $second_item):			
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
					<td style="width:100px;" valign="top" rowspan="<?=$nrow;?>"><?="$num.$num_second " .$second_item['title'];?></td>
					<? 
						}
					@$check_detail = $this->est_detail->where('pid='.$id.' AND est_title_id ='.$third_item['id'])->get_row();				
					?>
					<td class="third_title" >
						<?="$num.$num_second.$num_third " .$third_item['title'];?>					
					</td>
					<td style="width:70px;text-align:center;">
						<? if(@$check_detail['check_value'] == '1'){ ?>
						X
						<? } ?>
					</td>
					<td style="width:70px;text-align:center;">
						<? if(@$check_detail['check_value'] == '0'){ ?> 
						X
						<? } ?>				
					</td>
				</tr>
			<? ;
				$num_third ++;
			endforeach;?>
		<? $num_second++;
		 endforeach; 
		 $num++;?>
		</table>
	<? endforeach; ?>
	    <br />
		<div align="right" id="print">
			<div style="padding-left:700px;">ลงชื่อผู้ประเมิน<label style="width:500px; text-align:center;">&nbsp</label></div>
			<div style="padding-left:700px;">(<label style="width:500px; text-align:center;"><?=$result['est_name'];?></label>)</div>
			<?
					$est_date = explode('-',@$result['est_date']);
					@$result['est_date'] = $est_date[2]."/".$est_date[1]."/".$est_date[0];
			?>
			<div style="padding-left:700px;">วันที่<label style="width:500px; text-align:center;"><?=$result['est_date'];?></label></div>
		</div>
	</body>
</html>
