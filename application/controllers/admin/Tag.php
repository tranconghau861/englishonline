<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends CI_Controller
{
    public function index($offset = 0)
    {
        $admin = $this->session->admin;
        if (!isset($admin['params'])) {
            redirect('admin');
        }

        $post = $this->input->post();
        if ($post) {
            foreach ($post['id'] as $id) {

                $row = $this->tag->item($id);
                $this->tag->delete($id);
            }

            redirect('admin/tag/index/');
        }

        $uid = $admin['gid'] > 3 ? '' : $admin['id'];
        $limit = 50;
        $view['s'] = $s = $this->input->get('s');
        $view['rows'] = $this->tag->items($offset, $limit, $s);
        $view['total'] = $total = $this->tag->total($s);
        $view['admin'] = $admin;
        $view['islang'] = 1;
        $view['modlang'] = array('category', 'tags');
        $this->pagination->initialize(array(
            'base_url' => site_url('admin/tag/index/'),
            'total_rows' => $total,
            'per_page' => $limit,
        ));
        $view['pagination'] = $this->pagination->create_links();
        $this->load->view('admin/header');
        $this->load->view('admin/tag/tag_list', $view);
    }

    public function form($id = 0)
    {
        $row = $this->tag->item($id);
        if ($post = $this->input->post()) {
            if (!$post['title']) {
                $view['msg'] = 'Vui lòng nhập tiêu đề';
            } else {
                $this->mp_cache->delete_group('cache.tag_');
                $this->tag->save($post, $id);

                redirect('admin/tag/index/');
            }
        }

        $view['row'] = empty($post) ? $row : (object)$post;
        $this->load->view('admin/header');
        $this->load->view('admin/tag/tag_form', $view);
    }

    public function delete($id = 0)
    {
        if ($id) {
            $row = $this->tag->item($id);

            $this->tag->delete($id);

            redirect('admin/tag/index/');
        }
    }

    public function copy($id = 0)
    {
        if ($id) {
            $this->tag->copy($id);
        }

        redirect('admin/tag/index/');
    }
}
