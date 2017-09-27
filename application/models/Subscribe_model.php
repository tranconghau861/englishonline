<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function item($val = '', $key = 'id')
    {
        return $this->db->get_where('subscribe', array($key => $val))->row();
    }

    public function items($offset = 0, $limit = 50, $s = '')
    {
        if ($s) {
            $this->db->where("name LIKE '%{$s}%' OR email LIKE '%{$s}%'");
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get('subscribe', $limit, $offset)->result();
    }

    public function total($s = '')
    {
        if ($s) {
            $this->db->where("name LIKE '%{$s}%' OR email LIKE '%{$s}%'");
        }
        return $this->db->count_all('subscribe');
    }

    public function save($post, $id = 0)
    {
        $data = array(
            'name'  => isset($post['name']) ? $post['name'] : '',
            'email' => $post['email'],
        );
        if ($id) {
            $this->db->update('subscribe', $data, array('id' => $id));
        } else {
            $data['ip'] = $this->input->ip_address();
            $this->db->insert('subscribe', $data);
            $id = $this->db->insert_id();
        }
        return $id;
    }

    public function delete($val = '', $key = 'id')
    {
        $this->db->delete('subscribe', array(
            $key => $val,
        ));
    }

    public function export()
    {
        $this->db->order_by('email', 'ASC');
        return $this->db->get('subscribe')->result();
    }

}