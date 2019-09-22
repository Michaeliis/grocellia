<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_grocellia');
        $this->load->model('m_order');
		$this->load->library('upload');
		$this->load->library('pdf');
		$this->load->library('excel');
        $this->load->library('session');
		$this->load->helper(array('form', 'url'));
        if(!isset($_SESSION['userId']) || $_SESSION['userPosition'] != 'Staff'){
            show_404();
        }
	}
    
    public function taken(){
        $data['transaction'] = $trans;
        $data['detail'] = $this->m_order->getTaken()->result();
        
        $this->load->view('header.php');
		$this->load->view('view_order',$data);
		$this->load->view('footer.php');
    }
    
    public function active($transId)
	{
        $trans = $this->m_order->getTransaction($transId)->result();
        foreach($trans as $transs){
            if($transs->staffId != $_SESSION['userId']){
            show_404();
            }
        }
        
		$data['transaction'] = $trans;
        $data['detail'] = $this->m_order->getTransactionDetail($transId)->result();
        
		$this->load->view('header.php');
		$this->load->view('view_order', $data);
		$this->load->view('footer.php');
	}

	
}