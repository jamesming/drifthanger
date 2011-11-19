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
		
			    case 'nu_spotlight':
		
						$data = $this->custom->prepare_nu_spotlight_items( 
								$segment4,
								$this->input->get()
						 );
						 
			    break;
				
			    case 'carousel':
		
						$data = $this->custom->prepare_carousel_items( 
								$segment4,
								$this->input->get()
						 );
	 

			    break;
			    
			    
			    case 'feature':
		
						$data = $this->custom->prepare_feature_items( 
								$segment4,
								$this->input->get()
						 );
						 

			    break;
			    
			    
			    case 'showpage':
		
						$data = $this->custom->prepare_showpage_items( 
								$segment4,
								$this->input->get()
						 );
						 

			    break;
			    
			    case 'showpage_cast':
		
						$data = $this->custom->prepare_showpage_cast_items( 
								$segment4,
								$this->input->get()
						 );
					

			    break;
			    
			    case 'showpage_feature':
		
						$data = $this->custom->prepare_showpage_feature_items( 
								$segment4,
								$this->input->get()
						 );

			    break;
			    
			    
			    case 'showpage_photos':
		
						$data = $this->custom->prepare_showpage_photos_items( 
								$segment4,
								$this->input->get()
						 );

			    break;	
			    
			    
			    case 'showpage_mobile_gallery_photo':
		
						$data = $this->custom->prepare_showpage_mobile_gallery_photo_items( 
								$segment4,
								$this->input->get()
						 );
					

			    break;
			    
	    
			    
			    case 'calendar':
		
						$data = $this->custom->prepare_calendar($this->input->get());

			    break;

				};


				$this->load->view('main/index_view', 
					array('data' => $data)
				);
	}
	
	/**
	 * get_nu_spotlight_form
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/get_nu_spotlight_form
	 * @access public
	 */
	 
	 
	public function get_nu_spotlight_form(){
		
				$data['nu_spotlight_items'] = $this->query->get_nu_spotlight_items(
							$where_array = array( 'id' => $this->input->get('nu_spotlight_item_id')) 
				);	
				

				$this->load->view('main/nu_spotlight/items/form_view', 
					array( 'data' => $data )
				);
		
	}
	
	
	/**
	 * get_feature_form
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/get_feature_form
	 * @access public
	 */
	 
	 
	public function get_feature_form(){
		
				$data['feature_items'] = $this->query->get_feature_items(
							$where_array = array( 'id' => $this->input->get('feature_item_id')) 
				);	
				
				

				$this->load->view('main/feature/items/form_view', 
					array( 'data' => $data )
				);
		
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
				

				$this->load->view('main/showpage/items/form_view', 
					array( 'data' => $data )
				);
		
	}
	
	
	/**
	 * get_showpage_cast_form
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/get_showpage_cast_form
	 * @access public
	 */
	 
	 
	public function get_showpage_cast_form(){
		
				$data['showpage_cast_items'] = $this->query->get_showpage_cast_items(
							$where_array = array( 'id' => $this->input->get('showpage_cast_item_id')) 
				);	
				
				$this->load->view('main/showpage_cast/items/form_view', 
					array( 'data' => $data )
				);
		
	}
	


	
	/**
	 * get_showpage_photos_form
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/get_showpage_photos_form
	 * @access public
	 */
	 
	 
	public function get_showpage_photos_form(){
		
				$data['showpage_photos_items'] = $this->query->get_showpage_photos_items(
							$where_array = array( 'id' => $this->input->get('showpage_photos_item_id')) 
				);	
				

				$this->load->view('main/showpage_photos/items/form_view', 
					array( 'data' => $data )
				);
		
	}
	
	/**
	 * get_showpage_mobile_gallery_photo__form
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/get_showpage_iphone_gallery_photo__form
	 * @access public
	 */
	 
	 
	public function get_showpage_mobile_gallery_mobile_form(){
		
				$data['showpage_mobile_gallery_photo_items'] = $this->query->get_showpage_mobile_gallery_photo_items(
							$where_array = array( 'id' => $this->input->get('showpage_mobile_gallery_photo_item_id')) 
				);	


				$this->load->view('main/showpage_mobile_gallery_photo/items/form_view', 
					array( 'data' => $data )
				);
		
	}
	
	/**
	 * get_showpage_android_gallery_photo_form
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/get_showpage_android_gallery_photo__form
	 * @access public
	 */
	 
	 
	public function get_showpage_android_gallery_photo_form(){
		
				$data['showpage_android_gallery_photo_items'] = $this->query->get_showpage_android_gallery_photo_items(
							$where_array = array( 'id' => $this->input->get('showpage_android_gallery_photo_item_id')) 
				);	
				
				$this->load->view('main/showpage_android_gallery_photo/items/form_view', 
					array( 'data' => $data )
				);
		
	}	
	
	/**
	 * showpage_feature
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/showpage_feature
	 * @access public
	 */
	 
	 
	public function get_showpage_feature_form(){
		
				$data['showpage_feature_items'] = $this->query->get_showpage_feature_items(
							$where_array = array( 'id' => $this->input->get('showpage_feature_item_id')) 
				);	
				
				$this->load->view('main/showpage_feature/items/form_view', 
					array( 'data' => $data )
				);
		
	}

	/**
	 * get_carousel_form
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/get_carousel_form
	 * @access public
	 */
	 
	 
	public function get_carousel_form(){
		
				$data['carousel_items'] = $this->query->get_carousel_items(
							$where_array = array( 'id' => $this->input->get('carousel_item_id')) 
				);	
				
	
				$data['showpage_items'] = $this->query->get_showpage_items();	


				$this->load->view('main/carousel/items/form_view', 
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
	 * upload_carousel_image_form
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/upload_image_form
	 * @access public
	 */
	 


	public function upload_carousel_image_form(){

		$data= array(
			'carousel_item_id' => $this->input->get('carousel_item_id'),
			'carousel_items_image_id' => $this->input->get('carousel_items_image_id'),
			'image_type' => $this->input->get('image_type'),
			'image_type_id' => $this->input->get('image_type_id')
		);	
		
			
		$this->load->view('main/carousel/items/upload_image_form_view', array('data' => $data) );
	
  

	}	
	
	
	
	
	
/**
	 * upload_carousel_image
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/upload_image
	 * @access public
	 **/ 
	
	function upload_carousel_image(){
		
		
			$carousel_items_image_id = $this->input->post('carousel_items_image_id');
			
			$carousel_item_id = $this->input->post('carousel_item_id');

			$table = 'carousel_items_images';
			
		  $where_array = array('id' => $carousel_items_image_id );

		  if( $this->my_database_model->check_if_exist($where_array, $table)){


			}else{
			
				$insert_what = array(
					'carousel_item_id' => $carousel_item_id,
					'image_type' => $this->input->post('image_type'),
					'image_type_id' => $this->input->post('image_type_id'),
				);
				                  
				
				$carousel_items_image_id = $this->my_database_model->insert_table(
									$table, 
									$insert_what
									); 	
			}

		
		$path_array = array(
			'folder'=> 'carousel_items_images', 
			'carousel_items_image_id'=> $carousel_items_image_id
		);
		
		$upload_path = $this->tools->set_directory_for_upload( $path_array );
		
		$config['upload_path'] = './' . $upload_path;
		$config['allowed_types'] = 'bmp|jpeg|gif|jpg|png';
		$config['overwrite'] = 'TRUE';
		$config['file_name'] = 'image.png';
		
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
												document.location = '<?php echo base_url()    ?>index.php/main/Resize_carousel_images?image_type=<?php echo  $this->input->post('image_type')   ?>&carousel_image_id=<?php echo $carousel_items_image_id    ?>';		
									</script>
					 	
						
					<?php
			
		}				
		
	
	
	}
	
/**
	 * resize_carousel_images
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/resize_carousel_images
	 * @access public
	 **/ 
	 
	public function resize_carousel_images(){
		
	$image_type = $this->input->get('image_type');
	$carousel_image_id = $this->input->get('carousel_image_id');
	
	$dir_path = 'uploads/carousel_items_images/'.$carousel_image_id; 
		
	$image_information = getimagesize($dir_path . '/' . 'image.png');
	
	$width_of_file = $image_information[0];
	$height_of_file = $image_information[1];
	
	$this->my_database_model->update_table_where(
							$table = 'carousel_items_images', 
							$where_array = array(
							'id'=> $carousel_image_id
							),
							$set_what_array = array(
								'width'=> $width_of_file,
								'height'=> $height_of_file
								)
							);	

	switch ($image_type ) {

    case 'hero':

				$new_width  = '317';
				
    break;
    
    
    case 'right_tab':

				$new_width  = '77';
				
    break;
    
    
    case 'tune_in':

				$new_width  = '300';
				
    break;
    
    case 'hero_iphone':

				$new_width  = '100';
				
    break;
    
    case 'hero_android':

				$new_width  = '100';
				
    break;    
    
    
    case 'right_tab_iphone':

				$new_width  = '77';
				
    break;
    
    
    case 'right_tab_border_iphone':

				$new_width  = '77';
				
    break;		    
    
  }

	$new_height = $this->tools->get_new_size_of (
			$what = 'height', 
			$based_on_new = $new_width, 
			$orig_width = $width_of_file, 
			$orig_height = $height_of_file 
	);

	$this->tools->clone_and_resize_append_name_of(
	$appended_suffix = '_tiny', 
	$full_path = $dir_path . '/' . 'image.png', 
	$width = $new_width, 
	$height = $new_height
	);
	
	/* IPHONE IMAGES .. TAKE HI-RES AND SHRINK DOWN TO LOW */
	if (in_array($image_type, array(
																	'hero_iphone',
																	'hero_android',
																	'right_tab_iphone',
																	'right_tab_border_iphone',
																	'hero_android',
																	'right_tab_android',
																	'right_tab_border_android'																	
																	)
							)
		){

		copy(
			$dir_path . '/' . 'image.png', 
			$dir_path . '/' . 'image@2x.png'
		);		

		$new_height = $this->tools->get_new_size_of (
				$what = 'height', 
				$based_on_new = $width_of_file/2, 
				$orig_width = $width_of_file, 
				$orig_height = $height_of_file 
		);
		
		$this->tools->resize_this(
			$full_path = $dir_path . '/' . 'image.png', 
			$width = $width_of_file/2, 
			$height = $new_height
		);
		
		
		
	};
					
	?>
	<script type="text/javascript" language="Javascript">
		 window.parent.location.reload(true);		
	</script>
	<?php 						
						
						
	}



	/**
	 * carousel_sets_form
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/carousel_sets_form
	 * @access public
	 **/ 
	
	function carousel_sets_form(){
		
		$carousel_set_id = $this->input->get('carousel_set_id');
		
		$data['carousel_set_id'] = $carousel_set_id;
		 
		
		$data['carousel_items'] = $this->query->get_carousel_items();	
		
		
		if( !$carousel_set_id == 0 ){
			
				$data['carousel_sets'] = $this->query->get_carousel_sets(
							$where_array = array(
								'id' =>  $carousel_set_id		
							) 
				);
						
			
		};


		
		$this->load->view('main/carousel/sets/form_view', array('data' => $data) );
	
	}
	
	
	/**
	 * upload_nu_spotlight_image_form
	 * 
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/home/upload_image_form
	 * @access public
	 */
	 


	public function upload_nu_spotlight_image_form(){


		$data= array(
			'nu_spotlight_item_id' => $this->input->get('nu_spotlight_item_id'),
			'nu_spotlight_items_image_id' => $this->input->get('nu_spotlight_items_image_id'),
			'image_type' => $this->input->get('image_type'),
			'image_type_id' => $this->input->get('image_type_id')
		);	
		
			
		$this->load->view('main/nu_spotlight/items/upload_image_form_view', array('data' => $data) );
	
  

	}
	




	/**
	 * upload_nu_spotlight_image
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/upload_image
	 * @access public
	 **/ 
	
	function upload_nu_spotlight_image(){
		
		
			$nu_spotlight_items_image_id = $this->input->post('nu_spotlight_items_image_id');
			
			$nu_spotlight_item_id = $this->input->post('nu_spotlight_item_id');

			$table = 'nu_spotlight_items_images';
			
		  $where_array = array('id' => $nu_spotlight_items_image_id );

		  if( $this->my_database_model->check_if_exist($where_array, $table)){


			}else{
			
				$insert_what = array(
					'nu_spotlight_item_id' => $nu_spotlight_item_id,
					'image_type' => $this->input->post('image_type'),
					'image_type_id' => $this->input->post('image_type_id'),
				);
				                  
				
				$nu_spotlight_items_image_id = $this->my_database_model->insert_table(
									$table, 
									$insert_what
									); 	
			}

		
		$path_array = array(
			'folder'=> 'nu_spotlight_items_images', 
			'nu_spotlight_items_image_id'=> $nu_spotlight_items_image_id
		);
		
		$upload_path = $this->tools->set_directory_for_upload( $path_array );
		
		$config['upload_path'] = './' . $upload_path;
		$config['allowed_types'] = 'bmp|jpeg|gif|jpg|png';
		$config['overwrite'] = 'TRUE';
		$config['file_name'] = 'image.png';
		
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
							window.parent.location.reload(true);		
				</script>
 
			<?php     
			
		}				
		
	
	
	}
	
	
	/**
	 * nu_spotlight_sets_form
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/nu_spotlight_sets_form
	 * @access public
	 **/ 
	
	function nu_spotlight_sets_form(){
		
		$nu_spotlight_set_id = $this->input->get('nu_spotlight_set_id');
		
		$data['nu_spotlight_set_id'] = $nu_spotlight_set_id;
		 
		
		$data['nu_spotlight_items'] = $this->query->get_nu_spotlight_items();	
		
		
		if( !$nu_spotlight_set_id == 0 ){
			
				$data['nu_spotlight_sets'] = $this->query->get_nu_spotlight_sets(
							$where_array = array(
								'id' =>  $nu_spotlight_set_id		
							) 
				);
						
			
		};

		
		$this->load->view('main/nu_spotlight/sets/form_view', array('data' => $data) );
	
	}


	/**
	 * update_carousel_set_order
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/update_set_order
	 * @access public
	 **/ 
	 
