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
	
#print label { display:inline-block; text-align:left; border-bottom:1px dashed #333; padding:2px 10px; overflow:hidden; margin-bottom: 0px;}
#print div { margin-bottom:10px; }
</style>
<script language="javascript">
$(document).ready(function() {
		      function load_sectionid(){ //วัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย
		      	$("<img class='loading' src='themes/Front/images/loading.gif' style='vertical-align:bottom'>").appendTo(".loading-icon");
		       		var year_data = $('[name=year_data]').val();
		       	  	$.post('report/riskest/report_section',{
						'year_data' : year_data
					},function(data){
						$(".loading").remove();
						$(".sp_sectionid").html(data);
					})
			  }
		       function load_objectiveid_1(){ //วัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย
		       	$("<img class='loading' src='themes/Front/images/loading.gif' style='vertical-align:bottom'>").appendTo(".loading-icon1");
		       		var permis = $('input[name=permis]').val();
		       		if(permis == "on"){
		       			var year_data = $('[name=year_data]').val();
		       		}else{
		       			var year_data = $('[name=year_data1]').val();
		       		}
		       	  	var sectionid = $('[name=sectionid]').val();
		       	  	$.post('report/riskest/report_objectiveid_1',{
						'year_data' : year_data,
						'sectionid' : sectionid
					},function(data){
						$(".loading").remove();
						$(".sp_objectiveid_1").html(data);
					})
				}
		       function load_objectiveid_2(){ //วัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย
		       		$("<img class='loading' src='themes/Front/images/loading.gif' style='vertical-align:bottom'>").appendTo(".loading-icon2");
		       		var permis = $('input[name=permis]').val();
		       		if(permis == "on"){
		       			var year_data = $('[name=year_data]').val();
		       		}else{
		       			var year_data = $('[name=year_data1]').val();
		       		}
		       		
		       	  	var sectionid = $('[name=sectionid]').val();
		       	  	var objectiveid_1 = $('[name=objectiveid_1]').val();
		       	  	$.post('report/riskest/report_objectiveid_2',{
						'year_data' : year_data,
						'sectionid' : sectionid,
						'objectiveid_1' : objectiveid_1
					},function(data){
						$(".loading").remove();
						$(".sp_objectiveid_2").html(data);
					})
		       }
		        function load_objective_3(){ //วัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย
		        	$("<img class='loading' src='themes/Front/images/loading.gif' style='vertical-align:bottom'>").appendTo(".loading-icon3");
		       		var permis = $('input[name=permis]').val();
		       		if(permis == "on"){
		       			var year_data = $('[name=year_data]').val();
		       		}else{
		       			var year_data = $('[name=year_data1]').val();
		       		}
		       	  	var sectionid = $('[name=sectionid]').val();
		       	  	var objectiveid_1 = $('[name=objectiveid_1]').val();
		       	  	var objectiveid_2 = $('[name=objectiveid_2]').val();
		       	  	$.post('report/riskest/report_objective_3',{
						'year_data' : year_data,
						'sectionid' : sectionid,
						'objectiveid_1' : objectiveid_1,
						'objectiveid_2' : objectiveid_2
					},function(data){
						$(".loading").remove();
						$(".sp_objective_3").html(data);
					})
		       }
		       function load_mission(){
		       		$("<img class='loading' src='themes/Front/images/loading.gif' style='vertical-align:bottom'>").appendTo(".loading-icon4");
		       		var permis = $('input[name=permis]').val();
		       		if(permis == "on"){
		       			var year_data = $('[name=year_data]').val();
		       		}else{
		       			var year_data = $('[name=year_data1]').val();
		       		}
		       	  	var sectionid = $('[name=sectionid]').val();
		       	  	var objectiveid_1 = $('[name=objectiveid_1]').val();
		       	  	var objectiveid_2 = $('[name=objectiveid_2]').val();
		       	  	var objective_3 = $('[name=objective_3]').val();
		       	  	$.post('report/riskest/report_missionid',{
						'year_data' : year_data,
						'sectionid' : sectionid,
						'objectiveid_1' : objectiveid_1,
						'objectiveid_2' : objectiveid_2,
						'objective_3' : objective_3
					},function(data){
						$(".loading").remove();
						$(".sp_mission").html(data);
					})
		       }
		       function load_process(){
		       		$("<img class='loading' src='themes/Front/images/loading.gif' style='vertical-align:bottom'>").appendTo(".loading-icon5");
		       		var permis = $('input[name=permis]').val();
		       		if(permis == "on"){
		       			var year_data = $('[name=year_data]').val();
		       		}else{
		       			var year_data = $('[name=year_data1]').val();
		       		}
		       	  	var sectionid = $('[name=sectionid]').val();
		       	  	var objectiveid_1 = $('[name=objectiveid_1]').val();
		       	  	var objectiveid_2 = $('[name=objectiveid_2]').val();
		       	  	var objective_3 = $('[name=objective_3]').val();
		       	  	var missionid = $('[name=missionid]').val();
		       	  	$.post('report/riskest/report_process',{
						'year_data' : year_data,
						'sectionid' : sectionid,
						'objectiveid_1' : objectiveid_1,
						'objectiveid_2' : objectiveid_2,
						'objective_3' : objective_3,
						'missionid' : missionid
					},function(data){
						$(".loading").remove();
						$(".sp_process").html(data);
					})
		       }
		       
		       $('[name=year_data]').live("change",function(){
		       	  	load_sectionid();
		       	  	load_objectiveid_1();
		       	  	load_objectiveid_2();
		       	  	load_objective_3();
		       	  	load_mission();
		       	  	load_process();
		       });
		       $('[name=year_data1]').live("change",function(){
		       	  	load_objectiveid_1();
		       	  	load_objectiveid_2();
		       	  	load_objective_3();
		       	  	load_mission();
		       	  	load_process();
		       });
		       $('[name=sectionid]').live("change",function(){
		       	  	load_objectiveid_1();
		       	  	load_objectiveid_2();
		       	  	load_objective_3();
		       	  	load_mission();
		       	  	load_process();
		       });
		       $('[name=objectiveid_1]').live("change",function(){
		       	  	load_objectiveid_2();
		       	  	load_objective_3();
		       	  	load_mission();
		       	  	load_process();
		       });
		       $('[name=objectiveid_2]').live("change",function(){
		       	  	load_objective_3();
		       	  	load_mission();
		       	  	load_process();
		       });
		       $('[name=objective_3]').live("change",function(){
		       	  	load_mission();
		       	  	load_process();
		       });
		       $('[name=missionid]').live("change",function(){
		       	  	load_process();
		       });
	
		      
 });
