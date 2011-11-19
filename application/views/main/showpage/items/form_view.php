<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php   
 	
$this->load->view('header/blueprint_css.php');  
$this->load->view('header/common_css.php');  
?>
<style>
body{
background:white;		
}
form#image_showpage_item_form{
font-size:16px;
}
form#image_showpage_item_form input[type=text]{
padding:6px 5px;
width:490px;	
}
form#image_showpage_item_form textarea#video_embed
{
width:495px;
height:90px;	
}
form#image_showpage_item_form textarea#getglue_embed
{
width:495px;
height:90px;	
}
form#image_showpage_item_form table#main {
width:100%;
margin:30px 0px 0px 0px;	
}
form#image_showpage_item_form table#main td.main_table{
padding-top:5px;
padding-bottom:5px;	
}

form#image_showpage_item_form table#main div.image_assets{
margin-top:25px;
}
/* showpage_hero */
form#image_showpage_item_form div#image_showpage_hero_item_showpage_hero{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo $data['showpage_items'][0]['showpage_hero_items_image_id']; 
	?>/image_tiny.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:300px;
	height:300px;
	margin-left: 72px;
}
/* showpage_title */
form#image_showpage_item_form div#image_showpage_title_item_showpage_title{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo $data['showpage_items'][0]['showpage_title_items_image_id']; 
	?>/image_tiny.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:455px;
	height:167px;
	margin-left: 72px;
}
/* showpage_dropdown */
form#image_showpage_item_form div#image_showpage_dropdown_item_showpage_dropdown{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo $data['showpage_items'][0]['showpage_dropdown_items_image_id']; 
	?>/image_tiny.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:460px;
	height:323px;
	margin-left: 72px;
}

/* showpage_hero_iphone */
form#image_showpage_item_form div#image_showpage_hero_iphone_item_showpage_hero_iphone{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo $data['showpage_items'][0]['showpage_hero_iphone_items_image_id']; 
	?>/image_tiny.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:200px;
	height:301px;
	margin-left: 72px;
}

/* hero_android */
form#image_showpage_item_form div#image_showpage_hero_android_item_showpage_hero_android{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo $data['showpage_items'][0]['showpage_hero_android_items_image_id']; 
	?>/image_tiny.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:200px;
	height:301px;
	margin-left: 72px;
}

/* mobile_thumb*/
form#image_showpage_item_form div#image_showpage_hero_mobile_thumb{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo $data['showpage_items'][0]['showpage_hero_mobile_thumb_items_image_id']; 
	?>/image_tiny.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:100px;
	height:70px;
	margin-left: 72px;
}

/* IPAD HERO */
form#image_showpage_item_form div#image_showpage_ipad_item_div{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo $data['showpage_items'][0]['showpage_hero_ipad_id']; 
	?>/image_tiny.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:320px;
	height:480px;
	margin-left: 72px;
}

/* IPAD HERO THUMB */
form#image_showpage_item_form div#image_showpage_ipad_hero_thumb_item_div{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo ( isset( $data['showpage_items'][0]['showpage_ipad_hero_thumb_items_id']) ? $data['showpage_items'][0]['showpage_ipad_hero_thumb_items_id']:'' ); 
	?>/image_tiny.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:262px;
	height:122px;
	margin-left: 72px;
}

form#image_showpage_item_form #textarea_div{
width:100%;
height: 180px;
margin:0px 0px 0px 0px;
padding:10px 0px 0px 0px;
}

form#image_showpage_item_form div.image_div div.icon_container{
	display:none;
	width:99%;
	height:26px;
	padding-top:5px;
	padding-right:5px;
	background:white;
	filter:alpha(opacity=75);    /* ie  */
	-moz-opacity:0.75;    /* old mozilla browser like netscape  */
	-khtml-opacity: 0.75;    /* for really really old safari */
	opacity: 0.75;    /* css standard, currently it works in most modern browsers like firefox,  */
}

form#image_showpage_item_form div.image_div div.label{
	text-align:center;
	font-weight:bold;
	font-size:20px;
	color:blue;
	display:none;
	width:99%;
	height:26px;
	padding-top:35px;
	padding-right:5px;
	background:white;
	filter:alpha(opacity=75);    /* ie  */
	-moz-opacity:0.75;    /* old mozilla browser like netscape  */
	-khtml-opacity: 0.75;    /* for really really old safari */
	opacity: 0.75;    /* css standard, currently it works in most modern browsers like firefox,  */
}
form#image_showpage_item_form  div.image_div div.icon_container div.icon{
	width:20px;
	height:20px;
	margin-right:5px;
	float:right;
}
form#image_showpage_item_form  div.image_div div.icon_container div.change_pic{
	background:lightblue;	
}
form#image_showpage_item_form  div.image_div div.icon_container div.facebook{
	background:orange;	
}
form#image_showpage_item_form  div.image_div div.icon_container div.video{
	background:gray;	
}
form#image_showpage_item_form #submit{
width:70px;	
}

#dialog{
display:none;	
}
				
#dialog iframe#iframe_src_for_image{
	padding: 5px; 
	border: 1px solid lightgray;
	width:350px;
	height:50px;
	margin-top:13px;
	margin-left:5px;
}
</style>
</head>

