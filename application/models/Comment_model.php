<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function item($val = '', $key = 'id')
    {
        return $this->db->get_where('comment', array($key => $val))->row();
    }

    public function items($offset = 0, $limit = 50, $s = '')
    {
        if($s){
            $this->db->like('message', $s);
        }
        $this->db->order_by('created', 'DESC');
        return $this->db->get('comment', $limit, $offset)->result();
    }

    public function total($s = '')
    {
        if($s){
            $this->db->like('message', $s);
        }
        return $this->db->count_all('comment');
    }

    public function save($post, $id = 0)
    {
        $data = array(
            'name' => $post['name'],
            'email' => $post['email'],
            'message' => $post['message'],
            'status' => isset($post['status']) ? 1 : 0,
            'oid' => isset($post['oid']) ? $post['oid'] : 0,
            'parent' => isset($post['parent']) ? $post['parent'] : 0,
            'sum_like' => isset($post['sum_like']) ? $post['sum_like'] : 0,
        );
        if($id){
            $this->db->update('comment', $data, array('id' => $id));
        }
        else{
            $data['created'] = date('Y-m-d H:i:s');
            $data['ip'] = $this->input->ip_address();
            $this->db->insert('comment', $data);
            $id = $this->db->insert_id();
        }
        return $id;
    }

    public function delete($val = '', $key = 'id')
    {
        $this->db->delete('comment', array(
            $key => $val,
        ));
    }

    public function dolike($id = 0, $sum_like = 0)
    {
        $data = array(
            'sum_like'   => $sum_like,
        );
        $this->db->update('comment', $data, array('id' => $id));
    }

    public function get_items($oid = 0, $parent = 0, $order_by = 'parent ASC', $offset = 0, $limit = 10)
    {
        $data = array();
        $this->db->order_by($order_by);
        $query = $this->db->get_where('comment', array('status' => 1, 'oid' => $oid, 'parent' => $parent));
        $rows = $query->result();
        if($rows){
            foreach($rows as $row){
                $row->sub = $this->get_items($row->oid, $row->id, 'created ASC', $offset, $limit);
                $data[] = $row;
            }
        }
        return $data;
    }

    public function get_comments($param = array(), $all = 1)
    {
        if(isset($param['oid'])){
            $this->db->where('oid', $param['oid']);
        }
        if(isset($param['order_by'])){
            $this->db->order_by($param['order_by']);
        }
        if(isset($param['limit'])){
            $this->db->limit($param['limit']);
        }
        $query = $this->db->get_where('comment', array());
        return $all ? $query->result() : $query->row();
    }

    public function member_comments($uid = '')
    {
        $this->db->group_by('oid');
        $this->db->order_by('created DESC');
        return $this->db->get_where('comment', array('uid' => $uid))->result();
    }

    public function comment_total($oid = '')
    {
        return $this->db->get_where('comment', array(
            'oid' => $oid,
            'status' => 1,
        ))->num_rows();
    }

}
