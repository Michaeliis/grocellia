<?php
class M_dashboard extends CI_Model{
    
    function transactionMonth($yearNow, $monthNow){
        $transNow = $this->db->select("*")->from('transactionn')->where("MONTH(transDate)", $monthNow)->where("YEAR(transDate)", $yearNow)->get();
        
        return $transNow;
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
    
    function selectSupply(){
        $this->db->select("supply.supplyId, supply.supplyDate, supply.supplyStatus, supply.supplyQuantity, supply.supplyPrice, supply.supplyTotal, staff.userId as 'staffId', supplier.userId as 'suppId', grocery.grocId, staff.userName as 'staffName', supplier.userName as 'suppName', store.storeAddress")->from('supply')->join('user staff', 'supply.staffId = staff.userId', 'left')->join('user supplier', 'supply.supplyId = supplier.userId', 'left')->join('grocery', 'supply.grocId = grocery.grocId', 'left')->join('store', 'supply.storeId = store.storeId', 'left');
		return $this->db->get();
	}
    
    function selectedSupply($pageNum){
        $this->db->select("supply.supplyId, supply.supplyDate, supply.supplyStatus, supply.supplyQuantity, supply.supplyPrice, supply.supplyTotal, staff.userId as 'staffId', supplier.userId as 'suppId', grocery.grocId, staff.userName as 'staffName', supplier.userName as 'suppName', store.storeAddress")->from('supply')->join('user staff', 'supply.staffId = staff.userId', 'left')->join('user supplier', 'supply.supplyId = supplier.userId', 'left')->join('grocery', 'supply.grocId = grocery.grocId', 'left')->join('store', 'supply.storeId = store.storeId', 'left');
        $this->db->limit(15, (($pageNum-1)*15));
		return $this->db->get();
	}
    
    function getPrice($suppId, $grocId){
        return $this->db->get_where('supplydetail', array('suppId' => $suppId,
                                                  'grocId' => $grocId))->result;
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