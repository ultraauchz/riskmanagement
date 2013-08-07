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
			required: " กรุณากรอกชื่อกลุ่มวิชา"
		}
	}
	});
});
</script>
<h3>ข้อมูลพื้นฐาน > จัดการข้อมูลกลุ่มวิชา [เพิ่ม / แก้ไข]</h3>
<div></div>
<form enctype="multipart/form-data" method="post" action="division/save" class="commentForm">
<table class="table table-form table-bordered table-striped table-horizontal">
  <tr>
  <td colspan="2" style="padding:10px;" class="ui-state-error"><strong>ข้อมูลกลุ่มวิชา
  (เพิ่ม/แก้ไข)</strong></td>
  </tr>
		<tr>
			<td width="150px"><strong>ชื่อกลุ่มวิชา</strong></td>
			<td>
            	<input type="hidden" name="id" value="<?=@$rs['id'];?>" />
            	<input type="text" name="title" value="<?=@$rs['title'];?>" size="60" /> <span class="status">*</span>
            &nbsp;</td>
		</tr>		
		<tr>
			<td width="150px"><strong>English Name</strong></td>
			<td>
            	<input type="text" name="title_en" value="<?=@$rs['title_en'];?>" size="60" /> <span class="status">*</span>
            &nbsp;</td>
		</tr>		        
	</table>
	<div align="center">
				<input type="submit" value="Save" class="btn btn-primary"> 
				<input type="button" value="  Back  " onclick="history.back();" class="btn btn-inverse">
	</div>
</form>