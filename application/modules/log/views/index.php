<h3>Admin Log Management</h3>
<fieldset>
<form>
<div>
		<div style="display: inline">Product Status
			<select name="action">
				<option value=""  <? if(@$_GET['action']=='')echo 'selected="selected"';?>>All</option>
				<option value="View" <? if(@$_GET['action']=='View')echo 'selected="selected"';?>>View</option>
				<option value="Add"  <? if(@$_GET['action']=='Add')echo 'selected="selected"';?>>Add</option>
				<option value="Update"  <? if(@$_GET['action']=='Update')echo 'selected="selected"';?>>Update</option>
				<option value="Delete"  <? if(@$_GET['action']=='Delete')echo 'selected="selected"';?>>Delete</option>
				<option value="Log in"  <? if(@$_GET['action']=='Log in')echo 'selected="selected"';?>>Log in</option>
				<option value="LogOut"  <? if(@$_GET['action']=='LogOut')echo 'selected="selected"';?>>LogOut</option>
			</select>			
		</div>
		<p></p>
		<div style="display: inline;">Menu          	
        	<select name="menu">
        		<option value="">-- select menu --</option>
        		<? foreach($admin_menu as $item):
				$selected = $item['id']==@$_GET['menu'] ? 'selected="selected"' : "";
				echo '<option value="'.$item['id'].'" '.$selected.'>'.$item['title'].'</option>';
				endforeach;
				?>
        	</select>
        </div>
        <p></p>		    	            	
	Search  (users email/name): <input type="text" name="search" value="<?=@$_GET['search'];?>" size="60">
	<input type="submit" name="submit" value="Search">	
</div> 
</form>
</fieldset>
<div id="paging" class="pagination">
<?php echo $pagination;?>
</div>

	<table class="table table-form table-bordered table-striped table-horizontal">
		<tr class="head">
			<th></th>
			<th>Name</th>
			<th>Menu</th>
			<th>Action</th>
			<th>Description</th>
			<th>Register Date</th>
			<th>IP Address</th>
		</tr>
		<?php 
		  $rowStyle = '';
		  $page = (isset($_GET['page']))? $_GET['page']:1;
		  $i=(isset($_GET['page']))? (($_GET['page'] -1)* 10)+1:1;
		  foreach($result as $row):
		?>  
		<tr  <? if($rowStyle =='')$rowStyle = 'class="odd"';else $rowStyle = "";echo $rowStyle;?> >
		  <td><?=$i;?></td>
		  <td >
		  	<?=$row['username'];?>
		  </td>		  
		  <td>
		  	<?
		  	if($row['menu_id']==98)
			{
				echo "Log In";
			}
			else if($row['menu_id']==99)
			{
				echo "Log Out";
			}
			else
			{		  		
				echo GetMenuProperty($row['menu_id'],'title');
			}
		  	?>
		  </td>
		  <td >
		  	<?=$row['action'];?> 
		  </td>
		   <td >
		  	<?=$row['description'];?> 
		  </td>
		  <td >
		  	<?=$row['action_date'];?> 
		  </td>		  
		  <td align="center" ><?=$row['ipaddress'];?></td>		  
		  </tr>
		<tr>
		<? 
				$i++;
		  		endforeach; 
?>		
	</table>
