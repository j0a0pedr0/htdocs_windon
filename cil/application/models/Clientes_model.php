<?php
	

	class Clientes_model extends CI_Model
	{
		
		function __construct()
		{
			$this->load->database();
		}

		public function listarClientes(){
			$clientes = $this->db->get('clientes');

			return $clientes->result_array();
		}

		public function getClienteById($id){
			$cliente = $this->db->get_where('clientes',array('id'=>$id));
			return $cliente->row_array();
		}
	}

?>