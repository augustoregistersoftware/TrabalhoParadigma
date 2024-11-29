<?php

class Dashboard_model extends CI_Model {
    public function select_obras(){
        return $this->db->query("SELECT obra.*, DATE_FORMAT(obra.prazo, '%d/%m/%Y') AS data_formatada,endereco.rua,endereco.bairro,endereco.numero,endereco.cep FROM obra INNER JOIN endereco ON endereco.id_endereco = obra.id_endereco LIMIT 5")->result_array();
    }

    public function select_ouvidoria(){
        return $this->db->query("SELECT * FROM ouvidoria LIMIT 5")->result_array();
    }

    public function select_total_gasto(){
        return $this->db->query("SELECT SUM(valor_final) AS gasto FROM obra")->result_array();
    }

    public function select_total_obras_finalizada(){
        return $this->db->query("SELECT COUNT(*) AS finalizado FROM obra WHERE aprovado = 'C'")->result_array();
    }

    public function select_total_gasto_futuro(){
        return $this->db->query("SELECT SUM(valor_programado) AS gasto_futuro FROM obra WHERE aprovado = 'T'")->result_array();
    }

    public function obra_grafico(){
        return $this->db->query("SELECT
        id_obra, 
    CASE
            WHEN aprovado = 'F' THEN 'Reprovado'
            WHEN aprovado = 'T' THEN 'Aprovado'
            WHEN aprovado = 'C' THEN 'Finalizado'
            ELSE 'Indefinido'
        END AS status_obra,
        COUNT(*) AS quantidade
    FROM
        obra
    GROUP BY
        CASE
            WHEN aprovado = 'F' THEN 'Reprovado'
            WHEN aprovado = 'T' THEN 'Aprovado'
            WHEN aprovado = 'C' THEN 'Finalizado'
            ELSE 'Indefinido'
        END
    ORDER BY
        id_obra DESC
    LIMIT 5 
    ")->result_array();
    }

}