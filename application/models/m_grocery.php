<?php
class m_grocery extends CI_Model {
    function getTypeId(){
        return sprintf("TYP%04d", ($this->db->get_where('type')->num_rows()));
    }
    
    function getGroceryId(){
        return sprintf("GRO%04d", ($this->db->get_where('grocery')->num_rows()));
    }
    
    function selectActivePromo(){
        $where = array('promoEnd >' => date("Y-m-d"));
        return $this->db->get_where('promo', $where);
    }
	
}