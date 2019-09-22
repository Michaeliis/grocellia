<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
    
    public function place($link){
        $this->load->view('header_admin.php');
		$this->load->view($link);
        $this->load->view('footer_admin');
    }

	public function index()
	{
        $this->load->view('header_admin.php');
		$this->load->view('admin');
        $this->load->view('footer_admin');
	}
}