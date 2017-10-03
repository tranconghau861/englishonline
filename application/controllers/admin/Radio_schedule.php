<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Radio_schedule extends CI_Controller {

	public function index($extension = '', $offset = 0)
	{
		
		$admin = $this->session->admin;
		if(empty($admin)){
			redirect('admin');
		}
		
		if($post = $this->input->post())
		{
			foreach($post['id'] as $id)
			{
				
				$this->livevideo_schedule->delete($id);
			}
			redirect('admin/radio_schedule/index/'. $extension);
		}
		
		$uid = $admin['gid'] > 3 ? '' : $admin['id'];
		$limit = 50;
		
		$view['s'] = $s = $this->input->get('s');
		$view['cid'] = $cid = $this->input->get('cid');
		$view['rows'] = $this->livevideo_schedule->items($extension, $offset, $limit);
		$view['total'] = $total = $this->livevideo_schedule->total($extension, $s, $cid);
		
		$view['extension'] = $extension;
		$view['islang'] = 1;
				
		$this->pagination->initialize(array(
			'base_url' 		=> site_url('admin/radio_schedule/index/'. $extension),
			'total_rows' 	=> $total,
			'per_page' 		=> $limit,
		));
		$view['pagination'] = $this->pagination->create_links();
		
		$this->load->view('admin/header');
		$this->load->view('admin/radio_schedule/radio_schedule_list', $view);
	}
	public function import($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(empty($admin)){
			redirect('admin');
		}
		
		$row = $this->livevideo_schedule->item($id);
		if($post = $this->input->post())
		{				
			include_once ( APPPATH."libraries/excel_reader2.php");
		
			$file = base_url('upload/'. $post['photo']);
		
			$data 	 					= new Spreadsheet_Excel_Reader( $file,true,"UTF-8"); 			
			$rowsnum 					= $data->rowcount($sheet_index=0); // lay so hang cua sheet
			$colsnum 					=  $data->colcount($sheet_index=0); // lay so cot cua sheet
			$time1						=	 0 ;
			$callprice['schedule_date'] = $callprice['code']= $callprice['schedule']= $callprice['program'] =$callprice['content']= '';

			$objSchedule = array();

			for ($i=6; $i<=$rowsnum; $i++){			
				$schedule_date  = trim($data->val($i,1));
				
				$time_livetv					= trim(@$data->val($i,7))==''?trim(@$data->val($i,3)):trim(@$data->val($i,7));	
				
				$code						= trim(@$data->val($i,2))==''?'': trim(@$data->val($i,2));			
				$program					= trim(@$data->val($i,4))==''?'': trim(@$data->val($i,4));
				
				$duration				 	= trim(@$data->val($i,6));	
				//$time_vod					= trim(@$data->val($i,7))==''?trim(@$data->val($i,3)):trim(@$data->val($i,7));	
				//$error						= (@$data->val($i,8))==''?'':trim(@$data->val($i,8));
				
				//$content = trim(@$data->val($i,3)).' || '.$program.' || '. $duration.' || '. $time_vod.' || '.$error;
				
				$content = trim(@$data->val($i,3)).' || '.$program.' || '.$duration;
				
				if(!empty($time_livetv) && !empty($program)){
					$obj = array(
							'schedule_date' =>$schedule_date,
							'code' =>$code,
							'time_livetv' =>$time_livetv,
							'program' =>$content
						);
					array_push($objSchedule, $obj);
				}
			}
			if(empty($objSchedule))
				redirect('admin/livetv_schedule/index/'. $extension);
		
			$obj1 = array();
			$name1 = '';
			$date1 = '';

			foreach($objSchedule as $key=>$value)
			{
				if (!empty($value['code']) && !empty($value['schedule_date'])) {
					$obj1[$value['code']][$value['schedule_date']][] = $value;
					$name1 = $value['code'];
					$date1 = $value['schedule_date'];
				} else {
					$obj1[$name1][$date1][] = $value;
				}
			}
			$obj2 = array();

			foreach($obj1 as $key=>$info)
			{				
				$schedule_date = array();	
				foreach($info as $keys=>$value)
				{		
					$content = array();
					foreach($value as $infos)
					{					
						array_push($content, $infos['program']);
					}				
					$schedule_date[] = array(
						'schedule_date' =>date('Y-m-d', strtotime($keys)),
						'time_program' =>implode(" || ; ", $content)
					);					
				}			
				$obj2[] = array(
					'schedule_date' =>$schedule_date,
					'code' =>$key								
				);			
			}			
			
			$this->livetv_schedule->save_import($extension, $obj2, $id);
			
			redirect('admin/livetv_schedule/index/'. $extension);
		}
		
		$view['row'] = empty($post) ? $row : (object) $post;
		$view['extension'] = $extension;
		$view['category'] = $this->livetv->items('livetv');
		$this->load->view('admin/header');
		$this->load->view('admin/livetv_schedule/import_schedule_form', $view);
	}
	public function form($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(empty($admin)){
			redirect('admin');
		}
		
		$row = $this->livevideo_schedule->item($id);		
		
		if($post = $this->input->post())
		{				
			if(!empty($post['hd_player_lst']) && !empty($post['schedule_date']))
			 {
				$flat = 0;
			
				if($id==0){
					$lrow = $this->livevideo_schedule->getDateExits($extension, $post['schedule_date']);
					
					if($lrow->id >0){
						
						$flat = 1;
					}
					
				}
				if($flat == 1){
					
					$view['msg'] = 'Lịch phát sóng của ngày đã tồn tại.';
			
				}else{
					
					$this->livevideo_schedule->save($extension, $post, $id);
				
					redirect('admin/'.$extension.'/index/'. $extension);
				
				}
				
			}
			if(empty($post['hd_player_lst']) && empty($post['schedule_date'])) 
			{
				$view['msg'] = 'Vui lòng đầy đủ thông tin.';
			
			}else{
				
				
				if(empty($post['hd_player_lst'])){
					
					$view['msg'] = 'Vui lòng nhập nội dung kênh.';
					
				}
				
				if(empty($post['schedule_date'])){
					
					$view['msg'] = 'Vui lòng chọn ngày phát sóng.';
					
				}
				
				
			}
			
		}
		
		$view['row'] = empty($post) ? $row : (object) $post;
				
		$view['extension'] = $extension;
		
		$this->load->view('admin/header');
		$this->load->view('admin/'.$extension.'/'.$extension.'_form', $view);
	}
	
	public function getschedule()
	{		
		$post = $this->input->post();
				
		$view['schedule'] = $this->livevideo_schedule->get_posts(
			array(				
				'schedule_date' => $post['date'],
				'extension' => $post['extension']
			),''
		);
		
				
		echo $this->load->view('admin/livevideo_schedule/view_schedule', $view, TRUE);
	}

	public function language($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(empty($admin)){
			redirect('admin');
		}
		
		$row = $this->livevideo_schedule->item($id);
		if($post = $this->input->post())
		{
			$this->livevideo_schedule->language($extension, $post, $id);
			redirect('admin/'.$extension.'/index/'. $extension);
		}
		
		$view['row'] = empty($post) ? $row : (object) $post;
		$view['extension'] = $extension;
		
		$this->load->view('admin/header');
		$this->load->view('admin/'.$extension.'/'.$extension.'_lang', $view);
	}

	public function delete($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(empty($admin)){
			redirect('admin');
		}
		
		if($id){						
			$this->livevideo_schedule->delete($id);
		}
		redirect('admin/livevideo_schedule/index/'. $extension);
	}

	public function copy($extension = '', $id = 0)
	{
		$admin = $this->session->admin;
		if(empty($admin)){
			redirect('admin');
		}
		
		if($id){
			$this->livevideo_schedule->copy($extension, $id);
		}
		redirect('admin/livevideo_schedule/index/'. $extension);
	}
	
	
}