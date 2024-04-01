<?php
    class Siswa extends CI_Model {
        var $nama='';
        var $asalsekolah='';
        var $alamat='';
        var $nis='';

        function __construct()
        {
            // Call the Model Constructor
            parent::__construct();
        }

        function save(){
            $this->nama = $this->input->post('nama');
            $this->asalsekolah = $this->input->post('asalsekolah');
            $this->alamat = $this->input->post('alamat');
            $this->nis = $this->input->post('nis');
            $this->kelas = $this->input->post('kelas');
            $validasi_nis = $this->validasi_nis($this->nis);

            if($validasi_nis==true){
                $this->db->insert('siswa',$this);
                $return = array("level"=>"success");
            } else {
                $return = array("level"=>"failed");
            }
            return $return;
        }

        function validasi_nis($nis){
            $sql = "SELECT * FROM siswa WHERE nis=? ";
            $query=$this->db->query($sql, array($nis));
            $result=$query->result_array();

            if($query->num_rows() > 0){
                return false;
            } else {
                return true;
            }
        }

        function get_siswa(){
            $sql="SELECT * FROM siswa ";
            $query=$this->db->query($sql);
            $result=$query->result_array();
            return $result;
        }

        function get_siswa_by_nis($nis){
            $sql = "SELECT * FROM siswa WHERE nis=? ";
            $query=$this->db->query($sql, array($nis));
            $result=$query->result_array();
        }
        
    }
?>