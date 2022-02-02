<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class EXO extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->has_userdata('user_id')) {
            $id = $this->session->userdata('user_id');
            $this->load->view('exo/dashboard');
        } else {
            $this->load->view('login');
        }
    }
 public function get_semester_list()
    {
        $branch_id = $_POST['branch_id'];
        if ($branch_id == 2) {
            $semster_list = array('4WE', '5WE', '6WE', '7WE', '8WE');
        } else if ($branch_id == 4) {
            $semster_list = array('4ME', '5ME', '6ME', '7ME', '8ME');
        } else if ($branch_id == 1) {
            $semster_list = array('5MS', '6MS', 'GLOPS');
        } else if ($branch_id == 3) {
            $semster_list = array('3LOG', '4LOG', '5LOG', '6LOG', '7LOG', '8LOG');
        }

        echo json_encode($semster_list);
    }
    public function PN_Form()
    {
        if ($this->session->has_userdata('user_id')) {
            $data['divisions'] = $this->db->where('division_name', $this->session->userdata('division'))->get('divisions')->result_array();
            $this->load->view('exo/pn_form1', $data);
        }
    }

    public function save_cadet_club()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());

            $oc_no = $postData['oc_num'];
            $club = $postData['club'];
            $id = $postData['p_id'];

            $insert_array = array(
                'p_id' => $id,
                'assigned_club' => $club,
                'do_id' => $this->session->userdata('user_id'),
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );

            $update_array = array(
                'status' =>  'deleted'
            );
            $this->db->where('p_id', $id)->update('club_records', $update_array);
            $insert = $this->db->insert('club_records', $insert_array);

            $cond  = ['oc_no' => $oc_no];
            $data_update = [
                'club' => $club
            ];

            $this->db->where($cond);
            $update = $this->db->update('pn_form1s', $data_update);

            if (!empty($insert)) {

                $cadet_name = $this->db->select('name')->where('oc_no', $oc_no)->get('pn_form1s')->row_array();

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => "Cadet " . $cadet_name['name'] . " has been added to Club: " . $club,
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }

            }

            if (!empty($update) && !empty($insert)) {
                $this->session->set_flashdata('success', 'Cadet added to Club successfully');
                redirect('EXO/add_club');
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                redirect('EXO/add_club');
            }
        }
    }

    public function update_cadet_club()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());


            $club = $postData['club'];
            $id = $postData['club_id'];
            $p_id = $postData['p_id_ec'];
            $oc_num_ec = $postData['oc_num_ec'];
            //echo "sdfsdf".$p_id;exit;

            //uddate previous club_records with same p_id
            $cond  = ['p_id' => $p_id];
            $data_update = [
                'status' => 'deleted'
            ];

            $this->db->where($cond);
            $update = $this->db->update('club_records', $data_update);

            //uddate in pn_form1s
            $cond  = ['oc_no' => $oc_num_ec];
            $data_update1 = [
                'club' => $club
            ];

            $this->db->where($cond);
            $update = $this->db->update('pn_form1s', $data_update1);


            $insert_array = array(
                'p_id' => $p_id,
                'assigned_club' => $club,
                'do_id' => $this->session->userdata('user_id'),
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            $insert = $this->db->insert('club_records', $insert_array);

            if (!empty($insert)) {

                $cadet_name = $this->db->select('name')->where('oc_no', $oc_num_ec)->get('pn_form1s')->row_array();

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => "Cadet " . $cadet_name['name'] . " has been updated to Club: " . $club,
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($insert)) {
                $this->session->set_flashdata('success', 'Cadet Club Updated successfully');
                redirect('EXO/view_dossier');
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                redirect('EXO/view_dossier');
            }
        }
    }

    public function add_PN_Form()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());

            $oc_no = $postData['oc_no'];
            $pno = $postData['pno'];
            $name = $postData['name'];
            $class = $postData['class'];
            $batch_no = $postData['batch_no'];
            $category = $postData['category'];
            $div_name = $postData['div'];
            $term = $postData['term'];

            $insert_array = array(
                'oc_no' => $oc_no,
                'p_no' => $pno,
                'name' => $name,
                'class' => $class,
                'issb_batch' => $batch_no,
                'do_id' => $this->session->userdata('user_id'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category' => $category,
                'divison_name' => $div_name,
                'term' => $term,
                'unit_id' => 1 //By default Cadet is in unit PNS Rahbar (PNA)

            );

            $insert = $this->db->insert('pn_form1s', $insert_array);

            if (!empty($insert)) {

                $cadet_name = $this->db->select('name')->where('oc_no', $oc_no)->get('pn_form1s')->row_array();

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => "A New Cadet " . $cadet_name['name'] . " has been added",
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($insert)) {
                $this->session->set_flashdata('success', 'Data Submitted successfully');
                redirect('EXO/PN_Form');
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                redirect('EXO/PN_Form');
            }
        }
    }

    public function view_edit_inspection($id = null)
    {
        $this->db->select('pr.*, f.*');
        $this->db->from('inspection_records pr');
        $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
        // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
        $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
        $this->db->where('pr.id', $id);
        $data['pn_inspection_data'] = $this->db->get()->row_array();
        $this->load->view('exo/edit_inspection_record', $data);
    }

    public function view_edit_personal_record($id = null)
    {
        $this->db->select('pr.*, f.*');
        $this->db->from('personal_datas pr');
        $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
        // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
        $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
        $this->db->where('pr.p_id', $id);
        $data['pn_personal_data'] = $this->db->get()->row_array();

        $data['divisions'] = $this->db->where('division_name', $this->session->userdata('division'))->get('divisions')->result_array();
        //print_r($data['pn_personal_data']);exit;

        $this->load->view('exo/edit_personal_data', $data);
    }


    public function add_inspection_record()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());

            $officer_id = $postData['id'];
            $date = $postData['date'];
            $inspecting_officer_name = $postData['inspector_name'];
            $remarks = $postData['remarks'];

            $insert_array = array(
                'p_id' => $officer_id,
                'date' => $date,
                'inspecting_officer_name' => $inspecting_officer_name,
                'remarks' => $remarks,
                'do_id' => $this->session->userdata('user_id'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );

            $insert = $this->db->insert('inspection_records', $insert_array);

            if (!empty($insert)) {

                $cadet_name = $this->db->select('name')->where('p_id', $officer_id)->get('pn_form1s')->row_array();

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => "Inspection record has been added for Cadet " . $cadet_name['name'] . " by officer " . $inspecting_officer_name,
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($insert)) {
                $this->session->set_flashdata('success', 'Data Submitted successfully');
                redirect('EXO/Inspection_record');
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                redirect('EXO/Inspection_record');
            }
        }
    }

    public function update_inspection_record()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());

            $row_id = $postData['row_id'];
            $officer_id = $postData['id'];
            $date = $postData['date'];
            $inspecting_officer_name = $postData['inspector_name'];
            $remarks = $postData['remarks'];

            $update_array = array(
                'date' => $date,
                'inspecting_officer_name' => $inspecting_officer_name,
                'remarks' => $remarks,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', $row_id);
            $insert = $this->db->update('inspection_records', $update_array);

            if (!empty($insert)) {

                $cadet_name = $this->db->select('name')->where('p_id', $officer_id)->get('pn_form1s')->row_array();

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => "Inspection record has been updated for Cadet " . $cadet_name['name'] . " by officer " . $inspecting_officer_name,
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($insert)) {
                $this->session->set_flashdata('success', 'Data Updated successfully');
                redirect('EXO/view_dossier_folder');
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                redirect('EXO/view_dossier_folder');
            }
        }
    }

    public function add_personal_record()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());

            //Insert into PN Form 1 Table
            $oc_no = $postData['oc_no'];
            $p_no = $postData['pno'];
            $name = $postData['name'];
            $class = $postData['class'];
            $batch_no = $postData['batch_no'];
            $category = $postData['category'];
            $div_name = $postData['div'];
            $term = $postData['term'];
            $country = $postData['country'];

            $insert_array_pnform = array(
                'oc_no' => $oc_no,
                'p_no' => $p_no,
                'name' => $name,
                'class' => $class,
                'issb_batch' => $batch_no,
                'do_id' => $this->session->userdata('user_id'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'category' => $category,
                'divison_name' => $div_name,
                'term' => $term,
                'phase' => 'Phase 1',
                'bahadur' => $country,
                'unit_id' => 1 //By default Cadet is in unit PNS Rahbar (PNA)
            );


            $insert_pnform = $this->db->insert('pn_form1s', $insert_array_pnform);
            $inserted_officer_id = $this->db->insert_id();

            $upload1 = $this->upload($_FILES['report']);
            if (count($upload1) > 1) {
                $files = implode(',', $upload1);
            } else {
                $files = $upload1[0];
            }

            $officer_id = $inserted_officer_id;
            $course = $postData['course'];
            $religion = $postData['religion'];
            $e_contact = $postData['e_contact'];
            $telephone_no = $postData['telephone'];
            $ex_army = $postData['army'];
            $father_name = $postData['father_name'];
            $father_occupation = $postData['occupation'];
            $next_of_kin = $postData['next_of_kin'];
            $siblings = $postData['siblings'];
            $near_relatives = $postData['relatives'];
            $identification_marks = $postData['mark'];
            $height = $postData['height'];
            $weight = $postData['weight'];
            $navy_joining_date = $postData['joining_date'];
            $entry_mode = $postData['entry_mode'];
            $service_id = $postData['service_no'];
            $nic = $postData['cnic'];
            $blood_group = $postData['blood'];
            $address = $postData['address'];
            $karachi_address = $postData['khi_address'];
            $matric_school = $postData['matric'];
            $matric_division = $postData['grade_matric'];
            $intermediate_college = $postData['college'];
            $intermediate_division = $postData['grade_intermediate'];
            $diploma = $postData['diploma'];


            $insert_array = array(
                'p_id' => $officer_id,
                'p_no' => $p_no,
                'course' => $course,
                'religion' => $religion,
                'emergency_contact' => $e_contact,
                'telephone_no' => $telephone_no,
                'ex_army' => $ex_army,
                'father_name' => $father_name,
                'father_occupation' => $father_occupation,
                'next_of_kin' => $next_of_kin,
                'siblings' => $siblings,
                'near_relatives' => $near_relatives,
                'identification_marks' => $identification_marks,
                'height' => $height,
                'weight' => $weight,
                'navy_joining_date' => $navy_joining_date,
                'entry_mode' => $entry_mode,
                'service_id' => $service_id,
                'nic' => $nic,
                'blood_group' => $blood_group,
                'address' => $address,
                'karachi_address' => $karachi_address,
                'matric_school' => $matric_school,
                'matric_division' => $matric_division,
                'intermediate_college' => $intermediate_college,
                'intermediate_division' => $intermediate_division,
                'diploma' => $diploma,
                'do_id' => $this->session->userdata('user_id'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'upload_file' => $files
            );

            $insert = $this->db->insert('personal_datas', $insert_array);

            if (!empty($insert)) {

                $cadet_name = $this->db->select('name')->where('p_id', $officer_id)->get('pn_form1s')->row_array();

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => "Personal record has been added for Cadet " . $cadet_name['name'],
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($insert)) {
                $this->session->set_flashdata('success', 'Data Submitted successfully');
                redirect('EXO/personal_data');
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                redirect('EXO/personal_data');
            }
        }
    }

    public function update_personal_record()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());
            if ($_FILES['report']['name'][0] != null) {
                $upload1 = $this->upload($_FILES['report']);
                if (count($upload1) > 1) {
                    $files = implode(',', $upload1);
                } else {
                    $files = $upload1[0];
                }
            } else {
                $files = '';
            }

            $row_id = $postData['row_id'];
            $officer_id = $postData['row_pid'];
            $p_no = $postData['pno'];
            $course = $postData['course'];
            $religion = $postData['religion'];
            $e_contact = $postData['e_contact'];
            $telephone_no = $postData['telephone'];
            $ex_army = $postData['army'];
            $father_name = $postData['father_name'];
            $father_occupation = $postData['occupation'];
            $next_of_kin = $postData['next_of_kin'];
            $siblings = $postData['siblings'];
            $near_relatives = $postData['relatives'];
            $identification_marks = $postData['mark'];
            $height = $postData['height'];
            $weight = $postData['weight'];
            $navy_joining_date = $postData['joining_date'];
            $entry_mode = $postData['entry_mode'];
            $service_id = $postData['service_no'];
            $nic = $postData['cnic'];
            $blood_group = $postData['blood'];
            $address = $postData['address'];
            $karachi_address = $postData['khi_address'];
            $matric_school = $postData['matric'];
            $matric_division = $postData['grade_matric'];
            $intermediate_college = $postData['college'];
            $intermediate_division = $postData['grade_intermediate'];
            $diploma = $postData['diploma'];

            $update_array = array(
                'p_id' => $officer_id,
                'p_no' => $p_no,
                'course' => $course,
                'religion' => $religion,
                'emergency_contact' => $e_contact,
                'telephone_no' => $telephone_no,
                'ex_army' => $ex_army,
                'father_name' => $father_name,
                'father_occupation' => $father_occupation,
                'next_of_kin' => $next_of_kin,
                'siblings' => $siblings,
                'near_relatives' => $near_relatives,
                'identification_marks' => $identification_marks,
                'height' => $height,
                'weight' => $weight,
                'navy_joining_date' => $navy_joining_date,
                'entry_mode' => $entry_mode,
                'service_id' => $service_id,
                'nic' => $nic,
                'blood_group' => $blood_group,
                'address' => $address,
                'karachi_address' => $karachi_address,
                'matric_school' => $matric_school,
                'matric_division' => $matric_division,
                'intermediate_college' => $intermediate_division,
                'intermediate_division' => $intermediate_division,
                'diploma' => $diploma,
                'do_id' => $this->session->userdata('user_id'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'upload_file' => $files
            );
            $this->db->where('p_id', $officer_id);
            $insert = $this->db->update('personal_datas', $update_array);

            if (!empty($insert)) {

                $cadet_name = $this->db->select('name')->where('p_id', $officer_id)->get('pn_form1s')->row_array();

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => "Personal record has been updated for Cadet " . $cadet_name['name'],
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($insert)) {
                $this->session->set_flashdata('success', 'Data Updated successfully');
                redirect('EXO/view_dossier_folder');
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                redirect('EXO/view_dossier_folder');
            }
        }
    }

    public function save_cadet_punishment()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());

            $id = $postData['id'];
            $oc_no = $postData['oc_num'];
            $punish = $postData['punish'];
            $offense = $postData['offense'];
            // $div_name = $postData['division'];
            $term = $postData['term'];
            $start_date = $postData['start_date'];
            $end_date = $postData['end_date'];
            $days = $postData['days'];
            $awarded_by = $this->session->userdata('username');
            $awarded_id = $this->session->userdata('user_id');

            $insert_array = array(
                'oc_no' => $oc_no,
                'p_id' => $id,
                'date' => date('Y-m-d'),
                'offence' => $offense,
                'punishment_awarded' => $punish,
                'do_id' => $awarded_id,
                'awarded_by' => $awarded_by,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'term' => $term,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'days' => $days,
                'status' => 'Pending'

            );

            $insert = $this->db->insert('punishment_records', $insert_array);

            if (!empty($insert)) {

                $cadet_name = $this->db->select('name')->where('oc_no', $oc_no)->get('pn_form1s')->row_array();

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => "Punihsment added for Cadet " . $cadet_name['name'],
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($insert)) {
                $this->session->set_flashdata('success', 'Punishment added successfully');
                redirect('EXO/add_punishment');
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                redirect('EXO/add_punishment');
            }
        }
    }

    public function save_cadet_result($result_type = NULL)
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());

            if ($_FILES['file']['name'][0] != NULL) {
                $upload1 = $this->upload_result($_FILES['file']);
                if (count($upload1) > 1) {
                    $files = implode(',', $upload1);
                } else {
                    $files = $upload1[0];
                }
            } else {
                $files = '';
            }
            $file_size = $_FILES['file']['size'] . " kb";
            $file_name = $_FILES['file']['name'];
            $file_type = $_FILES['file']['type'];
            $file_path = $_FILES['file']['tmp_name'];

            $id = $postData['id'];
            $term = $postData['term'];

            $insert_array = array(
                'file_name' => $file_name,
                'file_type' => $file_type,
                'file_path' => $file_path,
                'file_size' => $file_size,
                'p_id' => $id,
                'do_id' => $this->session->userdata('user_id'),
                'phase' => 'Phase 1',
                'term' => $term,
                'doc_name' => $result_type,
                'doc_type' => $result_type,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );

            $insert = $this->db->insert('academic_records', $insert_array);

            if (!empty($insert)) {

                $cadet_name = $this->db->select('name')->where('p_id', $id)->get('pn_form1s')->row_array();

                if ($result_type == 'SeaTraining') {
                    $display_result = "Sea Training Result";
                } else if ($result_type == 'Result') {
                    $display_result = "Result";
                }

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => $display_result . " has been added for Cadet " . $cadet_name['name'],
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($insert)) {
                if ($result_type == 'Result') {
                    $this->session->set_flashdata('success', 'Result added successfully');
                    redirect('EXO/view_result');
                } else if ($result_type == 'SeaTraining') {
                    $this->session->set_flashdata('success', 'Sea Training Report added successfully');
                    redirect('EXO/view_training_report');
                }
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                redirect('EXO/view_result');
            }
        }
    }

    public function update_punishment()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());

            if (isset($postData['page'])) {
                $page = $postData['page'];
            } else if (isset($postData['page_punish'])) {
                $page = $postData['page_punish'];
            }

            if ($page == 'daily_module') {
                $id = $postData['punish_id'];
                $punish = $postData['punish'];
                $start_date = $postData['start_date'];
                $end_date = $postData['end_date'];
                $days = $postData['days'];
            } else if ($page == 'update_punishment') {
                $id = $postData['punish_id_update'];
                $punish = $postData['punish_update'];
                $start_date = $postData['start_date_punish'];
                $end_date = $postData['end_date_punish'];
                $days = $postData['days_punish'];
            }

            if (isset($postData['offense'])) {
                $data_update = [
                    'punishment_awarded' => $punish,
                    'start_date' => $start_date,
                    'date' => date('Y-m-d'),
                    'offence' => $postData['offense'],
                    'end_date' => $end_date,
                    'days' => $days,
                    'updated_at' => date('Y-m-d H:i:s')
                ];
            } else {
                $data_update = [
                    'punishment_awarded' => $punish,
                    'date' => date('Y-m-d'),
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'days' => $days,
                    'updated_at' => date('Y-m-d H:i:s')
                ];
            }

            $cond  = ['id' => $id];

            $this->db->where($cond);
            $update = $this->db->update('punishment_records', $data_update);

            if (!empty($update)) {

                $p_id = $this->db->select('p_id')->where('id', $id)->get('punishment_records')->row_array();
                $cadet_name = $this->db->select('name')->where('p_id', $p_id['p_id'])->get('pn_form1s')->row_array();

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => "Punihsment added for Cadet " . $cadet_name['name'],
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($update)) {
                $this->session->set_flashdata('success', 'Punishment updated successfully');

                if ($page == 'daily_module' || $page == 'update_punishment') {
                    redirect('EXO/view_punishment_list');
                } elseif ($page == 'dossier') {
                    redirect('EXO/view_dossier');
                }
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');

                if ($page == 'daily_module' || $page == 'update_punishment') {
                    redirect('EXO/view_punishment_list');
                } elseif ($page == 'dossier') {
                    redirect('EXO/view_dossier');
                }
            }
        }
    }

    public function edit_punishment_data()
    {
        if ($this->session->has_userdata('user_id')) {
            $punish_id = $_POST['id'];

            $this->db->select('pr.*, f.*');
            $this->db->from('punishment_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('pr.id', $punish_id);
           // $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $data['edit_record'] = $this->db->get()->row_array();

            echo json_encode($data['edit_record']);
        }
    }


    public function save_cadet_excuse()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());

            $id = $postData['id'];
            $oc_no = $postData['oc_num'];
            $excuse = $postData['excuse'];
            $disease = $postData['disease'];
            // $div_name = $postData['division'];
            $term = $postData['term'];
            $start_date = $postData['start_date'];
            $end_date = $postData['end_date'];
            // $awarded_by = $this->session->userdata('username');
            $awarded_id = $this->session->userdata('user_id');

            $insert_array = array(
                'oc_no' => $oc_no,
                'p_id' => $id,
                'date' => date('Y-m-d'),
                'disease' => $disease,
                'mo_remarks' => $excuse,
                'do_id' => $awarded_id,
                // 'awarded_by' => $awarded_by,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'term' => $term,
                'start_date' => $start_date,
                'end_date' => $end_date

            );

            $insert = $this->db->insert('medical_records', $insert_array);

            if (!empty($insert)) {

                $cadet_name = $this->db->select('name')->where('oc_no', $oc_no)->get('pn_form1s')->row_array();

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => "Excuse has been added for Cadet " . $cadet_name['name'],
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($insert)) {
                $this->session->set_flashdata('success', 'Excuse added successfully');
                redirect('EXO/add_excuse');
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                redirect('EXO/add_excuse');
            }
        }
    }

    public function save_cadet_observation()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());

            $id = $postData['id'];
            // $oc_no = $postData['oc_num'];
            $observation = $postData['observation'];
            $term = $postData['term'];
            $awarded_by = $this->session->userdata('username');
            $awarded_id = $this->session->userdata('user_id');

            $insert_array = array(
                //  'oc_no' => $oc_no,
                'p_id' => $id,
                'date' => date('Y-m-d'),
                'observation' => $observation,
                'do_id' => $awarded_id,
                'observed_by' => $awarded_by,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'term' => $term,
                'status' => 'Pending'
            );

            $insert = $this->db->insert('observation_records', $insert_array);

            if (!empty($insert)) {

                $cadet_name = $this->db->select('name')->where('p_id', $id)->get('pn_form1s')->row_array();

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => "Observation has been added for Cadet " . $cadet_name['name'],
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($insert)) {
                $this->session->set_flashdata('success', 'Observation added successfully');
                redirect('EXO/add_observation');
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                redirect('EXO/add_observation');
            }
        }
    }

    public function update_cadet_observation()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());
            //print_r($postData);exit;

            if (isset($postData['page'])) {
                $page = $postData['page'];
            } else {
                $page = '';
            }
            $id = $postData['observation_id'];
            $observation = $postData['observation'];
            $term = $postData['term'];

            $update_array = array(
                'observation' => $observation,
                'updated_at' => date('Y-m-d H:i:s'),

            );
            echo $id;
            // print_r($update_array);exit;
            $cond  = ['id' => $id];
            $this->db->where($cond);
            $insert = $this->db->update('observation_records', $update_array);

            if (!empty($insert)) {

                $p_id = $this->db->select('p_id')->where('id', $id)->get('observation_records')->row_array();
                $cadet_name = $this->db->select('name')->where('p_id', $p_id['p_id'])->get('pn_form1s')->row_array();

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => "Observation has been updated for Cadet " . $cadet_name['name'],
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($insert)) {
                if ($page == 'daily_module') {
                    $this->session->set_flashdata('success', 'Observation updated successfully');
                    redirect('EXO/view_observation_list');
                } elseif ($page == 'dossier') {
                    $this->session->set_flashdata('success', 'Observation updated successfully');
                    redirect('EXO/view_dossier');
                } else {
                    $this->session->set_flashdata('success', 'Observation updated successfully');
                    redirect('EXO/view_dossier_folder');
                }
            } else {

                if ($page == 'daily_module') {
                    $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                    redirect('EXO/view_observation_list');
                } elseif ($page == 'dossier') {
                    $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                    redirect('EXO/view_dossier');
                } else {
                    $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                    redirect('EXO/view_dossier_folder');
                }
            }
        }
    }

    public function save_cadet_warning()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());
            //print_r($_FILES['file']['name'][0] != NULL);
            if ($_FILES['file']['name'][0] != NULL) {
                $upload1 = $this->upload_warning($_FILES['file']);
                if (count($upload1) > 1) {
                    $files = implode(',', $upload1);
                } else {
                    $files = $upload1[0];
                }
            } else {
                $files = '';
            }

            $id = $postData['id'];
            $oc_no = $postData['oc_num'];
            $date = $postData['date'];
            $issued_by = $postData['issued_by'];
            // $div_name = $postData['division'];
            $type = $postData['warning_type'];
            $reason = $postData['reason'];


            $insert_array = array(
                'oc_no' => $oc_no,
                'p_id' => $id,
                'date' => date('Y-m-d'),
                'file' => $files,
                'issued_by' => $issued_by,
                'type' => $type,
                'do_id' => $this->session->userdata('user_id'),
                'reasons' => $reason,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            $insert = $this->db->insert('warning_records', $insert_array);

            if (!empty($insert)) {

                $cadet_name = $this->db->select('name')->where('oc_no', $oc_no)->get('pn_form1s')->row_array();

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => "Warning has been added for Cadet " . $cadet_name['name'],
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($insert)) {
                $this->session->set_flashdata('success', 'Warning added successfully');
                redirect('EXO/add_warning');
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                redirect('EXO/add_warning');
            }
        }
    }

    public function view_edit_officer_record($row_id = null)
    {

        $this->db->select('pr.*, f.*');
        $this->db->from('divisional_officer_records pr');
        $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
        // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
        $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
        // $this->db->where('f.oc_no', $oc_no);
        $this->db->where('pr.id', $row_id);
        $data['divisional_officer_data'] = $this->db->get()->row_array();
        // print_r($data['divisional_officer_data']);exit;
        $this->load->view('exo/edit_officer_record', $data);
    }

    public function save_divisional_officer_records()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());

            $id = $postData['id'];
            $rank = $postData['rank'];
            $officer_name = $postData['officer_name'];
            $start_date = $postData['date_from'];
            $end_date = $postData['date_from'];

            $insert_array = array(
                'p_id' => $id,
                'do_id' => $this->session->userdata('user_id'),
                'rank' => $rank,
                'officer_name' => $officer_name,
                'date_from' => $start_date,
                'date_to' => $end_date,
                'updated_at' => date('Y-m-d H:i:s')
            );

            $insert = $this->db->insert('divisional_officer_records', $insert_array);

            if (!empty($insert)) {

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => "Divisional Officer record has been added by " . $this->session->userdata('username'),
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($insert)) {
                $this->session->set_flashdata('success', 'Divisional Officer Record added successfully');
                redirect('EXO/view_record_div_officer');
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                redirect('EXO/view_record_div_officer');
            }
        }
    }

    public function update_divisional_officer_records()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());

            //print_r($postData);exit;
            //$id = $postData['id'];
            $row_id = $postData['row_id'];
            $rank = $postData['rank'];
            $officer_name = $postData['officer_name'];
            $start_date = $postData['date_from'];
            $end_date = $postData['date_to'];

            $update_array = array(
                // 'p_id' => $id,
                // 'do_id' => $this->session->userdata('user_id'),
                'rank' => $rank,
                'officer_name' => $officer_name,
                'date_from' => $start_date,
                'date_to' => $end_date,
                'updated_at' => date('Y-m-d H:i:s')
            );
            //print_r($update_array);exit;
            $this->db->where('id', $row_id);
            $update = $this->db->update('divisional_officer_records', $update_array);

            if (!empty($update)) {

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => "Divisional Officer record has been updated by " . $this->session->userdata('username'),
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($update)) {
                $this->session->set_flashdata('success', 'Record updated successfully');
                redirect('EXO/view_dossier_folder');
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                redirect('EXO/view_dossier_folder');
            }
        }
    }
    public function update_cadet_warning($page = null)
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());
            //print_r($postData);
            if ($_FILES['file']['name'][0] != NULL) {
                $upload1 = $this->upload_warning($_FILES['file']);
                if (count($upload1) > 1) {
                    $files = implode(',', $upload1);
                } else {
                    $files = $upload1[0];
                }
            } else {
                $files = $postData['old_file'];
            }

            $id = $postData['id'];
            $oc_no = $postData['oc_num'];
            $date = $postData['date'];
            $issued_by = $postData['issued_by'];
            $type = $postData['warning_type'];
            $reason = $postData['reason'];

            $cond  = ['oc_no' => $oc_no];
            $data_update = array(
                'oc_no' => $oc_no,
                'p_id' => $id,
                'date' => date('Y-m-d'),
                'file' => $files,
                'issued_by' => $issued_by,
                'type' => $type,
                'do_id' => $this->session->userdata('user_id'),
                'reasons' => $reason,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                //'status' => 'Pending'

            );
            //print_r($data_update);exit;

            $this->db->where($cond);
            $update = $this->db->update('warning_records', $data_update);

            if (!empty($update)) {

                $cadet_name = $this->db->select('name')->where('oc_no', $oc_no)->get('pn_form1s')->row_array();

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => "Warning has been updated for Cadet " . $cadet_name['name'],
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($update)) {
                if (isset($page)) {
                    $this->session->set_flashdata('success', 'Warning updated successfully');
                    redirect('EXO/view_dossier_folder');
                } else {
                    $this->session->set_flashdata('success', 'Warning updated successfully');
                    redirect('EXO/view_dossier');
                }
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                redirect('EXO/view_dossier');
            }
        }
    }

    public function search_cadet()
    {
        if ($this->input->post()) {
            $oc_no = $_POST['oc_no'];
            $units_list = array('2', '3', '17');

            if ($this->session->userdata('unit_id') != 1) {  //All other Units than Navy Academy
                $query = $this->db->where('oc_no', $oc_no)->where('unit_id', $this->session->userdata('unit_id'))->get('pn_form1s')->row_array();
            } else { //Search in Pak Navy Academy 
                if ($this->session->userdata('acct_type') == 'do') {
                    $query = $this->db->where('oc_no', $oc_no)->where('divison_name', $this->session->userdata('division'))->where_not_in('unit_id', $units_list)->get('pn_form1s')->row_array();
                } else {
                    $query = $this->db->where('oc_no', $oc_no)->where_not_in('unit_id', $units_list)->get('pn_form1s')->row_array();
                }
            }

            echo json_encode($query);
        }
    }

    public function search_all_cadets_by_term()
    {
        if ($this->input->post()) {
            $term = $_POST['term'];
            $units_list = array('2', '3', '17');

            if (($this->session->userdata('unit_id')) != 1) {
                $query = $this->db->where('term', $term)->where('unit_id', $this->session->userdata('unit_id'))->get('pn_form1s')->result_array();
            } else {
                if ($this->session->userdata('acct_type') == 'do') {
                    $query = $this->db->where('term', $term)->where_not_in('unit_id', $units_list)->where('divison_name', $this->session->userdata('division'))->get('pn_form1s')->result_array();
                } else {
                    $query = $this->db->where('term', $term)->where_not_in('unit_id', $units_list)->get('pn_form1s')->result_array();
                }
            }
            echo json_encode($query);
        }
    }

    public function  promote_and_search_cadets_by_term()
    {
        if ($this->input->post()) {
            $term = $_POST['term'];
            $oc_no = $_POST['oc_no'];

            $update_array = array(
                'rank' => 'midshipman',
                'phase' => 'Phase 2'
            );
            $cond  = ['oc_no' => $oc_no];
            $this->db->where($cond);
            $update = $this->db->update('pn_form1s', $update_array);

            $query = $this->db->where('term', $term)->where('divison_name', $this->session->userdata('division'))->where('unit_id', '1')->where('rank', null)->get('pn_form1s')->result_array();

            echo json_encode($query);
        }
    }

    public function search_cadet_physical_milestone()
    {
        if ($this->input->post()) {

            $oc_no = $_POST['oc_no'];

            $this->db->select('f.oc_no f_oc_no, f.p_id f_p_id, f.term f_term, f.divison_name f_divison_name, f.name f_name, or.*, term_i_details.*,term_ii_details.*, term_i_details.*,term_ii_details.*');
            $this->db->from('pn_form1s f');
            $this->db->join('physical_milestone or', 'f.p_id = or.p_id', 'left');
            $this->db->join('term_i_details', 'term_i_details.p_id = or.p_id', 'left');
            $this->db->join('term_ii_details', 'term_ii_details.p_id = or.p_id', 'left');
            // $this->db->where('f.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $data['milestone_records'] = $this->db->get()->row_array();

            echo json_encode($data['milestone_records']);
        }
    }


    public function search_cadet_for_punishment()
    {
        if ($this->input->post()) {
            $oc_no = $_POST['oc_no'];
            $units_list = array('2', '3', '17');
            if (($this->session->userdata('unit_id')) != 1) {
                $query = $this->db->where('oc_no', $oc_no)->where('unit_id', $this->session->userdata('unit_id'))->get('pn_form1s')->row_array();
            } else {
                if ($this->session->userdata('acct_type') == 'do') {
                    $query = $this->db->where('oc_no', $oc_no)->where_not_in('unit_id', $units_list)->where('divison_name', $this->session->userdata('division'))->get('pn_form1s')->row_array();
                } else {
                    $query = $this->db->where('oc_no', $oc_no)->where_not_in('unit_id', $units_list)->get('pn_form1s')->row_array();
                }
            }  
            echo json_encode($query);
        }
    }

    public function search_cadet_for_observation()
    {
        if ($this->input->post()) {
            $oc_no = $_POST['oc_no'];
            $units_list = array('2', '3', '17');
            if (($this->session->userdata('unit_id')) != 1) {
                $query = $this->db->where('oc_no', $oc_no)->where('unit_id', $this->session->userdata('unit_id'))->get('pn_form1s')->row_array();
            } else {
                if ($this->session->userdata('acct_type') == 'do') {
                    $query = $this->db->where('oc_no', $oc_no)->where_not_in('unit_id', $units_list)->where('divison_name', $this->session->userdata('division'))->get('pn_form1s')->row_array();
                } else {
                    $query = $this->db->where('oc_no', $oc_no)->where_not_in('unit_id', $units_list)->get('pn_form1s')->row_array();
                }
            }  
            echo json_encode($query);
        }
    }

    public function Inspection_record()
    {
        if ($this->session->has_userdata('user_id')) {
            $data['pn_data'] = $this->db->get('pn_form1s')->result_array();
            $this->load->view('exo/inspection_record', $data);
        }
    }

    public function psychologist_report()
    {
        if ($this->session->has_userdata('user_id')) {
            $this->load->view('exo/psychologist_report');
        }
    }

    public function auto_biography()
    {
        if ($this->session->has_userdata('user_id')) {
            $this->load->view('exo/biography');
        }
    }
    public function personal_data()
    {
        if ($this->session->has_userdata('user_id')) {
            $data['pn_data'] = $this->db->where('divison_name', $this->session->userdata('division'))->get('pn_form1s')->result_array();
            $data['divisions'] = $this->db->where('division_name', $this->session->userdata('division'))->get('divisions')->result_array();
            $this->load->view('exo/personal_data', $data);
        }
    }

    public function view_dossier()
    {
        if ($this->session->has_userdata('user_id')) {
            $data['club_data'] = $this->db->get('cadet_club')->result_array();
            $data['pn_data'] = $this->db->where('divison_name', 'XYZ')->get('pn_form1s')->result_array();

            // print_r($data);
            $this->load->view('exo/view_dossier', $data);
        }
    }

    public function view_dossier_folder()
    {
        if ($this->session->has_userdata('user_id')) {
            $data['pn_data'] = $this->db->where('divison_name',  'XYZ')->get('pn_form1s')->row_array();
            $this->load->view('exo/view_dossier_folder', $data);
        }
    }

    public function add_club()
    {
        if ($this->session->has_userdata('user_id')) {
            $data['club_data'] = $this->db->get('cadet_club')->result_array();
            $this->load->view('exo/add_club', $data);
        }
    }
    public function daily_module()
    {
        if ($this->session->has_userdata('user_id')) {
            $this->load->view('exo/daily_module');
        }
    }
    public function add_punishment()
    {
        if ($this->session->has_userdata('user_id')) {
            $this->load->view('exo/add_punishment');
        }
    }
    public function add_physical_milestone($page = null)
    {
        if ($this->session->has_userdata('user_id')) {
            // echo $page;
            $data['physical_milestone_data'] = $this->db->where('p_id', $this->session->has_userdata('user_id'))->get('physical_milestone')->row_array();
            if ($page != null) {
                $data['page'] = $page;
            }
            $this->load->view('exo/add_physical_milestone', $data);
        }
    }
    public function add_excuse()
    {
        if ($this->session->has_userdata('user_id')) {
            $this->load->view('exo/add_excuse'); //, $data);
        }
    }
    public function add_observation()
    {
        if ($this->session->has_userdata('user_id')) {
            $this->load->view('exo/add_observation');
        }
    }
    public function add_observation_slip()
    {
        if ($this->session->has_userdata('user_id')) {
            $this->load->view('exo/add_observation_slip');
        }
    }
    public function add_warning()
    {
        if ($this->session->has_userdata('user_id')) {
            $this->load->view('exo/add_warning');
        }
    }
    public function add_officer_qualities()
    {
        if ($this->session->has_userdata('user_id')) {
            $data['quality_list'] = $this->db->get('quality_list')->result_array();
            $this->load->view('exo/officer_like_qualities', $data);
        }
    }

    public function add_branch_allocation()
    {
        if ($this->session->has_userdata('user_id')) {
            $data['branch_list'] = $this->db->get('branch_preference_list')->result_array();
            $this->load->view('exo/branch_allocation', $data);
        }
    }
    public function save_branches_allocation()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());

            $id = $postData['id'];
            $oc_no = $postData['oc_num'];
            $prefer_1 = $postData['prefer_1'];
            $prefer_2 = $postData['prefer_2'];
            // $div_name = $postData['division'];
            $prefer_3 = $postData['prefer_3'];
            $recommended_branch = $postData['recommended_branch'];
            $allocated_branch = $postData['allocated_branch'];


            $insert_array = array(
                'oc_no' => $oc_no,
                'p_id' => $id,
                'option1' => $prefer_1,
                'option2' => $prefer_2,
                'option3' => $prefer_3,
                'branch_recommended' => $recommended_branch,
                'branch_allocated' => $allocated_branch,
                'do_id' => $this->session->userdata('user_id'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')

            );

            $insert = $this->db->insert('branch_allocations', $insert_array);

            if (!empty($insert)) {

                $cadet_name = $this->db->select('name')->where('oc_no', $oc_no)->get('pn_form1s')->row_array();

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => "Branch Allocation record added for Cadet " . $cadet_name['name'],
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($insert)) {
                $this->session->set_flashdata('success', 'Branch Preferences added successfully');
                redirect('EXO/add_branch_allocation');
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                redirect('EXO/add_branch_allocation');
            }
        }
    }

    public function update_branches_allocation()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());

            $id = $postData['id_b'];

            $prefer_1 = $postData['prefer_1'];
            $prefer_2 = $postData['prefer_2'];
            $prefer_3 = $postData['prefer_3'];
            $recommended_branch = $postData['recommended_branch'];
            $allocated_branch = $postData['allocated_branch'];

            $update_array = array(
                'option1' => $prefer_1,
                'option2' => $prefer_2,
                'option3' => $prefer_3,
                'branch_recommended' => $recommended_branch,
                'branch_allocated' => $allocated_branch,
                'updated_at' => date('Y-m-d H:i:s')

            );

            $cond  = ['p_id' => $id];
            $this->db->where($cond);
            $update = $this->db->update('branch_allocations', $update_array);

            if (!empty($update)) {

                $p_id = $this->db->select('p_id')->where('id', $id)->get('branch_allocations')->row_array();
                $cadet_name = $this->db->select('name')->where('p_id', $p_id['p_id'])->get('pn_form1s')->row_array();

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => "Branch Allocation record Updated for cadet " . $cadet_name['name'],
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($update)) {
                $this->session->set_flashdata('success', 'Branch Allocations updated successfully');
                redirect('EXO/view_dossier');
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                redirect('EXO/view_dossier');
            }
        }
    }

    public function update_cadet_term()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());

            $p_id = $_POST['p_id'];
            $curr_term = $_POST['curr_term'];
            $action = $_POST['action'];
            $all = $_POST['all'];

            $branch_id ='';
            $next_term = '';
            $unit_id = $this->session->userdata('unit_id');

            if ($action == 'promote') {
                if ($curr_term == 'Term-P') {
                    $next_term = 'Term-I';
                    $phase = 'Phase-I';
                } else if ($curr_term == 'Term-I') {
                    $next_term = 'Term-II';
                    $phase = 'Phase-I';
                } else if ($curr_term == 'Term-II') {
                    $next_term = 'Term-III';
                    $phase = 'Phase-I';
                } else if ($curr_term == 'Term-III') {
                    $next_term = 'Term-IV';
                    $phase = 'Midshipman'; //Added by Awais Dated: 13 Dec 21
                    $unit_id = $_POST['unit_id'];
                    $branch_id = $_POST['branch_id']; //Added by Awais Dated: 13 Dec 21
                } else {
                    $phase = 'Sub-Lieutenant';
                    if (isset($_POST['unit_id'])) {
                        $unit_id = $_POST['unit_id'];
                    }
                    $branch_id = $_POST['branch_id']; //Added by Awais Dated: 13 Dec 21
                    if ($branch_id == '4') {  //ME 
                        if ($curr_term == 'Term-IV') {
                            $next_term = '4ME';
                        } else if ($curr_term == '4ME') {
                            $next_term = '5ME';
                        } else if ($curr_term == '5ME') {
                            $next_term = '6ME';
                        } else if ($curr_term == '6ME') {
                            $next_term = '7ME';
                        } else if ($curr_term == '7ME') {
                            $next_term = '8ME';
                        }
                    } else if ($branch_id == '2') { //WE 
                        if ($curr_term == 'Term-IV') {
                            $next_term = '4WE';
                        } else if ($curr_term == '4WE') {
                            $next_term = '5WE';
                        } else if ($curr_term == '5WE') {
                            $next_term = '6WE';
                        } else if ($curr_term == '6WE') {
                            $next_term = '7WE';
                        } else if ($curr_term == '7WE') {
                            $next_term = '8WE';
                        }
                    } else if ($branch_id == '1') { //OPS
                        if ($curr_term == 'Term-IV') {
                            $next_term = '5MS';
                        } else if ($curr_term == '5MS') {
                            $next_term = '6MS';
                        } else if ($curr_term == '6MS') {
                            $unit_id = '2'; //Promoted Bahadur
                            $next_term = 'GLOPS';
                        }
                    } else if ($branch_id == '3') { //LOG //PNSL
                        if ($curr_term == 'Term-IV') {
                            $next_term = '4LOG';
                        } else if ($curr_term == '4LOG') {
                            $next_term = '5LOG';
                        } else if ($curr_term == '5LOG') {
                            $next_term = '6LOG';
                        } else if ($curr_term == '6LOG') {
                            $next_term = '7LOG';
                        } else if ($curr_term == '7LOG') {
                            $next_term = '8LOG';
                        }
                    }
                }
            }

            if ($action == 'relegate') {
                if ($curr_term == 'Term-P') {
                    $next_term = 'Term-I';
                } else if ($curr_term == 'Term-I') {
                    $next_term = 'Term-I';
                } else if ($curr_term == 'Term-II') {
                    $next_term = 'Term-II';
                } else if ($curr_term == 'Term-III') {
                    $next_term = 'Term-III';
                } else if ($curr_term == 'Term-IV') {
                    $next_term = 'Term-IV';
                } else if ($curr_term == 'Term-V') {
                    $next_term = 'Term-V';
                }
            }

            if ($curr_term == 'Term-III') {
                $update_array = array(
                    'term' => $next_term,
                    'unit_id' => $unit_id,
                    'branch_id' => $branch_id,
                    'phase' => $phase
                );
            } else if ($curr_term == 'Term-IV') {
                $update_array = array(
                    'term' => $next_term,
                    'unit_id' => $unit_id,
                    'branch_id' => $branch_id,
                    'phase' => $phase
                );
            } else {
                if (isset($branch_id)) {
                    if (($branch_id == '1') && ($curr_term == '6MS')) {
                        $update_array = array(
                            'term' => $next_term,
                            'unit_id' => $unit_id
                        );
                    } else {
                        $update_array = array(
                            'term' => $next_term
                        );
                    }
                } else {
                    $update_array = array(
                        'term' => $next_term
                    );
                }
            }

            if ($all == 'no') {
                $cond  = [
                    'p_id' => $p_id,
                    'unit_id' => $this->session->userdata('unit_id'),
                    'term' => $curr_term
                ];
            } else if ($all == 'yes') {
                $cond  = [
                    'unit_id' => $this->session->userdata('unit_id'),
                    'term' => $curr_term
                ];
            }

            $this->db->where($cond);
            $update = $this->db->update('pn_form1s', $update_array);

            if (!empty($update)) {
                $cadet_name = $this->db->select('name')->where('p_id', $p_id)->get('pn_form1s')->row_array();

                if ($all == 'yes') {
                    $act_desc = 'All Cadets of ' . $this->session->userdata('division') . ' promoted successfully';
                } else {
                    if ($action == 'relegate') {
                        $act_desc =  "Cadet " . $cadet_name['name'] . " has been relegated";
                    } else {
                        $act_desc =  "Cadet " . $cadet_name['name'] . " has been Promoted";
                    }
                }

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => $act_desc,
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($update)) {
                if ($all == 'no') {
                    if ($action == 'promote') {
                        if ($curr_term == 'Term-III') {
                            $this->session->set_flashdata('success', 'Cadet Promoted to Midshipman successfully');
                        } else if ($curr_term == 'Term-IV') {
                            $this->session->set_flashdata('success', 'Cadet Promoted to Sub-Lieutenant successfully');
                        } else {
                            $this->session->set_flashdata('success', 'Cadet Promoted successfully');
                        }
                    } else if ($action == 'relegate') {
                        $this->session->set_flashdata('success', 'Cadet Relegated successfully');
                    }
                } else {
                    $this->session->set_flashdata('success', 'All Cadets for ' . $this->session->userdata('division') . ' promoted successfully');
                }
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            }

            $data['units'] = $this->db->where('id', '2')->or_where('id', '3')->or_where('id', '17')->get('navy_units')->result_array();
            $data['ships'] = $this->db->where('id', '6')->or_where('id', '7')->or_where('id', '8')->or_where('id', '9')->or_where('id', '10')->or_where('id', '11')->or_where('id', '12')->or_where('id', '13')->or_where('id', '14')->or_where('id', '15')->or_where('id', '16')->get('navy_units')->result_array();
            $data['branches'] = $this->db->get('branch_preference_list')->result_array();
            $view_page = $this->load->view('exo/term_promotion', $data, TRUE);
            echo $view_page;
            json_encode($view_page);
        }
    }

    public function update_cadet_to_midshipman()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());

            $p_id = $_POST['p_id'];
            $curr_term = $_POST['curr_term'];
            $action = $_POST['action'];
            $all = $_POST['all'];
            $unit_id = $_POST['unit_id'];
            $branch_id = $_POST['branch_id'];
            $phase = 'Midshipman';


            $update_array = array(
                'term' => 'Term-IV',
                'phase' => $phase,
                'unit_id' => $unit_id,
                'branch_id' => $branch_id
            );

            if ($all == 'no') {
                $cond  = [
                    'p_id' => $p_id,
                    'term' => $curr_term
                ];
            } else {
                if ($this->session->userdata('unit_id') != '1') {
                    $cond  = [
                        'unit_id' => $this->session->userdata('unit_id'),
                        'term' => $curr_term
                    ];
                } else {
                    if ($this->session->userdata('acct_type') == 'do') {
                        $cond  = [
                            'term' => $curr_term,
                            'divison_name' => $this->session->userdata('division')
                        ];
                    }else {
                        $cond  = [
                            'term' => $curr_term
                        ];
                    }
                }
            }
            $this->db->where($cond);
            $update = $this->db->update('pn_form1s', $update_array);

            if (!empty($update)) {
                $cadet_name = $this->db->select('name')->where('p_id', $p_id)->get('pn_form1s')->row_array();

                if ($all == 'yes') {
                    $act_desc = 'All Cadets of ' . $this->session->userdata('division') . ' promoted to Midshipman successfully';
                } else {
                    if ($action == 'relegate') {
                        $act_desc =  "Cadet " . $cadet_name['name'] . " has been relegated";
                    } else {
                        $act_desc =  "Cadet " . $cadet_name['name'] . " has been Promoted to Midshipman";
                    }
                }

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => $act_desc,
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($update)) {
                if ($all == 'no') {
                    if ($action == 'promote') {
                        $this->session->set_flashdata('success', 'Cadet Promoted to Midshipman successfully');
                    } else if ($action == 'relegate') {
                        $this->session->set_flashdata('success', 'Cadet Relegated successfully');
                    }
                } else {
                    $this->session->set_flashdata('success', 'All Cadets for ' . $this->session->userdata('division') . ' promoted to Midshipman successfully');
                }
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            }

            // $data = '';
            $data['units'] = $this->db->where('id', '2')->or_where('id', '3')->or_where('id', '17')->get('navy_units')->result_array();
            $data['ships'] = $this->db->where('id', '6')->or_where('id', '7')->or_where('id', '8')->or_where('id', '9')->or_where('id', '10')->or_where('id', '11')->or_where('id', '12')->or_where('id', '13')->or_where('id', '14')->or_where('id', '15')->or_where('id', '16')->get('navy_units')->result_array();
            $data['branches'] = $this->db->get('branch_preference_list')->result_array();
            $view_page = $this->load->view('hougp/term_promotion', $data, TRUE);
            echo $view_page;
            json_encode($view_page);
        }
    }

    public function update_cadet_to_sub_lieutenant()
    {
         if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());

            $p_id = $_POST['p_id'];
            $curr_term = $_POST['curr_term'];
            $action = $_POST['action'];
            $all = $_POST['all'];
            $branch_id = $_POST['branch_id'];
            $unit_id = $_POST['unit_id'];
            $phase = 'Sub-Lieutenant';

            $update_array = array(
                'term' => 'Term-V',
                'phase' => $phase,
                'branch_id' => $branch_id,
                'unit_id' => $unit_id
            );

            if ($all == 'no') {
                $cond  = [
                    'p_id' => $p_id,
                    'term' => $curr_term
                ];
            } else {
                if ($this->session->userdata('unit_id') != '1') {
                    $cond  = [
                        'unit_id' => $this->session->userdata('unit_id'),
                        'term' => $curr_term
                    ];
                } else {
                    if ($this->session->userdata('acct_type') == 'do') {
                        $cond  = [
                            'term' => $curr_term,
                            'divison_name' => $this->session->userdata('division')
                        ];
                    } else {
                        $cond  = [
                            'term' => $curr_term
                        ];
                    }
                }
            }

            $this->db->where($cond);
            $update = $this->db->update('pn_form1s', $update_array);

            if (!empty($update)) {
                $cadet_name = $this->db->select('name')->where('p_id', $p_id)->get('pn_form1s')->row_array();

                if ($all == 'yes') {
                    $act_desc = 'All Cadets of ' . $this->session->userdata('division') . ' promoted to Sub-Lietinant successfully';
                } else {
                    if ($action == 'relegate') {
                        $act_desc =  "Cadet " . $cadet_name['name'] . " has been relegated";
                    } else {
                        $act_desc =  "Cadet " . $cadet_name['name'] . " has been Promoted to Sub-Lietinant";
                    }
                }

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => $act_desc,
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($update)) {
                if ($all == 'no') {
                    if ($action == 'promote') {
                        $this->session->set_flashdata('success', 'Cadet Promoted to Sub-Lietinant successfully');
                    } else if ($action == 'relegate') {
                        $this->session->set_flashdata('success', 'Cadet Relegated successfully');
                    }
                } else {
                    $this->session->set_flashdata('success', 'All Cadets promoted to Sub-Lietinant successfully');
                }
            } else {
                $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            }

            // $data = '';
            //$data['units'] = $this->db->get('navy_units')->result_array();
            $data['units'] = $this->db->where('id', '2')->or_where('id', '3')->or_where('id', '4')->or_where('id', '17')->get('navy_units')->result_array();
            $data['ships'] = $this->db->where('id', '6')->or_where('id', '7')->or_where('id', '8')->or_where('id', '9')->or_where('id', '10')->or_where('id', '11')->or_where('id', '12')->or_where('id', '13')->or_where('id', '14')->or_where('id', '15')->or_where('id', '16')->get('navy_units')->result_array();
            $data['branches'] = $this->db->get('branch_preference_list')->result_array();
            $view_page = $this->load->view('joto/term_promotion', $data, TRUE);
            echo $view_page;
            json_encode($view_page);
        }
    }

    public function view_punishment_list()
    {
        if ($this->session->has_userdata('user_id')) {
            $this->db->select('pr.*, f.*');
            $this->db->from('punishment_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            $this->db->where('f.oc_no = pr.oc_no');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('pr.start_date <=', date('Y-m-d'));
            $this->db->where('pr.end_date >=', date('Y-m-d'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $data['punishment_records'] = $this->db->get()->result_array();

            $this->load->view('exo/view_punishment_list', $data);
        }
    }
    public function view_punishments_in_dossier()
    {
        if ($this->session->has_userdata('user_id')) {
            $cadet_id = $_POST['id'];

            $this->db->select('pr.*, f.*');
            $this->db->from('punishment_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            $this->db->where('f.oc_no = pr.oc_no');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.p_id', $cadet_id);
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('pr.status', 'Approved');
            $data['punishment_records'] = $this->db->get()->result_array();

            echo json_encode($data['punishment_records']);
        }
    }

    public function view_excuses_in_dossier()
    {
        if ($this->session->has_userdata('user_id')) {
            $cadet_id = $_POST['id'];

            $this->db->select('pr.*, f.*');
            $this->db->from('medical_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            $this->db->where('f.oc_no = pr.oc_no');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.p_id', $cadet_id);
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $data['excuse_records'] = $this->db->get()->result_array();

            echo json_encode($data['excuse_records']);
        }
    }

    public function view_observation_in_dossier()
    {
        if ($this->session->has_userdata('user_id')) {
            $cadet_id = $_POST['id'];
            //echo $cadet_id;exit;
            $this->db->select('pr.*, f.*');
            $this->db->from('observation_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('f.oc_no = pr.oc_no');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.p_id', $cadet_id);
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('pr.status', 'Approved');
            $data['observation_records'] = $this->db->get()->result_array();
            echo json_encode($data['observation_records']);
        }
    }

    public function view_warning_in_dossier()
    {
        if ($this->session->has_userdata('user_id')) {
            $cadet_id = $_POST['id'];

            $this->db->select('pr.*, f.*');
            $this->db->from('warning_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.p_id', $cadet_id);
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $data['warning_records'] = $this->db->get()->result_array();
            echo json_encode($data['warning_records']);
        }
    }

    public function view_edit_warning($row_id = null)
    {
        $row_id = $row_id;
        $this->db->select('pr.*, f.*');
        $this->db->from('warning_records pr');
        $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
        // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
        $this->db->where('pr.id', $row_id);
        $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
        $data['warning_records'] = $this->db->get()->row_array();
        $this->load->view('exo/edit_warning', $data);
    }

    public function edit_warning_data()
    {
        if ($this->session->has_userdata('user_id')) {
            $cadet_id = $_POST['id'];
            //echo $cadet_id;exit;
            $this->db->select('pr.*, f.*');
            $this->db->from('warning_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('f.oc_no = pr.oc_no');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.p_id', $cadet_id);
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            // $this->db->where('pr.status', 'Approved');
            $data['edit_record'] = $this->db->get()->row_array();
            //print_r($data['edit_record']);exit;
            echo json_encode($data['edit_record']);
        }
    }


    public function edit_branches_data()
    {
        if ($this->session->has_userdata('user_id')) {
            $cadet_id = $_POST['id'];
            //echo $cadet_id;exit;
            $this->db->select('pr.*, f.*');
            $this->db->from('branch_allocations pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('f.oc_no = pr.oc_no');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.p_id', $cadet_id);
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            // $this->db->where('pr.status', 'Approved');
            $data['edit_record'] = $this->db->get()->row_array();
            //print_r($data['edit_record']);exit;
            echo json_encode($data['edit_record']);
        }
    }

    public function edit_club_data()
    {
        if ($this->session->has_userdata('user_id')) {
            $cadet_id = $_POST['id'];
            //echo $cadet_id;exit;
            $this->db->select('pr.*, f.*');
            $this->db->from('club_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('f.oc_no = pr.oc_no');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.p_id', $cadet_id);
            $this->db->where('pr.status', 'active');
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            // $this->db->where('pr.status', 'Approved');
            $data['edit_record'] = $this->db->get()->row_array();
            //print_r($data['edit_record']);exit;
            echo json_encode($data['edit_record']);
        }
    }
    public function delete_club_data()
    {
        if ($this->session->has_userdata('user_id')) {
            $cadet_id = $_POST['id'];
            // echo $cadet_id;exit;

            // $this->db->where('f.oc_no = pr.oc_no');
            $this->db->where('status', 'active');
            $this->db->set('status', 'deleted');
            $this->db->update('club_records');

            $this->db->where('p_id', $cadet_id);
            $this->db->set('club', '');
            $this->db->update('pn_form1s');

            //update existing data after deletion
            $this->db->select('pr.*, f.*');
            $this->db->from('club_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('f.oc_no = pr.oc_no');
            $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.p_id', $cadet_id);
            $this->db->where('pr.status', 'active');
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));


            // $this->db->where('pr.status', 'Approved');
            $data['edit_record_after_delete'] = $this->db->get()->result_array();
            //print_r($data['edit_record']);exit;
            echo json_encode($data['edit_record_after_delete']);
        }
    }

    public function edit_observation_data()
    {
        if ($this->session->has_userdata('user_id')) {
            $row_id = $_POST['id'];
            //echo $cadet_id;exit;
            $this->db->select('pr.*, f.*');
            $this->db->from('observation_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('f.oc_no = pr.oc_no');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('pr.id', $row_id);
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            // $this->db->where('pr.status', 'Approved');
            $data['edit_record'] = $this->db->get()->row_array();
            //print_r($data['edit_record']);exit;
            echo json_encode($data['edit_record']);
        }
    }

    public function view_edit_observation($row_id = null)
    {

        $row_id = $row_id;;
        $this->db->select('pr.*, f.*');
        $this->db->from('observation_records pr');
        $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
        // $this->db->where('f.oc_no = pr.oc_no');
        // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
        $this->db->where('pr.id', $row_id);
        $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
        $this->db->where('pr.status', 'Approved');
        $data['edit_records'] = $this->db->get()->row_array();
        // print_r($data['edit_records']);
        $this->load->view('exo/edit_observation', $data);
    }

    public function view_edit_punishment($row_id = null)
    {

        $row_id = $row_id;;
        $this->db->select('pr.*, f.*');
        $this->db->from('punishment_records pr');
        $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
        $this->db->where('f.oc_no = pr.oc_no');
        // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
        $this->db->where('pr.id', $row_id);
        $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
        // $this->db->where('pr.status', 'Approved');
        $data['punish_records'] = $this->db->get()->row_array();
        // print_r($data['punish_records']);exit;
        $this->load->view('exo/edit_punishment', $data);
    }



    public function view_excuse_list()
    {
        if ($this->session->has_userdata('user_id')) {

            // $p_id = $_POST['id'];
            $this->db->select('mr.*, f.*');
            $this->db->from('medical_records mr');
            $this->db->join('pn_form1s f', 'f.p_id = mr.p_id');
            $this->db->where('f.oc_no = mr.oc_no');
            // $this->db->where('mr.do_id', $this->session->userdata('user_id'));
            $this->db->where('mr.start_date <=', date('Y-m-d'));
            $this->db->where('mr.end_date >=', date('Y-m-d'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));

            $data['medical_records'] = $this->db->get()->result_array();
            $this->load->view('exo/view_excuse_list', $data);
        }
    }
    public function view_observation_list()
    {
        if ($this->session->has_userdata('user_id')) {
            $this->db->select('or.*, f.*');
            $this->db->from('observation_records or');
            $this->db->join('pn_form1s f', 'f.p_id = or.p_id');
            // $this->db->where('or.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $data['observation_records'] = $this->db->get()->result_array();
            $this->load->view('exo/view_observation_list', $data);
        }
    }

    public function view_milestone_in_dossier()
    {
        if ($this->session->has_userdata('user_id')) {

            $p_id = $_POST['id'];

            $this->db->select('or.*, f.*');
            $this->db->from('physical_milestone or');
            $this->db->join('pn_form1s f', 'f.p_id = or.p_id');
            // $this->db->where('or.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.p_id', $p_id);
            $data['milestone_records'] = $this->db->get()->result_array();
            // print_r( $data['milestone_records']);exit;
            echo json_encode($data['milestone_records']);
        }
    }

    public function view_club_in_dossier()
    {
        if ($this->session->has_userdata('user_id')) {

            $p_id = $_POST['id'];
            $this->db->select('cr.*, f.*');
            $this->db->from('club_records cr');
            $this->db->join('pn_form1s f', 'f.p_id = cr.p_id');
            // $this->db->where('cr.do_id', $this->session->userdata('user_id'));
            $this->db->where('cr.status', 'active');
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.p_id', $p_id);
            $data['club_records'] = $this->db->get()->result_array();
            // print_r( $data['milestone_records']);exit;
            echo json_encode($data['club_records']);
        }
    }


    public function view_activity_log()
    {
        if ($this->session->has_userdata('user_id')) {
            $data['activity_log'] = $this->db->get('activity_log')->result_array();
            $this->load->view('exo/activity_log', $data);
        }
    }

    public function view_branches_in_dossier()
    {
        if ($this->session->has_userdata('user_id')) {

            $p_id = $_POST['id'];
            $this->db->select('b.*, f.*');
            $this->db->from('branch_allocations b');
            $this->db->join('pn_form1s f', 'f.p_id = b.p_id');
            // $this->db->where('b.do_id', $this->session->userdata('user_id'));
            //$this->db->where('cr.status', 'active');
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.p_id', $p_id);
            $data['branch_records'] = $this->db->get()->result_array();
            //echo $data['branch_records'];
            echo json_encode($data['branch_records']);
        }
    }
    public function view_milestone_list()
    {
        if ($this->session->has_userdata('user_id')) {
            $this->db->select('or.*, f.*');
            $this->db->from('physical_milestone or');
            $this->db->join('pn_form1s f', 'f.p_id = or.p_id');
            // $this->db->where('or.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $data['milestone_records'] = $this->db->get()->result_array();
            // print_r( $data['milestone_records']);exit;
            $this->load->view('exo/view_milestone_list', $data);
        }
    }


    public function search_excuse_by_date()
    {
        if ($this->session->has_userdata('user_id')) {

            $date = $_POST['search_date'];

            $this->db->select('mr.*, f.*');
            $this->db->from('medical_records mr');
            $this->db->join('pn_form1s f', 'f.p_id = mr.p_id');
            $this->db->where('f.oc_no = mr.oc_no');
            // $this->db->where('mr.do_id', $this->session->userdata('user_id'));
            $this->db->where('mr.start_date =', $date);
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            // $this->db->where('mr.end_date >=',date('Y-m-d'));
            $data['medical_records'] = $this->db->get()->result_array();
            $data['search_date'] = $date;
            $view_page = $this->load->view('exo/view_excuse_list', $data, TRUE);
            echo $view_page;
            json_encode($view_page);
        }
    }

    public function search_cadet_for_dossier()
    {
        if ($this->session->has_userdata('user_id')) {
            $oc_no = $_POST['oc_no'];
            $units_list = array('2', '3', '17');

            if (($this->session->userdata('unit_id')) != 1) {
                $data['pn_data'] = $this->db->where('oc_no', $oc_no)->where('unit_id', $this->session->userdata('unit_id'))->get('pn_form1s')->result_array();
            } else {
                if ($this->session->userdata('acct_type') == 'do') {
                    $data['pn_data'] = $this->db->where('divison_name', $this->session->userdata('division'))->where_not_in('unit_id', $units_list)->where('oc_no', $oc_no)->get('pn_form1s')->result_array();
                } else {
                    $data['pn_data'] = $this->db->where('oc_no', $oc_no)->where_not_in('unit_id', $units_list)->get('pn_form1s')->result_array();
                }
            }

            $data['oc_no_entered'] = $oc_no;

            if (count($data['pn_data']) > 0) {
                $view_page = $this->load->view('do/view_dossier', $data, TRUE);
                echo $view_page;
                json_encode($view_page);
            } else {
                echo '0';
            }
        }
    }

    public function search_cadet_for_dossier_folder()
    {
        if ($this->session->has_userdata('user_id')) {
            $oc_no = $_POST['oc_no'];
            $units_list = array('2', '3', '17');

            if (($this->session->userdata('unit_id')) != 1) {
                $data['pn_data'] = $this->db->where('oc_no', $oc_no)->where('unit_id', $this->session->userdata('unit_id'))->get('pn_form1s')->row_array();
            } else {
                if ($this->session->userdata('acct_type') == 'do') {
                    $data['pn_data'] = $this->db->where('divison_name', $this->session->userdata('division'))->where_not_in('unit_id', $units_list)->where('oc_no', $oc_no)->get('pn_form1s')->row_array();
                } else {
                    $data['pn_data'] = $this->db->where('oc_no', $oc_no)->where_not_in('unit_id', $units_list)->get('pn_form1s')->row_array();
                }
            }

            if (!isset($oc_no)) {
                $data['pn_personal_data'] = $this->db->where('p_id', $data['pn_data']['p_id'])->get('personal_datas')->row_array();
            }

            $this->db->select('pr.*, f.*');
            $this->db->from('punishment_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            $this->db->where('f.oc_no = pr.oc_no');
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-I');
            $this->db->where('pr.status', 'Approved');
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $data['pn_punish_data'] = $this->db->get()->result_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('punishment_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            $this->db->where('f.oc_no = pr.oc_no');
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-II');
            $this->db->where('pr.status', 'Approved');
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $data['pn_punish_data_term2'] = $this->db->get()->result_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('punishment_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            $this->db->where('f.oc_no = pr.oc_no');
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-III');
            $this->db->where('pr.status', 'Approved');
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $data['pn_punish_data_term3'] = $this->db->get()->result_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('observation_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-I');
            $this->db->where('pr.status', 'Approved');
            $data['pn_obs_data_term1'] = $this->db->get()->result_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('observation_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-II');
            $this->db->where('pr.status', 'Approved');
            $data['pn_obs_data_term2'] = $this->db->get()->result_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('observation_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-III');
            $this->db->where('pr.status', 'Approved');
            $data['pn_obs_data_term3'] = $this->db->get()->result_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('warning_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $data['pn_warning_data'] = $this->db->get()->result_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('inspection_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $data['pn_inspection_data'] = $this->db->get()->result_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('medical_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            $this->db->where('f.oc_no', $oc_no);
            $data['pn_medical_data'] = $this->db->get()->result_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('physical_milestone pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            // $this->db->where('pr.term', 'Term-I');
            $data['pn_physical_tests_data'] = $this->db->get()->result_array();

            //Term-P
            $this->db->select('pr.*, f.*');
            $this->db->from('physical_milestone pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-P');
            $data['pn_physical_tests_data_tp'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('term_i_details pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-P');
            $data['pn_pet1_data_tp'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('term_ii_details pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-P');
            $data['pn_pet2_data_tp'] = $this->db->get()->row_array();

            //Term-I
            $this->db->select('pr.*, f.*');
            $this->db->from('physical_milestone pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-I');
            $data['pn_physical_tests_data_t1'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('term_i_details pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-I');
            $data['pn_pet1_data_t1'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('term_ii_details pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-I');
            $data['pn_pet2_data_t1'] = $this->db->get()->row_array();

            //term-II
            $this->db->select('pr.*, f.*');
            $this->db->from('physical_milestone pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-II');
            $data['pn_physical_tests_data_t2'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('term_i_details pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-II');
            $data['pn_pet1_data_t2'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('term_ii_details pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-II');
            $data['pn_pet2_data_t2'] = $this->db->get()->row_array();

            //Term-III
            $this->db->select('pr.*, f.*');
            $this->db->from('physical_milestone pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-III');
            $data['pn_physical_tests_data_t3'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('term_i_details pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-III');
            $data['pn_pet1_data_t3'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('term_ii_details pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-III');
            $data['pn_pet2_data_t3'] = $this->db->get()->row_array();

            //Result Term-I
            $this->db->select('pr.*, f.*');
            $this->db->from('academic_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-I');
            $this->db->where('pr.doc_type', 'Result');
            $data['pn_result_record_t1'] = $this->db->get()->result_array();
            //Result Term-II
            $this->db->select('pr.*, f.*');
            $this->db->from('academic_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-II');
            $this->db->where('pr.doc_type', 'Result');
            $data['pn_result_record_t2'] = $this->db->get()->result_array();
            //Result Term-III
            $this->db->select('pr.*, f.*');
            $this->db->from('academic_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-III');
            $this->db->where('pr.doc_type', 'Result');
            $data['pn_result_record_t3'] = $this->db->get()->result_array();
            //Result Sea Report Training
            $this->db->select('pr.*, f.*');
            $this->db->from('academic_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.doc_type', 'SeaTraining');
            $data['pn_sea_training_record'] = $this->db->get()->result_array();

            //OLQ
            $this->db->select('pr.*, f.*');
            $this->db->from('officer_qualities pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-I');
            $data['pn_officer_qualities_data_t1'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('officer_qualities pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-II');
            $data['pn_officer_qualities_data_t2'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('officer_qualities pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-III');
            $data['pn_officer_qualities_data_t3'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('personal_datas pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $data['pn_personal_data'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('divisional_officer_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $data['pn_divisional_officer_data'] = $this->db->get()->result_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('cadets_autobiographies pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $data['pn_autobiography_data'] = $this->db->get()->result_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('psychologist_reports pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $data['pn_psychologist_data'] = $this->db->get()->result_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('warning_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $data['pn_warning_records'] = $this->db->get()->result_array();

            //General Remarks 
            //Term 1
            $this->db->select('pr.*, f.*');
            $this->db->from('general_remarks pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.assessment', 'Mid Term Assessment');
            $this->db->where('pr.term', 'Term-I');
            $data['pn_general_remarks_term1_mid'] = $this->db->get()->result_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('general_remarks pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.assessment', 'Terminal Assessment');
            $this->db->where('pr.term', 'Term-I');
            $data['pn_general_remarks_term1_final'] = $this->db->get()->result_array();
            //Term 2
            $this->db->select('pr.*, f.*');
            $this->db->from('general_remarks pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.assessment', 'Mid Term Assessment');
            $this->db->where('pr.term', 'Term-II');
            $data['pn_general_remarks_term2_mid'] = $this->db->get()->result_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('general_remarks pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.assessment', 'Terminal Assessment');
            $this->db->where('pr.term', 'Term-II');
            $data['pn_general_remarks_term2_final'] = $this->db->get()->result_array();
            //Term 3
            $this->db->select('pr.*, f.*');
            $this->db->from('general_remarks pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.assessment', 'Mid Term Assessment');
            $this->db->where('pr.term', 'Term-III');
            $data['pn_general_remarks_term3_mid'] = $this->db->get()->result_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('general_remarks pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.assessment', 'Terminal Assessment');
            $this->db->where('pr.term', 'Term-III');
            $data['pn_general_remarks_term3_final'] = $this->db->get()->result_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('distinctions_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $data['pn_distinctions_records'] = $this->db->get()->result_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('seniority_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $data['pn_seniority_records'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('branch_allocations pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $data['pn_branch_allocations'] = $this->db->get()->row_array();

            if (isset($_POST['back_press'])) {
                $ispress = $_POST['back_press'];
            } else {
                $ispress = 'No';
            }
            if ($data['pn_data'] != null) {
                $data['oc_no_entered'] = $oc_no;
                $view_page = $this->load->view('exo/view_dossier_folder', $data, TRUE);
            } else {
                if ($ispress == 'Yes') {
                    $data['oc_no_entered'] = NULL;
                    $view_page = $this->load->view('exo/view_dossier_folder', $data, TRUE);
                } else {
                    $data['oc_no_entered'] = NULL;
                    $view_page = 0;
                }
            }
            echo $view_page;
            json_encode($view_page);
        }
    }

    public function search_all_cadets_for_dossier()
    {
        $units_list = array('2', '3', '17');
        if ($this->session->has_userdata('user_id')) {

            if ($this->session->userdata('unit_id') != '1') {
                $data['pn_data'] = $this->db->where('unit_id', $this->session->userdata('unit_id'))->get('pn_form1s')->result_array();
            } else {
                if ($this->session->userdata('acct_type') == 'do') {
                    $data['pn_data'] = $this->db->where('divison_name', $this->session->userdata('division'))->where_not_in('unit_id', $units_list)->get('pn_form1s')->result_array();
                } else {
                    $data['pn_data'] = $this->db->where_not_in('unit_id', $units_list)->get('pn_form1s')->result_array();
                }
            }

            if (count($data['pn_data']) > 0) {
                $view_page = $this->load->view('exo/view_dossier', $data, TRUE);
                echo $view_page;
                json_encode($view_page);
            } else {
                echo '0';
            }
        }
    }

    public function search_punish_by_date()
    {
        if ($this->session->has_userdata('user_id')) {
            $date = $_POST['search_date'];

            $this->db->select('pr.*, f.*');
            $this->db->from('punishment_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            $this->db->where('f.oc_no = pr.oc_no');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('pr.start_date =', $date);
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $data['punishment_records'] = $this->db->get()->result_array();
            $data['search_date'] = $date;
            $view_page = $this->load->view('exo/view_punishment_list', $data, TRUE);
            echo $view_page;
            json_encode($view_page);
        }
    }

    public function upload($fieldname)
    {
        $filesCount = count($_FILES['report']['name']);

        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['file']['name']     = $_FILES['report']['name'][$i];
            $_FILES['file']['type']     = $_FILES['report']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['report']['tmp_name'][$i];
            $_FILES['file']['error']    = $_FILES['report']['error'][$i];
            $_FILES['file']['size']     = $_FILES['report']['size'][$i];

            $config['upload_path'] = 'uploads/documents';
            $config['allowed_types']        = 'gif|jpg|png|doc|xls|pdf|xlsx|docx|ppt|pptx|jpeg';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file')) {
                $data = array('msg' => $this->upload->display_errors());
            } else {
                $data = array('msg' => "success");
                $data['upload_data'] = $this->upload->data();
                $count[$i] = $data['upload_data']['file_name'];
            }
        }
        return $count;
    }

    public function upload_warning($fieldname)
    {
        $filesCount = count($_FILES['file']['name']);
        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['file']['name']     = $_FILES['file']['name'][$i];
            $_FILES['file']['type']     = $_FILES['file']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
            $_FILES['file']['error']    = $_FILES['file']['error'][$i];
            $_FILES['file']['size']     = $_FILES['file']['size'][$i];

            $config['upload_path'] = 'uploads/warning';
            $config['allowed_types']        = 'gif|jpg|png|doc|xls|pdf|xlsx|docx|ppt|pptx|txt|jpeg';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file')) {
                $data = array('msg' => $this->upload->display_errors());
            } else {
                $data = array('msg' => "success");
                $data['upload_data'] = $this->upload->data();
                $count[$i] = $data['upload_data']['file_name'];
            }
        }
        return $count;
    }

    public function upload_result($fieldname)
    {
        $filesCount = count($_FILES['file']['name']);
        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['file']['name']     = $_FILES['file']['name'][$i];
            $_FILES['file']['type']     = $_FILES['file']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
            $_FILES['file']['error']    = $_FILES['file']['error'][$i];
            $_FILES['file']['size']     = $_FILES['file']['size'][$i];

            $config['upload_path'] = 'uploads/documents';
            $config['allowed_types']  = 'gif|jpg|png|doc|xls|pdf|xlsx|docx|ppt|pptx|txt|jpeg';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                $data = array('msg' => $this->upload->display_errors());
            } else {
                $data = array('msg' => "success");
                $data['upload_data'] = $this->upload->data();
                $count[$i] = $data['upload_data']['file_name'];
            }
        }
        return $count;
    }

    public function save_physical_milestone()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());

            $oc_no = $postData['oc_num'];
            $p_id = $postData['id'];
            $term = $postData['term'];
            $PST_result = $postData['pst'];
            $PST_attempt = $postData['pst_attempt'];
            $SST_result = $postData['sst'];
            $SST_attempt = $postData['sst_attempt'];
            $PET_I_result = $postData['pet_I'];
            $PET_I_attempt = $postData['pet_I_attempt'];
            $PET_II_result = $postData['pet_II'];
            $PET_II_attempt = $postData['pet_II_attempt'];

            $assault_result = $postData['assault'];
            $assault_attempt = $postData['assault_attempt'];
            $saluting_result = $postData['saluting'];
            $saluting_attempt = $postData['saluting_attempt'];
            $plx_result = $postData['plx'];
            $plx_attempt = $postData['plx_attempt'];

            $long_cross = $postData['long_cross'];
            $long_cross_card = $postData['long_cross_card'];
            $mini_cross = $postData['mini_cross'];
            $mini_cross_card = $postData['mini_cross_card'];

            $milestone_id = $postData['milestone_id'];

            $insert_array = array(
                'oc_no' => $oc_no,
                'p_id' => $p_id,
                'do_id' => $this->session->userdata('user_id'),
                'term' => $term,
                'PST_result' => $PST_result,
                'PST_attempt' => $PST_attempt,
                'SST_result' => $SST_result,
                'SST_attempt' => $SST_attempt,
                'PET_I_result' => $PET_I_result,
                'PET_I_attempt' => $PET_I_attempt,
                'PET_II_result' => $PET_II_result,
                'PET_II_attempt' => $PET_II_attempt,
                'assault_result' => $assault_result,
                'assault_attempt' => $assault_attempt,
                'saluting_result' => $saluting_result,
                'saluting_attempt' => $saluting_attempt,
                'plx_result' => $plx_result,
                'plx_attempt' => $plx_attempt,
                'long_cross_result' => $long_cross,
                'long_cross_card_number' => $long_cross_card,
                'mini_cross_result' => $mini_cross,
                'mini_cross_card_number' => $mini_cross_card,
                'date_added' => date('Y-m-d H:i:s')
            );

            $this->db->where('oc_no', $oc_no)->where('p_id', $p_id)->delete('physical_milestone');
            $insert = $this->db->insert('physical_milestone', $insert_array);

            if (!empty($insert)) {

                $cadet_name = $this->db->select('name')->where('oc_no', $oc_no)->get('pn_form1s')->row_array();

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => "Physical Milestone has been added for cadet " . $cadet_name['name'],
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }

            if (!empty($insert)) {

                if ($postData['pagee'] == 'milestone_list') {
                    $this->session->set_flashdata('success', 'Data Submitted successfully');
                    redirect('EXO/view_milestone_list');
                } elseif ($postData['pagee'] == 'dossier') {
                    $this->session->set_flashdata('success', 'Data Updated successfully');
                    redirect('EXO/view_dossier');
                } elseif ($postData['pagee'] == 'view_dossier_folder') {
                    $this->session->set_flashdata('success', 'Data Updated successfully');
                    redirect('EXO/view_dossier_folder');
                } elseif ($postData['pagee'] == 'daily_module') {
                    $this->session->set_flashdata('success', 'Data Submitted successfully');
                    redirect('DEAN/daily_module');
                }  else {
                    $this->session->set_flashdata('success', 'Data Submitted successfully');
                    redirect('EXO/add_physical_milestone');
                }
            } else {
                if (isset($postData['pagee'])) {
                    $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                    redirect('EXO/view_milestone_list');
                } elseif ($postData['pagee'] == 'view_dossier_folder') {
                    $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                    redirect('EXO/view_dossier_folder');
                } else {
                    $this->session->set_flashdata('failure', 'Something went wrong, try again.');
                    redirect('EXO/add_physical_milestone');
                }
            }
        }
    }

    public function add_termI_details()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());

            $oc_no = $postData['oc_no'];
            $p_id = $postData['p_id'];
            $term = $postData['term'];
            $mile_time = $postData['mile_time'];
            $pushups = $postData['Pushups'];
            $chinups = $postData['Chinups'];
            $rope = $postData['rope'];
            $date_added = date('Y-m-d H:i:s');

            $insert_array = array(
                'oc_no' => $oc_no,
                'p_id' => $p_id,
                'do_id' => $this->session->userdata('user_id'),
                'term' => $term,
                'mile_time' => $mile_time,
                'pushups' => $pushups,
                'chinups' => $chinups,
                'rope' => $rope,
                'date_added' => date('Y-m-d H:i:s')
            );

            $this->db->where('oc_no', $oc_no)->where('p_id', $p_id)->delete('term_i_details');
            $insert = $this->db->insert('term_i_details', $insert_array);
        }
    }

    public function add_termII_details()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());
            //print_r($postData);exit;
            $oc_no = $postData['oc_no'];
            $p_id = $postData['p_id'];
            $term = $postData['term'];
            $mile_time = $postData['mile_time'];
            $pushups = $postData['Pushups'];
            $chinups = $postData['Chinups'];
            $rope = $postData['rope'];
            $date_added = date('Y-m-d H:i:s');

            $insert_array = array(
                'oc_no' => $oc_no,
                'p_id' => $p_id,
                'do_id' => $this->session->userdata('user_id'),
                'term' => $term,
                'mile_time' => $mile_time,
                'pushups' => $pushups,
                'chinups' => $chinups,
                'rope' => $rope,
                'date_added' => date('Y-m-d H:i:s')
            );

            $this->db->where('oc_no', $oc_no)->where('p_id', $p_id)->delete('term_ii_details');
            $insert = $this->db->insert('term_ii_details', $insert_array);
        }
    }

    public function view_PET_I()
    {
        if ($this->session->has_userdata('user_id')) {
            $p_id = $_POST['id'];
            $data['term_i_details'] = $this->db->where('p_id', $p_id)->get('term_i_details')->row_array();
            echo json_encode($data['term_i_details']);
        }
    }

    public function view_PET_II()
    {
        if ($this->session->has_userdata('user_id')) {
            $p_id = $_POST['id'];
            $data['term_ii_details'] = $this->db->where('p_id', $p_id)->get('term_ii_details')->row_array();
            echo json_encode($data['term_ii_details']);
        }
    }

    public function view_edit_qualities($p_id = null)
    {
        $this->db->select('pr.*, f.*');
        $this->db->from('officer_qualities pr');
        $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
        // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
        $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
        $this->db->where('pr.p_id', $p_id);
        $data['officer_data'] = $this->db->get()->row_array();
        $data['quality_list'] = $this->db->get('quality_list')->result_array();
        //print_r($data['officer_data']);exit
        $this->load->view('exo/edit_officer_like_qualities', $data);
    }

    public function save_officer_qualities()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());
            // print_r($postData);exit;

            // $oc_no = $postData['oc_num'];
            $p_id = $postData['id'];
            $term = $postData['term'];

            $insert_array = array(
                //'oc_no' => $oc_no,
                'p_id' => $p_id,
                'do_id' => $this->session->userdata('user_id'),
                'term' => $term,
                'truthfulness_mid' => $postData['mid_marks'][0],
                'truthfulness_terminal' => $postData['final_marks'][0],
                'integrity_mid' => $postData['mid_marks'][1],
                'integrity_terminal' => $postData['final_marks'][1],
                'pride_mid' => $postData['mid_marks'][2],
                'pride_terminal' => $postData['final_marks'][2],

                'courage_mid' => $postData['mid_marks'][3],
                'courage_terminal' => $postData['final_marks'][3],
                'confidence_mid' => $postData['mid_marks'][4],
                'confidence_terminal' => $postData['final_marks'][4],
                'initiative_mid' => $postData['mid_marks'][5],
                'inititative_terminal' => $postData['final_marks'][5],

                'command_mid' => $postData['mid_marks'][6],
                'command_terminal' => $postData['final_marks'][6],
                'discipline_mid' => $postData['mid_marks'][7],
                'discipline_terminal' => $postData['final_marks'][7],
                'duty_mid' => $postData['mid_marks'][8],
                'duty_terminal' => $postData['final_marks'][8],
                'reliability_mid' => $postData['mid_marks'][9],
                'reliability_terminal' => $postData['final_marks'][9],
                'appearance_mid' => $postData['mid_marks'][10],
                'appearance_terminal' => $postData['final_marks'][10],
                'fitness_mid' => $postData['mid_marks'][11],
                'fitness_terminal' => $postData['final_marks'][11],
                'conduct_mid' => $postData['mid_marks'][12],
                'conduct_terminal' => $postData['final_marks'][12],
                'cs_mid' => $postData['mid_marks'][13],
                'cs_terminal' => $postData['final_marks'][13],
                'teamwork_mid' => $postData['mid_marks'][14],
                'teamwork_terminal' => $postData['final_marks'][14],
                'expression_mid' => $postData['mid_marks'][15],
                'expression_terminal' => $postData['final_marks'][15],
                'total_mid' => $postData['total_mid_marks'],
                'total_terminal' => $postData['total_final_marks'],
                'mid_marks' => $postData['mid_percentage'],
                'terminal_marks' => $postData['final_percentage'],
                'mid_marks_date' => $postData['mid_exam_date'],
                'terminal_marks_date' => $postData['final_exam_date'],
                'created_at' => date('Y-m-d')
            );
            $insert = $this->db->insert('officer_qualities', $insert_array);
        }

        if (!empty($insert)) {

            $cadet_name = $this->db->select('name')->where('p_id', $p_id)->get('pn_form1s')->row_array();

            $insert_activity = array(
                'activity_module' => $this->session->userdata('acct_type'),
                'activity_action' => 'add',
                'activity_detail' => "Officer Like Qualities added for cadet " . $cadet_name['name'],
                'activity_by' => $this->session->userdata('username'),
                'activity_date' => date('Y-m-d H:i:s')
            );

            $insert_act = $this->db->insert('activity_log', $insert_activity);
            $last_id = $this->db->insert_id();

            $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

            for ($i = 0; $i < count($query); $i++) {
                $insert_activity_seen = array(
                    'activity_id' => $last_id,
                    'user_id' => $query[$i]['id'],
                    'seen' => 'no'
                );
                $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
            }
        }

        if (!empty($insert)) {
            $this->session->set_flashdata('success', 'Data Submitted successfully');
            redirect('EXO/add_officer_qualities');
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            redirect('EXO/add_officer_qualities');
        }
    }
    public function update_officer_qualities()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());
            // print_r($postData);exit;

            // $oc_no = $postData['oc_num'];
            $p_id = $postData['id'];
            //echo $p_id;exit;
            $term = $postData['term'];

            $insert_array = array(
                //'oc_no' => $oc_no,
                // 'p_id' => $p_id,
                // 'do_id' => $this->session->userdata('user_id'),
                // 'term' => $term,
                'truthfulness_mid' => $postData['mid_marks'][0],
                'truthfulness_terminal' => $postData['final_marks'][0],
                'integrity_mid' => $postData['mid_marks'][1],
                'integrity_terminal' => $postData['final_marks'][1],
                'pride_mid' => $postData['mid_marks'][2],
                'pride_terminal' => $postData['final_marks'][2],

                'courage_mid' => $postData['mid_marks'][3],
                'courage_terminal' => $postData['final_marks'][3],
                'confidence_mid' => $postData['mid_marks'][4],
                'confidence_terminal' => $postData['final_marks'][4],
                'initiative_mid' => $postData['mid_marks'][5],
                'inititative_terminal' => $postData['final_marks'][5],

                'command_mid' => $postData['mid_marks'][6],
                'command_terminal' => $postData['final_marks'][6],
                'discipline_mid' => $postData['mid_marks'][7],
                'discipline_terminal' => $postData['final_marks'][7],
                'duty_mid' => $postData['mid_marks'][8],
                'duty_terminal' => $postData['final_marks'][8],
                'reliability_mid' => $postData['mid_marks'][9],
                'reliability_terminal' => $postData['final_marks'][9],
                'appearance_mid' => $postData['mid_marks'][10],
                'appearance_terminal' => $postData['final_marks'][10],
                'fitness_mid' => $postData['mid_marks'][11],
                'fitness_terminal' => $postData['final_marks'][11],
                'conduct_mid' => $postData['mid_marks'][12],
                'conduct_terminal' => $postData['final_marks'][12],
                'cs_mid' => $postData['mid_marks'][13],
                'cs_terminal' => $postData['final_marks'][13],
                'teamwork_mid' => $postData['mid_marks'][14],
                'teamwork_terminal' => $postData['final_marks'][14],
                'expression_mid' => $postData['mid_marks'][15],
                'expression_terminal' => $postData['final_marks'][15],
                'total_mid' => $postData['total_mid_marks'],
                'total_terminal' => $postData['total_final_marks'],
                'mid_marks' => $postData['mid_percentage'],
                'terminal_marks' => $postData['final_percentage'],
                'mid_marks_date' => $postData['mid_exam_date'],
                'terminal_marks_date' => $postData['final_exam_date'],
                //'created_at' => date('Y-m-d')
            );
            //print_r($insert_array);exit;
            $this->db->where('p_id', $p_id);
            $insert = $this->db->update('officer_qualities', $insert_array);
        }

        if (!empty($insert)) {

            $cadet_name = $this->db->select('name')->where('p_id', $p_id)->get('pn_form1s')->row_array();

            $insert_activity = array(
                'activity_module' => $this->session->userdata('acct_type'),
                'activity_action' => 'add',
                'activity_detail' => "Officer Like Qualities added for cadet " . $cadet_name['name'],
                'activity_by' => $this->session->userdata('username'),
                'activity_date' => date('Y-m-d H:i:s')
            );

            $insert_act = $this->db->insert('activity_log', $insert_activity);
            $last_id = $this->db->insert_id();

            $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

            for ($i = 0; $i < count($query); $i++) {
                $insert_activity_seen = array(
                    'activity_id' => $last_id,
                    'user_id' => $query[$i]['id'],
                    'seen' => 'no'
                );
                $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
            }
        }

        if (!empty($insert)) {
            $this->session->set_flashdata('success', 'Data Updated successfully');
            redirect('EXO/view_dossier_folder');
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            redirect('EXO/view_dossier_folder');
        }
    }


    public function punishment_records_report($oc_no = NULL, $term = NULL)
    {
        if ($this->session->has_userdata('user_id')) {

            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';

            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');

            $id = $this->session->userdata('user_id');

            $this->db->select('*');
            $this->db->from('punishment_records');
            $this->db->where('oc_no', $oc_no);
            $this->db->where('term', $term);


            $data['punishment_records'] = $this->db->get()->result_array();
            // echo $term; exit;
            $data['term'] = $term;
            $html = $this->load->view('exo/punishment_report', $data, TRUE); //$graph, TRUE);

            $dompdf->loadHtml($html);
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Punishment Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
            //exit;
        } else {
            $this->load->view('userpanel/login');
        }
    }

    public function observation_records_report($oc_no = NULL, $term = NULL)
    {
        if ($this->session->has_userdata('user_id')) {

            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';

            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');

            $id = $this->session->userdata('user_id');

            $this->db->select('pr.*, f.*');
            $this->db->from('observation_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', $term);
            $this->db->where('pr.status', 'Approved');

            $data['observation_records'] = $this->db->get()->result_array();

            $data['term'] = $term;
            $html = $this->load->view('exo/observation_report', $data, TRUE); //$graph, TRUE);

            $dompdf->loadHtml($html);
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Observation Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
            //exit;
        } else {
            $this->load->view('userpanel/login');
        }
    }

    public function warning_records_report($oc_no = NULL)
    {
        if ($this->session->has_userdata('user_id')) {
            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');
            $id = $this->session->userdata('user_id');
            $this->db->select('pr.*, f.*');
            $this->db->from('warning_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);

            $data['warning_records'] = $this->db->get()->result_array();

            $data['term'] = $term;
            $html = $this->load->view('exo/warning_report', $data, TRUE); //$graph, TRUE);

            $dompdf->loadHtml($html);
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Warning Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
            //exit;
        } else {
            $this->load->view('userpanel/login');
        }
    }

    public function inspection_records_report($oc_no = NULL)
    {
        if ($this->session->has_userdata('user_id')) {
            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');
            $id = $this->session->userdata('user_id');

            $this->db->select('pr.*, f.*');
            $this->db->from('inspection_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);

            $data['inspection_records'] = $this->db->get()->result_array();

            $data['term'] = $term;
            $html = $this->load->view('exo/inspection_report', $data, TRUE); //$graph, TRUE);

            $dompdf->loadHtml($html);
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Warning Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
            //exit;
        } else {
            $this->load->view('userpanel/login');
        }
    }

    public function medical_records_report($oc_no = NULL)
    {
        if ($this->session->has_userdata('user_id')) {
            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');
            $id = $this->session->userdata('user_id');

            $this->db->select('pr.*, f.*');
            $this->db->from('medical_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('f.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);

            $data['medical_records'] = $this->db->get()->result_array();
            $html = $this->load->view('exo/medical_report', $data, TRUE); //$graph, TRUE);

            $dompdf->loadHtml($html);
            $dompdf->set_paper('A4', 'landscape');
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Medical Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
            //exit;
        } else {
            $this->load->view('userpanel/login');
        }
    }

    public function saluting_swimming_records_report($oc_no = NULL)
    {
        if ($this->session->has_userdata('user_id')) {
            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');
            $id = $this->session->userdata('user_id');

            $this->db->select('pr.*, f.*');
            $this->db->from('physical_milestone pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            //$this->db->where('f.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);

            $data['test_records'] = $this->db->get()->result_array();
            $html = $this->load->view('exo/saluting_swimming_report', $data, TRUE); //$graph, TRUE);

            $dompdf->loadHtml($html);
            // $dompdf->set_paper('A4', 'landscape');
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Saluting Swimming Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
            //exit;
        } else {
            $this->load->view('userpanel/login');
        }
    }

    public function physical_efficiency_records_report($oc_no = NULL)
    {
        if ($this->session->has_userdata('user_id')) {
            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');
            $id = $this->session->userdata('user_id');

            $this->db->select('pr.*, f.*');
            $this->db->from('physical_milestone pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-I');
            $data['test_records'] = $this->db->get()->result_array();

            //Term-P
            $this->db->select('pr.*, f.*');
            $this->db->from('physical_milestone pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-P');
            $data['pn_physical_tests_data_tp'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('term_i_details pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-P');
            $data['pn_pet1_data_tp'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('term_ii_details pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-P');
            $data['pn_pet2_data_tp'] = $this->db->get()->row_array();

            //Term-I
            $this->db->select('pr.*, f.*');
            $this->db->from('physical_milestone pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-I');
            $data['pn_physical_tests_data_t1'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('term_i_details pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-I');
            $data['pn_pet1_data_t1'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('term_ii_details pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-I');
            $data['pn_pet2_data_t1'] = $this->db->get()->row_array();

            //term-II
            $this->db->select('pr.*, f.*');
            $this->db->from('physical_milestone pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-II');
            $data['pn_physical_tests_data_t2'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('term_i_details pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-II');
            $data['pn_pet1_data_t2'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('term_ii_details pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-II');
            $data['pn_pet2_data_t2'] = $this->db->get()->row_array();

            //Term-III
            $this->db->select('pr.*, f.*');
            $this->db->from('physical_milestone pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-III');
            $data['pn_physical_tests_data_t3'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('term_i_details pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-III');
            $data['pn_pet1_data_t3'] = $this->db->get()->row_array();

            $this->db->select('pr.*, f.*');
            $this->db->from('term_ii_details pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', 'Term-III');
            $data['pn_pet2_data_t3'] = $this->db->get()->row_array();

            $html = $this->load->view('exo/physical_efficiency_report', $data, TRUE); //$graph, TRUE);

            $dompdf->loadHtml($html);
            // $dompdf->set_paper('A4', 'landscape');
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Physical Efficiency Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
            //exit;
        } else {
            $this->load->view('userpanel/login');
        }
    }

    public function officer_qualities_records_report($oc_no = NULL, $term = NULL)
    {
        if ($this->session->has_userdata('user_id')) {
            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');
            $id = $this->session->userdata('user_id');

            $this->db->select('pr.*, f.*');
            $this->db->from('officer_qualities pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.term', $term);
            $data['pn_officer_qualities_data'] = $this->db->get()->row_array();
            $data['term'] = $term;

            $html = $this->load->view('exo/officer_qualities_report', $data, TRUE); //$graph, TRUE);

            $dompdf->loadHtml($html);
            // $dompdf->set_paper('A4', 'landscape');
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Officer Like Qualities Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
            //exit;
        } else {
            $this->load->view('userpanel/login');
        }
    }

    public function personal_data_records_report($oc_no = NULL)
    {
        if ($this->session->has_userdata('user_id')) {
            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');
            $id = $this->session->userdata('user_id');

            $this->db->select('pr.*, f.*');
            $this->db->from('personal_datas pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $data['pn_personal_data'] = $this->db->get()->row_array();

            $html = $this->load->view('exo/personal_data_report', $data, TRUE); //$graph, TRUE);

            $dompdf->loadHtml($html);
            // $dompdf->set_paper('A4', 'landscape');
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Personal Data Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
            //exit;
        } else {
            $this->load->view('userpanel/login');
        }
    }

    public function divisional_officer_records_report($oc_no = NULL)
    {
        if ($this->session->has_userdata('user_id')) {
            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');
            $id = $this->session->userdata('user_id');

            $this->db->select('pr.*, f.*');
            $this->db->from('divisional_officer_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $data['pn_divisional_officer_data'] = $this->db->get()->result_array();

            $html = $this->load->view('exo/divisional_officer_record_report', $data, TRUE); //$graph, TRUE);

            $dompdf->loadHtml($html);
            // $dompdf->set_paper('A4', 'landscape');
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Divisional Officer Records Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
            //exit;
        } else {
            $this->load->view('userpanel/login');
        }
    }
    public function autobiography_record_report($oc_no = NULL)
    {
        if ($this->session->has_userdata('user_id')) {
            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');
            $id = $this->session->userdata('user_id');

            $this->db->select('pr.*, f.*');
            $this->db->from('divisional_officer_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $data['pn_divisional_officer_data'] = $this->db->get()->result_array();

            $html = $this->load->view('exo/autobiography_record_report', $data, TRUE); //$graph, TRUE);

            $dompdf->loadHtml($html);
            // $dompdf->set_paper('A4', 'landscape');
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Autobiography Records Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
            //exit;
        } else {
            $this->load->view('userpanel/login');
        }
    }
    public function psychology_record_report($oc_no = NULL)
    {
        if ($this->session->has_userdata('user_id')) {
            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');
            $id = $this->session->userdata('user_id');

            $this->db->select('pr.*, f.*');
            $this->db->from('divisional_officer_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $data['pn_divisional_officer_data'] = $this->db->get()->result_array();

            $html = $this->load->view('exo/psychology_record_report', $data, TRUE); //$graph, TRUE);

            $dompdf->loadHtml($html);
            // $dompdf->set_paper('A4', 'landscape');
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Psychology Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
            //exit;
        } else {
            $this->load->view('userpanel/login');
        }
    }
    public function result_record_report($oc_no = NULL, $term = NULL, $doc_type = NULL)
    {
        if ($this->session->has_userdata('user_id')) {
            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');
            $id = $this->session->userdata('user_id');

            // $this->db->select('pr.*, f.*');
            // $this->db->from('academic_records pr');
            // $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            // $this->db->where('f.oc_no', $oc_no);
            // $this->db->where('pr.term', $term);
            // $this->db->where('pr.doc_type', $doc_type);

            // $data['pn_result_record_data'] = $this->db->get()->result_array();
            $data['term'] = $term;
            if ($doc_type == 'SeaTraining') {
                $data['doc_type'] = 'Sea Training';
            } else {
                $data['doc_type'] = $doc_type;
            }

            $html = $this->load->view('exo/result_record_report', $data, TRUE); //$graph, TRUE);

            $dompdf->loadHtml($html);
            // $dompdf->set_paper('A4', 'landscape');
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Result Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
            //exit;
        } else {
            $this->load->view('userpanel/login');
        }
    }

    public function general_remarks_report($oc_no = NULL, $term = NULL, $type = NULL)
    {
        if ($this->session->has_userdata('user_id')) {
            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');
            $id = $this->session->userdata('user_id');
            $assess = '';
            if ($type == 'Mid') {
                $assess = 'Mid Term Assessment';
            } else {
                $assess = 'Terminal Assessment';
            }

            $this->db->select('pr.*, f.*');
            $this->db->from('general_remarks pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $this->db->where('pr.assessment', $assess);
            $this->db->where('pr.term', $term);
            $data['pn_general_remarks'] = $this->db->get()->result_array();
            $data['term'] = $term;
            $data['type'] = $assess;

            $html = $this->load->view('exo/general_remarks_report', $data, TRUE); //$graph, TRUE);

            $dompdf->loadHtml($html);
            // $dompdf->set_paper('A4', 'landscape');
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'General Remarks Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
            //exit;
        } else {
            $this->load->view('userpanel/login');
        }
    }

    public function progress_chart_report($oc_no = NULL)
    {
        if ($this->session->has_userdata('user_id')) {
            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');
            $id = $this->session->userdata('user_id');


            $this->db->select('pr.*, f.*');
            $this->db->from('progress_charts pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $data['pn_progress_chart'] = $this->db->get()->row_array();

            $html = $this->load->view('exo/progress_chart_report', $data, TRUE); //$graph, TRUE);

            $dompdf->loadHtml($html);
            // $dompdf->set_paper('A4', 'landscape');
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Progress Chart Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
            //exit;
        } else {
            $this->load->view('userpanel/login');
        }
    }

    public function distinction_achieved_report($oc_no = NULL)
    {
        if ($this->session->has_userdata('user_id')) {
            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');
            $id = $this->session->userdata('user_id');


            $this->db->select('pr.*, f.*');
            $this->db->from('distinctions_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $data['pn_distinctions_records'] = $this->db->get()->result_array();

            $html = $this->load->view('exo/distinction_achieved_report', $data, TRUE); //$graph, TRUE);

            $dompdf->loadHtml($html);
            // $dompdf->set_paper('A4', 'landscape');
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Distinction Achieved Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
            //exit;
        } else {
            $this->load->view('userpanel/login');
        }
    }

    public function seniority_record_report($oc_no = NULL)
    {
        if ($this->session->has_userdata('user_id')) {
            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');
            $id = $this->session->userdata('user_id');


            $this->db->select('pr.*, f.*');
            $this->db->from('seniority_records pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $data['pn_seniority_records'] = $this->db->get()->row_array();

            $html = $this->load->view('exo/seniority_record_report', $data, TRUE); //$graph, TRUE);

            $dompdf->loadHtml($html);
            // $dompdf->set_paper('A4', 'landscape');
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Seniority Records Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
            //exit;
        } else {
            $this->load->view('userpanel/login');
        }
    }

    public function branch_allocation_report($oc_no = NULL)
    {
        if ($this->session->has_userdata('user_id')) {
            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');
            $id = $this->session->userdata('user_id');


            $this->db->select('pr.*, f.*');
            $this->db->from('branch_allocations pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $data['pn_branch_allocations'] = $this->db->get()->row_array();

            $html = $this->load->view('exo/branch_allocation_report', $data, TRUE);

            $dompdf->loadHtml($html);
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Branch Allocation Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
        } else {
            $this->load->view('userpanel/login');
        }
    }

    public function warning_record_insert_report($oc_no = NULL)
    {
        if ($this->session->has_userdata('user_id')) {
            require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';
            $options = new Options();
            $options->set('isRemoteEnabled', TRUE);
            $options->set('enable_html5_parser', TRUE);
            $options->set('tempDir', $_SERVER['DOCUMENT_ROOT'] . '/pdf-export/tmp');
            $dompdf = new Dompdf($options);
            $dompdf->set_base_path($_SERVER['DOCUMENT_ROOT'] . '');
            $id = $this->session->userdata('user_id');


            $this->db->select('pr.*, f.*');
            $this->db->from('branch_allocations pr');
            $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
            // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
            $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
            $this->db->where('f.oc_no', $oc_no);
            $data['pn_branch_allocations'] = $this->db->get()->row_array();

            $html = $this->load->view('exo/warning_insert_report', $data, TRUE);

            $dompdf->loadHtml($html);
            $dompdf->render();

            $output = $dompdf->output();
            $doc_name = 'Warning Attachment Report.pdf';
            file_put_contents($doc_name, $output);
            redirect($doc_name);
        } else {
            $this->load->view('userpanel/login');
        }
    }

    public function view_result()
    {
        $this->load->view('exo/Results');
    }
    public function view_warning_attachment()
    {
        $this->load->view('exo/add_warning_attachments');
    }
    public function view_training_report()
    {
        $this->load->view('exo/Sea_Training_Report');
    }
    public function view_general_remarks()
    {
        $this->load->view('exo/add_general_remarks');
    }
    public function view_progress_chart()
    {
        $this->load->view('exo/add_progress_chart');
    }
    public function view_distinction_records()
    {
        $this->load->view('exo/add_distinction_records');
    }
    public function view_seniority_records()
    {
        $this->load->view('exo/add_seniority_records');
    }
    public function view_record_div_officer()
    {
        $this->load->view('exo/add_divisonal_officer_record');
    }
    public function view_promotion_screen()
    {
        $data['units'] = $this->db->where('id', '2')->or_where('id', '3')->or_where('id', '4')->or_where('id', '17')->get('navy_units')->result_array();
        $data['ships'] = $this->db->where('id', '6')->or_where('id', '7')->or_where('id', '8')->or_where('id', '9')->or_where('id', '10')->or_where('id', '11')->or_where('id', '12')->or_where('id', '13')->or_where('id', '14')->or_where('id', '15')->or_where('id', '16')->get('navy_units')->result_array();
        $data['branches'] = $this->db->get('branch_preference_list')->result_array();
        //print_r($data['branches']);exit;
        $this->load->view('exo/term_promotion', $data);
    }

    public function view_edit_psychologist_report($id = null)
    {
        $this->db->select('pr.*, f.*');
        $this->db->from('psychologist_reports pr');
        $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
        // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
        $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
        $this->db->where('pr.p_id', $id);
        $data['psychologist_data'] = $this->db->get()->row_array();
        // print_r($data['psychologist_data']);exit;
        $this->load->view('exo/edit_psychologist_report', $data);
    }

    public function save_psychologist_report()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());
            // print_r($_FILES['psycologist_report']['size'][0]);
            $file_size = $_FILES['psycologist_report']['size'][0] . " kb";
            // echo $file_size;exit;
            $p_id = $postData['id'];
            $upload1 = $this->upload_psychologist_report($_FILES['psycologist_report']);



            if (count($upload1) > 1) {
                $files = implode(',', $upload1);
            } else {
                $files = $upload1[0];
                // $file_type=;
                // $file_path=;
                // $file_size=;
            }
            $iparr = explode(".", $files);
            $file_type = $iparr[1];
            //$term = $postData['term'];
            $insert_array = array(
                //'oc_no' => $oc_no,
                'p_id' => $p_id,
                'do_id' => $this->session->userdata('user_id'),
                'file_name' => $files,
                'file_type' => $file_type,
                'file_size' => $file_size,
                'created_at' => date('Y-m-d H:i:s')
            );
            // print_r($insert_array);exit;
            $insert = $this->db->insert('psychologist_reports', $insert_array);

            if (!empty($insert)) {

                $cadet_name = $this->db->select('name')->where('p_id', $p_id)->get('pn_form1s')->row_array();

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'add',
                    'activity_detail' => "psychologist report added for cadet " . $cadet_name['name'],
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }
        }

        if (!empty($insert)) {
            $this->session->set_flashdata('success', 'Data Submitted successfully');
            redirect('EXO/psychologist_report');
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            redirect('EXO/add_officer_qualities');
        }
    }

    public function update_psychologist_report($id = null)
    {
        //echo $id;exit;
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());
            // print_r($_FILES['psycologist_report']['size'][0]);
            $file_size = $_FILES['psycologist_report']['size'][0] . " kb";
            // echo $file_size;exit;
            $p_id = $postData['id'];


            if ($_FILES['psycologist_report']['name'][0] != NULL) {
                $upload1 = $this->upload_psychologist_report($_FILES['psycologist_report']);
                if (count($upload1) > 1) {
                    $files = implode(',', $upload1);
                } else {
                    $files = $upload1[0];
                }
            } else {
                $files = $postData['old_file'];
            }

            $iparr = explode(".", $files);
            $file_type = $iparr[1];
            //$term = $postData['term'];
            $insert_array = array(
                //'oc_no' => $oc_no,
                //'p_id' => $p_id,
                //'do_id' => $this->session->userdata('user_id'),
                'file_name' => $files,
                'file_type' => $file_type,
                'file_size' => $file_size,
                //'created_at' => date('Y-m-d H:i:s')
            );
            //print_r($insert_array);exit;
            $this->db->where('id', $id);
            $update = $this->db->update('psychologist_reports', $insert_array);

            if (!empty($update)) {

                $cadet_name = $this->db->select('name')->where('p_id', $p_id)->get('pn_form1s')->row_array();

                $insert_activity = array(
                    'activity_module' => $this->session->userdata('acct_type'),
                    'activity_action' => 'update',
                    'activity_detail' => "psychologist report updated for cadet " . $cadet_name['name'],
                    'activity_by' => $this->session->userdata('username'),
                    'activity_date' => date('Y-m-d H:i:s')
                );

                $insert_act = $this->db->insert('activity_log', $insert_activity);
                $last_id = $this->db->insert_id();

                $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

                for ($i = 0; $i < count($query); $i++) {
                    $insert_activity_seen = array(
                        'activity_id' => $last_id,
                        'user_id' => $query[$i]['id'],
                        'seen' => 'no'
                    );
                    $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
                }
            }
        }

        if (!empty($update)) {
            $this->session->set_flashdata('success', 'Data Updated successfully');
            redirect('EXO/view_dossier_folder');
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            redirect('EXO/view_dossier_folder');
        }
    }


    public function upload_psychologist_report()
    {
        $filesCount = count($_FILES['psycologist_report']['name']);

        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['file']['name']     = $_FILES['psycologist_report']['name'][$i];
            $_FILES['file']['type']     = $_FILES['psycologist_report']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['psycologist_report']['tmp_name'][$i];
            $_FILES['file']['error']    = $_FILES['psycologist_report']['error'][$i];
            $_FILES['file']['size']     = $_FILES['psycologist_report']['size'][$i];

            $config['upload_path'] = 'uploads/documents';
            $config['allowed_types']        = 'gif|jpg|png|doc|xls|pdf|xlsx|docx|ppt|pptx|jpeg';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file')) {
                $data = array('msg' => $this->upload->display_errors());
            } else {
                $data = array('msg' => "success");
                $data['upload_data'] = $this->upload->data();
                $count[$i] = $data['upload_data']['file_name'];
            }
        }
        return $count;
    }

    public function view_edit_biography($p_id = null)
    {
        $this->db->select('pr.*, f.*');
        $this->db->from('cadets_autobiographies pr');
        $this->db->join('pn_form1s f', 'f.p_id = pr.p_id');
        // $this->db->where('pr.do_id', $this->session->userdata('user_id'));
        $this->db->where('f.unit_id', $this->session->userdata('unit_id'));
        $this->db->where('pr.p_id', $p_id);
        $data['biography_data'] = $this->db->get()->row_array();
        //print_r($data['biography_data']);exit;
        //$this->load->view('exo/edit_inspection_record', $data);
        $this->load->view('exo/edit_cadet_autobiography', $data);
    }
    public function save_autobiography()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());
            $file_size = $_FILES['autobiography']['size'][0] . " kb";
            $p_id = $postData['id'];
            $upload1 = $this->upload_autobiograhy($_FILES['autobiography']);

            if (count($upload1) > 1) {
                $files = implode(',', $upload1);
            } else {
                $files = $upload1[0];
            }
            $iparr = explode(".", $files);
            $file_type = $iparr[1];

            $insert_array = array(
                'p_id' => $p_id,
                'do_id' => $this->session->userdata('user_id'),
                'file_name' => $files,
                'file_type' => $file_type,
                'file_size' => $file_size,
                'created_at' => date('Y-m-d H:i:s')
            );
            $insert = $this->db->insert('cadets_autobiographies', $insert_array);
        }

        if (!empty($insert)) {

            $cadet_name = $this->db->select('name')->where('p_id', $p_id)->get('pn_form1s')->row_array();

            $insert_activity = array(
                'activity_module' => $this->session->userdata('acct_type'),
                'activity_action' => 'add',
                'activity_detail' => "Autobiography added for cadet " . $cadet_name['name'],
                'activity_by' => $this->session->userdata('username'),
                'activity_date' => date('Y-m-d H:i:s')
            );

            $insert_act = $this->db->insert('activity_log', $insert_activity);
            $last_id = $this->db->insert_id();

            $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

            for ($i = 0; $i < count($query); $i++) {
                $insert_activity_seen = array(
                    'activity_id' => $last_id,
                    'user_id' => $query[$i]['id'],
                    'seen' => 'no'
                );
                $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
            }
        }

        if (!empty($insert)) {
            $this->session->set_flashdata('success', 'Data Submitted successfully');
            redirect('EXO/auto_biography');
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            redirect('EXO/auto_biography');
        }
    }

    public function update_autobiography($id = null)
    {
        //echo $id;exit;
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());
            $file_size = $_FILES['autobiography']['size'][0] . " kb";
            $p_id = $postData['id'];

            if ($_FILES['autobiography']['name'][0] != NULL) {
                $upload1 = $this->upload_autobiograhy($_FILES['autobiography']);
                if (count($upload1) > 1) {
                    $files = implode(',', $upload1);
                } else {
                    $files = $upload1[0];
                }
            } else {
                $files = $postData['old_file'];
            }

            $iparr = explode(".", $files);
            $file_type = $iparr[1];

            $update_array = array(
                // 'p_id' => $p_id,
                //'do_id' => $this->session->userdata('user_id'),
                'file_name' => $files,
                'file_type' => $file_type,
                'file_size' => $file_size,
                //'created_at' => date('Y-m-d H:i:s')
            );
            //print_r($update_array);exit;
            $this->db->where('id', $id);
            $update = $this->db->update('cadets_autobiographies', $update_array);
        }

        if (!empty($update)) {

            $cadet_name = $this->db->select('name')->where('p_id', $p_id)->get('pn_form1s')->row_array();

            $insert_activity = array(
                'activity_module' => $this->session->userdata('acct_type'),
                'activity_action' => 'update',
                'activity_detail' => "Autobiography updated for cadet " . $cadet_name['name'],
                'activity_by' => $this->session->userdata('username'),
                'activity_date' => date('Y-m-d H:i:s')
            );

            $insert_act = $this->db->insert('activity_log', $insert_activity);
            $last_id = $this->db->insert_id();

            $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

            for ($i = 0; $i < count($query); $i++) {
                $insert_activity_seen = array(
                    'activity_id' => $last_id,
                    'user_id' => $query[$i]['id'],
                    'seen' => 'no'
                );
                $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
            }
        }

        if (!empty($update)) {
            $this->session->set_flashdata('success', 'Data Updated successfully');
            redirect('EXO/view_dossier_folder');
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            redirect('EXO/view_dossier_folder');
        }
    }
    public function upload_autobiograhy()
    {
        $filesCount = count($_FILES['autobiography']['name']);

        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['file']['name']     = $_FILES['autobiography']['name'][$i];
            $_FILES['file']['type']     = $_FILES['autobiography']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['autobiography']['tmp_name'][$i];
            $_FILES['file']['error']    = $_FILES['autobiography']['error'][$i];
            $_FILES['file']['size']     = $_FILES['autobiography']['size'][$i];

            $config['upload_path'] = 'uploads/documents';
            $config['allowed_types']        = 'gif|jpg|png|doc|xls|pdf|xlsx|docx|ppt|pptx|jpeg';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file')) {
                $data = array('msg' => $this->upload->display_errors());
            } else {
                $data = array('msg' => "success");
                $data['upload_data'] = $this->upload->data();
                $count[$i] = $data['upload_data']['file_name'];
            }
        }
        return $count;
    }

    public function save_general_remarks()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());
            $asses_type = $postData['assess_type'];
            $term = $postData['term'];
            $remarks = $postData['remarks'];
            $p_id = $postData['id'];

            $insert_array = array(
                'p_id' => $p_id,
                'do_id' => $this->session->userdata('user_id'),
                'assessment' => $asses_type,
                'term' => $term,
                'remarks' => $remarks,
                'created_at' => date('Y-m-d H:i:s')
            );

            $insert = $this->db->insert('general_remarks', $insert_array);
        }

        if (!empty($insert)) {

            $cadet_name = $this->db->select('name')->where('p_id', $p_id)->get('pn_form1s')->row_array();

            $insert_activity = array(
                'activity_module' => $this->session->userdata('acct_type'),
                'activity_action' => 'add',
                'activity_detail' => "General Remarks added for cadet " . $cadet_name['name'],
                'activity_by' => $this->session->userdata('username'),
                'activity_date' => date('Y-m-d H:i:s')
            );

            $insert_act = $this->db->insert('activity_log', $insert_activity);
            $last_id = $this->db->insert_id();

            $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

            for ($i = 0; $i < count($query); $i++) {
                $insert_activity_seen = array(
                    'activity_id' => $last_id,
                    'user_id' => $query[$i]['id'],
                    'seen' => 'no'
                );
                $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
            }
        }

        if (!empty($insert)) {
            $this->session->set_flashdata('success', 'Data Submitted successfully');
            redirect('EXO/view_general_remarks');
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            redirect('EXO/view_general_remarks');
        }
    }

    public function save_cadet_progress()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());
            $term = $postData['term'];

            $academic_t1 = $postData['academic_t1'];
            $olqs_t1 = $postData['olqs_t1'];
            $aggregate_t1 = $postData['aggregate_t1'];

            $academic_t2 = $postData['academic_t2'];
            $olqs_t2 = $postData['olqs_t2'];
            $aggregate_t2 = $postData['aggregate_t2'];

            $academic_t3 = $postData['academic_t3'];
            $olqs_t3 = $postData['olqs_t3'];
            $aggregate_t3 = $postData['aggregate_t3'];

            $p_id = $postData['id'];

            $count = $this->db->select('count(*) as row_count')->where('p_id', $p_id)->get('progress_charts')->row_array();

            if ($count['row_count'] > 0) {
                $action = 'Update';
            } else {
                $action = 'Insert';
            }

            if ($action == 'Insert') {
                $insert_array = array(
                    'p_id' => $p_id,
                    'do_id' => $this->session->userdata('user_id'),
                    'term1_academics' => $academic_t1,
                    'term1_olqs' => $olqs_t1,
                    'term1_aggregate' => $aggregate_t1,
                    'term2_academics' => $academic_t2,
                    'term2_olqs' => $olqs_t2,
                    'term2_aggregate' => $aggregate_t2,
                    'term3_academics' => $academic_t3,
                    'term3_olqs' => $olqs_t3,
                    'term3_aggregate' => $aggregate_t3,
                    'created_at' => date('Y-m-d H:i:s')
                );
                $insert = $this->db->insert('progress_charts', $insert_array);
            } elseif ($action == 'Update') {
                $update_array = array(
                    'do_id' => $this->session->userdata('user_id'),
                    'term1_academics' => $academic_t1,
                    'term1_olqs' => $olqs_t1,
                    'term1_aggregate' => $aggregate_t1,
                    'term2_academics' => $academic_t2,
                    'term2_olqs' => $olqs_t2,
                    'term2_aggregate' => $aggregate_t2,
                    'term3_academics' => $academic_t3,
                    'term3_olqs' => $olqs_t3,
                    'term3_aggregate' => $aggregate_t3,
                    'created_at' => date('Y-m-d H:i:s')
                );

                $cond  = ['p_id' => $p_id];
                $this->db->where($cond);
                $update = $this->db->update('progress_charts', $update_array);
            }
        }

        if (!empty($update) || !empty($insert)) {

            $cadet_name = $this->db->select('name')->where('p_id', $p_id)->get('pn_form1s')->row_array();

            $insert_activity = array(
                'activity_module' => $this->session->userdata('acct_type'),
                'activity_action' => 'add',
                'activity_detail' => "Progress Report added for cadet " . $cadet_name['name'],
                'activity_by' => $this->session->userdata('username'),
                'activity_date' => date('Y-m-d H:i:s')
            );

            $insert_act = $this->db->insert('activity_log', $insert_activity);
            $last_id = $this->db->insert_id();

            $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

            for ($i = 0; $i < count($query); $i++) {
                $insert_activity_seen = array(
                    'activity_id' => $last_id,
                    'user_id' => $query[$i]['id'],
                    'seen' => 'no'
                );
                $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
            }
        }

        if (!empty($insert) || !empty($update)) {
            $this->session->set_flashdata('success', 'Data Submitted successfully');
            redirect('EXO/view_progress_chart');
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            redirect('EXO/view_progress_chart');
        }
    }

    public function save_cadet_seniority_record()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());
            $term = $postData['term'];
            $p_id = $postData['id'];

            $marks_t1 = $postData['marks_t1'];
            $aggregate_t1 = $postData['aggregate_t1'];
            $relegate_t1 = $postData['relegate_t1'];
            $failed_subjects_t1 = $postData['failed_subjects_t1'];
            $seniority_gain_loss_t1 = $postData['seniority_gain_loss_t1'];

            $marks_t2 = $postData['marks_t2'];
            $aggregate_t2 = $postData['aggregate_t2'];
            $relegate_t2 = $postData['relegate_t2'];
            $failed_subjects_t2 = $postData['failed_subjects_t2'];
            $seniority_gain_loss_t2 = $postData['seniority_gain_loss_t2'];

            $marks_t3 = $postData['marks_t3'];
            $aggregate_t3 = $postData['aggregate_t3'];
            $relegate_t3 = $postData['relegate_t3'];
            $failed_subjects_t3 = $postData['failed_subjects_t3'];
            $seniority_gain_loss_t3 = $postData['seniority_gain_loss_t3'];

            $net_percentage = $postData['net_percentage'];
            $seniority_gained = $postData['seniority_gained'];
            $seniority_lost = $postData['seniority_lost'];
            $net_seniority = $postData['net_seniority'];

            $count = $this->db->select('count(*) as row_count')->where('p_id', $p_id)->get('seniority_records')->row_array();

            if ($count['row_count'] > 0) {
                $action = 'Update';
            } else {
                $action = 'Insert';
            }

            if ($action == 'Insert') {
                $insert_array = array(
                    'p_id' => $p_id,
                    'term1_marks' => $marks_t1,
                    'term1_percentage' => $aggregate_t1,
                    'term1_relegated' => $relegate_t1,
                    'term1_subjects_failed'  => $failed_subjects_t1,
                    'term1_seniority' => $seniority_gain_loss_t1,
                    'term2_marks' => $marks_t2,
                    'term2_percentage' => $aggregate_t2,
                    'term2_relegated' => $relegate_t2,
                    'term2_subjects_failed' => $failed_subjects_t2,
                    'term2_seniority' => $seniority_gain_loss_t2,
                    'term3_marks' => $marks_t3,
                    'term3_percentage' => $aggregate_t3,
                    'term3_relegated' => $relegate_t3,
                    'term3_subjects_failed' => $failed_subjects_t3,
                    'term3_seniority' => $seniority_gain_loss_t3,
                    'net_percentage' => $net_percentage,
                    'seniority_gained' => $seniority_gained,
                    'seniority_lost' => $seniority_lost,
                    'net_seniority' => $net_seniority,
                    'phase' => 'Phase1',
                    'do_id' => $this->session->userdata('user_id'),
                    'created_at' => date('Y-m-d H:i:s')
                );
                $insert = $this->db->insert('seniority_records', $insert_array);
            } elseif ($action == 'Update') {
                $update_array = array(
                    'do_id' => $this->session->userdata('user_id'),
                    'term1_marks' => $marks_t1,
                    'term1_percentage' => $aggregate_t1,
                    'term1_relegated' => $relegate_t1,
                    'term1_subjects_failed'  => $failed_subjects_t1,
                    'term1_seniority' => $seniority_gain_loss_t1,
                    'term2_marks' => $marks_t2,
                    'term2_percentage' => $aggregate_t2,
                    'term2_relegated' => $relegate_t2,
                    'term2_subjects_failed' => $failed_subjects_t2,
                    'term2_seniority' => $seniority_gain_loss_t2,
                    'term3_marks' => $marks_t3,
                    'term3_percentage' => $aggregate_t3,
                    'term3_relegated' => $relegate_t3,
                    'term3_subjects_failed' => $failed_subjects_t3,
                    'term3_seniority' => $seniority_gain_loss_t3,
                    'net_percentage' => $net_percentage,
                    'seniority_gained' => $seniority_gained,
                    'seniority_lost' => $seniority_lost,
                    'net_seniority' => $net_seniority,
                    'phase' => 'Phase1',
                    'do_id' => $this->session->userdata('user_id'),
                    'updated_at' => date('Y-m-d H:i:s')
                );

                $cond  = ['p_id' => $p_id];
                $this->db->where($cond);
                $update = $this->db->update('seniority_records', $update_array);
            }
        }

        if (!empty($update) || !empty($insert)) {

            $cadet_name = $this->db->select('name')->where('p_id', $p_id)->get('pn_form1s')->row_array();

            $insert_activity = array(
                'activity_module' => $this->session->userdata('acct_type'),
                'activity_action' => 'add',
                'activity_detail' => "Seniority Record added for cadet " . $cadet_name['name'],
                'activity_by' => $this->session->userdata('username'),
                'activity_date' => date('Y-m-d H:i:s')
            );

            $insert_act = $this->db->insert('activity_log', $insert_activity);
            $last_id = $this->db->insert_id();

            $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

            for ($i = 0; $i < count($query); $i++) {
                $insert_activity_seen = array(
                    'activity_id' => $last_id,
                    'user_id' => $query[$i]['id'],
                    'seen' => 'no'
                );
                $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
            }
        }

        if (!empty($insert) || !empty($update)) {
            $this->session->set_flashdata('success', 'Data Submitted successfully');
            redirect('EXO/view_seniority_records');
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            redirect('EXO/view_seniority_records');
        }
    }

    public function save_distinction_records()
    {
        if ($this->input->post()) {
            $postData = $this->security->xss_clean($this->input->post());
            $academic = $postData['academic'];
            $sports = $postData['sports'];
            $extra_activities = $postData['extra_activites'];
            $p_id = $postData['id'];

            $insert_array = array(
                'p_id' => $p_id,
                'do_id' => $this->session->userdata('user_id'),
                'academic' => $academic,
                'sports' => $sports,
                'extra_curricular_activities' => $extra_activities,
                'created_at' => date('Y-m-d H:i:s')
            );

            $insert = $this->db->insert('distinctions_records', $insert_array);
        }

        if (!empty($insert)) {

            $cadet_name = $this->db->select('name')->where('p_id', $p_id)->get('pn_form1s')->row_array();

            $insert_activity = array(
                'activity_module' => $this->session->userdata('acct_type'),
                'activity_action' => 'add',
                'activity_detail' => "Distinction record added for cadet " . $cadet_name['name'],
                'activity_by' => $this->session->userdata('username'),
                'activity_date' => date('Y-m-d H:i:s')
            );

            $insert_act = $this->db->insert('activity_log', $insert_activity);
            $last_id = $this->db->insert_id();

            $query = $this->db->where('username !=', $this->session->userdata('username'))->get('security_info')->result_array();

            for ($i = 0; $i < count($query); $i++) {
                $insert_activity_seen = array(
                    'activity_id' => $last_id,
                    'user_id' => $query[$i]['id'],
                    'seen' => 'no'
                );
                $insert_act_seen = $this->db->insert('activity_log_seen', $insert_activity_seen);
            }
        }

        if (!empty($insert)) {
            $this->session->set_flashdata('success', 'Data Submitted successfully');
            redirect('EXO/view_distinction_records');
        } else {
            $this->session->set_flashdata('failure', 'Something went wrong, try again.');
            redirect('EXO/view_distinction_records');
        }
    }

    public function get_progress_chart_values()
    {
        if ($this->input->post()) {
            $p_id = $_POST['p_id'];
            $query = $this->db->where('p_id', $p_id)->get('progress_charts')->row_array();
            echo json_encode($query);
        }
    }

    public function get_seniority_values()
    {
        if ($this->input->post()) {
            $p_id = $_POST['p_id'];
            $query = $this->db->where('p_id', $p_id)->get('seniority_records')->row_array();
            echo json_encode($query);
        }
    }
}
