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
		},
		objective_type: 
		{ 
			required: true
		}
	},
	messages:
	{
		title:
		{
			required: " กรุณากรอกชื่อวัตถุประสงค์"
		},
		objective_type:
		{
			required: " กรุณาเลือกประเภทวัตถุประสงค์"
		}
	}
	});
});
</script>
<h3>ข้อมูลพื้นฐาน > จัดการข้อมูลวัตถุประสงค์[เพิ่ม / แก้ไข]</h3>
<div></div>
<form enctype="multipart/form-data" method="post" action="<? echo $urlpage?>/save" class="commentForm">
<table class="table table-form table-bordered table-striped table-horizontal"> 
		<tr>
			<td width="150px"><strong>ประเภทวัตถุประสงค์</strong></td>
			<td>
            	<?=form_dropdown('objective_type',get_option('id','title','objective_type'),@$rs['objective_type'],'style="width:450px;"','กรุณาเลือกประเภทวัตถุประสงค์');?><span class="status">*</span>
            &nbsp;</td>
		</tr>
		<tr>
			<td width="150px"><strong>ชื่อวัตถุประสงค์</strong></td>
			<td>
            	<input type="hidden" name="id" value="<?=@$rs['id'];?>" />
            	<input type="text" name="title" value="<?=@$rs['title'];?>" style="width:500px" /> <span class="status">*</span>
            &nbsp;</td>
		</tr>					       
	</table>
	<div align="center">
				<input type="submit" value="Save" class="btn btn-primary"> 
				<input type="button" value="  Back  " onclick="history.back();" class="btn btn-inverse">
	</div>
</form>