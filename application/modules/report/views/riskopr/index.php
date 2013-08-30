<style>
#print label {
    border-bottom: 1px dashed #333333;
    display: inline-block;
    overflow: hidden;
    padding: 5px 10px;    
    text-align: left;    
}</style>
<style>
	.cursor a{height:40px;display:block;}
	#left{left:0px;width:40px;}
	#left {background: url('media/images/cursor.png') 0 -40px;}
	
	#center{left:0px;width:40px;}
	#center {background: url('media/images/cursor.png') -41px -40px;}
	
	#next{left:0px;width:40px;text-align:left;}
	#next {background: url('media/images/cursor.png') -81px -40px;text-align:left;}
	
	#end{left:0px;width:40px;text-align:center;}
	#end {background: url('media/images/cursor_end_2.png');}
	
	#line{left:0px;width:40px;text-align:center;}
	#line {background: url('media/images/cursor.png')-41px -40px;text-align:left;}
	
	#none{display:none;}
</style>
<h3>รายงานข้อมูลแผนการปฎิบัติการและรายงานผล</h3>
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
		<select name="quarter">
			<? $quarters = array("--เลือกช่วงไตรมาส--"=>'',"--ทุกช่วงไตรมาส--"=>'1',"--ช่วงครึ่งไตรมาสแรก--"=>'2',"--ช่วงครึ่งไตรมาสหลัง--"=>'3') ;
				foreach($quarters as $key => $item):
			?>
			<option value="<?=$item?>" <? if(@$_GET['quarter']==$item){ echo 'selected="selected"';}?>><?=$key?></option>
			<?php endforeach; ?>
		</select>
		<input type="submit" class="btn_search" value=" " title="ค้นหา" id="button9" name="button9"></div>
  </div>
</div>
</form>
<? if(@$_GET['year_data'] >0 && @$_GET['sectionid']>0 ) {
	if(@$result['id'] != ''){?>
<div style="padding:10px; text-align:right;">
<a href="report/riskopr/index/export<?=GetCurrentUrlGetParameter();?>"><img src="themes/front/images/excel.png" width="32" height="32" style="margin-bottom:-6px" class="vtip" title="ส่งออกข้อมูล"></a>
<a href="report/riskopr/index/print<?=GetCurrentUrlGetParameter();?>" target="_blank"><img src="themes/front/images/print.png" width="32" height="32" style="margin:0 20px -5px 10px;" class="vtip" title="พิมพ์ข้อมูล"></a></div>
<br />		
<div id="print">
<div align="right">เอกสารหมายเลข 4</div>
<div align="center">
	<B>ชื่อหน่วยงาน/ส่วนงาน <label><?=$result['section_title'];?></label> <br />
	รายงานการวิเคราะห์เหตุการณ์ความเสี่ยงและการประเมินความเสี่ยง <br />
	ประจำปีงบประมาณ   <?=$result['year_data'];?>
	</B><br />
</div><br />
<table>
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
<table border="1" width="100%">
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
	
	<tr>
		<? $nrow = $this->risk_control->select('count(*)')->where('risk_est_id='.@$result['id'])->get_one(); ?>
		<td rowspan="2" valign="top"><?=$result['event_risk'];?></td>
		<td rowspan="2" valign="top">
		 <?	$risk_kri = $this->risk_kri->where('risk_est_id='.@$result_est['id'])->get();
		 $i = 1;
	      	foreach ($risk_kri as $kri) { ?>
			<?=$i?>. <?=$kri['kri_risk'];?> จำนวน : <?=$kri['kri_risk_count']?> <?=$kri['kri_risk_unit']?> <br / >
			
		<? $i++; } ?>		
		</td>
			<td rowspan="2" valign="top"><?=$result['manage_risk'];?></td>
			<td height="50px" valign="middle" align="center">แผน</td>
			
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
			
			for($i;$i<=$max;$i++){
				if($result['plot_start_date'.$i] > 0 &&  $result['plot_end_date'.$i] > 0){
					get_line_months($months, $result['plot_start_date'.$i], $result['plot_end_date'.$i]);					
				}
			} ?>
			<?php foreach($months as $key => $value): ?>
				<td style="height:60px;padding:0px;"><div class="cursor" id="<?php echo set_line($months, $key, $value); ?>"><a href="#" onclick="return false;"></a></div></td>
			<?php endforeach; ?>
			<td rowspan="2" valign="top" align="left">
				<? 
				for($i=1;$i<=4;$i++){
					echo $result['result'.$i]."<br />";
				}
				?>
			</td>
		</tr>
		<tr>
			<td height="50px" valign="middle" align="center">ผล</td>
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
<?}else{?>
	<div align="center" style="margin:0 auto;width:90%;height:30px;vertical-align:middle;text-align:middle;background:#FFFCCC;">ไม่พบข้อมูลที่ค้นหา</div>	
	 <? }
}else{ ?>
	<div align="center" style="margin:0 auto;width:90%;height:30px;vertical-align:middle;text-align:middle;background:#FFFCCC;">กรุณาเลือกปีงบประมาณ และ ภาควิชา/งาน</div>
	<? } ?>

	
