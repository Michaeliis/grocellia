<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grocery extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		$this->load->model('m_grocellia');
        $this->load->model('m_grocery');
		$this->load->library('upload');
		$this->load->library('pdf');
		$this->load->library('excel');
		$this->load->helper(array('form', 'url'));
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

	public function index($pageNum)
	{
        $result = $this->m_grocellia->selectGroc()->result();
        $page = count($result);
		$data['grocery'] = $this->m_grocellia->selectGroc($pageNum)->result();;
        $data['page'] = $pageNum;
        $data['pageTotal'] = intval($page / 15);
        $this->load->view('header_admin.php');
		$this->load->view('view_grocery.php',$data);
        $this->load->view('footer_admin');
	}
    
    public function page($pageNum)
	{
		$result = $this->m_grocellia->selectGroc()->result();
        $page = count($result);
		$data['grocery'] = $this->m_grocellia->selectedGroc($pageNum)->result();
        $data['page'] = $pageNum;
        $data['pageTotal'] = ceil($page / 15);
        $this->load->view('header_admin.php');
		$this->load->view('view_grocery.php', $data);
        $this->load->view('footer_admin');
	}

	public function input_grocery()
	{
        $data['promo'] = $this->m_grocery->selectActivePromo()->result();
        $data['type'] = $this->m_grocellia->selectType()->result();
		$this->load->view('header_admin.php');
		$this->load->view('view_new_grocery', $data);
		$this->load->view('footer_admin');
	}

	public function insert_grocery(){
		$name=$this->input->post('name');
		$price=$this->input->post('price');
		$image=$this->input->post('image');
		$promo=$this->input->post('promo');
		$status=$this->input->post('status');
		$desc=$this->input->post('desc');
        
        $grocId = $this->m_grocery->getGroceryId();
		$data = array(
			'grocId'=>$grocId,
			'grocName'=>$name,
			'grocPrice'=>$price,
			'grocImage'=>$image,
			'promoId'=>$promo,
			'grocStatus'=>$status,
			'grocDesc'=>$desc);

		

		$this->m_grocellia->insert_table($data,'grocery');
		redirect('grocery/page/1');
	}
    
    public function insert_type(){
		$name=$this->input->post('name');
		$image=$this->input->post('image');
        
        $typeId = $this->m_grocery->getTypeId();
		$data = array(
			'typeId' => $typeId,
			'typeName' => $name,
            'typeImage' => $image,
			'typeStatus'=>'1'
        );

		

		$this->m_grocellia->insert_table($data,'type');
		redirect('grocery/page/1');
	}
    
    public function type($pageNum){
        $result = $this->m_grocellia->selectType()->result();
        $page = count($result);
		$data['type'] = $this->m_grocellia->selectedType($pageNum)->result();
        $data['page'] = $pageNum;
        $data['pageTotal'] = ceil($page / 15);
        $this->load->view('header_admin.php');
		$this->load->view('view_type.php', $data);
        $this->load->view('footer_admin');
    }
    
    public function input_type()
	{
		$this->load->view('header_admin.php');
		$this->load->view('view_new_type.php');
		$this->load->view('footer_admin');
	}
    
    function edit_type($id){
		$where = array('typeId' => $id);
		$data['grocery'] = $this->m_grocellia->edit($where, 'type')->result();
		$this->load->view('header_admin.php');
		$this->load->view('view_edit_type',$data);
        $this->load->view('footer_admin');
	}

	function edit_grocery($id){
		$where = array('grocId' => $id);
		$data['grocery'] = $this->m_grocellia->edit($where, 'grocery')->result();
        $data['type'] = $this->m_grocellia->selectType()->result();
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
        $type=$this->input->post('type');

		if(!$image){
			$data = array(
			'grocName'=>$name,
			'grocPrice'=>$price,
			'promoId'=>$promo,
			'grocStatus'=>$status,
			'grocDesc'=>$desc,
            'typeId' =>$type
		);
		} else {
			$data = array(
			'grocName'=>$name,
			'grocPrice'=>$price,
			'grocImage'=>$image,
			'promoId'=>$promo,
			'grocStatus'=>$status,
			'grocDesc'=>$desc,
            'typeId' =>$type
		);
		}

		$where = array(
			'grocId' => $id,
		);

		$this->m_grocellia->update_data($where,$data,'grocery');
		redirect('grocery/page/1');
	}

	function delete_grocery($id){
		$where = array('grocId'=>$id);
        $data = array('grocStatus' => '0');
		$this->m_grocellia->update_data($where, $data, 'grocery');
		redirect('grocery/page/1');
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

	$objPHPExcel->getActiveSheet()->setTitle('Grocery Grocellia');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

	header("Last-Modified: ". gmdate("D, d M Y H:i:s") . " GMT");
	header('Content-Disposition: attachment;filename="Grocellia_Staff.xlsx"');
	$objWriter->save("php://output");
	redirect('grocery/page/1');
	}
    
}