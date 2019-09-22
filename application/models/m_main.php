<?php
class m_main extends CI_Model{
    function selectData(){
        $this->db->select('jadwal.id_jadwal, dosen.nik, dosen.nama, matkul.id_matkul, matkul.nama_matkul, matkul.sks, jurusan.nama_jurusan, matkul.status')->from('jadwal')->join('dosen', 'jadwal.nik = dosen.nik', 'inner')->join('matkul', 'jadwal.id_matkul = matkul.id_matkul', 'inner')->join('jurusan', 'jurusan.id_jurusan = matkul.id_jurusan', 'inner');
        $query=$this->db->get();
        return $query;
    }
    
    function insert_data($table, $data){
        $this->db->insert($table, $data);        
    }
    
    function edit($table, $where){
        return $this->db->get_where($table, $where);
    }
    
    function selectWhere($id){
        $this->db->select('jadwal.id_jadwal, dosen.nik, matkul.sks, dosen.nama, matkul.id_matkul, matkul.nama_matkul, jurusan.nama_jurusan, matkul.status, dosen.email')->from('jadwal')->join('dosen', 'jadwal.nik = dosen.nik', 'inner')->join('matkul', 'jadwal.id_matkul = matkul.id_matkul', 'inner')->join('jurusan', 'jurusan.id_jurusan = matkul.id_jurusan', 'inner')->having('jadwal.id_jadwal', $id);
        $query=$this->db->get();
        return $query;
    }
    
    function update_data($where, $table, $data){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    
    function delete_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}
?>