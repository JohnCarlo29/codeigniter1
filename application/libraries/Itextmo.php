<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Itextmo{
	private $ci;
	private $apiCode;

	public function __construct(){
		$this->ci =& get_instance();
		$this->apicode = 'TR-JCADV651294_M3P3B';
	}

	public function send_sms($number, $message){
		$url = 'https://www.itexmo.com/php_api/api.php';
		$itexmo = array('1' => $number, '2' => $message, '3' => $this->apicode);
		$param = array(
		    'http' => array(
		        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        'method'  => 'POST',
		        'content' => http_build_query($itexmo),
		    ),
		);
		$context  = stream_context_create($param);
		return file_get_contents($url, false, $context);
	}
}