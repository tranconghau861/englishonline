<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function items()
    {
        $query = $this->db->get('setting');
        $rows = $query->result();
        if ($rows) {
            foreach ($rows as $row) {
                $data[$row->config_key] = $row->config_value;
            }
            return $data;
        }
    }

    public function save($post)
    {
        foreach ($post['setting'] as $key => $val) {
            $this->db->delete('setting', array(
                'config_key' => $key,
            ));
            $this->db->insert('setting', array(
                'config_key'   => $key,
                'config_value' => $val,
            ));
        }
    }

}