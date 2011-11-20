		<style>
			
		iframe#iframe_src{
		width:650px;
		height:660px;	
		}
			
			
		img#add_destination_Item{
			width:30px;	
			margin:23px 23px 10px 23px;
			}
			
			
			#destination_item_outside_container{
				clear:both;
				margin:0px 20px;
				border-top:1px solid lightgray;
				border-left:1px solid lightgray;	
				border-right:1px solid lightgray;
				width:892px;
			}
			
					#destination_item_outside_container div.destination_item_row{
					border-bottom:1px solid lightgray;
					padding:5px;
					}
								#destination_item_outside_container   .destination_item_row .name_of{
								font-weight:bold;
								font-size:20px;
								padding-top:0px;
								color:gray;
								}
								
								#destination_item_outside_container   .destination_item_row .square_image{
								margin-right:20px;
								}											
																
																							
								#destination_item_outside_container   .destination_item_row .destination_item_trash{
								width:46px;
								padding-top:90px;
								}
								
											#destination_item_outside_container   .destination_item_row .destination_item_trash img{
											width:30px;
											}	

		</style>
		<img  class='clearfix ' href='#fancy_zoom_div'  title='Add destination Item'  id='add_destination_Item' src='<?php echo base_url()    ?>images/add.png'    />
			
  	
  	<div  id='destination_item_outside_container'  class='clearfix ' >
				
			<div   id='destination_item_container'>
				
				<?php
				
				if( isset($data['destination_items'])){

				 foreach( $data['destination_items']  as  $destination_item ){?>
				
					<div  class='clearfix destination_item_row'>
						
						
						<div  class='name_of '  destination_item_id='<?php echo  $destination_item['id']   ?>'  href='#fancy_zoom_div' >
							<?php echo  $destination_item['name']   ?>
						</div>
						<div>
	
						<div  class='float_left square_image'  >
						<img   style='width:200px'  src='<?php echo base_url();    ?>uploads/destination_items_images/<?php
						echo $destination_item ['destination_image_id']; 
						?>/image.png?random=<?php echo rand(5,12334)    ?>'/>
						</div>
									
							
							
						</div>
												
						
					
						<div  class='float_left  hide destination_item_trash' >
							<img src='<?php   echo base_url()  ?>images/trash.gif'   destination_item_id='<?php echo  $destination_item['id']   ?>' >
						</div>	

						
												
					
					</div>
					
				<?php }
				 
				};				
				
				?>				
				
			</div>
		
  	</div>

		
		<script type="text/javascript" language="Javascript">  
			
			$(document).ready(function() {

				$('#add_destination_Item').css({cursor:'pointer'}).fancyZoom().click(function(event) {

						$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
							table:'destination_items',
							crud:'insert'
							},function(xml) {
							
								var status = $(xml).find('status').text();
								var message = $(xml).find('message').text();
								$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/get_destination_form?destination_item_id=' + $(xml).find('db_response').text()  );
								
						});	
				
				});		
				
				
				$('#destination_item_outside_container   .destination_item_row .name_of').css({cursor:'pointer'}).fancyZoom().click(function(event) {
					

						$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/get_destination_form?destination_item_id=' + $(this).attr('destination_item_id')  );
				
				});		
				
				
				
				
				$('.destination_item_trash img').css({cursor:'pointer'}).click(function(event) {


					  if(  confirm('Do you really want to delete this item?')  ){
					  	
					  	

									$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
										table:'destination_items',
										crud:'delete_destination_item',
										destination_item_id:$(this).attr('destination_item_id')
										
										},function(xml) {
										
											var db_response = $(xml).find('db_response').text();
										
											if( db_response == 'ok'){
												document.location.reload(true);
											}else{
												alert(db_response);
											};
										
											
											
									});						    
					  }

					
					
				});	

  		});
		</script>		