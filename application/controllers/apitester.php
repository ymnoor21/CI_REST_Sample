<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apitester extends CI_Controller {
	private $_apiBaseURL = "";
    public $_apitesterBaseURL = "";

    private $_api_user = 'admin';
    private $_api_pass = '1234';

	public function __construct() {
		parent::__construct();

		$this->load->helper('url'); 
		$this->load->library('curl'); 

		$this->_apiBaseURL        = "http://ec2-54-218-59-122.us-west-2.compute.amazonaws.com/api/";
        $this->_apitesterBaseURL  = "http://ec2-54-218-59-122.us-west-2.compute.amazonaws.com/apitester/";
	}

	public function index() {
		$this->listall();
	}

	public function add($info = null) {
		if(is_array($info) && isset($info)) {
			$data['message'] = $info['message'];
			$data['error']   = $info['error'];
			$data['user']	 = $info['user'];
		}

        $data['title']      = 'Add User';
        $data['user_types'] = $this->db->enum_select('tbl_users', 'type');

		$data['header']  = $this->load->view('header', $data, true);
		$data['content'] = $this->load->view('add', $data, true);
		$data['footer']  = $this->load->view('footer', $data, true);

		$this->load->view('master', $data);
	}

	public function edit($info = null) {
		$this->curl->http_login($this->_api_user, $this->_api_pass);
		$segments = $this->uri->uri_to_assoc(3);
		
		if(is_array($info) && isset($info)) {
			$id  = $info['id'];
			$data['message'] = $info['message'];
			$data['error']	 = $info['error'];
		} elseif ($segments != "") {
			$id = $segments['id'];
		}

		$this->curl->create($this->_apiBaseURL . 'user' . '/id/' . $id);

        $data['title']      = 'Edit User';
		$data['user']       = json_decode($this->curl->execute());
        $data['user_types'] = $this->db->enum_select('tbl_users', 'type');

		$data['header']  = $this->load->view('header', $data, true);
		$data['content'] = $this->load->view('edit', $data, true);
		$data['footer']  = $this->load->view('footer', $data, true);

		$this->load->view('master', $data);
	}
	
	public function listall() {
		$this->curl->http_login($this->_api_user, $this->_api_pass);
		$this->curl->create($this->_apiBaseURL . 'users');

		$data['title'] = 'List';
		$data['list'] = json_decode($this->curl->execute());
		
		$data['header']  = $this->load->view('header', $data, true);
		$data['content'] = $this->load->view('list', $data, true);
		$data['footer']  = $this->load->view('footer', $data, true);

		$this->load->view('master', $data);
	}

	public function insert() {
		$this->curl->http_login($this->_api_user, $this->_api_pass);
		$this->curl->create($this->_apiBaseURL . 'user');

		$password           = $this->input->post('pass');
        $confirm_pass       = $this->input->post('confirm_pass');

        if($password != "" && $confirm_pass != "" && $password == $confirm_pass) {
			$post = array('first_name'   => $this->input->post('first_name'), 
	                      'last_name'    => $this->input->post('last_name'),
	                      'pass'		 => md5($this->input->post('pass')),
	                      'email'        => $this->input->post('email'),
	                      'type'         => $this->input->post('type'),
	                      'modified_at'  => 'NOW()'
	                    );

			$this->curl->post($post);
			$response = json_decode($this->curl->execute());
			
			if($response) {
				$info['id'] = $response;
				$info['error'] = false;
				$info['message'] = "User added successfully.";
				$this->edit($info);
			} else {
				$user = new StdClass();
				$user->first_name = $this->input->post('first_name');
				$user->last_name = $this->input->post('last_name');
				$user->email = $this->input->post('email');
				$user->type = $this->input->post('type');

				$info['user'][]  = $user;
				$info['error'] 	 = true;
				$info['message'] = "Sorry, user information cannot be saved.";
				$this->add($info);
			}
		} else {
			$user = new StdClass();
			$user->first_name = $this->input->post('first_name');
			$user->last_name = $this->input->post('last_name');
			$user->email = $this->input->post('email');
			$user->type = $this->input->post('type');

			$info['user'][]  = $user;
			$info['error'] 	 = true;
			$info['message'] = "Password mismatch";
			$this->add($info);
		}
	}

	public function update() {
		$this->curl->http_login($this->_api_user, $this->_api_pass);
		$this->curl->create($this->_apiBaseURL . 'user');

        $password           = $this->input->post('pass');
        $confirm_pass       = $this->input->post('confirm_pass');

        $put['id']          = $this->input->post('id');
        $put['first_name']  = $this->input->post('first_name');
        $put['last_name']   = $this->input->post('last_name');
        $put['email']       = $this->input->post('email');
        $put['type']        = $this->input->post('type');
        $put['modified_at'] = 'NOW()';

        if(($password != "" && $confirm_pass != "") && ($password == $confirm_pass)) {
            $put['pass'] =  md5($password);
            $error = false;
            $message = "";
        } elseif (($password != "" || $confirm_pass != "") && ($password != $confirm_pass)) {
        	$error = true;
        	$message = "Password mismatch.";
        } else {
        	$error = false;
        	$message = "";
        }

        if(!$error) {
			$this->curl->put($put);

			$response = json_decode($this->curl->execute());

	        if($response) {
	        	$this->edit(array(
	        					  'id' => $put['id'], 
	        					  'message' => 'User updated successfully.', 
	        					  'error' => false
	        					 ));
	        } else {
	            $this->edit(array(
	        					  'id' => $put['id'], 
	        					  'message' => 'Sorry, not updated.', 
	        					  'error' => true
	        					 ));
	        }
	    } else {
	    	$this->edit(array(
        					  'id' => $put['id'], 
        					  'message' => $message, 
        					  'error' => $error
	        				 ));
	    }
	}

	public function delete() {
		$this->curl->http_login($this->_api_user, $this->_api_pass);
		$this->curl->create($this->_apiBaseURL . 'user');

		$segments = $this->uri->uri_to_assoc(3);

		$delete = array('id' => $segments['id']);
		$this->curl->delete($delete);

		$response = json_decode($this->curl->execute());
		header("Location: " . $this->_apitesterBaseURL);
		exit;
	}
}