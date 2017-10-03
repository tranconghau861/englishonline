<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alphabet extends CI_Controller
{

    public function index()
    {

        $view['ads'] = '';

        $header['metatitle'] = t('alphabet');

        $this->load->view('client/header', $header);
        $this->load->view('client/alphabet', $view);
        $this->load->view('client/footer');
    }

    public function pronounce()
    {
        $limit = 8;

        $view['pronounce'] = $this->alphabet->get_posts(array(
            'query'     => 'result',
            'extension' => 'category-alphabet',
            'status'    => 1,
            'order_by'  => 'id DESC',
            'limit'     => array($limit),
        ), 'alphabet_pronounce_' . md5($limit));

        $view['id_alphabet'] = $view['pronounce'][$limit - 1]->id;

        $this->load->view('client/header', $header);
        $this->load->view('client/pronounce', $view);
        $this->load->view('client/footer');
    }

    public function ajax_more($id_alphabet)
    {

        $limit = 8;

        $view['total'] = $this->alphabet->get_posts(array(
            'query'     => 'total',
            'extension' => 'category-alphabet',
            'status'    => 1,
            'id_id'     => $id_alphabet,
            'order_by'  => 'id DESC',
        ), 'alphabet_pronounce_total' . $id_alphabet);

        $view['pronounce'] = $this->alphabet->get_posts(array(
            'query'     => 'result',
            'extension' => 'category-alphabet',
            'status'    => 1,
            'id_id'     => $id_alphabet,
            'order_by'  => 'id DESC',
            'limit'     => array($limit),
        ), 'alphabet_pronounce_list_' . $id_alphabet . '_' . md5($limit));

        $view['id_alphabet'] = $view['pronounce'][$limit - 1]->id;
        $view['limit'] = $limit;

        echo $this->load->view('client/list_pronounce_ajax', $view, true);
        exit;
    }

    public function detail($alias = '')
    {
        $arrString = explode("/", $_SERVER['REDIRECT_URL']);
        $alias = $arrString[count($arrString) - 1];
        $item = $this->alphabet->get_posts(array(
            'query'     => 'row',
            'extension' => 'category-alphabet',
            'status'    => 1,
            'alias'     => $alias,
        ), 'alphabet_detail_' . md5($alias));

        if (!$item) {
            $this->load->view('client/header');
            $this->load->view('client/404');
            $this->load->view('client/footer');
        } else {
            // count view
            $viewtime = $this->session->userdata('viewtime' . $item->id);
            if ($viewtime < time()) {
                $this->alphabet->update($item->id, 'sum_view', $item->sum_view + 1);
                $this->session->set_userdata('viewtime' . $item->id, strtotime('+5 minute'));
            }

            $view['alphabet_content'] = $this->alphabet->get_posts(array(
                'query'     => 'result',
                'extension' => 'alphabet',
                'status'    => 1,
                'order_by'  => 'ordering ASC',
                'parent'    => $item->id,
            ), 'alphabet_content_' . $item->id);

            $view['item'] = $item;

            $header['metatitle'] = translate($item->title, $item->title_en);
            $header['metadescription'] = $item->description ? $item->description : translate($item->intro,
                $item->intro_en);
            $header['metakeywords'] = $item->keywords ? $item->keywords : translate($item->title, $item->title_en);
            $header['metaimage'] = $item->photo ? get_image_link($item->photo) : '';

            $this->load->view('client/header', $header);
            $this->load->view('client/alphabet_detail', $view);
            $this->load->view('client/footer');
        }
    }

}
