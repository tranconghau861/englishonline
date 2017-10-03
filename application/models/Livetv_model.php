<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livetv_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function showTypehttp()
    {
        return array(
            array('id' => 'playlist.m3u8', 'name' => 'playlist.m3u8'),
            array('id' => 'manifest.f4m', 'name' => 'manifest.f4m'),
            array('id' => 'Manifest', 'name' => 'Manifest')
        );
    }

    public function check_alias($id = 0, $alias = '')
    {
        return $this->db->get_where('node', array('alias' => $alias, 'id !=' => $id))->num_rows();
    }

    public function item($val = '', $key = 'id')
    {
        return $this->db->get_where('livetv', array($key => $val))->row();
    }

    public function items($extension, $offset = 0, $limit = 50, $s = '', $cid = '')
    {
        if ($s) {
            $this->db->where("name LIKE '%{$s}%'");
        }
        if ($cid) {
            $this->db->where('media_category_id', $cid);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('livetv', array('extension' => $extension), $limit, $offset)->result();
    }

    public function total($extension, $s = '', $cid = '')
    {
        if ($s) {
            $this->db->where("name LIKE '%{$s}%'");
        }
        if ($cid) {
            $this->db->where('media_category_id', $cid);
        }
        return $this->db->get_where('livetv', array('extension' => $extension))->num_rows();
    }

    public function save($extension = '', $post, $id = 0)
    {
        $admin = $this->session->admin;
        $vowels = array("^");
        $vowel = array("~~");
        $consonants = str_replace($vowels, " || ", $post['hd_player_lst']);
        $content = str_replace($vowel, " || ; ", $consonants);
        $data = array(
            'name'                      => isset($post['name']) ? $post['name'] : '',
            'alias'                     => isset($post['alias']) ? $post['alias'] : '',
            'intro'                     => isset($content) ? $content : '',
            'photo'                     => isset($post['photo']) ? $post['photo'] : '',
            'media_category_id'         => isset($post['media_category_id']) ? $post['media_category_id'] : '',
            'rtmphost'                  => isset($post['rtmphost']) ? $post['rtmphost'] : '',
            'httphost'                  => isset($post['httphost']) ? $post['httphost'] : '',
            'rtsphost'                  => isset($post['rtsphost']) ? $post['rtsphost'] : '',
            'application_name'          => isset($post['application_name']) ? $post['application_name'] : '',
            'filename'                  => isset($post['filename']) ? $post['filename'] : '',
            'quanlity'                  => isset($post['quanlity']) ? $post['quanlity'] : '',
            'sort_order'                => isset($post['sort_order']) ? $post['sort_order'] : '',
            'is_publish_app'            => isset($post['is_publish_app']) ? 1 : 0,
            'is_hot'                    => isset($post['is_hot']) ? 1 : 0,
            'is_timeshift'              => isset($post['is_timeshift']) ? 1 : 0,
            'application_nametimeshift' => isset($post['application_nametimeshift']) ? $post['application_nametimeshift'] : '',
            'is_hd'                     => isset($post['is_hd']) ? 1 : 0,
            'code'                      => isset($post['code']) ? $post['code'] : '',
            'typehttp'                  => isset($post['typehttp']) ? $post['typehttp'] : '',
            'typertsp'                  => isset($post['typertsp']) ? $post['typertsp'] : '',
            'typeapp'                   => isset($post['typeapp']) ? $post['typeapp'] : '',
            'is_message'                => isset($post['is_message']) ? 1 : 0,
            'message'                   => isset($post['message']) ? $post['message'] : '',
            'publish'                   => isset($post['publish']) ? 1 : 0,
            'extension'                 => isset($extension) ? $extension : '',
        );
        if ($id) {
            $this->db->update('livetv', $data, array('id' => $id));
        } else {
            $data['date'] = date('Y-m-d');
            $this->db->insert('livetv', $data);
            $id = $this->db->insert_id();
        }
        $exist = $this->check_alias($id, @$post['alias']);
        if (empty($post['alias']) || $exist) {
            $alias = url_title(convert_accented_characters($post['name']), 'dash', true);
            $this->db->update('livetv', array('alias' => $alias . '-' . $id), array('id' => $id));
        }
        return $id;
    }

    public function delete($val = '', $key = 'id')
    {
        $this->db->delete('livetv', array(
            $key => $val,
        ));
    }

    public function parent($extension = '', $id = 0, $alt = '')
    {
        $data = array();
        $this->db->order_by('parent ASC, title ASC');
        $query = $this->db->get_where('node', array('extension' => $extension, 'parent' => $id));
        $rows = $query->result();
        if ($rows) {
            foreach ($rows as $row) {
                $row->alt = $alt . $row->title;
                $data[] = $row;
                $parent = $this->parent($extension, $row->id, '&mdash; ' . $alt);
                $data = array_merge($data, $parent);
            }
        }
        return $data;
    }

    public function copy($extension = '', $id = 0)
    {
        $this->db->order_by('id DESC');
        $query = $this->db->get('livetv');
        $row = $query->row();
        $autoid = $row->id + 1;
        $this->db->query("CREATE TEMPORARY TABLE tmp SELECT * FROM #__livetv WHERE id = " . $id . ";");
        $this->db->query("UPDATE tmp SET id = " . $autoid . " WHERE id = " . $id . ";");
        $this->db->query("INSERT INTO #__livetv SELECT tmp.* FROM tmp WHERE id = " . $autoid . ";");
        $row = $this->item($autoid, 'id');
        $params['alias'] = $row->alias . '-' . $autoid;
        $this->db->update('livetv', $params, array('id' => $autoid));
    }

    public function language($extension = '', $post, $id = 0)
    {
        $vowels = array("^");
        $vowel = array("~~");
        $consonants = str_replace($vowels, " || ", $post['hd_player_lst']);
        $content = str_replace($vowel, " || ; ", $consonants);
        $data = array(
            'name_en'    => $post['name_en'],
            'intro_en'   => isset($content) ? $content : '',
            'message_en' => isset($post['message_en']) ? $post['message_en'] : '',
        );
        $this->db->update('livetv', $data, array('id' => $id));
    }

    public function set_view($id = 0, $view = 0)
    {
        $data = array(
            'sum_view' => $view,
        );
        $this->db->update('node', $data, array('id' => $id));
    }

    public function set_like($id = 0, $sum_like = 0)
    {
        $data = array(
            'sum_like' => $sum_like,
        );
        $this->db->update('node', $data, array('id' => $id));
    }

    public function getLiveTVSchedule($id_livetv, $data = null)
    {
        $date = ($data == null) ? date('Y-m-d') : $data;
        $sql = "SELECT l.id, ls.content FROM ci_livetv as l LEFT JOIN ci_livetv_schedule as ls ON(l.id=ls.livetv_id) 
        WHERE l.publish = '1' AND ls.publish AND ls.schedule_date='" . $date . "' AND ls.livetv_id='" . $id_livetv . "' LIMIT 1";
        return $this->slave->query($sql)->row();
    }

    public function _get_livetv_schedule($param = array())
    {
        $date = (empty($param['schedule_date'])) ? date('Y-m-d') : $param['schedule_date'];
        $sql = "SELECT l.*, ls.* FROM ci_livetv as l LEFT JOIN ci_livetv_schedule as ls ON(l.id=ls.livetv_id) 
        WHERE l.publish = '1' AND ls.publish AND ls.schedule_date='" . $date . "' AND ls.livetv_id='" . $param['livetv_id'] . "' LIMIT 1";
        return $this->slave->query($sql)->row();
    }

    public function get_livetv_schedule($param = array(), $key = '')
    {
        $timeout = 24 * 60 * 60;
        $key = 'cache.' . $key;
        $rows = $this->mp_cache->get($key);
        if (empty($rows)) {
            $rows = $this->_get_livetv_schedule($param);
            $this->mp_cache->write($rows, $key, $timeout);
        } else {
            $rows = $this->_get_livetv_schedule($param);
        }
        return $rows;
    }

    public function update($id = '', $key = '', $val = '')
    {
        $data = array(
            $key => $val,
        );
        $this->db->update('livetv', $data, array('id' => $id));
    }

    public function _get_posts($extension = '', $param = array(), $all = 1)
    {
        if (isset($param['id'])) {
            $this->slave->where('id', $param['id']);
        }
        if (isset($param['alias'])) {
            $this->slave->where('alias', $param['alias']);
        }
        if (isset($param['publish'])) {
            $this->slave->where('publish', $param['publish']);
        }
        if (isset($param['is_publish_app'])) {
            $this->slave->where('is_publish_app', $param['is_publish_app']);
        }
        if (isset($param['sort_order'])) {
            $this->slave->order_by($param['sort_order']);
        }
        if (isset($param['limit'])) {
            $this->slave->limit($param['limit']);
        }
        $query = $this->slave->get_where('livetv', array('extension' => $extension));
        return ($all == 1) ? $query->result() : $query->row();
    }

    public function get_posts($extension = '', $param = array(), $all = 1, $key = '')
    {
        $timeout = 24 * 60 * 60;
        $key = 'cache.' . $key;
        $rows = $this->mp_cache->get($key);
        if (empty($rows)) {
            $rows = $this->_get_posts($extension, $param, $all);
            $this->mp_cache->write($rows, $key, $timeout);
        } else {
            $rows = $this->_get_posts($extension, $param, $all);
        }
        return $rows;
    }
}
