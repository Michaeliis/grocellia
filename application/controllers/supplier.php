<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		$this->load->model('m_grocellia');
        $this->load->model('m_user');
        $this->load->model('m_supplier');
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

	public function page($pageNum)
	{
		$result = $this->m_grocellia->selectSup()->result();
        $page = count($result);
		$data['supplier'] = $this->m_grocellia->selectedSup($pageNum)->result();
        $data['page'] = $pageNum;
        $data['pageTotal'] = ceil($page / 15);
        $this->load->view('header_admin.php');
		$this->load->view('view_supplier.php',$data);
        $this->load->view('footer_admin');
	}
    
    public function index()
	{
		$data['supplier'] = $this->m_grocellia->selectSup()->result();
        $this->load->view('header_admin.php');
		$this->load->view('view_supplier.php',$data);
        $this->load->view('footer_admin');
	}

	public function input_supplier()
	{
		$this->load->view('header_admin.php');
		$this->load->view('view_new_supplier.php');
		$this->load->view('footer_admin');
	}

	public function insert_supplier(){
		$password=$this->input->post('password');
		$pass=md5($password);
		$name=$this->input->post('name');
		$address=$this->input->post('address');
		$phone=$this->input->post('phone');
		$email=$this->input->post('email');
		$status=$this->input->post('status');

		if($this->m_user->checkEmail($email)){
            $id = 'SPR'.sprintf("%04d", $this->m_user->countUser('supplier'));

            $data = array(
                'userId'=>$id,
                'userName'=>$name,
                'userPassword'=>$pass,
                'userAddress'=>$address,
                'userPhone'=>$phone,
                'userEmail'=>$email,
                'userPosition'=>'Supplier',
                'userStatus'=>'1',
            );

            $this->m_grocellia->insert_table($data,'user');
            redirect('supplier/page/1');
        }
	}
    
    function insert_supplier_detail(){
        $suppId = $this->input->post('supplierid');
        $groceryId = $this->input->post('grocery');
        $suppDetailPrice = $this->input->post('price');
        
        $data = array('suppId' => $suppId,
                     'grocId' => $groceryId,
                     'suppDetailPrice' => $suppDetailPrice,
                     'suppDetailStatus' => '1');
        $this->m_grocellia->insert_table($data, 'supplierdetail');
        redirect(base_url()."supplier/view/".$suppId."/1");
    }

	function edit_supplier($id){
		$where = array('userId' => $id);
		$data['supplier'] = $this->m_grocellia->edit($where, 'user')->result();
		$this->load->view('header_admin.php');
		$this->load->view('view_edit_supplier',$data);
        $this->load->view('footer_admin');
	}

	function update_supplier(){
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
		redirect('supplier/page/1');
	}
    
    function add($id){
        $data['supplier'] = $this->m_supplier->getSupplier($id)->result();
        $data['grocery'] = $this->m_grocellia->selectGroc()->result();
        $this->load->view('header_admin.php');
		$this->load->view('view_add_supplier', $data);
        $this->load->view('footer_admin');
    }
    
    function view($id, $pageNum){
        $data['supplier'] = $this->m_supplier->getSupplier($id)->result();
        $data['detail'] = $this->m_supplier->getSupplierDetail($id)->result();
        
        $page = count($data['detail']);
        $data['page'] = $pageNum;
        $data['pageTotal'] = ceil($page / 15);
        
        $this->load->view('header_admin.php');
		$this->load->view('view_supplier_detail',$data);
        $this->load->view('footer_admin');
    }

	function delete_supplier($id){
		$where = array('userId'=>$id);
		$data = array('userStatus' => '0');
		$this->m_grocellia->update_data($where, $data, 'user');
		redirect('supplier/page/1');
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

		$isi = $this->m_grocellia->selectSup()->result();
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
		->setCellValue('A1', 'List of Grocellia Supplier')
		->setCellValue('A2', 'Supplier ID')
		->setCellValue('B2', 'Name')
		->setCellValue('C2', 'Address')
		->setCellValue('D2', 'Phone')
		->setCellValue('E2', 'Email')
		->setCellValue('F2', 'Position')
		->setCellValue('G2', 'Status');
	

	$staff = $this->m_grocellia->selectSup()->result();
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

	$objPHPExcel->getActiveSheet()->setTitle('Supplier Grocellia');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

	header("Last-Modified: ". gmdate("D, d M Y H:i:s") . " GMT");
	header('Content-Disposition: attachment;filename="Grocellia_Supplier.xlsx"');
	$objWriter->save("php://output");
	redirect('grocellia/supplier/page/1');
	}
    
}