function update_carousel_set_order(){
	
	
		$carousel_set_id = $this->input->post('carousel_set_id');
	
		if( $this->input->post('carousel_set_id') !=0 ){
			
				$this->my_database_model->update_table_where(
										$table = 'carousel_sets', 
										$where_array = array('id'=> $this->input->post('carousel_set_id')),
										$set_what_array = array(
												'name' => $this->input->post('name')
											)
										);			
										
				$this->my_database_model->delete_from_table(
					$table = 'carousel_items_sets', 
					$where_array = array(
															'carousel_set_id' => $carousel_set_id
														)
				);	
										
		}else{
			
				$carousel_set_id = $this->my_database_model->insert_table(
													'carousel_sets', 
													$insert_what = array(
														'name' => $this->input->post('name')
													)
												); 
			
		};


		for($i=1; $i <=5; $i++){
		
			$this->my_database_model->insert_table(
													'carousel_items_sets', 
													$insert_what = array(
															'carousel_set_id' => $carousel_set_id,
															'carousel_item_id' => $this->input->post('order'.$i),
															'order' => $i
														)
													); 
			
		}	
		
		?>
		<script type="text/javascript" language="Javascript">
		window.parent.location.reload();
		</script>
		<?php     
   
}


	/**
	 * remove_carousel_set
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/remove_carousel_set
	 * @access public
	 **/ 
	 
