<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
tiny('detail');
</script>

<script type="text/javascript" src="js/jquery.validate.min.js"></script>
 <style type="text/css">
.commentForm label { color:red; }
.commentForm label.error{ color:red; }
.status{color:red;}
.txtRed {color: #ea0000;}
</style>
<h3>ข้อมูลพื้นฐาน > จัดการข้อมูลคำธิบายแนวทางการจัดการความเสี่ยง[แก้ไข]</h3>
<div></div>
<form enctype="multipart/form-data" method="post" action="<? echo $urlpage?>/explanation_risk_save" class="commentForm">
<table class="table table-form table-bordered table-striped table-horizontal"> 
	
	<tr>
			<td width="150px"><strong>รายละเอียด</strong></td>
			<td>
            	<input type="hidden" name="id" value="<?=@$result['id'];?>" />
            	<textarea name="detail" cols="50" rows="80"><?=@$result['detail'];?></textarea> <span class="status">*</span>
            &nbsp;</td>
		</tr>		        
	</table>
	<div align="center">
				<input type="submit" value="Save" class="btn btn-primary"> 
				<input type="button" value="  Back  " onclick="history.back();" class="btn btn-inverse">
	</div>
</form>