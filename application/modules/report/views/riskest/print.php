<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="themes/front/css/style.css"/>
<style>
#print label {
    border-bottom: 1px dashed #333333;
    display: inline-block;
    overflow: hidden;
    padding: 2px 10px;
    text-align: left;
}
body{
	font-size:13px;
}
.table{
	font-size:13px;
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
	</head>
<body>
<div id="print">
<div align="right">เอกสารหมายเลข 3</div>
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
<table class="table" width="100%">
	<tr>
		<td rowspan="2" style="text-align: center"><b>เหตุการณ์ความเสี่ยง<b/></td>
		<td rowspan="2" style="text-align: center"><b>สาเหตุ<b/></td>
		<td rowspan="2" style="text-align: center"><b>ตัวชี้วัดความเสี่ยง ( Key Risk Indicators : KRI )<b/></td>
		<td rowspan="2" style="text-align: center"><b>การควบคุมที่มีอยู่<b/></td>
		<td rowspan="2" style="text-align: center"><b>การประเมินการควบคุมที่มีอยู่<b/></td>
		<td colspan="3" style="text-align: center"><b>ความเสี่ยงที่เหลืออยู่<b/></td>
		<td rowspan="2" style="text-align: center"><b>แนวทางการจัดการ<b/></td>
		<td rowspan="2" style="text-align: center"><b>ผู้รับผิดชอบ<b/></td>
		<td rowspan="2" style="text-align: center"><b>ช่วงเวลาดำเนินการและกำหนดเสร็จ<b/></td>
		 
	</tr>
	<tr>
		<td style="text-align: center"><b>ระดับโอกาสเกิด</b></td>
		<td style="text-align: center"><b>ระดับผลกระทบ</b></td>
		<td style="text-align: center"><b>ระดับความเสี่ยงที่เหลืออยู่</b></td>
	</tr>
	
	<tr>
		
		<? $nrow = $this->risk_control->select('count(*)')->where('risk_est_id='.@$result['id'])->get_one(); ?>
		<td rowspan="<?=$nrow?>"><?=$result['event_risk'];?></td>
		<td rowspan="<?=$nrow?>">
			ปัจจัยภายใน : <?=$result['cause_in_risk'];?> <br / >
			ปัจจัยภายนอก : <?=$result['cause_out_risk'];?>						
		</td>
		<td rowspan="<?=$nrow?>">
		 <?	$risk_kri = $this->risk_kri->where('risk_est_id='.@$result['id'])->get();
		 $i = 1;
	      	foreach ($risk_kri as $kri) { ?>
			<?=$i?>. ตัวชี้วัดความเสี่ยง : <?=$kri['kri_risk'];?> จำนวน : <?=$kri['kri_risk_count']?> หน่วยนับ : <?=$kri['kri_risk_unit']?> <br / >
			
		<? $i++; } ?>		
		</td>
		<?  $i =1 ;
			$control_risk = $this->risk_control->where('risk_est_id='.@$result['id'])->get();
	      	foreach ($control_risk as $com_risk) { ?>
		<? if($i != 1 ) {?> <tr> <? } ?>
		<td height="40px"><?=$com_risk['control_risk']?></td>
		<td height="40px"><?=$com_risk['estimate_control_risk']?></td>
		<? if($i==1){ ?>
		<td style="text-align: center" rowspan="<?=$nrow?>"><?=$result['remain_risk_1'];?></td>
		<td style="text-align: center" rowspan="<?=$nrow?>"><?=$result['remain_risk_2'];?></td>
		<td style="text-align: center" rowspan="<?=$nrow?>"><?=$result['remain_risk_1']*$result['remain_risk_2'];?></td>
		<td rowspan="<?=$nrow?>"><?=$result['manage_risk'];?></td>
		<td rowspan="<?=$nrow?>"><?=$result['owner_risk'];?></td>
		<? 			$start_date = explode('-',$result['start_date']);
					$result['start_date'] = $start_date[2]."/".$start_date[1]."/".$start_date[0];
					$end_date = explode('-',$result['end_date']);
					$result['end_date'] = $end_date[2]."/".$end_date[1]."/".$end_date[0]; ?>
		<td rowspan="<?=$nrow?>"><?=$result['start_date']." - ".$result['end_date'];?></td>
		<? } ?>
		<? if($i != 1 ) {?> </tr> <? } ?>
		<? $i++;} ?>
		
</table>
<br /><br />

		<div align="right">
			<div style="padding-left:45%;">ลงชื่อ<label style="width:40%; text-align:center;">&nbsp</label></div>
			<div style="padding-left:45%;">(<label style="width:40%; text-align:center;">&nbsp</label>)</div>
			<div style="padding-left:45%;">ตำแหน่ง <label style="width:40%; text-align:center;">คณบดีคณะสาธารณสุขศาสตร์</label></div>
			<div style="padding-left:45%;">วันที่<label style="width:7%; text-align:center;">&nbsp</label>เดือน<label style="width:10%; text-align:center;">กันยายน</label>พ.ศ. <label style="width:10%; text-align:center;"><?=$result['year_data'];?></label></div>
		</div>
</div>
<script>window.print();</script>
</body>
</html>
	
