<?php if ($this->session->userdata('acct_type') == 'do') {
    $this->load->view('do/common/header');
} else if ($this->session->userdata('acct_type') == 'joto') {
    $this->load->view('joto/common/header');
} else if ($this->session->userdata('acct_type') == 'exo') {
    $this->load->view('exo/common/header');
} else if ($this->session->userdata('acct_type') == 'co') {
    $this->load->view('co/common/header');
} else if ($this->session->userdata('acct_type') == 'ct') {
    $this->load->view('ct/common/header');
} else if ($this->session->userdata('acct_type') == 'sqc') {
    $this->load->view('sqc/common/header');
} else if ($this->session->userdata('acct_type') == 'cao') {
    $this->load->view('cao/common/header');
} else if ($this->session->userdata('acct_type') == 'cao_sec') {
    $this->load->view('cao_sec/common/header');
} else if ($this->session->userdata('acct_type') == 'smo') {
    $this->load->view('smo/common/header');
} else if ($this->session->userdata('acct_type') == 'ctmwt') {
    $this->load->view('ctmwt/common/header');
} else if ($this->session->userdata('acct_type') == 'dean') {
    $this->load->view('dean/common/header');
} else if ($this->session->userdata('acct_type') == 'hougp') {
    $this->load->view('hougp/common/header');
} ?>
<?php !isset($oc_no_entered) ? $oc_no_entered = '' : $oc_no_entered; ?>
<style>
    .red-border {
        border: 1px solid red !important;
    }
</style>

