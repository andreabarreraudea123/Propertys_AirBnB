<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property extends CI_Controller {

	public function index()
	{
        $result = array('properties'=> $this->UsersModel->listProperties());
		$this->load->view('layouts/header');
		$this->load->view('property',$result);
		$this->load->view('layouts/footer');
    }
    
    public function addProperty()
	{
       // $result = array('properties'=> $this->UsersModel->listProperties());
		$this->load->view('layouts/header');
		$this->load->view('addproperty');
		$this->load->view('layouts/footer');
	}
	
}