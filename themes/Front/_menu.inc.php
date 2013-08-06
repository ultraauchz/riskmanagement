<ul class="menu">
<?/* 
$admin_system = $this->db->getarray("SELECT * FROM menu where pid = 0 ORDER BY order_no ");	
foreach($admin_system as $system):
	echo '<li style="height:30px;padding-top:10px;padding-left:5px;background-color:#92B101;color:#FFFFFF;font-weight:bold;">'.$system['title'].'</li>';
	$admin_menu = $this->db->getarray("SELECT * FROM admin_menu WHERE pid=".$system['id']." order by order_no ");
	foreach($admin_menu as $item):	
		 if(permission($item['id'],'canview')){
		 	echo '<li style="padding-left:5px;"><a href="'.$item['url'].'">'.$item['title'].'</a></li>';
		 } 
	 endforeach; 
endforeach;
 * 
 */
?>					
</ul>