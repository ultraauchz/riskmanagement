<!-- side menu start -->
<?
$lang= GetCurrLang(); 
$curr_th_url = GetCurrURL($lang,'th');
$curr_en_url = GetCurrURL($lang,'en');

$lbl_register_menu = $lang=='th' ? LBL_REGISTER_MENU_TH : LBL_REGISTER_MENU_EN;

$lbl_edit_profile = $lang == 'th' ? LBL_EDIT_PROFILE_TH : LBL_EDIT_PROFILE_EN;
$lbl_order_history = $lang == 'th' ? LBL_ORDER_HISTORY_TH : LBL_ORDER_HISTORY_EN;
$lbl_member_cart = $lang == 'th' ? LBL_MEMBER_CART_TH : LBL_MEMBER_CART_EN;
$lbl_logout = $lang == 'th' ? LBL_USER_LOGOUT_TH : LBL_USER_LOGOUT_EN;

$lbl_adv_search_menu = $lang =='th' ? LBL_ADV_SEARCH_MENU_TH : LBL_ADV_SEARCH_MENU_EN;
$lbl_terms_menu = $lang =='th' ? LBL_TERMS_MENU_TH : LBL_TERMS_MENU_EN;
$lbl_forgot_menu = $lang =='th'? LBL_FORGOT_MENU_TH : LBL_FORGOT_MENU_EN;
$txt_quick_search_tmp  = $lang=='th' ? TXT_QUICK_SEARCH_TMP_TH : TXT_QUICK_SEARCH_TMP_EN;

$lbl_cart_item = $lang =='th' ? 'จำนวนสินค้า' : 'Total';
$lbl_cart_total = $lang =='th' ? 'จำนวนเงิน' : 'Total'; 
$lbl_cart_itemdesc = $lang =='th' ? 'รายการ' : 'items'; 
$lbl_cart_totaldesc = $lang =='th' ? 'บาท' : 'Baht';  
?> 
<script type="text/javascript">
	function register_subscribe()
	{
		var email = $("input[name=q_newsletter]").val();
		
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
			$.post('admin_subscribe/register',{
			'email' : email
			},function(data){
				alert('register complete thank you.');
				$("input[name=q_newsletter]").val('');
			})
		}
		else{
			alert("Invalid E-mail Address! Please re-enter.")			
			return false;
		}
		
	}
	$(document).ready(function(){
		var cursor_down = 'images/icon-arrow-down.png';
		var cursor_up = 'images/icon-arrow-up.png';
		$(".morecat").hide();
		$(".showall").live("click",function(){
			$(".morecat").toggle('slow', function() {
			    // Animation complete.
			    	if($("#arrow_down").attr("src")==cursor_down)
			    		$("#arrow_down").attr("src",cursor_up);
			    	else
			    		$("#arrow_down").attr("src",cursor_down);
			  })
			//if($("#arrow_down").attr("src")==			
		})
	})
