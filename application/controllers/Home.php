<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    const PATH_SOUND = '/home/hocthuan/public_html/upload/sound/';
    const PATH_ALPHABET = '/home/hocthuan/public_html/upload/sound/alphabet/';

    public function index()
    {
        $view['video_hot'] = $video_hot = $this->node->get_posts(array(
            'query'         => 'row',
            'extension'     => 'video',
            'status'        => 1,
            'hot'       => 1,
        ), 'home_video_hot');

        $ids = $this->node->get_posts(array(
            'query'         => 'array',
            'extension'     => 'category-video',
            'status'        => 1,
            'home'          => 1,
            'order_by'      => 'ordering ASC',
        ), 'category_video');

        $view['video'] = $this->node->get_posts(array(
            'query'         => 'result',
            'extension'     => 'video',
            'parent'        => $this->alphabet->flatten($ids),
            'status'        => 1,
            'not_id'        => $video_hot->id,
			'id_random'     => 'id',
			'limit'     => '10',
            'order_by'      => 'ordering ASC',
        ), 'home_video');

        $view['ad_left'] = $this->node->get_posts(array(
            'query'         => 'row',
            'extension'     => 'ad',
            'status'        => 1,
            'position'      => 'left',
        ), 'ad_left');

        $view['alphabet'] = $this->alphabet->get_posts(array(
            'query'         => 'result',
            'extension'     => 'category-alphabet',
            'status'        => 1,
            'id_random'     => 'id',
            'order_by'      => 'ordering ASC',
            'limit'         => 5,
        ), 'home_alphabet');

        $this->load->view('client/header');
        $this->load->view('client/home', $view);
        $this->load->view('client/footer');

    }

    public function error()
    {
        $header['metatitle'] = '404 Page Not Found!';
        $this->load->view('client/header', $header);
        $this->load->view('client/404');
        $this->load->view('client/footer');
    }

	public function getsound()
	{
		$id = $this->input->post('id');
		$item = $this->lessons->get_posts(array(
			'query'         => 'row',
			'extension'     => 'lessons',
			'status'        => 1,
			'id'         => $id,
		), 'lessons_item_sound_player_'. md5($id));
		$videoUrl = array(
			'videoUrl' => 'http://www.englishspeak.com/instantspeak/english/lessons/conversations/mp3/01.mp3"',
		);
		echo json_encode($videoUrl);exit;
	}

    public function test()
    {

        $file = "http://hocthuanhvan.com/upload/sound/individual/01/01_01.mp3";
        return $file;
        //readfile($file);

        //$file = "/home/hocthuan/public_html/upload/sound/individual/01/01_01.mp3";
        /*
        if(is_file($file)){

            //clearstatcache();


            $ext = explode('.', $file);
            switch($ext[1]) {
                case "mp4": $ctype="video/mp4"; break;
                case "mp3": $ctype="audio/x-mp3"; break;
            }

            $size   = filesize($file);
            $length = $size;
            $start  = 0;
            $end    = $size - 1;

            $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
            $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
            $this->output->set_header("Pragma: no-cache");
            $this->output->set_header("Expires: " . gmdate('D, d M Y H:i:s', time() + 60) . ' GMT');
            $this->output->set_header("Content-Description: File Transfer");
            $this->output->set_header("Content-Type:  $ctype");

            $this->output->set_header("Content-Name: Loi.Huynh");
            $this->output->set_header("Content-Version: 1.0");
            $this->output->set_header("Content-Vendor: Hocthuanhvan.com");

            $this->output->set_header("Content-Transfer-Encoding: binary");
            $this->output->set_header("Content-Range: bytes $start-$end/$size");
            $this->output->set_header("Content-Length: ".$length);

        }
        */

    }
    private function get_alphabet()
    {
        $object = new stdClass();

        $object->alphabet01 = 'iː';
        $object->alphabet02 = 'ɪ';
        $object->alphabet03 = 'ʊ';
        $object->alphabet04 = 'uː';
        $object->alphabet05 = 'e';
        $object->alphabet06 = 'ə';
        $object->alphabet07 = 'ɜː';
        $object->alphabet08 = 'ɔː';
        $object->alphabet09 = 'æ';
        $object->alphabet10 = 'ʌ';
        $object->alphabet11 = 'aː';
        $object->alphabet12 = 'ɒ';

        $object->alphabet13 = 'ɪə';
        $object->alphabet14 = 'eə';
        $object->alphabet15 = 'əʊ';
        $object->alphabet16 = 'aʊ';
        $object->alphabet17 = 'eɪ';
        $object->alphabet18 = 'aɪ';
        $object->alphabet19 = 'ɔɪ';

        $object->alphabet20 = 'p';
        $object->alphabet21 = 'f';
        $object->alphabet22 = 't';
        $object->alphabet23 = 'θ';
        $object->alphabet24 = 'tʃ';
        $object->alphabet25 = 's';
        $object->alphabet26 = 'ʃ';
        $object->alphabet27 = 'k';

        $object->alphabet28 = 'b';
        $object->alphabet29 = 'v';
        $object->alphabet30 = 'd';
        $object->alphabet31 = 'ð';
        $object->alphabet32 = 'dʒ';
        $object->alphabet33 = 'z';
        $object->alphabet34 = 'ʒ';
        $object->alphabet35 = 'g';

        $object->alphabet36 = 'h';
        $object->alphabet37 = 'm';
        $object->alphabet38 = 'n';
        $object->alphabet39 = 'ŋ';
        $object->alphabet40 = 'r';
        $object->alphabet41 = 'l';
        $object->alphabet42 = 'w';
        $object->alphabet43 = 'j';

        return $object;
    }

    private function in_object($value,$object) {
        if (is_object($object)) {
            foreach($object as $key => $item) {
                if ($value==$item) return true;
            }
        }
        return false;
    }

    public function alphabet()
    {
        if(!empty($_GET))
        {
            $t = $_GET['t'];
            $e = $_GET['e'];
            $et = explode('LE', $e);
            $id = $et[0];

            $alphabet = $this->get_alphabet();

            if ($this->in_object($alphabet->$id, $alphabet) == true)
            {
                $time = $id.'LE'.$et[1];
                $flag = false;
                if($e == $time){
                    $flag = true;
                }
                if($flag == true)
                {
                    $file = self::PATH_ALPHABET . $alphabet->$id . '.mp3';

                    if(is_file($file)){
                        //clearstatcache();
                        $ext = explode('.', $file);
                        switch($ext[1]) {
                            case "mp4": $ctype="video/mp4"; break;
                            case "mp3": $ctype="audio/x-mp3"; break;
                        }

                        header("pragma : no-cache");
                        header('Expires: ' . gmdate('D, d M Y H:i:s', time() + (60*60*24*45)) . ' GMT');
                        header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
                        header("Content-Description: File Transfer");
                        header("Content-Type:  $ctype");

                        header("Content-Name: Loi.Huynh");
                        header("Content-Version: 1.0");
                        header("Content-Vendor: Hocthuanhvan.com");

                        $size   = filesize($file); // File size
                        $length = $size;           // Content length
                        $start  = 0;               // Start byte
                        $end    = $size - 1;       // End byte

                        header("Content-Transfer-Encoding: binary");
                        header("Content-Range: bytes $start-$end/$size");
                        header("Content-Length: ".$length);
                        readfile($file);
                    }
                }
            }
        }

    }

    public function security()
    {
        // https://developer.jwplayer.com/jw-player/demos/basic/custom-error/

        if(!empty($_GET))
        {
            $t = $_GET['t'];
            $e = $_GET['e'];
            $type = $_GET['type'];
            $et = explode('LE', $e);
            $id = $et[0];

            $extension = ($type == 'lessons') ?  'category-lessons' : 'lessons';
            if($type == 'lessons' or $type == 'individual'):
                $item = $this->lessons->get_posts(array(
                    'query'         => 'row',
                    'extension'     => $extension,
                    'status'        => 1,
                    'id'         => $id,
                ), 'lessons_item_player_'. md5($id));
            endif;

            if(!empty($item))
            {
                $token = get_token($item->files_video, $et[1]);
                $time = $item->id.'LE'.$et[1];
                $flag = false;
                if($t == $token && $e == $time){
                    $flag = true;
                }
                if($flag == true)
                {
                    $file = self::PATH_SOUND . $type . '/' .$item->files_video;

                    if(is_file($file)){
                        //clearstatcache();
                        $ext = explode('.', $file);
                        switch($ext[1]) {
                            case "mp4": $ctype="video/mp4"; break;
                            case "mp3": $ctype="audio/x-mp3"; break;
                        }

                        header("pragma : no-cache");
                        header('Expires: ' . gmdate('D, d M Y H:i:s', time() + (60*60*24*45)) . ' GMT');
                        header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
                        header("Content-Description: File Transfer");
                        header("Content-Type:  $ctype");

                        header("Content-Name: Loi.Huynh");
                        header("Content-Version: 1.0");
                        header("Content-Vendor: Hocthuanhvan.com");

                        $size   = filesize($file); // File size
                        $length = $size;           // Content length
                        $start  = 0;               // Start byte
                        $end    = $size - 1;       // End byte

                        header("Content-Transfer-Encoding: binary");
                        header("Content-Range: bytes $start-$end/$size");
                        header("Content-Length: ".$length);
                        readfile($file);
                    }
                }
            }
        }

    }

    // http://dtbaker.net/web-development/how-to-cache-images-generated-by-php/
    //https://nielse63.github.io/php-image-cache/
    //https://github.com/joaquinmarti/CodeIgniter-Image-Cache/blob/master/models/image_model.php

    public function image($w = '274', $h = '163')
    {
        $name = $this->input->get('f');

        $this->image_moo
            ->load($name)
            ->set_jpeg_quality(100)
            //->resize($w, $h, 1)
            ->resize_crop($w, $h)
            ->save_dynamic();
    }

    public function captcha()
    {
        if (!$captcha_config = $this->session->userdata('captcha_config'))
            return;

        $captcha_config = unserialize($captcha_config);
        $this->session->unset_userdata('captcha_config');

        // Use milliseconds instead of seconds
        srand(microtime() * 100);

        // Pick random background, get info, and start captcha
        $background = $captcha_config['png_backgrounds'][rand(0, count($captcha_config['png_backgrounds']) -1)];
        list($bg_width, $bg_height, $bg_type, $bg_attr) = getimagesize($background);

        // Create captcha object
        $captcha = imagecreatefrompng($background);
        imagealphablending($captcha, true);
        imagesavealpha($captcha , true);

        $color = $this->captcha->hex2rgb($captcha_config['color']);
        $color = imagecolorallocate($captcha, $color['r'], $color['g'], $color['b']);

        // Determine text angle
        $angle = rand( $captcha_config['angle_min'], $captcha_config['angle_max'] ) * (rand(0, 1) == 1 ? -1 : 1);

        // Select font randomly
        $font = $captcha_config['fonts'][rand(0, count($captcha_config['fonts']) - 1)];

        // Verify font file exists
        if( !file_exists($font) ) throw new Exception('Font file not found: ' . $font);

        //Set the font size.
        $font_size = rand($captcha_config['min_font_size'], $captcha_config['max_font_size']);
        $text_box_size = imagettfbbox($font_size, $angle, $font, $captcha_config['code']);

        // Determine text position
        $box_width = abs($text_box_size[6] - $text_box_size[2]);
        $box_height = abs($text_box_size[5] - $text_box_size[1]);
        $text_pos_x_min = 0;
        $text_pos_x_max = ($bg_width) - ($box_width);
        $text_pos_x = rand($text_pos_x_min, $text_pos_x_max);
        $text_pos_y_min = $box_height;
        $text_pos_y_max = ($bg_height) - ($box_height / 2);
        $text_pos_y = rand($text_pos_y_min, $text_pos_y_max);

        // Draw shadow
        if( $captcha_config['shadow'] ){
            $shadow_color = $this->captcha->hex2rgb($captcha_config['shadow_color']);
            $shadow_color = imagecolorallocate($captcha, $shadow_color['r'], $shadow_color['g'], $shadow_color['b']);
            imagettftext($captcha, $font_size, $angle, $text_pos_x + $captcha_config['shadow_offset_x'], $text_pos_y + $captcha_config['shadow_offset_y'], $shadow_color, $font, $captcha_config['code']);
        }

        // Draw text
        imagettftext($captcha, $font_size, $angle, $text_pos_x, $text_pos_y, $color, $font, $captcha_config['code']);

        // Output image
        header("Content-type: image/png");
        imagepng($captcha);
    }

}
