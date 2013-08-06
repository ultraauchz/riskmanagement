<?
if(@$_POST['q_user']!='')
{
	if(!login($_POST['q_user'],$_POST['q_pass']))
	{
		 	echo "<script>alert(' ไม่ถูกต้องกรุณาลองใหม่อีกครั้ง');</script>";
	}
}
$lang= GetCurrLang(); 
$curr_th_url = GetCurrURL($lang,'th');
$curr_en_url = GetCurrURL($lang,'en');
$lbl_edit_profile = $lang == 'th' ? LBL_EDIT_PROFILE_TH : LBL_EDIT_PROFILE_EN;
$lbl_order_history = $lang == 'th' ? LBL_ORDER_HISTORY_TH : LBL_ORDER_HISTORY_EN;
$lbl_member_cart = $lang == 'th' ? LBL_MEMBER_CART_TH : LBL_MEMBER_CART_EN;
$lbl_logout = $lang == 'th' ? LBL_USER_LOGOUT_TH : LBL_USER_LOGOUT_EN;

$lbl_adv_search_menu = $lang =='th' ? LBL_ADV_SEARCH_MENU_TH : LBL_ADV_SEARCH_MENU_EN;
$lbl_terms_menu = $lang =='th' ? LBL_TERMS_MENU_TH : LBL_TERMS_MENU_EN;
$lbl_forgot_menu = $lang =='th'? LBL_FORGOT_MENU_TH : LBL_FORGOT_MENU_EN;
$txt_quick_search_tmp  = $lang=='th' ? TXT_QUICK_SEARCH_TMP_TH : TXT_QUICK_SEARCH_TMP_EN; 
?>
<div class="top_container">
<img src="images/logo.jpg" class="top_logo" />
<div class="top_login_exist"><span><i>Shopping Cart: </i>now in your cart 
	<b><a href="cart/index/<?=$lang;?>" class="cart"><? echo count(@$_SESSION['cart']);?> items</a></b></span>
</div>
<div class="top_menu1"><a href="<?=$curr_th_url;?>"><img src="images/button_thai.gif" border="0" /></a><a href="<?=$curr_en_url;?>"><img src="images/button_eng.gif" border="0" /></a></div>
<div class="top_menu2 txt_top"><a href="advance_search/index/<?=$lang;?>"><?=$lbl_adv_search_menu;?></a> | <a href="term/index/<?=$lang;?>"><?=$lbl_terms_menu;?></a></div>
</div>
<!-- header end -->


<!-- top menu start -->
<div class="head_menu">
	<a href="home/index/<?=$lang;?>"" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menua_1','','images/<?=$lang;?>/menub_01.gif',1)">
		<img src="images/<?=$lang;?>/menua_01.gif" name="menua_1" width="86" height="40" border="0" id="menua_1" />
	</a>
<div class="q_search">
	<form id="frm_search" name="frm_search" action="quick_search/index/<?=$lang;?>">
		<input name="q_search" type="text"  onmousedown="document.frm_search.q_search.value=''" value="<?=$txt_quick_search_tmp;?>"/>		
		<input type="image" src="images/button_search.gif" style="width:11px; height:12px;position: absolute; top: 14px; left: 157px; border: 0px;" class="q_search_image" />		
	</form>
</div>
<a href="product/index/<?=$lang;?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menua_2','','images/<?=$lang;?>/menub_02.gif',1)">
	<img src="images/<?=$lang;?>/menua_02.gif" name="menua_2"  border="0" id="menua_2" />
</a>
<a href="promotion/index/<?=$lang;?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menua_3','','images/<?=$lang;?>/menub_03.gif',1)">
	<img src="images/<?=$lang;?>/menua_03.gif" name="menua_3"  border="0" id="menua_3" />
</a><a href="news/index/<?=$lang;?>"" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menua_4','','images/<?=$lang;?>/menub_04.gif',1)">
	<img src="images/<?=$lang;?>/menua_04.gif" name="menua_4"  border="0" id="menua_4" />
</a><a href="payment_agree/index/<?=$lang;?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menua_5','','images/<?=$lang;?>/menub_05.gif',1)">
	<img src="images/<?=$lang;?>/menua_05.gif" name="menua_5"  border="0" id="menua_5" />
</a>
<a href="shipping/index/<?=$lang;?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menua_6','','images/<?=$lang;?>/menub_06.gif',1)">
	<img src="images/<?=$lang;?>/menua_06.gif" name="menua_6"  border="0" id="menua_6" />
</a>
<a href="contact/index/<?=$lang;?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('menu_a7','','images/<?=$lang;?>/menub_07.gif',1)">
	<img src="images/<?=$lang;?>/menua_07.gif" name="menu_a7"  border="0" id="menu_a7" />
</a>
</div>