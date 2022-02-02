<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->has_userdata('user_id')) {
			$id = $this->session->userdata('user_id');
			$acct_type = $this->session->userdata('acct_type');

			if ($acct_type == "do") {
				redirect('D_O');
			} elseif ($acct_type == "joto") {
				redirect('JOTO');
			} elseif ($acct_type == "ct") {
				redirect('CT');
			} elseif ($acct_type == "co") {
				redirect('CO');
			} elseif ($acct_type == "exo") {
				redirect('EXO');
			} elseif ($acct_type == "sqc") {
				redirect('SQC');
			} elseif ($acct_type == "smo") {
				redirect('SMO');
			} elseif ($acct_type == "cao") {
				redirect('CAO');
			} elseif ($acct_type == "co") {
				redirect('CO');
			} elseif ($acct_type == "cao_sec") {
				redirect('CAO_SEC');
			} elseif ($acct_type == "dean") {
				redirect('DEAN');
			} elseif ($acct_type == "hougp") {
				redirect('HOUGP');
			} elseif ($acct_type == "ctmwt") {
				redirect('CTMWT');
			} elseif ($acct_type == "admin") {
				redirect('Admin');
			} else {
				$this->load->view('login');
			}
		} else {
			$this->load->view('login');
		}
	}

	public function dashboard()
	{
		$this->load->view('dashboard');
	}

	public function login_process()
	{

		if ($this->input->post()) {
			$postedData = $this->security->xss_clean($this->input->post());
			//To create encrypted password use
			$username = $postedData['username'];
			$password = $postedData['password'];
			$status = $postedData['role'];
			$query = $this->db->where('username', $username)->where('acct_type', $status)->where('is_active', 'yes')->get('security_info')->row_array();
			$hash = $query['password'];
			//print_r($query);exit;
			if (!empty($query)) {
				if (password_verify($password, $hash)) {
					$this->session->set_userdata('user_id', $query['id']);
					$this->session->set_userdata('acct_type', $query['acct_type']);
					$this->session->set_userdata('username', $query['username']);
					$this->session->set_userdata('division', $query['division']);
					$this->session->set_userdata('unit_name', $query['unit']); //Added by Awais Ahmad
					$this->session->set_userdata('branch_name', $query['branch']); //Added by Awais Ahmad
					$unit_id = $this->db->where('unit_name', $query['unit'])->get('navy_units')->row_array(); //Added by Awais Dated: 12 Dec 21
					$branch_id = $this->db->where('branch_name',$query['branch'])->get('branch_preference_list')->row_array();
					//echo $unit_id['id'];exit;
					$this->session->set_userdata('unit_id', $unit_id['id']); 	//added by Awais dated:12 Dec 2021
					$this->session->set_userdata('branch_id', $branch_id['id']); 	//added by Awais dated:12 Dec 2021
					$this->session->set_flashdata('success', 'Login successfully');

					$this->db->set('status', 'online');
					$this->db->where('id', $query['id']);
					$this->db->update('security_info');
				   // echo $this->session->userdata('acct_type');exit;
					redirect('User_Login');
				} else {
					$this->session->set_flashdata('failure', 'No such user exist. Kindly create New User using Admin panel');
					redirect('User_Login');
				}
				//print_r($query); exit; 
			} else {
				$this->session->set_flashdata('failure', 'Login failed');
				redirect('User_Login');
			}
		}
	}

	public function change_password()
	{
		$this->load->view('change_password');
	}

	public function change_password_process()
	{
		if ($this->input->post()) {
			$postData = $this->security->xss_clean($this->input->post());

			$new_password = password_hash($postData['new_password'], PASSWORD_DEFAULT);
			$id = $this->session->userdata('user_id');

			$cond  = ['ID' => $id];
			$insert_array = array(
				'password' => $new_password,
			);

			$this->db->where($cond);
			$update = $this->db->update('security_info', $insert_array);

			if (!empty($update)) {
				$this->session->set_flashdata('success', 'password Changed successfully');
				redirect('User_Login/change_password');
			} else {
				$this->session->set_flashdata('failure', 'Something went wrong, try again.');
				redirect('User_Login/change_password');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->db->set('status', 'offline');
		$this->db->where('id', $this->session->userdata('user_id'));
		$this->db->update('security_info');
		redirect('User_Login');
	}
}
