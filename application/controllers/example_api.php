<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	require(APPPATH.'libraries/REST_Controller.php');
 
	class Example_api extends REST_Controller {
		function user_get() {
	        $data = new StdClass();

	        $data->name = $this->get('name');
			$data->email = $this->get('email');

	        $this->response($data);
	    }
	     
	    function user_post() {  
	    	$data = new StdClass();

	        $data->name = $this->post('name');
			$data->email = $this->post('email');

	        $this->response($data);
	    }
	 
	    function user_put() {      
	        $data = new StdClass();

	        $data->name = $this->put('name');
			$data->email = $this->put('email');

	        $this->response($data);
	    }
	 
	    function user_delete() {
	    	$data = new StdClass();

	        $data->name = $this->delete('name');
			$data->email = $this->delete('email');

	        $this->response($data);
	    }
	}