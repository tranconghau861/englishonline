<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index($offset = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params']['user'])){
			redirect('admin');
		}
		
		$post = $this->input->post();
		if($post  &&  isset($admin['params']['user']['delete'])){
			foreach($post['id'] as $id){
				$this->user->delete($id);
			}
			redirect('admin/user');
		}
		
		$limit = 50;
		$view['s'] = $s = $this->input->get('s');
		$view['rows'] = $this->user->items($offset, $limit, $s);
		$view['total'] = $total = $this->user->total($s);
		
		$this->pagination->initialize(array(
			'base_url' 		=> site_url('admin/user/index'),
			'total_rows' 	=> $total,
			'per_page' 		=> $limit,
		));
		$view['pagination'] = $this->pagination->create_links();
		
		$this->load->view('admin/header');
		$this->load->view('admin/user_list', $view);
	}

	public function form($id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params']['user']['add'])  ||  (!isset($admin['params']['user']['edit']) && $id)){
			redirect('admin');
		}
		
		$row = $this->user->item($id);
		
		$post = $this->input->post();
		if($post){
			$username = $this->user->check_exist($id, 'username', $post['username']);
			$email = $this->user->check_exist($id, 'email', $post['email']);
			
			if(!$post['firstname'] || !$post['lastname'] || !$post['username'] || !$post['email']) {
				$view['msg'] = 'Vui lòng nhập nội dung bên dưới!';
			}
			else if($username) {
				$view['msg'] = 'Tên đăng nhập đã có!';
			}
			else if( !valid_email( $post['email'] ) ){
				$view['msg'] = 'Email không hợp lệ!';
			}
			else if($email) {
				$view['msg'] = 'Email đã có!';
			}
			else{
				$post['name'] = implode(' ', array($post['firstname'], $post['lastname']));
				
				$this->user->save($post, $id);
				redirect('admin/user');
			}
		}
		
		$view['user_group'] = $this->user_group->all();
		$view['row'] = $post ? (object) $post : $row;
		
		$this->load->view('admin/header');
		$this->load->view('admin/user_form', $view);
	}

	public function delete($id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params']['user']['delete'])){
			redirect('admin');
		}
		
		if($id){
			$this->user->delete($id);
		}
		redirect('admin/user');
	}

	public function profile()
	{
		$admin = $this->session->admin;
		if(empty($admin)){
			redirect('admin');
		}
		
		$id = $admin['id'];
		$row = $this->user->item($id);
		
		$post = $this->input->post();
		if($post){
			$username = $this->user->check_exist($id, 'username', $post['username']);
			$email = $this->user->check_exist($id, 'email', $post['email']);
			
			if(!$post['firstname'] || !$post['lastname'] || !$post['username'] || !$post['email']) {
				$view['msg'] = 'Vui lòng nhập thông tin bên dưới!';
			}
			else if($username) {
				$view['msg'] = 'Tên đăng nhập đã có!';
			}
			else if( !valid_email( $post['email'] ) ){
				$view['msg'] = 'Email không hợp lệ!';
			}
			else if($email) {
				$view['msg'] = 'Email đã có!';
			}
			else{
				$post['name'] = implode(' ', array($post['firstname'], $post['lastname']));
				
				$this->user->profile($post, $id);
				redirect('admin/user/profile');
			}
		}
		
		$view['row'] = $post ? (object) $post : $row;
		$this->load->view('admin/header');
		$this->load->view('admin/user_profile', $view);
	}

}
