<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	//Função Construct para trazer o carregamento da modal
    public function __construct()
    {
		parent::__construct();
		$this->load->model("dashboard_model");

	    
    }

	public function index()
	{
		$data["obras"] =  $this->dashboard_model->select_obras();
		$data["ouvidoria"] = $this->dashboard_model->select_ouvidoria();
		$data["total_gasto"] = $this->dashboard_model->select_total_gasto();
		$data["total_obras"] = $this->dashboard_model->select_total_obras_finalizada();
		$data["total_gasto_futuro"] = $this->dashboard_model->select_total_gasto_futuro();
		$data["obra_grafico"] = $this->dashboard_model->obra_grafico();
		$data["title"] = "Dashboard - FinAR";

		if($this->session->userdata('log')!="logged"){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/nav-top',$data);
			$this->load->view('pages/dashboard',$data);
			$this->load->view('templates/footer',$data);
			$this->load->view('templates/js',$data);
		}else{
			$this->load->view('templates/header',$data);
			$this->load->view('templates/nav-top',$data);
			$this->load->view('pages/dashboard',$data);
			$this->load->view('templates/footer',$data);
			$this->load->view('templates/js',$data);

			
		}
		
	}

}