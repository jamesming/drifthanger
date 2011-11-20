<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php     	$this->load->view('header/blueprint_css.php');  ?>
<?php     	$this->load->view('header/common_css.php');  ?>
<style>
li{
float:left;	
padding-right: 10px;	
}
	
.top{
	background:#414141;
	color:white;
	height:145px;
}
.top .logo_div img{
	margin-top:32px
}
.top .right_top ul{
    margin-left: 387px;
    margin-top: 27px;	
}
.top .right_top ul li{

}
.top .right_top .slogan{
  color: yellow;
    font-size: 14px;
    padding-top: 63px;
    font-weight: bold;
}
.white-line{
height:5px;
background:white;	
}
body{
background-image: url(<?php  echo base_url()   ?>images/Screen_Page3.jpg);
background-position: center top;
min-height:1130px;	
}

.steps{
clear:both;
padding-top:45px;
height:30px;
background-image: url(<?php  echo base_url()   ?>images/Steps.png);
background-position: center, center;
background-repeat: no-repeat;
}
.bottom{
background:#B6B6B6;
min-height:120px;		
}
.bottom .bottom_menu{
    margin-left: 325px;
    padding-top: 20px;
    font-weight: bold;
}
</style>

<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>
<script src="<?php echo  base_url();   ?>js/Rockwell_700.font.js" type="text/javascript"></script>
<script type="text/javascript">
               Cufon.replace('.font'); // Works without a selector engine
               Cufon.replace('#sub1'); // Requires a selector engine for IE 6-7, see above
</script>
</head>

<html>

<body>

</body>


<script type="text/javascript" language="Javascript">
$(document).ready(function() {

		$('#logo').click(function(event) {			
						document.location.href='<?php echo  base_url();   ?>';
		});	
		
		$('.answer-box img').css({cursor:'pointer'}).click(function(event) {
			document.location.href='<?php echo  base_url();   ?>index.php/home/present?images_item_id='+$(this).attr('images_item_id');
		});	

});		



</script>
</html>

