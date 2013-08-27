<style>
#print label {
    border-bottom: 1px dashed #333333;
    display: inline-block;
    overflow: hidden;
    padding: 2px 10px;
    text-align: left;
}
#print{
	font-size:16px;
	line-height: 25px;
}
@media print { 
	#head, #tool-info, #search, div.red, #resultsearch b, h3 ,.mega-menu {
		display:none; 
	} 
}
@page { 
	margin: 0.01cm;
	margin-bottom: 0.1cm; }
</style>
<script type="text/javascript">
$(document).ready(function(){
	$("select[name=sectionid]").change(function(){
	 	var section = $("select[name=sectionid]").val();
	 	if(section != ''){
	 		$("span.section").html(section);
	 	}else{
	 		$("span.section").html('……………………(ชื่อส่วนงาน)………………………..…….');
	 	}
		   	
	})
	
});
$(document).ready(function(){
	 	var section = $("select[name=sectionid]").val();
	 	if(section != ''){
	 		$("span.section").html(section);
	 	}	
});

</script>
<h3>หนังสือรับรองการควบคุมภายในของผู้บริหารระดับส่วนงาน</h3>
<form enctype="multipart/form-data" method="get">
<div id="search" align="center">
		<h4>ภาควิชา/งาน</h4>
		<? if(permission($menu_id, 'can_access_all')=='on'){ ?>
			<?=form_dropdown('sectionid',get_option('title as title1','title','section order by section_type_id asc, title asc'),@$_GET['sectionid'],'style="width:370px"','แสดงภาควิชา/งานทั้งหมด');?>
		<? }else{ ?>	
			<?=form_dropdown('sectionid',get_option('title as title1','title','section where id = "'.@$result1['id'].'" order by title '),@$rs['sectionid'],'style="width:370px"');?>
		<? } ?>	
		</div>
 <div style="padding:10px; text-align:right;" id="tool-info">
<a href="import_file/form01.doc"><img src="media/images/download.png" width="32" height="32" style="margin:0 20px -5px 10px;" class="vtip" title="ดาวน์โหลด"></a>
<a onclick="window.print()"><img src="themes/front/images/print.png" width="32" height="32" style="margin:0 20px -5px 10px;" class="vtip" title="พิมพ์ข้อมูล"></a></div>
</div>
</form>
<div id="print" align="center">
<table width="1024px">
	<tr>
		<td align="center"><b>หนังสือรับรองการควบคุมภายในของผู้บริหารระดับส่วนงาน</b></td>
	</tr>
	<tr>
		<td><br /><br /></td>
	</tr>
	<tr>
		<td>เรียน อธิการบดี</td>
	</tr>
	<tr>
		<td><br /><br /></td>
	</tr>
	<tr>
		<td align="justify">
	        <p style="text-indent: 50px"><span class="section">……………………(ชื่อส่วนงาน)………………………..…….</span> ได้ประเมินผลการควบคุมภายใน
	      	สำหรับปีสิ้นสุดวันที่<span contenteditable="true">..........</span>เดือน<span contenteditable="true">..........</span>พ.ศ.<span contenteditable="true">..............</span>
	      	ด้วยวิธีที่ <span class="section">............(ชื่อส่วนงาน).......................</span> 
			กำหนดโดยมีวัตถุประสงค์เพื่อสร้างความมั่นในอย่างสมเหตุสมผลว่าการดำเนินงานจะบรรลุ           
			วัตถุประสงค์ของการควบคุมภายในด้านประสิทธิผลและประสิทธิภาพของการดำเนินงานและการใช้ 
			ทรัพยากร ซึ่งรวมถึงการดูแลรักษาทรัพย์สิน การป้องกันหรือลดความผิดพลาด ความเสียหาย การรั่วไหล 
			การสิ้นเปลือง หรือการทุจริตด้านความเชื่อถือได้ของรายงานทางการเงินและการดำเนินงานและ   
		        ด้านการปฏิบัติตามกฎหมาย ระเบียบ ข้อบังคับ มติคณะรัฐมนตรีและนโยบาย ซึ่งรวมถึงระเบียบปฏิบัติ
		        ของฝ่ายบริหาร<br />
	        <p style="text-indent: 50px">จากผลการประเมินดังกล่าวเห็นว่าการควบคุมภายในของ <span class="section">…......(ชื่อส่วนงาน)…………….</span> 
	              สำหรับปีสิ้นสุดวันที่<span contenteditable="true">..........</span>เดือน<span contenteditable="true">..........</span>พ.ศ.<span contenteditable="true">..............</span>เป็นไปตามระบบการควบคุมภายในที่กำหนดไว้ มีความเพียงพอและบรรลุวัตถุประสงค์ของการควบคุมภายในตามที่กล่าวในวรรคแรก
			<p style="text-indent: 50px">อนึ่ง การควบคุมภายในยังคงมีจุดอ่อนที่มีนัยสำคัญดังนี้
	<div contenteditable="true">
			<p style="text-indent: 50px">..............................................................(กรณีมีจุดอ่อนของการควบคุมภายใน)……………………………..…………………….............................</div>
		</td>
		
	</tr>
<tr>
		<td><br /><br /></td>
</tr>
</div>	
<tr>
	<td>
		<div align="right">
			<div style="padding-left:40%;">ลายมือชื่อ<label style="width:45%; text-align:center;">&nbsp</label></div>
			<div style="padding-left:70%;"><div align="center" contenteditable="true">(ชื่อผู้บริหารส่วนงาน)</div></div>
			<div style="padding-left:40%;">ตำแหน่ง <label style="width:45%; text-align:center;" contenteditable="true">&nbsp</label></div>
			<div style="padding-left:45%;">วันที่<label style="width:7%; text-align:center;" contenteditable="true">&nbsp</label>เดือน<label style="width:15%; text-align:center;" contenteditable="true">&nbsp</label>พ.ศ. <label style="width:10%; text-align:center;" contenteditable="true">&nbsp</label></div>
		</div>
	</td>
</tr>
</table>
</div>

