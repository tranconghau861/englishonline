<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livevideo extends CI_Controller {

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
				$row = $this->live_radio->item($id);
				@unlink('upload/'. $row->photo);
				
				$this->live_radio->delete($id);
			}
			redirect('admin/livevideo/index/'. $extension);
		}
		
		$uid = $admin['gid'] > 3 ? '' : $admin['id'];
		$limit = 50;
		
		$view['s'] = $s = $this->input->get('s');
		$view['cid'] = $cid = $this->input->get('cid');
		$view['rows'] = $this->live_radio->items($extension, $offset, $limit, $s, $cid);
		$view['total'] = $total = $this->live_radio->total($extension, $s, $cid);
		
		
		$view['extension'] = $extension;
		$view['islang'] = 1;
		$view['modlang'] = array('live_radio', $extension);
		
		$this->pagination->initialize(array(
			'base_url' 		=> site_url('admin/livevideo/index/'. $extension),
			'total_rows' 	=> $total,
			'per_page' 		=> $limit,
		));
		$view['pagination'] = $this->pagination->create_links();
		
		$this->load->view('admin/header');
		$this->load->view('admin/liveradio/liveradio_list', $view);
	}
	

	public function form($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension]['add'])  ||  (!isset($admin['params'][$extension]['edit']) && $id)){
			redirect('admin');
		}
		
		$row = $this->live_radio->item($id);
		
		if($post = $this->input->post())
		{			
			
			$exist = $this->live_radio->check_alias($id, @$post['alias']);
			
			if(!$post['name']) {
				$view['msg'] = 'Vui lòng nhập tiêu đề';
			}
			else if(@$post['alias'] && $exist) {
				$view['msg'] = 'SEO Url đã có!';
			}
			else {
				$this->live_radio->save($extension, $post, $id);
				redirect('admin/livevideo/index/'. $extension);
			}
		}
		
		$view['row'] = empty($post) ? $row : (object) $post;
		
		$view['extension'] = $extension;
		
		$view['ext'] = ($extension=='radiovideo') ? 'radio' : 'video';
				
		$this->load->view('admin/header');
		$this->load->view('admin/liveradio/liveradio_form', $view);
	}
	
	
	public function language($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension]['edit']) && $id){
			redirect('admin');
		}
		
		$row = $this->live_radio->item($id);
		if($post = $this->input->post())
		{
			if(!$post['name_en']) {
				$view['msg'] = 'Vui lòng nhập tiêu đề';
			}
			else {
				$this->live_radio->language($extension, $post, $id);
				redirect('admin/livevideo/index/'. $extension);
			}
		}
		
		$view['row'] = empty($post) ? $row : (object) $post;
		$view['extension'] = $extension;
		
		$this->load->view('admin/header');
		$this->load->view('admin/liveradio/liveradio_lang', $view);
	}
	
	public function delete($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension]['delete'])){
			redirect('admin');
		}
		
		if($id){
			$row = $this->live_radio->item($id);
			@unlink('upload/'. $row->photo);			
			$this->live_radio->delete($id);
		}
		redirect('admin/livevideo/index/'. $extension);
	}

	public function copy($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension]['edit']) && $id){
			redirect('admin');
		}
		
		if($id){
			$this->live_radio->copy($extension, $id);
		}
		redirect('admin/livevideo/index/'. $extension);
	}
	
	
}