<div class="container-fluid my-2">


    <div class="modal fade" id="punishments">
        <!-- <div class="row"> -->
        <div class="modal-dialog modal-dialog-centered " style="margin-left: 250px;" role="document">
            <div class="modal-content bg-custom3" style="width:1200px;">
                <div class="modal-header" style="width:1200px;">
                </div>
                <div class="card-body bg-custom3">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header bg-custom1">
                                    <h1 class="h4">Punishments Record</h1>
                                </div>

                                <div class="card-body bg-custom3">
                                    <form class="user" role="form" method="post" id="add_form" action="<?= base_url(); ?>Project_Officer/insert_project">
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <h3 id="cadet_name_heading"></h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <h3 id="cadet_oc_no"></h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <h3 id="cadet_term"></h3>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div id="table_div">
                                                <table id="datatable" class="table table-striped" style="color:black">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No.</th>
                                                            <th scope="col">Term</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Offence</th>
                                                            <th scope="col">Punishment</th>
                                                            <th scope="col">Start Date</th>
                                                            <th scope="col">End Date</th>
                                                            <th scope="col">Days</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Edit</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="table_rows_punishment">
                                                        <tr>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_punishment">
        <!-- <div class="row"> -->
        <div class="modal-dialog modal-dialog-centered " style="margin-left: 250px;" role="document">
            <div class="modal-content bg-custom3" style="width:1200px;">
                <div class="modal-header" style="width:1200px;">
                </div>
                <div class="card-body bg-custom3">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header bg-custom1">
                                    <h1 class="h4">Update Punishments Record</h1>
                                </div>

                                <div class="card-body bg-custom3">
                                    <form class="user" role="form" method="post" id="save_form" action="<?= base_url(); ?>DEAN/update_punishment">
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <h6>&nbsp;Name:</h6>
                                            </div>

                                            <div class="col-sm-4">
                                                <h6>&nbsp;Term:</h6>
                                            </div>

                                            <div class="col-sm-4">
                                                <h6>&nbsp;Division:</h6>
                                            </div>

                                        </div>
                                        <div class="form-group row">

                                            <div class="col-sm-4 mb-1" style="display:none">
                                                <input type="text" class="" name="oc_num_ep" id="oc_num">
                                            </div>
                                            <div class="col-sm-4 mb-1" style="display:none">
                                                <input type="text" class="" name="id_ep" id="id">
                                            </div>
                                            <input type="hidden" class="form-control form-control-user" name="page" id="page" val="dossier">

                                            <input type="hidden" class="form-control form-control-user" name="punish_id" id="punish_id" val="">
                                            <div class="col-sm-4 mb-1">
                                                <input type="text" class="form-control form-control-user" name="name" id="name" style="font-weight: bold; font-size:large" placeholder="Name" readonly>
                                            </div>
                                            <div class="col-sm-4 mb-1">
                                                <input type="text" class="form-control form-control-user" name="term" id="term" style="font-weight: bold; font-size:large" placeholder="Term" readonly>
                                            </div>
                                            <div class="col-sm-4 mb-1">
                                                <input type="text" class="form-control form-control-user" name="division" id="division" style="font-weight: bold; font-size:large" placeholder="Division" readonly>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <h6>&nbsp;Punishment Detail:</h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-1">
                                                <textarea class="form-control form-control-user" name="punish" id="punish" style="border-radius:10px" placeholder="Add Punishment details"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <h6>&nbsp;Offense:</h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-1">
                                                <textarea class="form-control form-control-user" name="offense" id="offense" style="border-radius:10px" placeholder="Add Offense details"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <h6>&nbsp;Start Date:</h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <h6>&nbsp;End Date:</h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <h6>&nbsp;Total Days:</h6>
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-1">
                                                <input type="date" class="form-control form-control-user" name="start_date" id="start_date">
                                            </div>
                                            <div class="col-sm-4 mb-1">
                                                <input type="date" class="form-control form-control-user" name="end_date" id="end_date">
                                                <span id="error_end_date" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;End Date cannot be less than start date</span>
                                            </div>
                                            <div class="col-sm-4 mb-1">
                                                <input type="text" class="form-control form-control-user" name="days" id="days">
                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-center">
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-primary btn-user btn-block" id="save_btn_punishment">
                                                    <!-- <i class="fab fa-google fa-fw"></i>   -->
                                                    Update
                                                </button>
                                                <span id="show_error_save" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please check errors*</span>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="excuses">
        <!-- <div class="row"> -->
        <div class="modal-dialog modal-dialog-centered " style="margin-left: 250px;" role="document">
            <div class="modal-content bg-custom3" style="width:1200px;">
                <div class="modal-header" style="width:1200px;">
                </div>
                <div class="card-body bg-custom3">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header bg-custom1">
                                    <h1 class="h4">Excuses Record</h1>
                                </div>

                                <div class="card-body bg-custom3">
                                    <form class="user" role="form" method="post" id="add_form" action="<?= base_url(); ?>Project_Officer/insert_project">
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <h3 id="cadet_name_heading_ex"></h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <h3 id="cadet_oc_no_ex"></h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <h3 id="cadet_term_ex"></h3>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div id="table_div">
                                                <table id="datatable" class="table table-striped" style="color:black">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No.</th>
                                                            <th scope="col">Term</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Disease</th>
                                                            <th scope="col">Excuse</th>
                                                            <th scope="col">Start Date</th>
                                                            <th scope="col">End Date</th>
                                                            <th scope="col">Days</th>
                                                            <th scope="col">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="table_rows_excuses">
                                                        <tr>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Observation-->
    <div class="modal fade" id="observations">
        <!-- <div class="row"> -->
        <div class="modal-dialog modal-dialog-centered " style="margin-left: 250px;" role="document">
            <div class="modal-content bg-custom3" style="width:1200px;">
                <div class="modal-header" style="width:1200px;">
                </div>
                <div class="card-body bg-custom3">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header bg-custom1">
                                    <h1 class="h4">Observation Record</h1>
                                </div>

                                <div class="card-body bg-custom3">
                                    <form class="user" role="form" method="post" id="add_form" action="<?= base_url(); ?>Project_Officer/insert_project">
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <h3 id="cadet_name_heading_ob"></h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <h3 id="cadet_oc_no_ob"></h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <h3 id="cadet_term_ob"></h3>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div id="table_div">
                                                <table id="datatable" class="table table-striped" style="color:black">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No.</th>
                                                            <th scope="col">Term</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">observation</th>
                                                            <th scope="col">Created Date</th>
                                                            <th scope="col">Edit</th>
                                                            <!--  <th scope="col">Days</th>
                                                            <th scope="col">Status</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody id="table_rows_observations">
                                                        <tr>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_observation">
        <!-- <div class="row"> -->
        <div class="modal-dialog modal-dialog-centered " style="margin-left: 250px;" role="document">
            <div class="modal-content bg-custom3" style="width:1200px;">
                <div class="modal-header" style="width:1200px;">
                </div>
                <div class="card-body bg-custom3">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header bg-custom1">
                                    <h1 class="h4">Edit Observation Record</h1>
                                </div>

                                <div class="card-body bg-custom3">

                                    <div class="card-body">
                                        <form class="user" role="form" method="post" id="save_form_observation" action="<?= base_url(); ?>DEAN/update_cadet_observation">
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <h6>&nbsp;Name:</h6>
                                                </div>

                                                <div class="col-sm-4">
                                                    <h6>&nbsp;Term:</h6>
                                                </div>

                                                <div class="col-sm-4">
                                                    <h6>&nbsp;Division:</h6>
                                                </div>

                                            </div>
                                            <div class="form-group row">

                                                <div class="col-sm-4 mb-1" style="display:none">
                                                    <input type="text" class="" name="oc_num" id="oc_num_eo">
                                                </div>
                                                <div class="col-sm-4 mb-1" style="display:none">
                                                    <input type="text" class="" name="id" id="id_eo">
                                                </div>
                                                <input type="hidden" class="form-control form-control-user" name="page" id="page1" val="dossier">

                                                <div class="col-sm-4 mb-1">
                                                    <input type="text" class="form-control form-control-user" name="name" id="name_eo" style="font-weight: bold; font-size:large" placeholder="Name" readonly>
                                                </div>
                                                <div class="col-sm-4 mb-1">
                                                    <input type="text" class="form-control form-control-user" name="term" id="term_eo" style="font-weight: bold; font-size:large" placeholder="Term" readonly>
                                                </div>
                                                <div class="col-sm-4 mb-1">
                                                    <input type="text" class="form-control form-control-user" name="division" id="division_eo" style="font-weight: bold; font-size:large" placeholder="Division" readonly>
                                                </div>
                                                <input type="hidden" id="observation_id" name="observation_id">
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <h6>&nbsp;Add Observation:</h6>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-1">
                                                    <textarea class="form-control form-control-user" name="observation" id="observation_eo" style="border-radius:10px" placeholder="Add Observation"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-center">
                                                <div class="col-sm-4">
                                                    <button type="button" class="btn btn-primary btn-user btn-block" id="save_btn_observation">
                                                        <!-- <i class="fab fa-google fa-fw"></i>   -->
                                                        Update
                                                    </button>
                                                    <span id="show_error_save" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please check errors*</span>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Physical Milestone  -->
    <div class="modal fade" id="milestone">
        <!-- <div class="row"> -->
        <div class="modal-dialog modal-dialog-centered" style="margin-left: 250px;" role="document">
            <div class="modal-content bg-custom3" style="width:1200px;">
                <div class="modal-header" style="width:1200px;">
                </div>
                <div class="card-body bg-custom3">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header bg-custom1">
                                    <h1 class="h4">Physical Milestone Record</h1>
                                </div>

                                <div class="card-body bg-custom3">
                                    <form class="user" role="form" method="post" id="add_form" action="">
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <h3 id="cadet_name_heading_ms"></h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <h3 id="cadet_oc_no_ms"></h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <h3 id="cadet_term_ms"></h3>
                                            </div>
                                        </div>

                                        <div class="card-body" id="milestone_details">
                                            <!-- <div id="table_div">
                                                <table id="datatable" class="table table-striped" style="color:black">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">PST Result</th>
                                                            <th scope="col">PST Attempt</th>
                                                            <th scope="col">SST Result</th>
                                                            <th scope="col">SST Attempt</th>
                                                            <th scope="col">PET-I Result</th>
                                                            <th scope="col">PET-I Attempt</th>
                                                            <th scope="col">PET-II Result</th>
                                                            <th scope="col">PET-II Attempt</th>
                                                            <th scope="col">Assault Result</th>
                                                            <th scope="col">Assault Attempt</th>
                                                            <th scope="col">Saluting Result</th>
                                                            <th scope="col">Saluting Attempt</th>
                                                            <th scope="col">PLX Result</th>
                                                            <th scope="col">PLX Attempt</th>


                                                        </tr>
                                                    </thead>
                                                    <tbody id="table_rows_milestone">
                                                        <tr>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div> -->
                                        </div>

                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="warning">
        <!-- <div class="row"> -->
        <div class="modal-dialog modal-dialog-centered " style="margin-left: 250px;" role="document">
            <div class="modal-content bg-custom3" style="width:1200px;">
                <div class="modal-header" style="width:1200px;">
                </div>
                <div class="card-body bg-custom3">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header bg-custom1">
                                    <h1 class="h4">Warnings Record</h1>
                                </div>

                                <div class="card-body bg-custom3">
                                    <form class="user" role="form" method="post" id="add_form" action="<?= base_url(); ?>Project_Officer/insert_project">
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <h3 id="cadet_name_heading_w"></h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <h3 id="cadet_oc_no_w"></h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <h3 id="cadet_term_w"></h3>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div id="table_div">
                                                <table id="datatable" class="table table-striped" style="color:black">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No.</th>
                                                            <th scope="col">Term</th>
                                                            <th scope="col">Issued By</th>
                                                            <th scope="col">Reason</th>
                                                            <th scope="col">Warning Type</th>
                                                            <th scope="col">date</th>
                                                            <th scope="col">Edit</th>
                                                            <!--    <th scope="col">Start Date</th>
                                                            <th scope="col">End Date</th>
                                                            <th scope="col">Days</th>
                                                            <th scope="col">Status</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody id="table_rows_warning">
                                                        <tr>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="branches">
        <!-- <div class="row"> -->
        <div class="modal-dialog modal-dialog-centered " style="margin-left: 250px;" role="document">
            <div class="modal-content bg-custom3" style="width:1200px;">
                <div class="modal-header" style="width:1200px;">
                </div>
                <div class="card-body bg-custom3">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header bg-custom1">
                                    <h1 class="h4">Branches Record</h1>
                                </div>

                                <div class="card-body bg-custom3">
                                    <form class="user" role="form" method="post" id="add_form" action="">
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <h3 id="cadet_name_heading_b"></h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <h3 id="cadet_oc_no_b"></h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <h3 id="cadet_term_b"></h3>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div id="table_div">
                                                <table id="datatable" class="table table-striped" style="color:black">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No.</th>
                                                            <th scope="col">1st Preference</th>
                                                            <th scope="col">2nd Preference</th>
                                                            <th scope="col">3rd Preference</th>
                                                            <th scope="col">Branch Allocated</th>
                                                            <th scope="col">Branch Recommendation</th>
                                                            <th scope="col">Edit</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="table_rows_branches">
                                                        <tr>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_branches">
        <!-- <div class="row"> -->
        <div class="modal-dialog modal-dialog-centered " style="margin-left: 250px;" role="document">
            <div class="modal-content bg-custom3" style="width:1200px;">
                <div class="modal-header" style="width:1200px;">
                </div>
                <div class="card-body bg-custom3">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header bg-custom1">
                                    <h1 class="h4">Update Branches Record</h1>
                                </div>

                                <div class="card-body bg-custom3">
                                    <form class="user" role="form" method="post" id="save_form_branches" action="<?= base_url(); ?>DEAN/update_branches_allocation">
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <h6>&nbsp;Name:</h6>
                                            </div>

                                            <div class="col-sm-4">
                                                <h6>&nbsp;Term:</h6>
                                            </div>

                                            <div class="col-sm-4">
                                                <h6>&nbsp;Division:</h6>
                                            </div>

                                        </div>
                                        <div class="form-group row">

                                            <div class="col-sm-4 mb-1" style="display:none">
                                                <input type="text" class="" name="oc_num_b" id="oc_num_b">
                                            </div>
                                            <div class="col-sm-4 mb-1" style="display:none">
                                                <input type="text" class="" name="id_b" id="id_b">
                                            </div>

                                            <div class="col-sm-4 mb-1">
                                                <input type="text" class="form-control form-control-user" name="name_b" id="name_b" style="font-weight: bold; font-size:large" placeholder="Name" readonly>
                                            </div>
                                            <div class="col-sm-4 mb-1">
                                                <input type="text" class="form-control form-control-user" name="term_b" id="term_b" style="font-weight: bold; font-size:large" placeholder="Term" readonly>
                                            </div>
                                            <div class="col-sm-4 mb-1">
                                                <input type="text" class="form-control form-control-user" name="division_b" id="division_b" style="font-weight: bold; font-size:large" placeholder="Division" readonly>
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <h5 style="text-decoration:underline">Preference Order by Cadet</h5>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <h6>&nbsp;Preference 1:</h6>
                                            </div>

                                            <div class="col-sm-4">
                                                <h6>&nbsp;Preference 2:</h6>
                                            </div>

                                            <div class="col-sm-4">
                                                <h6>&nbsp;Preference 3:</h6>
                                            </div>

                                        </div>
                                        <div class="form-group row">

                                            <div class="col-sm-4 mb-1">
                                                <select class="form-control rounded-pill" name="prefer_1" id="prefer_1" data-placeholder="Select ship" style="font-size: 0.8rem; height:50px;">
                                                    <option class="form-control form-control-user" value="">Select 1st Preference</option>
                                                    <?php $branch_list = $this->db->get('branch_preference_list')->result_array(); ?>
                                                    <?php foreach ($branch_list as $data) { ?>
                                                        <option class="form-control form-control-user" value="<?= $data['branch_name'] ?>"><?= $data['branch_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-4 mb-1">
                                                <select class="form-control rounded-pill" name="prefer_2" id="prefer_2" data-placeholder="Select ship" style="font-size: 0.8rem; height:50px;">
                                                    <option class="form-control form-control-user" value="">Select 2nd Preference</option>
                                                    <?php foreach ($branch_list as $data) { ?>
                                                        <option class="form-control form-control-user" value="<?= $data['branch_name'] ?>"><?= $data['branch_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-4 mb-1">
                                                <select class="form-control rounded-pill" name="prefer_3" id="prefer_3" data-placeholder="Select ship" style="font-size: 0.8rem; height:50px;">
                                                    <option class="form-control form-control-user" value="">Select 3rd Preference</option>
                                                    <?php foreach ($branch_list as $data) { ?>
                                                        <option class="form-control form-control-user" value="<?= $data['branch_name'] ?>"><?= $data['branch_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <h6>&nbsp;Branch Recommended:</h6>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-1">
                                                <input type="text" class="form-control form-control-user" name="recommended_branch" id="recommended_branch" placeholder="Recommended Branch">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <h6>&nbsp;Branch Allocation:</h6>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-1">
                                                <input type="text" class="form-control form-control-user" name="allocated_branch" id="allocated_branch" placeholder="Branch Allocated">
                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-center">
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-primary btn-user btn-block" id="save_btn_branches">
                                                    <!-- <i class="fab fa-google fa-fw"></i>   -->
                                                    save
                                                </button>
                                                <span id="show_error_save" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please check errors*</span>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="edit_warning" style="z-index: 2100">
        <!-- <div class="row"> -->
        <div class="modal-dialog modal-dialog-centered " style="margin-left: 250px;" role="document">
            <div class="modal-content bg-custom3" style="width:1200px;">
                <div class="modal-header" style="width:1200px;">
                </div>
                <div class="card-body bg-custom3">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header bg-custom1">
                                    <h1 class="h4">Update Warnings Record</h1>
                                </div>

                                <div class="card-body bg-custom3">
                                    <!--     <form class="user" role="form" method="post" id="add_form" action="<?= base_url(); ?>Project_Officer/insert_project"> -->
                                    <!--  <div class="form-group row">
                                            <div class="col-sm-4">
                                                <h3 id="cadet_name_heading_ew"></h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <h3 id="cadet_oc_no_ew"></h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <h3 id="cadet_term_ew"></h3>
                                            </div>
                                        </div> -->

                                    <div class="card-body">
                                        <form class="user" role="form" method="post" enctype="multipart/form-data" id="save_form" action="<?= base_url(); ?>DEAN/update_cadet_warning">
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <h6>&nbsp;Name:</h6>
                                                </div>

                                                <div class="col-sm-4">
                                                    <h6>&nbsp;Term:</h6>
                                                </div>

                                                <div class="col-sm-4">
                                                    <h6>&nbsp;Division:</h6>
                                                </div>

                                            </div>
                                            <div class="form-group row">

                                                <div class="col-sm-4 mb-1" style="display:none">
                                                    <input type="text" class="" name="oc_num" id="oc_num_ew">
                                                </div>
                                                <div class="col-sm-4 mb-1" style="display:none">
                                                    <input type="text" class="" name="id" id="id_ew">
                                                </div>

                                                <div class="col-sm-4 mb-1">
                                                    <input type="text" class="form-control form-control-user" name="name" id="name" style="font-weight: bold; font-size:large" placeholder="Name" readonly>
                                                </div>
                                                <div class="col-sm-4 mb-1">
                                                    <input type="text" class="form-control form-control-user" name="term" id="term" style="font-weight: bold; font-size:large" placeholder="Term" readonly>
                                                </div>
                                                <div class="col-sm-4 mb-1">
                                                    <input type="text" class="form-control form-control-user" name="division" id="division" style="font-weight: bold; font-size:large" placeholder="Division" readonly>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <h6>&nbsp;Date:</h6>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h6>&nbsp;Issue By:</h6>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h6>&nbsp;Warning Type:</h6>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4 mb-1">
                                                    <input type="date" class="form-control form-control-user" name="date" id="date">
                                                </div>
                                                <div class="col-sm-4 mb-1">
                                                    <input type="text" class="form-control form-control-user" name="issued_by" id="issued_by" placeholder="Issue by">
                                                    <span id="error_end_date" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;End Date cannot be less than start date</span>
                                                </div>
                                                <div class="col-sm-4 mb-1">
                                                    <select class="form-control rounded-pill" name="warning_type" id="warning_type" data-placeholder="Warning Type" style="font-size: 0.8rem; height:50px;">
                                                        <option class="form-control form-control-user" value="">Select Warning Type</option>
                                                        <option class="form-control form-control-user" value="red">Red</option>
                                                        <option class="form-control form-control-user" value="orange">Orange</option>
                                                        <option class="form-control form-control-user" value="yellow">Yellow</option>
                                                        <option class="form-control form-control-user" value="white">White</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <h6>&nbsp;Reasons:</h6>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-1">
                                                    <textarea class="form-control form-control-user" name="reason" id="reason" style="border-radius:10px" placeholder="Add warning reasons"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <h6>&nbsp;Upload Warning Letter:</h6>
                                                </div>
                                            </div>

                                            <div class="form-group row custom-file-upload">
                                                <div class="col-sm-12 mb-1">
                                                    <input type="file" style="height: 50px; padding:10px !important;" multiple="multiple" class="form-control form-control-user" placeholder="Upload Document" name="file[]" x-model="fileName">
                                                    <label style="color: black;font-weight: bold;" id="file_name"></label>
                                                </div>
                                            </div>
                                            <input type="hidden" name="old_file" id="old_file">
                                            <div class="form-group row justify-content-center">
                                                <div class="col-sm-4">
                                                    <button type="button" class="btn btn-primary btn-user btn-block" id="save_btn">
                                                        <!-- <i class="fab fa-google fa-fw"></i>   -->
                                                        Update
                                                    </button>
                                                    <span id="show_error_save" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please check errors*</span>
                                                </div>
                                            </div>

                                        </form>

                                    </div>

                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="PET_I">
        <!-- <div class="row"> -->
        <div class="modal-dialog modal-dialog-centered " style="margin-left: 370px;" role="document">
            <div class="modal-content bg-custom3" style="width:1000px;">
                <div class="modal-header" style="width:1000px;">
                </div>
                <div class="card-body bg-custom3">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header bg-custom1">
                                    <h1 class="h4">PET-I Details</h1>
                                </div>

                                <div class="card-body bg-custom3">
                                    <form class="user" role="form" method="post" id="add_form" action="">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <h3 id="cadet_name_heading"></h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>Mile Time:</strong></h6>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 id="mile_time1_detail"></h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>Chinups:</strong></h6>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 id="chinups1_detail"></h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>Pushups:</strong></h6>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 id="pushup1_detail"></h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>Rope:</strong></h6>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 id="rope1_detail"></h6>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="PET_II">
        <!-- <div class="row"> -->
        <div class="modal-dialog modal-dialog-centered " style="margin-left: 370px;" role="document">
            <div class="modal-content bg-custom3" style="width:1000px;">
                <div class="modal-header" style="width:1000px;">
                </div>
                <div class="card-body bg-custom3">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header bg-custom1">
                                    <h1 class="h4">PET-II Details</h1>
                                </div>

                                <div class="card-body bg-custom3">
                                    <form class="user" role="form" method="post" id="add_form" action="">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <h3 id="cadet_name_heading"></h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>Mile Time:</strong></h6>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 id="mile_time2_detail"></h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>Chinups:</strong></h6>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 id="chinups2_detail"></h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>Pushups:</strong></h6>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 id="pushup2_detail"></h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>Rope:</strong></h6>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6 id="rope2_detail"></h6>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="clubs">
        <!-- <div class="row"> -->
        <div class="modal-dialog modal-dialog-centered " style="margin-left: 250px;" role="document">
            <div class="modal-content bg-custom3" style="width:1200px;">
                <div class="modal-header" style="width:1200px;">
                </div>
                <div class="card-body bg-custom3">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header bg-custom1">
                                    <h1 class="h4">Club Record</h1>
                                </div>

                                <div class="card-body bg-custom3">
                                    <form class="user" role="form" method="post" id="add_form" action="">
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <h3 id="cadet_name_heading_club"></h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <h3 id="cadet_oc_no_club"></h3>
                                            </div>
                                            <div class="col-sm-4">
                                                <h3 id="cadet_term_club"></h3>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div id="table_div">
                                                <table id="datatable" class="table table-striped" style="color:black">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No.</th>
                                                            <th scope="col">Term</th>
                                                            <th scope="col">Assigned Club</th>
                                                            <th scope="col">Created Date</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="table_rows_club">
                                                        <tr>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_clubs">
        <!-- <div class="row"> -->
        <div class="modal-dialog modal-dialog-centered " style="margin-left: 250px;" role="document">
            <div class="modal-content bg-custom3" style="width:1200px;">
                <div class="modal-header" style="width:1200px;">
                </div>
                <div class="card-body bg-custom3">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header bg-custom1">
                                    <h1 class="h4">Edit Club Record</h1>
                                </div>

                                <div class="card-body bg-custom3">

                                    <div class="card-body">
                                        <form class="user" role="form" method="post" id="save_form_club" action="<?= base_url(); ?>DEAN/update_cadet_club">
                                            <div class="form-group row">
                                                <div class="col-sm-3">
                                                    <h6>&nbsp;Name:</h6>
                                                </div>

                                                <div class="col-sm-3">
                                                    <h6>&nbsp;Term:</h6>
                                                </div>

                                                <div class="col-sm-3">
                                                    <h6>&nbsp;Division:</h6>
                                                </div>

                                                <div class="col-sm-3">
                                                    <h6>&nbsp;Club:</h6>
                                                </div>
                                            </div>


                                            <div class="form-group row">

                                                <div class="col-sm-3 mb-1" style="display:none">
                                                    <input type="text" class="" name="oc_num_ec" id="oc_num_ec">
                                                </div>
                                                <div class="col-sm-3 mb-1" style="display:none">
                                                    <input type="text" class="" name="p_id_ec" id="p_id_ec">
                                                </div>

                                                <div class="col-sm-3 mb-1">
                                                    <input type="text" class="form-control form-control-user" name="name" id="name_ec" style="font-weight: bold; font-size:large" placeholder="Name" readonly>
                                                </div>
                                                <div class="col-sm-3 mb-1">
                                                    <input type="text" class="form-control form-control-user" name="term" id="term_ec" style="font-weight: bold; font-size:large" placeholder="Term" readonly>
                                                </div>
                                                <input type="hidden" name="club_id" id="club_id">
                                                <div class="col-sm-3 mb-1">
                                                    <input type="text" class="form-control form-control-user" name="division" id="division_ec" style="font-weight: bold; font-size:large" placeholder="Division" readonly>
                                                </div>
                                                <div class="col-sm-3 mb-1">
                                                    <select class="form-control rounded-pill" name="club" id="club_ec" data-placeholder="Select Club" style="font-size: 0.8rem; height:50px; font-weight: bold; font-size:large">
                                                        <option class="form-control form-control-user" value="">Select Club</option>
                                                        <?php $club_data = $this->db->get('cadet_club')->result_array(); ?>
                                                        <?php foreach ($club_data as $club) { ?>
                                                            <option class="form-control form-control-user" value="<?= $club['name'] ?>"><?= $club['name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="form-group row justify-content-center">
                                                <div class="col-sm-4">
                                                    <button type="button" class="btn btn-primary btn-user btn-block" id="save_btn_club">
                                                        <!-- <i class="fab fa-google fa-fw"></i>   -->
                                                        save
                                                    </button>
                                                    <span id="show_error_save" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please check errors*</span>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>



    <!-- Page Heading -->
    <div class="card-body" style="padding:10px">
        <div class="row my-2">
            <img src='<?= base_url() ?>assets/img/navy_logo-new.png' style="height: 130px; width:100px;">
            <div class="card-body">
                <h1 style="text-align:center"><strong>Cadet's Divisonal Analytics</strong></h1>
            </div>
        </div>
    </div>

    <div class="card-body bg-custom3">
        <!-- Nested Row within Card Body -->

        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header bg-custom1">
                        <h1 class="h4">Search Cadet</h1>
                    </div>

                    <div class="card-body bg-custom3">
                        <form class="user" role="form" method="post" id="add_form" action="">
                            <div class="form-group row">
                                <div class="col-sm-2" style="margin-top:15px">
                                    <h6>&nbsp;OC No:</h6>
                                </div>

                                <div class="col-sm-3 mb-1">
                                    <input type="text" class="form-control form-control-user" name="oc_no" id="oc_no" placeholder="Enter OC No." value="<?= $oc_no_entered ?>">
                                    <span id="error_search" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please enter OC No.</span>
                                </div>

                                <div class="col-sm-2 mb-1">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="search_btn">
                                        Search
                                    </button>
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="show_all_btn">
                                        Show ALL Cadets
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div id="no_data" class="row my-2" style="display:none">
            <div class="col-lg-12 my-5">

                <h4 style="color:red">No Cadet Found. Please check the OC No.</h4>

            </div>
        </div>

        <?php if (count($pn_data) > 0) { ?>
            <div id="cadet_dossier" class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header bg-custom1">
                            <h1 class="h4">Cadet's Records</h1>
                        </div>


                        <div class="card-body">
                            <div id="table_div">

                                <table id="datatable" class="table table-striped" style="color:black; font-size:smaller">
                                    <thead>
                                        <tr>
                                            <th scope="col" style='white-space: nowrap;'>ID</th>
                                            <th scope="col" style='white-space: nowrap;'>Cadet Name</th>
                                            <th scope="col" style='white-space: nowrap;'>OC No.</th>
                                            <th scope="col" style='white-space: nowrap;'>Term</th>
                                            <th scope="col" style="text-align:center">Physical Milestone</th>
                                            <th scope="col" style="text-align:center">Punishments</th>
                                            <th scope="col" style="text-align:center">Excuses</th>
                                            <th scope="col" style="text-align:center">Observations</th>
                                            <th scope="col" style="text-align:center">Clubs</th>
                                            <th scope="col" style="text-align:center">Branches</th>
                                            <th scope="col" style="text-align:center">Warning</th>

                                        </tr>
                                    </thead>
                                    <tbody id="table_rows">
                                        <?php $count = 0;
                                        foreach ($pn_data as $data) { ?>
                                            <tr>

                                                <td scope="row"><?= ++$count; ?></td>
                                                <td scope="row" style='white-space: nowrap;'><?= $data['name']; ?></td>
                                                <td scope="row" style='white-space: nowrap;'><?= $data['oc_no']; ?></td>
                                                <td scope="row" style='white-space: nowrap;'><?= $data['term']; ?></td>
                                                <td scope="row" style="display: none" style='white-space: nowrap;'><?= $data['p_id']; ?></td>

                                                <td scope="row" style="text-align:center"><button type="button" onclick="view_physical_milestone(<?= $data['p_id'] ?>)" class="btn btn-primary btn-user rounded-pill" data-toggle="modal" data-target="#milestone">Physical Milestone</button></td>
                                                <td scope="row" style="text-align:center"><button type="button" onclick="view_punishments(<?= $data['p_id'] ?>)" class="btn btn-primary btn-user rounded-pill" data-toggle="modal" data-target="#punishments">Punishments</button></td>
                                                <td scope="row" style="text-align:center"><button type="button" onclick="view_excuses(<?= $data['p_id'] ?>)" class="btn btn-primary btn-user rounded-pill" data-toggle="modal" data-target="#excuses">Excuses</button></td>
                                                <td scope="row" style="text-align:center"><button type="button" onclick="view_observations(<?= $data['p_id'] ?>)" class="btn btn-primary btn-user rounded-pill" data-toggle="modal" data-target="#observations">Observations</button></td>
                                                <td scope="row" style="text-align:center"><button type="button" onclick="view_club(<?= $data['p_id'] ?>)" class="btn btn-primary btn-user rounded-pill" data-toggle="modal" data-target="#clubs">Clubs</button></td>

                                                <td scope="row" style="text-align:center"><button type="button" onclick="view_branches(<?= $data['p_id'] ?>)" data-toggle="modal" data-target="#branches" class="btn btn-primary btn-user rounded-pill">Branches</button></td>
                                                <td scope="row" style="text-align:center" onclick="view_warning(<?= $data['p_id'] ?>)" data-toggle="modal" data-target="#warning"><button type="button" class="btn btn-primary btn-user rounded-pill">Warning</button></td>
                                                <td scope="row" style="display:none"><?= $data['p_id']; ?></td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <!-- <a> No Data found </a> -->

                            </div>
                        </div>


                    </div>

                </div>
            </div>

        <?php } ?>

    </div>

</div>

</div>

<?php $this->load->view('common/footer'); ?>
<script>
    function view_physical_milestone(id) {
        
        $.ajax({
            url: '<?= base_url(); ?>DEAN/view_milestone_in_dossier',
            method: 'POST',
            data: {
                'id': id
            },
            success: function(data) {
                var result = jQuery.parseJSON(data);
                var len = result.length;

                if (len > 0 ) {
                $("#table_rows_milestone").empty();

                for (var i = 0; i < len; i++) {

                    if (result[i]['PST_result'] == 'qualified') {
                        color_pst = 'green';
                        value_pst = 'Qualified';
                    } else if (result[i]['PST_result'] == 'disqualified') {
                        color_pst = 'red';
                        value_pst = 'Disqualified';
                    }

                    if (result[i]['SST_result'] == 'qualified') {
                        color_sst = 'green';
                        value_sst = 'Qualified';
                    } else if (result[i]['SST_result'] == 'disqualified') {
                        color_sst = 'red';
                        value_sst = 'Disqualified';
                    }

                    if (result[i]['PET_I_result'] == 'qualified') {
                        color_pet1 = 'green';
                        value_pet1 = 'Qualified';
                    } else if (result[i]['PET_I_result'] == 'disqualified') {
                        color_pet1 = 'red';
                        value_pet1 = 'Disqualified';
                    }

                    if (result[i]['PET_II_result'] == 'qualified') {
                        color_pet2 = 'green';
                        value_pet2 = 'Qualified';
                    } else if (result[i]['PET_II_result'] == 'disqualified') {
                        color_pet2 = 'red';
                        value_pet2 = 'Disqualified';
                    }

                    if (result[i]['assault_result'] == 'qualified') {
                        color_assault = 'green';
                        value_assault = 'Qualified';
                    } else if (result[i]['assault_result'] == 'disqualified') {
                        color_assault = 'red';
                        value_assault = 'Disqualified';
                    }

                    if (result[i]['saluting_result'] == 'qualified') {
                        color_saluting = 'green';
                        value_saluting = 'Qualified';
                    } else if (result[i]['saluting_result'] == 'disqualified') {
                        color_saluting = 'red';
                        value_saluting = 'Disqualified';
                    }

                    if (result[i]['PLX_result'] == 'qualified') {
                        color_plx = 'green';
                        value_plx = 'Qualified';
                    } else if (result[i]['PLX_result'] == 'disqualified') {
                        color_plx = 'red';
                        value_plx = 'Disqualified';
                    }

                    if (result[i]['long_cross_result'] == 'qualified') {
                        color_long_cross = 'green';
                        value_long_cross = 'Qualified';
                    } else if (result[i]['long_cross_result'] == 'disqualified') {
                        color_long_cross = 'red';
                        value_long_cross = 'Disqualified';
                    }

                    if (result[i]['mini_cross_result'] == 'qualified') {
                        color_mini_cross = 'green';
                        value_mini_cross = 'Qualified';
                    } else if (result[i]['mini_cross_result'] == 'disqualified') {
                        color_mini_cross = 'red';
                        value_mini_cross = 'Disqualified';
                    }

                    $("#milestone_details").empty();

                    $("#milestone_details").html(`<form class="user" role="form" method="post" id="add_form" action="">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <h4 id="cadet_name_heading"></h4>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h5><strong>Test Name</strong></h5>
                                            </div>
                                            <div class="col-sm-2">
                                                <h5>&nbsp;<strong>Result</strong></h5>
                                            </div>
                                            <div class="col-sm-2">
                                                <h5  style="text-align:center">&nbsp;<strong>Attempt</strong></h5>
                                            </div>
                                            <div class="col-sm-2">
                                                <h5>&nbsp;<strong>Show Details</strong></h5>
                                            </div>
                                             <div class="col-sm-2">
                                                <a type="button" href="<?= base_url(); ?>DEAN/add_physical_milestone/<?php echo "dossier" ?>" class="btn btn-primary rounded-pill">Edit Record</a>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>PST:</strong></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="pst_result" style="color:${color_pst}">${value_pst}</h6>
                                            </div>
                                            <div class="col-sm-2" style="text-align:center">
                                                <h6 id="pst_attempt">${result[i]['PST_attempt']}</h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>SST:</strong></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="sst_result" style="color:${color_sst}">${value_sst}</h6>
                                            </div>
                                            <div class="col-sm-2" style="text-align:center">
                                                <h6 id="sst_attempt">${result[i]['SST_attempt']}</h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>PET-I:</strong></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="pet1_result" style="color:${color_pet1}">${value_pet1}</h6>
                                            </div>
                                            <div class="col-sm-2" style="text-align:center">
                                                <h6 id="pet1_attempt">${result[i]['PET_I_attempt']}</h6>
                                            </div>
                                            <div class="col-sm-2" style="text-align:center">
                                            <i style="font-size:18px" type="button" class="fas fa-clipboard-list" data-toggle="modal" data-target="#PET_I"></i>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>PET-II:</strong></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="pet2_result" style="color:${color_pet2}">${value_pet2}</h6>
                                            </div>
                                            <div class="col-sm-2" style="text-align:center">
                                                <h6 id="pet2_attempt">${result[i]['PET_II_attempt']}</h6>
                                            </div>
                                            <div class="col-sm-2" style="text-align:center">
                                            <i style="font-size:18px" type="button" class="fas fa-clipboard-list" data-toggle="modal" data-target="#PET_II"></i>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>Assault:</strong></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="assault_result" style="color:${color_assault}">${value_assault}</h6>
                                            </div>
                                            <div class="col-sm-2" style="text-align:center">
                                                <h6 id="assault_attempt">${result[i]['assault_attempt']}</h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>Saluting:</strong></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="saluting_result" style="color:${color_saluting}">${value_saluting}</h6>
                                            </div>
                                            <div class="col-sm-2" style="text-align:center">
                                                <h6 id="saluting_attempt">${result[i]['saluting_attempt']}</h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>PLX:</strong></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="plx_result" style="color:${color_plx}">${value_plx}</h6>
                                            </div>
                                            <div class="col-sm-2" style="text-align:center">
                                                <h6 id="plx_attempt">${result[i]['PLX_attempt']}</h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>Long Cross Country:</strong></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="plx_result" style="color:${color_long_cross}">${value_long_cross}</h6>
                                            </div>
                                            <div class="col-sm-2" style="text-align:center">
                                                <h6 id="plx_attempt">${result[i]['long_cross_card_number']}</h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>Mini Cross Country:</strong></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="plx_result" style="color:${color_mini_cross}">${value_mini_cross}</h6>
                                            </div>
                                            <div class="col-sm-2" style="text-align:center">
                                                <h6 id="plx_attempt">${result[i]['mini_cross_card_number']}</h6>
                                            </div>
                                        </div>

                                    </form>`);
                }
            } else {
                $("#milestone_details").html(`<strong>NO RESULT FOUND</strong>`);
            }
            },

            async: true
        });
    }

    function view_punishments(id) {
        // alert('cadet id: ' + id);
        $.ajax({
            url: '<?= base_url(); ?>DEAN/view_punishments_in_dossier',
            method: 'POST',
            data: {
                'id': id
            },
            success: function(data) {
                var result = jQuery.parseJSON(data);
                var len = result.length;

                $("#table_rows_punishment").empty();
                if (len > 0) {
                    for (var i = 0; i < len; i++) {
                        var date1 = new Date(result[i]['start_date']);
                        var date2 = new Date(result[i]['end_date']);
                        var diff = (Math.abs(date1 - date2)) / (1000 * 60 * 60 * 24);

                        var today_date = new Date();
                        var status = '';
                        if ((today_date >= date1) && (today_date <= date2)) {
                            status = 'Active';
                        } else {
                            status = 'Ended'
                        }
                        $("#table_rows_punishment").append(`<tr>
                                                        <td>${i+1}</td>
                                                        <td>${result[i]['term']}</td>
                                                        <td>${result[i]['date']}</td>
                                                        <td>${result[i]['offence']}</td>
                                                        <td>${result[i]['punishment_awarded']}</td>
                                                        <td>${result[i]['start_date']}</td>
                                                        <td>${result[i]['end_date']}</td>
                                                        <td>${diff}</td>
                                                        <td>${status}</td>
                                                        <td data-toggle="modal" data-target="#edit_punishment"><a onclick="edit_punishment(${result[i]['id']})" ><i class="fa fa-edit"></i></a></td>
                                                    </tr>`);
                    }
                } else {
                    $("#table_rows_punishment").append(`<tr>
                                                    <td>No Data Found</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                      <td></td>
                                                    </tr>`);
                }
            },
            async: true
        });
    }

    function view_excuses(id) {
        // alert('cadet id: ' + id);
        $.ajax({
            url: '<?= base_url(); ?>DEAN/view_excuses_in_dossier',
            method: 'POST',
            data: {
                'id': id
            },
            success: function(data) {
                var result = jQuery.parseJSON(data);
                var len = result.length;

                $("#table_rows_excuses").empty();
                if (len > 0) {
                    for (var i = 0; i < len; i++) {
                        // $diff = date_diff(result[i]['start_date'], result[i]['end_date']);
                        const date1 = new Date(result[i]['start_date']);
                        const date2 = new Date(result[i]['end_date']);
                        var diff = (Math.abs(date1 - date2)) / (1000 * 60 * 60 * 24);

                        var today_date = new Date();
                        var status = '';
                        if ((today_date >= date1) && (today_date <= date2)) {
                            status = 'Active';
                        } else {
                            status = 'Ended'
                        }
                        $("#table_rows_excuses").append(`<tr>
                                                        <td>${i+1}</td>
                                                        <td>${result[i]['term']}</td>
                                                        <td>${result[i]['date']}</td>
                                                        <td>${result[i]['disease']}</td>
                                                        <td>${result[i]['mo_remarks']}</td>
                                                        <td>${result[i]['start_date']}</td>
                                                        <td>${result[i]['end_date']}</td>
                                                        <td>${diff}</td>
                                                        <td>${status}</td>
                                                    </tr>`);
                    }
                } else {
                    $("#table_rows_excuses").append(`<tr>
                                                    <td>No Data Found</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    </tr>`);
                }
            },
            async: true
        });
    }

    function view_observations(id) {
        // alert('cadet id: ' + id);
        $.ajax({
            url: '<?= base_url(); ?>DEAN/view_observation_in_dossier',
            method: 'POST',
            data: {
                'id': id
            },
            success: function(data) {
                var result = jQuery.parseJSON(data);
                var len = result.length;

                $("#table_rows_observations").empty();
                if (len > 0) {
                    for (var i = 0; i < len; i++) {

                        var today_date = new Date();
                        var status = '';
                        $("#table_rows_observations").append(`<tr>
                                                        <td>${i+1}</td>
                                                        <td>${result[i]['term']}</td>
                                                        <td>${result[i]['date']}</td>
                                                        <td>${result[i]['observation']}</td>
                                                        <td>${result[i]['created_at']}</td>
                                                        <td>${status}</td>
                                                         <td data-toggle="modal" data-target="#edit_observation"><a onclick="edit_observation(${result[i]['p_id']})" ><i class="fa fa-edit"></i></a></td>
                                                    </tr>`);
                    }
                } else {
                    $("#table_rows_observations").append(`<tr>
                                                    <td>No Data Found</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    </tr>`);
                }
            },
            async: true
        });
    }

    function view_club(id) {
        // alert('cadet id: ' + id);
        $.ajax({
            url: '<?= base_url(); ?>DEAN/view_club_in_dossier',
            method: 'POST',
            data: {
                'id': id
            },
            success: function(data) {
                var result = jQuery.parseJSON(data);
                var len = result.length;

                $("#table_rows_club").empty();
                if (len > 0) {
                    for (var i = 0; i < len; i++) {
                        $("#table_rows_club").append(`<tr>
                                                        <td>${i+1}</td>
                                                        <td>${result[i]['term']}</td>
                                                        <td>${result[i]['assigned_club']}</td>
                                                        <td>${result[i]['created_at']}</td>
                                                        <td data-toggle="modal" data-target="#edit_clubs"><a onclick="edit_club(${result[i]['p_id']})" ><i class="fa fa-edit"></i></a></td>
                                                        <td ><a onclick="delete_club(${result[i]['p_id']})" ><i class="fa fa-trash"></i></a></td>
                                                    </tr>`);
                    }
                } else {
                    $("#table_rows_club").append(`<tr>
                                                    <td>No Data Found</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    </tr>`);
                }
            },
            async: true
        });
    }

    function view_branches(id) {
        // alert('cadet id: ' + id);
        $.ajax({
            url: '<?= base_url(); ?>DEAN/view_branches_in_dossier',
            method: 'POST',
            data: {
                'id': id
            },
            success: function(data) {
                var result = jQuery.parseJSON(data);
                var len = result.length;
                // if(result != null){
                //    alert('not null');
                // }

                $("#table_rows_branches").empty();
                if (len > 0) {
                    for (var i = 0; i < len; i++) {
                        $("#table_rows_branches").append(`<tr>
                                                        <td>${i+1}</td>
                                                        <td>${result[i]['option1']}</td>
                                                        <td>${result[i]['option2']}</td>
                                                        <td>${result[i]['option3']}</td>
                                                        <td>${result[i]['branch_recommended']}</td>
                                                        <td>${result[i]['branch_allocated']}</td>
                                                        <td data-toggle="modal" data-target="#edit_branches"><a onclick="edit_branches(${result[i]['p_id']})" ><i class="fa fa-edit"></i></a></td>
                                                    </tr>`);

                    }
                } else {
                    $("#table_rows_branches").append(`<tr>
                                                    <td>No Data Found</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                   
                                                    </tr>`);
                }
            },
            async: true
        });
    }

    function edit_branches(id) {
        // alert('cadet id: ' + id);
        $.ajax({
            url: '<?= base_url(); ?>DEAN/edit_branches_data',
            method: 'POST',
            data: {
                'id': id
            },
            success: function(data) {
                var result = jQuery.parseJSON(data);
                var len = result.length;
                //alert(result['assigned_club']);
                $('#oc_num_b').val(result['oc_no']);
                $('#id_b').val(result['p_id']);
                $('#name_b').val(result['name']);
                $('#term_b').val(result['term']);
                $('#division_b').val(result['divison_name']);
                $('#prefer_1').val(result['option1']);
                $('#prefer_2').val(result['option2']);
                $('#prefer_3').val(result['option3']);
                $('#allocated_branch').val(result['branch_allocated']);
                $('#recommended_branch').val(result['branch_recommended']);

                $('#club_id').val(result['id']);

            },
            async: true
        });
    }


    function view_warning(id) {
        // alert('cadet id: ' + id);
        $.ajax({
            url: '<?= base_url(); ?>DEAN/view_warning_in_dossier',
            method: 'POST',
            data: {
                'id': id
            },
            success: function(data) {
                var result = jQuery.parseJSON(data);
                var len = result.length;

                $("#table_rows_warning").empty();
                if (len > 0) {
                    for (var i = 0; i < len; i++) {
                        $("#table_rows_warning").append(`<tr>
                                                        <td>${i+1}</td>
                                                        <td>${result[i]['term']}</td>
                                                        <td>${result[i]['issued_by']}</td>
                                                        <td>${result[i]['reasons']}</td>
                                                        <td>${result[i]['type']}</td>
                                                        <td>${result[i]['date']}</td>
                                                        <td data-toggle="modal" data-target="#edit_warning"><a onclick="edit_warning(${result[i]['p_id']})" ><i class="fa fa-edit"></i></a></td>
                                                    </tr>`);
                    }
                } else {
                    $("#table_rows_warning").append(`<tr>
                                                    <td>No Data Found</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    </tr>`);
                }
            },
            async: true
        });
    }

    function edit_warning(id) {
        // alert('cadet id: ' + id);
        $.ajax({
            url: '<?= base_url(); ?>DEAN/edit_warning_data',
            method: 'POST',
            data: {
                'id': id
            },
            success: function(data) {
                var result = jQuery.parseJSON(data);
                var len = result.length;
                // alert('xczxcx');
                //alert(result['name']);
                $('#oc_num_ew').val(result['oc_no']);
                $('#id_ew').val(result['p_id']);
                $('#name').val(result['name']);
                $('#division').val(result['divison_name']);
                $('#warning_type').val(result['type']);
                $('#term').val(result['term']);
                $('#date').val(result['date']);
                $('#issued_by').val(result['issued_by']);
                $('#reason').val(result['reasons']);
                $('#file_name').html(result['file']);
                $('#old_file').val(result['file']);
            },
            async: true
        });
    }

    function edit_punishment(id) {
        // alert('cadet id: ' + id);
        $.ajax({
            url: '<?= base_url(); ?>DEAN/edit_punishment_data',
            method: 'POST',
            data: {
                'id': id
            },
            success: function(data) {
                var result = jQuery.parseJSON(data);
                var len = result.length;

                //alert(result['name']);
                $('#oc_num_ep').val(result['oc_no']);
                $('#id_ep').val(result['p_id']);
                $('#name').val(result['name']);
                $('#term').val(result['term']);
                $('#division').val(result['divison_name']);
                $('#punish').val(result['punishment_awarded']);
                $('#offense').val(result['offence']);
                $('#start_date').val(result['start_date']);
                $('#end_date').val(result['start_date']);
                $('#days').val(result['days']);
                $('#punish_id').val(result['id']);
                $('#page').val('dossier');

            },
            async: true
        });
    }

    function edit_observation(id) {
        // alert('cadet id: ' + id);
        $.ajax({
            url: '<?= base_url(); ?>DEAN/edit_observation_data',
            method: 'POST',
            data: {
                'id': id
            },
            success: function(data) {
                var result = jQuery.parseJSON(data);
                var len = result.length;
                //alert(result['name']);
                $('#oc_num_eo').val(result['oc_no']);
                $('#id_eo').val(result['p_id']);
                $('#name_eo').val(result['name']);
                $('#term_eo').val(result['term']);
                $('#division_eo').val(result['divison_name']);
                $('#observation_eo').val(result['observation']);

                $('#observation_id').val(result['id']);
                $('#page1').val('dossier');

            },
            async: true
        });
    }



    function edit_club(id) {
        // alert('cadet id: ' + id);
        $.ajax({
            url: '<?= base_url(); ?>DEAN/edit_club_data',
            method: 'POST',
            data: {
                'id': id
            },
            success: function(data) {
                var result = jQuery.parseJSON(data);
                var len = result.length;
                //alert(result['assigned_club']);
                $('#oc_num_ec').val(result['oc_no']);
                $('#p_id_ec').val(result['p_id']);
                $('#name_ec').val(result['name']);
                $('#term_ec').val(result['term']);
                $('#division_ec').val(result['divison_name']);
                $('#club_ec').val(result['assigned_club']);
                $('#observation_ec').val(result['observation']);

                $('#club_id').val(result['id']);

            },
            async: true
        });
    }

    function delete_club(id) {
        // alert('cadet id: ' + id);
        $.ajax({
            url: '<?= base_url(); ?>DEAN/delete_club_data',
            method: 'POST',
            data: {
                'id': id
            },
            success: function(data) {
                var result = jQuery.parseJSON(data);
                var len = result.length;


                $("#table_rows_club").empty();
                if (len > 0) {
                    for (var i = 0; i < len; i++) {
                        $("#table_rows_club").append(`<tr>
                                                        <td>${i+1}</td>
                                                        <td>${result[i]['term']}</td>
                                                        <td>${result[i]['assigned_club']}</td>
                                                        <td>${result[i]['created_at']}</td>
                                                         <td data-toggle="modal" data-target="#edit_clubs"><a onclick="edit_club(${result[i]['p_id']})" ><i class="fa fa-edit"></i></a></td>
                                                          <td ><a onclick="delete_club(${result[i]['p_id']})" ><i class="fa fa-trash"></i></a></td>
                                                    </tr>`);
                    }
                } else {
                    $("#table_rows_club").append(`<tr>
                                                    <td>No Data Found</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    </tr>`);
                }
            },
            async: true
        });
    }

    function seen(data) {
        $.ajax({
            url: '<?= base_url(); ?>ChatController/seen',
            method: 'POST',
            data: {
                'id': data
            },
            success: function(data) {
                $('#notification').html(data);
            },
            async: true
        });
    }

    $('#notifications').focusout(function() {
        $.ajax({
            url: '<?= base_url(); ?>ChatController/activity_seen',
            success: function(data) {
                $('#notifications').html(data);
            },
            async: true
        });
    });

    $('#save_btn').on('click', function() {
        $('#save_btn').attr('disabled', true);
        var validate = 0;
        var issued_by = $('#issued_by').val();
        var warning_type = $('#warning_type').val();
        var reason = $('#reason').val();
        var date = $('#date').val();

        if (issued_by == '') {
            validate = 1;
            $('#issued_by').addClass('red-border');
        }
        if (warning_type == '') {
            validate = 1;
            $('#warning_type').addClass('red-border');
        }
        if (reason == '') {
            validate = 1;
            $('#reason').addClass('red-border');
        }
        if (date == '') {
            validate = 1;
            $('#date').addClass('red-border');
        }

        if (validate == 0) {
            $('#save_form')[0].submit();
            $('#show_error_save').hide();

        } else {
            $('#save_btn').removeAttr('disabled');
            $('#show_error_save').show();
        }
    });

    $('#add_btn').on('click', function() {
        //alert('javascript working');
        // $('#add_btn').attr('disabled', true);
        var validate = 0;

        var oc_no = $('#oc_no').val();


        if (oc_no == '') {
            validate = 1;
            $('#oc_no').addClass('red-border');
        }

        if (validate == 0) {
            // $('#add_form')[0].submit();
            $('#show_error_new').hide();

            $.ajax({
                url: '<?= base_url(); ?>DEAN/search_cadet',
                method: 'POST',
                data: {
                    'oc_no': oc_no
                },
                success: function(data) {
                    var result = jQuery.parseJSON(data);

                    if (result != undefined) {
                        $('#cadet_dossier').show();
                        $('#no_data').hide();

                        $('#name').val(result['name']);
                        $('#term').val(result['term']);
                        $('#division').val(result['divison_name']);
                        $('#oc_num').val(result['oc_no']);
                        $('#id').val(result['p_id']);
                    } else {
                        $('#no_data').show();
                        $('#search_cadet').hide();
                    }
                },
                async: true
            });

        } else {
            $('#add_btn').removeAttr('disabled');
            $('#show_error_new').show();
        }
    });

    $('#table_rows').find('tr').click(function(e) {
        //alert('dvdfvdfv');
        var $columns = $(this).find('td');

        $('#cadet_name_heading').html('<strong> Cadet Name: ' + $columns[1].innerHTML + '</strong>');
        $('#cadet_oc_no').html('<strong> OC No: ' + $columns[2].innerHTML + '</strong>');
        $('#cadet_term').html('<strong> Term: ' + $columns[3].innerHTML + '</strong>');

        $('#cadet_name_heading_ex').html('<strong> Cadet Name: ' + $columns[1].innerHTML + '</strong>');
        $('#cadet_oc_no_ex').html('<strong> OC No: ' + $columns[2].innerHTML + '</strong>');
        $('#cadet_term_ex').html('<strong> Term: ' + $columns[3].innerHTML + '</strong>');

        $('#cadet_name_heading_ob').html('<strong> Cadet Name: ' + $columns[1].innerHTML + '</strong>');
        $('#cadet_oc_no_ob').html('<strong> OC No: ' + $columns[2].innerHTML + '</strong>');
        $('#cadet_term_ob').html('<strong> Term: ' + $columns[3].innerHTML + '</strong>');

        $('#cadet_name_heading_ms').html('<strong> Cadet Name: ' + $columns[1].innerHTML + '</strong>');
        $('#cadet_oc_no_ms').html('<strong> OC No: ' + $columns[2].innerHTML + '</strong>');
        $('#cadet_term_ms').html('<strong> Term: ' + $columns[3].innerHTML + '</strong>');

        $('#cadet_name_heading_club').html('<strong> Cadet Name: ' + $columns[1].innerHTML + '</strong>');
        $('#cadet_oc_no_club').html('<strong> OC No: ' + $columns[2].innerHTML + '</strong>');
        $('#cadet_term_club').html('<strong> Term: ' + $columns[3].innerHTML + '</strong>');

        $('#cadet_name_heading_w').html('<strong> Cadet Name: ' + $columns[1].innerHTML + '</strong>');
        $('#cadet_oc_no_w').html('<strong> OC No: ' + $columns[2].innerHTML + '</strong>');
        $('#cadet_term_w').html('<strong> Term: ' + $columns[3].innerHTML + '</strong>');

        $('#cadet_name_heading_b').html('<strong> Cadet Name: ' + $columns[1].innerHTML + '</strong>');
        $('#cadet_oc_no_b').html('<strong> OC No: ' + $columns[2].innerHTML + '</strong>');
        $('#cadet_term_b').html('<strong> Term: ' + $columns[3].innerHTML + '</strong>');

        $('#punish').val($columns[5].innerHTML);
        $('#start_date').val($columns[6].innerHTML);
        $('#end_date').val($columns[7].innerHTML);
        $('#days').val((Date.parse($columns[7].innerHTML) - Date.parse($columns[6].innerHTML)) / 1000 / 60 / 60 / 24);

        //var id = $('#p_id').val();
        //alert($columns[4].innerHTML);
        $.ajax({
            url: '<?= base_url(); ?>DEAN/view_PET_I',
            method: 'POST',
            data: {
                'id': $columns[4].innerHTML
            },
            success: function(data) {
                var result = jQuery.parseJSON(data);
                var len = result.length;

                $('#mile_time1_detail').html(result['mile_time']);
                $('#pushup1_detail').html(result['pushups']);
                $('#chinups1_detail').html(result['chinups']);
                $('#rope1_detail').html(result['rope']);
            },
            async: false
        });

        $.ajax({
            url: '<?= base_url(); ?>DEAN/view_PET_II',
            method: 'POST',
            data: {
                'id': $columns[4].innerHTML
            },
            success: function(data) {
                var result = jQuery.parseJSON(data);
                var len = result.length;
                $('#mile_time2_detail').html(result['mile_time']);
                $('#pushup2_detail').html(result['pushups']);
                $('#chinups2_detail').html(result['chinups']);
                $('#rope2_detail').html(result['rope']);
            },
            async: false
        });

    });

    $('#search_btn').on('click', function() {
        var validate = 0;
        var oc_no = $('#oc_no').val();

        if (oc_no == '') {
            validate = 1;
            $('#oc_no').addClass('red-border');
        }

        if (validate == 0) {
            $('#error_search').hide();

            $.ajax({
                url: '<?= base_url(); ?>DEAN/search_cadet_for_dossier',
                method: 'POST',
                data: {
                    'oc_no': oc_no
                },
                success: function(data) {
                    if (data != '0') {
                        var newDoc = document.open("text/html", "replace");
                        newDoc.write(data);
                        newDoc.close();
                    } else {
                        $('#no_data').show();
                        $('#cadet_dossier').hide();
                    }
                },
                async: true
            });

        } else {
            $('#error_search').show();
        }

    });

    $('#show_all_btn').on('click', function() {
        var validate = 0;

        if (validate == 0) {
            $('#error_search').hide();
            $.ajax({
                url: '<?= base_url(); ?>DEAN/search_all_cadets_for_dossier',
                method: 'POST',
                success: function(data) {
                    if (data != '0') {
                        var newDoc = document.open("text/html", "replace");
                        newDoc.write(data);
                        newDoc.close();
                    } else {
                        $('#no_data').show();
                        $('#cadet_dossier').hide();
                    }
                },
                async: true
            });
        } else {
            $('#error_search').show();
        }

    });

    $('#save_btn_punishment').on('click', function() {
        $('#save_btn').attr('disabled', true);
        var validate = 0;
        var punish = $('#punish').val();
        var offense = $('#offense').val();
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();

        if (punish == '') {
            validate = 1;
            $('#punish').addClass('red-border');
        }
        if (offense == '') {
            validate = 1;
            $('#offense').addClass('red-border');
        }
        if (start_date == '') {
            validate = 1;
            $('#start_date').addClass('red-border');
        }
        if (end_date == '') {
            validate = 1;
            $('#end_date').addClass('red-border');
        }

        if (validate == 0) {
            $('#save_form')[0].submit();
            $('#show_error_save').hide();

        } else {
            $('#save_btn').removeAttr('disabled');
            $('#show_error_save').show();
        }
    });

    $('#save_btn').on('click', function() {
        $('#save_btn').attr('disabled', true);
        var validate = 0;
        var punish = $('#punish').val();
        var offense = $('#offense').val();
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();

        if (punish == '') {
            validate = 1;
            $('#punish').addClass('red-border');
        }
        if (offense == '') {
            validate = 1;
            $('#offense').addClass('red-border');
        }
        if (start_date == '') {
            validate = 1;
            $('#start_date').addClass('red-border');
        }
        if (end_date == '') {
            validate = 1;
            $('#end_date').addClass('red-border');
        }

        if (validate == 0) {
            $('#save_form')[0].submit();
            $('#show_error_save').hide();

        } else {
            $('#save_btn').removeAttr('disabled');
            $('#show_error_save').show();
        }
    });

    $('#end_date').on('focusout', function() {
        var start_date = new Date($('#start_date').val());
        var end_date = new Date($('#end_date').val());
        var validate = 0;

        if (end_date < start_date) {
            $('#error_end_date').show();
            $('#end_date').addClass('red-border');
            $('#end_date').focus();
            $('#add_btn').attr('disabled', true);
        } else {
            $('#error_end_date').hide();
            $('#add_btn').removeAttr('disabled');
            $('#end_date').removeClass('red-border');

        }

        $('#days').val(Math.abs(end_date - start_date) / 1000 / 60 / 60 / 24);
    });

    $('#save_btn_observation').on('click', function() {
        $('#save_btn').attr('disabled', true);
        var validate = 0;
        var observation = $('#observation').val();


        if (observation == '') {
            validate = 1;
            $('#observation').addClass('red-border');
        }

        if (validate == 0) {
            $('#save_form_observation')[0].submit();
            $('#show_error_save').hide();

        } else {
            $('#save_btn_observation').removeAttr('disabled');
            $('#show_error_save').show();
        }
    });

    $('#save_btn_club').on('click', function() {
        // $('#save_btn').attr('disabled', true);
        var validate = 0;
        var club = $('#club').val();

        if (club == '') {
            validate = 1;
            $('#club').addClass('red-border');
        }

        if (validate == 0) {
            $('#save_form_club')[0].submit();
            $('#show_error_save').hide();

        } else {
            $('#save_btn_club').removeAttr('disabled');
            $('#show_error_save').show();
        }
    });

    $('#save_btn_branches').on('click', function() {
        $('#save_btn_branches').attr('disabled', true);
        var validate = 0;
        var allocated_branch = $('#allocated_branch').val();
        var recommended_branch = $('#recommended_branch').val();
        var allocated_branch = $('#allocated_branch').val();


        if (prefer_1 == '') {
            validate = 1;
            $('#prefer_1').addClass('red-border');
        }
        if (allocated_branch == '') {
            validate = 1;
            $('#allocated_branch').addClass('red-border');
        }
        if (recommended_branch == '') {
            validate = 1;
            $('#recommended_branch').addClass('red-border');
        }


        if (validate == 0) {
            $('#save_form_branches')[0].submit();
            $('#show_error_save').hide();

        } else {
            $('#save_btn_branches').removeAttr('disabled');
            $('#show_error_save').show();
        }
    });
</script>