function remove_carousel_set(){
	
		$table = 'carousel_sets_calendars';
		$where_array = array(
				'carousel_set_id' => $this->input->get('carousel_set_id')
		);

		$result = $this->my_database_model->check_if_exist($where_array, $table );

		if( $result == TRUE ){
			$status = 'Error.  You can not remove sets that are programmed in the calendar.';
		}else{
			
			$this->my_database_model->delete_from_table(
				$table = 'carousel_items_sets', 
				$where_array = array(
					'carousel_set_id' => $this->input->get('carousel_set_id')
				)
			);
			
			$this->my_database_model->delete_from_table(
				$table = 'carousel_sets', 
				$where_array = array(
					'id' => $this->input->get('carousel_set_id')
				)
			);
			
			$status ='ok';
		};

		header("Content-type: text/xml");	
		echo "<?xml version=\"1.0\"?>\n ";
		
		?>
		
		<container>
			<status><?php echo $status    ?></status>
			<message></message>
			<db_response></db_response>
		</container>
		
		
		<?php    


}
	


	/**
	 * update_nu_spotlight_set_order
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/update_set_order
	 * @access public
	 **/ 
	 
function update_nu_spotlight_set_order(){
	
	
		$nu_spotlight_set_id = $this->input->post('nu_spotlight_set_id');
	
		if( $this->input->post('nu_spotlight_set_id') !=0 ){
			
				$this->my_database_model->update_table_where(
										$table = 'nu_spotlight_sets', 
										$where_array = array('id'=> $this->input->post('nu_spotlight_set_id')),
										$set_what_array = array(
												'name' => $this->input->post('name')
											)
										);			
										
				$this->my_database_model->delete_from_table(
					$table = 'nu_spotlight_items_sets', 
					$where_array = array(
															'nu_spotlight_set_id' => $nu_spotlight_set_id
														)
				);	
										
		}else{
			
				$nu_spotlight_set_id = $this->my_database_model->insert_table(
													'nu_spotlight_sets', 
													$insert_what = array(
														'name' => $this->input->post('name')
													)
												); 
			
		};


		for($i=1; $i <=5; $i++){
		
			$this->my_database_model->insert_table(
													'nu_spotlight_items_sets', 
													$insert_what = array(
															'nu_spotlight_set_id' => $nu_spotlight_set_id,
															'nu_spotlight_item_id' => $this->input->post('order'.$i),
															'order' => $i
														)
													); 
			
		}	
		
		?>
		<script type="text/javascript" language="Javascript">
		window.parent.location.reload();
		</script>
		<?php     
   
}


	/**
	 * remove_nu_spotlight_set
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/remove_nu_spotlight_set
	 * @access public
	 **/ 
	 
