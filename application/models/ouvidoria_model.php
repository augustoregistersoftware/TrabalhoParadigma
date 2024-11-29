<?php

class Ouvidoria_model extends CI_Model {
    public function index()
    {
        return $this->db->query("SELECT
        *
        FROM ouvidoria")->result_array();
    }

    public function selectCep($cep)
    {
        $query = $this->db->query("SELECT
        id_endereco
        FROM endereco where cep = ".$this->db->escape($cep)."");

        return $query->row()->id_endereco;
    }

    
    public function inserte($data)
	{
		$this->db->insert("ouvidoria", $data);
	}

    public function inserteEndereco($dataEndereco)
	{
		$this->db->insert("endereco", $dataEndereco);
	}

    public function insertObraOuvidoria($Obra)
    {
        $this->db->insert("obra", $Obra);  
    }

    public function delete($id)
    {
        $this->db->where("id_ouvidoria",$id);
        return $this->db->delete("ouvidoria");
    }

    public function selectOuvidoria($id)
    {
        return $this->db->query("SELECT
        *
        FROM ouvidoria WHERE id_ouvidoria = ".$this->db->escape($id)."")->row_array();
    }


}