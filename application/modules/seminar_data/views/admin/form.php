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
})		
</script>
<form method="post" action="seminar_data/admin/seminar_data/save">
<input type="hidden" name="seminar_id" value="<?=$seminar['id'];?>">
<div id="title">
	<?=$seminar['title']." ".$seminar['seminar_start_date']." - ".$seminar['seminar_end_date'];?>
</div>
<table>
	<tr>
		<td>ลำดับที่</td>
		<td>คำนำหน้าชื่อ </td>
		<td>ชื่อ</td>
		<td>นามสกุล</td>
		<td>ตำแหน่ง</td>
		<td>ตำแหน่งทางบริหาร</td>
		<td>หน่วยงาน</td>
		<td>E-Mail</td>
		<td>เบอร์โทรหน่วยงาน</td>
		<td>เบอร์โทรศัพท์มือถือ</td>
	</tr>
<?
$sum = 1;
foreach($resgist as $item):
	
?>
	<tr>
		<td><input type="hidden" name="id[]" value="<? echo @$item['id'];?>" /><?=$sum;?></td>
		<td>
			<select name="title[]" class="title">
				<option value="">เลือก</option>
				<option value="นาย" <? if(@$item['title']=='นาย')echo 'selected="selected"';?>>นาย</option>
				<option value="นาง" <? if(@$item['title']=='นาง')echo 'selected="selected"';?>>นาง</option>
				<option value="นางสาว" <? if(@$item['title']=='นางสาว')echo 'selected="selected"';?>>นางสาว</option>
				<option value="อื่นๆ" <? if(@$item['title']=='อื่นๆ')echo 'selected="selected"';?>>อื่นๆ </option>
			</select>
			<input name="other_title" style="width:50px;<? if(@$item['title']!='อื่นๆ')echo 'display:none;"';?>" type="text" class="other_title" id="other_title" value="<?=@$item['other_title'];?>">  
		</td>
		<td><input type="text" name="first_name[]" id="first_name" value="<? echo @$item['first_name'];?>" /></td>
		<td><input type="text" name="last_name[]" id="last_name'" value="<? echo @$item['last_name'];?>" /></td>
		<td><input type="text" name="position[]" id="position" value="<? echo @$item['position'];?>" /></td>
		<td><input type="text" name="position_bussiness[]" id="position_bussiness" value="<? echo @$item['position_bussiness'];?>" /></td>
		<td><input type="text" name="institution[]" id="institution" value="<? echo @$item['institution'];?>" /></td>
		<td><input type="text" name="email[]" id="email" value="<? echo @$item['email'];?>" /></td>
		<td><input type="text" name="phone[]" id="phone" value="<? echo @$item['phone'];?>" /></td>
		<td><input type="text" name="mobile[]" id="mobile" value="<? echo @$item['mobile'];?>" /></td>
	</tr>
<?	
$sum++;
endforeach;	
$item='';
if ($sum <=30){	
for($i = $sum; $i <= 30;$i++){	  
?>
	<tr>
		<td><input type="hidden" name="id[]" value="" /><?=$i;?></td>
		<td>
			<select name="title[]" class="title">
				<option value="">เลือก</option>
				<option value="นาย">นาย</option>
				<option value="นาง" >นาง</option>
				<option value="นางสาว">นางสาว</option>
				<option value="อื่นๆ">อื่นๆ </option>
			</select>
			<input name="other_title" type="text" class="other_title" id="other_title" style="display:none;width:50px;" value=""/>  
		</td>
		<td><input type="text" name="first_name[]" id="first_name" value="" /></td>
		<td><input type="text" name="last_name[]" id="last_name'" value="" /></td>
		<td><input type="text" name="position[]" id="position" value="" /></td>
		<td><input type="text" name="position_bussiness[]" id="position_bussiness" value="" /></td>
		<td><input type="text" name="institution[]" id="institution" value="" /></td>
		<td><input type="text" name="email[]" id="email" value="" /></td>
		<td><input type="text" name="phone[]" id="phone" value="" /></td>
		<td><input type="text" name="mobile[]" id="mobile" value="" /></td>
	</tr>
<? } }?>
</table>
<input type="submit" value="บันทึก" />
<input type="button" onclick="history.back();" value="กลับหน้าหลัก" />
</form>