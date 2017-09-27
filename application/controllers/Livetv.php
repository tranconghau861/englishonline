<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livetv extends CI_Controller
{

    public function index($alias = '')
    {
        if (empty($alias)) {
            $view['livetv'] = $livetv = $this->livetv->get_posts(
                'livetv',
                array(
                    'extension'      => 'livetv',
                    'is_publish_app' => 1,
                    'publish'        => 1
                ),
                0, 'lievtv_default'
            );
        } else {
            $view['livetv'] = $livetv = $this->livetv->get_posts(
                'livetv',
                array(
                    'extension' => 'livetv',
                    'alias'     => $alias,
                    'publish'   => 1
                ),
                0, 'lievtv_' . md5($alias)
            );
        }
        $view['livetv_other'] = $this->livetv->get_posts(
            'livetv',
            array(
                'extension' => 'livetv',
                'not_id'    => $livetv->id,
                'publish'   => 1
            ),
            1, 'livetv_other'
        );
        // count view
        $viewtime = $this->session->userdata('viewtimelivetv' . $livetv->id);
        if ($viewtime < time()) {
            $this->livetv->update($livetv->id, 'sum_view', $livetv->sum_like + 1);
            $this->session->set_userdata('viewtimelivetv' . $livetv->id, strtotime('+5 minute'));
        }
        $view['alphabet'] = $this->alphabet->get_posts(array(
            'query'     => 'result',
            'extension' => 'category-alphabet',
            'status'    => 1,
            'id_random' => 'id',
            'order_by'  => 'ordering ASC',
            'limit'     => 5,
        ), 'alphabet_livetv_list');
        $view['video'] = $this->node->get_posts(array(
            'query'     => 'result',
            'extension' => 'video',
            'status'    => 1,
            'limit'     => 10,
            'special'   => 0,
            'order_by'  => 'id DESC',
        ), 'node_video_alphabet');
        $view['schedule'] = $this->livetv->get_livetv_schedule(
            array(
                'livetv_id'     => $livetv->id,
                'schedule_date' => date('Y-m-d')
            ), 'lievtv_schedule_' . $livetv->id . date('Ymd')
        );
        $header['metatitle'] = translate($livetv->name, $livetv->name_en);
        $header['metadescription'] = translate($livetv->name, $livetv->name_en);
        $header['metakeywords'] = translate($livetv->name, $livetv->name_en);

        $this->load->view('client/header', $header);
        $this->load->view('client/livetv', $view);
        $this->load->view('client/footer');
    }
}
