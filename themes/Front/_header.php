<div id="bgheader">
	<div id="header">		
		
	</div>
	<div style="text-align:right;margin-top:-20px;">
		<?php if(is_login()):?>
		<span>เข้าสู่ระบบโดย <a href="user/user_profile" class="link_login"><?php echo login_data('name')?> </a> </span>
		| <a href="home/signout">ออกจากระบบ</a>
		<?php // echo login_data('USER_TYPE_ID')?>
		<?php endif;?>
	</div>		
</div>