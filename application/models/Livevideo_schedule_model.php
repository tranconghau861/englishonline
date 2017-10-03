<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livevideo_schedule_model extends MY_Model {

    public function __construct()
    {        
        parent::__construct();
    }

    public function item($val = '', $key = 'id')
    {
        return $this->db->get_where('live_radio_schedule', array($key => $val))->row();
    }

    public function items($extension, $offset = 0, $limit = 50)
    {          
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('live_radio_schedule', array('extension' => $extension), $limit, $offset)->result();
    }

    public function total($extension, $s = '', $cid = '')
    {
        if($cid){
            $this->db->where('livetv_id', $cid);
        }
        return $this->db->get_where('live_radio_schedule',array('extension' => $extension))->num_rows();
    }

    public function save_import($extension = '', $post, $id = 0)
    {
        $flat = false;
        foreach($post as $key=>$value)
        {
            if(isset($value['code'])){
                $this->db->select('id');
                $this->db->where('code', $value['code']);
                $rows = $this->db->get_where('livetv', array())->row();
                if(!empty($rows)){
                    $data = array(
                        'livetv_id' => $rows->id,
                        'content'           => $value['schedule_date'][0]['time_program'],
                        'schedule_date'             => $value['schedule_date'][0]['schedule_date'],
                        'publish'           => 0,
                    );
                    $this->db->insert('live_radio_schedule', $data);
                    $flat = $this->db->insert_id();
                }
            }
        }
        return $flat;
    }
    
    public function getDateExits($extension,$date)
    {
        $this->db->select('id');
        $this->db->where('schedule_date', $date);
        return $this->db->get_where('live_radio_schedule', array('extension' => $extension))->row();
    }

    public function save($extension = '', $post, $id = 0)
    {
        $admin = $this->session->admin;
        $vowels = array("^");
        $vowel = array("~~");
        $consonants = str_replace($vowels, " || ", $post['hd_player_lst']);
        $content = str_replace($vowel, " || ; ", $consonants);      
        $data = array(
            'extension' => $extension,
            'content'           => isset($content) ? $content : '',
            'schedule_date'             => isset($post['schedule_date']) ? date('Y-m-d',strtotime(trim($post['schedule_date']))) : '',
            'publish'           => isset($post['publish']) ? 1 : 0,
        );
        if($id){
            $this->db->update('live_radio_schedule', $data, array('id' => $id));
        }
        else{
            $this->db->insert('live_radio_schedule', $data);
            $id = $this->db->insert_id();
        }
        return $id;
    }
    
    public function language($extension = '', $post, $id = 0)
    {
        $vowels = array("^");
        $vowel = array("~~");
        $consonants = str_replace($vowels, " || ", $post['hd_player_lst']);
        $content = str_replace($vowel, " || ; ", $consonants);
        $data = array(
            'content_en'   => isset($content) ? $content : '',
        );
        $this->db->update('live_radio_schedule', $data, array('id' => $id));
    }

    public function delete($val = '', $key = 'id')
    {
        $this->db->delete('live_radio_schedule', array(
            $key => $val,
        ));
    }

    public function copy($extension = '', $id = 0)
    {
        $this->db->order_by('id DESC');
        $row = $this->db->get('live_radio_schedule')->row();
        $autoid = $row->id + 1;     
        $this->db->query("CREATE TEMPORARY TABLE tmp SELECT * FROM #__livetv_schedule WHERE id = ". $id .";");
        $this->db->query("UPDATE tmp SET id = ". $autoid ." WHERE id = ". $id .";");
        $this->db->query("INSERT INTO #__livetv_schedule SELECT tmp.* FROM tmp WHERE id = ". $autoid .";");
        $row = $this->item($autoid, 'id');
        //$params['alias'] = $row->alias .'-'. $autoid;
        $this->db->update('live_radio_schedule', '', array('id' => $autoid));
    }

    public function getObjectData($schedule)
    {
        //date_default_timezone_set('Asia/Ho_Chi_Minh');
        $obj = array();
        $objItem = array();
        $content = translate($schedule->content, $schedule->content_en);
        $schedule = explode(";",$content);
        $total = count($schedule);
        for($i=0;$i < $total;$i++):
            $item = explode("||",$schedule[$i]);
            $schedule_date = (isset($schedule->schedule_date)) ? $schedule->schedule_date : '';
            $start = strtotime( $schedule_date. str_replace('h', ":", trim($item[0])) . ':00');
            $current = strtotime(date('Y-m-d H:i:s'));
            $time = (isset($item[0])) ? trim($item[0]) : '';
            $title = (isset($item[1])) ? trim($item[1]) : '' ;
            if($current > $start)
            {
                if(!empty($time) &&!empty($title) ){
                    $objItem[] = array(
                        'time' => $time,
                        'title' => $title,
                        'content' => (isset($item[2])) ? $item[2] : ''
                    );
                }
            }
            if($current <= $start)
            {
                if(!empty($time) &&!empty($title) ){
                    $obj[] = array(
                        'time' => $time,
                        'title' => $title,
                        'content' => (isset($item[2])) ? trim($item[2]) : ''
                    );
                }
            }
        endfor;
        return array(
            'schedule_start' =>$objItem[count($objItem)-1],
            'schedule_next' =>$obj
        );
    }

    private function _get_posts($param = array())
    {
        $date = (!empty($param['schedule_date'])) ? $param['schedule_date'] : date('Y-m-d');
        $this->slave->where('schedule_date', $date);
        if(!empty($param['extension'])){
            $this->slave->where('extension', $param['extension']);
        }
        return $this->slave->get('live_radio_schedule')->row();
    }

    public function get_posts($param = array(), $key = '')
    {
        /*
        if ($this->cache->memcached->is_supported() && $key)
        {
            $timeout = 15 * 60;
            $key = 'cache.'. $key;
            $rows = $this->cache->memcached->get($key);
            if ( empty($rows) )
            {
                $rows = $this->_get_posts($param);
                $this->cache->memcached->save($key, $rows, $timeout);
            }
            return $rows;
        }
        else {
            return $this->_get_posts($param);
        }
        */
        return $this->_get_posts($param);
    }
    function sw_get_current_weekday($before, $after) 
    {
        $date = array();
        for($i = 1; $i <= $before; $i++ )
        {
            $_date = strtotime( date( "Y-m-d") ." -".$i." day" );
            array_push($date, date( "Y-m-d", $_date) );
        }
        asort($date);
        array_push($date, date( "Y-m-d") );
        for($k = 1; $k <= $after; $k++ )
        {
            $k_date = strtotime( date( "Y-m-d") ." +".$k." day" );
            array_push($date, date( "Y-m-d", $k_date) );
        }
        $string =  implode(",", $date);
        $pieces = explode(",", $string);
        $total = count($pieces);
        $obj = array();     
        for($j = 0; $j < $total; $j++)
        {
            $_date = $pieces[$j];
            $obj[] = array(
                'value' =>$this->current_weekday( date( "l", strtotime($_date) ) , $_date ),
                '_date' =>$_date
            );
        }
        return $obj;
    }

    function current_weekday($weekday = null, $_date) 
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $weekday = ($weekday == null) ? date("l") :$weekday ;
        $weekday = strtolower($weekday);
        switch($weekday) {
            case 'monday':
                $weekday = 'T2';
                break;
            case 'tuesday':
                $weekday = 'T3';
                break;
            case 'wednesday':
                $weekday = 'T4';
                break;
            case 'thursday':
                $weekday = 'T5';
                break;
            case 'friday':
                $weekday = 'T6';
                break;
            case 'saturday':
                $weekday = 'T7';
                break;
            default:
                $weekday = 'CN';
                break;
        }
        return $weekday.'<br>'. date('d/m',strtotime($_date));
    }
}