</script>
<h3>รายงานข้อมูลแผนการปฏิบัติการและรายงานผลการบริหารจัดการความเสี่ยง รอบ 1 เมย. – 30 กย. (12 เดือน)</h3>
<form enctype="multipart/form-data" method="get">
<div id="search">
  <div id="searchBox">
  	<h4>ค้นหา</h4>
  	<input type="hidden" name="permis" id="permis" value="<?=$rs['permis']?>" />
		<? if(@$rs['permis']=='on'){ ?>
			<span>ปีงบประมาณ : </span>
			<?=form_dropdown('year_data',get_year_option(),@$_GET['year_data'],'','แสดงทุกปี');?>
			<br />
			<span>ภาควิชา : </span>
			<span class="sp_sectionid">
			<? 	$year_data = @$_GET['year_data'];
				echo form_dropdown('sectionid',get_option('id','title','section'," id IN (SELECT sectionid FROM risk_est WHERE year_data='".$year_data."') order by title "),@$_GET['sectionid'],'style="width:370px"','--เลือกภาควิชา--'); 
			?>
			</span><span class="loading-icon"></span>
		<? }else{ ?>	
			<span>ปีงบประมาณ : </span>
			<?=form_dropdown('year_data1',get_year_option(),@$_GET['year_data1'],'','แสดงทุกปี');?>
			<br />
			<span>ภาควิชา : </span>
			<?=form_dropdown('sectionid',get_option('id','title','section where id = "'.@$result1['id'].'" order by section_type_id asc, title asc  '),@$_GET['sectionid'],'style="width:370px"');?>
		<? } ?>	
		<br />
		<span>วัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย : </span>
		<span class="sp_objectiveid_1">
			<?
			if(@$rs['permis']=='on'){
				$year_data = @$_GET['year_data'];
			}else{
				$year_data = @$_GET['year_data1'];
			}
				$sectionid = @$_GET['sectionid'];
				
					echo form_dropdown('objectiveid_1',get_option('id','title','objective'," id IN (SELECT objectiveid_1 FROM risk_est WHERE year_data='".$year_data."' and sectionid='".$sectionid."') order by title "),@$_GET['objectiveid_1'],'style="width:550px"','--เลือกวัตถุประสงค์ตามยุทธศาสตร์ของมหาวิทยาลัย--');
				
			?>
		</span><span class="loading-icon1"></span>
		<br />
		<span>วัตถุประสงค์ตามยุทธศาสตร์ของหน่วยงาน/ส่วนงาน : </span>
		<span class="sp_objectiveid_2">
			
			<?
			if(@$rs['permis']=='on'){
				$year_data = @$_GET['year_data'];
			}else{
				$year_data = @$_GET['year_data1'];
			}
				$sectionid = @$_GET['sectionid'];
				$objectiveid_1 = @$_GET['objectiveid_1'];
	
					echo form_dropdown('objectiveid_2',get_option('id','title','objective'," id IN (SELECT objectiveid_2 FROM risk_est WHERE year_data='".$year_data."' and sectionid='".$sectionid."' and objectiveid_1='".$objectiveid_1."') order by title "),@$_GET['objectiveid_2'],'style="width:550px"','--เลือกวัตถุประสงค์ตามยุทธศาสตร์ของหน่วยงาน/ส่วนงาน--');
		
			?>
		</span><span class="loading-icon2"></span>
		<br />
		<span>วัตถุประสงค์ตามยุทธศาสตร์ของงาน : </span>
		<span class="sp_objective_3">
			<?
			if(@$rs['permis']=='on'){
				$year_data = @$_GET['year_data'];
			}else{
				$year_data = @$_GET['year_data1'];
			}
				$sectionid = @$_GET['sectionid'];
				$objectiveid_1 = @$_GET['objectiveid_1'];
				$objectiveid_2 = @$_GET['objectiveid_2'];
					echo form_dropdown('objective_3',get_option('objective_3 AS id','objective_3 as title','risk_est'," objective_3 IN (SELECT DISTINCT objective_3 FROM risk_est WHERE year_data='".$year_data."' and sectionid='".$sectionid."' and objectiveid_1='".$objectiveid_1."' and objectiveid_2='".$objectiveid_2."') order by title "),@$_GET['objective_3'],'style="width:450px"','--เลือกวัตถุประสงค์ตามยุทธศาสตร์ของงาน--');
		
			?>
		</span><span class="loading-icon3"></span>
		<br />
		<span>ภารกิจ : </span>
		<span class="sp_mission">
			<?
			if(@$rs['permis']=='on'){
				$year_data = @$_GET['year_data'];
			}else{
				$year_data = @$_GET['year_data1'];
			}
				$sectionid = @$_GET['sectionid'];
				$objectiveid_1 = @$_GET['objectiveid_1'];
				$objectiveid_2 = @$_GET['objectiveid_2'];
				$objective_3 = @$_GET['objective_3'];
				
					echo form_dropdown('missionid',get_option('id','title','mission'," id IN (SELECT missionid FROM risk_est WHERE year_data='".$year_data."' and sectionid='".$sectionid."' and objectiveid_1='".$objectiveid_1."' and objectiveid_2='".$objectiveid_2."' and objective_3 ='".$objective_3."') order by title "),@$_GET['missionid'],'','--เลือกภารกิจ--');
				
			?>
		</span><span class="loading-icon4"></span>
		<br />
	    <span>กระบวนงาน : </span>
		<span class="sp_process">
			<?
			if(@$rs['permis']=='on'){
				$year_data = @$_GET['year_data'];
			}else{
				$year_data = @$_GET['year_data1'];
			}
				$sectionid = @$_GET['sectionid'];
				$objectiveid_1 = @$_GET['objectiveid_1'];
				$objectiveid_2 = @$_GET['objectiveid_2'];
				$objective_3 = @$_GET['objective_3'];
				$missionid = @$_GET['missionid'];
				
					echo form_dropdown('process',get_option('process as id','process as title','risk_est'," process IN (SELECT DISTINCT process FROM risk_est WHERE year_data='".$year_data."' and sectionid='".$sectionid."' and objectiveid_1='".$objectiveid_1."' and objectiveid_2='".$objectiveid_2."' and objective_3 ='".$objective_3."' and missionid ='".$missionid."') order by title "),@$_GET['process'],'','--เลือกกระบวนงาน--');
			?>
		</span><span class="loading-icon5"></span>
		
		<input type="submit" class="btn_search" value=" " title="ค้นหา" id="button9" name="button9"></div>
  </div>
