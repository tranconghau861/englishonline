<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends CI_Controller {

	public function index($offset = 0)
	{
		$admin = $this->session->admin;
		if(empty($admin) || $admin['gid'] < 3){
			redirect('admin');
		}
		
		if($post = $this->input->post()){
			foreach($post['id'] as $id){
				$this->subscribe->delete($id);
			}
			redirect('admin/subscribe');
		}
		
		$limit = 50;
		$view['s'] = $s = $this->input->get('s');
		$view['rows'] = $this->subscribe->items($offset, $limit, $s);
		$view['total'] = $total = $this->subscribe->total($s);
		
		$this->pagination->initialize(array(
			'base_url' 		=> site_url('admin/subscribe/index'),
			'total_rows' 	=> $total,
			'per_page' 		=> $limit,
		));
		$view['pagination'] = $this->pagination->create_links();
		
		$this->load->view('admin/header');
		$this->load->view('admin/subscribe_list', $view);
	}

	public function form($id = 0)
	{
		$admin = $this->session->admin;
		if(empty($admin) || $admin['gid'] < 3){
			redirect('admin');
		}
		
		$row = $this->subscribe->item($id);
		
		$post = $this->input->post();
		if($post){
			if(!$post['email']) {
				$view['msg'] = 'Vui lòng nhập email!';
			}
			else if( !valid_email( $post['email'] ) ){
				$view['msg'] = 'Email không hợp lệ!';
			}
			else{
				$this->subscribe->save($post, $id);
				redirect('admin/subscribe');
			}
		}
		
		$view['row'] = $post ? (object) $post : $row;
		$this->load->view('admin/header');
		$this->load->view('admin/subscribe_form', $view);
	}

	public function delete($id = 0)
	{
		$admin = $this->session->admin;
		if(empty($admin) || $admin['gid'] < 3){
			redirect('admin');
		}
		
		if($id){
			$this->subscribe->delete($id);
		}
		redirect('admin/subscribe');
	}

	function export()
	{
		$admin = $this->session->admin;
		if(empty($admin) || $admin['gid'] < 3){
			redirect('admin');
		}
		
		$data[] = array('Tên', 'Email', 'IP');
		
		$rows = $this->subscribe->export();
		if($rows){
			foreach($rows as $row){
				$data[] = array( $row->name, $row->email, $row->ip );
			}
		}
		
		array_to_csv($data, date('Y-m-d') .'.csv');
	}

}
