<?php
class m_order extends CI_Model {
    function getTransaction($transId){
        $this->db->select("transactionn.transId, transactionn.transTotal, transactionn.transDate, transactionn.transStatus, customer.userName as 'custName', staff.userName as 'staffName', store.storeAddress, customer.userId as 'custId', staff.userId as 'staffId'")->from('transactionn')->join('user customer', 'transactionn.custId = customer.userId', 'left')->join('user staff', 'transactionn.staffId = staff.userId', 'left')->join('store', "transactionn.storeId = store.storeId AND transactionn.transId = '".$transId."'", 'inner');
        $this->db->where(array('transactionn.transId' => $transId));
        return $this->db->get();
    }
    
    function getTransactionDetail($transId){
        $this->db->select("transactiondetail.grocId, transactiondetail.tDetailPrice, transactiondetail.tDetailQuantity, transactiondetail.tDetailTotalPrice, transactiondetail.tDetailStatus, grocery.grocName")->from('transactiondetail')->join('grocery', "grocery.grocId = transactiondetail.grocId", 'inner');
        $this->db->where(array('transactiondetail.transId' => $transId));
        return $this->db->get();
    }
    
    function selectActivePromo(){
        $where = array('promoEnd >' => date("Y-m-d"));
        return $this->db->get_where('promo', $where);
    }
}