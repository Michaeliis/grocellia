<?php
class M_transaction extends CI_Model{
    
    function transId(){
        return sprintf("TRS%04d%s", $this->db->get_where('transaction')->num_rows(), date("Ymd"));
    }
    
    function checkEmail($email){
        $where = array('userEmail' => $email);
        $count = $this->db->get_where('user', $where)->num_rows();
        if($count > 0){
            return false;
        }else{
            return true;
        }
    }
    
    function selectTransaction(){
        $this->db->select("transactionn.transId, transactionn.transTotal, transactionn.transDate, transactionn.transStatus, customer.userName as 'custName', staff.userName as 'staffName', store.storeAddress")->from('transactionn')->join('user customer', 'transactionn.custId = customer.userId', 'left')->join('user staff', 'transactionn.staffId = staff.userId', 'left')->join('store', 'transactionn.storeId = store.storeId', 'left');
		return $this->db->get();
	}
    
    function selectedTransaction($pageNum){
        $this->db->select("transactionn.transId, transactionn.transTotal, transactionn.transDate, transactionn.transStatus, customer.userName as 'custName', staff.userName as 'staffName', store.storeAddress")->from('transactionn')->join('user customer', 'transactionn.custId = customer.userId', 'left')->join('user staff', 'transactionn.staffId = staff.userId', 'left')->join('store', 'transactionn.storeId = store.storeId', 'left');
        $this->db->limit(15, (($pageNum-1)*15));
		return $this->db->get();
	}
    
    function selectTaken(){
        $this->db->select("transactionn.transId, transactionn.transTotal, transactionn.transDate, transactionn.transStatus, customer.userName as 'custName', staff.userName as 'staffName', store.storeAddress")->from('transactionn')->join('user customer', 'transactionn.custId = customer.userId', 'left')->join('user staff', 'transactionn.staffId = staff.userId', 'left')->join('store', 'transactionn.storeId = store.storeId', 'left');
        $this->db->where(array('transactionn.staffId' => $_SESSION['userId']));
		return $this->db->get();
	}
    
    function selectedTaken($pageNum){
        $this->db->select("transactionn.transId, transactionn.transTotal, transactionn.transDate, transactionn.transStatus, customer.userName as 'custName', staff.userName as 'staffName', store.storeAddress")->from('transactionn')->join('user customer', 'transactionn.custId = customer.userId', 'left')->join('user staff', 'transactionn.staffId = staff.userId', 'left')->join('store', 'transactionn.storeId = store.storeId', 'left');
        $this->db->limit(15, (($pageNum-1)*15));
        $this->db->where(array('transactionn.staffId' => $_SESSION['userId']));
		return $this->db->get();
	}
    
    function selectActiveTransaction(){
        $this->db->select("transactionn.transId, transactionn.transTotal, transactionn.transDate, transactionn.transStatus, customer.userName as 'custName', staff.userName as 'staffName', store.storeAddress")->from('transactionn')->join('user customer', 'transactionn.custId = customer.userId', 'left')->join('user staff', 'transactionn.staffId = staff.userId', 'left')->join('store', "transactionn.storeId = store.storeId", 'left');
        $this->db->where(array('transactionn.transStatus' => '1'));
		return $this->db->get();
	}
    
    function selectedActiveTransaction($pageNum){
        $this->db->select("transactionn.transId, transactionn.transTotal, transactionn.transDate, transactionn.transStatus, customer.userName as 'custName', staff.userName as 'staffName', store.storeAddress")->from('transactionn')->join('user customer', 'transactionn.custId = customer.userId', 'left')->join('user staff', 'transactionn.staffId = staff.userId', 'left')->join('store', "transactionn.storeId = store.storeId", 'left');
        $this->db->where(array('transactionn.transStatus' => '1'));
        $this->db->limit(15, (($pageNum-1)*15));
		return $this->db->get();
	}
    
    function insertTransDetail($data){
        $this->db->insert('transDetail', $data);
    }
    
    
}
?>