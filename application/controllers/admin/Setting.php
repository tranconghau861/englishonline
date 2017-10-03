<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function index()
	{
		$admin = $this->session->admin;
		if(!isset($admin['params']['setting'])){
			redirect('admin');
		}
		
		$post = $this->input->post();
		if($post){
			$this->setting->save($post);
			redirect('admin/setting');
		}
		
		$view['config'] = $this->setting->items();
		$this->load->view('admin/header');
		$this->load->view('admin/setting', $view);
	}

}
