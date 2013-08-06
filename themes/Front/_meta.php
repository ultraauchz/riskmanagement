
<link rel="stylesheet" href="css/template_css.css" type="text/css" />
<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" />
<link rel="stylesheet" href="css/content.css" type="text/css" />
<link rel="stylesheet"  type="text/css" href="js/jquery.datepick/redmond.datepick.css"  />
<link type="text/css" rel="stylesheet" href="css/jquery.lightbox-0.5.css" />
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/easyslider1.7/js/easySlider1.7.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.18.min.js"></script>
<link rel="stylesheet" href="css/form.css" type="text/css" />
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/jquery.placeholder.js"></script>
<script type="text/javascript" src="js/jquery.datepick/jquery.datepick.js"></script>
<script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
<style>
#footer-back-to-top{
	-moz-border-bottom-colors: none;
-moz-border-left-colors: none;
-moz-border-right-colors: none;
-moz-border-top-colors: none;
background-color: #EEEEEE;
border-bottom-color: #BBBBBB;
border-bottom-left-radius: 0;
border-bottom-right-radius: 0;
border-bottom-style: solid;
border-bottom-width: 1px;
border-image-outset: 0 0 0 0;
border-image-repeat: stretch stretch;
border-image-slice: 100% 100% 100% 100%;
border-image-width: 1 1 1 1;
border-left-color-ltr-source: physical;
border-left-color-rtl-source: physical;
border-left-color-value: #BBBBBB;
border-left-style-ltr-source: physical;
border-left-style-rtl-source: physical;
border-left-style-value: solid;
border-left-width-ltr-source: physical;
border-left-width-rtl-source: physical;
border-left-width-value: 1px;
border-right-color-ltr-source: physical;
border-right-color-rtl-source: physical;
border-right-color-value: #BBBBBB;
border-right-style-ltr-source: physical;
border-right-style-rtl-source: physical;
border-right-style-value: solid;
border-right-width-ltr-source: physical;
border-right-width-rtl-source: physical;
border-right-width-value: 1px;
border-top-color: #BBBBBB;
border-top-left-radius: 5px;
border-top-right-radius: 5px;
border-top-style: solid;
border-top-width: 1px;
bottom: -10px;
box-shadow: 0 0 0 1px white inset, 0 1px 4px rgba(0, 0, 0, 0.2);
color: #222222;
cursor: pointer;
display: block;
font-size: 13px;
line-height: 16px;
padding-bottom: 25px;
padding-left: 10px;
padding-right: 10px;
padding-top: 15px;
position: fixed;
right: 15px;
text-align: center;
text-shadow: 0 1px white;
transition-delay: 0s;
transition-duration: 250ms;
transition-property: bottom;
transition-timing-function: ease-in-out;
width: 50px;
z-index: 9999;
}
#prevBtn, #nextBtn{ 
	display:block;
	width:30px;
	height:77px;
	position:absolute;
	left:1px;
	top:250px;    
	text-indent:-5000px;
	}	
#nextBtn{ 
	left:657px;
	}														
#prevBtn a, #nextBtn a{  
	display:block;
	width:30px;
	height:77px;
	background:url(images/arrow_l.png) no-repeat 0 0;	
	}	
#nextBtn a{ 
	background:url(images/arrow_r.png) no-repeat 0 0;	
	}	
	ol#controls{
		margin:-5px  0;
		padding:0;
		float: right;
		margin-top:-26px;	
		margin-right:10px;
		font-size:12px;
		}
	ol#controls li{
		margin:0 -2px 0 0; 
		padding:0;
		float:left;
		list-style:none; 
		background: url(images/runHighlight_line.png) no-repeat right;
		}
	ol#controls li a{
		margin:0 -1px 0 0; 
		float:left;
		color:#fff;
		padding:5px 10px;
		text-decoration:none;
		background: url(images/runHighlight_reg2.png) no-repeat center;
		}
	ol#controls li.current a{
		margin:1px -1px 0 0;
		color:#fff;
		background: url(images/runHighlight_hot.png) no-repeat top;
		}
	ol#controls li a:focus, #prevBtn a:focus, #nextBtn a:focus{outline:none;}
	
<!--******************* sidemenu **************************-->
#nav li li{	float:none; }

#nav li li a{ /* Just submenu links*/	
	position:relative;
	float:none;
}

#nav li ul { /* second-level lists */
	position: absolute;
	width: 10em;
	margin-left: -1000em; /* using left instead of display to hide menus because display: none isn't read by screen readers */
}

/* third-and-above-level lists */
#nav li ul ul { margin: -1em 0 0 -1000em;!important;}
#nav li:hover ul ul {	margin-left: -1000em; !important;}

 /* lists nested under hovered list items */
#nav li:hover ul{	margin-left: 186px; margin-top:-2.5em;!important;}
#nav li li:hover ul {	margin-left: 10em; !important;}

/* extra positioning rules for limited noscript keyboard accessibility */
#nav li a:focus + ul {  margin-left: 186px; margin-top:-2.5em; !important;}
#nav li li a:focus + ul { left:186px; margin-left: 1010em; margin-top:-2.5em;!important;}
#nav li li a:focus {left:186px;  margin-left:1000em; width:10em;  margin-top:-2.5em;!important;}
#nav li li li a:focus {left:186px; margin-left: 2010em; width: 10em;  margin-top:-2.5em;!important;}
#nav li:hover a:focus{ margin-left: 0; !important;}
#nav li li:hover a:focus + ul { margin-left: 10em; !important;}

<!--******************* sidemenu **************************-->	
</style>
<script>		
$(document).ready(function(){	
	$('.datepicker').datepick({showOn: 'both', buttonImageOnly: true, buttonImage: 'js/jquery.datepick/calendar_ico.gif'});
	$('input, textarea').placeholder();
	$("#slider").easySlider({
		auto: true,
		continuous: true,
		numeric: true,
		speed:1000,
		pause:3000
	});	
	$(window).scroll(function() {
			    if($(this).scrollTop() != 0) {
			            $('#footer-back-to-top').fadeIn();
			            $('#footer-back-to-top').removeClass('offscreen');
			        } else {
			            $('#footer-back-to-top').fadeOut();
			            $('#footer-back-to-top').addClass('offscreen');
			        }
			    });
			    
			    $('#footer-back-to-top').click(function() {
			        $('body,html').animate({scrollTop:0},800);
			    }); 				
				
				
				$(".mMenu").click(function(){
					$(".mMenu").attr("class","mMenu");
					$(this).attr("class","mMenu active");
				})			 
});
</script>