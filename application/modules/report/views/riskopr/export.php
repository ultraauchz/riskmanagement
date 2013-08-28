<?php
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-type: application/vnd.ms-excel;charset:UTF-8");
header("Content-Disposition: attachment; filename=filename.xls");
print "\n"; // Add a line, unless excel error..
?>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<style>
#print label {
    border-bottom: 1px dashed #333333;
    display: inline-block;
    overflow: hidden;
    padding: 2px 10px;
    text-align: left;
}
body{
	font-size:11px;
}
.table{
	font-size:11px;
	 solid #000000;
	border-collapse: collapse;
	}
.table td{
	border: 1px solid #000000;
	padding:0.2em;
}
.table th{
	border: 1px solid #000000;
	background-color:#000000;
	font-weight : bold;
	text-align : center;
	padding : 0.2em;
}
</style>
<style>
	.cursor a{height:40px;display:block;}
	#left{left:0px;width:40px;}
	#left {background: url('../../../media/images/cursor.png') 0 -40px;}
	
	#center{left:0px;width:40px;}
	#center {background: url('../../../media/images/cursor.png') -41px -40px;}
	
	#next{left:0px;width:40px;text-align:left;}
	#next {background: url('../../../media/images/cursor.png') -81px -40px;text-align:left;}
	
	#end{left:0px;width:40px;text-align:center;}
	#end {background: url('../../../media/images/cursor_end_2.png');}
	
	#line{left:0px;width:40px;text-align:center;}
	#line {background: url('../../../media/images/cursor.png')-41px -40px;text-align:left;}
	
	#none{display:none;}
</style>
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
<table class="table" width="100%" cellpadding="0">
	<tr>
		<td rowspan="3" align="center" width="100px"><b>เหตุการณ์ความเสี่ยง<b/></td>
		<td rowspan="3" align="center" width="250px"><b>ตัวชี้วัดความเสี่ยง ( Key Risk Indicators : KRI )<b/></td>
		<td rowspan="3" align="center" width="100px"><b>กิจกรรมดำเนินงาน<b/></td>
		<td rowspan="3" align="center" width="50px"><b>แผน/ผล<b/></td>
		<td colspan="12"align="center"><b>ระยะเวลาการดำเนินการ<b/></td>
		<td rowspan="3" align="center"><b>ผลลัพธ์ที่ได้(Outcome)<b/></td>

		 
	</tr>
	<tr>
		<td align="center" rowspan="1" colspan="3"><b>ไตรมาสที่ 1</b></td>
		<td align="center" rowspan="1" colspan="3"><b>ไตรมาสที่ 2</b></td>
		<td align="center" rowspan="1" colspan="3"><b>ไตรมาสที่ 3</b></td>
		<td align="center" rowspan="1" colspan="3"><b>ไตรมาสที่ 4</b></td>
	</tr>
	<?
	$months = array(10 => 0, 11 => 0, 12 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0);
	$month_th = array( 1 =>'ม.ค.',2 => 'ก.พ.',3=>'มี.ค.',4=>'เม.ย',5=>'พ.ค.',6=>'มิ.ย',7=>'ก.ค.',8=>'ส.ค.',9=>'ก.ย.',10=>'ต.ค.',11=>'พ.ย.',12=>'ธ.ค.');
	$head = $months;
	?>
	<tr>
		<?php foreach($head as $key => $item): ?>
		<td style="width:35px;text-align:center;"><?php echo $month_th[$key]; ?></td>
		<?php endforeach; ?>
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
			<? for($i=1;$i<=4;$i++){
				if($result['plot_start_date'.$i] > 0 &&  $result['plot_end_date'.$i] > 0){
					get_line_months($months, $result['plot_start_date'.$i], $result['plot_end_date'.$i]);					
				}
			} ?>
			<?php foreach($months as $key => $value): ?>
				<td style="height:60px;padding:0px;">
					<?php switch(set_line($months, $key, $value)){
						case 'left':
							echo '<img src="http://localhost:7000/riskmanagement/media/images/cursor_report_left.png">';
						break;
						case 'next':
							echo '<img src="http://localhost:7000/riskmanagement/media/images/cursor_report_right.png">';
						break;
						case 'end':
							echo '<img src="http://localhost:7000/riskmanagement/media/images/cursor_report_end.png">';
						break;
						case 'line':
							echo '<img src="http://localhost:7000/riskmanagement/media/images/cursor_report_line.png">';
						break;
						default:
							echo '&nbsp;';
						break;
					}
					?>
				</td>
			<?php endforeach; ?>
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
<br /><br />

		<div align="right">
			<div style="padding-left:45%;">ลายมือชื่อผู้อนุมัติแผน<label style="width:40%; text-align:center;">&nbsp</label></div>
			<div style="padding-left:45%;">(<label style="width:40%; text-align:center;">&nbsp</label>)</div>
			<div style="padding-left:45%;">ตำแหน่ง <label style="width:40%; text-align:center;">คณบดีคณะสาธารณสุขศาสตร์</label></div>
			<div style="padding-left:45%;">วันที่<label style="width:7%; text-align:center;">&nbsp</label>เดือน<label style="width:10%; text-align:center;">กันยายน</label>พ.ศ. <label style="width:10%; text-align:center;"><?=$result['year_data'];?></label></div>
		</div>
</div>
<script>window.print();</script>
</body>
</html>