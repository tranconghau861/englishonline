<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function extensions($key = '')
{
	$data = array(
        'categorys-newss' 	=> 'Categorys News',
        'newss' 			=> 'News',
        'category' 	        => 'Category',
        'tags' 			    => 'Tags',
	);

	return $key ? $data[$key] : $data;
}

function translate($vietnam = '', $english = ''){
	$CI =& get_instance();
     	
	$lang = $CI->config->item('language_abbr');
	
	if($lang == 'vi'){
		return $vietnam ? $vietnam : $english;
	}
	else{
		return $english ? $english : $vietnam;
	}
}

function get_image_link($name = '')
{
	if($name)
	{
		return base_url($name);
	}
	else{
		return base_url('upload/learn-english.jpg');
	}
}

function image_link($name = '', $width = '', $height = '')
{
	if($name)
	{
		$w = $width ? $width .'/' : '';
		$h = $height ? $height .'/' : '';
		return site_url('home/image/'. $w . $h .'?f='. $name);
	}
	else{
		return base_url('upload/learn-english.jpg');
	}
}

function array_to_csv($array, $download = "")
{
	if ($download != "") {	
		header('Content-Type: application/csv');
		header('Content-Disposition: attachement; filename="' . $download . '"');
	}		

	ob_start();
	$f = fopen('php://output', 'w') or show_error("Can't open php://output");
	$n = 0;		
	foreach ($array as $line) {
		$n++;
		if ( ! fputcsv($f, $line)) {
			show_error("Can't write line $n: $line");
		}
	}
	fclose($f) or show_error("Can't close php://output");
	$str = ob_get_contents();
	$str = chr(255).chr(254).mb_convert_encoding($str, "UTF-16LE", "UTF-8");
	ob_end_clean();

	if ($download == "") {
		return $str;	
	}
	else {	
		echo $str;
	}		
}

function query_to_csv($query, $headers = TRUE, $download = "")
{
	if ( ! is_object($query) OR ! method_exists($query, 'list_fields')) {
		show_error('invalid query');
	}
	
	$array = array();
	
	if ($headers) {
		$line = array();
		foreach ($query->list_fields() as $name) {
			$line[] = $name;
		}
		$array[] = $line;
	}
	
	foreach ($query->result_array() as $row) {
		$line = array();
		foreach ($row as $item) {
			$line[] = $item;
		}
		$array[] = $line;
	}

	echo array_to_csv($array, $download);
}

function week_number($date = 'today') 
{
	return ceil( date( 'j', strtotime( $date ) ) / 7 ); 
}

function fb_count($url = '')
{
	if($url)
	{
		$content = file_get_contents('https://api.facebook.com/method/links.getStats?urls='. $url .'&format=json');
		
		$data = json_decode($content);
		
		if($data){
			return $data[0];
		}
	}
}


function vtv()
{
	$html = file_get_html('http://vtv.vn/');
	
	$data = array();
	$data['mua'] = $html->find('.gold b', 0)->plaintext;
	$data['ban'] = $html->find('.gold b', 1)->plaintext;
	foreach($html->find('.weather') as $article)
	{
	    $data['hanoi'] = array(
	    	'name' => $article->find('li', 0)->find('b', 0)->plaintext,
	    	'temp' => $article->find('li', 0)->find('.temp', 0)->plaintext,
	    	'status' => $article->find('li', 0)->find('.status', 0)->plaintext
	    );
	    $data['danang'] = array(
	    	'name' => $article->find('li', 1)->find('b', 0)->plaintext,
	    	'temp' => $article->find('li', 1)->find('.temp', 0)->plaintext,
	    	'status' => $article->find('li', 1)->find('.status', 0)->plaintext
	    );
	    $data['hochiminh'] = array(
	    	'name' => $article->find('li', 2)->find('b', 0)->plaintext,
	    	'temp' => $article->find('li', 2)->find('.temp', 0)->plaintext,
	    	'status' => $article->find('li', 2)->find('.status', 0)->plaintext
	    );
	}
	return $data;
}


function weather()
{
	$CI =& get_instance();
	$key = 'weather';
	/*
	if ($CI->cache->memcached->is_supported())
	{
		$timeout = 24 * 60 * 60;
		$key = 'cache.'. $key;
		$rows = $CI->cache->memcached->get($key);
		if ( empty($rows) )
		{
			$rows = vtv();
			$CI->cache->memcached->save($key, $rows, $timeout);
		}
	}
	else {
		$rows = vtv();
	}
	*/
	$rows = vtv();
	
	return $rows;
}


function token($id_lesson, $filename)
{
	$t = time() + 60; 			
	$token = get_token($filename, $t);
	return "?t=".$token."&e=".$id_lesson.'LE'.$t;
}

function get_token($filename, $t)
{
	$hostname = "hocthuanhvan.com";
	$pass = "23112015";  
	$ip = check_ip_client();
	return md5("$hostname:$filename:$ip:$t:$pass");
}

function check_ip_client()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}