</div>
</form>
<? if(@$_GET['year_data'] >0 && @$_GET['sectionid']>0 && @$_GET['objectiveid_1'] != "" && @$_GET['objectiveid_2'] != "" && @$_GET['objective_3'] !="" && @$_GET['missionid'] != "" && @$_GET['process'] != "") {
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
		<td> : <label><?=$result['objective_3'];?></label></td>
	</tr>

</table>
<b>ภารกิจ </b> : <label><?=$result['mission_title'];?></label> <br />
<b>กระบวนงาน</b> : <label><?=$result['process'];?></label> <br /><br />
<table border="1" width="100%">
	<tr>
		<td rowspan="3" align="center" width="150px"><b>เหตุการณ์ความเสี่ยง<b/></td>
		<td rowspan="3" align="center" width="250px"><b>ตัวชี้วัดความเสี่ยง ( Key Risk Indicators : KRI )<b/></td>
		<td rowspan="3" align="center" width="200px"><b>กิจกรรมดำเนินงาน<b/></td>
		<td rowspan="3" align="center" width="50px"><b>แผน/ผล<b/></td>
		<td colspan="12" align="center"><b>ระยะเวลาการดำเนินการ<b/></td>
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
	<? foreach ($result_all as $result_1) {
		//$this->db->debug = true;
		
	 $result = $this->risk_opr->where("risk_est_id=".@$result_1['id'])->order_by('id','asc')->get_row();

	 ?>	
	<tr>
		<? $nrow = $this->risk_control->select('count(*)')->where('risk_est_id='.@$result_1['id'])->get_one(); ?>
		<td rowspan="2" valign="top"><?=$result['event_risk'];?></td>
		<td rowspan="2" valign="top">
		 <?	$risk_kri = $this->risk_kri->where('risk_est_id='.@$result_1['id'])->get();
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
			
			<td><div align="center"><?=$result['before_risk_chance']?></div></td>
			<td><div align="center"><?=$result['before_risk_effect']?></div></td>
			<td><div align="center"><?=$result['before_risk_step']?></div></td>
			<td><div align="center"><?=$result['after_risk_chance']?></div></td>
			<td><div align="center"><?=$result['after_risk_effect']?></div></td>
			<td><div align="center"><?=$result['after_risk_step']?></div></td>
			
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
	<div align="center" style="margin:0 auto;width:90%;height:30px;vertical-align:middle;text-align:middle;background:#FFFCCC;">กรุณาเลือกรายการค้นหาให้ครบทุกราย</div>
	<? } ?>

	