function remove_nu_spotlight_set(){
	
		$table = 'nu_spotlight_sets_calendars';
		$where_array = array(
				'nu_spotlight_set_id' => $this->input->get('nu_spotlight_set_id')
		);

		$result = $this->my_database_model->check_if_exist($where_array, $table );

		if( $result == TRUE ){
			$status = 'Error.  You can not remove sets that are programmed in the calendar.';
		}else{
			
			$this->my_database_model->delete_from_table(
				$table = 'nu_spotlight_items_sets', 
				$where_array = array(
					'nu_spotlight_set_id' => $this->input->get('nu_spotlight_set_id')
				)
			);
			
			$this->my_database_model->delete_from_table(
				$table = 'nu_spotlight_sets', 
				$where_array = array(
					'id' => $this->input->get('nu_spotlight_set_id')
				)
			);
			
			$status ='ok';
		};

		header("Content-type: text/xml");	
		echo "<?xml version=\"1.0\"?>\n ";
		
		?>
		
		<container>
			<status><?php echo $status    ?></status>
			<message></message>
			<db_response></db_response>
		</container>
		
		
		<?php    


}


	/**
	 * carousel_line_up_form
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/carousel_line_up_form
	 * @access public
	 **/ 
	 
function carousel_line_up_form(){
	
			$data['active'] = $this->input->get('active');
			$data['month'] = $this->input->get('month');
			$data['day'] = $this->input->get('day');
			$data['year'] = $this->input->get('year');
			$data['carousel_set_id'] = $this->input->get('carousel_set_id');
			$data['nu_spotlight_set_id'] = $this->input->get('nu_spotlight_set_id');
			$data['nu_spotlight_videos_calendar_id'] = $this->input->get('nu_spotlight_videos_calendar_id');
			
			if( $data['carousel_set_id'] == 0){
				$data['carousel_sets'] = $this->query->get_carousel_sets( );				
			}else{
				$data['carousel_sets'] = $this->query->get_carousel_sets(
							$where_array = array(
								'id' =>  $data['carousel_set_id']		
							) 
				);				
			};
			

			
			$this->load->view('main/calendar/carousel_lineup_form_view', 
				array('data' => $data)
			);
	
}


	/**
	 * nu_spotlight_line_up_form
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/sline_up_form
	 * @access public
	 **/ 
	 
