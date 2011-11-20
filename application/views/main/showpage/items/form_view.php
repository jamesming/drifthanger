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
clear:both;
}

form#image_showpage_item_form div{
 margin-bottom:30px;	
}
/* showpage_hero */
form#image_showpage_item_form div#image_showpage_hero_item_showpage_hero{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo $data['showpage_items'][0]['showpage_hero_items_image_id']; 
	?>/image.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:222px;
	height:222px;
	margin-left: 72px;
}

/* item2 */
form#image_showpage_item_form div#image_item2{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo $data['showpage_items'][0]['showpage_item2_image_id']; 
	?>/image.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:222px;
	height:222px;
	margin-left: 72px;
}
/* item3 */
form#image_showpage_item_form div#image_item3{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo $data['showpage_items'][0]['showpage_item3_image_id']; 
	?>/image.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:222px;
	height:222px;
	margin-left: 72px;
}
/* item4 */
form#image_showpage_item_form div#image_item4{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo $data['showpage_items'][0]['showpage_item4_image_id']; 
	?>/image.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:222px;
	height:222px;
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

			<tr>
				<td  class='main_table ' > Question
				</td>
				<td  class='main_table '><input name="name" id="" type="text" value="<?php echo $data['showpage_items'][0]['name']    ?>"> <input  class=' submit' name="" type="button" value="submit">
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
				<td class='main_table image_assets' colspan=2>
					
<style>
.image_div_container{
float:left;	
}
.image_div_container .image_title{
	width:222px;
	margin-left:72px;
}
.tags{
	margin-left:100px;
	width:200px;
	height:150px;
	float:left;	
}
</style>
					<div  class=' image_assets' >
							<div  class='image_div_container ' >
									<input  class='image_title '  value="<?php  echo ( isset( $data['image_title.1'] ) ? $data['image_title.1'] :'' )   ?>" id='image_showpage_hero_item_showpage_hero' showpage_items_image_id='<?php echo ( isset( $data['showpage_items'][0]['showpage_hero_items_image_id'] ) ? $data['showpage_items'][0]['showpage_hero_items_image_id'] :0 )   ?>'>
									<div image_type='showpage_hero' image_type_id='10' class='image_div'  id='image_showpage_hero_item_showpage_hero' showpage_items_image_id='<?php echo ( isset( $data['showpage_items'][0]['showpage_hero_items_image_id'] ) ? $data['showpage_items'][0]['showpage_hero_items_image_id'] :0 )   ?>'>
									</div>								
							</div>
							<textarea  class='tags ' showpage_items_image_id='<?php echo ( isset( $data['showpage_items'][0]['showpage_hero_items_image_id'] ) ? $data['showpage_items'][0]['showpage_hero_items_image_id'] :0 )   ?>'><?php     
								
								foreach(  $data['showpage_hero_tags']   as  $tag){
									echo $tag.', ';
								}
								
							?></textarea>
					</div>
					
					<div  class=' image_assets' >
							<div  class='image_div_container ' >
									<input  class='image_title '  value="<?php  echo ( isset( $data['image_title.2'] ) ? $data['image_title.2'] :'' )   ?>" id='image_showpage_hero_item_showpage_hero' showpage_items_image_id='<?php echo ( isset($data['showpage_items'][0]['showpage_item2_image_id']  ) ? $data['showpage_items'][0]['showpage_item2_image_id'] :0 )   ?>'>
								<div image_type='item2' image_type_id='42' class='image_div'  id='image_item2' showpage_items_image_id='<?php echo ( isset($data['showpage_items'][0]['showpage_item2_image_id']  ) ? $data['showpage_items'][0]['showpage_item2_image_id'] :0 )   ?>'>
								</div>							
							</div>
							<textarea  class='tags ' showpage_items_image_id='<?php echo ( isset($data['showpage_items'][0]['showpage_item2_image_id']  ) ? $data['showpage_items'][0]['showpage_item2_image_id'] :0 )   ?>'><?php     
								
								foreach(  $data['item2_tags']   as  $tag){
									echo $tag.', ';
								}
								
							?></textarea>
					</div>					
					
					<div  class=' image_assets' >
							<div  class='image_div_container ' >
									<input  class='image_title '  value="<?php  echo ( isset( $data['image_title.3'] ) ? $data['image_title.3'] :'' )   ?>" id='image_showpage_hero_item_showpage_hero' showpage_items_image_id='<?php echo ( isset( $data['showpage_items'][0]['showpage_item3_image_id']) ? $data['showpage_items'][0]['showpage_item3_image_id']:0)    ?>'>
									<div image_type='item3' image_type_id='43' class='image_div'  id='image_item3' showpage_items_image_id='<?php echo ( isset( $data['showpage_items'][0]['showpage_item3_image_id']) ? $data['showpage_items'][0]['showpage_item3_image_id']:0)    ?>'>
									</div>							
							</div>
							<textarea  class='tags ' showpage_items_image_id='<?php echo ( isset( $data['showpage_items'][0]['showpage_item3_image_id']) ? $data['showpage_items'][0]['showpage_item3_image_id']:0)    ?>'><?php     
								
								foreach(  $data['item3_tags']   as  $tag){
									echo $tag.', ';
								}
								
							?></textarea>
					</div>					
					<div  class=' image_assets' >
							<div  class='image_div_container ' >
									<input  class='image_title '  value="<?php  echo ( isset( $data['image_title.4'] ) ? $data['image_title.4'] :'' )   ?>" id='image_showpage_hero_item_showpage_hero' showpage_items_image_id='<?php echo ( isset( $data['showpage_items'][0]['showpage_item3_image_id']) ? $data['showpage_items'][0]['showpage_item4_image_id']:0 )  ?>'>						
									<div image_type='item4' image_type_id='44' class='image_div'  id='image_item4' showpage_items_image_id='<?php echo ( isset( $data['showpage_items'][0]['showpage_item3_image_id']) ? $data['showpage_items'][0]['showpage_item4_image_id']:0 )  ?>'>
									</div>							
							</div>
							<textarea  class='tags ' showpage_items_image_id='<?php echo ( isset( $data['showpage_items'][0]['showpage_item3_image_id']) ? $data['showpage_items'][0]['showpage_item4_image_id']:0 )  ?>'><?php     
								
								foreach(  $data['item4_tags']   as  $tag){
									echo $tag.', ';
								}
								
							?></textarea>
					</div>
					
					
				</td>
			</tr>	
	


			
		</table>
