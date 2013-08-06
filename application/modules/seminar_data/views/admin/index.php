<table class="tblist2">
	<tr><td></td>
		 <td>รุ่น</td> 
		 <td>วันที่</td>
		 <td>จำนวนคงเหลือ</td>
		 <td></td>
		 <td></td>
		 </tr>
	<?
	
foreach($seminar as $item):
	?>

	<tr>

			<?
			@$sum=0;
			@$sum=30-$item['cnt'];
			
			if(@$sum == 30)
			{echo"<td style='background-color: blue;'></td>";}
				else if(@$sum>0 || @$sum==5 ){echo"<td style='background-color: orgenge;'></td>";}
				//else if(@$sum>6 || @$sum<30 ) {echo"<td style='background-color:white;'><td>";}
				else {echo"<td style='background-color: red;'></td>";}
	
			?>
		
		
		<td>
			<? echo $item['title']."   ";?>
		</td>
		
		<td><? echo $item['seminar_start_date']."  - ".$item['seminar_end_date'];?></td>
		
		<td>
			 <? echo 30-$item['cnt'];?>
		</td>
		<td>
			<a href="seminar_data/admin/seminar_data/form/<?=$item['id'];?>">view</a>
		</td>
		<td><a href="seminar_data/admin/seminar_data/report/<?=$item['id'];?>">report</a></td>
	</tr>
<?
endforeach;
?>
</table>
