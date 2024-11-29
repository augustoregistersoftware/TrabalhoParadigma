<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ouvidoria extends CI_Controller {

    private $idObra;
    private $data = [];
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Ouvidoria_model");
    }

    public function index()
    {
        $this->data["ouvidoria"] = $this->Ouvidoria_model->index();
        $this->data["title"] = "Ouvidoria - FinAR";

        $this->loadDefaultViews('pages/ouvidoria');
    }

    public function marilia()
    {
        $this->data["title"] = "Cadastro De Ouvidoria - FinAR";
        $this->load->view('pages/cadastro_ouvidoria', $this->data);
    }

    public function inserir()
    {
        $this->setOuvidoriaData();
        $cep = $this->input->post('cep');
        $valida = $this->Ouvidoria_model->selectCep($cep);

        if ($valida != '') {
            $this->Ouvidoria_model->inserte($this->data);    
        }else{
            $dataEndereco['cep'] = $this->input->post('cep');
            $dataEndereco['bairro'] = $this->input->post('bairro');
            $dataEndereco['rua'] = $this->input->post('rua');
            $dataEndereco['numero'] = $this->input->post('numero');
            $dataEndereco['cidade'] = $this->input->post('cidade');
            $dataEndereco['pais'] = 'br';

            $this->Ouvidoria_model->inserteEndereco($dataEndereco); 
            $this->Ouvidoria_model->inserte($this->data); 
        };
        
        redirect('ouvidoria/marilia');
    }

	public function aprovar($id,$cep)
	{
		$ouvidoriaData = $this->Ouvidoria_model->selectOuvidoria($id);
		$Obra['nome_obra'] = $ouvidoriaData['cidadao'];
		$Obra['descricao'] = $ouvidoriaData['reclamacao'];
        $Obra['id_endereco'] = $this->Ouvidoria_model->selectCep($cep);
		$Obra['aprovado'] = 'F';
		$this->Ouvidoria_model->insertObraOuvidoria($Obra);
		$this->Ouvidoria_model->delete($id);
        redirect('ouvidoria');	
	}

	public function deletar($id)
	{
		$this->Ouvidoria_model->delete($id);
        redirect('ouvidoria');	
	}

    private function setOuvidoriaData()
    {
        $this->data['cidadao'] = $this->input->post('nome');
        $this->data['cep'] = $this->input->post('cep');
        $this->data['bairro'] = $this->input->post('bairro');
        $this->data['rua'] = $this->input->post('rua');
        $this->data['numero'] = $this->input->post('numero');
        $this->data['endereco'] = $this->input->post('endereco_por_extenso');
        $this->data['reclamacao'] = $this->input->post('mensagem');
    }

    private function loadDefaultViews($page)
    {
        $this->load->view('templates/header', $this->data);
        $this->load->view('templates/nav-top', $this->data);
        $this->load->view($page, $this->data);
        $this->load->view('templates/footer', $this->data);
        $this->load->view('templates/js', $this->data);
    }
}
