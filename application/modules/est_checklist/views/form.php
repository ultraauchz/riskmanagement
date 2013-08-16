<script type="text/javascript" src="media/js/jquery.validate.min.js"></script>
 <style type="text/css">
.commentForm label { color:red; }
.commentForm label.error{ color:red; }
.status{color:red;}
.txtRed {color: #ea0000;}
</style>
<script type="text/javascript">
$(function(){
	$(function(){
        	$('[name=sectionid]').chainedSelect({parent: '[name=divisionid]',url: 'risk_est/report_section',value: 'id',label: 'text'});
    });
	
	$("select[name=year_data]").change(function(){
	 	var year_data = $(this).val();
		 $.post('est_checklist/load_est_detail_form',{
		   	'year_data': year_data
		  },function(data){
		   	$("#est_form_detail").html(data);
		  });
	})
	$(function(){
	 	var year_data = $('select[name=year_data]').val();
		 $.post('est_checklist/load_est_detail_form',{
		   	'year_data': year_data
		  },function(data){
		   	$("#est_form_detail").html(data);
		  });
	})
	
	$(".commentForm").validate({
	rules: 
	{
		year_data: 
		{ 
			required: true
		},
		divisionid: 
		{ 
			required: true
		},
		sectionid: 
		{ 
			required: true
		},
		est_name: 
		{ 
			required: true
		}
	},
	messages:
	{
		year_data:
		{
			required: " กรุณาเลือกปีงบประมาณ"
		},
		divisionid: 
		{ 
			required: " กรุณาเลือกกลุ่มวิชา"
		},
		sectionid: 
		{ 
			required: " กรุณาเลือกภาควิชา"
		},
		est_name: 
		{ 
			required: " กรุณาระบุชื่อผู้ประเมิน"
		}
	}
	});
	
	 
});
</script>
<h3>การประเมินองค์ประกอบของการควบคุมภายใน [เพิ่ม / แก้ไข]</h3>
<div></div>
<form enctype="multipart/form-data" method="post" action="<? echo $urlpage?>/save" class="commentForm">
<table class="table table-form table-bordered table-striped table-horizontal"> 
		<tr>
		<td>ปีงบประมาณ</td>
		<td><?=form_dropdown('year_data',get_option('year_data','year_data as year','est_title where year_data != " "'),@$rs['year_data'],'','แสดงทุกปี');?></td>
		</tr>
		<tr>
		<th width="400px">กลุ่มวิชา</th>
		<td><?=form_dropdown('divisionid',get_option('id','title','division order by title '),@$rs['divisionid'],'style="width:350px"','--เลือกกลุ่มวิชา--');?></td>
	</tr>
	<tr>
	  <th width="400px">ภาควิชา</th>
	  <td><?=form_dropdown('sectionid',get_option('id','title','section order by title '),@$rs['sectionid'],'style="width:370px"','--เลือกภาควิชา--');?></td>
  	</tr>	
    <tr>
	  <th width="400px">ชื่อผู้ประเมิน</th>
	  <td><input type="text" name="est_name" value="<?=@$rs['est_name']?>" style="width:370px" /></td>
    </tr>	         
	</table>
<div id="est_form_detail">
	กรุณาเลือกปีงบประมาณ	
</div>
	<div align="center">
		        <input type="hidden" name="id" value="<?=$id;?>">
				<input type="submit" value="Save" class="btn btn-primary"> 
				<input type="button" value="  Back  " onclick="history.back();" class="btn btn-inverse">
	</div>
</form>