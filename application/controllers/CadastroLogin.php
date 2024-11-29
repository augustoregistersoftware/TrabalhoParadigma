<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CadastroLogin extends CI_Controller {

	private $idObra;
	//Função Construct para trazer o carregamento da modal
    public function __construct()
    {
		parent::__construct();
		$this->load->model("Cadastrologin_model");
    }

	public function index()
	{
		$data["login"] =  $this->Cadastrologin_model->index();
		$data["title"] = "Login - FinAR";

		if($this->session->userdata('log')!="logged"){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/nav-top',$data);
			$this->load->view('pages/cadastro_login',$data);
			$this->load->view('templates/footer',$data);
			$this->load->view('templates/js',$data);
		}else{
			$this->load->view('templates/header',$data);
			$this->load->view('templates/nav-top',$data);
			$this->load->view('pages/cadastro_login',$data);
			$this->load->view('templates/footer',$data);
			$this->load->view('templates/js',$data);

			
		}
		
	}

	public function cadastro()
	{
		$data["title"] = "Cadastro De Login - FinAR";

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav-top',$data);
		$this->load->view('pages/cadastrar_login',$data);
        $this->load->view('templates/footer',$data);
		$this->load->view('templates/js',$data);
	}

	public function inserir()
	{
        $senha_para_crip = 'bNzLsJB3/H$dasrg654fg';

		$data['nome']  = $_POST['nome']; 
		$data['email'] = $_POST['email'];
		$data['senha'] = openssl_encrypt($_POST['senha'],"AES-128-ECB",$senha_para_crip);

		$this->Cadastrologin_model->inserte($data);
		redirect('Cadastrologin');
	}

	public function deletar($id)
	{
		$this->Cadastrologin_model->delete($id);
		redirect('CadastroLogin');
	}

	public function editarSenha($id)
	{
		$data["title"] = "Editar Senha - FinAR";
		$data["senha"] =  $this->Cadastrologin_model->editarSenha($id);

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav-top',$data);
		$this->load->view('pages/editar_senha',$data);
		$this->load->view('templates/footer',$data);
		$this->load->view('templates/js',$data);
	}

    public function updateSenha($id)
    {
        $senha_para_crip = 'bNzLsJB3/H$dasrg654fg';
        $idLogin = $id;
        $senhaNova = openssl_encrypt($_POST['nova_senha'],"AES-128-ECB",$senha_para_crip);

        $this->Cadastrologin_model->editarSenhaUpdate($idLogin,$senhaNova);
        redirect('Cadastrologin');
    }



}