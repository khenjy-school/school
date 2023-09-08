<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class General extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Pengaturan_mdl');
		$this->load->helper('url');
	}
}
