<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
| ------------------------------------------------------------------- 
| EMAIL CONFING 
| ------------------------------------------------------------------- 
| Configuration of outgoing mail server. 
|
*/

$config['mailtype'] 	= "html"; // text or html
$config['newline'] 		= "\r\n";
$config['crlf'] 		= "\r\n";


$config['smtp_host'] 	= "";
$config['smtp_user'] 	= "";
$config['smtp_pass'] 	= "";
$config['smtp_port'] 	= "";
$config['smtp_crypto'] 	= ""; // tls or ssl