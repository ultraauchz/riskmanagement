<style>
	.cursor a{height:44px;display:block;}
	#left{left:0px;width:60px;}
	#left {background: url('media/images/cursor.png') 0 -40px;}
	
	#center{left:0px;width:40px;}
	#center {background: url('media/images/cursor.png') -41px -40px;}
	
	#next{left:0px;width:40px;text-align:left;}
	#next {background: url('media/images/cursor.png') -81px -40px;text-align:left;}
	
	#end{left:0px;width:55px;text-align:center;}
	#end {background: url('media/images/cursor_end.png');}
</style>
<table  border="1">
	<tr>
<? 
$month_th = array( 1 =>'ต.ค.',2 => 'พ.ย.',3=>'ธ.ค.',4=>'ม.ค.',5=>'ก.พ.',6=>'มี.ค.',7=>'เม.ย.',8=>'พ.ค.',9=>'มิ.ย.',10=>'ก.ค.',11=>'ส.ค.',12=>'ก.ย.');
for($i=1;$i<=12;$i++){ ?>
	<td align="center" style="width:60px;"><?=$month_th[$i];?></td>
<?		
}
?>
	</tr>
	<? $start_date_1 = "2013-10-01";?>
	<? $end_date_1 = "2013-10-31";?>
	<? $start_date_2 = "2014-01-01";?>
	<? $end_date_2 = "2014-02-24";?>
	<? $start_date_3 = "2014-05-01";?>
	<? $end_date_3 = "2014-06-10";?>
	<? $start_date_4 = "2014-07-01";?>
	<? $end_date_4 = "2014-09-31";?>
	<tr>
		<td style="height:40px;">
				<div class="cursor" id="left"><a href="default.asp"></a></div>
		</td>
		<td >
				<div class="cursor" id="next"><a href="default.asp"></a></div>
		</td>
		<td>
				<div class="cursor" id="end"><a href="default.asp"></a></div>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
		<td>
		</td>
	</tr>
</table>