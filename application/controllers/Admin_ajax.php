<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ajax extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('app_helper');


		//models
		$this->load->helper('string');
		$this->load->model('guardian_model');
		$this->load->model("admin_model");
		$this->load->model("students_model");
		$this->load->model("gate_logs_model");
		$this->load->model("canteen_model");
		$this->load->model("canteen_items_model");

		$this->load->library('form_validation');
		$this->load->library('session');
		
		$this->form_validation->set_error_delimiters('', '');
	}

	public function index()
	{
		show_404();
	}
	/* admin ajax*/
	public function applogin($arg='')
	{
		if($_POST){
			$this->form_validation->set_rules('account', 'Account', 'required|min_length[5]|max_length[12]|is_in_db[admins.username]|trim|htmlspecialchars');
			$this->form_validation->set_rules('account_password', 'Password', 'required|min_length[5]|max_length[12]|trim|htmlspecialchars');
			$this->form_validation->set_message('is_in_db', 'This account is not valid');

			if ($this->form_validation->run() == FALSE)
			{
				$data["is_valid"] = FALSE;
				$data["account_error"] = form_error('account');
				$data["account_password_error"] = form_error('account_password');
			}
			else
			{
				$data["username"] = $account_id = $this->input->post("account");
				$data["password"] = md5($account_password = $this->input->post("account_password"));
				// $data["var_dump"] = $this->admin_model->login($data);
				$data["is_valid"] = $this->admin_model->login($data);
				$data["account_error"] = "";
				
				if($data["is_valid"]){
					$data["account_password_error"] = "";
					$data["redirect"] = base_url("admin");


				}else{
					$data["account_password_error"] = "Incorrect Passord. Try Again.";
					$data["redirect"] = "";
				}
			}

			echo json_encode($data);
		}
	}
}