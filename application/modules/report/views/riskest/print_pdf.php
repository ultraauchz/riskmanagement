<? 
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
	}
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 048');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '5', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, '10', '5');
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 5);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

$pdf->SetFont('angsanaupc', 'B', 18);
$pdf->SetFont('angsanaupc', '', 14);

ob_start();
foreach ($result as $item) {
$pdf->AddPage('L', 'A4');
$data = '';
$section_title = @$item['section_title'];
$year_data = @$item['year_data'];
$objective_title1 = @$item['objective_title1'];
$objective_title2 = @$item['objective_title2'];
$objective_3 = @$item['objective_3'];
$mission_title = @$item['mission_title'];
$process = @$item['process'];

$data = '
<table style="font-size:14px;" cellspacing="0" cellpadding="0" border="1"  width="100%">
<thead>
<tr>
	<td colspan="11" style="border-top: 0px solid #FFFFFF;
							border-bottom: 0px solid #FFFFFF;
							border-left: 0px solid #FFFFFF;
							border-right: 0px solid #FFFFFF;">
		<div style="font-size:14px;" align="right">เอกสารหมายเลข 3</div>
	</td>
</tr>
<tr><td colspan="11" style="border-top: 0px solid #FFFFFF;
							border-bottom: 0px solid #FFFFFF;
							border-left: 0px solid #FFFFFF;
							border-right: 0px solid #FFFFFF;">
<div style="font-size:14px;" align="center">
	<B>ชื่อหน่วยงาน/ส่วนงาน <label> '.$section_title.'</label> <br />
	รายงานการวิเคราะห์เหตุการณ์ความเสี่ยงและการประเมินความเสี่ยง <br />
	ประจำปีงบประมาณ  '.$year_data.'
	</B>
</div>
</td>
</tr>
	<tr>
		<td colspan="11" style="border-top: 0px solid #FFFFFF;
							border-bottom: 0px solid #FFFFFF;
							border-left: 0px solid #FFFFFF;
							border-right: 0px solid #FFFFFF;">
			<b>วัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย  </b> : <label>'.$objective_title1.'</label>
		</td>
	</tr>
	<tr>
		<td colspan="11" style="border-top: 0px solid #FFFFFF;
							border-bottom: 0px solid #FFFFFF;
							border-left: 0px solid #FFFFFF;
							border-right: 0px solid #FFFFFF;">
		<b>วัตถุประสงค์ตามยุทธศาสตร์ของหน่วยงาน/ส่วนงาน  </b> : <label>'.$objective_title2.'</label>
	 	</td>
	</tr>
	<tr>
		<td colspan="11" style="border-top: 0px solid #FFFFFF;
							border-bottom: 0px solid #FFFFFF;
							border-left: 0px solid #FFFFFF;
							border-right: 0px solid #FFFFFF;">
		<b>วัตถุประสงค์ตามยุทธศาสตร์ของงาน  </b> : <label>'.$objective_3.'</label>
		</td>
	</tr>
	<tr>
		<td colspan="11" style="border-top: 0px solid #FFFFFF;
							border-bottom: 0px solid #FFFFFF;
							border-left: 0px solid #FFFFFF;
							border-right: 0px solid #FFFFFF;">
			<b>ภารกิจ </b> : <label>'.$mission_title.'</label>
		</td>
	</tr>
	<tr>
		<td colspan="11" style="border-top: 0px solid #FFFFFF;
							border-left: 0px solid #FFFFFF;
							border-right: 0px solid #FFFFFF;">
			<b>กระบวนงาน</b> : <label>'.$process.'</label>
		</td>
	</tr>
	<tr>
		<td rowspan="2" valign="middle" style="width: 5%" align="center"><b>เหตุการณ์<br />ความเสี่ยง</b></td>
		<td rowspan="2" valign="middle" style="width: 10%" align="center"><b>สาเหตุ</b></td>
		<td rowspan="2" valign="middle" style="width: 10%" align="center"><b>ตัวชี้วัดความเสี่ยง <br />( Key Risk Indicators : KRI )</b></td>
		<td rowspan="2" valign="middle" style="width: 10%" align="center"><b>การควบคุมที่มีอยู่</b></td>
		<td rowspan="2" valign="middle" style="width: 10%" align="center"><b>การประเมิน<br />การควบคุมที่มีอยู่</b></td>
		<td colspan="3" valign="middle" style="width: 15%" align="center"><b>ความเสี่ยงที่เหลืออยู่</b></td>
		<td rowspan="2" valign="middle" style="width: 20%"align="center"><b>แนวทางการจัดการ</b></td>
		<td rowspan="2" valign="middle" style="width: 10%" align="center"><b>ผู้รับผิดชอบ</b></td>
		<td rowspan="2" valign="middle" style="width: 10%" align="center"><b>ช่วงเวลาดำเนินการ<br />และกำหนดเสร็จ</b></td>
		 
	</tr>
	<tr>
		<td align="center" valign="middle" style="width: 5%"><b>ระดับ<br />โอกาสเกิด</b></td>
		<td align="center" valign="middle" style="width: 5%"><b>ระดับ<br />ผลกระทบ</b></td>
		<td align="center" valign="middle" style="width: 5%"><b>ระดับ<br />ความเสี่ยง<br />ที่เหลืออยู่</b></td>
	</tr>
</thead>
<tbody>';

				 $section = @$item['sectionid'] ;
				 $objectiveid_1 = @$item['objectiveid_1']; 
				 $objectiveid_2 = @$item['objectiveid_2']; 
				 $objective_3  =  @$item['objective_3'];
				 $missionid =  @$item['missionid'];
				 $process =  @$item['process'];
			$condition = " risk_est_head.sectionid = '".$section."' AND risk_est_head.objectiveid_1 = '".$objectiveid_1."' AND risk_est_head.objectiveid_2 = '".$objectiveid_2."' AND risk_est_head.objective_3 = '".$objective_3."'
						  AND missionid = '".$missionid."' AND risk_est_head.process = '".$process."'";
			$select = 'risk_est.*';
			$result_all = $this->risk->select($select)->where($condition)->order_by('risk_est_head.objectiveid_1', 'asc' , 'risk_est_head.objectiveid_2', 'asc' ,'risk_est_head.objective_3', 'asc' , 'risk_est_head.missionid' ,'asc' , 'risk_est_head.process', 'asc')->get('','FALSE');		
	
		foreach ($result_all as $result) {
				 
		 $nrow = $this->risk_control->select('count(*)')->where('risk_est_id='.@$result['id'])->get_one(); 
		 
		 	$event_risk = $result['event_risk'];
			$cause_in_risk = $result['cause_in_risk'];
			$cause_out_risk = $result['cause_out_risk'];
		 
		 
$data .='

     <tr>
		<td valign="top" style="text-align: left;width: 5%" rowspan="'.$nrow.'">'.$event_risk.'</td>
		<td valign="top" style="text-align: left;width: 10%" rowspan="'.$nrow.'">
			ปัจจัยภายใน : '.$cause_in_ris.' <br / >
			ปัจจัยภายนอก : '.$cause_out_risk.'						
		</td>
		<td valign="top" style="text-align: left;width: 10%" rowspan="'.$nrow.'">';
	 
		 $risk_kri = $this->risk_kri->where('risk_est_id='.@$result['id'])->get();
		 $i = 1;
	      	foreach ($risk_kri as $kri) { 
	      		$kri_risk = $kri['kri_risk'];
				$kri_risk_count = $kri['kri_risk_count'];
				$kri_risk_unit = $kri['kri_risk_unit'];
	      		
$data .= $i.' ตัวชี้วัดความเสี่ยง : '.$kri_ris.' จำนวน : '.$kri_risk_count.' หน่วยนับ : '.$kri_risk_unit.' <br />';
			
		  	$i++; 
			} 		
$data .= '</td>';

		  $a =1 ;
			$control_risk = $this->risk_control->where('risk_est_id='.@$result['id'])->get();
	      	foreach ($control_risk as $com_risk) { 
	      		$control_risk = @$com_risk['control_risk'];
				$estimate_control_risk = @$com_risk['estimate_control_risk'];
	      		$remain_risk_1 = @$result['remain_risk_1'];
				$remain_risk_2 = @$result['remain_risk_2'];
				$sum_remain =  @$result['remain_risk_1']*$result['remain_risk_2'];
				$manage_risk = @$result['manage_risk'];
				$owner_risk = @$result['owner_risk'];
				$date_start = mysql_to_date($result['start_date']);
				$date_end = mysql_to_date($result['end_date']);


		if($a != 1 ) {
$data .= '<tr>
		  <td valign="top" style="text-align: left;width: 10%" height="40px">'.$control_risk.'</td>
		  <td valign="top" style="text-align: left;width: 10%" height="40px">'.$estimate_control_risk.'</td>
		  </tr>'; 
		} 

		if($a==1){ 
$data .= '
		 <td valign="top" style="text-align: left;width: 10%" height="40px">'.$control_risk.'</td>
		  <td valign="top" style="text-align: left;width: 10%" height="40px">'.$estimate_control_risk.'</td>
		  <td valign="top" style="width: 5%;" align="center" rowspan="'.$nrow.'">'.$remain_risk_1.'</td>
		  <td valign="top" style="width: 5%;" align="center" rowspan="'.$nrow.'">'.$remain_risk_2.'</td>
		  <td valign="top" style="width: 5%;" align="center" rowspan="'.$nrow.'">'.$sum_remain.'</td>
		  <td valign="top" style="width: 20%;text-align: left;" rowspan="'.$nrow.'">'.$manage_risk.'</td>
		  <td valign="top" style="width: 10%;text-align: left;" rowspan="'.$nrow.'">'.$owner_risk.'</td>
		  <td valign="top" style="width: 10%;text-align: left;" rowspan="'.$nrow.'">'.$date_start.' ถึง '.$date_end.'</td></tr>';
		} 
 
		$a++;} 
//$data .= '</tr>';
	 }

$data .= '
</tbody>	
</table>
<br /><br />';

$html = '<div align="right" id="print" style="font-size:14px;">
			<div style="padding-left:45%;">ลงชื่อ<label style="width:45%; text-align:center;">................................................................</label></div>
			<div style="padding-left:45%;">(<label style="width:40%; text-align:center;">.......................................................</label>)</div>
			<div style="padding-left:45%;">ตำแหน่ง <label style="width:40%; text-align:center;">คณบดีคณะสาธารณสุขศาสตร์</label></div>
			<div style="padding-left:45%;">วันที่ <label style="width:7%; text-align:center;">&nbsp;</label> เดือน <label style="width:10%; text-align:center;">กันยายน</label> พ.ศ. <label style="width:10%; text-align:center;">'.$year_data.'</label></div>
		</div>';
ob_end_clean();
$pdf->writeHTML($data, true, false, false, false, '');	
$pdf->writeHTML($html, true, false, true, false, '');	
}////end foreach 

$pdf->Output('riskest_report_03.pdf', 'I');
?>
