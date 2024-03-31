<?php
if(!defined ('BASEPATH')) exit ('No direct script access allowed');

class Masipnu extends CI_Controller {
    public function percobaan()
    {
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->view('percobaan');
    }
}