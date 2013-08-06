<script type="text/javascript" src="js/jquery.validate.js"></script>
<script>
$(document).ready(function(){	
	$(".title").change(function(){
		var title = $(this).val();
		if(title=='อื่นๆ'){			
			$(this).closest('td').find('#other_title').show();
		}else{
			$(this).closest('td').find('#other_title').val('');
			$(this).closest('td').find('#other_title').hide();
		}
	})
		$("#form1").validate({
			  //groups:"first_name last_name ",
			  rules: {
			  	
			    first_name:{
			      required: true,
			      remote:{url:'<?php echo  base_url()?>seminar_data/checkName'}			      
			    },
			   
			   last_name:"required",
			   position:"required",
			   position_bussiness:"required",
			   institution:"required",
			   email:"required",
			   phone:"required",
			   mobile:"required",
			   title:"required",
			   //other_title:"required",
			  },
			  
			  messages:{
			  title:"* กรุณา เลือกคำนำหน้า ด้วยค่ะ",
			   //other_title:"กรุณาระบุ คำนำหน้า ด้วยค่ะ",
			   position_bussiness:"* กรุณาระบุ ตำแหน่งทางบริหาร ด้วยค่ะ",
			   institution:"* กรุณาระบุ หน่วยงาน ด้วยค่ะ",
			   email:"* กรุณาระบุ E-mail ด้วยค่ะ",
			   phone:"* กรุณาระบุ เบอร์โทรหน่วยงาน ด้วยค่ะ",
			   mobile:"* กรุณาระบุ เบอร์โทรศัพท์มือถือ ด้วยค่ะ",
			  	position:"* กรุณาระบุ ตำแหน่ง ด้วยค่ะ",
			  	last_name:"* กรุณาระบุ นามสกุล ด้วยค่ะ",
			  	first_name:{
			  		required:"* กรุณาระบุ ชื่อ ด้วยค่ะ",
			  		remote:"มีชื่อนี้แล้ว"
			  	}
			  }
		});

})	
	

</script>
<? foreach($seminar as $item):
	endforeach;?>
<form name="form1" method="post" action="seminar_data/save" id="form1" >
<input type="hidden" name="seminar_id" value="<?=$seminar['id'];?>">
<div id="title">
	<?=$seminar['title']." ".$seminar['seminar_start_date']." - ".$seminar['seminar_end_date'];?>
</div>
<table>
	<tr>
		<td>ลำดับที่</td><td><input type="hidden" name="id" value=""/></td></tr>
		
		<td>คำนำหน้าชื่อ </td><td>
				<select name="title" class="title">
				<option value="">เลือก</option>
				<option value="นาย">นาย</option>
				<option value="นาง">นาง</option>
				<option value="นางสาว">นางสาว</option>
				<option value="อื่นๆ">อื่นๆ </option>
			</select>
			<input name="other_title" style="width:50px;" type="text" class="other_title" id="other_title" value="" >    </td></tr>
		<td>ชื่อ</td><td><input type="text" name="first_name" id="first_name" value=""  /></td>	
		</tr>
		<td>นามสกุล</td><td><input type="text" name="last_name" id="last_name'" value=""  /></td></tr>
		<td>ตำแหน่ง</td><td><input type="text" name="position" id="position" value="" /></td></tr>
		<td>ตำแหน่งทางบริหาร</td><td><input type="text" name="position_bussiness" id="position_bussiness" value="" /></td></tr>
		<td>หน่วยงาน</td><td><input type="text" name="institution" id="institution" value="" /></td></tr>
		<td>E-Mail</td><td><input type="text" name="email" id="email" value="" /></td></tr>
		<td>เบอร์โทรหน่วยงาน</td><td><input type="text" name="phone" id="phone" value="" /></td></tr>
		<td>เบอร์โทรศัพท์มือถือ</td><td><input type="text" name="mobile" id="mobile" value="" /></td></tr>

</table>
<input type="submit" value="บันทึก" />
<input type="button" onclick="history.back();" value="กลับหน้าหลัก" />
</form>
	<?/*<tr>
		<td>ลำดับที่</td><td><input type="hidden" name="id[]" value="<? echo @$item['id'];?>"/></td></tr>
		
		<td>คำนำหน้าชื่อ </td><td>
				<select name="title[]" class="title">
				<option value="">เลือก</option>
				<option value="นาย" <? if(@$item['title']=='นาย')echo 'selected="selected"';?>>นาย</option>
				<option value="นาง" <? if(@$item['title']=='นาง')echo 'selected="selected"';?>>นาง</option>
				<option value="นางสาว" <? if(@$item['title']=='นางสาว')echo 'selected="selected"';?>>นางสาว</option>
				<option value="อื่นๆ" <? if(@$item['title']=='อื่นๆ')echo 'selected="selected"';?>>อื่นๆ </option>
			</select>
			<input name="other_title" style="width:50px;<? if(@$item['title']!='อื่นๆ')echo 'display:none;"';?>" type="text" class="other_title" id="other_title" value="<?=@$item['other_title'];?>">    </td></tr>
		<td>ชื่อ</td><td><input type="text" name="first_name[]" id="first_name" value="<? echo @$item['first_name'];?>" /></td></tr>
		<td>นามสกุล</td><td><input type="text" name="last_name[]" id="last_name'" value="<? echo @$item['last_name'];?>" /></td></tr>
		<td>ตำแหน่ง</td><td><input type="text" name="position[]" id="position" value="<? echo @$item['position'];?>" /></td></tr>
		<td>ตำแหน่งทางบริหาร</td><td><input type="text" name="position_bussiness[]" id="position_bussiness" value="" /></td></tr>
		<td>หน่วยงาน</td><td><input type="text" name="institution[]" id="institution" value="<? echo @$item['position_bussiness'];?>" /></td></tr>
		<td>E-Mail</td><td><input type="text" name="email[]" id="email" value="<? echo @$item['institution'];?>" /></td></tr>
		<td>เบอร์โทรหน่วยงาน</td><td><input type="text" name="phone[]" id="phone" value="<? echo @$item['phone'];?>" /></td></tr>
		<td>เบอร์โทรศัพท์มือถือ</td><td><input type="text" name="mobile[]" id="mobile" value="<? echo @$item['mobile'];?>" /></td></tr>*/?>
