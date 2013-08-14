<script type="text/javascript">
$(document).ready(function(){
	$("#spCheckAllRow").live("click",function(){		
		$(this).closest('td').find('.checkbox').attr('checked','checked');
	})	
	$("#spUnCheckAllRow").live("click",function(){		
		$(this).closest('td').find('.checkbox').removeAttr('checked');
	})
	$("#CheckViewAll").live('click',function(){
		$('.canview').attr('checked','checked');
	})
	$("#UnCheckViewAll").live('click',function(){
		$('.canview').removeAttr('checked');
	})
	$("#CheckAddAll").live('click',function(){
		$('.canadd').attr('checked','checked');
	})
	$("#UnCheckAddAll").live('click',function(){
		$('.canadd').removeAttr('checked');
	})
	$("#CheckEditAll").live('click',function(){
		$('.canedit').attr('checked','checked');
	})
	$("#UnCheckEditAll").live('click',function(){
		$('.canedit').removeAttr('checked');
	})
	$("#CheckDeleteAll").live('click',function(){
		$('.candelete').attr('checked','checked');
	})
	$("#UnCheckDeleteAll").live('click',function(){
		$('.candelete').removeAttr('checked');
	})
	$("#CheckAll").live('click',function(){
		$('.checkbox').attr('checked','checked');
	})
	$("#UnCheckAll").live('click',function(){
		$('.checkbox').removeAttr('checked');
	})
})
</script>
<h3>จัดการข้อมูลกลุ่มผู้ใช้ [เพิ่ม/แก้ไข]</h3>
<div></div>
<form enctype="multipart/form-data" method="post" action="usergroup/save">
	<table class="table table-form table-bordered table-striped table-horizontal">
		<tr>
			<th width="">Name</th>
			<td>
            	<input type="hidden" name="id" value="<?=@$rs['id'];?>" />
            	<input type="text" name="name" value="<?=@$rs['name'];?>" size="60" /> <span class="txtOrange">*</span>
            &nbsp;</td>
		</tr>
		<tr>
			<th width="200px">Permission</th>
			<td>
				<span id="CheckViewAll" style="cursor:pointer;"><font color="green">[Checked All View]</font></span> 
				&nbsp;&nbsp;&nbsp;
				<span id="CheckAddAll" style="cursor:pointer;"><font color="green">[Check Add All]</font></span> &nbsp;&nbsp;&nbsp;&nbsp;
				<span id="CheckEditAll" style="cursor:pointer;"><font color="green">[Check Edit All]</font></span> &nbsp;&nbsp;&nbsp;&nbsp;
				<span id="CheckDeleteAll" style="cursor:pointer;"><font color="green">[Check Delete All]</font></span> &nbsp;&nbsp;&nbsp;&nbsp;
				<span id="CheckAll" style="cursor:pointer;"><font color="green">[Check All]</font></span> <br />
			    <span id="UnCheckViewAll" style="cursor:pointer"><font color="red">[UnCheck View All]</font></span> 
			    <span id="UnCheckAddAll" style="cursor:pointer"><font color="red">[UnCheck Add All]</font></span>&nbsp; 
			    <span id="UnCheckEditAll" style="cursor:pointer"><font color="red">[UnCheck Edit All]</font></span>&nbsp; 
			    <span id="UnCheckDeleteAll" style="cursor:pointer"><font color="red">[UnCheck Delete All]</font></span> &nbsp; 
			    <span id="UnCheckAll" style="cursor:pointer"><font color="red">[UnChecked All]</font></span>
			</td>
		</tr>
		<tr>
			<th width="">เข้าถึงข้อมูลทุกหน่วยงาน</th>
			<td>
            	<input type="checkbox" name="can_access_all" value="on" class="checkbox" value="on" <? if(@$permission['can_access_all']=='on')echo "checked";?>  /> 
            &nbsp;</td>
		</tr>
