<?php

class Obra_model extends CI_Model {
    public function index()
    {
        return $this->db->query("SELECT *,
        CASE
            WHEN aprovado = 'F' THEN 'Reprovado'
            WHEN aprovado = 'T' THEN 'Aprovado'
            WHEN aprovado = 'C' THEN 'Finalizado'
            ELSE 'Indefinido'
        END AS status_obra,
        DATE_FORMAT(obra.prazo, '%d/%m/%Y') AS data_formatada,
        endereco.rua,
        endereco.bairro,
        endereco.numero,
        endereco.cidade,
        endereco.pais,
        endereco.cep,
        (obra.valor_final - obra.valor_programado) AS diferenca_valor
    FROM obra
    LEFT JOIN endereco ON endereco.id_endereco = obra.id_endereco;
    ")->result_array();
    }

    public function obraInfo($id)
    {
        return $this->db->query("SELECT *
        FROM obra WHERE id_obra = ".$this->db->escape($id)."")->row_array();
    }

    public function endereco()
    {
        return $this->db->query("SELECT * FROM endereco")->result_array();
    }

    public function inserte($data)
	{
		$this->db->insert("obra", $data);
	}

    public function delete($id)
	{
        $this->db->where("id_obra",$id);
        return $this->db->delete("obra");
	}

    public function finalizar($id,$valorFinal,$usuarioFinalizacao)
	{
        $obra_info['aprovado'] = 'C';
        $obra_info['valor_final'] = $valorFinal;
        $obra_info['user_finalizado'] = $usuarioFinalizacao;
        $this->db->where("id_obra",$id);
        return $this->db->update("obra",$obra_info);
	}

    public function aprovar($id)
	{
        $obra_info['aprovado'] = 'T';
        $this->db->where("id_obra",$id);
        return $this->db->update("obra",$obra_info);
	}
    
    public function update($id, $nomeObra, $descricao, $id_endereco, $ponto, $prazo, $responsavel, $valorNegociado)
    {
        $dadosAtualizados = array(
            'nome_obra' => $nomeObra,
            'descricao' => $descricao,
            'id_endereco' => $id_endereco,
            'ponto' => $ponto,
            'prazo' => $prazo,
            'responsavel' => $responsavel,
            'aprovado' => 'F',
            'valor_programado' => $valorNegociado
        );

        $this->db->where("id_obra", $id);
    
        return $this->db->update("obra", $dadosAtualizados);
    }
    
  
}