<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obra extends CI_Controller {

	private $idObra;
	//Função Construct para trazer o carregamento da modal
    public function __construct()
    {
		parent::__construct();
		$this->load->model("obra_model");
		

	    
    }

	public function index()
	{
		$data["obras"] =  $this->obra_model->index();
		$data["title"] = "Obras - FinAR";

		if($this->session->userdata('log')!="logged"){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/nav-top',$data);
			$this->load->view('pages/obra',$data);
			$this->load->view('templates/footer',$data);
			$this->load->view('templates/js',$data);
		}else{
			$this->load->view('templates/header',$data);
			$this->load->view('templates/nav-top',$data);
			$this->load->view('pages/obra',$data);
			$this->load->view('templates/footer',$data);
			$this->load->view('templates/js',$data);

			
		}
		
	}

	public function cadastro()
	{
		$data["endereco"] =  $this->obra_model->endereco();
		$data["title"] = "Cadastro Obras - FinAR";

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav-top',$data);
		$this->load->view('pages/cadastro_obra',$data);
        $this->load->view('templates/footer',$data);
		$this->load->view('templates/js',$data);
	}

	public function inserir()
	{
		$data['nome_obra'] = $_POST['nomeObra'];
		$data['descricao'] = $_POST['descricao'];
		$data['id_endereco'] = $_POST['endereco'];
		$data['ponto'] = $_POST['ponto'];
		$data['prazo'] = $_POST['prazo'];
		$data['responsavel'] = $_POST['responsavel'];
		$data['aprovado'] = 'F';
		$data['valor_programado'] = $_POST['valorNegociado'];

		$this->obra_model->inserte($data);
		redirect('obra');
	}

	public function deletar($id)
	{
		$this->obra_model->delete($id);
		redirect('obra');
	}

	public function finalizar($id)
	{
		$data["title"] = "Finalizar Obra - FinAR";
		$data["obras"] =  $this->obra_model->obraInfo($id);

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav-top',$data);
		$this->load->view('pages/finalizar_obra',$data);
		$this->load->view('templates/footer',$data);
		$this->load->view('templates/js',$data);

		$this->idObra = $id;
	}

	public function finalizarObraUpdt($id)
	{
		$valorFinal = $_POST['valor_final'];
		$usuarioFinalizacao = $this->session->userdata('name');
		$this->obra_model->finalizar($id,$valorFinal,$usuarioFinalizacao);
		redirect('obra');
	}

	public function aprovar($id)
	{
		$this->obra_model->aprovar($id);
		redirect('obra');
	}

	public function Edita($id)
	{
		$data["title"] = "Editar Obra - FinAR";
		$data['obra_editar'] = $this->obra_model->obraInfo($id);
		$data["endereco"] =  $this->obra_model->endereco();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav-top',$data);
		$this->load->view('pages/cadastro_obra',$data);
		$this->load->view('templates/footer',$data);
		$this->load->view('templates/js',$data);
	}

	public function update($id)
	{
		$nomeObra = $_POST['nomeObra'];
		$descricao = $_POST['descricao'];
		$id_endereco = $_POST['endereco'];
		$ponto = $_POST['ponto'];
		$prazo = $_POST['prazo'];
		$responsavel = $_POST['responsavel'];
		$valorNegociado = $_POST['valorNegociado'];

		$this->obra_model->update($id,$nomeObra,$descricao,$id_endereco,$ponto,$prazo,$responsavel,$valorNegociado);
        redirect('obra');
	}


}