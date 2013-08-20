	
	<? 
	if($year_data != ''){
		$i = 1;
	foreach($main_title as $main_item):?>
	<fieldset>
		<table class="table table-form table-bordered table-striped table-horizontal">
			<tr>
		 		<td colspan="2" style="text-align:center;">รายการประเมิน</td>
		 		<td style="width:60px;text-align:center;">มี</td>
		 		<td style="width:60px;text-align:center;">ไม่มี</td>
		 	</tr>
		 	<tr>
				<td colspan="4"><?=$main_item['title'];?></td>
			</tr>
		<? 
			$second_title = $this->est_title->where('pid='.$main_item['id'])->get();
			foreach($second_title as $second_item):			
		?>
			
			
			<? 
				 $nrow = $this->est_title->select('count(*)')->where('pid='.$second_item['id'])->get_one();
				$third_title = $this->est_title->where('pid='.$second_item['id'])->get();
				$check_id = 0;
				foreach($third_title as $third_item):			
			?>
				<tr>
					<?
						if($check_id!= $third_item['pid']){
							$check_id = $third_item['pid'];
					?>
					<td style="width:250px;" rowspan="<?=$nrow;?>"><?=$second_item['title'];?></td>
					<?
						}
					@$check_detail = $this->est_detail->where('pid='.$id.' AND est_title_id ='.$third_item['id'])->get_row();
					
					$i++
					?>
					<td class="third_title" >
						<?=$third_item['title'];?>
						
					</td>
					<td style="width:60px;text-align:center;">
						<input type="hidden" name="est_title_id[<?=$i?>]" value="<?=$third_item['id'];?>">
						<input type="hidden" name="detail_id[<?=$i?>]" value="<?=@$check_detail['id'];?>">
						<input type="radio" name="check_value[<?=$i?>]" class="required" value="1" <? if(@$check_detail['check_value'] == '1'){ ?> checked="checked" <? } ?> >
						
					</td>
					<td style="width:60px;text-align:center;">
						<input type="radio" name="check_value[<?=$i?>]" class="required" value="0" <? if(@$check_detail['check_value'] == '0'){ ?> checked="checked" <? } ?> >					
					</td>
				</tr>
			<? endforeach;?>
		<?  endforeach;?>
		</table>
		</fieldset>
	<? endforeach; ?>
		<input type="hidden" name="num_i" value="<?=@$i;?>">
	<? }else{
		echo "กรุณาเลือกปีงบประมาณ";
	}?>
