 <style type="text/css">
.commentForm label { color:red; }
.commentForm label.error{ color:red; }
.status{color:red;}
</style>
<script type="text/javascript" src="js/admin/jquery.validate.min.js"></script>
<script language="javascript">
$(function(){
	var user_id = $('input[name=id]').val();
	$(".commentForm").validate({
	rules: 
	{
		name: 
		{
			required: true,		
		},
		password: 
		{
			minlength: 6,
			maxlength: 20
		},
		confirm_password:
		{
			equalTo: "#password"
		},
		email: 
		{ 
			required: true,
			email: true,
			remote: "user/check_email/"+user_id
		}

		
	},
	messages:
	{
		name: 
		{
			required: " กรุณากรอกชื่อและนามสกุล",
		},
		password:
		{
			minlength: "กรุณากรอกรหัสผ่านอย่างน้อย 6 ตัวอักษร"
		},
		confirm_password:
		{
			equalTo: "กรุณากรอกรหัสผ่านให้ตรงกันทั้ง 2 ช่อง"
		},
		email:
		{
			required: " กรุณากรอก Email ",
			email: "กรุณากรอกอีเมล์ให้ถูกต้อง",
			remote: " email ซ้ำกรุณากรอกใหม่"
		}
		
	}
	});
});	
</script>
<h3>จัดการข้อมูลผู้ใช้ [เพิ่ม / แก้ไข]</h3>
<div></div>
<form enctype="multipart/form-data" method="post" action="user/user_profile_save" class="commentForm">
<table class="table table-form table-bordered table-striped table-horizontal">
  <tr>
  <td colspan="2" style="padding:10px;" class="ui-state-error"><strong>ข้อมูลผู้ใช้งาน
  (เพิ่ม/แก้ไข)</strong></td>
  </tr>	
  	<tr>
			<td><strong>กลุ่มผู้ใช้งาน</strong></td>
			<td>
				<? echo @$rs['usertype_name'];?>
			</td>
		</tr>
		<tr>
			<td><strong>ประเภท</strong></td>
			<td>
				<? if(@$result['section_type_title'] == ''){ echo "-"; }else{echo @$result['section_type_title'];}?>
			</td>
		</tr>				
		<tr>
			<td><strong>ภาควิชา/งาน</strong></td>
			<td>
				<? if(@$result['title'] == ''){echo "-";}else{echo @$result['title'];}?>
			</td>
		</tr>			
		<tr>
			<td><strong>ชื่อ - นามสกุล</strong></td>
			<!-- <th align="left"><? if($lang=='th')echo LBL_REGISTER_MEMBER_NAME_TH;else echo LBL_REGISTER_MEMBER_NAME_EN;?></th> -->
			<td>
			  <input type="hidden" name="id" value="<?=@$rs['id'];?>" />
            	<input type="hidden" name="updatedate" value="<?=@$rs['updatedate'];?>" />            	
				<span><input name="name" id="name" type="text" value="<?=@$rs['name'];?>" size="50" class="" /></span>
				<span class="status">*</span>
			</td>
		</tr>			
		<tr>
			<td><strong>เบอร์โทรศัพท์ที่ติดต่อได้สะดวก</strong></td>
			<td>
				<input name="tel" type="text" id="tel" value="<?=@$rs['tel'];?>" size="20" />
			</td>
		</tr>		
		<tr>
		  <td><strong>อีเมล์</strong></td>
	    <td>
	    	<span><input name="email" type="text" id="email" value="<?=@$rs['email'];?>" size="50" /></span> 
			<span class="status">*</span>
	    	</td>
	  </tr>
	  <tr>
		  <td><strong>Password</strong></td>
		  <td><input type="password" name="password" id="password" value="" /><input type="hidden" name="current_password" value="<?=@$rs['password'];?>" /><?if(@$rs['id']<1){?><span class="status"> *</span><?} ?> </td>
	  </tr>
		<tr>
		 <td><strong>Confirm Password</strong></td>
		  <td><input type="password" name="confirm_password" id="confirm_password"  value=""><?if(@$rs['id']<1){?><span class="status"> *</span><?} ?> </td>
	  </tr>                        		
	</table>
	<div align="center">
				<input type="submit" value="Save" class="btn btn-primary"> 
				<input type="button" value="  Back  " onclick="history.back();" class="btn btn-inverse">
	</div>
</form>