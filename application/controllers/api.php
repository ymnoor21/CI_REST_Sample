<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
require(APPPATH.'libraries/REST_Controller.php');

class Api extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    protected function users_get() {
        $data = new StdClass();
        
        $this->response($this->user_model->select_all());
    }

    protected function user_get() {
        $data = new StdClass();

        $this->user_model->setID($this->get('id'));
        $data = $this->user_model->select();

        $this->response($data);
    }
     
    protected function user_post() {  
        $data = new StdClass();

        $data = $this->user_model->insert(array(
                                            'first_name' => $this->post('first_name'),
                                            'last_name' => $this->post('last_name'),
                                            'email' => $this->post('email'),
                                            'pass' => $this->post('pass'),
                                            'type' => $this->post('type'),
                                            'modified_at' => 'NOW()'
                                         ));
        $this->response($data);
    }
 
    protected function user_put() {      
        $data = new StdClass();

        $this->user_model->setID($this->put('id'));
        $data = $this->user_model->update($this->put());

        $this->response($data);
    }
 
    protected function user_delete() {
        $data = new StdClass();

        $this->user_model->setID($this->delete('id'));
        $data = $this->user_model->delete();

        $this->response($data);
    }
}