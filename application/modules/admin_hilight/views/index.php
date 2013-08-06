<h3><span style="color:#92B101">Hilight</span></h3>
<div class="corner">
   
   <a href="admin_hilight/form">New</a>
   
   <?=$pagination;?>
   <table class="tblist2">
        <tr>
            <th width="30">No.</th>
            <th>Image</th>
            <th width="30"></th>
            <th width="30"></th>
            <th width="120">Manage</th>
        </tr>
       <?php 
          $rowStyle = 'class="alternate-row"';
          $page = (isset($_GET['page']))? $_GET['page']:1;
          $i= (($page -1)* 12)+1;
          foreach($hilights as $hilight):
        ?>
        <tr>
            <td><?=$i;?></td>
            <td><img src="<?=$hilight['image'];?>" width="680" height="264"></td> 
            <td align="center">
			  	<? if(permission($menu_id, 'canedit')!=''){ ?>
			  	<? if($hilight['show_no']<$max_no){?>
			  	<a href="admin_hilight/ordering?mode=up&id=<?=$hilight['id'];?>&page=<?=@$page;?>">
			  	<img src="images/up.gif">   
			  	</a>
			  	<? } ?>
			  	<? } ?>
			  </td>
			  <td align="center">
			  	<? if(permission($menu_id, 'canedit')!=''){ ?>
			  	<? if($hilight['show_no']>$min_no){?>
			  	<a href="admin_hilight/ordering?mode=down&id=<?=$hilight['id'];?>&page=<?=@$page;?>">
			  	<img src="images/down.gif">
			  	</a>
			  	<? } ?>
			  	<? } ?>
			  </td>	
            <td class="options-width">
            <a href="admin_hilight/form/<?=$hilight['id'];?>" title="Edit" class="icon-1 info-tooltip"></a>
            <a href="admin_hilight/delete/<?=$hilight['id'];?>" onclick="return confirm('<?php echo NOTICE_CONFIRM_DELETE?>')" title="Delete" class="icon-2 info-tooltip"></a>
            </td>
        </tr>
        <? 
            $i++;
            endforeach;
        ?>
    </table>
    <?=$pagination;?>
    
    <br clear="all">
</div>