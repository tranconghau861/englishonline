<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

	public function index($offset = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params']['comment'])){
			redirect('admin');
		}
		
		$post = $this->input->post();
		if($post  &&  isset($admin['params']['comment']['delete']))
		{
			foreach($post['id'] as $id){
				$this->comment->delete($id);
			}
			redirect('admin/comment');
		}
		
		$limit = 50;
		$view['s'] = $s = $this->input->get('s');
		$view['rows'] = $this->comment->items($offset, $limit, $s);
		$view['total'] = $total = $this->comment->total($s);
		
		$this->pagination->initialize(array(
			'base_url' 		=> site_url('admin/comment/index'),
			'total_rows' 	=> $total,
			'per_page' 		=> $limit,
		));
		$view['pagination'] = $this->pagination->create_links();
		
		$this->load->view('admin/header');
		$this->load->view('admin/comment_list', $view);
	}

	public function form($id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params']['comment']['add'])  ||  (!isset($admin['params']['comment']['edit']) && $id)){
			redirect('admin');
		}
		
		$row = $this->comment->item($id);
		if($post = $this->input->post())
		{
			if(!$post['name'] || !$post['email'] || !$post['message']) {
				$view['msg'] = 'Yêu cầu nhập đầy đủ thông tin!';
			}
			else{
				$this->comment->save($post, $id);
				redirect('admin/comment');
			}
		}
		
		$view['topic'] = $this->node->item(@$row->oid);
		$view['comment'] = $this->comment->item(@$row->parent);
		
		$view['row'] = $post ? (object) $post : $row;
		$this->load->view('admin/header');
		$this->load->view('admin/comment_form', $view);
	}

	public function delete($id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params']['comment']['delete'])){
			redirect('admin');
		}
		
		if($id){
			$this->comment->delete($id);
		}
		redirect('admin/comment');
	}

}
