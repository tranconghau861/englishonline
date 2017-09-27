<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function check_exist($id = 0, $key = '', $val = '')
    {
        return $this->db->get_where('users', array($key => $val, 'id !=' => $id))->num_rows();
    }

    public function login($post)
    {
        return $this->db->get_where('users', array(
            'username' => $post['username'],
            'password' => do_hash($post['password'], 'md5'),
            'status' => 1
        ))->row();
    }

    public function forgot($post)
    {
        return $this->db->get_where('users', array(
            'email' => $post['email'],
            'status' => 1
        ))->row();
    }

    public function item($val = '', $key = 'id')
    {
//        return $this->db->get_where('users', array($key => $val))->row();
        return $this->db->where($key, $val)->get('users')->row();
    }

    public function items($offset = 0, $limit = 50, $s = '')
    {
        if ($s) {
            $this->db->where("name LIKE '%{$s}%' OR username LIKE '%{$s}%' OR email LIKE '%{$s}%'");
        }
        return $this->db->get('users', $limit, $offset)->result();
    }

    public function total($s = '')
    {
        if ($s) {
            $this->db->where("name LIKE '%{$s}%' OR username LIKE '%{$s}%' OR email LIKE '%{$s}%'");
        }
        return $this->db->count_all('users');
    }

    public function save($post, $id = 0)
    {
        $data = array(
            'name' => isset($post['name']) ? $post['name'] : '',
            'username' => $post['username'],
            'email' => $post['email'],
            'status' => isset($post['status']) ? 1 : 0,
            'gid' => isset($post['gid']) ? $post['gid'] : 1,
            'firstname' => isset($post['firstname']) ? $post['firstname'] : '',
            'lastname' => isset($post['lastname']) ? $post['lastname'] : '',
        );
        if ($id) {
            if ($post['password']) {
                $data['password'] = do_hash($post['password'], 'md5');
            }
            $this->db->update('users', $data, array('id' => $id));
        } else {
            $data['ip'] = $this->input->ip_address();
            $data['password'] = do_hash($post['password'], 'md5');
            $this->db->insert('users', $data);
            $id = $this->db->insert_id();
        }
        return $id;
    }

    public function delete($val = '', $key = 'id')
    {
        $this->db->delete('users', array(
            $key => $val,
        ));
    }

    public function profile($post, $id = 0)
    {
        $data = array(
            'name' => isset($post['name']) ? $post['name'] : '',
            'username' => $post['username'],
            'email' => $post['email'],
            'firstname' => isset($post['firstname']) ? $post['firstname'] : '',
            'lastname' => isset($post['lastname']) ? $post['lastname'] : '',
        );
        if ($post['password']) {
            $data['password'] = do_hash($post['password'], 'md5');
        }
        $this->db->update('users', $data, array('id' => $id));
    }

    public function update($key, $val, $id)
    {
        $data = array(
            $key => $val,
        );
        $this->db->update('users', $data, array('id' => $id));
    }

}