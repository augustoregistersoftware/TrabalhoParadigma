<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	//Função Construct para trazer o carregamento da modal
    public function __construct()
    {
		parent::__construct();
		$this->load->model("login_model");
    }

	public function index()
	{
		#$data["login"] =  $this->empresa_model->index();
		$data["title"] = "Login - FinAR";
		$this->session->sess_destroy();

		$this->load->view('pages/login',$data);
	}

    public function password()
	{
		#$data["login"] =  $this->empresa_model->index();
		$data["title"] = "Login - FinAR";

		$this->load->view('pages/esqueceu_senha',$data);
	}

	public function auth()
	{
		$senha_para_crip = 'bNzLsJB3/H$dasrg654fg';
		$email = $this->input->post('username');
		$senha = openssl_encrypt($this->input->post('password'),"AES-128-ECB",$senha_para_crip);

		$validate = $this->login_model->auth($email,$senha);
		$validade_count = count($validate);

		if ($validade_count > 0){
			$this->session->set_userdata('name',$validate['nome']);
			redirect("dashboard?aviso=sucesso");
		}else{
			$this->session->set_flashdata('warning','Acesso Negado!');
			redirect("login");
		}
	}


	public function esqueceu_senha()
	{
		#$apelido = $_POST['username'];
		#$email = $_POST['cmail'];

		#mais seguro contra xss
		$senha_para_crip = 'bNzLsJB3/H$dasrg654fg';
		$apelido = $this->input->post('username'); 
		$email = $this->input->post('cmail'); 
		$subject = 'RECUPERAÇÃO DA SENHA';


		$senhaa = $this->login_model->senha($email,$apelido);
		$senha = $senhaa['senha'];
		#$senha = openssl_decrypt($senhaa['senha'],"AES-128-ECB",$senha_para_crip);
		$this->login_model->enviarEmail($email,$subject,$senha);
		redirect('login?aviso=envio');
	}


}