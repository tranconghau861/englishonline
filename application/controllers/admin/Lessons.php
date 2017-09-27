<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lessons extends CI_Controller {

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
				$row = $this->lessons->item($id);
				$file = 'upload/'. $row->photo;

				if($row->photo  &&  file_exists($file))
				{
					unlink($file);
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

				$this->lessons->delete($id);
			}
			redirect('admin/lessons/index/'. $extension);
		}

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

		$view['rows'] = $this->lessons->items($extension, $offset, $limit, $s, $cid, $date_from, $date_to);
		$view['total'] = $total = $this->lessons->total($extension, $s, $cid, $date_from, $date_to);

		$view['admin'] = $admin;
		$view['extension'] = $extension;
		$view['islang'] = 1;
		$view['modlang'] = array('category-video', 'video', 'video-item', 'category-news', 'news', 'category-relax', 'relax', 'relax-item', 'about', 'career', 'notice', 'banner');
		$view['category'] = $this->lessons->parent('category-'. $extension);

		$this->pagination->initialize(array(
			'base_url' 		=> site_url('admin/lessons/index/'. $extension),
			'total_rows' 	=> $total,
			'per_page' 		=> $limit,
		));
		$view['pagination'] = $this->pagination->create_links();

		$this->load->view('admin/header');
		$this->load->view('admin/lessons/lessons_list', $view);
	}

	public function form($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension]['add'])  ||  (!isset($admin['params'][$extension]['edit']) && $id)){
			redirect('admin');
		}

		$row = $this->lessons->item($id);
		if($post = $this->input->post())
		{
			if( !$post['title'] && $extension == 'category-lessons') {
				$view['msg'] = 'Please enter title';
			}else if( !$post['content'] && $extension == 'lessons') {
				$view['msg'] = 'Please enter content';
			}
			else {

				$this->mp_cache->delete_group('cache.lessons_');

				$this->lessons->save($extension, $post, $id);
				redirect('admin/lessons/index/'. $extension);
			}
		}

		$view['row'] = empty($post) ? $row : (object) $post;
		$view['extension'] = $extension;

		$this->load->view('admin/header');
		$this->load->view('admin/lessons/lessons_form', $view);
	}

	public function language($extension = '', $id = 0)
	{
//        $this->load->model('lessons_model', 'lessons');
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension]['edit']) && $id){
			redirect('admin');
		}

		$row = $this->lessons->item($id);
		if($post = $this->input->post())
		{
			if(!$post['title_en']) {
				$view['msg'] = 'Vui lòng nhập tiêu đề';
			}
			else {
				$this->lessons->language($extension, $post, $id);
				redirect('admin/lessons/index/'. $extension);
			}
		}

		$view['row'] = empty($post) ? $row : (object) $post;
		$view['extension'] = $extension;

		$this->load->view('admin/header');
		$this->load->view('admin/lessons/lessons_lang', $view);
	}

	public function delete($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension]['delete'])){
			redirect('admin');
		}

		if($id) {
			$row = $this->lessons->item($id);
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

			$this->lessons->delete($id);
		}
		redirect('admin/lessons/index/'. $extension);
	}

	public function copy($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension]['edit']) && $id){
			redirect('admin');
		}

		if($id){
			$this->lessons->copy($extension, $id);
		}
		redirect('admin/lessons/index/'. $extension);
	}

	public function status($extension = '', $id = 0, $status = '')
	{
		$admin = $this->session->admin;
		if(!isset($admin['params'][$extension]['edit']) && $id){
			redirect('admin');
		}

		$this->lessons->status($extension, $id, $status);
		redirect('admin/lessons/index/'. $extension);
	}

	public function filter()
	{
		if($post = $this->input->post())
		{
			if($post['title']){
				$where[] = 'title LIKE "%'. $post['title'] .'%"';
			}

			$rows = $this->lessons->get_posts(array(
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