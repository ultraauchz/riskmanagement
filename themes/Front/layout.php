<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<base href="<?php echo base_url(); ?>" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title><?php echo $template['title']; ?></title> 		
		<link rel="stylesheet" href="themes/admin/media/css/pagination.css" type="text/css" media="screen" charset="utf-8" />		
		<link rel="stylesheet" href="themes/admin/media/css/stylesheet.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet"  type="text/css" href="js/jquery.datepick/redmond.datepick.css"  />
		<link rel="stylesheet" type="text/css" media="screen"  href="css/colorbox.css" /> 
		<link rel="stylesheet"  href="css/jquery.treeview.css" />
		<link rel="stylesheet" href="css/iphone_checkbox.css" type="text/css" media="screen" charset="utf-8" />
		<link type="text/css" rel="stylesheet" href="css/jquery-ui.css" />
		<link type="text/css" rel="stylesheet" href="css/ui.notify.css" />
		<link type="text/css" rel="stylesheet" href="css/jquery.lightbox-0.5.css" />
  
		<script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.min.js" type="text/javascript"></script>
		<script src="js/jquery.colorbox.js" type="text/javascript"></script>        
   		<script src="js/jquery.rowcount-1.0.js" type="text/javascript"></script>
   		<script src="js/jquery.treeview.js" type="text/javascript"></script>
   		<script src="js/jquery.meio.mask.js" type="text/javascript"></script>
   		<script src="js/NumberFormat154.js" type="text/javascript"></script>        
        <script type="text/javascript" src="js/jquery.datepick/jquery.datepick.js"></script>
        <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
		
  		<script src="js/iphone-style-checkboxes.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.notify.min.js" type="text/javascript"></script>  				
		<script type="text/javascript" src="js/validate.js"></script>
		<script type="text/javascript" src="js/jquery.livequery.js"></script>  			  				
		<script type="text/javascript">
		$(document).ready(function(){
			$('.datepicker').datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'js/jquery.datepick/calendar_ico.gif'});
			$(".browse-file").prev("input[type=text]").css("width","300px");
		})
		</script>    
		<style>
body {
	
	background-image:-webkit-gradient(linear,left top,left bottom,from( #ffffff ),to( #b5e3e3 ));
	background-image:-webkit-linear-gradient( #ffffff,#b5e3e3 );
	background-image: -moz-linear-gradient( #ffffff,#b5e3e3 );
	background-image: -ms-linear-gradient( #ffffff,#b5e3e3);
	background-image: -o-linear-gradient( #ffffff,#b5e3e3 );
	background-image: linear-gradient( #ffffff,#b5e3e3 );
}


		</style>
	</head>
	<body>
		<!-- 
	<div id="header"><?php include_once('_header.inc.php'); ?></div>
	--> 
		<div id="container">
			
<table width="818" height="718" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="4"></td>
		<td colspan="2"><img src="images/logo.png" width="212" height="61"></td>
		<td>
			<img src="images/spacer.gif" width="1" height="60" alt=""></td>
	</tr>
	<tr>
		<td align="right"><img src="images/monitor.png" width="165" height="117"></td>
		<td colspan="5">ระบบลงทะเบียนการอบรมเชิงปฏิบัติการ</td>
		<td>
			<img src="images/spacer.gif" width="1" height="127" alt=""></td>
	</tr>	
	<tr>
		<td colspan="6">
			<?php echo $template['body']; ?>
        </td>
		<td>
			<img src="images/spacer.gif" width="1" height="112" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/spacer.gif" width="183" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="167" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="85" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="172" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="179" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="31" height="1" alt=""></td>
		<td></td>
	</tr>
</table> 
		</div> 
		 
	</body>
</html>