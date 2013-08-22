<script type="text/javascript" src="media/js/jquery.validate.min.js"></script>
 <style type="text/css">
.commentForm label { color:red; }
.commentForm label.error{ color:red; }
.status{color:red;}
.txtRed {color: #ea0000;}
</style>
<script type="text/javascript">
$(function(){
	$("select[name=year_data]").change(function(){
	 	var year_data = $("select[name=year_data]").val();
	 	var section_id = $("select[name=sectionid]").val();
	 	if(year_data != '' && section_id != ''){
		 $.post('est_checklist/load_est_detail_form/<?=$id?>',{
		   	'year_data': year_data,
		   	'sectionid': section_id
		  },function(data){
		   	$("#est_form_detail").html(data);
		  });
		 }
	})
	$("select[name=sectionid]").change(function(){
	 	var year_data = $("select[name=year_data]").val();
	 	var section_id = $("select[name=sectionid]").val();
	 	if(year_data != '' && section_id != ''){
		 $.post('est_checklist/load_est_detail_form/<?=$id?>',{
		   	'year_data': year_data,
		   	'sectionid': section_id
		  },function(data){
		   	$("#est_form_detail").html(data);
		  });
		 }
	})
	$(function(){
	 	var year_data = $('select[name=year_data]').val();
		 $.post('est_checklist/load_est_detail_form/<?=$id?>',{
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
		sectionid: 
		{ 
			required: true
		},
		est_name: 
		{ 
			required: true
		},
		est_date: 
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
		sectionid: 
		{ 
			required: " กรุณาเลือกภาควิชา/งาน"
		},
		est_name: 
		{ 
			required: " กรุณาระบุชื่อผู้ประเมิน"
		},
		est_date: 
		{ 
			required: " กรุณาระบุวันที่ประเมิน"
		}
	}
	});
	
	jQuery.extend(jQuery.validator.messages, {
    	required: "กรุณาเลือก"
	});
	 
});
</script>
<h3>การประเมินองค์ประกอบของการควบคุมภายใน [เพิ่ม / แก้ไข]</h3>
<div></div>
<form enctype="multipart/form-data" method="post" action="<? echo $urlpage?>/save" class="commentForm">
<table class="table table-form table-bordered table-striped table-horizontal"> 
		<? if(permission($menu_id, 'can_access_all')=='on'){ ?>
		<script>
    	$(function(){
        	$('[name=sectionid]').chainedSelect({parent: '[name=section_type_id]',url: 'est_checklist/report_section',value: 'id',label: 'text'});
    	});
		</script>
			<? $year=form_dropdown('year_data',get_year_option(),@$rs['year_data'],'','--เลือกปี--');?>
			<? $section = form_dropdown('sectionid',get_option('id','title','section order by section_type_id asc, title asc'),@$rs['sectionid'],'style="width:370px"','แสดงภาควิชา/งาน');?>
		<? }else{ ?>	
			<? $year=form_dropdown('year_data',get_year_option(),@$rs['year_data'],'','--เลือกปี--');?>
			<? $section=form_dropdown('sectionid',get_option('id','title','section where id = "'.@$result1['id'].'" order by title '),@$rs['sectionid'],'style="width:370px"');?>
		<? } ?>	
		<tr>
		<td>ปีงบประมาณ</td>
		<td><?=$year?></td>
		</tr>
		<tr>
	  	<th width="400px">ภาควิชา/งาน</th>
	  	<td><?=$section?></td>
  		</tr>		         
	</table>
<div id="est_form_detail">	
</div>

</form>