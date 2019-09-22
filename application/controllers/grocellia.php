<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grocellia extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_grocellia');
		$this->load->library('upload');
		$this->load->library('pdf');
		$this->load->library('excel');
        $this->load->library('session');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data['grocery'] = $this->m_grocellia->selectGroc()->result();
        $data['supplier'] = $this->m_grocellia->selectSupIndex()->result();
		$this->load->view('header.php');
		$this->load->view('index.php',$data);
		$this->load->view('footer.php');
	}

	public function login()
	{
		$this->load->helper('url');
		$this->load->view('header.php');
		$this->load->view('login.php');
		$this->load->view('footer.php');
	}
    
    public function logout(){
        unset($_SESSION['userId']);
        unset($_SESSION['userPosition']);
        unset($_SESSION['userName']);
        redirect('grocellia');
    }
    
    public function checkLogin(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $where = array('userEmail' => $email);
        $user = $this->m_grocellia->edit($where, 'user');
        
        if($user->num_rows() > 0){
            $userData = $user->result();
            foreach($userData as $userDatas){
                $_SESSION['userId'] = $userDatas->userId;
                $_SESSION['userPosition'] = $userDatas->userPosition;
                $_SESSION['userName'] = $userDatas->userName;
            }
            
            redirect('dashboard');
        }else{
            $data['failLogin']=true;
            $this->load->view('header_admin.php');
            $this->load->view('login.php', $data);
            $this->load->view('footer.php');
        }
    }

	public function register()
	{
		$this->load->helper('url');
		$this->load->view('header.php');
		$this->load->view('register.php');
		$this->load->view('footer.php');
	}
    
    public function checkout(){
        $this->load->view('header.php');
		$this->load->view('view_cart.php');
		$this->load->view('footer.php');
    }
    
    public function emptycart(){
        unset($_SESSION['cart_item']);
        $this->load->view('header.php');
		$this->load->view('view_cart.php');
		$this->load->view('footer.php');
    }
    
    public function purchase_transaction(){
        $store = $this->input->post('store');
        
        $this->load->model('m_transaction');
        
        if(isset($_SESSION['cart_item'])){
            $this->load->model('m_transaction');
            $transId = $this->m_transaction->transId();
            $transDate = date("Y-m-d");
            $total = 0;
            foreach ($_SESSION["cart_item"] as $item){
                $priceTotal = $item['tDetailPrice']*$item['tDetailQuantity'];
                $data = array('transId' => $transId,
                              'grocId' => $item['grocId'],
                              'tDetailPrice' => $item['tDetailPrice'],
                              'tDetailQuantity' => $item['tDetailQuantity'],
                              'tDetailTotalPrice' => $priceTotal,
                              'tDetailStatus' => '1');
                $this->m_grocellia->insert_table($data, 'transactionDetail');
                $total += $priceTotal;
            }
            $dataTrans = array('transId' => $transId,
                              'staffId' => '',
                              'custId' => $_SESSION['userId'],
                              'storeId' => $store,
                               'transTotal' => $total,
                              'transDate' => $transDate,
                              'transStatus' => '1');
            $this->m_grocellia->insert_table($dataTrans, 'transactionn');
        }
        redirect(base_url().'grocellia');
    }
    
    public function selectStore(){
        $data['store'] = $this->m_grocellia->selectStore()->result();
        $this->load->view('header');
        $this->load->view('view_select_store', $data);
        $this->load->view('footer');
    }
    
    public function purchase($action){
        if(!empty($action)) {
            switch($action) {
                case "add":
                    if(!empty($this->input->post('quantity'))) {
                        //ci
                        $where = array("grocId" => $this->input->post('grocId'));
                        $result = $this->m_grocellia->edit($where, "grocery")->result();
                        //ci
                        foreach($result as $results){

                            $itemArray = array($results->grocId=>array('grocName'=>$results->grocName, 'grocId'=>$results->grocId, 'tDetailQuantity'=>$this->input->post('quantity'), 'tDetailPrice'=>$results->grocPrice, 'grocImage'=>$results->grocImage));

                            if(!empty($_SESSION["cart_item"])) {
                                if(in_array($results->grocId, array_keys($_SESSION["cart_item"]))) {
                                    foreach($_SESSION["cart_item"] as $k => $v) {
                                            if($results->grocId == $k) {
                                                if(empty($_SESSION["cart_item"][$k]["tDetailQuantity"])) {
                                                    $_SESSION["cart_item"][$k]["tDetailQuantity"] = 0;
                                                }
                                                $_SESSION["cart_item"][$k]["tDetailQuantity"] += $this->input->post('quantity');
                                            }
                                    }
                                } else {
                                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                                }
                            } else {
                                $_SESSION["cart_item"] = $itemArray;
                            }
                        }
                    }
                break;
                case "remove":
                    if(!empty($_SESSION["cart_item"])) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                                if($this->input->post('grocId') == $k)
                                    unset($_SESSION["cart_item"][$k]);				
                                if(empty($_SESSION["cart_item"]))
                                    unset($_SESSION["cart_item"]);
                        }
                    }
                break;
                case "empty":
                    unset($_SESSION["cart_item"]);
                break;	
            }
        }
        $this->load->view('header.php');
		$this->load->view('view_cart.php');
		$this->load->view('footer.php');
    }
    
    public function remove($item){
        unset($_SESSION["cart_item"][$item]);
        $_SESSION["cart_item"] = array_values($_SESSION["cart_item"]);
        $this->load->view('header.php');
		$this->load->view('view_cart.php');
		$this->load->view('footer.php');
    }
    
    public function about(){
        $this->load->view('header.php');
		$this->load->view('view_about.php');
		$this->load->view('footer.php');
    }
	public function contact()
	{
		$this->load->helper('url');
		$this->load->view('header.php');
		$this->load->view('contact.php');
		$this->load->view('footer.php');
	}

    public function groceries($type){
        if($type=='all'){
            $data['grocery'] = $this->m_grocellia->selectGroc()->result();
        }else{
            $data['grocery'] = $this->m_grocellia->selectingType($type)->result();
        }
        $data['type'] = $this->m_grocellia->selectType()->result();
        $this->load->view("header");
        $this->load->view("groceries", $data);
        $this->load->view("footer");
    }

    public function item($id){
    	$where = array('grocId' => $id);
		$data['grocery'] = $this->m_grocellia->edit($where, 'grocery')->result();
        $this->load->view("header");
        $this->load->view("item.php", $data);
        $this->load->view("footer");
    }
}