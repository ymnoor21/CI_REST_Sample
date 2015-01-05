<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
    private $_id;
    private $_firtName;
    private $_lastName;
    private $_email;
    private $_password;
    private $_type;
    private $_modifiedAt;
    private $_createdAt;
    private $_tableName;

    public function __construct() {
        parent::__construct();
        $this->_tableName = 'tbl_users';
    }
    
    public function select_all() {
        $query = $this->db->get($this->_tableName);
        return $query->result();
    }

    public function select() {
        $this->db->select('id, first_name, last_name, email, type, modified_at, created_at');
        $query = $this->db->get_where($this->_tableName, array('id' => $this->getID()));
        return $query->result();
    }

    public function update($data) {
        $this->db->where('id', $this->getID());
        return $this->db->update($this->_tableName, $data);
    }

    public function insert($data) {
        $flag = $this->db->insert($this->_tableName, $data); 

        if($flag) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

    public function delete() {
        $this->db->where('id', $this->getID());
        return $this->db->delete($this->_tableName); 
    }

    public function getID() {
        return $this->_id;
    }

    public function setID($id) {
        $this->_id = $id;
    }
}