function nu_spotlight_line_up_form(){
			$data['active'] = $this->input->get('active');	
			$data['month'] = $this->input->get('month');
			$data['day'] = $this->input->get('day');
			$data['year'] = $this->input->get('year');
			$data['carousel_set_id'] = $this->input->get('carousel_set_id');
			$data['nu_spotlight_set_id'] = $this->input->get('nu_spotlight_set_id');
			$data['nu_spotlight_videos_calendar_id'] = $this->input->get('nu_spotlight_videos_calendar_id');
			
			if( $data['nu_spotlight_set_id'] == 0){
				$data['nu_spotlight_sets'] = $this->query->get_nu_spotlight_sets( );				
			}else{
				$data['nu_spotlight_sets'] = $this->query->get_nu_spotlight_sets(
							$where_array = array(
								'id' =>  $data['nu_spotlight_set_id']		
							) 
				);				
			};
			

			
			$this->load->view('main/calendar/nu_spotlight_lineup_form_view', 
				array('data' => $data)
			);
	
}

	/**
	 * nu_spotlight_video_form
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/nu_spotlight_video_form
	 * @access public
	 **/ 
	 
	 
function nu_spotlight_video_form(){
				$data['active'] = $this->input->get('active');	
				$data['carousel_set_id'] = $this->input->get('carousel_set_id');
				$data['nu_spotlight_set_id'] = $this->input->get('nu_spotlight_set_id');
				$data['nu_spotlight_videos_calendar_id'] = $this->input->get('nu_spotlight_videos_calendar_id');
				$data['month'] = $this->input->get('month');
				$data['day'] = $this->input->get('day');
				$data['year'] = $this->input->get('year');
				
				$data['nu_spotlight_videos_calendars'] = $this->query->get_nu_spotlight_videos_calendars(
						$where_array = array(
							'id' => $data['nu_spotlight_videos_calendar_id']
						)
				);	

				$this->load->view('main/calendar/nu_spotlight_video_form_view', 
					array('data' => $data)
				);    	
}

	/**
	 * update_video_text_content
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/update_video_text_content
	 * @access public
	 **/ 


