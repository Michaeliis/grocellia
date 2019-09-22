<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if(!isset($_SESSION['userId']) || $_SESSION['userPosition'] != 'Staff'){
            show_404();
        }
    }

    public function index(){
        $this->load->view('header_admin.php');
        $this->load->view('upload_image', array('error' => ' ' ));
        $this->load->view('footer_admin.php');
    }

    public function do_upload(){
        $config = array('upload_path' => "./assets/uploads/", 
                        'allowed_types' => "gif|jpg|png|jpeg|pdf", 
                        'overwrite' => TRUE);

        $this->load->library('upload', $config);
        if($this->upload->do_upload()){
            $data = array('upload_data' => $this->upload->data());
        }
        redirect('dashboard');
    }
}
?>