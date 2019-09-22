<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		$this->load->model('m_grocellia');
        $this->load->model('m_user');
		$this->load->library('pdf');
		$this->load->library('excel');
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

	public function index()
	{
		$data['cust'] = $this->m_grocellia->selectCust()->result();
        $this->load->view('header_admin.php');
		$this->load->view('view_customer.php',$data);
        $this->load->view('footer_admin');
	}
    
    public function page($pageNum)
	{
		$result = $this->m_grocellia->selectStore()->result();
        $page = count($result);
		$data['cust'] = $this->m_grocellia->selectedStore($pageNum)->result();
        $data['page'] = $pageNum;
        $data['pageTotal'] = ceil($page / 15);
        $this->load->view('header_admin.php');
		$this->load->view('view_store.php', $data);
        $this->load->view('footer_admin');
	}

	public function new_store()
	{
		$this->load->view('header_admin.php');
		$this->load->view('view_new_store.php');
		$this->load->view('footer_admin');
	}

	function insert_store(){
		$address=$this->input->post('address');
        $id = 'STR'.sprintf("%04d", $this->m_grocellia->selectStore()->num_rows());
        $data = array(
                'storeId'=>$id,
                'storeAddress'=>$address,
                'storeStatus'=>'1',
            );

            $this->m_grocellia->insert_table($data,'store');
            redirect(base_url('store/page/1'));
	}

	function edit_customer($id){
		$where = array('userId' => $id);
		$data['customer'] = $this->m_grocellia->edit($where, 'user')->result();
		$this->load->view('header_admin.php');
		$this->load->view('view_edit_customer',$data);
		$this->load->view('footer_admin');
	}

	function update_customer(){
		$id=$this->input->post('id');
		$password=$this->input->post('password');
		$pass=md5($password);
		$name=$this->input->post('name');
		$address=$this->input->post('address');
		$phone=$this->input->post('phone');
		$email=$this->input->post('email');
		$status=$this->input->post('status');

		$data = array(
			'userPassword'=>$pass,
			'userName'=>$name,
			'userAddress'=>$address,
			'userPhone'=>$phone,
			'userEmail'=>$email,
			'userStatus'=>$status,
		);

		$where = array(
			'userId' => $id,
		);

		$this->m_grocellia->update_data($where, $data,'user');
		redirect('customer/page/1');
	}

	function delete_customer($id){
		$where = array('userId'=>$id);
		$data = array('userStatus' => '0');
		$this->m_grocellia->update_data($where, $data, 'user');
		redirect('customer/page/1');
	}

	function pdf(){
		$pdf = new FPDF('l','mm','A4');
		//buat halaman baru
		$pdf->AddPage();
		//setting font
		$pdf->SetFont('Arial','B','16');
		//cetak string
		$pdf->Cell(280,7,'Grocellia',0,1,'C');

		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(280,7,'List of Customer',0,1,'C');
		//space agar tidak terlalu rapat
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(20,6,'Cust ID',1,0);
		$pdf->Cell(30,6,'Name',1,0);
		$pdf->Cell(40,6,'Address',1,0);
		$pdf->Cell(50,6,'Phone',1,0);
		$pdf->Cell(30,6,'Email',1,0);
		$pdf->Cell(50,6,'Status',1,1);
		$pdf->SetFont('Arial','',10);

		$isi = $this->m_grocellia->selectCust()->result();
		foreach ($isi as $row){
			$pdf->Cell(20,6,$row->userId,1,0);
			$pdf->Cell(30,6,$row->userName,1,0);
			$pdf->Cell(40,6,$row->userAddress,1,0);
			$pdf->Cell(50,6,$row->userPhone,1,0);
			$pdf->Cell(30,6,$row->userEmail,1,0);
			$pdf->Cell(50,6,$row->userStatus,1,1);
		}
		$pdf->Output();
	}

	function excel(){
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:C1');
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', 'List of Grocellia Customer')
		->setCellValue('A2', 'Customer ID')
		->setCellValue('B2', 'Name')
		->setCellValue('C2', 'Address')
		->setCellValue('D2', 'Phone')
		->setCellValue('E2', 'Email')
		->setCellValue('F2', 'Position')
		->setCellValue('G2', 'Status');
	

	$staff = $this->m_grocellia->selectCust()->result();
	$temp=3;

	foreach ($staff as $row){
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A'.$temp, $row->userId)
		->setCellValue('B'.$temp, $row->userName)
		->setCellValue('C'.$temp, $row->userAddress)
		->setCellValue('D'.$temp, $row->userPhone)
		->setCellValue('E'.$temp, $row->userEmail)
		->setCellValue('F'.$temp, $row->userStatus);
		$temp++;
	}

	$objPHPExcel->getActiveSheet()->setTitle('Customer Grocellia');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

	header("Last-Modified: ". gmdate("D, d M Y H:i:s") . " GMT");
	header('Content-Disposition: attachment;filename="Grocellia_Staff.xlsx"');
	$objWriter->save("php://output");
	redirect('grocellia/staff/page/1');
	}
    
}