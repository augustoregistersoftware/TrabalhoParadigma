<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Endereco extends CI_Controller {
    public function __construct()
  {
    parent::__construct();
		$this->load->model("endereco_model");
    $this->load->model("obra_model");    
  } 

    public function index()
  {
    $data["endereco"] = $this->endereco_model->index();
    $data["title"] = "Endereços - FinAR";

    $this->load->view('templates/header',$data);
    $this->load->view('templates/nav-top',$data);
    $this->load->view('pages/endereco',$data);
    $this->load->view('templates/footer',$data);
    $this->load->view('templates/js',$data);
  }

    public function cadastro()
  {
    $data["title"] = "Cadastro De Endereços - FinAR";

    $this->load->view('templates/header',$data);
    $this->load->view('templates/nav-top',$data);
    $this->load->view('pages/cadastro_endereco',$data);
    $this->load->view('templates/footer',$data);
    $this->load->view('templates/js',$data);
  }

  public function inserir()
	{
		$data['cep'] = $_POST['cep'];
		$data['bairro'] = $_POST['bairro'];
		$data['rua'] = $_POST['rua'];
		$data['numero'] = $_POST['numero'];
		$data['cidade'] = $_POST['cidade'];
		$data['pais'] = $_POST['pais'];

		$this->endereco_model->inserte($data);
		redirect('endereco');
	}

  public function deletar($id)
  {
    $this->endereco_model->delete($id);
    redirect('endereco');
  }

  public function deletarObras($id)
  {
    $this->endereco_model->delete($id);
    $this->obra_model->delete($id);
    redirect('endereco');
  }
}