<?php
class m_supplier extends CI_Model {
    function getSupplier($id){
        $where = array('userId' => $id);
        return $this->db->get_where('user', $where);
    }
    
    function getSupplierDetail($id){
        $this->db->select('supplierdetail.suppId, grocery.grocName, grocery.grocId, supplierdetail.suppDetailStatus, supplierdetail.suppDetailPrice')->from('supplierdetail')->join('grocery', 'grocery.grocId = supplierdetail.grocId')->where(array('supplierdetail.suppId' => $id));
        return $this->db->get();
    }
}