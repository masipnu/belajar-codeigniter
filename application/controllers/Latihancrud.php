<?php
if(!defined ('BASEPATH')) exit ('No direct script access allowed');

class Latihancrud extends CI_Controller {
    function __constuct()
    {
        // Call the Model Constructor
        parent::__constuct();
        $this->load->model('siswa','',TRUE);
    }

    public function index()
    {
        $this->load->model('siswa','',TRUE);
        $result=$this->siswa->get_siswa();
        $data['result']=$result;
        $this->load->helper(array('html','form','url'));
        $this->load->library('form_validation');
        
        // Validasi Form
        $this->form_validation->set_rules('nis','Nis','callback_username_check');
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('kelas','Kelas','required');
        $this->form_validation->set_rules('asalsekolah','Asal Sekolah','required|min_length[5]');
        $this->form_validation->set_rules('alamat','Alamat','required|min_length[10]');
        if($this->input->post()){
            if ($this->form_validation->run() !=FALSE) {
                $save=$this->siswa->save();
                if($save['level']=="success"){
                    redirect('/latihancrud');
                }
            }
        }

        $this->load->view('latihancrud',$data);
    }

    public function username_check($nis)
    {
        $errMessage="";
        if(!is_numeric($nis)){
            $errMessage="NIS harus Angka!";
        } elseif (strlen($nis) < 4) {
            $errMessage="NIS minimal 4 karakter!";
        } elseif (strlen($nis) > 10) {
            $errMessage="NIS tidak boleh lebih dari 10!";
        } else {
            $validasi_nis=$this->siswa->validasi_nis($nis);
            if($validasi_nis==true){
                return true;
            } else {
                $errMessage='NIS sudah terdaftar, Coba lagi!';
            }
        }

        if(!empty($errMessage)){
            $this->form_validation->set_message('username_check',$errMessage);
            return FALSE;
        }
    }

    public function tampildata(){
        $this->load->helper(array('form','url'));
        $this->load->model('siswa','',TRUE);
        $datasiswa=$this->siswa->get_siswa();
        $data['datasiswa']=$datasiswa;
        $this->load->view('tampildata',$data);
    }

    public function edit()
    {
        $this->load->helper(array('form','url','html'));
        $this->load->library('form_validation');
        $this->load->model('siswa','',TRUE);
        $nis=$this->uri->segment(3);
        // $result=$this->siswa->get_siswa_by_nis($nis);
        $result=$this->siswa->get_siswa($nis);
        $data['nis']=$result[0]['nis'];
        $data['nama']=$result[0]['nama'];
        $data['asalsekolah']=$result[0]['asalsekolah'];
        $data['kelas']=$result[0]['kelas'];
        $data['alamat']=$result[0]['alamat'];

        // Validasi form
        $this->form_validation->set_rules('nis','Nis','required|max_length[10]|numeric|callback_username_check');
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('kelas','Kelas','required');
        $this->form_validation->set_rules('asalsekolah','Asal Sekolah','required|min_length[5]');
        $this->form_validation->set_rules('alamat','Alamat','required|min_length[10]');
        
        if($this->input->post()){
            $data['nis']=$this->input->post('nis');
            $data['nama']=$this->input->post('nama');
            $data['asalsekolah']=$this->input->post('asalsekolah');
            $data['kelas']=$this->input->post('kelas');
            $data['alamat']=$this->input->post('alamat');

            if($this->form_validation->run() !=FALSE){
                $edit=$this->siswa->edit($nis);
                if($edit['level']=="success"){
                    redirect('/latihancrud');
                }
            }
        }

        $this->load->view('edit',$data);
    }
}