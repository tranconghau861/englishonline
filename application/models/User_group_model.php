<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_group_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function item($val = '', $key = 'id')
    {
        return $this->db->get_where('user_group', array($key => $val))->row();
    }

    public function items($offset = 0, $limit = 50, $s = '')
    {
        if ($s) {
            $this->db->where("name LIKE '%{$s}%'");
        }
        return $this->db->get('user_group', $limit, $offset)->result();
    }

    public function total($s = '')
    {
        if ($s) {
            $this->db->where("name LIKE '%{$s}%'");
        }
        return $this->db->count_all('user_group');
    }

    public function save($post, $id = 0)
    {
        $data = array(
            'name'   => $post['name'],
            'status' => isset($post['status']) ? 1 : 0,
            'params' => isset($post['params']) ? serialize($post['params']) : '',
        );
        if ($id) {
            $this->db->update('user_group', $data, array('id' => $id));
        } else {
            $this->db->insert('user_group', $data);
            $id = $this->db->insert_id();
        }
        return $id;
    }

    public function delete($val = '', $key = 'id')
    {
        $this->db->delete('user_group', array(
            $key => $val,
        ));
    }

    public function all()
    {
        return $this->db->get_where('user_group', array('status' => 1))->result();
    }

}