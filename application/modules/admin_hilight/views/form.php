<script type="text/javascript" src="themes/admin/media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="themes/admin/media/tiny_mce/config.js"></script>
<script type="text/javascript">
tiny('detail');
</script>
<h3><span style="color:#92B101">Hilight</span>  [Add / Edit Form]</h3>

<div class="corner">
    <form enctype="multipart/form-data" method="post" action="admin_hilight/save">
        <table class="tblist2">
            <tr>
                <th valign="top">Image (680x264px) :</th>
                <td>
                	<div id="dv_image">
                		<? 
                			if($hilight['image']!=''){
                		?>
                			<img src="<?=$hilight['image'];?>">
                		<? } ?>
					</div>
                    <input type="text" name="image" value="<?php echo $hilight['image']?>"/>
                    <div class="browse-file" onclick="browser($(this).prev(),'Hilight')"></div> 
                    
                </td>
            </tr>
            <tr>
            	<th valign="top">Title</th>
            	<td>
            		<input type="text" name="title" value="<?=@$hilight['title'];?>" size="100">
            	</td>
            </tr>
            <tr>
            	<th valign="top">Detail</th>
            	<td>
            		<textarea name="detail" class="myeditor" cols="80" rows="4"><?=@$hilight['detail'];?></textarea>
            	</td>
            </tr>
            <tr>
                <th>URL:</th>
                <td><input name="url" type="text" value="<?=@$hilight['url'];?>" style="width: 300px;"/>  ***http://www.example.com</td>
            </tr>
            <tr>
                <th>Target:</th>
                <td>
                    <select name="target">
                        <option value="_self" <?=($hilight['target']=="_self")?"selected":"";?>>_self</option>
                        <option value="_blank" <?=($hilight['target']=="_blank")?"selected":"";?>>_blank</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>         
                <td align="center">
                    <input type="hidden" name="id" value="<?=@$hilight['id']?>">
                    <input type="submit" value="Save">
                    <input type="button" value="Back" onclick="history.back();" class="form-reset"> 
                </td>
            </tr>
        </table>
    </form>
</div>