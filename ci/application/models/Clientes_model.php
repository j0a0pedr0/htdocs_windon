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
            $clientes = $this->db->get_where('clientes',array('id'=>$id));
            return $clientes->row_array();
        }
    }

?>