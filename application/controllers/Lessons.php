<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lessons extends CI_Controller
{

    public function index()
    {

        $view['lessons'] = $this->lessons->get_posts(array(
            'query'     => 'result',
            'extension' => 'category-lessons',
            'status'    => 1,
        ), 'lessons_list');

        $header['metatitle'] = t('lessons');

        $this->load->view('client/header', $header);
        $this->load->view('client/lessons', $view);
        $this->load->view('client/footer');
    }

    public function detail($alias = '')
    {
        $item = $this->lessons->get_posts(array(
            'query'     => 'row',
            'extension' => 'category-lessons',
            'status'    => 1,
            'alias'     => $alias,
        ), 'lessons_detail_' . md5($alias));

        if (!$item) {
            $this->load->view('client/header');
            $this->load->view('client/404');
            $this->load->view('client/footer');
        } else {
            // count view
            $viewtime = $this->session->userdata('viewtime' . $item->id);
            if ($viewtime < time()) {
                $this->lessons->update($item->id, 'sum_view', $item->sum_view + 1);
                $this->session->set_userdata('viewtime' . $item->id, strtotime('+5 minute'));
            }

            $view['lessons_content'] = $this->lessons->get_posts(array(
                'query'     => 'result',
                'extension' => 'lessons',
                'status'    => 1,
                'order_by'  => 'ordering ASC',
                'parent'    => $item->id,
            ), 'lessons_content_' . $item->id);

            $view['item'] = $item;

            $header['metatitle'] = translate($item->title, $item->title_en);
            $header['metadescription'] = $item->description ? $item->description : translate($item->intro,
                $item->intro_en);
            $header['metakeywords'] = $item->keywords ? $item->keywords : translate($item->title, $item->title_en);
            $header['metaimage'] = $item->photo ? get_image_link($item->photo) : '';

            $this->load->view('client/header', $header);
            $this->load->view('client/lessons_detail', $view);
            $this->load->view('client/footer');
        }
    }

}
