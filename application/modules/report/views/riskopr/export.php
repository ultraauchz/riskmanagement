<?php
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-type: application/vnd.ms-excel;charset:UTF-8");
$filename= "riskopr_data_".date("Y-m-d_H_i_s").".xls";
header("Content-Disposition: attachment; filename=".$filename);
print "\n"; // Add a line, unless excel error..
?>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<style>
#print label { display:inline-block; text-align:left; border-bottom:1px dashed #333; padding:2px 10px; overflow:hidden; margin-bottom: 0px;}
#print div { margin-bottom:10px; }
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
<? 	foreach ($result as $item_h) { ?>
<div align="right">เอกสารหมายเลข 4</div>
<div align="center">
	<B>ชื่อหน่วยงาน/ส่วนงาน <label><?=$item_h['section_title'];?></label> <br />
	รายงานการวิเคราะห์เหตุการณ์ความเสี่ยงและการประเมินความเสี่ยง <br />
	ประจำปีงบประมาณ   <?=$item_h['year_data'];?>
	</B><br />
</div><br />
<table style="font-size:13px">
	<tr>
		<td><b>วัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย</b> </td>
		<td> : <label><?=$item_h['objective_title1'];?></label></td>
	</tr>
	<tr>
		<td><b>วัตถุประสงค์ตามยุทธศาสตร์ของหน่วยงาน/ส่วนงาน  </b></td>
		<td> : <label><?=$item_h['objective_title2'];?></label></td>
	</tr>
	<tr>
		<td><b>วัตถุประสงค์ตามยุทธศาสตร์ของงาน </b></td>
		<td> : <label><?=$item_h['objective_3'];?></label></td>
	</tr>

</table>
<b>ภารกิจ </b> : <label><?=$item_h['mission_title'];?></label> <br />
<b>กระบวนงาน</b> : <label><?=$item_h['process'];?></label> <br /><br />
<table class="table" width="100%" cellpadding="0">
	<tr>
		<td rowspan="3" align="center" width="100px"><b>เหตุการณ์ความเสี่ยง<b/></td>
		<td rowspan="3" align="center" width="250px"><b>ตัวชี้วัดความเสี่ยง ( Key Risk Indicators : KRI )<b/></td>
		<td rowspan="3" align="center" width="100px"><b>กิจกรรมดำเนินงาน<b/></td>
		<td rowspan="3" align="center" width="50px"><b>แผน/ผล<b/></td>
		<td colspan="12"align="center"><b>ระยะเวลาการดำเนินการ<b/></td>
		<td colspan="3"  align="center" width="50px"><b>ก่อนวางแผน<b/></td>
		<td colspan="3" align="center" width="50px"><b>หลังวางแผน<b/></td>
		<td rowspan="3" align="center"><b>ผลลัพธ์ที่ได้(Outcome)<b/></td>

		 
	</tr>
	<tr>
		<td align="center" rowspan="1" colspan="3"><b>ไตรมาสที่ 1</b></td>
		<td align="center" rowspan="1" colspan="3"><b>ไตรมาสที่ 2</b></td>
		<td align="center" rowspan="1" colspan="3"><b>ไตรมาสที่ 3</b></td>
		<td align="center" rowspan="1" colspan="3"><b>ไตรมาสที่ 4</b></td>
		
		<td align="center" rowspan="2" ><b>โอกาสเกิด</b></td>
		<td align="center" rowspan="2" ><b>ผลกระทบ</b></td>
		<td align="center" rowspan="2" ><b>ระดับความเสี่ยง</b></td>
		<td align="center" rowspan="2" ><b>โอกาสเกิด</b></td>
		<td align="center" rowspan="2" ><b>ผลกระทบ</b></td>
		<td align="center" rowspan="2" ><b>ระดับความเสี่ยง</b></td>
	</tr>
	<?
	$months = array(10 => 0, 11 => 0, 12 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0);
	$month_th = array( 1 =>'ม.ค.',2 => 'ก.พ.',3=>'มี.ค.',4=>'เม.ย.',5=>'พ.ค.',6=>'มิ.ย.',7=>'ก.ค.',8=>'ส.ค.',9=>'ก.ย.',10=>'ต.ค.',11=>'พ.ย.',12=>'ธ.ค.');
	$head = $months;
	?>
	<tr>
		<?php foreach($head as $key => $item): ?>
		<td style="width:35px;text-align:center;"><?php echo $month_th[$key]; ?></td>
		<?php endforeach; ?>
	</tr>
	<? 
	
	 			 $section = $item_h['sectionid'] ;
				 $objectiveid_1 = $item_h['objectiveid_1']; 
				 $objectiveid_2 = $item_h['objectiveid_2']; 
				 $objective_3  =  $item_h['objective_3'];
				 $missionid =  $item_h['missionid'];
				 $process =  $item_h['process'];
				 $condition = " risk_est_head.sectionid = '".$section."' AND risk_est_head.objectiveid_1 = '".$objectiveid_1."' AND risk_est_head.objectiveid_2 = '".$objectiveid_2."' AND risk_est_head.objective_3 = '".$objective_3."'
						  AND missionid = '".$missionid."' AND risk_est_head.process = '".$process."'";
			$select = 'risk_opr.* , risk_est.event_risk ';
			//$this->db->debug = true;
		$event_risk = '';
		$result_all = $this->risk_opr->select($select)->where($condition)->order_by('risk_est_head.objectiveid_1', 'asc' , 'risk_est_head.objectiveid_2', 'asc' ,'risk_est_head.objective_3', 'asc' , 'risk_est_head.missionid' ,'asc' , 'risk_est_head.process', 'asc')->get('','FALSE');		
		//$num_row_all = count($result_all)*2;
		foreach ($result_all as $key_result =>$result) {

	 ?>	
	<tr>
		<? 
			if($result['event_risk'] != $event_risk){
			//$nrow = $this->risk_control->select('count(*)')->where('risk_est_id='.@$result['id'])->get_one();
			
			$event_risk = $result['event_risk'];
			//$this->db->debug = true;
			$condition_1 = $condition." AND risk_est.event_risk = '".$event_risk."' ";
			$nrow = $this->risk_opr->select($select)->where($condition_1)->get('','FALSE');		
			$num_row_all = count($nrow)*2;
			$condition_1 = '';
			
		?>
		<td rowspan="<?=$num_row_all?>" valign="top"><?=@$result['event_risk'];?></td>
		<td rowspan="<?=$num_row_all?>" valign="top">
		 <?	$risk_kri = $this->risk_kri->where('risk_est_id='.@$result['risk_est_id'])->get();
		 $i = 1;
	      	foreach ($risk_kri as $kri) { ?>
			<?=$i?>. <?=$kri['kri_risk'];?> จำนวน : <?=$kri['kri_risk_count']?> <?=$kri['kri_risk_unit']?> <br / >
			
		<? $i++; } ?>		
		</td>
		<? } ?>			
			<td rowspan="2" valign="top"><?=$result['event_risk_opr'];?></td>
			<td height="50px">แผน</td>
			<? if($quarter == '' || $quarter == 1){
					$i = 1;
					$max = 4;
				}elseif($quarter == 2 ){
					$i =1;
					$max=2;
				}elseif($quarter == 3){
					$i =3;
					$max=4;
				}
			
			$months = array(10 => 0, 11 => 0, 12 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0);
			for($i;$i<=$max;$i++){
				
				if(@$result['plot_start_date'.$i] > 0 &&  @$result['plot_end_date'.$i] > 0){				
					get_line_months($months, @$result['plot_start_date'.$i], @$result['plot_end_date'.$i]);		
				}
			} ?>
			<?php 
				foreach($months as $key_m => $value): 
					$line = set_line($months, $key_m, $value);
			?>	
				<td style="height:60px;padding:0px;">
					<?php switch($line){
						case 'left':
							echo '<img src="'.base_url().'media/images/cursor_report_left.png" width="30">';
						break;
						case 'next':
							echo '<img src="'.base_url().'media/images/cursor_report_right.png" width="30">';
						break;
						case 'end':
							echo '<img src="'.base_url().'media/images/cursor_report_end.png" width="30">';
						break;
						case 'line':
							echo '<img src="'.base_url().'media/images/cursor_report_line.png"  width="30">';
						break;
						default:
							echo '&nbsp;';
						break;
					}
					?>
				</td>
			<?php 
					$line = '';
					$value = '';
				  endforeach; 
			?>
			<td><div align="center"><?=@$result['before_risk_chance']?></div></td>
			<td><div align="center"><?=@$result['before_risk_effect']?></div></td>
			<td><div align="center"><?=@$result['before_risk_step']?></div></td>
			<td><div align="center"><?=@$result['after_risk_chance']?></div></td>
			<td><div align="center"><?=@$result['after_risk_effect']?></div></td>
			<td><div align="center"><?=@$result['after_risk_step']?></div></td>
			<td rowspan="2">
				<? 
				for($i=1;$i<=4;$i++){
					if(@$result['result'.$i] != ''){
						echo $result['result'.$i]."<br />";
					}
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
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<? } ?>
</table>
<br /><br />
<table>
	<tr>
		<td colspan="21" align="right">ลายมือชื่อผู้อนุมัติแผน</td>
		<td colspan="2"></td>
	</tr>
	<tr>
		<td colspan="21" align="right"></td>
		<td align="left" style="width:30px;">(</td>
		<td align="right">)</td>
	</tr>
	<tr>
		<td colspan="21" align="right"></td>
		<td colspan="2" align="center">ตำแหน่ง คณบดีคณะสาธารณสุขศาสตร์</td>
	</tr>
	<tr>
		<td colspan="21" align="right"></td>
		<td colspan="2" align="center">วันที่ 30 เดือน กันยายน พ.ศ. <?=$_GET['year_data'];?></td>
	</tr>
	
</table>
<br />
<? } ?>
</div>
</body>
</html>