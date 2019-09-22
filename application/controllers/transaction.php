<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		$this->load->model('m_grocellia');
        $this->load->model('m_grocery');
        $this->load->model('m_transaction');
		$this->load->library('upload');
		$this->load->library('pdf');
		$this->load->library('excel');
		$this->load->helper(array('form', 'url'));
        $this->load->library('session');
        if(!isset($_SESSION['userId']) || $_SESSION['userPosition'] != 'Staff'){
            show_404();
        }
	}
    
    public function takeTransaction($transId){
        $where = array('transId' => $transId,
                      'transStatus' => '2');
        $data = array('staffId' => $_SESSION['userId']);
        $this->m_grocellia->update_data($where, $data, 'transactionn');
        
        redirect(base_url(). 'transaction/page/1');
    }
    
    public function page($pageNum)
	{
		$result = $this->m_transaction->selectTransaction()->result();
        $page = count($result);
		$data['transaction'] = $this->m_transaction->selectedTransaction($pageNum)->result();
        $data['page'] = $pageNum;
        $data['pageTotal'] = ceil($page / 15);
        $this->load->view('header_admin.php');
		$this->load->view('view_transaction_history', $data);
        $this->load->view('footer_admin');
	}
    
    public function taken($pageNum)
	{
		$result = $this->m_transaction->selectTaken()->result();
        $page = count($result);
		$data['transaction'] = $this->m_transaction->selectedTaken($pageNum)->result();
        $data['page'] = $pageNum;
        $data['pageTotal'] = ceil($page / 15);
        $this->load->view('header_admin.php');
		$this->load->view('view_transaction_taken', $data);
        $this->load->view('footer_admin');
	}
    
    public function place($link){
        $this->load->view('header_admin.php');
		$this->load->view($link);
        $this->load->view('footer_admin');
    }

	public function index()
	{
        $this->load->view('header_admin.php');
		$this->load->view('view_transaction_history');
        $this->load->view('footer_admin');
	}
    
    public function active($pageNum)
	{
		$result = $this->m_transaction->selectActiveTransaction()->result();
        $page = count($result);
		$data['transaction'] = $this->m_transaction->selectedActiveTransaction($pageNum)->result();
        $data['page'] = $pageNum;
        $data['pageTotal'] = ceil($page / 15);
        $this->load->view('header_admin.php');
		$this->load->view('view_transaction_history', $data);
        $this->load->view('footer_admin');
	}
    
    
}