<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	
   public function __construct(){
        parent::__construct();
        
        
				if(  isset( $this->session->userdata['user_id'] )  ){
					
					
				}else{
					
					redirect('/home/login');
				
				};

   }

	
	/**
	 * index.
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/index
	 * @access public
	 */
	 
	public function index(){

				// REMOVE ALL items THAT DO NOT CONTAIN CONTENT
				if( $this->uri->segment(3) != 'calendar' &&
						$this->uri->segment(3) != ''
				){
					
						$this->my_database_model->delete_from_table(
								$table = $this->uri->segment(3).'_items', 
								$where_array = array(
																				'updated' => '0000-00-00 00:00:00' 
																		)
							);
					
				};


				$segment4 = $this->uri->segment(4);
				if( $segment4 == '' ){
					$segment4 = 'items';	
				};




				$segment3  = $this->uri->segment(3);


				if( $segment3  == ''){

					$segment3 = 'showpage';
					
				};
				

				switch ( $segment3 ) {
		
			 
			    
			    
			    case 'showpage':
		
						$data = $this->custom->prepare_showpage_items( 
								$segment4,
								$this->input->get()
						 );
			    break;
			    
			    
			    
			    case 'destination':
		
						$data = $this->custom->prepare_destination_items( 
								$segment4,
								$this->input->get()
						 );
						 

						 
			    break;
			    
			    
			   
				};


				$this->load->view('main/index_view', 
					array('data' => $data)
				);
	}
	
	

	
	public function update_tags(){
		

		$showpage_items_image_id = $this->input->post('showpage_items_image_id');
		$tags = explode(',', $this->input->post('tags'));

		
		foreach( $tags  as   $tag){
			
			
				/* TAGS TABLE FIRST */
				$table = 'tags';
				$where_array = array(
						'name' => trim($tag)
				);
				
				if( $this->my_database_model->count_records( $table,  $where_array ) != 0 ){
					
					$tags = $this->my_database_model->select_from_table( 
					$table, 
					$select_what = 'id', 
					$where_array
					);
					
					$tag_id  =  $tags[0]->id;
					
				}else{
					$tag_id  = $this->my_database_model->insert_table(
													'tags', 
													$insert_what = $where_array
													); 
					
				};			
				
				/* CHECK IMAGES_TAGS*/
				$table = 'images_tags';
				$where_array = array(
						'tag_id' => $tag_id,
						'showpage_item_id' => $showpage_items_image_id
				);
				$result = $this->my_database_model->check_if_exist(
					$where_array, 
					$table 
				);
		
				if( $result == TRUE ){
					
					
				}else{
					$insert_id = $this->my_database_model->insert_table(
													'images_tags', 
													$insert_what = $where_array
													); 
				};	
			
		}
		

		
	}
	
	public function update_destination_items_tags(){
		

		$destination_items_image_id = $this->input->post('destination_items_image_id');
		$tags = explode(',', $this->input->post('tags'));

		
		foreach( $tags  as   $tag){
			
			
				/* TAGS TABLE FIRST */
				$table = 'tags';
				$where_array = array(
						'name' => trim($tag)
				);
				
				if( $this->my_database_model->count_records( $table,  $where_array ) != 0 ){
					
					$tags = $this->my_database_model->select_from_table( 
					$table, 
					$select_what = 'id', 
					$where_array
					);
					
					$tag_id  =  $tags[0]->id;
					
				}else{
					$tag_id  = $this->my_database_model->insert_table(
													'tags', 
													$insert_what = $where_array
													); 
					
				};			
				
				

				/* CHECK IMAGES_TAGS*/
				$table = 'destinations_items_tags';
				$where_array = array(
						'tag_id' => $tag_id,
						'destination_item_id' => $destination_items_image_id
				);

				$result = $this->my_database_model->check_if_exist(
					$where_array, 
					$table 
				);
		
				if( $result == TRUE ){
					
					
				}else{
					$insert_id = $this->my_database_model->insert_table(
													$table, 
													$insert_what = $where_array
													); 
				};	
			
		}
		

		
	}	
	
	/**
	 * get_showpage_form
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/get_showpage_form
	 * @access public
	 */
	 
	 
	public function get_showpage_form(){
		
				$data['showpage_items'] = $this->query->get_showpage_items(
							$where_array = array( 'id' => $this->input->get('showpage_item_id')) 
				);	


				/* one */
				foreach( $data['showpage_items']  as  $showpage_item){
					foreach( $showpage_item  as  $key => $value){
						$showpage_item[$key]=$value;
						if( $key == 'showpage_hero_items_image_id'){
							
								$join_array = array(
									'tags' => 'tags.id = images_tags.tag_id'
									);
							
							
								$tags_raw = $this->my_database_model->select_from_table( 
																				$table = 'images_tags', 
																				$select_what = 'name',
																				$where_array = array(
																					'images_tags.showpage_item_id' => $value
																				), 
																				$use_order = TRUE, 
																				$order_field = 'name', 
																				$order_direction = 'asc', 
																				$limit = -1,
																				$use_join = TRUE, 
																				$join_array
																				);	
																				
								$tags_raw = $this->tools->object_to_array($tags_raw);								
								foreach( $tags_raw  as  $tag){
									foreach( $tag  as  $value){
										$tags[] = $value;
									}
								}
								$data['showpage_hero_tags'] = ( isset( $tags) ? $tags:array() );
				
				
						};
						
					}
					
				}
				unset($tags);
				/*two*/

				foreach( $data['showpage_items']  as  $showpage_item){
					foreach( $showpage_item  as  $key => $value){
						$showpage_item[$key]=$value;
						if( $key == 'showpage_item2_image_id'){
							
								$join_array = array(
									'tags' => 'tags.id = images_tags.tag_id'
									);
							
							
								$tags_raw = $this->my_database_model->select_from_table( 
																				$table = 'images_tags', 
																				$select_what = 'name',
																				$where_array = array(
																					'images_tags.showpage_item_id' => $value
																				), 
																				$use_order = TRUE, 
																				$order_field = 'name', 
																				$order_direction = 'asc', 
																				$limit = -1,
																				$use_join = TRUE, 
																				$join_array
																				);	
																				
								$tags_raw = $this->tools->object_to_array($tags_raw);								
								foreach( $tags_raw  as  $tag){
									foreach( $tag  as  $value){
										$tags[] = $value;
									}
								}
								$data['item2_tags'] = ( isset( $tags) ? $tags:array() );
				
				
						};
						
					}
					
				}
				unset($tags);
				/*three*/
				
				foreach( $data['showpage_items']  as  $showpage_item){
					foreach( $showpage_item  as  $key => $value){
						$showpage_item[$key]=$value;
						if( $key == 'showpage_item3_image_id'){
							
								$join_array = array(
									'tags' => 'tags.id = images_tags.tag_id'
									);
							
							
								$tags_raw = $this->my_database_model->select_from_table( 
																				$table = 'images_tags', 
																				$select_what = 'name',
																				$where_array = array(
																					'images_tags.showpage_item_id' => $value
																				), 
																				$use_order = TRUE, 
																				$order_field = 'name', 
																				$order_direction = 'asc', 
																				$limit = -1,
																				$use_join = TRUE, 
																				$join_array
																				);	
																				
								$tags_raw = $this->tools->object_to_array($tags_raw);								
								foreach( $tags_raw  as  $tag){
									foreach( $tag  as  $value){
										$tags[] = $value;
									}
								}
								$data['item3_tags'] = ( isset( $tags) ? $tags:array() );
				
				
						};
						
					}
					
				}
				unset($tags);
				/*four*/
				
				
				foreach( $data['showpage_items']  as  $showpage_item){
					foreach( $showpage_item  as  $key => $value){
						$showpage_item[$key]=$value;
						if( $key == 'showpage_item4_image_id'){
							
								$join_array = array(
									'tags' => 'tags.id = images_tags.tag_id'
									);
							
							
								$tags_raw = $this->my_database_model->select_from_table( 
																				$table = 'images_tags', 
																				$select_what = 'name',
																				$where_array = array(
																					'images_tags.showpage_item_id' => $value
																				), 
																				$use_order = TRUE, 
																				$order_field = 'name', 
																				$order_direction = 'asc', 
																				$limit = -1,
																				$use_join = TRUE, 
																				$join_array
																				);	
																				
								$tags_raw = $this->tools->object_to_array($tags_raw);								
								foreach( $tags_raw  as  $tag){
									foreach( $tag  as  $value){
										$tags[] = $value;
									}
								}
								$data['item4_tags'] = ( isset( $tags) ? $tags:array() );
				
				
						};
						
					}
					
				}
				

				$this->load->view('main/showpage/items/form_view', 
					array( 'data' => $data )
				);
		
	}
	
	


	/**
	 * get_destination_form
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/get_destination_form
	 * @access public
	 */
	 
	 
	public function get_destination_form(){
		
				$data['destination_items'] = $this->query->get_destination_items(
							$where_array = array( 'id' => $this->input->get('destination_item_id')) 
				);	


				/* one */
				foreach( $data['destination_items']  as  $destination_item){
					foreach( $destination_item  as  $key => $value){
						$destination_item[$key]=$value;
						if( $key == 'destination_image_id'){
							
								$join_array = array(
									'tags' => 'tags.id = destinations_items_tags.tag_id'
									);
							
							
								$tags_raw = $this->my_database_model->select_from_table( 
																				$table = 'destinations_items_tags', 
																				$select_what = 'name',
																				$where_array = array(
																					'destinations_items_tags.destination_item_id' => $value
																				), 
																				$use_order = TRUE, 
																				$order_field = 'name', 
																				$order_direction = 'asc', 
																				$limit = -1,
																				$use_join = TRUE, 
																				$join_array
																				);	
																				
								$tags_raw = $this->tools->object_to_array($tags_raw);								
								foreach( $tags_raw  as  $tag){
									foreach( $tag  as  $value){
										$tags[] = $value;
									}
								}
								$data['destination_hero_tags'] = ( isset( $tags) ? $tags:array() );
				
				
						};
						
					}
					
				}
				unset($tags);

				

				$this->load->view('main/destination/items/form_view', 
					array( 'data' => $data )
				);
		
	}
	
	
	/**
	 * ajax_update
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/form
	 * @access public
	 */
	 


	public function ajax_update(){


		$db_response = $this->query->update( $this->input->post()  );

		header("Content-type: text/xml");	
		echo "<?xml version=\"1.0\"?>\n ";
		
		?>
		
		<container>
			<status><?php print_r( $db_response )    ?></status>
			<message><?php echo 'test2'    ?></message>
			<db_response><?php echo  $db_response   ?></db_response>
		</container>
		
		
		<?php     

	}

	

