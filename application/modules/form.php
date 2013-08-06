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
<h3>Admin Group Management [Add / Edit Form]</h3>
<div></div>
<form enctype="multipart/form-data" method="post" action="admin_usergroup/save">
	<table class="tblist2">
		<tr>
			<th width="150px">Name</th>
			<td>
            	<input type="hidden" name="id" value="<?=@$rs['id'];?>" />
            	<input type="text" name="name" value="<?=@$rs['name'];?>" size="60" /> <span class="txtOrange">*</span>
            &nbsp;</td>
		</tr>
		<tr>
			<th width="150px">Permission/th>
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
    <td></td>
  </tr>
<? 
for($i=1;$i<count($menu_name);$i++):	
	$permission = @$this->db->getrow("SELECT * FROM usertype_detail where menu_id=".$i." AND usertype_id=".$rs['id']);
?>
  <tr>
    <td><strong><?=$i.' '.$menu_name[$i];?></strong></td> 
    <td>
    	<input type="checkbox" name="canview<?=$i;?>" id="canview" class="checkbox canview" value="1" <? if(@$permission['canview']!='')echo "checked";?> />View
    	<input type="checkbox" name="canadd<?=$i;?>" id="canadd" class="checkbox canadd" value="1" <? if(@$permission['canadd']!='')echo "checked";?>/> Add
		<input type="checkbox" name="canedit<?=$i;?>" id="canedit" class="checkbox canedit" value="1" <? if(@$permission['canedit']!='')echo "checked";?>/>Edit
  		<input type="checkbox" name="candelete<?=$i;?>" id="candelete" class="checkbox candelete" value="1" <? if(@$permission['candelete']!='')echo "checked";?>/>Delete
    	&nbsp;<span id="spCheckAllRow"  style="cursor:pointer;"><font color="green">[Checked]</font></span> 
    	<span id="spUnCheckAllRow" style="cursor:pointer"><font color="red">[UnChecked]</font>&nbsp;All</span>
    </td>
  </tr>
<? endfor;?>		
		<tr>			
			<td colspan="2" align="center">				
				<input type="submit" value="Save" class=""> 
				<input type="button" value="  Back  " onclick="history.back();"> 
			</td>
		</tr>
	</table>
</form>