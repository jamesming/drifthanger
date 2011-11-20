<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php     	
$this->load->view('header/blueprint_css.php');  
$this->load->view('header/common_css.php');  
?>
<style>

#account_menu{
text-align:right;
font-size:14px;
font-weight:bold;
padding-top:20px;	
}
#main_section{
margin-top:5px;
}
#main_section div.middle{
height:auto;	
}
			
#main_section div#parent_tabs{
					width:700px;
					clear:both;
					height:auto;
					margin:0px 0px 0px 20px;
					padding-bottom:20px;
					padding-top:10px;
}			
#main_section div#parent_tabs li{
		float:left;
		width:100px;
		border:1px dotted gray;
		margin-right:10px;
		margin-bottom:5px;
		text-align:center;
		padding:5px
}		


#main_section div#parent_tabs li.showpage{
		background:skyblue;
}			
#main_section div#parent_tabs li.destination{
		background:orange;
}		
	


iframe#iframe_src{
width:600px;
height:690px;	
}

</style>
<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>
</head>

<html>


<body>
<div  id='account_menu' class='container'  >
<a href='<?php echo base_url()    ?>index.php/home/logout'>Log Out</a>
</div>
<div  id='main_section'  class='container  rounded_bg' >
	<div class="top">
		<div class="sub_top">&nbsp;</div>
	</div>
  <div class="middle"     >

		<div  id='parent_tabs'>
			
<?php if (  in_array( $data['segment3'], array('destination','showpage') ) ) { ?>			
  		<ul>

  			
  			<li  class='showpage ' >
  				<a href='<?php   echo base_url()  ?>index.php/main/index/showpage'>
  				Questions
  				</a>
  			</li>
  			
  			<li  class='destination ' >
  				<a href='<?php   echo base_url()  ?>index.php/main/index/destination'>
  				Destinations
  				</a>
  			</li>
  			

  		</ul>
<?php }else{ ?>	

<a href='<?php  echo  base_url()  ?>index.php/main/index/showpage'>Back</a>&nbsp;|&nbsp;<?php  echo $data['segment3'];   ?>

<?php } ?>	

		</div>


<?php 		

	$this->load->view('main/'.$data['segment3'].'/items/index.php');

?>

	</div>
	<div class="bottom"><div class="sub_bottom">&nbsp;</div></div>
</div>	

</body>

<div id="fancy_zoom_div">
				

		<iframe id="iframe_src" 
			frameborder="0" scrolling=no src=""   >
			
		    <p>Your browser does not support iframes.</p>
		    
		</iframe>				

</div>	

</html>


<script type="text/javascript" language="Javascript">
	
	
	
	$(document).ready(function() {

			$('#parent_tabs li.<?php echo  $data['segment3']   ?>').css({border:'2px solid gray'})
			
			<?php if( isset( $data['segment4'])  ){?>
				
						$('.children_tabs li.<?php echo  $data['segment4']   ?>').css({background:'lightgray'})
						
			<?php } ?>

  });
    

</script>
<?php  $this->load->view('footer/fancy_zoom.php');   ?>