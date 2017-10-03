<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
{

    public function index()
    {
        $view['config'] = $this->setting->items();

        $header['metatitle'] = t('contact');

        $this->load->view('client/header', $header);
        $this->load->view('client/contact', $view);
        $this->load->view('client/footer');
    }

    public function send()
    {

        if ($post = $this->input->post()) {
            $captcha = $this->session->userdata('captcha');

            if (!$post['name'] || !$post['email'] || !$post['subject'] || !$post['message']) {
                $json['res'] = 0;
                $json['msg'] = t('require-field');
            } else {
                if (!valid_email($post['email'])) {
                    $json['res'] = 0;
                    $json['msg'] = t('email-invalid');
                } else {
                    if ($captcha['code'] != $post['captcha']) {
                        $json['res'] = 0;
                        $json['msg'] = t('captcha-invalid');
                    } else {
                        $config = $this->setting->items();

                        // send mail
                        $this->email->clear();
                        $this->email->from($post['email'], $post['name']);
                        $this->email->to($config['email']);

                        if ($config['emailcc']) {
                            $this->email->cc($config['emailcc']);
                        }

                        $this->email->subject($post['subject']);
                        $this->email->message($post['message']);

                        $sended = $this->email->send();

                        if ($sended) {
                            $json['res'] = 1;
                            $json['msg'] = t('send-success');
                        } else {
                            $json['res'] = 0;
                            $json['msg'] = t('send-failed');
                        }
                    }
                }
            }
            echo json_encode($json);
        } else {
            redirect();
        }
    }

}