function update_video_text_content(){
    
		
		$fields = explode('&', $this->input->post('set_what_array'));
		foreach($fields as $field){
			$field_key_value = explode("=",$field);
			$key = urldecode($field_key_value[0]);
			$value = urldecode($field_key_value[1]);
			eval("$$key = \"$value\";");
			$what_array[$key] = $value;
		};


		$what_array['month'] = $this->input->post('month');
		$what_array['day'] = $this->input->post('day');
		$what_array['year'] = $this->input->post('year');
		$what_array['day_of_year'] = date('z',strtotime($this->input->post('year').'-'.$this->input->post('month').'-'.$this->input->post('day')));
		$what_array['unix_time'] = $this->input->post('year').'-'.$this->input->post('month').'-'.$this->input->post('day'); 


		if( $this->input->post('nu_spotlight_videos_calendar_id') == 0){
				$db_response = $this->my_database_model->insert_table(
												'nu_spotlight_videos_calendars', 
												$what_array
												); 
			
		}else{
					$db_response = $this->my_database_model->update_table_where(
								$table = 'nu_spotlight_videos_calendars', 
								$where_array = 
									array(
										'id' => $this->input->post('nu_spotlight_videos_calendar_id') 
									),
								$what_array
								);
								
					echo $db_response;
		};



}

	/**
	 * delete_video_text_content
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/delete_video_text_content
	 * @access public
	 **/ 


function delete_video_text_content(){
	
				$where_array['id'] = $this->input->post('nu_spotlight_videos_calendar_id');

				$this->my_database_model->delete_from_table(
					'nu_spotlight_videos_calendars', 
					$where_array
				);	
	
}






	/**
	 * update_carousel_calendar
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/update_carousel_calendar
	 * @access public
	 **/ 
	 
function update_carousel_calendar(){

			$this->my_database_model->delete_from_table(
				$table = 'carousel_sets_calendars', 
				$where_array = array(
															'month' => $this->input->get('month'),
															'day' => $this->input->get('day'),
															'year' => $this->input->get('year')
													)
			);	



			if( $this->input->get('delete') == 0){
				
						$this->my_database_model->insert_table(
																$table = 'carousel_sets_calendars',
																$insert_what = array(
																		'carousel_set_id' =>  $this->input->get('carousel_set_id'),
																		'month' => $this->input->get('month'),
																		'day' => $this->input->get('day'),
																		'year' => $this->input->get('year'),
																		'day_of_year' => date('z',strtotime($this->input->get('year').'-'.$this->input->get('month').'-'.$this->input->get('day')))
																	)
																); 
				
			};

		?>
		<script type="text/javascript" language="Javascript">
		window.parent.location.reload();
		</script>
		<?php
	
}



	/**
	 * update_nu_spotlight_calendar
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/update_nu_spotlight_calendar
	 * @access public
	 **/ 
	 
function update_nu_spotlight_calendar(){

			$this->my_database_model->delete_from_table(
				$table = 'nu_spotlight_sets_calendars', 
				$where_array = array(
															'month' => $this->input->get('month'),
															'day' => $this->input->get('day'),
															'year' => $this->input->get('year')
													)
			);	



			if( $this->input->get('delete') == 0){
				
						$this->my_database_model->insert_table(
																$table = 'nu_spotlight_sets_calendars',
																$insert_what = array(
																		'nu_spotlight_set_id' =>  $this->input->get('nu_spotlight_set_id'),
																		'month' => $this->input->get('month'),
																		'day' => $this->input->get('day'),
																		'year' => $this->input->get('year'),
																		'day_of_year' => date('z',strtotime($this->input->get('year').'-'.$this->input->get('month').'-'.$this->input->get('day')))
																	)
																); 
				
			};

		?>
		<script type="text/javascript" language="Javascript">
		window.parent.location.reload();
		</script>
		<?php
	
}



	/**
	 * create_facebook_link_form
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/create_facebook_link_form
	 * @access public
	 **/ 
function create_facebook_link_form(){
	
	$which_table = $this->input->get('table');
	
	switch ( $which_table ) {
	
		  case 'carousel':
		
					$data['carousel_items_images'] =  $this->my_database_model->select_from_table( 
									$table = 'carousel_items_images', 
									$select_what = '*', 
									$where_array = array(
																	'id'=> $this->input->get('carousel_items_image_id')
																	), 
									$use_order = FALSE, 
									$order_field = '', 
									$order_direction = 'desc', 
									$limit = -1
									);
				
					$this->load->view('main/carousel/items/create_facebook_link_form_view', 
						array('data' => $data)
					);		
					
		  break;	
		  
		  case 'showpage':
		
					$data['showpage_items_images'] =  $this->my_database_model->select_from_table( 
									$table = 'showpage_items_images', 
									$select_what = '*', 
									$where_array = array(
																	'id'=> $this->input->get('showpage_items_image_id')
																	), 
									$use_order = FALSE, 
									$order_field = '', 
									$order_direction = 'desc', 
									$limit = -1
									);
				
					$this->load->view('main/showpage/items/create_facebook_link_form_view', 
						array('data' => $data)
					);		
					
		  break;	
		  
	};


  
	
}

	/**
	 * create_facebook_hotspot_on_tune_in_image
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/create_facebook_hotspot_on_tune_in_image
	 * @access public
	 **/ 
