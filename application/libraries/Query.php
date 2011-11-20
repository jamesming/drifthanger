<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Custom Library Related to SceneCredit
 * @autoloaded YES
 * @path \system\application\libraries\Custom.php
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @copyright 2010 Prospace LLC
 * @version 1.0
 * 
 */
class Query {

private $CI;			// CodeIgniter instance


function query(){
	
	$this->CI =& get_instance();	
	
}


/**
 * update( 
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return string  */ 
	
	function update( $post_array, $user_id = 1 ){
		

		switch ( $post_array['crud'] ) {
	
	    case 'insert':

					$db_response = $this->CI->my_database_model->insert_table(
													$post_array['table'], 
													$insert_what = array()
													); 
	
	    break;
	    
	    case 'insert_with_showpage_id':

					$db_response = $this->CI->my_database_model->insert_table(
													$post_array['table'], 
													$insert_what = array(
														'showpage_item_id' => $post_array['showpage_item_id']
													)
													); 
	
	    break;	    
	    
	    
	    case 'update':
	    
	    		$table = $post_array['table'];

					$fields = explode('&', $post_array['set_what_array']);
					foreach($fields as $field){
						$field_key_value = explode("=",$field);
						$key = urldecode($field_key_value[0]);
						$value = urldecode($field_key_value[1]);
						eval("$$key = \"$value\";");
						$set_where_array[$key] = $value;
					};	  
  
  
  				foreach( $set_where_array  as  $key => $value){
							$fields_array = array(
										$key => array('type' => 'varchar(255)')                                          
		              	); 
		  
							$this->CI->my_database_model->add_column_to_table_if_exist(
								$table, 
								$fields_array
							);    					
  				};
 

					$db_response = $this->CI->my_database_model->update_table_where(
								$table, 
								$where_array = array('id'=>$post_array['id']),
								$set_what_array = $set_where_array
								);
	
	    break;
	    
	    
	    
	    
		};

		return $db_response;
		
		
	}	







/**
 * get_destination_items
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return array  */ 
	
	function get_destination_items( $where_array = array()){
		
			$destination_items_raw = $this->CI->my_database_model->select_from_table( 
			$table = 'destination_items', 
			$select_what = '*', 
			$where_array, 
			$use_order = TRUE, 
			$order_field = 'created', 
			$order_direction = 'desc',
			$limit = -1
			);


			$image_types_array = array(
								'destination_image_id' => 45,
							);
				
			$destination_items = $this->prepare_array(
				$items_tables_raw = $this->CI->tools->object_to_array($destination_items_raw),
				$name_of_item_id	 = 'destination_item_id',
				$image_table = 'destination_items_images',
				$image_types_array);
			

			return $destination_items;	
		
	}






/**
 * get_showpage_items
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @return array  */ 
	
	function get_showpage_items( $where_array = array() ){
		
			$showpage_items_raw = $this->CI->my_database_model->select_from_table( 
			$table = 'showpage_items', 
			$select_what = '*', 
			$where_array, 
			$use_order = TRUE, 
			$order_field = 'name', 
			$order_direction = 'asc', 
			$limit = -1
			);
			

			$image_types_array = array(
								'showpage_hero_items_image_id' => 10,
								'showpage_item2_image_id' => 42,
								'showpage_item3_image_id' => 43,
								'showpage_item4_image_id' => 44
							);
				
			$showpage_items = $this->prepare_array(
				$items_tables_raw = $this->CI->tools->object_to_array($showpage_items_raw),
				$name_of_item_id	 = 'showpage_item_id',
				$image_table = 'showpage_items_images',
				$image_types_array);
				
		
			foreach( $showpage_items  as   $showpage_item){
				foreach( $showpage_item  as  $key => $value){
					$showpage_item[$key]=$value;

				}
				$new_showpage_items[] = $showpage_item;
				
			}
				

			if( isset($new_showpage_items)){
				return $new_showpage_items;
			}else{
				return;
			};
			
			
	}
	




		function prepare_array(
			$items_tables_raw,
			$name_of_item_id,
			$image_table,
			$image_types_array){
			

		
					foreach( $items_tables_raw  as  $keyA => $items_table_raw){
		
						foreach( $items_table_raw  as  $field => $value){
							
							$items_table[$field] = $value;
							
							if( $field == 'id' ){
								
								foreach( $image_types_array  as  $name_of_hero_items_image_id => $image_type_id){
									
									
									
									$items_images = $this->CI->my_database_model->select_from_table( 
												$table = $image_table, 
												$select_what = '*', 
												$where_array = array(
																				$name_of_item_id=> $value,
																				'image_type_id' => $image_type_id  
																				), 
												$use_order = FALSE, 
												$order_field = '', 
												$order_direction = 'desc', 
												$limit = -1
												);
												
								
								
								if( count($items_images) > 0){				
									
									$items_table[$name_of_hero_items_image_id] = $items_images[0]->id;
									
									
								}else{
									
									$items_table[$name_of_hero_items_image_id] = 0;
									
								};
								}
			
							};
							
							
		
						};
						
				
						$items_tables[] = $items_table;
						
					};
					
					
					return ( isset( $items_tables) ? $items_tables:array() );
			
		}
	
}


/* End of file Query.php */ 
/* Location: \system\application\libraries\Query.php */
