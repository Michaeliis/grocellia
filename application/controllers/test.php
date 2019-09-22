<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		$this->load->model('m_grocellia');
		$this->load->library('upload');
		$this->load->library('pdf');
		$this->load->library('excel');
		$this->load->helper(array('form', 'url'));
	}
    
    public function place($link){
        $this->load->view('header_admin.php');
		$this->load->view($link);
        $this->load->view('footer_admin');
    }

	public function index()
	{
		$data['grocery'] = $this->m_grocellia->selectGroc()->result();
        $this->load->view('header_admin.php');
		$this->load->view('view_grocery.php',$data);
        $this->load->view('footer_admin');
	}

	public function input_grocery()
	{
		$this->load->view('header_admin.php');
		$this->load->view('test_upload.php');
		$this->load->view('footer_admin');
	}

	public function insert_grocery(){
		$config = array(
		'upload_path' => "./assets/uploads/",
		'allowed_types' => "gif|jpg|png|jpeg|pdf",
		'overwrite' => TRUE,
		);

		$this->load->library('upload', $config);
		if($this->upload->do_upload()){
			$data = array('upload_data' => $this->upload->data());
		}
		else "hai";
		//redirect('grocery/index');
		
	/*	$name=$this->input->post('name');
		$price=$this->input->post('price');
		$image=$upload['file_name'];
		$promo=$this->input->post('promo');
		$status=$this->input->post('status');
		$desc=$this->input->post('desc');

	$data = array(
			'grocId'=>"",
			'grocName'=>$name,
			'grocPrice'=>$price,
			'grocImage'=>$image,
			'promoId'=>$promo,
			'grocStatus'=>$status,
			'grocDesc'=>$desc,
		);

		$this->m_grocellia->insert_table($data,'grocery');



		redirect('test');*/
	}

	function edit_grocery($id){
		$where = array('grocId' => $id);
		$data['grocery'] = $this->m_grocellia->edit($where, 'grocery')->result();
		$this->load->view('header_admin.php');
		$this->load->view('view_edit_grocery',$data);
        $this->load->view('footer_admin');
	}

	function update_grocery(){
		$id=$this->input->post('id');
		$name=$this->input->post('name');
		$price=$this->input->post('price');
		$image=$this->input->post('image');
		$promo=$this->input->post('promo');
		$status=$this->input->post('status');
		$desc=$this->input->post('desc');

		if(!$image){
			$data = array(
			'grocName'=>$name,
			'grocPrice'=>$price,
			'promoId'=>$promo,
			'grocStatus'=>$status,
			'grocDesc'=>$desc,
		);
		} else {
			$data = array(
			'grocName'=>$name,
			'grocPrice'=>$price,
			'grocImage'=>$image,
			'promoId'=>$promo,
			'grocStatus'=>$status,
			'grocDesc'=>$desc,
		);
		}

		$where = array(
			'grocId' => $id,
		);

		$this->m_grocellia->update_data($where,$data,'grocery');
		redirect('grocery');
	}

	function delete_staff($id){
		$where = array('staffId'=>$id);
		$this->m_grocellia->delete_data($where,'staff');
		redirect('staff/index');
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
		$pdf->Cell(30,6,'Username',1,0);
		$pdf->Cell(40,6,'Name',1,0);
		$pdf->Cell(50,6,'Address',1,0);
		$pdf->Cell(30,6,'Phone',1,0);
		$pdf->Cell(50,6,'Email',1,0);
		$pdf->Cell(30,6,'Position',1,0);
		$pdf->Cell(20,6,'Status',1,1);
		$pdf->SetFont('Arial','',10);

		$staff = $this->m_grocellia->selectStaff()->result();
		foreach ($staff as $row){
			$pdf->Cell(20,6,$row->staffId,1,0);
			$pdf->Cell(30,6,$row->staffUsername,1,0);
			$pdf->Cell(40,6,$row->staffName,1,0);
			$pdf->Cell(50,6,$row->staffAddress,1,0);
			$pdf->Cell(30,6,$row->staffPhone,1,0);
			$pdf->Cell(50,6,$row->staffEmail,1,0);
			$pdf->Cell(30,6,$row->staffPosition,1,0);
			$pdf->Cell(20,6,$row->staffStatus,1,1);
		}
		$pdf->Output();
	}

	function excel(){
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:C1');
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', 'List of Grocellia Staff')
		->setCellValue('A2', 'Staff ID')
		->setCellValue('B2', 'Username')
		->setCellValue('C2', 'Name')
		->setCellValue('D2', 'Address')
		->setCellValue('E2', 'Phone')
		->setCellValue('F2', 'Email')
		->setCellValue('G2', 'Position')
		->setCellValue('H2', 'Status');
	

	$staff = $this->m_grocellia->selectStaff()->result();
	$temp=3;

	foreach ($staff as $row){
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A'.$temp, $row->staffId)
		->setCellValue('B'.$temp, $row->staffUsername)
		->setCellValue('C'.$temp, $row->staffName)
		->setCellValue('D'.$temp, $row->staffAddress)
		->setCellValue('E'.$temp, $row->staffPhone)
		->setCellValue('F'.$temp, $row->staffEmail)
		->setCellValue('G'.$temp, $row->staffPosition)
		->setCellValue('H'.$temp, $row->staffStatus);
		$temp++;
	}

	$objPHPExcel->getActiveSheet()->setTitle('Staff Grocellia');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

	header("Last-Modified: ". gmdate("D, d M Y H:i:s") . " GMT");
	header('Content-Disposition: attachment;filename="Grocellia_Staff.xlsx"');
	$objWriter->save("php://output");
	redirect('grocellia/staff');
	}
    
}