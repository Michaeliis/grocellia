<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_grocellia');
        $this->load->model('m_dashboard');
        $this->load->model('m_transaction');
		$this->load->library('pdf');
		$this->load->library('excel');
        $this->load->library('session');
        if(!isset($_SESSION['userId']) || $_SESSION['userPosition'] != 'Staff'){
            show_404();
        }
    }
    
    function place($link){
        $this->load->view('header_admin.php');
		$this->load->view($link);
        $this->load->view('footer_admin');
    }

	public function index()
	{
        $data['totalIncome']=0;
        $data['totalThisMonth']=0;
        
        $transThis = $this->m_dashboard->transactionMonth(date('Y'), date('m'));
        $data['transactionThisMonth']=$transThis->num_rows();
        foreach($transThis->result() as $results){
            $data['totalThisMonth'] += $results->transTotal;
        }
        
        $transTotal = $this->m_transaction->selectTransaction();
        $data['totalTransaction']=$transTotal->num_rows();
        $data['totalEarnings']=0;
        foreach($transTotal->result() as $results){
            $data['totalEarnings'] += $results->transTotal;
        }
        
        $data['totalLastMonth']=0;
        $transLast = $this->m_dashboard->transactionMonth(date('Y')-1, date('m')-1);
        foreach($transLast->result() as $results){
            $data['totalLastMonth'] += $results->transTotal;
        }
        
        $this->load->view('header_admin.php');
		$this->load->view('view_dashboard_income', $data);
        $this->load->view('footer_admin');
	}

	public function new_grocery()
	{
        $this->load->view('header_admin.php');
		$this->load->view('view_new_grocery');
        $this->load->view('footer_admin');
	}
    
    public function new_type(){
        $this->load->view('header_admin.php');
		$this->load->view('view_new_type');
        $this->load->view('footer_admin');
    }
    
}