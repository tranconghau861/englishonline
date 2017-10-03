<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livetv extends CI_Controller {

	public function index($extension = '', $offset = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension])){
			redirect('admin');
		}
		
		$post = $this->input->post();
		if($post  &&  isset($admin['params'][$extension]['delete']))
		{
			foreach($post['id'] as $id)
			{
				$row = $this->livetv->item($id);
				@unlink('upload/'. $row->photo);
				
				$this->livetv->delete($id);
			}
			redirect('admin/livetv/index/'. $extension);
		}
		
		$uid = $admin['gid'] > 3 ? '' : $admin['id'];
		$limit = 50;
		
		$view['s'] = $s = $this->input->get('s');
		$view['cid'] = $cid = $this->input->get('cid');
		$view['rows'] = $this->livetv->items($extension, $offset, $limit, $s, $cid);
		$view['total'] = $total = $this->livetv->total($extension, $s, $cid);
		
		$view['extension'] = $extension;
		$view['islang'] = 1;
		$view['modlang'] = array('livetv', 'category-'.$extension);
		$view['category'] = $this->livetv->parent('category-'. $extension);
		
		$this->pagination->initialize(array(
			'base_url' 		=> site_url('admin/livetv/index/'. $extension),
			'total_rows' 	=> $total,
			'per_page' 		=> $limit,
		));
		$view['pagination'] = $this->pagination->create_links();
		
		$this->load->view('admin/header');
		$this->load->view('admin/livetv/livetv_list', $view);
	}
	
	public function livetv_tream($extension = '', $offset = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension])){
			redirect('admin');
		}
		
		$post = $this->input->post();
		if($post  &&  isset($admin['params'][$extension]['delete']))
		{
			foreach($post['id'] as $id)
			{
				$row = $this->livetv->item($id);
				@unlink('upload/'. $row->photo);
				
				$this->livetv->delete($id);
			}
			redirect('admin/livetv/livetv_tream/'. $extension);
		}
		
		$uid = $admin['gid'] > 3 ? '' : $admin['id'];
		$limit = 50;
		
		$view['s'] = $s = $this->input->get('s');
		$view['cid'] = $cid = $this->input->get('cid');
		$view['rows'] = $this->livetv->items($extension, $offset, $limit, $s, $cid);
		$view['total'] = $total = $this->livetv->total($s, $cid);
		
		$view['extension'] = $extension;
		$view['islang'] = 1;
		$view['modlang'] = array('livetv', 'category-'.$extension);
		$view['category'] = $this->livetv->parent('category-'. $extension);
		
		$this->pagination->initialize(array(
			'base_url' 		=> site_url('admin/livetv/livetv_tream/'. $extension),
			'total_rows' 	=> $total,
			'per_page' 		=> $limit,
		));
		$view['pagination'] = $this->pagination->create_links();
		
		$this->load->view('admin/header');
		$this->load->view('admin/livetv/livetv_tream_list', $view);
	}

	public function form($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension]['add'])  ||  (!isset($admin['params'][$extension]['edit']) && $id)){
			redirect('admin');
		}
		
		$row = $this->livetv->item($id);
		if($post = $this->input->post())
		{			
			
			$exist = $this->livetv->check_alias($id, @$post['alias']);
			
			if(!$post['name']) {
				$view['msg'] = 'Vui lòng nhập tiêu đề';
			}
			else if(@$post['alias'] && $exist) {
				$view['msg'] = 'SEO Url đã có!';
			}
			else {
				$this->livetv->save($extension, $post, $id);
				redirect('admin/livetv/index/'. $extension);
			}
		}
		
		$view['row'] = empty($post) ? $row : (object) $post;
		$view['extension'] = $extension;
		$view['category'] = $this->livetv->parent('category-'. $extension);
		$view['typehttps'] = $this->livetv->showTypehttp();
		$this->load->view('admin/header');
		$this->load->view('admin/livetv/livetv_form', $view);
	}
	
	public function form_tream($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension]['add'])  ||  (!isset($admin['params'][$extension]['edit']) && $id)){
			redirect('admin');
		}
		
		$row = $this->livetv->item($id);
		if($post = $this->input->post())
		{			
			
			$exist = $this->livetv->check_alias($id, @$post['alias']);
			
			if(!$post['name']) {
				$view['msg'] = 'Vui lòng nhập tiêu đề';
			}
			else if(@$post['alias'] && $exist) {
				$view['msg'] = 'SEO Url đã có!';
			}
			else {
				$this->livetv->save($extension, $post, $id);
				redirect('admin/livetv/livetv_tream/'. $extension);
			}
		}
		
		$view['row'] = empty($post) ? $row : (object) $post;
		$view['extension'] = $extension;
		
		$this->load->view('admin/header');
		$this->load->view('admin/livetv/livetv_tream_form', $view);
	}
	
	public function language($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension]['edit']) && $id){
			redirect('admin');
		}
		
		$row = $this->livetv->item($id);
		if($post = $this->input->post())
		{
			if(!$post['name_en']) {
				$view['msg'] = 'Vui lòng nhập tiêu đề';
			}
			else {
				$this->livetv->language($extension, $post, $id);
				redirect('admin/livetv/index/'. $extension);
			}
		}
		
		$view['row'] = empty($post) ? $row : (object) $post;
		$view['extension'] = $extension;
		
		$this->load->view('admin/header');
		$this->load->view('admin/livetv/livetv_lang', $view);
	}
	
	public function language_tream($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension]['edit']) && $id){
			redirect('admin');
		}
		
		$row = $this->livetv->item($id);
		if($post = $this->input->post())
		{
			if(!$post['name_en']) {
				$view['msg'] = 'Vui lòng nhập tiêu đề';
			}
			else {
				$this->livetv->language($extension, $post, $id);
				redirect('admin/livetv/livetv_tream/'. $extension);
			}
		}
		
		$view['row'] = empty($post) ? $row : (object) $post;
		$view['extension'] = $extension;
		
		$this->load->view('admin/header');
		$this->load->view('admin/livetv/livetv_tream_lang', $view);
	}

	public function delete($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension]['delete'])){
			redirect('admin');
		}
		
		if($id){
			$row = $this->livetv->item($id);
			@unlink('upload/'. $row->photo);			
			$this->livetv->delete($id);
		}
		redirect('admin/livetv/index/'. $extension);
	}

	public function copy($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension]['edit']) && $id){
			redirect('admin');
		}
		
		if($id){
			$this->livetv->copy($extension, $id);
		}
		redirect('admin/livetv/index/'. $extension);
	}
	
}