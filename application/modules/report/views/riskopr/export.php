<html>
    <head>
<?php
header('Content-type:application/xls');
$filename= "riskest04_data_".date("Y-m-d_H_i_s").".xls";
header("Content-Disposition: attachment; filename=".$filename);
?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
<body>
<div id="print">
<div align="right">เอกสารหมายเลข 4</div>
<div align="center">
	<B>ชื่อหน่วยงาน/ส่วนงาน <label><?=$result['section_title'];?></label> <br />
	รายงานการวิเคราะห์เหตุการณ์ความเสี่ยงและการประเมินความเสี่ยง <br />
	ประจำปีงบประมาณ   <?=$result['year_data'];?>
	</B><br />
</div><br />
<table style="font-size:13px">
	<tr>
		<td><b>วัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย</b> </td>
		<td> : <label><?=$result['objective_title1'];?></label></td>
	</tr>
	<tr>
		<td><b>วัตถุประสงค์ตามยุทธศาสตร์ของหน่วยงาน/ส่วนงาน  </b></td>
		<td> : <label><?=$result['objective_title2'];?></label></td>
	</tr>
	<tr>
		<td><b>วัตถุประสงค์ตามยุทธศาสตร์ของงาน </b></td>
		<td> : <label><?=$result['objective_title3'];?></label></td>
	</tr>

</table>
<b>ภารกิจ </b> : <label><?=$result['mission_title'];?></label> <br />
<b>กระบวนงาน</b> : <label><?=$result['process_title'];?></label> <br /><br />
<table border="1">
	<tr>
		<td rowspan="3" align="center" width="150px"><b>เหตุการณ์ความเสี่ยง<b/></td>
		<td rowspan="3" align="center" width="250px"><b>ตัวชี้วัดความเสี่ยง ( Key Risk Indicators : KRI )<b/></td>
		<td rowspan="3" align="center" width="200px"><b>กิจกรรมดำเนินงาน<b/></td>
		<td rowspan="3" align="center" width="50px"><b>แผน/ผล<b/></td>
		<td colspan="12" align="center"><b>ระยะเวลาการดำเนินการ<b/></td>
		<td rowspan="3" align="center"><b>ผลลัพธ์ที่ได้(Outcome)<b/></td>

		 
	</tr>
	<tr>
		<td align="center" rowspan="1" colspan="3"><b>ไตรมาสที่ 1</b></td>
		<td align="center" rowspan="1" colspan="3"><b>ไตรมาสที่ 2</b></td>
		<td align="center" rowspan="1" colspan="3"><b>ไตรมาสที่ 3</b></td>
		<td align="center" rowspan="1" colspan="3"><b>ไตรมาสที่ 4</b></td>
	</tr>
	<tr>
		<td align="center" width="30px"><b>ต.ค.</b></td>
		<td align="center" width="30px"><b>พ.ย.</b></td>
		<td align="center" width="30px"><b>ธ.ค.</b></td>
		<td align="center" width="30px"><b>ม.ค.</b></td>
		<td align="center" width="30px"><b>ก.พ.</b></td>
		<td align="center" width="30px"><b>มี.ค.</b></td>
		<td align="center" width="30px"><b>เม.ย.</b></td>
		<td align="center" width="30px"><b>พ.ค.</b></td>
		<td align="center" width="30px"><b>มิ.ย.</b></td>
		<td align="center" width="30px"><b>ก.ค.</b></td>
		<td align="center" width="30px"><b>ส.ค.</b></td>
		<td align="center" width="30px"><b>ก.ย.</b></td>
	</tr>
	
	<tr>
		
		<? $nrow = $this->risk_control->select('count(*)')->where('risk_est_id='.@$result['id'])->get_one(); ?>
		<td rowspan="2"><?=$result['event_risk'];?></td>
		<td rowspan="2">
		 <?	$risk_kri = $this->risk_kri->where('risk_est_id='.@$result_est['id'])->get();
		 $i = 1;
	      	foreach ($risk_kri as $kri) { ?>
			<?=$i?>. ตัวชี้วัดความเสี่ยง : <?=$kri['kri_risk'];?> จำนวน : <?=$kri['kri_risk_count']?> หน่วยนับ : <?=$kri['kri_risk_unit']?> <br / >
			
		<? $i++; } ?>		
		</td>
			<td rowspan="2"><?=$result['manage_risk'];?></td>
			<td height="50px">แผน</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td rowspan="2">
				<? 
				for($i=1;$i<=4;$i++){
					echo $result['result'.$i]."<br />";
				}
				?>
			</td>
		</tr>
		<tr>
			<td>ผล</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
</table>
<br />
<table>
	<tr>
		<td colspan="15" align="right">ลายมือชื่อผู้อนุมัติแผน</td>
		<td colspan="2"></td>
	</tr>
	<tr>
		<td colspan="15" align="right"></td>
		<td align="left">(</td>
		<td align="right">)</td>
	</tr>
	<tr>
		<td colspan="15" align="right"></td>
		<td colspan="2" align="center">ตำแหน่ง คณบดีคณะสาธารณสุขศาสตร์</td>
	</tr>
	<tr>
		<td colspan="15" align="right"></td>
		<td colspan="2" align="center">วันที่..........เดือน กันยายน พ.ศ. <?=$result['year_data'];?></td>
	</tr>
	
</table>
</div>
	</body>
</html>