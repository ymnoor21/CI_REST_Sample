<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$this->load->library('curl'); 
		$this->curl->create('http://ec2-54-218-59-122.us-west-2.compute.amazonaws.com/index.php/example_api/user');

		// Login to HTTP user authentication
		$this->curl->http_login('admin', '1234');

		$post = array('name'=>'Yamin Noor', 'email'=>'ymnoor21@gmail.com');
		$this->curl->post($post);

		echo $response = $this->curl->execute();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */