<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->model('Clientes_model');
	}


	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nome','Nome','required');
		$this->form_validation->set_rules('email','Email','required');
		if($this->form_validation->run() == false){
			$data['clientes'] = $this->Clientes_model->listarClientes();
			$this->load->view('clientes',$data);
		}else{
			//Existe o post
			$data = ['nome'=>$this->input->post('nome'),'email'=>$this->input->post('email')];
			$this->db->insert('clientes',$data);
			echo 'O cliente foi inserido com suceso!';
		}
	}

	public function getCliente($idCliente){
		$info = $this->Clientes_model->getClienteById($idCliente);
		$data['nome'] = $info['nome'];
		$data['email'] = $info['email'];
		$this->load->view('cliente_single',$data);
	}

}