function create_facebook_hotspot_on_tune_in_image(){
	
	$which_table = $this->input->post('table');

	$this->my_database_model->update_table_where(
							$table = $which_table.'_items_images', 
							$where_array = array(
							'id'=> $this->input->post($which_table.'_items_image_id')
							),
							$set_what_array = array(
								'facebook_left'=> $this->input->post('x_origin'),
								'facebook_top'=> $this->input->post('y_origin'),
								'facebook_width'=> $this->input->post('width'),
								'facebook_height'=> $this->input->post('height'),
								'facebook_link'=> $this->input->post('facebook_link')
								)
							);	
?>	
submitted	
<?php     
}








	/**
	 * create_video_link_form
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/create_video_link_form
	 * @access public
	 **/ 
function create_video_link_form(){

	$which_table = $this->input->get('table');
	
	switch ( $which_table ) {
	
		  case 'carousel':
		
				$data['carousel_items_images'] =  $this->my_database_model->select_from_table( 
								$table = 'carousel_items_images', 
								$select_what = '*', 
								$where_array = array(
																'id'=> $this->input->get('carousel_items_image_id')
																), 
								$use_order = FALSE, 
								$order_field = '', 
								$order_direction = 'desc', 
								$limit = -1
								);
			
				$this->load->view('main/carousel/items/create_video_link_form_view', 
					array('data' => $data)
				);
				
		  break;	
		  
		  case 'showpage':
		
				$data['showpage_items_images'] =  $this->my_database_model->select_from_table( 
								$table = 'showpage_items_images', 
								$select_what = '*', 
								$where_array = array(
																'id'=> $this->input->get('showpage_items_image_id')
																), 
								$use_order = FALSE, 
								$order_field = '', 
								$order_direction = 'desc', 
								$limit = -1
								);
			
				$this->load->view('main/showpage/items/create_video_link_form_view', 
					array('data' => $data)
				);
				
		  break;	

	}

	
}

	/**
	 * create_video_hotspot_on_tune_in_image
	 *
	 * {@source }
	 * @package BackEnd
	 * @author James Ming <jamesming@gmail.com>
	 * @path /index.php/main/create_video_hotspot_on_tune_in_image
	 * @access public
	 **/ 
