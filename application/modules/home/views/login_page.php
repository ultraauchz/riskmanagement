<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<base href="<?php echo base_url(); ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>ระบบบริหารความเสี่ยง คณะสาธารณสุขศาสตร์ มหาวิทยาลัยมหิดล</title>
	<?php include "themes/front/_css.php";?>
	<?php include "themes/front/_script.php";?>
</head>
<body>

<style type="text/css">
<!--
body {
	background-color: #bed8eb;
}
-->
</style>    
<script>
	$(".btn_show_pass").(function(){
		$(".tr_password").hide();
		$(".tr_email").show();
	})
</script>
<div class="container">
      <form class="form-signin" method="post" action="home/signin">

<table width="390" height="438" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
	<tr>
		<td colspan="3" rowspan="2" background="media/images/login/logiin_01.png"></td>
		<td colspan="5" height="64"></td>
		<td colspan="2" rowspan="2" background="media/images/login/logiin_03.png"></td>
	</tr>
	<tr>
		<td colspan="5">
			<img src="media/images/login/logiin_04.png" width="271" height="102" alt=""></td>
	</tr>
	<tr>
		<td height="44" colspan="10" background="media/images/login/logiin_05.png"></td>
  </tr>
	<tr>
		<td rowspan="5" background="media/images/login/logiin_06.png">
	  </td>
		<td colspan="4">
			<img src="media/images/login/logiin_07.png" width="39" height="38" alt=""></td>
		<td colspan="4" align="left" bgcolor="#def7fd"><input name="username" class="required" placeholder="username" type="text" id="textfield" size="37"></td>
		<td rowspan="5" background="media/images/login/logiin_09.png"></td>
</tr>
	<tr>
		<td height="32" colspan="8" bgcolor="#dff7fd">&nbsp;</td>
  </tr>
	<tr class="tr_password">
		<td colspan="3">
			<img src="media/images/login/logiin_11.png" width="38" height="36" alt=""></td>
		<td colspan="5" align="left" bgcolor="#def7fd"><input name="password" class="required" placeholder="password" type="password" id="textfield2" size="37"></td>
	</tr>
	<tr class="tr_email" style="display:none;">
		<td colspan="3">
			<img src="media/images/login/logiin_11.png" width="38" height="36" alt=""></td>
		<td colspan="5" align="left" bgcolor="#def7fd"><input name="email" class="required" type="email" id="email" size="37"></td>
	</tr>
	<tr>
		<td colspan="5" bgcolor="#e6f8fc">&nbsp;</td>
		<td height="30" colspan="3" bgcolor="#e5f7fc">&nbsp;</td>
	</tr>
	<tr>
	  	<td colspan="5" bgcolor="#e6f8fc" align="right">
	  		<a href="home/forgot_password"><img src="media/images/login/forgot_pass.png" width="119" height="31" style="cursor:pointer; cursor:hand;" ></a>
	  	</td>
		<td colspan="3" bgcolor="#e8f8fc" align="center">			
			<input type="image" src="media/images/login/login.png" width="132" height="31">
		</td>
	</tr>
	<tr>
		<td colspan="10"  height="60" background="media/images/login/logiin_16.png"></td>
	</tr>
	
<tr>
		<td>
			<img src="media/images/login/spacer.gif" width="39" height="1" alt=""></td>
		<td>
			<img src="media/images/login/spacer.gif" width="6" height="1" alt=""></td>
		<td>
			<img src="media/images/login/spacer.gif" width="15" height="1" alt=""></td>
		<td>
			<img src="media/images/login/spacer.gif" width="17" height="1" alt=""></td>
		<td>
			<img src="media/images/login/spacer.gif" width="1" height="1" alt=""></td>
		<td>
			<img src="media/images/login/spacer.gif" width="94" height="1" alt=""></td>
		<td>
			<img src="media/images/login/spacer.gif" width="50" height="1" alt=""></td>
		<td>
			<img src="media/images/login/spacer.gif" width="109" height="1" alt=""></td>
		<td>
			<img src="media/images/login/spacer.gif" width="16" height="1" alt=""></td>
		<td>
			<img src="media/images/login/spacer.gif" width="43" height="1" alt=""></td>
	</tr>
</table>

        
      </form>
</div> <!-- /container -->
</body>
</html>