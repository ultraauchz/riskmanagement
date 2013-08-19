<script type="text/javascript" src="js/jquery.validate.min.js"></script>
 <style type="text/css">
.commentForm label { color:red; }
.commentForm label.error{ color:red; }
.status{color:red;}
.txtRed {color: #ea0000;}
</style>
<script type="text/javascript">
$(function(){
	
	$(".commentForm").validate({
	rules: 
	{
		title: 
		{ 
			required: true
		}
	},
	messages:
	{
		title:
		{
			required: " กรุณารายละเอียด"
		}
	}
	});
});
</script>
<h3>ข้อมูลพื้นฐาน > จัดการข้อมูลภารกิจ[เพิ่ม / แก้ไข]</h3>
<div></div>
<form enctype="multipart/form-data" method="post" action="<? echo $urlpage?>/save" class="commentForm">
<table class="table table-form table-bordered table-striped table-horizontal"> 
	<? if($pid > 0 ): ?>
	<tr>
		<td>หัวข้อหลัก</td>
		<td><?=@$main['title']; if(@$main2['title'] != '' ){echo " > ".@$main2['title'];}?></td>
	</tr>
	<? endif;?>
	
		<? if($pid == 0 ){?>
		<tr>
		<td>ปีงบประมาณ</td>
		<td><?=form_dropdown('year_data',get_year_option(),@$rs['year_data'],'','แสดงทุกปี');?></td>
		</tr>
		<? } ?>
		<tr>
			<td width="150px"><strong>รายละเอียด</strong></td>
			<td>
            	<input type="hidden" name="id" value="<?=@$rs['id'];?>" />
            	<textarea  name="title" class="" rows="4" style="width:700px"><?=@$rs['title'];?></textarea><span class="status">*</span>
            &nbsp;</td>
		</tr>		        
	</table>
	<div align="center">
		        <input type="hidden" name="pid" value="<?=$pid;?>">
				<input type="submit" value="Save" class="btn btn-primary"> 
				<input type="button" value="  Back  " onclick="history.back();" class="btn btn-inverse">
	</div>
</form>