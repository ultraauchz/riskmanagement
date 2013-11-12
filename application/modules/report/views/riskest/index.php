<style>
#print label { display:inline-block; text-align:left; border-bottom:1px dashed #333; padding:2px 10px; overflow:hidden; margin-bottom: 0px;}
#print div { margin-bottom:10px; }
</style>
<script language="javascript">
$(document).ready(function() {

		        	//$('[name=missionid]').chainedSelect({parent: '[name=sectionid],[name=year_data]',url: 'report/riskest/report_missionid/report?year_data='+year_data+'&sectionid='+sectionid,value: 'id',label: 'text'});
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
<h3>รายงานข้อมูลวิเคราะห์เหตุการณ์ความเสี่ยงและการประเมินความเสี่ยง</h3>
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
				
					echo form_dropdown('missionid',get_option('id','title','mission'," id IN (SELECT missionid FROM risk_est WHERE year_data='".$year_data."' and sectionid='".$sectionid."' and objectiveid_1='".$objectiveid_1."' and objectiveid_2='".$objectiveid_2."' and objective_3 ='".$objective_3."') order by title "),@$_GET['missionid'],'','--เลือกภาระกิจ--');
				
			?>
		</span><span class="loading-icon4"></span>
		<br />
		<samp>กระบวนงาน : </samp>
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
<? if(@$_GET['year_data'] >0 && @$_GET['sectionid']>0 && @$_GET['objectiveid_1'] != "" && @$_GET['objectiveid_2'] != "" && @$_GET['objective_3'] != "" && @$_GET['missionid'] != "" && @$_GET['process'] != "" ) {
	if(@$result['id'] != ''){?>
<div style="padding:10px; text-align:right;">
<a href="report/riskest/index/export<?=GetCurrentUrlGetParameter();?>"><img src="themes/front/images/excel.png" width="32" height="32" style="margin-bottom:-6px" class="vtip" title="ส่งออกข้อมูล"></a>
<a href="report/riskest/index/print<?=GetCurrentUrlGetParameter();?>" target="_blank"><img src="themes/front/images/print.png" width="32" height="32" style="margin:0 20px -5px 10px;" class="vtip" title="พิมพ์ข้อมูล"></a></div>
<br />		
<div id="print">
<div align="right">เอกสารหมายเลข 3</div>
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
		<td rowspan="2" align="center"><b>เหตุการณ์ความเสี่ยง<b/></td>
		<td rowspan="2" align="center"><b>สาเหตุ<b/></td>
		<td rowspan="2" align="center"><b>ตัวชี้วัดความเสี่ยง ( Key Risk Indicators : KRI )<b/></td>
		<td rowspan="2" align="center"><b>การควบคุมที่มีอยู่<b/></td>
		<td rowspan="2" align="center"><b>การประเมินการควบคุมที่มีอยู่<b/></td>
		<td colspan="3" align="center"><b>ความเสี่ยงที่เหลืออยู่<b/></td>
		<td rowspan="2" align="center"><b>แนวทางการจัดการ<b/></td>
		<td rowspan="2" align="center"><b>ผู้รับผิดชอบ<b/></td>
		<td rowspan="2" align="center"><b>ช่วงเวลาดำเนินการและกำหนดเสร็จ<b/></td>
		 
	</tr>
	<tr>
		<td align="center"><b>ระดับโอกาสเกิด</b></td>
		<td align="center"><b>ระดับผลกระทบ</b></td>
		<td align="center"><b>ระดับความเสี่ยงที่เหลืออยู่</b></td>
	</tr>
	<? foreach ($result_all as $result) {?>
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
		<td align="center" rowspan="<?=$nrow?>"><?=$result['remain_risk_1'];?></td>
		<td align="center" rowspan="<?=$nrow?>"><?=$result['remain_risk_2'];?></td>
		<td align="center" rowspan="<?=$nrow?>"><?=$result['remain_risk_1']*$result['remain_risk_2'];?></td>
		<td rowspan="<?=$nrow?>"><?=$result['manage_risk'];?></td>
		<td rowspan="<?=$nrow?>"><?=$result['owner_risk'];?></td>
		<td rowspan="<?=$nrow?>"><?=mysql_to_date($result['start_date'])." ถึง ".mysql_to_date($result['end_date'])?></td>
		<? } ?>
		<? if($i != 1 ) {?> </tr> <? } ?>
		<? $i++;} }?>
		
		
</table>
<br /><br />

		<div align="right">
			<div style="padding-left:45%;">ลงชื่อ<label style="width:45%; text-align:center;"></label></div>
			<div style="padding-left:45%;">(<label style="width:40%; text-align:center;"></label>)</div>
			<div style="padding-left:45%;">ตำแหน่ง <label style="width:40%; text-align:center;">คณบดีคณะสาธารณสุขศาสตร์</label></div>
			<div style="padding-left:45%;">วันที่<label style="width:7%; text-align:center;"></label>เดือน<label style="width:10%; text-align:center;">กันยายน</label>พ.ศ. <label style="width:10%; text-align:center;"><?=$result['year_data'];?></label></div>
		</div>
		
</div>

<?}else{?>
	<div align="center" style="margin:0 auto;width:90%;height:30px;vertical-align:middle;text-align:middle;background:#FFFCCC;">ไม่พบข้อมูลที่ค้นหา</div>	
	 <? }
}else{ ?>
	<div align="center" style="margin:0 auto;width:90%;height:30px;vertical-align:middle;text-align:middle;background:#FFFCCC;">กรุณาเลือกรายการค้นหาให้ครบทุกรายการ</div>
	<? } ?>

	
