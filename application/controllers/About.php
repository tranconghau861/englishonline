<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller
{

    public function index()
    {
        $view['rows'] = $this->node->get_posts(array(
            'query'     => 'result',
            'extension' => 'about',
            'status'    => 1,
            'order_by'  => 'id DESC',
        ), 'node_about_us');

        $header['metatitle'] = t('about');

        $this->load->view('client/header', $header);
        $this->load->view('client/about', $view);
        $this->load->view('client/footer');
    }
}
