<h3>ข้อมูลพื้นฐาน > รายละเอียดโครงการ</h3>
<div></div>
<? if(permission(61, 'canedit')=='on'){ ?>
<div style="padding:10px; text-align:right;">
	<a href="detail/detail_form" class="btn btn-primary">แก้ไข</a>
</div>
<? }?>
<form enctype="multipart/form-data" method="post" action="<? echo $urlpage?>/detail_save" class="commentForm">
<table class="table table-form table-bordered table-striped table-horizontal"> 
	
	<tr>
			<td><?=@$result['detail']?></td>
	</tr>		        
	</table>	
</form>