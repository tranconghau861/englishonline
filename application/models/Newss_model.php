<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newss_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function check_alias($id = 0, $alias = '')
    {
        return $this->db->get_where('news', array('alias' => $alias, 'id !=' => $id))->num_rows();
    }

    public function item($val = '', $key = 'id')
    {
        return $this->db->get_where('news', array($key => $val))->row();
    }

    public function items($extension = '', $offset = 0, $limit = 50, $s = '', $cid = '' /*$date_from = '', $date_to = ''*/)
    {
        if($s){
            $this->db->where("title LIKE '%{$s}%'");
        }
//        if((int) $date_from){
//            $this->db->where('( date_from = "0000-00-00" OR date_from <= "'. $date_from .'" )');
//        }
//        if((int) $date_to){
//            $this->db->where('( date_to = "0000-00-00" OR date_to >= "'. $date_to .'" )');
//        }
        if($cid){
            $this->db->where('parent', $cid);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('news', array('extension' => $extension), $limit, $offset)->result();
    }

    public function total($extension = '', $s = '', $cid = ''/* $date_from = '', $date_to = ''*/)
    {
        if($s){
            $this->db->where("title LIKE '%{$s}%'");
        }
//        if((int) $date_from){
//            $this->db->where('( date_from = "0000-00-00" OR date_from <= "'. $date_from .'" )');
//        }
//        if((int) $date_to){
//            $this->db->where('( date_to = "0000-00-00" OR date_to >= "'. $date_to .'" )');
//        }
        if($cid){
            $this->db->where('parent', $cid);
        }
        return $this->db->get_where('news', array('extension' => $extension))->num_rows();
    }

    public function save($extension = '', $post, $id = 0)
    {
        $admin = $this->session->admin;
//        if(isset($post['date_from'])  &&  (int) $post['date_from']){
//            $date_from_exp = explode('/', $post['date_from']);
//            $date_from = $date_from_exp[2] .'-'. $date_from_exp[1] .'-'. $date_from_exp[0];
//        }
//        if(isset($post['date_to'])  &&  (int) $post['date_to']){
//            $date_to_exp = explode('/', $post['date_to']);
//            $date_to = $date_to_exp[2] .'-'. $date_to_exp[1] .'-'. $date_to_exp[0];
//        }
        $data = array(
            'title'             => $post['title'],
            'alias'             => isset($post['alias']) ? $post['alias'] : '',
            'intro'             => isset($post['intro']) ? $post['intro'] : '',
            'content'           => isset($post['content']) ? $post['content'] : '',
            'photo'             => isset($post['photo']) ? $post['photo'] : '',
            'status'            => isset($post['status']) ? $post['status'] : 0,
            'extension'         => $extension,
            'link'              => isset($post['link']) ? $post['link'] : '',
//            'position'          => isset($post['position']) ? $post['position'] : '',
            'parent'            => isset($post['parent']) ? $post['parent'] : 0,
            'gallery'           => isset($post['gallery']) ? serialize($post['gallery']) : '',
            'fields'            => isset($post['fields']) ? serialize($post['fields']) : '',
            'ordering'          => isset($post['ordering']) ? $post['ordering'] : 0,
            'tag'               => isset($post['tag']) ? $post['tag'] : '',
            'keywords'          => isset($post['keywords']) ? $post['keywords'] : '',
            'description'       => isset($post['description']) ? $post['description'] : '',
//            'type'              => isset($post['type']) ? $post['type'] : '',
//            'date_from'         => isset($date_from) ? $date_from : '',
//            'date_to'           => isset($date_to) ? $date_to : '',
//            'number_episode'    => isset($post['number_episode']) ? $post['number_episode'] : 0,
//            'hot'               => isset($post['hot']) ? $post['hot'] : 0,
//            'featured'          => isset($post['featured']) ? $post['featured'] : 0,
//            'home'              => isset($post['home']) ? $post['home'] : 0,
//            'special'           => isset($post['special']) ? $post['special'] : 0,
        );
        if($id){
//            $data['modified'] = date('Y-m-d H:i:s');
            $this->db->update('news', $data, array('id' => $id));
        }
        else{
//            $data['created'] = date('Y-m-d H:i:s');
            $data['uid'] = isset($post['uid']) ? $post['uid'] : $admin['id'];
            $this->db->insert('news', $data);
            $id = $this->db->insert_id();
        }
        $exist = $this->check_alias($id, @$post['alias']);
        if(empty($post['alias'])  ||  $exist){
            $alias = url_title(convert_accented_characters($post['title']), 'dash', true);
            $this->db->update('news', array('alias' => $alias .'-'. $id), array('id' => $id));
        }
        return $id;
    }

    public function delete($val = '', $key = 'id')
    {
        $this->db->delete('news', array(
            $key => $val,
        ));
    }

    public function parent($extension = '', $id = 0, $alt = '')
    {
        $data = array();
        $this->db->order_by('parent ASC, title ASC');
        $query = $this->db->get_where('news', array('extension' => $extension, 'parent' => $id));

        $a = $this->db->last_query($query);
//        print_r($a) . "<br>";
        $rows = $query->result();
        if($rows){
            foreach($rows as $row){
                $row->alt = $alt . $row->title;
                $data[] = $row;
                $parent = $this->parent($extension, $row->id, '&mdash; '. $alt);
                $data = array_merge($data, $parent);
            }
        }

//        print_r($data);
        return $data;

    }

    public function parents($extension = '')
    {
        $this->db->order_by('title ASC');
        return $this->db->get_where('news', array('extension' => $extension))->result();
    }

    public function news_category($extension = '', $id = 0)
    {
        $this->db->order_by('id DESC');
        return $this->db->get_where('news', array('extension' => $extension, 'parent' => $id))->result();
    }

    public function get_news_category($extension = '', $alias = '')
    {
        return $this->db->get_where('news', array('extension' => $extension, 'alias' => $alias))->row();
    }

    public function copy($extension = '', $id = 0)
    {
        $this->db->order_by('id DESC');
        $row = $this->db->get('news')->row();
        $autoid = $row->id + 1;
        $this->db->query("CREATE TEMPORARY TABLE tmp SELECT * FROM #__news WHERE id = ". $id .";");
        $this->db->query("UPDATE tmp SET id = ". $autoid ." WHERE id = ". $id .";");
        $this->db->query("INSERT INTO #__news SELECT tmp.* FROM tmp WHERE id = ". $autoid .";");
        $row = $this->item($autoid, 'id');
        $params['alias'] = $row->alias .'-'. $autoid;
        $this->db->update('node', $params, array('id' => $autoid));
    }

//    public function language($extension = '', $post, $id = 0)
//    {
//        $data = array(
//            'title_en'   => $post['title_en'],
//            'intro_en'   => isset($post['intro_en']) ? $post['intro_en'] : '',
//            'content_en' => isset($post['content_en']) ? $post['content_en'] : '',
//        );
//        $this->db->update('node', $data, array('id' => $id));
//    }

    public function set_view($id = 0, $view = 0)
    {
        $data = array(
            'sum_view'   => $view,
        );
        $this->db->update('news', $data, array('id' => $id));
    }

//    public function set_like($id = 0, $sum_like = 0)
//    {
//        $data = array(
//            'sum_like'   => $sum_like,
//        );
//        $this->db->update('news', $data, array('id' => $id));
//    }

    private function _get_posts($param = array())
    {
        if(is_array($param['extension'])){
            $this->slave->where_in('extension', $param['extension']);
        }
        else{
            $this->slave->where('extension', $param['extension']);
        }
        if(isset($param['where'])){
            $this->slave->where($param['where']);
        }
        if(isset($param['id'])){
            if(is_array($param['id'])){
                $this->slave->where_in('id', $param['id']);
            }
            else{
                $this->slave->where('id', $param['id']);
            }
        }
        if(isset($param['not_id'])){
            $this->slave->where_not_in('id', $param['not_id']);
        }
        if (isset($param['id_id'])) {
            $this->slave->where('id <', $param['id_id']);
        }

        if(isset($param['intro'])){
            $this->slave->where('intro !=', '');
        }
        if(isset($param['alias'])){
            $this->slave->where('alias', $param['alias']);
        }
        if(isset($param['status'])){
            $this->slave->where('status', $param['status']);
        }
        if(isset($param['parent'])){
            if(is_array($param['parent'])){
                $this->slave->where_in('parent', $param['parent']);
            }
            else{
                $this->slave->where('parent', $param['parent']);
            }
        }
//        if(isset($param['menu'])){
//            $this->slave->where('menu', $param['menu']);
//        }
//        if(isset($param['hot'])){
//            $this->slave->where('hot', $param['hot']);
//        }
//        if(isset($param['home'])){
//            $this->slave->where('home', $param['home']);
//        }
//        if(isset($param['featured'])){
//            $this->slave->where('featured', $param['featured']);
//        }
//        if(isset($param['special'])){
//            $this->slave->where('special', $param['special']);
//        }
//        if(isset($param['type'])){
//            $this->slave->where('type', $param['type']);
//        }
//        if(isset($param['position'])){
//            $this->slave->where('position', $param['position']);
//        }
        if(isset($param['tag'])){
            $this->slave->like('tag', $param['tag']);
        }
        if(isset($param['order_by'])){
            $this->slave->order_by($param['order_by']);
        }
//        if(isset($param['id_random'])){
//            $this->slave->order_by($param['id_random'], 'RANDOM');
//        }
        if(isset($param['limit'])){
            if(is_array($param['limit'])){
                $this->slave->limit($param['limit'][0], $param['limit'][1]);
            }
            else{
                $this->slave->limit($param['limit']);
            }
        }
        $query = $this->slave->get('news');
        if($param['query'] == 'array'){
            $data = $query->result_array();
        }
        elseif($param['query'] == 'result'){
            $data = $query->result();
        }
        elseif($param['query'] == 'total'){
            $data = $query->num_rows();
        }
        else{
            $data = $query->row();
        }
        return $data;
    }

    public function get_posts($param = array(), $key = '')
    {
        $timeout = 24 * 60 * 60;
        $key = 'cache.'. $key;
        $rows = $this->mp_cache->get($key);
        if ( empty($rows) )
        {
            $rows = $this->_get_posts($param);
            $this->mp_cache->write($rows, $key, $timeout);
        }
        else{
            $rows = $this->_get_posts($param);
        }
        return $rows;
    }

    public function status($extension = '', $id = 0, $status = '')
    {
        $admin = $this->session->admin;
        $data = array(
            'status'            => $status,
            'published_by'      => $admin['id'],
        );
        $this->db->update('news', $data, array('extension' => $extension, 'id' => $id));
    }

    public function update($id = '', $key = '', $val = '')
    {
        $data = array(
            $key     => $val,
        );
        $this->db->update('news', $data, array('id' => $id));
    }

}
