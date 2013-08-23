<html>
    <head>
<?php
header('Content-type:application/xls');
$filename= "checklisk_data_".date("Y-m-d_H_i_s").".xls";
header("Content-Disposition: attachment; filename=".$filename);
?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
<body>
<table width="100%">
	<tr>
		<td colspan="6" align="center"><B>ศูนย์บริหารจัดการความเสี่ยง มหาวิทยาลัยมหิดล </B></td>
	</tr>
	<tr>
		<td colspan="6" align="center"><B>แบบ Checklist การประเมินองค์ประกอบของการควบคุมภายใน </B></td>
	</tr>
	<tr>
		<td colspan="6" align="center"><B>ภาควิชา/งาน  <?=$result['section_title'];?></B></td>
	</tr>
	<tr>
		<td colspan="6" align="center">แบบ Checklist ใช้สำหรับประเมินความเพียงพอเหมาะสมของระบบการควบคุมภายในที่มหาวิทยาลัยและส่วนงานได้ออกแบบ</td>
	</tr>
	<tr>
		<td colspan="6" align="center">ไว้ตามองค์ประกอบ 5 ด้านของระเบียบคณะกรรมการตรวจเงินแผ่นดินว่าด้วยการกำหนดมาตรฐานการควบคุมภายใน พ.ศ. <?=$result['year_data']?></td>
	</tr>
</table><br />
<?
		$i = 1;
		$num = 1;
		$id = $result['id'];
		$year_data = $result['year_data'];
	$main_title = $this->est_title->where('pid=0 and year_data = (select max(year_data) from est_title where year_data <='.$year_data.' )')->get(false,true);
	foreach($main_title as $main_item):?>
		<table border="1" width="100%">
			<tr>
		 		<td colspan="2" style="width:500px;text-align:center;">รายการประเมิน</td>
		 		<td colspan="2" style="width:50px;text-align:center;">มี</td>
		 		<td colspan="2" style="width:50px;text-align:center;">ไม่มี</td>
		 	</tr>
		 	<tr>
				<td colspan="6"><?=$num. ". " . $main_item['title'];?></td>
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
					<td valign="top" rowspan="<?=$nrow;?>"><?="$num.$num_second " .$second_item['title'];?></td>
					<? 
						}
					@$check_detail = $this->est_detail->where('pid='.$id.' AND est_title_id ='.$third_item['id'])->get_row();				
					?>
					<td class="third_title" >
						<?="$num.$num_second.$num_third " .$third_item['title'];?>					
					</td>
					<td colspan="2" style="width:70px;text-align:center;">
						<? if(@$check_detail['check_value'] == '1'){ ?>
						X
						<? } ?>
					</td>
					<td colspan="2" style="width:70px;text-align:center;">
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
		<table width="100%">
			<tr>
				<td></td>
				<td align="right">ลงชื่อผู้ประเมิน</td>
				<td colspan="4"></td>
			</tr>
			<tr>
				<td colspan="2"></td>
				<td colspan="4" align="center">(  <?=$result['est_name'];?>  )</td>
			</tr>
			<?
					$est_date = explode('-',@$result['est_date']);
					@$result['est_date'] = $est_date[2]." / ".$est_date[1]." / ".$est_date[0];
			?>
			<tr>
				<td></td>
				<td align="right">วันที่</td>
				<td colspan="4" align="center"><?=$result['est_date'];?></td>
			</tr>
		</table>
	</body>
</html>
