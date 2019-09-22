<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supply extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		$this->load->model('m_grocellia');
        $this->load->model('m_order');
        $this->load->model('m_supply');
		$this->load->library('upload');
		$this->load->library('pdf');
		$this->load->library('excel');
        $this->load->library('session');
		$this->load->helper(array('form', 'url'));
        if(!isset($_SESSION['userId']) || $_SESSION['userPosition'] != 'Staff'){
            show_404();
        }
	}
    
    public function page($pageNum)
	{
		$result = $this->m_supply->selectSupply()->result();
        $page = count($result);
		$data['supply'] = $this->m_supply->selectedSupply($pageNum)->result();
        $data['page'] = $pageNum;
        $data['pageTotal'] = ceil($page / 15);
        $this->load->view('header_admin.php');
		$this->load->view('view_supply.php', $data);
        $this->load->view('footer_admin');
	}

	public function new_supply()
	{
        $data['supplier'] = $this->m_grocellia->selectSup()->result();
        $this->load->view('header_admin.php');
		$this->load->view('view_new_supply', $data);
        $this->load->view('footer_admin');
	}
    
    public function new_supply_item()
	{
        $suppId = $this->input->post('supplier');
        $this->load->model('m_supplier');
        $data['supplier'] = $suppId;
        $data['store'] = $this->m_grocellia->selectStore()->result();
        $data['grocery'] = $this->m_supplier->getSupplierDetail($suppId)->result();
        $this->load->view('header_admin.php', $data);
		$this->load->view('view_new_supply_item');
        $this->load->view('footer_admin');
	}
    
    function insert_supply(){
        $suppId = $this->input->post('supplier');
        $grocId = $this->input->post('grocery');
        $quantity = $this->input->post('quantity');
        $store = $this->input->post('store');
        
        $supplyId = $this->m_supply->getId();
        
        $price = $this->m_supply->getPrice($suppId, $grocId);
        foreach($price as $prices){
            $supplyPrice = $prices->suppDetailPrice;
        }
        $suppTotal = $supplyPrice*$quantity;
        $data = array('supplyId'=>$supplyId,
              'supplierId'=>$suppId,
             'grocId'=>$grocId,
             'staffId'=>$_SESSION['userId'],
             'storeId'=>$store,
             'supplyQuantity'=>$quantity,
            'supplyPrice'=>$supplyPrice,
            'supplyTotal'=>$suppTotal,
             'supplyStatus' =>'1');
        $this->m_grocellia->insert_table($data, 'supply');
        redirect(base_url('supply/new_supply'));
    }
}