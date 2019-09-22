<?php
class m_grocellia extends CI_Model {
    
	function selectStaff(){
		return $this->db->get_where('user', array('userPosition'=>'staff'));
	}
    
    function selectedStaff($pageNum){
		return $this->db->get_where('user', array('userPosition'=>'staff'), 15, (($pageNum-1)*15));
	}

	function selectCust(){
		return $this->db->get_where('user', array('userPosition'=>'customer'));
	}
    
    function selectedCust($pageNum){
		return $this->db->get_where('user', array('userPosition'=>'customer'), 15, (($pageNum-1)*15));
	}

	function selectSup(){
		return $this->db->get_where('user', array('userPosition'=>'supplier'));
	}
    
    function selectSupIndex(){
		return $this->db->get_where('user', array('userPosition'=>'supplier'), 12);
	}
    
    function selectedSup($pageNum){
		return $this->db->get_where('user', array('userPosition'=>'supplier'), 15, (($pageNum-1)*15));
	}

	function selectGroc(){
        $this->db->select('*')->from('grocery')->join('type', 'type.typeId = grocery.typeId', 'inner')->join('promo', 'promo.promoId = grocery.promoId', 'inner');
        return $this->db->get();
	}
    
    function selectStore(){
		return $this->db->get('store');
	}
    
    function selectedStore($pageNum){
		return $this->db->get('store', 15, (($pageNum-1)*15));
	}
    
    function selectedGroc($pageNum){
        $this->db->select('*')->from('grocery')->join('type', 'type.typeId = grocery.typeId', 'inner')->join('promo', 'promo.promoId = grocery.promoId', 'inner');
        $this->db->limit(15, (($pageNum-1)*15));
		return $this->db->get();
	}
    
    function selectType(){
		return $this->db->get('type');
	}
    
    function selectingType($type){
        $this->db->select('*')->from('grocery')->join('type', 'type.typeId = grocery.typeId', 'inner')->join('promo', 'promo.promoId = grocery.promoId', 'inner');
        $this->db->where('grocery.typeId', $type);
		return $this->db->get();
	}
    
    function selectedType($pageNum){
		return $this->db->get('type', 15, (($pageNum-1)*15));
	}

	function insert_table($data, $table){
		$this->db->insert($table,$data);
	}

	function edit($where, $table){
		return $this->db->get_where($table, $where);
	}

	function update_data($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}