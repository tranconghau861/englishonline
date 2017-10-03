<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noun extends CI_Controller {
	
	function recurse_copy($src, $dst, $idAdmin) {
		$dir = opendir($src);
		@mkdir($dst);
		while(false !== ( $file = readdir($dir)) ) {
			if (( $file != '.' ) && ( $file != '..' )) 
			{				
				$namefile = explode(".", $file);				
				$data = array(
					'title'             => $namefile[0],
					'files_video'       => $file,
					'parent'            => 14,
					'id_type'           => 2,
					'status'            => 1,
					'extension'         => 'noun'
				);				
				$data['created'] = date('Y-m-d H:i:s');
				$data['uid'] = $idAdmin;				
				$this->db->insert('noun', $data);
				$id = $this->db->insert_id();
				if($id > 0){
					$alias = url_title(convert_accented_characters($namefile[0]), 'dash', true);
					$this->db->update('noun', array('alias' => $alias .'-'. $id), array('id' => $id));
					if ( is_dir($src . '/' . $file) ) {
						$result =  copy($src . '/' . $file, $dst . '/' . $file);
					}
					else {
						$result =  copy($src . '/' . $file, $dst . '/' . $file);
					}				
					if($result){
						unlink($src . '/' . $file); 
					}
				}				
			}
		}
		closedir($dir);		
	} 
	
	public function index($extension = '', $offset = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension])){
			redirect('admin');
		}
		
		$path = '/home/hocthuan/public_html/upload/sound/filesdemo10';
		$path_file = '/home/hocthuan/public_html/upload/sound/words';
		
		// import data
		//$this->recurse_copy($path, $path_file, $admin['id']);
		
		$post = $this->input->post();
		if($post  &&  isset($admin['params'][$extension]['delete']))
		{
			foreach($post['id'] as $id)
			{
				$row = $this->noun->item($id);
				$file = 'upload/'. $row->photo;
				
				if($row->photo  &&  file_exists($file))
				{
					unlink($file);
					
					// upload ftp
					$connect = $this->ftp->connect();
					if($connect)
					{
						$this->ftp->delete_file('/upload/'. $row->photo);
						$this->ftp->close();
					}
				}
				
				$gallery = unserialize($row->gallery);
				if($gallery)
				{
					foreach($gallery as $g)
					{
						$gfile = 'upload/'. $g;
						
						if($g  &&  file_exists($gfile))
						{
							unlink($gfile);
							
							// upload ftp
							$connect = $this->ftp->connect();
							if($connect)
							{
								$this->ftp->delete_file('/upload/'. $g);
								$this->ftp->close();
							}
						}
					}
				}
				
				$this->noun->delete($id);
			}
			redirect('admin/noun/index/'. $extension);
		}
		
		$uid = $admin['gid'] > 3 ? '' : $admin['id'];
		$limit = 50;
		
		$view['s'] = $s = $this->input->get('s');
		$view['cid'] = $cid = $this->input->get('cid');
		$view['date_from'] = $date_from = $this->input->get('date_from');
		$view['date_to'] = $date_to = $this->input->get('date_to');
		
		if((int) $date_from){			
			$date_from_exp = explode('/', $date_from);
			$date_from = $date_from_exp[2] .'-'. $date_from_exp[1] .'-'. $date_from_exp[0];
		}
		
		if((int) $date_to){
			$date_to_exp = explode('/', $date_to);
			$date_to = $date_to_exp[2] .'-'. $date_to_exp[1] .'-'. $date_to_exp[0];
		}
		
		$view['rows'] = $this->noun->items($extension, $offset, $limit, $s, $cid, $date_from, $date_to);
		$view['total'] = $total = $this->noun->total($extension, $s, $cid, $date_from, $date_to);
		
		$view['admin'] = $admin;
		$view['extension'] = $extension;
		$view['islang'] = 1;
		$view['modlang'] = array('category-video', 'video', 'video-item', 'category-news', 'news', 'category-relax', 'relax', 'relax-item', 'about', 'career', 'notice', 'banner');
		$view['category'] = $this->noun->parent('category-'. $extension);
		
		$this->pagination->initialize(array(
			'base_url' 		=> site_url('admin/noun/index/'. $extension),
			'total_rows' 	=> $total,
			'per_page' 		=> $limit,
		));
		$view['pagination'] = $this->pagination->create_links();
		
		$this->load->view('admin/header');
		$this->load->view('admin/noun/noun_list', $view);
	}

	public function form($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension]['add'])  ||  (!isset($admin['params'][$extension]['edit']) && $id)){
			redirect('admin');
		}
		
		$row = $this->noun->item($id);
		if($post = $this->input->post())
		{
			if(!$post['title']) {
				$view['msg'] = 'Vui lòng nhập tiêu đề';
			}
			else {
				
				$this->mp_cache->delete_group('cache.noun_');
				
				$this->noun->save($extension, $post, $id);
				redirect('admin/noun/index/'. $extension);
			}
		}
		
		$view['row'] = empty($post) ? $row : (object) $post;
		$view['extension'] = $extension;
		
		$this->load->view('admin/header');
		$this->load->view('admin/noun/noun_form', $view);
	}

	public function language($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension]['edit']) && $id){
			redirect('admin');
		}
		
		$row = $this->noun->item($id);
		if($post = $this->input->post())
		{
			if(!$post['title_en']) {
				$view['msg'] = 'Vui lòng nhập tiêu đề';
			}
			else {
				$this->noun->language($extension, $post, $id);
				redirect('admin/noun/index/'. $extension);
			}
		}
		
		$view['row'] = empty($post) ? $row : (object) $post;
		$view['extension'] = $extension;
		
		$this->load->view('admin/header');
		$this->load->view('admin/noun/noun_lang', $view);
	}

	public function delete($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension]['delete'])){
			redirect('admin');
		}
		
		if($id) {
			$row = $this->noun->item($id);
			$file = 'upload/'. $row->photo;
			
			if($row->photo && file_exists($file))
			{
				unlink($file);
				
				// upload ftp
				$connect = $this->ftp->connect();
				if($connect)
				{
					$this->ftp->delete_file('/upload/'. $row->photo);
					$this->ftp->close();
				}
			}
			
			$gallery = unserialize($row->gallery);
			if($gallery)
			{
				foreach($gallery as $g)
				{
					$gfile = 'upload/'. $g;
					
					if($g && file_exists($gfile))
					{
						unlink($gfile);
						
						// upload ftp
						$connect = $this->ftp->connect();
						if($connect)
						{
							$this->ftp->delete_file('/upload/'. $g);
							$this->ftp->close();
						}
					}
				}
			}
    
			$this->noun->delete($id);
		}
		redirect('admin/noun/index/'. $extension);
	}

	public function copy($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension]['edit']) && $id){
			redirect('admin');
		}
		
		if($id){
			$this->noun->copy($extension, $id);
		}
		redirect('admin/noun/index/'. $extension);
	}
	
	public function status($extension = '', $id = 0, $status = '')
	{	
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension]['edit']) && $id){
			redirect('admin');
		}
		
		$this->noun->status($extension, $id, $status);
		redirect('admin/noun/index/'. $extension);
	}

	public function filter()
	{
		if($post = $this->input->post())
		{
			if($post['title']){
				$where[] = 'title LIKE "%'. $post['title'] .'%"';
			}
			
			$rows = $this->noun->get_posts(array(
				'query' 		=> 'result',
				'extension' 	=> 'news',
				'status' 		=> 1,
				'where' 		=> implode(' AND ', $where),
				'limit'			=> 20,
			));
			
			if($rows){
				$html = '';
				foreach($rows as $row)
				{
					$html .= '<div class="checkbox"><label><input type="checkbox" value="'. $row->id .'" name="fields[related]['. $row->id .']"> '. $row->title .'</label></div>';
				}
					
				$json = array('html' => $html, 'res' => 1);
			}
			else{
				$json = array('html' => '', 'res' => 0);
			}
			echo json_encode($json);
		}
		else{
			redirect();
		}
	}
	
}