/**
	 * upload_image_form
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/upload_image_form
	 * @access public
	 */
	 


	public function upload_image_form(){
		
		$what_item = $this->input->get('what_item');

		$data= array(
			$what_item.'_item_id' => $this->input->get($what_item.'_item_id'),
			$what_item.'_items_image_id' => $this->input->get($what_item.'_items_image_id'),
			'image_type' => $this->input->get('image_type'),
			'image_type_id' => $this->input->get('image_type_id')
		);	
		

		$this->load->view('main/'.
		$what_item
		.'/items/upload_image_form_view', array('data' => $data) );
	
  

	}	





/**
	 * upload_image
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/upload_image
	 * @access public
	 **/ 
	
	function upload_image(){
		
			$what_item = $this->input->post('what_item');
			$items_image_id = $this->input->post('items_image_id' );

			$table = $what_item.'_items_images';
			
		  $where_array = array(
		  	'id' => $items_image_id
		  );

		  if( $this->my_database_model->check_if_exist($where_array, $table)){


			}else{
			
				$insert_what = array(
					$what_item.'_item_id' => $this->input->post($what_item.'_item_id'),
					'image_type' => $this->input->post('image_type'),
					'image_type_id' => $this->input->post('image_type_id')
				);
				                  
				
				$items_image_id = $this->my_database_model->insert_table(
									$table, 
									$insert_what
									); 	
			}

		
		$path_array = array(
			'folder'=> $what_item.'_items_images', 
			'items_image_id' => $items_image_id
		);
		
		$upload_path = $this->tools->set_directory_for_upload( $path_array );
		
		$config['upload_path'] = './' . $upload_path;
		$config['allowed_types'] = 'bmp|jpeg|gif|jpg|png';
		$config['overwrite'] = 'TRUE';
		$config['file_name'] = 'transition.png';
		
		$this->load->library('upload', $config);

	
		if ( ! $this->upload->do_upload("Filedata")){
					?>
							<script type="text/javascript" language="Javascript">
								
								alert(<?php echo $this->upload->display_errors();    ?>);
								
							</script>
					 		
					<?php 
					exit;	
		}	
		else{	
			
					?>
						
									<script type="text/javascript" language="Javascript">
												
												window.parent.$('#submit_jcrop_table').show();
												window.parent.open_jcrop( <?php echo $items_image_id    ?>); 
												
												
									</script>
					 	
						
					<?php
			
		}				
		
	
	
	}




