<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_group extends CI_Controller {

	public function index($offset = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params']['user_group'])){
			redirect('admin');
		}
		
		$post = $this->input->post();
		if($post  &&  isset($admin['params']['user_group']['delete'])){
			foreach($post['id'] as $id){
				$this->user_group->delete($id);
			}
			redirect('admin/user_group');
		}
		
		$limit = 50;
		$view['s'] = $s = $this->input->get('s');
		$view['rows'] = $this->user_group->items($offset, $limit, $s);
		$view['total'] = $total = $this->user_group->total($s);
		
		$this->pagination->initialize(array(
			'base_url' 		=> site_url('admin/user_group/index'),
			'total_rows' 	=> $total,
			'per_page' 		=> $limit,
		));
		$view['pagination'] = $this->pagination->create_links();
		
		$this->load->view('admin/header');
		$this->load->view('admin/user_group_list', $view);
	}

	public function form($id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params']['user_group']['add'])  ||  (!isset($admin['params']['user_group']['edit']) && $id)){
			redirect('admin');
		}
		
		$row = $this->user_group->item($id);
		
		$post = $this->input->post();
		if($post){
			if(!$post['name']) {
				$view['msg'] = 'Vui lòng nhập nội dung bên dưới!';
			}
			else{
				$this->user_group->save($post, $id);
				redirect('admin/user_group');
			}
		}
		
		$view['row'] = $post ? (object) $post : $row;
		$this->load->view('admin/header');
		$this->load->view('admin/user_group_form', $view);
	}

	public function delete($id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params']['user_group']['delete'])){
			redirect('admin');
		}
		
		if($id){
			$this->user_group->delete($id);
		}
		redirect('admin/user_group');
	}

}
