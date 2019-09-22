<?php
class M_user extends CI_Model{
    /*function selectData(){
        $this->db->select('jadwal.id_jadwal, dosen.nik, dosen.nama, matkul.id_matkul, matkul.nama_matkul, matkul.sks, jurusan.nama_jurusan, matkul.status')->from('jadwal')->join('dosen', 'jadwal.nik = dosen.nik', 'inner')->join('matkul', 'jadwal.id_matkul = matkul.id_matkul', 'inner')->join('jurusan', 'jurusan.id_jurusan = matkul.id_jurusan', 'inner');
        $query=$this->db->get();
        return $query;
    }*/
    
    function countUser($position){
        $where = array('userPosition' => $position);
        return $this->db->get_where('user', $where)->num_rows();
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
    
    
}
?>