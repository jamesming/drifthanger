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
class Custom {

private $CI;			// CodeIgniter instance


function custom(){
	
	$this->CI =& get_instance();	
	

	
}


function prepare_destination_items( $segment4, $get_array){
	
			
				switch ( $segment4 ) {
		
			    case 'items':
		
						$destination_items = $this->CI->query->get_destination_items();	
												
						$data['destination_items'] = $destination_items;
					
			    break;

				};
				
				$data['segment4'] = $segment4;
				$data['segment3'] = 'destination';
				
				return $data;
	
}
	

function prepare_showpage_items( $segment4, $get_array){
	
		
				$showpage_items = $this->CI->query->get_showpage_items();	
										
				$data['showpage_items'] = $showpage_items;
					

				
				$data['segment4'] = $segment4;
				$data['segment3'] = 'showpage';
				
				return $data;
	
}





	
	
	public function login_process(  $post_array ){
		
		$table = 'users';
		
		if( $post_array['email'] == ''){
			return array(
				'is'=>'false',
				'key'=>'email',
				'message'=>'Email field must not be blank.'
			);
		};

		if( $post_array['password'] == ''){
			return array(
				'is'=>'false',
				'key'=>'password',
				'message'=>'Password field must not be blank.'
			);
		};
		
	  if( !$this->CI->my_database_model->check_if_exist(
	  	$where_array = array('email' => $post_array['email']), 
	  	$table
	  )){
	   	
			return array(
				'is'=>'false',
				'key'=>'email',
				'message'=>'Account is not found in system.'
			);

	  }


		$where_array = array(
			'email' => $post_array['email'],
			'password' => md5($post_array['password'])
		);
		
		$users = $this->CI->my_database_model->select_from_table( 
			$table, 
			$select_what =  'id', 
			$where_array, 
			$use_order = FALSE, 
			$order_field = '', 
			$order_direction = 'desc', 
			$limit = 1
			);

	  if( count( $users ) > 0 ){
		
					return array(
						'is'=>'true',
						'id'=>$users[0]->id
					);	
		
		}else{
		
			return array(
				'is'=>'false',
				'key'=>'password',
				'message'=>'Wrong password submitted.'
			);		
		
		};
						
	}
		




	
	
}


/* End of file Query.php */ 
/* Location: \system\application\libraries\Custom.php */
