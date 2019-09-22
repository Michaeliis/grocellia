<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    function __construct(){
        parent:: __construct();
        $this->load->model('m_main');
        $this->load->library('session');
        if(!isset($_SESSION['userId']) || $_SESSION['userPosition'] != 'Staff'){
            show_404();
        }
    }
    
    public function place($link){
        $this->load->view('header_admin.php');
		$this->load->view($link);
        $this->load->view('footer_admin');
    }

	public function staff()
	{
        $this->load->view('header_admin.php');
		$this->load->view('view_staff');
        $this->load->view('footer_admin');
	}
    
	public function customer()
	{
        $this->load->view('header_admin.php');
		$this->load->view('view_customer');
        $this->load->view('footer_admin');
    }
    
	public function new_customer()
	{
        $this->load->view('header_admin.php');
		$this->load->view('view_new_customer');
        $this->load->view('footer_admin');
	}
    
    
	public function new_staff()
	{
        $this->load->view('header_admin.php');
		$this->load->view('view_new_staff');
        $this->load->view('footer_admin');
	}
    
    public function supplier(){
        $this->load->view('header_admin.php');
		$this->load->view('view_supplier');
        $this->load->view('footer_admin');
    }
    
    public function new_supplier(){
        $this->load->view('header_admin.php');
		$this->load->view('view_new_supplier');
        $this->load->view('footer_admin');
    }
    
    public function insert_staff(){
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $position = $this->input->post('position');
        $photo = $this->input->post('photo');
        
        $data = array('userId' => "", 'userName' => $name, 'userPhone' => $phone, 'userEmail' => $email, 'userAddress' => $address, 'userPosition' => $position, 'userPhoto' => $photo, 'userStatus' => '1');
        $this->m_main->insert_data('user', $data);
        redirect("grocery");
    }
    
    public function insert_supplier(){
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $position = $this->input->post('position');
        $photo = $this->input->post('photo');
        
        $data = array('userId' => "", 'userName' => $name, 'userPhone' => $phone, 'userEmail' => $email, 'userAddress' => $address, 'userPosition' => 'supplier', 'userPhoto' => $photo, 'userStatus' => '1');
        $this->m_main->insert_data('user', $data);
        redirect("grocery");
    }
    
    public function edit_staff($id){
        $where = array('userId' => $id);
        $data['edit'] = $this->m_main->edit('user', $where);
        $this->load->view('header_admin.php');
		$this->load->view('view_edit_staff', $data);
        $this->load->view('footer_admin');
    }
    
    public function edit_supplier($id){
        $where = array('userId' => $id);
        $data['edit'] = $this->m_main->edit('user', $where);
        $this->load->view('header_admin.php');
		$this->load->view('view_edit_supplier', $data);
        $this->load->view('footer_admin');
    }
    
    public function update_staff(){
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $position = $this->input->post('position');
        $photo = $this->input->post('photo');
        
        //batas
        
        $where = array('userId' => $id);
        $data = array('userName' => $name, 'userPhone' => $phone, 'userEmail' => $email, 'userAddress' => $address, 'userPosition' => $position, 'userPhoto' => $photo, 'userStatus' => '1');
        
        $this->m_main->update_data($where, 'user', $data);
        redirect('grocery');
    }
    
    public function update_supplier(){
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $position = $this->input->post('position');
        $photo = $this->input->post('photo');
        
        //batas
        
        $where = array('userId' => $id);
        $data = array('userName' => $name, 'userPhone' => $phone, 'userEmail' => $email, 'userAddress' => $address, 'userPosition' => 'supplier', 'userPhoto' => $photo, 'userStatus' => '1');
        
        $this->m_main->update_data($where, 'user', $data);
        redirect('grocery');
    }
}