</script>
<style type="text/css">
.sidebarmenu {background:url(images/<?=$lang;?>/side_menu_categories.gif) no-repeat top center; padding-top: 54px; padding-bottom: 5px; border: #e7e7e7 solid 1px; font-size: 13px; margin-bottom:10px;}
</style>
<div class="side_container">
<div class="sidebarmenu">
<ul id="sidebarmenu1">
<? echo GenCategoryMenu(0,$lang);?>
<?
if($this->db->getone("SELECT COUNT(*) FROM product_category")>5){ 
?>
<? if($lang=='en'){?>
<li class="showall" style="cursor: pointer;margin-bottom: -4px;"><b>All Products <img id="arrow_down" src="images/icon-arrow-down.png" border="0" style="margin-bottom: -5px;"></b></li>
<? }else { ?>
<li class="showall" style="cursor: pointer;margin-bottom: -4px;"><b>ดูประเภทสินค้าทั้งหมด   <img id="arrow_down"  src="images/icon-arrow-down.png" border="0" style="margin-bottom: -5px;"></b></li>
<? } ?>
<?} ?>
</ul>
</div>
<? if(is_login()){ ?>
<div class="yourcart_login_<?=$lang;?>">
<div><img src="images/bg_top_yourcart.gif"/></div>
<div class="bg">
	
	<div class="member_login_b" style="height:34px; width: 230px; position: relative; margin-bottom:10px;">
	<div class="panel">
    	<p style="margin-bottom:0px;"><b>
    		<a href="manager_profile/profile/<?=$lang;?>"><?=login_data('name');?></a></b> 
    		<a href="home/ulogout/<?=$lang;?>"><img src="images/icon/logout.png" class="vtip" title="<?=$lbl_logout;?>"></a>
    	</p>
    </div>
	</div>
	<div style="border-bottom:solid 1px #ccc; margin:5px 10px 0 10px;"></div>
<div style="padding-left:15px; margin-bottom:5px;">
	<a href="cart/index/<?=$lang;?>" style="color:#D50016; font-size:13px;"><img src="images/icon/cart.png" class="vtip" style="margin-bottom:-7px" title="<?=$lbl_member_cart;?>">
		<strong> <? echo $lbl_member_cart;?></strong>
	</a>
	<br>
	<div style="padding-top:10px;"><?=$lbl_cart_item;?> : <strong><?=@GetCartItem();?></strong> <?=$lbl_cart_itemdesc;?></div>
	<div style="padding-top:2px;"><?=$lbl_cart_total;?> : <strong><?=number_format(@GetCartTotal(),2);?></strong> <?=$lbl_cart_totaldesc;?></div>
</div>
<div id="dv_data_cart">
<?
if(@$_SESSION['cart']!='')
{
	$i=0;
	foreach($_SESSION['cart'] as $item):		
		if($item['id']>0 && $item['qty'] > 0 ){
			$product = GetProductDetail($item['id']);
			$i++;
			echo "<span>".$i.") ".$product['name_'.$lang]." <b>[".$item['qty']."]</b></span>";	
		}
	endforeach;
?>
<? }else{
	$lbl_none_product = $lang=='th' ? 'ไม่มีรายการสินค้าในตะกร้า' : 'Your cart is empty.';
	echo "<span><b>".$lbl_none_product."</b></span>";
} ?>
</div>
</div>
<div><img src="images/bg_bot_yourcart.gif" /></div>
</div>	

<div class="q_newsletter magbttm10">
<form id="frm_newsletter" name="frm_newsletter" method="post" action="">
	<input name="q_newsletter" id="q_newsletter" type="text"  onmousedown="this.value=''" value="Enter Your E-mail"/>
	<img src="images/<?=$lang;?>/button_subscribe.gif" width="66" height="20" onclick="register_subscribe();"/>
</form></div>
<? }else{ ?>
<div class="yourcart_<?=$lang;?>">
<div><img src="images/bg_top_yourcart.gif"/></div>
<div class="bg">

<div class="member_login" style=" height: 70px; width: 230px; position: relative; margin-bottom:10px;">
<div style="padding-top: 2px;padding-left: 160px;"><a href="register/index/<?=$lang;?>"><?=$lbl_register_menu;?></a></div>
<form action="" method="post" name="frm_login" id="frm_login">
	<input name="q_user" type="text"  onmousedown="document.frm_login.q_user.value=''" value="<? if(@$_POST['q_user']=='')echo 'E-mail'; else echo  $_POST['q_user'];?>"  class="user"/>
    <input name="q_pass" type="password"  onmousedown="document.frm_login.q_pass.value=''" value="Password" class="password"/>
    <span class="forgot" style="border-bottom: 0px;"><a href="manager_profile/forgot/<?=$lang;?>" ><?=$lbl_forgot_menu;?></a>   </span>
    <input type="image" src="images/btn_login_<?=$lang;?>.gif" width="46" height="20" class="img"/>
</form>
</div>
	
<div style="padding-bottom:20px;"></div>
<div style="padding-left:15px; margin-bottom:5px;">
	<a href="cart/index/<?=$lang;?>" style="color:#D50016; font-size:13px;"><img src="images/icon/cart.png" class="vtip" style="margin-bottom:-7px" title="<?=$lbl_member_cart;?>">
		<strong> <? echo $lbl_member_cart;?></strong>
	</a>
	<br>
	<div style="padding-top:10px;"><?=$lbl_cart_item;?> : <strong><?=@GetCartItem();?></strong> <?=$lbl_cart_itemdesc;?></div>
	<div style="padding-top:2px;"><?=$lbl_cart_total;?> : <strong><?=number_format(@GetCartTotal(),2);?></strong> <?=$lbl_cart_totaldesc;?></div>
</div>
<div id="dv_data_cart">
<?
if(@$_SESSION['cart']!='')
{
	$i=0;
	foreach($_SESSION['cart'] as $item):		
		if($item['id']>0 && $item['qty'] > 0 ){
			$product = GetProductDetail($item['id']);
			$i++;
			echo "<span>".$i.") ".$product['name_'.$lang]." <b>[".$item['qty']."]</b></span>";	
		}
	endforeach;
?>
<? }else{
	$lbl_none_product = $lang=='th' ? 'ไม่มีรายการสินค้าในตะกร้า' : 'Your cart is empty.';
	echo "<span><b>".$lbl_none_product."</b></span>";
} ?>
</div>
</div>
<div><img src="images/bg_bot_yourcart.gif" /></div>
</div>	

<div class="q_newsletter magbttm10"><form id="frm_newsletter" name="frm_newsletter" method="post" action="">
	<input name="q_newsletter" id="q_newsletter" type="text"  onmousedown="this.value=''" value="Enter Your E-mail"/>
	<img src="images/<?=$lang;?>/button_subscribe.gif" width="66" height="20" onclick="register_subscribe();"/>
</form></div>
<a href="register/index/<?=$lang;?>"><img src="images/<?=$lang;?>/ban_register.gif" border="0" class="magbttm10" /></a>
<? } ?>

<? 
$left_banner = GetLeftBanner();
foreach($left_banner as $item):
	$url = $item['bannerlink_'.$lang]=='' ? $_SERVER["REQUEST_URI"].'#' : $item['bannerlink_'.$lang];
	echo '<a href="'.$url.'"><img src="banner/left/'.$item['bannerimage'].'" width="230" border="0" class="magbttm10" /></a>';
endforeach; 
?>
</div>
<!-- side menu end -->