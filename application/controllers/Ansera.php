<?php
if(!defined ('BASEPATH')) exit ('No direct script access allowed');

class Ansera extends CI_Controller {
    public function myfirstpage()
    {
        $this->load->helper('html');
        $this->load->view('my_first_page');
    }
}