<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller
{


    public function index($alias = '')
    {
        $limit = 12;

        $menu = $this->node->get_posts(array(
            'query'     => 'row',
            'extension' => 'category-video',
            'status'    => 1,
            'alias'     => $alias,
        ), 'node_video_category');

        $view['video'] = $this->node->get_posts(array(
            'query'     => 'result',
            'extension' => 'video',
            'status'    => 1,
            'parent'    => $menu->id,
            'order_by'  => 'id DESC',
            'limit'     => array($limit),
        ), 'node_video_list_' . $menu->id . '_' . md5($limit));

        $view['id_menu'] = $menu->id;
        $view['id_video'] = $view['video'][$limit - 1]->id;

        $header['metatitle'] = translate($menu->title, $menu->title_en);

        $this->load->view('client/header', $header);
        $this->load->view('client/video', $view);
        $this->load->view('client/footer');
    }

    public function ajax_more($id_menu, $id_video)
    {

        $limit = 12;

        $view['total'] = $this->node->get_posts(array(
            'query'     => 'total',
            'extension' => 'video',
            'parent'    => $id_menu,
            'status'    => 1,
            'id_id'     => $id_video,
            'order_by'  => 'id DESC',
        ), 'node_video_list_ss' . $id_menu);

        $view['video'] = $this->node->get_posts(array(
            'query'     => 'result',
            'extension' => 'video',
            'status'    => 1,
            'parent'    => $id_menu,
            'id_id'     => $id_video,
            'order_by'  => 'id DESC',
            'limit'     => array($limit),
        ), 'node_video_list_' . $id_menu . $id_video . '_' . md5($limit));

        $view['id_menu'] = $id_menu;
        $view['id_video'] = $view['video'][$limit - 1]->id;
        $view['limit'] = $limit;

        echo $this->load->view('client/list_video_ajax', $view, true);
        exit;
    }

    public function detail($alias = '')
    {
        $view['item'] = $item = $this->node->get_posts(array(
            'query'     => 'row',
            'extension' => 'video',
            'status'    => 1,
            'alias'     => $alias,
        ), 'video_detail_' . md5($alias));

        if (!$item) {
            $this->load->view('client/header');
            $this->load->view('client/404');
            $this->load->view('client/footer');
        } else {

            // count view
            $viewtime = $this->session->userdata('viewtime' . $item->id);
            if ($viewtime < time()) {
                $this->node->update($item->id, 'sum_view', $item->sum_view + 1);
                $this->session->set_userdata('viewtime' . $item->id, strtotime('+5 minute'));
                $this->logs->save($item->id);
            }

            $video_other = $this->node->get_posts(array(
                'query'     => 'result',
                'extension' => 'video',
                'status'    => 1,
                'not_id'    => $item->id,
                'order_by'  => 'id DESC',
                'limit'     => 5,
            ), 'node_video_other_' . $item->id);

            $data = array(
                array(
                    'image' => get_image_link($item->photo),
                    'file'  => $item->link,
                    'title' => translate($item->title, $item->title_en)
                )
            );
            foreach ($video_other as $value):
                $data[] = array(
                    'image' => get_image_link($value->photo),
                    'file'  => $value->link,
                    'title' => translate($value->title, $value->title_en)
                );
            endforeach;

            $view['video_list'] = json_encode($data);

            $header['metatitle'] = translate($item->title, $item->title_en);
            $header['metadescription'] = $item->description ? $item->description : translate($item->intro,
                $item->intro_en);
            $header['metakeywords'] = $item->keywords ? $item->keywords : translate($item->title, $item->title_en);
            $header['metaimage'] = $item->photo ? get_image_link($item->photo) : '';

            $this->load->view('client/header', $header);
            $this->load->view('client/video_detail', $view);
            $this->load->view('client/footer');
        }
    }

}
