<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->has_userdata('user_id')) {
            $id = $this->session->userdata('user_id');

            $this->load->view('Admin/admin');
        } else {
            $this->load->view('Admin/login');
        }
    }

    public function add_users()
    {
        $data['divisions'] = $this->db->get('divisions')->result_array();
        $data['branches'] = $this->db->get('branch_preference_list')->result_array();
        $data['units'] = $this->db->get('navy_units')->result_array();
        $this->load->view('Admin/create_user', $data);
    }

    public function show_user_list()
    {
        $data['users_list'] = $this->db->where('is_active', 'yes')->where_not_in('acct_type', 'admin')->get('security_info')->result_array();
        $this->load->view('Admin/user_list', $data);
    }

    public function show_edit_user()
    {
        $data['users_list'] = $this->db->where('is_active', 'yes')->where_not_in('acct_type', 'admin')->get('security_info')->result_array();
        $this->load->view('Admin/edit_user_list', $data);
    }

    public function edit_user_profile($user_id = NULL)
    {
        $data['users_data'] = $this->db->where('is_active', 'yes')->where_not_in('acct_type', 'admin')->where('id', $user_id)->get('security_info')->row_array();
        $data['branches'] = $this->db->get('branch_preference_list')->result_array();
        $data['units'] = $this->db->get('navy_units')->result_array();
        //  print_r($data['branches']); exit;
        $this->load->view('Admin/edit_user', $data);
    }

    public function delete_user($user_id = NULL)
    {

        $update_array = array(
            'is_active' => 'no'
        );

        $cond  = ['id' => $user_id];
        $this->db->where($cond);
        $update = $this->db->update('security_info', $update_array);

        if (!empty($update)) {
            $this->session->set_flashdata('success', 'Account Deleted Successfully');
            redirect('Admin/show_user_list');
        } else {
            $this->session->set_flashdata('failure', 'Error');
            redirect('Admin/show_user_list');
        }
    }

    public function update_user($user_id = NULL)
    {

        $postData = $this->security->xss_clean($this->input->post());
        $username = $postData['username'];
        $pass = $postData['password'];
        $full_name = $postData['fullname'];
        $phone = $postData['phone'];
        $email = $postData['email'];
        $address = $postData['address'];
        $branch = $postData['branch'];
        $unit = $postData['unit'];


        $update_array = array(
            'username' => $username,
            // 'password' => password_hash($postData['password'], PASSWORD_DEFAULT),
            'full_name' => $full_name,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'branch' => $branch,
            'unit' => $unit
        );
        // print_r($update_array);exit;
        $cond  = ['id' => $user_id];
        $this->db->where($cond);
        $update = $this->db->update('security_info', $update_array);

        if (!empty($update)) {
            $this->session->set_flashdata('success', 'User Information Updated Successfully');
            redirect('Admin/show_edit_user');
        } else {
            $this->session->set_flashdata('failure', 'Error');
            redirect('Admin/show_edit_user');
        }
    }

    public function login_process()
    {
        if ($this->input->post()) {
            $postedData = $this->security->xss_clean($this->input->post());
            $username = $postedData['username'];
            $password = $postedData['password'];
            $query = $this->db->where('username', $username)->where('acct_type', 'admin')->get('security_info')->row_array();
            $hash = $query['password'];

            if (!empty($query)) {
                if (password_verify($password, $hash)) {
                    $this->session->set_userdata('user_id', $query['id']);
                    $this->session->set_userdata('status', $query['type']);
                    $this->session->set_userdata('username', $query['username']);
                    $this->session->set_flashdata('success', 'Login successfully');
                    redirect('Admin');
                } else {
                    $this->session->set_flashdata('failure', 'No such user exist. Kindly create New User using Admin panel');
                    redirect('Admin');
                }
                //print_r($query); exit; 
            } else {
                $this->session->set_flashdata('failure', 'Login failed');
                redirect('Admin');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Admin');
    }

    public function view_activity_log()
    {
        if ($this->session->has_userdata('user_id')) {
            $data['activity_log'] = $this->db->get('activity_log')->result_array();
            $this->load->view('Admin/activity_log', $data);
        }
    }

    public function add_user()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());

            $username = $postData['username'];
            $password = password_hash($postData['password'], PASSWORD_DEFAULT);
            $status = $postData['status'];
            if (isset($postData['div'])) {
                $division = $postData['div'];
            }
            $branch = $postData['branch'];
            $unit = $postData['unit'];

            $row_exist = 0;
            if ($status == 'do') {
                $row_exist = $this->db->select('count(*) as count')->where('acct_type', 'do')->where('division', $division)->where('is_active', 'yes')->get('security_info')->row_array();
            } else {
                $row_exist = 0;
            }

            if ($row_exist['count'] == 0) {
                $insert_array = array(
                    'username' => $username,
                    'password' => $password,
                    'acct_type' => $status,
                    'division' => $division,
                    'branch' => $branch,
                    'unit' => $unit
                );

                //print_r($insert_array);exit;
                $insert = $this->db->insert('security_info', $insert_array);

                if (!empty($insert)) {
                    $this->session->set_flashdata('success', 'User Created successfully');
                    redirect('Admin/add_users');
                } else {
                    $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                    redirect('Admin/add_users');
                }
            } else {
                $this->session->set_flashdata('failure', 'DO Account already exisit for ' . $division);
                redirect('Admin/add_users');
            }
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong, Try again.');
            redirect('Admin/add_users');
        }
    }
}
