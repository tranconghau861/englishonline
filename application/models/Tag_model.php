<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function check_alias($id = 0, $alias = '')
    {
        return $this->db->get_where('tag', array('alias' => $alias, 'id !=' => $id))->num_rows();
    }

    public function item($val = '', $key = 'id')
    {
        return $this->db->get_where('tag', array($key => $val))->row();
    }

    public function items($offset = 0, $limit = 50, $s = '', $cid = '')
    {
        if($s){
            $this->db->where("title LIKE '%{$s}%'");
        }
        if($cid){
            $this->db->where('parent', $cid);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get('tag', $limit, $offset)->result();
    }

    public function total($s = '', $cid = '')
    {
        if($s){
            $this->db->where("title LIKE '%{$s}%'");
        }

        return $this->db->get('tag')->num_rows();
    }

    public function save($post, $id = 0)
    {
        $admin = $this->session->admin;
        $data = array(
            'title'             => $post['title'],
            'alias'             => isset($post['alias']) ? $post['alias'] : '',
            'status'            => isset($post['status']) ? $post['status'] : 0,
        );
        if($id){
            $this->db->update('tag', $data, array('id' => $id));
        }
        else{
            $data['uid'] = isset($post['uid']) ? $post['uid'] : $admin['id'];
            $this->db->insert('tag', $data);
            $id = $this->db->insert_id();
        }
        $exist = $this->check_alias($id, @$post['alias']);
        if(empty($post['alias'])  ||  $exist){
            $alias = url_title(convert_accented_characters($post['title']), 'dash', true);
            $this->db->update('tag', array('alias' => $alias .'-'. $id), array('id' => $id));
        }

        return $id;
    }

    public function delete($val = '', $key = 'id')
    {
        $this->db->delete('tag', array(
            $key => $val,
        ));
    }

    public function copy($id = 0)
    {
        $this->db->order_by('id DESC');
        $row = $this->db->get('tag')->row();
        $autoid = $row->id + 1;
        $this->db->query("CREATE TEMPORARY TABLE tmp SELECT * FROM #__tag WHERE id = ". $id .";");
        $this->db->query("UPDATE tmp SET id = ". $autoid ." WHERE id = ". $id .";");
        $this->db->query("INSERT INTO #__tag SELECT tmp.* FROM tmp WHERE id = ". $autoid .";");
        $row = $this->item($autoid, 'id');
        $params['alias'] = $row->alias .'-'. $autoid;
        $this->db->update('tag', $params, array('id' => $autoid));
    }

    public function update($id = '', $key = '', $val = '')
    {
        $data = array(
            $key     => $val,
        );
        $this->db->update('tag', $data, array('id' => $id));
    }

}