<html>



<body >
<form id='image_showpage_item_form'>
		<table  id='main'>
			<tr  class='hide ' >
				<td  class='main_table ' > URL Name
				</td>
				<td  class='main_table '><input name="url_name" id="" type="text" value="<?php echo ( isset( $data['showpage_items'][0]['url_name']) ? $data['showpage_items'][0]['url_name']:'' )    ?>">
				</td>
			</tr>
			<tr>
				<td  class='main_table ' > Name
				</td>
				<td  class='main_table '><input name="name" id="" type="text" value="<?php echo $data['showpage_items'][0]['name']    ?>">
				</td>
			</tr>

			<tr  >
				<td  class='main_table '> Keywords
				</td>
				<td  class='main_table '><input name="keywords" id="" type="text" value="<?php echo $data['showpage_items'][0]['keywords']    ?>">
				</td>
			</tr>
		
			<tr  class='hide '>
				<td   class='main_table ' colspan=2>
					<div  id='textarea_div'   >
							<textarea  class=' clearfix' name='about' id='text_area'><?php echo $data['showpage_items'][0]['about']    ?></textarea>
					</div>
				</td>
			</tr>	

			<tr>
				<td   colspan=2>
					<div>
						<input  class=' submit' name="" type="button" value="submit">
					</div>
				</td>
			</tr>	
			<tr>
				<td class='main_table image_assets' colspan=2>
					<div  class=' image_assets' >
							<div image_type='showpage_hero' image_type_id='10' class='float_left image_div'  id='image_showpage_hero_item_showpage_hero' showpage_items_image_id='<?php echo $data['showpage_items'][0]['showpage_hero_items_image_id']    ?>'>
							</div>
							
					
					</div>

				</td>
			</tr>	
	


			
		</table>
</form>
</body>

<div id="dialog" title="Upload Image"     > 

		<iframe id="iframe_src_for_image" frameborder="0" scrolling=no src=""  >
			
		    <p>Your browser does not support iframes.</p>
		    
		</iframe>			


</div>
</html>

<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>
<?php 

$this->load->view('footer/jquery_ui_for_dialog.php');    
$this->load->view('javascript/htmlbox_wsiwyg.php');  

?>

	
<script type="text/javascript" language="Javascript">
	

	$(document).ready(function() {

				$('#iphone_directTo_div input').each(function(event) {
					if( $(this).val() == <?php  echo ( isset( $data['showpage_items'][0]['iphone_directTo']) ? $data['showpage_items'][0]['iphone_directTo']:0 )   ?>){		
							$(this).attr("checked","checked");
					};
				});	

				$('#showpage_title_left_margin').blur(function(event) {

							
						$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
							table:'showpage_items',
							id:$(this).attr('showpage_items_id'),
							crud:'update',
							set_what_array:$(this).serialize()
							},function(xml) {
							
								var status = $(xml).find('status').text();
								var message = $(xml).find('message').text();
								
								
						});		
				});		
		


				$('.image_div div.icon_container div.change_pic')
					.css({cursor:'pointer'})
					.click(function(event) {
						open_dialogue_upload_image(
						 $(this).parent().parent().attr('showpage_items_image_id'),
						 $(this).parent().parent().attr('image_type'),
						 $(this).parent().parent().attr('image_type_id')
						);
					})

				$('.image_div div.icon_container div.facebook')
					.css({cursor:'pointer'})
					.click(function(event) {
						open_dialogue_facebook_link()();
					})					
		
		
				$('.image_div div.icon_container div.video')
					.css({cursor:'pointer'})
					.click(function(event) {
						open_dialogue_video_link()();
					})					
		
		
		
				$(".image_div").css({cursor:'pointer',border:'1px solid gray'}).append("<div  class='icon_container ' ><div  class='icon change_pic'  >c</div></div>")
				.mouseover(function(event) {
							$(this).children('div.icon_container').show()
				})
				.mouseout(function(event) {
							$(this).children('div.icon_container').hide()
				}).append("<div  class='label ' ></div>")
				.mouseover(function(event) {
							$(this).css({'padding-top':$(this).height/2}).children('div.label')
							//.html($(this).attr('image_type')).show()
				})
				.mouseout(function(event) {
							$(this).children('div.label').hide()
				})


				<?php if( $data['showpage_items'][0]['showpage_title_items_image_id'] != 0 ){?>
					$(".image_div[image_type='showpage_title']").children('div.icon_container').append("<div  class='icon video'  >v</div><div  class='icon facebook'  >f</div>")
				<?php } ?>		$('#main td:nth-child(odd)').css({
					'text-align':'right',
					'padding-right':'9px',
					'padding-top':'8px',
					'width':'15%'
				})


				$('.image_div div.icon_container div.change_pic')
					.css({cursor:'pointer'})
					.click(function(event) {
						open_dialogue_upload_image(
						 $(this).parent().parent().attr('showpage_items_image_id'),
						 $(this).parent().parent().attr('image_type'),
						 $(this).parent().parent().attr('image_type_id')
						);
					})
					
				$('.image_div div.icon_container div.facebook')
					.css({cursor:'pointer'})
					.click(function(event) {
						open_dialogue_facebook_link()();
					})					
		
		
				$('.image_div div.icon_container div.video')
					.css({cursor:'pointer'})
					.click(function(event) {
						open_dialogue_video_link()();
					})					
		



				$('.submit').css({cursor:'pointer'}).click(function(event) {

					submit_inputs(
						close_fancyzoom = 1
					);
						
				});	
			
				mbox = $("#text_area").css({
						height:"100px",
						width:"100%"
						}).htmlbox({
				    toolbars:[
					    [
						// Cut, Copy, Paste
						"separator","cut","copy","paste",
						// Undo, Redo
						"separator","undo","redo",
						// Bold, Italic, Underline, Strikethrough, Sup, Sub
						"separator","bold","italic","underline","strike","sup","sub",
						// Left, Right, Center, Justify
						"separator","justify","left","center","right",
						// Ordered List, Unordered List, Indent, Outdent
						"separator","ol","ul","indent","outdent",
						// Hyperlink, Remove Hyperlink, Image
						"separator","link","unlink","image"
						
						],
						[// Show code
						"separator","code",
				        // Formats, Font size, Font family, Font color, Font, Background
				        "separator","formats","fontsize","fontfamily",
						"separator","fontcolor","highlight",
						],
						[
						//Strip tags
						"separator","removeformat","striptags","hr","paragraph",
						// Styles, Source code syntax buttons
						"separator","quote","styles","syntax"
						]
					],
					skin:"gray"
				});
				
				
				setTimeout(function() { 											
						mbox.set_text( $('#text_area').text()   );
				}, 100);
				
				
  });
    


