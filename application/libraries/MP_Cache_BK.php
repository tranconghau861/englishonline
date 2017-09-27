<?php
/**
 * Created by Loi.Huynh.
 * User: User
 * Date: 11/10/2016
 * Time: 12:58 PM
 * link: https://github.com/bcit-ci/CodeIgniter/wiki/MP-Cache%3a-Simple-flexible-Caching-of-parts-of-code
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

class MP_Cache
{
    var $ci;
    var $path;

    function MP_Cache()
    {
        $this->ci = & get_instance();
        $this->path = $this->ci->config->item('mp_cache_dir');
        if ($this->path == '') return false;
    }

    function get($filename, $use_expires = true)
    {
        $cache_path = $this->path;        

        if ( ! is_dir($cache_path) OR ! is_really_writable($cache_path))
        {            
            return FALSE;
        }
        
        // Build the file path.
        $filepath = $cache_path.$filename.'.cache';

        if ( ! @file_exists($filepath))
        {
            return FALSE;
        }

        if ( ! $fp = @fopen ($filepath, 'r'))
        {   
            return FALSE;
        }
               
        flock($fp, LOCK_SH);
        
        $cache = '';
        if (filesize($filepath) > 0)
        {
            $cache = unserialize(fread($fp, filesize($filepath)));            
        }
        else
        {
            $cache = NULL;
        }        

        flock($fp, LOCK_UN);
        fclose($fp);
       
        // Return the cache
        log_message('debug', "MP_Cache retrieved: ".$filename);
               
        return $cache;
    }

    function write($values, $filename, $expires = 0)
    {
        $cache_path = $this->path;

        if ( ! is_dir($cache_path) OR ! is_really_writable($cache_path))
        {
            return;
        }

        // check if filename contains dirs
        $subdirs = explode('/', $filename);
        if (count($subdirs) > 1)
        {
            array_pop($subdirs);
            $test_path = $cache_path.implode('/', $subdirs);

            // check if specified subdir exists
            if ( ! @file_exists($test_path))
            {
                // create non existing dirs, asumes PHP5
                if ( ! @mkdir($test_path)) return false;
            }
        }

        $cache_path .= $filename.'.cache';

        if ( ! $fp = @fopen($cache_path, FOPEN_WRITE_CREATE_DESTRUCTIVE))
        {
            log_message('error', "Unable to write MP_cache file: ".$cache_path);
            return;
        }

        // Add expires variable if its set
        if ($expires > 0)
            $values['mp_cache_expires_time'] = time() + $expires;

        if (flock($fp, LOCK_EX))
        {
            fwrite($fp, serialize($values));
            flock($fp, LOCK_UN);
        }
        else
        {
            log_message('error', "MP_Cache was unable to secure a file lock for file at: ".$cache_path);
            return;
        }
        fclose($fp);
        @chmod($cache_path, 777);

        log_message('debug', "MP_Cache file written: ".$cache_path);
    }

    function delete($filename)
    {
        $file_path = $this->path.$filename.'.cache';

        if (file_exists($file_path)) unlink($file_path);
    }

    function delete_all($dirname)
    {
        if (empty($this->path)) return false;

        $this->ci->load->helper('file');
        if (file_exists($this->path.$dirname)) delete_files($this->path.$dirname, TRUE);
    }


}