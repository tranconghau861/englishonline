<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $admin = $this->session->admin;
        if (empty($admin)) {
            redirect('admin/home/login');
        }

        $view['user'] = $this->user->total();
        $view['video'] = $this->node->total('video');
        $view['news'] = $this->node->total('news');
        $view['banner'] = $this->node->total('banner');

        $view['videos'] = $this->node->items('video', 0, 5);
        $view['newss'] = $this->node->items('news', 0, 5);

        $this->load->view('admin/header');
        $this->load->view('admin/home', $view);
    }

    public function login()
    {
        $admin = $this->session->admin;
        if (!empty($admin)) {
            redirect('admin');
        }

        $view = array();

        if ($post = $this->input->post()) {
            $row = $this->user->login($post);
            if ($row) {
                $user_group = $this->user_group->item($row->gid);
                $data = array(
                    'id'       => $row->id,
                    'name'     => $row->name,
                    'username' => $row->username,
                    'email'    => $row->email,
                    'gid'      => $row->gid,
                    'params'   => unserialize($user_group->params),
                );
                $key = $row->gid > 0 ? 'admin' : 'user';
                $this->session->set_userdata($key, $data);
                redirect($key);
            } else {
                $view['msg'] = 'Tài khoản không đúng.';
            }
        }

        $this->load->view('admin/login', $view);
    }

    public function logout()
    {
        $this->session->unset_userdata('admin');
        redirect('admin');
    }

    public function upload_file()
    {
        $admin = $this->session->admin;
        if (empty($admin)) {
            redirect('admin');
        }

        // make directory by date
        $dir = 'upload/' . date('Y/m/d');
        if (!is_dir($dir)) {
            mkdir('upload/' . date('Y'));
            mkdir('upload/' . date('Y/m'));
            mkdir('upload/' . date('Y/m/d'));
        }

        $config['upload_path'] = $dir;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('fileimg')) {
            $upload = $this->upload->data();

            // upload ftp
            $connect = $this->ftp->connect();
            if ($connect) {
                // make directory by date
                $dir_ftp = 'upload/' . date('Y/m/d');
                $list_ftp = $this->ftp->list_files($dir_ftp);
                if (empty($list_ftp)) {
                    $this->ftp->mkdir('upload/' . date('Y'), 0755);
                    $this->ftp->mkdir('upload/' . date('Y/m'), 0755);
                    $this->ftp->mkdir('upload/' . date('Y/m/d'), 0755);
                }

                $this->ftp->upload($dir . '/' . $upload['file_name'], '/' . $dir_ftp . '/' . $upload['file_name'],
                    'ascii', 0775);
                $this->ftp->close();
            }

            $json = array(
                'msg'  => get_image_link($dir . '/' . $upload['file_name']),
                'res'  => 1,
                'name' => $dir . '/' . $upload['file_name'],
            );
        } else {
            $json = array(
                'msg' => $this->upload->display_errors('', ''),
                'res' => 0,
            );
        }
        echo json_encode($json);
    }

    public function delete_file()
    {
        $admin = $this->session->admin;
        if (empty($admin)) {
            redirect('admin');
        }

        if ($post = $this->input->post()) {
            $file = $post['name'];
            if ($file && file_exists($file)) {
                unlink($file);

                // upload ftp
                $connect = $this->ftp->connect();
                if ($connect) {
                    $this->ftp->delete_file('/' . $file);
                    $this->ftp->close();
                }

                echo "Xoá file thành công!";
            }
        } else {
            redirect('admin');
        }
    }

    public function clear_cache($key = '')
    {
        $admin = $this->session->admin;
        if (empty($admin)) {
            redirect('admin');
        }

        if ($key) {
            $this->mp_cache->delete($key);
        } else {
            $this->mp_cache->delete_all();
        }

        redirect('admin');
    }
}
