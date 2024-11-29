<?php

class Endereco_model extends CI_Model {

    public function index()
    {
        return $this->db->query("SELECT * 
        FROM endereco")->result_array();
    }

    public function delete($id)
	{
        $this->db->where("id_endereco",$id);
        return $this->db->delete("endereco");
	}

    public function inserte($data)
	{
		$this->db->insert("endereco", $data);
	}
}