</form>
</body>

<div id="dialog" title="Upload Image"     > 

		<table id='submit_jcrop_table' width='100%'    style='display:none'    >
			<tr>
				<td width='55%' align=right>Crop image then&nbsp;&nbsp;</td>
				<td>
					<div id='submit' class='rounded_border cursor_pointer'    >
						submit
					</div>	
				</td>
			</tr>
		</table>
		
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


				$('.tags').blur(function(event) {
					
					
					var showpage_items_image_id = $(this).attr('showpage_items_image_id');
					var tags = $(this).val();
					
					if( showpage_items_image_id != 0 && tags !='' ){
						
						$.post("<?php echo base_url(). 'index.php/main/update_tags';    ?>",{
							showpage_items_image_id:showpage_items_image_id,
							tags:tags
							},function(data) {
							
							//	alert(data);
								
								
						});		
						
					};
							

				});		
				
				
				$('.image_title').blur(function(event) {	

					var showpage_items_image_id = $(this).attr('showpage_items_image_id');
					var image_title = $(this).val();
					
					if( showpage_items_image_id != 0 && image_title !='' ){
						
						$.post("<?php echo base_url(). 'index.php/main/update_image_title';    ?>",{
							showpage_items_image_id:showpage_items_image_id,
							image_title:image_title
							},function(data) {
							
							 
								
						});	
						
					};

					
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


		
		
				$(".image_div").css({cursor:'pointer',border:'1px solid gray'})
				.append("<div  class='icon_container ' ><div  class='icon change_pic'  >c</div></div>")
				.mouseover(function(event) {
							$(this).children('div.icon_container').show()
				})
				.mouseout(function(event) {
							$(this).children('div.icon_container').hide()
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
				
				
				
				
				
				$('#submit').click(function(event) {  // THIS IS FOR SUBMITTING JCROP
						//document.getElementsByTagName('iframe')[7].contentWindow.submitCropForm();
					
						$('iframe').each(function(index) { 
							try { this.contentWindow.submitCropForm(); } 
							catch (e) { } 
						});
					
					
				});
				
				
				
				
				
  });
    



function dialog_close(){
	$( "#dialog" ).dialog('close');
}


function submit_inputs(close_fancyzoom){
	
					serialized = $('#image_showpage_item_form').serialize();
				

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
	
function open_jcrop( showpage_items_image_id  ){

		$("#iframe_src_for_image").css({width:'540px',height:'420px'}).attr('src','<?php echo base_url();    ?>index.php/main/iframe_jcrop_form?what_item=showpage&showpage_image_item_id=' + showpage_items_image_id);
		
		$( "#dialog" ).dialog({
			position:[6,10],
			height: 1150,
			height: 570,
			zIndex: -10,
			width: 590,
			resizable: false
			
			})	

};
	
</script>

<?php


