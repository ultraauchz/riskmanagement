<script>
	$(document).ready(function(){
		$("select[name=year_data]").change(function(){
			window.location='front/?year_data='+this.value;
		})
	})
</script>
<h3>รายงานภาควิชาทั้งหมด</h3>
<div id="search">
	<div id="searchBox" align="center">
		<?
		if(@$_GET['year_data'] == ''){ $_GET['year_data'] = $year; }
		?>
		เลือกปีงบประมาณ <?=form_dropdown('year_data',get_year_option(),$_GET['year_data'],'','--เลือกปี--');?>
		<br>
		<img src='media/images/ok.gif' width='25' height='25' /> หมายถึง ภาควิชา/งาน ที่ส่งแบบฟอร์มแล้ว  &nbsp;&nbsp;<img src='media/images/no.gif' width='25' height='25' /> หมายถึง ภาควิชา/งาน ที่ยังไม่ได้ส่งแบบฟอร์มแล้ว
	</div>
</div>
<p></p>
<div align="center">
	
</div>
<p></p>	
<table class="table table-form table-bordered table-striped table-horizontal">
		<tr class="head">
					<th>ลำดับ</th>
					<th>ปีงบประมาณ</th> 
					<th>ภาควิชา/งาน</th> 
					<th>แบบฟอร์มหมายเลข 3</th>
					<th>แบบฟอร์มหมายเลข 4</th>
					<th>แบบ Checklist</th>
		</tr>
<? $i = 1;
foreach($result as $row): 

	if($row['nform3'] != '0'){
		$nform3 = "<img src='media/images/ok.gif' width='25' height='25' />";
	}else{
		$nform3 = "<img src='media/images/no.gif' width='25' height='25' />";
	}
	if($row['nform4'] != '0'){
		$nform4 = "<img src='media/images/ok.gif' width='25' height='25' />";
	}else{
		$nform4 = "<img src='media/images/no.gif' width='25' height='25' />";
	}
	if($row['nchecklist'] != '0'){
		$nchecklist = "<img src='media/images/ok.gif' width='25' height='25' />";
	}else{
		$nchecklist = "<img src='media/images/no.gif' width='25' height='25' />";
	}
?>
		<tr>
			<td width="5%" style="text-align:center;"><?=$i;?></td>
			<td width="10%"  style="text-align:center;"><?=$year?></td>
			<td width="45%"><?=$row['section_title'];?></td>
			<td width="10%"><a href="risk_est?year_data=<?=@$_GET['year_data'];?>&section_id=<?=$row['id'];?>"><div align="center"><?=$nform3;?></div></a></td>
			<td width="10%"><a href="risk_est?year_data=<?=@$_GET['year_data'];?>&section_id=<?=$row['id'];?>"><div align="center"><?=$nform4;?></div></a></td>
			<td width="10%"><a href="est_checklist?year_data=<?=@$_GET['year_data'];?>&sectionid=<?=$row['id'];?>"><div align="center"><?=$nchecklist;?></div></a></td>
			
	 	</tr>
	 
	<? $i++;
	endforeach; ?>