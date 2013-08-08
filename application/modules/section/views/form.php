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
		divisionid: 
		{ 
			required: true
		}
	},
	messages:
	{
		title:
		{
			required: " กรุณากรอกชื่อภาควิชา"
		},
		divisionid: 
		{ 
			required: " กรุณาเลือกกลุ่มวิชา"
		}
	}
	});
});
</script>
<h3>ข้อมูลพื้นฐาน > จัดการข้อมูลภาควิชา[เพิ่ม / แก้ไข]</h3>
<div></div>
<form enctype="multipart/form-data" method="post" action="<? echo $urlpage?>/save" class="commentForm">
<table class="table table-form table-bordered table-striped table-horizontal"> 
		<tr>
			<td width="150px"><strong>กลุ่มวิชา</strong></td>
			<td>
            	<?=form_dropdown('divisionid',get_option('id','title','division'),@$rs['divisionid'],'style="width:350px"','--เลือกกลุ่มวิชา--');?><span class="status">*</span>
            &nbsp;</td>
		</tr>
		<tr>
			<td width="150px"><strong>ชื่อภาควิชา (ไทย)</strong></td>
			<td>
            	<input type="hidden" name="id" value="<?=@$rs['id'];?>" />
            	<input type="text" name="title" value="<?=@$rs['title'];?>" style="width:500px" /> <span class="status">*</span>
            &nbsp;</td>
		</tr>		
		<tr>
			<td width="150px"><strong>ชื่อภาควิชา (อังกฤษ)</strong></td>
			<td>
            	<input type="text" name="title_en" value="<?=@$rs['title_en'];?>" style="width:500px" />
            &nbsp;</td>
		</tr>		        
	</table>
	<div align="center">
				<input type="submit" value="Save" class="btn btn-primary"> 
				<input type="button" value="  Back  " onclick="history.back();" class="btn btn-inverse">
	</div>
</form>