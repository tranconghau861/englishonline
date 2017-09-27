<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Live_radio_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function check_alias($id = 0, $alias = '')
    {
        return $this->db->get_where('live_radio', array('alias' => $alias, 'id !=' => $id))->num_rows();
    }

    public function item($val = '', $key = 'id')
    {
        return $this->db->get_where('live_radio', array($key => $val))->row();
    }

    public function items($extension, $offset = 0, $limit = 50, $s = '', $cid = '')
    {
        if($s){
            $this->db->where("name LIKE '%{$s}%'");
        }
        if($cid){
            $this->db->where('media_category_id', $cid);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('live_radio', array('extension' => $extension), $limit, $offset)->result();
    }

    public function get_livetv_video($extension = '',  $key = '', $offset, $id_detail = 0, $cate_id =0)
    {
        /*
        if ($this->cache->memcached->is_supported() && $key)
        {
            $timeout = 15 * 60;
            $key = 'cache.'. $key . '_' .$offset . '_' . $id_detail . '_'.$cate;
            $rows = $this->cache->memcached->get($key);
            if ( empty($rows) )
            {
                $rows = $this->_get_livetv_video($extension, $offset, $id_detail, $cate_id);
                $this->cache->memcached->save($key, $rows, $timeout);
            }
            return $rows;
        }
        else {
            return $this->_get_livetv_video($extension, $offset, $id_detail, $cate_id);
        }
        */
        return $this->_get_livetv_video($extension, $offset, $id_detail, $cate_id);
    }

    public function _get_livetv_video($extension, $offset, $id_detail, $cate_id)
    {
        $limit = 18;
        $offset = ($offset - 1) * $limit;
        $this->slave->order_by('id', 'DESC');  
        $this->slave->where('publish', 1);
        if($cate_id > 0){
            $this->slave->where('parent', $cate_id);
        } 
        if($id_detail > 0){
            $this->slave->where('id !=', $id_detail);
        }
        $rows = $this->slave->get_where('live_radio', array('extension' => $extension), $limit, $offset)->result();     
        $total = $this->total_video_radio($extension, $id_detail, $cate_id);
        $page_number = ceil($total / $limit);               
        return array(
            'offset' =>$offset,
            "total" => $total, 
            "rows" => $rows, 
            'number_page' => $page_number
        );  
    }

    public function total_video_radio($extension, $id_detail = '', $cate_id)
    {
        if($cate_id > 0){
            $this->slave->where('parent', $cate_id);
        }
        if($id_detail){
            $this->slave->where('id !=', $id_detail);
        }
        return $this->db->get_where('live_radio', array('extension' => $extension))->num_rows();
    }
    
    public function _get_livetv_video_where($extension, $offset, $where)
    {
        $limit = 18;
        $offset = ($offset - 1) * $limit;
        $this->slave->order_by('id', 'DESC');
        $this->slave->where('publish', 1);
        if(isset($where)){
            $this->slave->where($where);
        }
        $rows = $this->slave->get_where('live_radio', array('extension' => $extension), $limit, $offset)->result();
        $total = $this->total_video_radio($extension, $id_detail);
        $page_number = ceil($total / $limit);
        return array(
            'offset' =>$offset,
            "total" => $total, 
            "rows" => $rows, 
            'number_page' => $page_number
        );
    }

    public function get_livetv_video_search($extension = '',  $key = '', $offset, $where = array())
    {
        /*
        if ($this->cache->memcached->is_supported() && $key)
        {
            $timeout = 15 * 60;
            $key = 'cache.'. $key . '_' .$offset . '_' . $id_detail;
            $rows = $this->cache->memcached->get($key);
            if ( empty($rows) )
            {
                $rows = $this->_get_livetv_video_where($extension, $offset, $where);
                $this->cache->memcached->save($key, $rows, $timeout);
            }
            return $rows;
        }
        else {
            return $this->_get_livetv_video_where($extension, $offset, $where);
        }
        */
        return $this->_get_livetv_video_where($extension, $offset, $where);
    }

    public function total($extension, $s = '', $cid = '')
    {
        if($s){
            $this->db->where("name LIKE '%{$s}%'");
        }
        if($cid){
            $this->db->where('media_category_id', $cid);
        }
        return $this->db->get_where('live_radio', array('extension' => $extension))->num_rows();
    }

    public function save($extension = '', $post, $id = 0)
    {
        $admin = $this->session->admin;
        $data = array(
            'name'          => isset($post['name']) ? $post['name'] : '',
            'alias'             => isset($post['alias']) ? $post['alias'] : '',
            'intro'             => isset($post['intro']) ? $post['intro'] : '',
            'photo'             => isset($post['photo']) ? $post['photo'] : '', 
            'parent'            => isset($post['parent']) ? $post['parent'] : 0,
            'link_livevideo'            => isset($post['link_livevideo']) ? $post['link_livevideo'] : '',
            'video_time'            => isset($post['video_time']) ? $post['video_time'] : '',
            'sort_order'                => isset($post['sort_order']) ? $post['sort_order'] : '',
            'is_hot'            => isset($post['is_hot']) ? 1 : 0,
            'schedule_date'             => isset($post['schedule_date']) ? date('Y-m-d', strtotime($post['schedule_date'])) : '',
            'publish'           => isset($post['publish']) ? 1 : 0, 
            'extension'             => isset($extension) ? $extension : '',
        );
        if($id){
            $this->db->update('live_radio', $data, array('id' => $id));
        }
        else{
            $data['date'] = date('Y-m-d');
            $this->db->insert('live_radio', $data);
            $id = $this->db->insert_id();
        }
        // alias
        $exist = $this->check_alias($id, @$post['alias']);
        if(empty($post['alias'])  ||  $exist){
            $alias = url_title(convert_accented_characters($post['name']), 'dash', true);
            $this->db->update('live_radio', array('alias' => $alias .'-'. $id), array('id' => $id));
        }
        return $id;
    }

    public function delete($val = '', $key = 'id')
    {
        $this->db->delete('live_radio', array(
            $key => $val,
        ));
    }

    public function parent($extension = '', $id = 0, $alt = '')
    {
        $data = array();
        $this->db->order_by('parent ASC, title ASC');
        $query = $this->db->get_where('live_radio', array('extension' => $extension, 'parent' => $id));
        $rows = $query->result();
        if($rows){
            foreach($rows as $row){
                $row->alt = $alt . $row->title;
                $data[] = $row;
                $parent = $this->parent($extension, $row->id, '&mdash; '. $alt);
                $data = array_merge($data, $parent);
            }
        }
        return $data;
    }

    public function copy($extension = '', $id = 0)
    {
        $this->db->order_by('id DESC');
        $row = $this->db->get('live_radio')->row();
        $autoid = $row->id + 1;
        $this->db->query("CREATE TEMPORARY TABLE tmp SELECT * FROM #__live_radio WHERE id = ". $id .";");
        $this->db->query("UPDATE tmp SET id = ". $autoid ." WHERE id = ". $id .";");
        $this->db->query("INSERT INTO #__live_radio SELECT tmp.* FROM tmp WHERE id = ". $autoid .";");
        $row = $this->item($autoid, 'id');
        $params['alias'] = $row->alias .'-'. $autoid;
        $this->db->update('live_radio', $params, array('id' => $autoid));
    }

    public function language($extension = '', $post, $id = 0)
    {
        $data = array(
            'name_en'    => $post['name_en'],
            'intro_en'   => isset($post['intro_en']) ? $post['intro_en'] : '',
        );
        $this->db->update('live_radio', $data, array('id' => $id));
    }

    public function set_view($id = 0, $view = 0)
    {
        $data = array(
            'sum_view'   => $view,
        );
        $this->db->update('live_radio', $data, array('id' => $id));
    }

    public function set_like($id = 0, $sum_like = 0)
    {
        $data = array(
            'sum_like'   => $sum_like,
        );
        $this->db->update('live_radio', $data, array('id' => $id));
    }

    public function getLiveTVSchedule($id_livetv, $data = null) 
    {
        $date = ($data == null) ? date('Y-m-d') : $data;
        $sql = "SELECT l.id, ls.content FROM ci_livetv as l LEFT JOIN ci_livetv_schedule as ls ON(l.id=ls.livetv_id) 
        WHERE l.publish = '1' AND ls.publish AND ls.schedule_date='".$date."' AND ls.livetv_id='".$id_livetv."' LIMIT 1";           
        return $this->slave->query($sql)->row();
    }

    public function _get_liveradio_schedule($extension, $param = array()) 
    {
        $date = (empty($param['schedule_date'])) ? date('Y-m-d') : $param['schedule_date'];
        $this->db->where('schedule_date', $date);
        return $this->db->get_where('live_radio_schedule', array('extension' => $extension))->row();
    }

    public function get_liveradio_schedule($extension = '',$param = array(), $key = '')
    {
        /*
        if ($this->cache->memcached->is_supported() && $key)
        {
            $timeout = 15 * 60;
            $key = 'cache.'. $key;
            $rows = $this->cache->memcached->get($key);
            if ( empty($rows) )
            {
                $rows = $this->_get_liveradio_schedule($extension, $param);
                $this->cache->memcached->save($key, $rows, $timeout);
            }
            return $rows;
        }
        else {
            return $this->_get_liveradio_schedule($extension, $param);
        }
        */
        return $this->_get_liveradio_schedule($extension, $param);
    }

    public function _get_posts($extension = '', $param = array(), $all = 1)
    {
        if(isset($param['id'])){
            $this->slave->where('id ', $param['id']);
        }
        if(isset($param['id_auto'])){
            $this->slave->where('id !=', $param['id_auto']);
        }
        if(isset($param['alias'])){
            $this->slave->where('alias', $param['alias']);
        }
        if(isset($param['where'])){
            $this->slave->where($param['where']);
        }
        if(isset($param['publish'])){
            $this->slave->where('publish', $param['publish']);
        }
        if(isset($param['parent'])){
            $this->slave->where('parent', $param['parent']);
        }
        if(isset($param['sort_order'])){
            $this->slave->order_by($param['sort_order']);
        }
        if(isset($param['limit'])){
            $this->slave->limit($param['limit']);
        }
        if(isset($param['schedule_date'])){
            $this->slave->where('schedule_date', $param['schedule_date']);
        }
        if(isset($param['video_time'])){
            $this->slave->where('video_time', $param['video_time']);
        }
        if(isset($param['date'])){
            $this->slave->where('date', $param['date']); 
        }
        if(isset($extension)){
            $this->slave->where('extension', $extension);
        }
        $query = $this->slave->get_where('live_radio'); 
        return ($all==1) ? $query->result() : $query->row();
    }

    public function get_posts($extension = '', $param = array(), $all = 1, $key = '')
    {
        /*
        if ($this->cache->memcached->is_supported() && $key)
        {
            $timeout = 15 * 60;
            $key = 'cache.'. $key;
            $rows = $this->cache->memcached->get($key);
            if ( empty($rows) )
            {
                $rows = $this->_get_posts($extension, $param, $all);
                $this->cache->memcached->save($key, $rows, $timeout);
            }
            return $rows;
        }
        else {
            return $this->_get_posts($extension, $param, $all);
        }
        */
        return $this->_get_posts($extension, $param, $all);
    }

    public function update($id = '', $key = '', $val = '')
    {
        $data = array(
            $key     => $val,
        );
        $this->db->update('live_radio', $data, array('id' => $id));
    }
    
}
