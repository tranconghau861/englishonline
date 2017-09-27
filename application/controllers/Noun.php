<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noun extends CI_Controller
{

    public function index($noun = '')
    {
        $view['segment'] = $this->uri->segment(0);
        list($number, $words) = explode("-most-common-", $view['segment']);

        $view['noun'] = $this->noun->get_posts(array(
            'query'     => 'result',
            'extension' => 'noun',
            'id_type'   => ($words == 'words') ? 2 : 1,
            'status'    => 1,
            'del_flg'   => 0,
            'like'      => (!empty($noun)) ? $noun : 'a',
            'random'    => 'id',
            'order_by'  => 'id DESC',
        ), 'noun_list_' . $words . $noun);

        $view['category_noun'] = $this->noun->get_posts(array(
            'query'     => 'result',
            'extension' => 'category-noun',
            'status'    => 1,
            'order_by'  => 'id DESC',
        ), 'noun_category');

        $header['metatitle'] = t('noun');

        $this->load->view('client/header', $header);
        $this->load->view('client/noun', $view);
        $this->load->view('client/footer');
    }

}