public function iframe_jcrop_form(){
	
			$what_item = $this->input->get('what_item');
	
			$image_item_id = $this->input->get($what_item.'_image_item_id');
		
			$dir_path = 'uploads/'.$what_item.'_items_images/'  .  $image_item_id ;
		
			
			$image_information = getimagesize($dir_path . '/' . 'transition.png');
			
			$width_of_file = $image_information[0];
			$height_of_file = $image_information[1];
	
	
			$new_width  = '500';
			$new_height = $this->tools->get_new_size_of ($what = 'height', $based_on_new = $new_width, $orig_width = $width_of_file, $orig_height = $height_of_file );
			
			$this->tools->resize_this(  $full_path = $dir_path . '/' . 'transition.png' , $width = $new_width, $height = $new_height);
	
	
			$data= array(
			'width_of_file' => $new_width, 
			'height_of_file' => $new_height,
			$what_item.'_image_item_id' => $image_item_id			
			 );	
			
			
			$this->load->view('main/'.$what_item.'/items/iframe_jcrop_view', $data);


	
}



public function crop_image(){
	
$what_item = $this->input->post('what_item');
	
$image_item_id	= $this->input->post($what_item.'_image_item_id');

$dir_path = 'uploads/'.$what_item.'_items_images/'  .  $image_item_id . '/';
		
		

		$x_origin = $this->input->post('x_origin');
		$y_origin = $this->input->post('y_origin');
		$width = $this->input->post('width');
		$height = $this->input->post('height');
	
		$this->tools->crop_and_name_it( $new_name = 'image.png', $dir_path.'transition.png', $dir_path, $width, $height, $x_origin, $y_origin );
	
		$new_width  = '222';
		$new_height = $this->tools->get_new_size_of ($what = 'height', $based_on_new = $new_width, $orig_width = $width, $orig_height = $height );
		
		$this->tools->resize_this(  $full_path = $dir_path . '/' . 'image.png' , $width = $new_width, $height = $new_height);


		$new_tiny_width  = '222';
		$new_tiny_height = $this->tools->get_new_size_of (
			$what = 'height', 
			$based_on_new = $new_width, 
			$orig_width = $new_width, 
			$orig_height = $new_height 
		);
		

		$this->tools->clone_and_resize_append_name_of(
			$appended_suffix = '_tiny', 
			$full_path = $dir_path . '/' . 'image.png', 
			$width = $new_tiny_width, 
			$height = $new_tiny_height
			);
		
		
		
		// ** Delete transitional image
		$this->tools->recursiveDelete($dir_path.'transition.png');
	
}

	
/**
	 * resize_images
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/resize_images
	 * @access public
	 **/ 
	 
	public function resize_images(){
		
	$what_item = $this->input->get('what_item');
	$image_type = $this->input->get('image_type');
	$image_id = $this->input->get('image_id');
	
	$dir_path = 'uploads/'.$what_item.'_items_images/'.$image_id; 
		
	$image_information = getimagesize($dir_path . '/' . 'image.png');
	
	$width_of_file = $image_information[0];
	$height_of_file = $image_information[1];
	
	
	
		$this->my_database_model->update_table_where(
								$table = $what_item.'_items_images', 
								$where_array = array(
								'id'=> $image_id
								),
								$set_what_array = array(
									'width'=> $width_of_file,
									'height'=> $height_of_file
									)
								);	
								
			$new_width  = '255';								

			switch ($image_type ) {

		    case 'showpage_hero':
	
						$new_width  = '300';
						
		    break;	

		    case 'item2':
	
						$new_width  = '300';
						
		    break;	
			        	    		     		    
		    case 'item3':
	
						$new_width  = '300';
						
		    break;	
		    
		    case 'item4':
	
						$new_width  = '300';
						
		    break;			    

		  }

	$new_height = $this->tools->get_new_size_of ($what = 'height', $based_on_new = $new_width, $orig_width = $width_of_file, $orig_height = $height_of_file );


	$this->tools->clone_and_resize_append_name_of(
		$appended_suffix = '_tiny', 
		$full_path = $dir_path . '/' . 'image.png', 
		$width = $new_width, 
		$height = $new_height
		);
		

						
			?>
				<script type="text/javascript" language="Javascript">
					window.parent.location.reload(true);		
				</script>
 
			<?php 						
						
						

}






function t(){
	
	
				$table = 'tags';
				
				$this->my_database_model->	create_generic_table($table );
				
				
				
				$fields_array = array(
				
															'name' => array(
				                                               'type' => 'varchar(255)')				                                               		                                               			                                               				                                                                                           
				              ); 
				              
				$this->my_database_model->add_column_to_table_if_exist(
					$table, 
					$fields_array
				);
              
				$table = 'images_tags';
				
				$this->my_database_model->	create_generic_table($table );
				
				
				
				$fields_array = array(
				
															'tag_id' => array(
				                                               'type' => 'int(11)')	,			                                               		                                               			                                               				                                                                                           
															'showpage_item_id' => array(
				                                               'type' => 'int(11)')					                                               
				              ); 
				              
				$this->my_database_model->add_column_to_table_if_exist(
					$table, 
					$fields_array
				);                      
    
  }  


}
/* End of file main.php */
/* Location: ./application/controllers/main.php */