function create_video_hotspot_on_tune_in_image(){
	
	$which_table = $this->input->post('table');

	$this->my_database_model->update_table_where(
							$table = $which_table.'_items_images', 
							$where_array = array(
							'id'=> $this->input->post($which_table.'_items_image_id')
							),
							$set_what_array = array(
									'video_left'=> $this->input->post('x_origin'),
									'video_top'=> $this->input->post('y_origin'),
									'video_width'=> $this->input->post('width'),
									'video_height'=> $this->input->post('height'),
									'video_link'=> $this->input->post('video_link')
								)
							);	
							

?>	
submitted	
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
			$what_item.'_items_image_id'=> $items_image_id
		);
		
		$upload_path = $this->tools->set_directory_for_upload( $path_array );
		
		$config['upload_path'] = './' . $upload_path;
		$config['allowed_types'] = 'bmp|jpeg|gif|jpg|png';
		$config['overwrite'] = 'TRUE';
		$config['file_name'] = 'image.png';
		
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
												document.location = '<?php echo base_url()    ?>index.php/main/resize_images?what_item=<?php  echo $what_item   ?>&image_type=<?php echo  $this->input->post('image_type')   ?>&image_id=<?php echo $items_image_id    ?>';		
									</script>
					 	
						
					<?php
			
		}				
		
	
	
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
				
		    case 'feature_title_graphic':
	
						$new_width  = '255';
						
		    break;	

		    case 'showpage_hero':
	
						$new_width  = '300';
						
		    break;	


		    case 'showpage_title':
	
						$new_width  = '455';
						
		    break;					
				
		    case 'showpage_dropdown':
	
						$new_width  = '460';
						
		    break;					
				
		    case 'showpage_feature_large':
	
						$new_width  = '458';
						
		    break;	
		    case 'showpage_hero_iphone':
	
						$new_width  = '200';
						
		    break;	
		    
		    case 'showpage_hero_android':
	
						$new_width  = '200';
						
		    break;	
		    
		    case 'showpage_hero_ipad':
	
						$new_width  = '320';
						
		    break;			    
		    
		    case 'showpage_ipad_hero_thumb':
	
						$new_width  = '262';
						
		    break;		    
		    case 'showpage_hero_mobile_thumb':
	
						$new_width  = '100';
						
		    break;			    
		    		 
		    case 'showpage_feature_small':
	
						$new_width  = '138';
						
		    break;			    
		    
		    case 'feature_large':
	
						$new_width  = '295';
						
		    break;
		    
		    
		    case 'showpage_cast':
	
						$new_width  = '148';
						
		    break;		    
		    
		    
		    case 'showpage_cast_iphone':
	
						$new_width  = '148';
						
		    break;		   
		    
		    case 'showpage_iphone_gallery_photo':
	
						$new_width  = '160';
						
		    break;
		    
		    		
		    case 'showpage_ipad_gallery_photo':
	
						$new_width  = '320';
						
		    break;

		    case 'showpage_iphone_gallery_photo_thumb_inactive':
	
						$new_width  = '132';
						
		    break;		

		    case 'showpage_iphone_gallery_photo_thumb_active':
	
						$new_width  = '132';
						
		    break;		
		    
		    case 'showpage_android_gallery_photo':
	
						$new_width  = '160';
						
		    break;		


		    case 'showpage_android_gallery_photo_thumb_inactive':
	
						$new_width  = '132';
						
		    break;		

		    case 'showpage_android_gallery_photo_thumb_active':
	
						$new_width  = '132';
						
		    break;			        	    		     		    

		  }

	$new_height = $this->tools->get_new_size_of ($what = 'height', $based_on_new = $new_width, $orig_width = $width_of_file, $orig_height = $height_of_file );


	$this->tools->clone_and_resize_append_name_of(
		$appended_suffix = '_tiny', 
		$full_path = $dir_path . '/' . 'image.png', 
		$width = $new_width, 
		$height = $new_height
		);
		
		
		
		
		
		
	/* IPHONE IMAGES .. TAKE HI-RES AND SHRINK DOWN TO LOW */
	if (in_array($image_type, array(
																	'showpage_hero_iphone',
																	'showpage_cast_iphone',
																	'showpage_iphone_gallery_photo',
																	'showpage_iphone_gallery_photo_thumb_inactive',
																	'showpage_iphone_gallery_photo_thumb_active',																
																	'showpage_hero_mobile_thumb',
																	'showpage_hero_android',
																	'showpage_android_gallery_photo'																	
																	)
							)
		){

		copy(
			$dir_path . '/' . 'image.png', 
			$dir_path . '/' . 'image@2x.png'
		);		

		$new_height = $this->tools->get_new_size_of (
				$what = 'height', 
				$based_on_new = $width_of_file/2, 
				$orig_width = $width_of_file, 
				$orig_height = $height_of_file 
		);
		
		$this->tools->resize_this(
			$full_path = $dir_path . '/' . 'image.png', 
			$width = $width_of_file/2, 
			$height = $new_height
		);
		

		
	}	
	
	
	
	
	
	

						
			?>
				<script type="text/javascript" language="Javascript">
					window.parent.location.reload(true);		
				</script>
 
			<?php 						
						
						

}






function t(){
	
	
				$table = 'showpage_items_images';
				
//				$this->my_database_model->	create_generic_table($table );
				
				
				
				$fields_array = array(
				
															'facebook_top' => array(
				                                               'type' => 'int(11)'),
				
															'facebook_left' => array(
				                                               'type' => 'int(11)'),   
				
															'facebook_width' => array(
				                                               'type' => 'int(11)'),
				
															'facebook_height' => array(
				                                               'type' => 'int(11)'),  
				
															'video_top' => array(
				                                               'type' => 'int(11)'),
				
															'video_left' => array(
				                                               'type' => 'int(11)'),  	
				
															'video_width' => array(
				                                               'type' => 'int(11)'),
				
															'video_height' => array(
				                                               'type' => 'int(11)'),  		
				                                               
															'facebook_link' => array(
				                                               'type' => 'int(11)'),
				
															'video_link' => array(
				                                               'type' => 'int(11)'),  						                                               		                                               			                                               				                                                                                           
				              ); 
				              
				$this->my_database_model->add_column_to_table_if_exist(
					$table, 
					$fields_array
				);
              
                      
    
  }  


}
/* End of file main.php */
/* Location: ./application/controllers/main.php */