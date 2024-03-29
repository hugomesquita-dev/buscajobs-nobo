<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();

        //models
        $this->load->model('M_Acesso','acesso');
        
        //libs
        $this->load->library(array('session','permissoes'));
        $this->load->helper(array('form', 'url', 'html', 'directory'));
    }


	public function index()
	{


		// if(!isset(empty($this->session->userdata('log_hash_acesso')))){
		// 	echo "nao existe";

		// 	// $dados_acesso = $this->acesso->auth(array('p_operacao'  => 'CHECK_PERMISSAO',
	 //  //                                           'p_hash_acesso' => $this->session->userdata('log_hash_acesso')       
	 //  //                                       ));
		

		// }

		
		$data = array(
					'titulo' 		=> 'Login - BuscaJobs',
					'lista'			=> $this->permissoes->init_permissao($this->session->userdata('log_hash_acesso'))
				);


		$this->load->view('login', $data);
	}

    public function sair(){
        $this->session->unset_userdata('log_hash_acesso');
        $this->session->sess_destroy();
        redirect("login", "refresh");
    }


}
