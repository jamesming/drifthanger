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
.middle{
	background:#71C1CA;
/*background-image: url(<?php  echo base_url()   ?>images/Page1_bg.jpg);
background-position: center, center;
background-repeat: no-repeat;*/
min-height:450px;	
}
.middle .first-question{
    color: white;
    font-size: 39px;
    font-weight: bold;
    text-align: center;
    padding-top: 42px;
}

.middle .answer-boxes-container {
    padding-left: 86px;
    margin-top: 24px;
}
.middle .answer-boxes-container .answer-box{
    float:left;
}
.middle .answer-boxes-container .answer-box div{
    text-align:center;
    color:white;
    font-weight:bold;
    font-size:23px;
    visibility:hidden;
}
.middle .answer-boxes-container img {
    width: 222px;
    margin-right:50px;
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

<script src="<?php echo  base_url();   ?>js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo  base_url();   ?>js/Rockwell_700.font.js" type="text/javascript"></script>
<script type="text/javascript">
               Cufon.replace('.font'); // Works without a selector engine
               Cufon.replace('#sub1'); // Requires a selector engine for IE 6-7, see above
</script>

</head>

<html>

<body>


<div  class='top '   >
	<div  class='container ' >
		<div  class='span-8 logo_div' >
			<img src='<?php  echo base_url()   ?>images/logo2.png' />
		</div>
		<div  class='span-16 last right_top' >
			<div>
				<ul>
					<li>About</li>
					<li>Contact us</li>
					<li>Help</li>
					<li>Register / Login</li>
				</ul>
			</div>
			<div  class='slogan ' >
				Hi there, traveler!<br />Drift Hanger helps you discover new experiences based on your interest and budget.
			</div>
		</div>		
	</div>
</div>
<div  class='white-line ' >
</div>
<div  class='middle ' >
	<div  class='first-question font' ><?php   echo $data['name']  ?>
	</div>
	<div  class='answer-boxes-container ' >
		<div  class='answer-box ' >
			<img src='<?php  echo base_url()   ?>uploads/showpage_items_images/<?php echo $data['showpage_hero_items_image_id']   ?>/image.png' images_item_id='<?php echo $data['showpage_hero_items_image_id']   ?>' />	
			<div><?php  echo $data['item.1.image_title']   ?>	
			</div>
		</div>
		<div  class='answer-box '>
			<img src='<?php  echo base_url()   ?>uploads/showpage_items_images/<?php echo $data['showpage_item2_image_id']   ?>/image.png' images_item_id='<?php echo $data['showpage_item2_image_id']   ?>' />	
			<div><?php  echo $data['item.2.image_title']   ?>	
			</div>
		</div>
		<div  class='answer-box '>
			<img src='<?php  echo base_url()   ?>uploads/showpage_items_images/<?php echo $data['showpage_item3_image_id']   ?>/image.png' images_item_id='<?php echo $data['showpage_item3_image_id']   ?>' />	
			<div><?php  echo $data['item.3.image_title']   ?>	
			</div>
		</div>
		<div  class='answer-box '   style='display:none'  >
			<img src='<?php  echo base_url()   ?>uploads/showpage_items_images/<?php echo $data['showpage_item4_image_id']   ?>/image.png'   images_item_id='<?php echo $data['showpage_item4_image_id']   ?>' />	
			<div><?php  echo $data['item.4.image_title']   ?>	
			</div>
		</div>							
		
			
		
	</div>
	<div>&nbsp;
	</div>
			<style>
				
			<?php if( $data['nextpage'] == 1){?>
				
						.steps{
						    background-image: url("http://localhost/drifthanger/images/progressbars.png");
						    background-position: 0 -31px;
						    background-repeat: no-repeat;
						    clear: both;
						    height: 0;
						    margin-left: 255px;
						    padding-top: 33px;
						    width: 445px;
						}				
				
			<?php }elseif($data['nextpage'] == 2) {?>
						.steps{
								    background-image: url("http://localhost/drifthanger/images/progressbars.png");
								    background-position: 0 -61px;
								    background-repeat: no-repeat;
								    clear: both;
								    height: 0;
								    margin-left: 255px;
								    padding-top: 33px;
								    width: 445px;
						}				
			<?php }elseif($data['nextpage'] == 3){ ?>
					.steps{
					    background-image: url("http://localhost/drifthanger/images/progressbars.png");
					    background-position: 0 -91px;
					    background-repeat: no-repeat;
					    clear: both;
					    height: 0;
					    margin-left: 255px;
					    padding-top: 33px;
					    width: 445px;
					}				
			<?php } ?>

			</style>
			
			<div  class='steps ' >&nbsp;
			</div>
	
	 
</div>
<div  class='white-line ' >
</div>
<div  class='bottom ' >

				<ul  class='bottom_menu ' >
					<li>Site Map</li>
					<li>Press</li>
					<li>FAQ</li>
					<li>Help</li>
					<li>Contact Us</li>
					<li>About</li>
					<li>Register / Login</li>
				</ul>

</div>

</body>


<script type="text/javascript" language="Javascript">
$(document).ready(function() {

		$('#logo').click(function(event) {			
						document.location.href='<?php echo  base_url();   ?>';
		});	
		
		$('.answer-box img').css({cursor:'pointer'}).click(function(event) {
			
			<?php if( $data['nextpage'] == 3){?>
				
					document.location.href='<?php echo  base_url();   ?>index.php/home/present?images_item_id='+$(this).attr('images_item_id');
				
			<?php }else{?>
			
					document.location.href='<?php echo  base_url();   ?>index.php/home?page=<?php echo ( isset($data['nextpage'] ) ? $data['nextpage']:'' );   ?>&images_item_id='+$(this).attr('images_item_id');
			
			<?php } ?>
			
			
		});	

});		



</script>
</html>

