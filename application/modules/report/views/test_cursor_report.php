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
	
	#line{left:0px;width:60px;text-align:center;}
	#line {background: url('media/images/cursor.png')-41px -40px;text-align:left;}
	
	#none{display:none;}
</style>
<?
$months = array(10 => 0, 11 => 0, 12 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0);
$month_th = array( 1 =>'ม.ค.',2 => 'ก.พ.',3=>'มี.ค.',4=>'เม.ย',5=>'พ.ค.',6=>'มิ.ย',7=>'ก.ค.',8=>'ส.ค.',9=>'ก.ย.',10=>'ต.ค.',11=>'พ.ย.',12=>'ธ.ค.');
$head = $months;
get_line_months($months, '2013-10-1', '2013-12-1');

?>

<table border="1">
	<tr>
		<?php foreach($head as $key => $item): ?>
		<th style="width:60px;"><?php echo $month_th[$key]; ?></th>
		<?php endforeach; ?>
	</tr>
	<tr>
		<?php foreach($months as $key => $value): ?>
		<td style="height:60px;"><div class="cursor" id="<?php echo set_line($months, $key, $value); ?>"><a href="#" onclick="return false;"></a></div></td>
		<?php endforeach; ?>
	</tr>
</table>