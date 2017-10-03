<?php
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Logs_model extends MY_Model {

    public function __construct()
    {        
        parent::__construct();
    }

    public function item($val = '', $key = 'oid')
    {
        return $this->slave->get_where('logs', array($key => $val))->row();
    }

    public function items($key = 'day', $limit = 5)
    {
        if($limit){
            $this->slave->limit($limit);
        }
        $this->slave->order_by($key, 'DESC');
        return $this->slave->get('logs')->result();
    }

    public function save($oid = '')
    {
        $row = $this->item($oid);
        if($row){
            $data = array(
                'day'       => $row->created == date('Y-m-d') ? $row->day + 1 : 1,
                'week'      => ( week_number($row->created) == week_number(date('Y-m-d'))  &&  date('n', strtotime($row->created)) == date('n') ) ? $row->week + 1 : 1,
                'month'     => date('n', strtotime($row->created)) == date('n') ? $row->month + 1 : 1,
                'created'   => date('Y-m-d'),
            );
            
            $this->db->update('logs', $data, array('oid' => $oid));
        }
        else{
            $data = array(
                'oid'       => $oid,
                'day'       => 1,
                'week'      => 1,
                'month'     => 1,
                'created'   => date('Y-m-d'),
            );
            $this->db->insert('logs', $data);
        }
    }

}
