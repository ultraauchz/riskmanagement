<div class="light_blue">  
<ul id="mega-menu-6" class="mega-menu unstyled">
<? 
$admin_system = $this->db->getarray("SELECT * FROM admin_menu where pid = 0 ORDER BY order_no ");	
foreach($admin_system as $system):
	$url = $system['url']!='' ? $system['url'] : '#';
	echo '<li><a href="'.$url.'">'.$system['title']."</a>";
	$admin_menu = $this->db->getarray("SELECT * FROM admin_menu WHERE pid=".$system['id']." order by order_no ");
	if(count($admin_menu) >0)echo '<ul>';
	foreach($admin_menu as $item):	
		 if(permission($item['id'],'canview')){
		 	echo '<li><a href="'.$item['url'].'">'.$item['title'].'</a></li>';
		 } 
	 endforeach;
	 if(count($admin_menu) >0)echo '</ul>';
	 echo '</li>'; 
endforeach;
?>
</ul>
</div>