<? 
$admin_system = $this->admin_menu->where('pid=0')->order_by('order_no','asc')->get();
foreach($admin_system as $sitem): 
?>		
		<tr>
			<th><?=$sitem['title'];?></th>
			<td>
				<? if($sitem['attr']!=''): 
				$permission = @$this->db->getrow("SELECT * FROM usertype_detail where menu_id=".$sitem['id']." AND usertype_id=".$rs['id']);
				?>		
		    	<? if ((strpos($sitem['attr'],'view'))!==FALSE){ ?>
		    	<input type="checkbox" name="canview<?=$sitem['id'];?>" id="canview" class="checkbox canview" value="on" <? if(@$permission['canview']=='on')echo "checked";?> />View
		    	<? } ?>
		    	<? if ((strpos($sitem['attr'],'add'))!==FALSE){ ?>
		    	<input type="checkbox" name="canadd<?=$sitem['id'];?>" id="canadd" class="checkbox canadd" value="on" <? if(@$permission['canadd']=='on')echo "checked";?>/> Add
		    	<? } ?>
		    	<? if ((strpos($sitem['attr'],'edit'))!==FALSE){ ?>
				<input type="checkbox" name="canedit<?=$sitem['id'];?>" id="canedit" class="checkbox canedit" value="on" <? if(@$permission['canedit']=='on')echo "checked";?>/>Edit
				<? } ?>
		    	<? if ((strpos($sitem['attr'],'delete'))!==FALSE){ ?>
		  		<input type="checkbox" name="candelete<?=$sitem['id'];?>" id="candelete" class="checkbox candelete" value="on" <? if(@$permission['candelete']=='on')echo "checked";?>/>Delete
		  		<? } ?>    	
		    	&nbsp;<span id="spCheckAllRow"  style="cursor:pointer;"><font color="green">[Checked]</font></span> 
		    	<span id="spUnCheckAllRow" style="cursor:pointer"><font color="red">[UnChecked]</font>&nbsp;All</span>
		    	<? endif;?>
		    </td>
		</tr>
		<? 
		$admin_menu = $this->admin_menu->where('pid='.$sitem['id'])->order_by('order_no','asc')->get();
		foreach($admin_menu as $item):	
			$permission = @$this->db->getrow("SELECT * FROM usertype_detail where menu_id=".$item['id']." AND usertype_id=".$rs['id']);			
		?>
		  <tr>
		    <td><strong><?=$item['title'];?></strong></td> 
		    <td>
		    	<? if ((strpos($item['attr'],'view'))!==FALSE){ ?>
		    	<input type="checkbox" name="canview<?=$item['id'];?>" id="canview" class="checkbox canview" value="on" <? if(@$permission['canview']=='on')echo "checked";?> />View
		    	<? } ?>
		    	<? if ((strpos($item['attr'],'add'))!==FALSE){ ?>
		    	<input type="checkbox" name="canadd<?=$item['id'];?>" id="canadd" class="checkbox canadd" value="on" <? if(@$permission['canadd']=='on')echo "checked";?>/> Add
		    	<? } ?>
		    	<? if ((strpos($item['attr'],'edit'))!==FALSE){ ?>
				<input type="checkbox" name="canedit<?=$item['id'];?>" id="canedit" class="checkbox canedit" value="on" <? if(@$permission['canedit']=='on')echo "checked";?>/>Edit
				<? } ?>
		    	<? if ((strpos($item['attr'],'delete'))!==FALSE){ ?>
		  		<input type="checkbox" name="candelete<?=$item['id'];?>" id="candelete" class="checkbox candelete" value="on" <? if(@$permission['candelete']=='on')echo "checked";?>/>Delete
		  		<? } ?>    	
		    	&nbsp;<span id="spCheckAllRow"  style="cursor:pointer;"><font color="green">[Checked]</font></span> 
		    	<span id="spUnCheckAllRow" style="cursor:pointer"><font color="red">[UnChecked]</font>&nbsp;All</span>
		    </td>
		  </tr>  
		<? endforeach;?>	
<? endforeach;?>			
	</table>
	<div align="center">
				<input type="submit" value="Save" class="btn btn-primary"> 
				<input type="button" value="  Back  " onclick="history.back();" class="btn btn-inverse">
	</div>
</form>