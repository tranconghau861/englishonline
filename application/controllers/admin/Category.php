<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function index($extension = '', $offset = 0)
    {
        $admin = $this->session->admin;
        if (!isset($admin['params'])) {
            redirect('admin');
        }

        $post = $this->input->post();
        if ($post && isset($admin['params']['delete'])) {
            foreach ($post['id'] as $id) {
                $row = $this->category->item($id);
                $file = 'upload/' . $row->photo;
                if ($row->photo && file_exists($file)) {
                    unlink($file);
                    // upload ftp
                    $connect = $this->ftp->connect();
                    if ($connect) {
                        $this->ftp->delete_file('/upload/' . $row->photo);
                        $this->ftp->close();
                    }
                }

                $gallery = unserialize($row->gallery);
                if ($gallery) {
                    foreach ($gallery as $g) {
                        $gfile = 'upload/' . $g;
                        if ($g && file_exists($gfile)) {
                            unlink($gfile);
                            // upload ftp
                            $connect = $this->ftp->connect();
                            if ($connect) {
                                $this->ftp->delete_file('/upload/' . $g);
                                $this->ftp->close();
                            }
                        }
                    }
                }

                $this->category->delete($id);
            }
            redirect('admin/category/index/');
        }

        $uid = $admin['gid'] > 3 ? '' : $admin['id'];
        $limit = 50;

        $view['s'] = $s = $this->input->get('s');
        $view['cid'] = $cid = $this->input->get('cid');
//        $view['date_from'] = $date_from = $this->input->get('date_from');
//        $view['date_to'] = $date_to = $this->input->get('date_to');

//        if((int) $date_from){
//            $date_from_exp = explode('/', $date_from);
//            $date_from = $date_from_exp[2] .'-'. $date_from_exp[1] .'-'. $date_from_exp[0];
//        }
//
//        if((int) $date_to){
//            $date_to_exp = explode('/', $date_to);
//            $date_to = $date_to_exp[2] .'-'. $date_to_exp[1] .'-'. $date_to_exp[0];
//        }

        $view['rows'] = $this->category->items($extension, $offset, $limit, $s, $cid /*$date_from, $date_to*/);
        $view['total'] = $total = $this->category->total($extension, $s, $cid/*$date_from, $date_to*/);
        $view['admin'] = $admin;
        $view['extension'] = $extension;
        $view['islang'] = 1;
        $view['modlang'] = array('categorys-newss', 'newss', 'category', 'tags');
        $view['category'] = $this->category->parent($extension);
        $this->pagination->initialize(array(
            'base_url' => site_url('admin/category/index/'),
            'total_rows' => $total,
            'per_page' => $limit,
        ));
        $view['pagination'] = $this->pagination->create_links();
        $this->load->view('admin/header');
        $this->load->view('admin/category/cate_list', $view);
    }

//    public function form($extension = '', $id = 0)
//    {
//        $admin = $this->session->admin;
//        if (!isset($admin['params'][$extension]['add']) || (!isset($admin['params'][$extension]['edit']) && $id)) {
//            redirect('admin');
//        }
//        $row = $this->newss->item($id);
//        if ($post = $this->input->post()) {
//            if (!$post['title']) {
//                $view['msg'] = 'Vui lòng nhập tiêu đề';
//            } else {
//                $this->mp_cache->delete_group('cache.newss_' . $extension . '_');
//                $this->newss->save($extension, $post, $id);
//                redirect('admin/newss/index/' . $extension);
//            }
//        }
//
//        $view['row'] = empty($post) ? $row : (object)$post;
//        $view['extension'] = $extension;
//        $this->load->view('admin/header');
//        $this->load->view('admin/newss/newss_form', $view);
//    }
//
//    public function language($extension = '', $id = 0)
//    {
//        $admin = $this->session->admin;
//        if (!isset($admin['params'][$extension]['edit']) && $id) {
//            redirect('admin');
//        }
//        $row = $this->newss->item($id);
//        if ($post = $this->input->post()) {
//            if (!$post['title_en']) {
//                $view['msg'] = 'Vui lòng nhập tiêu đề';
//            } else {
//                $this->newss->language($extension, $post, $id);
//                redirect('admin/newss/index/' . $extension);
//            }
//        }
//        $view['row'] = empty($post) ? $row : (object)$post;
//        $view['extension'] = $extension;
//        $this->load->view('admin/header');
//        $this->load->view('admin/newss/newss_lang', $view);
//    }
//
//    public function delete($extension = '', $id = 0)
//    {
//        $admin = $this->session->admin;
//        if (!isset($admin['params'][$extension]['delete'])) {
//            redirect('admin');
//        }
//
//        if ($id) {
//            $row = $this->newss->item($id);
//            $file = 'upload/' . $row->photo;
//
//            if ($row->photo && file_exists($file)) {
//                unlink($file);
//
//                // upload ftp
//                $connect = $this->ftp->connect();
//                if ($connect) {
//                    $this->ftp->delete_file('/upload/' . $row->photo);
//                    $this->ftp->close();
//                }
//            }
//
//            $gallery = unserialize($row->gallery);
//            if ($gallery) {
//                foreach ($gallery as $g) {
//                    $gfile = 'upload/' . $g;
//
//                    if ($g && file_exists($gfile)) {
//                        unlink($gfile);
//
//                        // upload ftp
//                        $connect = $this->ftp->connect();
//                        if ($connect) {
//                            $this->ftp->delete_file('/upload/' . $g);
//                            $this->ftp->close();
//                        }
//                    }
//                }
//            }
//
//            $this->newss->delete($id);
//        }
//        redirect('admin/newss/index/' . $extension);
//    }
//
//    public function copy($extension = '', $id = 0)
//    {
//        $admin = $this->session->admin;
//        if (!isset($admin['params'][$extension]['edit']) && $id) {
//            redirect('admin');
//        }
//
//        if ($id) {
//            $this->newss->copy($extension, $id);
//        }
//        redirect('admin/newss/index/' . $extension);
//    }
//
//    public function status($extension = '', $id = 0, $status = '')
//    {
//        $admin = $this->session->admin;
//        if (!isset($admin['params'][$extension]['edit']) && $id) {
//            redirect('admin');
//        }
//
//        $this->node->status($extension, $id, $status);
//        redirect('admin/newss/index/' . $extension);
//    }
//
//    public function filter()
//    {
//        if ($post = $this->input->post()) {
//            if ($post['title']) {
//                $where[] = 'title LIKE "%' . $post['title'] . '%"';
//            }
//
//            $rows = $this->newss->get_posts(array(
//                'query' => 'result',
//                'extension' => 'newss',
//                'status' => 1,
//                'where' => implode(' AND ', $where),
//                'limit' => 20,
//            ));
//
//            if ($rows) {
//                $html = '';
//                foreach ($rows as $row) {
//                    $html .= '<div class="checkbox"><label><input type="checkbox" value="' . $row->id . '" name="fields[related][' . $row->id . ']"> ' . $row->title . '</label></div>';
//                }
//
//                $json = array('html' => $html, 'res' => 1);
//            } else {
//                $json = array('html' => '', 'res' => 0);
//            }
//            echo json_encode($json);
//        } else {
//            redirect();
//        }
//    }

}