function open_dialogue_facebook_link(){

		submit_inputs(close_fancyzoom=0);


		$("#iframe_src_for_image")
		.css({width:'750px',height:'400px'})
		.attr('src','<?php echo base_url();    ?>index.php/main/create_facebook_link_form?table=showpage&showpage_items_image_id=<?php  echo $data['showpage_items'][0]['showpage_title_items_image_id']   ?>');

			
		var width_of_dialog = 795;
		
		
		
		var p = $('#image_showpage_title_item_showpage_title');
		position = p.position();
		
		
		
		var left_coord = ($(window).width()/2 - width_of_dialog/2);

		$("#dialog" ).dialog({
			position:[left_coord,position.top],
			height: 510,
			zIndex: -10,
			width: width_of_dialog,
			resizable: false 
			})
						
};	



function open_dialogue_video_link(){

		submit_inputs(close_fancyzoom=0);


		$("#iframe_src_for_image")
		.css({width:'750px',height:'400px'})
		.attr('src','<?php echo base_url();    ?>index.php/main/create_video_link_form?table=showpage&showpage_items_image_id=<?php  echo $data['showpage_items'][0]['showpage_title_items_image_id']   ?>');

			
		var width_of_dialog = 795;
		
		var p = $('#image_showpage_title_item_showpage_title');
		position = p.position();
		
		var left_coord = ($(window).width()/2 - width_of_dialog/2);

		$("#dialog" ).dialog({
			position:[left_coord,position.top],
			height: 510,
			zIndex: -10,
			width: width_of_dialog,
			resizable: false 
			})
						
};	


function dialog_close(){
	$( "#dialog" ).dialog('close');
}


function submit_inputs(close_fancyzoom){
	
					serialized = $('#image_showpage_item_form').serialize();
				
					if( !$('#isHot').is(':checked')  ){
						
					serialized = serialized + '&isHot=0';
						
					};

					$("#text_area").val( mbox.get_html() );

					$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
						table:'showpage_items',
						crud:'update',
						set_what_array: serialized,
						id:'<?php echo $data['showpage_items'][0]['id']    ?>'
						},function(xml) {

							//var db_response = $(xml).find('db_response').text();
							if( close_fancyzoom == 1){
															window.parent.location.reload();
							};
							
							// window.parent.$('body').click();
							
					});	
	
}	

function open_dialogue_upload_image(
 showpage_items_image_id, 
 image_type, 
 image_type_id 
 ){



		submit_inputs(close_fancyzoom=0);

		if( showpage_items_image_id == null){
			showpage_items_image_id = 0;
		};

		$("#iframe_src_for_image")
		.css({width:'350px',height:'80px'})
		.attr('src','<?php echo base_url();    ?>index.php/main/upload_image_form?what_item=showpage&showpage_item_id=<?php echo $data['showpage_items'][0]['id']    ?>&showpage_items_image_id=' + showpage_items_image_id +'&image_type='+image_type +'&image_type_id='+image_type_id);

			
		var width_of_dialog = 410;
		var left_coord = ($(window).width()/2 - width_of_dialog/2);
		
		var p = $('div[image_type_id='+image_type_id+']');
		position = p.position();


		$("#dialog" ).dialog({
			position:[left_coord,position.top],
			height: 160,
			zIndex: -10,
			width: width_of_dialog,
			resizable: false 
			})
						
};	
	
	
	
</script>

<?php


