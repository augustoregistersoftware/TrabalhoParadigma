<?php

class Cadastrologin_model extends CI_Model {
    public function index()
    {
        return $this->db->query("SELECT
        *
        FROM login")->result_array();
    }

    public function delete($id)
	{
        $this->db->where("id_login",$id);
        return $this->db->delete("login");
	}

    public function editarSenha($id)
    {
        return $this->db->query("SELECT
        *
        FROM login
        WHERE id_login = ".$this->db->escape($id)."")->row_array();  
    }

    public function editarSenhaUpdate($idLogin,$senhaNova)
    {
        $senha_info['senha'] = $senhaNova;
        $this->db->where("id_login",$idLogin);
        return $this->db->update("login",$senha_info);  
    }

    public function inserte($data)
	{
		$this->db->insert("login", $data);
	}


}