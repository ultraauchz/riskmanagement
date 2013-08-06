<table class="tblist2">
	<tr><td></td>
		 <td>รุ่น </td> 
		 
		 <td>จำนวนคงเหลือ</td>
		 <td></td>
		
		 </tr>
	<?
	
foreach($seminar as $item):
	?>

	<tr>

			<?
			@$sum=0;
			@$sum=30-$item['cnt'];
	
				if(@$sum<=5 && $sum>0 ){echo"<td style='background-color: orgenge;'></td>";}
				//else if(@$sum>6 || @$sum<30 ) {echo"<td style='background-color:white;'><td>";}
				else if($sum==0) {echo"<td style='background-color: red;'></td>";}else{
					echo"<td style='background-color: blue;'></td>";
				}
	
			?>
		
		
		<td>
			<? echo $item['title']."   ";?>
			<? echo  mysql_to_date($item['seminar_start_date'],true,"th") ?> ถึง  <? echo  mysql_to_date($item['seminar_end_date'],true,"th") ?>
			<?/*echo  date_to_mysql($item['seminar_start_date'],FALSE); ?> ถึง <?echo  date_to_mysql($item['seminar_end_date'],FALSE); 
			 * 	//echo  mysql_to_date($item['seminar_start_date'],true,"th"); ///// การใช้ ฟังชั่น date ใส่ */?>
		</td>		
		
		
		<td>
			<?
			@$sum1=30-$item['cnt'];
			if(@$sum1==0)
			{?>
				<div style="color: red;">เต็ม</div>
				
			<?}
			else {
			echo @$sum1=30-@$item['cnt'];
			}
			?>
			
		</td>
		<td>
			<?
			@$sum1=30-@$item['cnt'];
			if(@$sum1==0)
			{
				
			}
			else {?>
			<a href="seminar_data/form/<?=@$item['id'];?>"><img src="images/regis.png"/></a>
			<?}
			?>
			<a href="seminar_data/report/<?=@$item['id'];?>"><img src="images/name.png"/></a>
			
			<? echo th_to_stamp($item['seminar_start_date'],FALSE) ;?>
				</td>
		
			
	
	</tr>
<?
endforeach;
?>
</table>

