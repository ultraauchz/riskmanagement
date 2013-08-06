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
<form method="post" action="seminar_data/report">

<div id="title">
	<?=$seminar['title'];?>
	<? echo  mysql_to_date($seminar['seminar_start_date'],true,"th") ?> ถึง  <? echo  mysql_to_date($seminar['seminar_end_date'],true,"th") ?>
</div>
<table class="tblist2">
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
$sum =1;
foreach($resgist as $item):
?>
	<tr>
		<td><?=$sum;?></td>
		<td>
			<? if(@$item['title']=='นาย')echo "นาย";?>
			<? if(@$item['title']=='นาง')echo "นาง";?>
			<? if(@$item['title']=='นางสาว')echo "นางสาว";?>
			<? if(@$item['title']!='อื่นๆ')echo @$item['other_title'];?>
		</td>
		<td><? echo @$item['first_name'];?></td>
		<td><? echo @$item['last_name'];?></td>
		<td><? echo @$item['position'];?></td>
		<td><? echo @$item['position_bussiness'];?></td>
		<td><? echo @$item['institution'];?></td>
		<td><? echo @$item['email'];?></td>
		<td><? echo @$item['phone'];?></td>
		<td><? echo @$item['mobile'];?> </td>
	</tr>
<?	
	
$sum++;
endforeach;	
//-------------  
?>
	 <??>
</table>
<input type="button" onclick="history.back();" value="กลับหน้าหลัก" />
</form>