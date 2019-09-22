<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {
    
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
		$data['staff'] = $this->m_grocellia->selectStaff()->result();
        $this->load->view('header_admin.php');
		$this->load->view('view_staff.php',$data);
        $this->load->view('footer_admin');
	}
    
    public function page($pageNum)
	{
		$result = $this->m_grocellia->selectStaff()->result();
        $page = count($result);
		$data['staff'] = $this->m_grocellia->selectedStaff($pageNum)->result();
        $data['page'] = $pageNum;
        $data['pageTotal'] = ceil($page / 15);
        $this->load->view('header_admin.php');
		$this->load->view('view_staff.php', $data);
        $this->load->view('footer_admin');
	}

	public function input_staff()
	{
		$this->load->view('header_admin.php');
		$this->load->view('view_new_staff.php');
		$this->load->view('footer_admin');
	}

	public function insert_staff(){
		$password=$this->input->post('password');
		$pass=md5($password);
		$name=$this->input->post('name');
		$address=$this->input->post('address');
		$phone=$this->input->post('phone');
		$email=$this->input->post('email');
		$position=$this->input->post('position');
		$status=$this->input->post('status');

		if($this->m_user->checkEmail($email)){
            $id = 'STF'.sprintf("%04d", $this->m_user->countUser('staff'));

            $data = array(
                'userId'=>$id,
                'userName'=>$name,
                'userPassword'=>$pass,
                'userAddress'=>$address,
                'userPhone'=>$phone,
                'userEmail'=>$email,
                'userPosition'=>'Staff',
                'userStatus'=>'1',
            );

            $this->m_grocellia->insert_table($data,'user');
            redirect('staff/page/1');
        }
	}

	function edit_staff($id){
		$where = array('userId' => $id);
		$data['staff'] = $this->m_grocellia->edit($where, 'user')->result();
		$this->load->view('header_admin.php');
		$this->load->view('view_edit_staff',$data);
        $this->load->view('footer_admin');
	}

	function update_staff(){
		$id=$this->input->post('id');
		$password=$this->input->post('password');
		$pass=md5($password);
		$name=$this->input->post('name');
		$address=$this->input->post('address');
		$phone=$this->input->post('phone');
		$email=$this->input->post('email');
		$position=$this->input->post('position');
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
		redirect('staff/page/1');
	}

	function delete_staff($id){
		$where = array('userId'=>$id);
		$data = array('userStatus' => '0');
		$this->m_grocellia->update_data($where, $data, 'user');
		redirect('staff/page/1');
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
		$pdf->Cell(280,7,'List of Staff',0,1,'C');
		//space agar tidak terlalu rapat
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(20,6,'Staff ID',1,0);
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
		->setCellValue('A1', 'List of Grocellia Staff')
		->setCellValue('A2', 'Staff ID')
		->setCellValue('B2', 'Name')
		->setCellValue('C2', 'Address')
		->setCellValue('D2', 'Phone')
		->setCellValue('E2', 'Email')
		->setCellValue('F2', 'Position')
		->setCellValue('G2', 'Status');
	

	$staff = $this->m_grocellia->selectStaff()->result();
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

	$objPHPExcel->getActiveSheet()->setTitle('Staff Grocellia');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

	header("Last-Modified: ". gmdate("D, d M Y H:i:s") . " GMT");
	header('Content-Disposition: attachment;filename="Grocellia_Staff.xlsx"');
	$objWriter->save("php://output");
	redirect('grocellia/staff/page/1');
	}
    
    
}