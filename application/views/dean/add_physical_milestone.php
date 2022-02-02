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
<style>
    .red-border {
        border: 1px solid red !important;
    }

    .modal {
        display: none;
        position: fixed;
        padding-top: 100px;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        overflow: auto;
        z-index: 9999;
    }
</style>
<!-- Term I Modal -->

<div class="container-fluid my-2">
    <div class="modal fade" id="term-I">
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
                                    <h1 class="h4">Term-I Details</h1>
                                </div>

                                <div class="card-body bg-custom3">
                                    <form class="user" role="form" method="post" id="add_form" action="<?= base_url(); ?>DEAN/add_termI_details">
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h3 id="">Mile Time</h3>
                                            </div>
                                            <div class="col-sm-3">
                                                <h3 id="">Chinups</h3>
                                            </div>
                                            <div class="col-sm-3">
                                                <h3 id="">Pushups</h3>
                                            </div>
                                            <div class="col-sm-3">
                                                <h3 id="">Rope</h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">

                                            <div class="col-sm-4 mb-1" style="display:none">
                                                <input type="text" class="" name="oc_num1" id="oc_num1">
                                            </div>
                                            <div class="col-sm-4 mb-1" style="display:none">
                                                <input type="text" class="" name="id1" id="id1">
                                            </div>
                                            <div class="col-sm-4 mb-1" style="display:none">
                                                <input type="text" class="" name="term_pet1" id="term_pet1">
                                            </div>

                                            <div class="col-sm-3 mb-1">
                                                <input type="text" class="form-control form-control-user" name="mile_time_I" id="mile_time_I" style="" placeholder="mile time">
                                            </div>
                                            <div class="col-sm-3 mb-1">
                                                <input type="text" class="form-control form-control-user" name="Chinups_I" id="Chinups_I" placeholder="Chinups">
                                            </div>
                                            <div class="col-sm-3 mb-1">
                                                <input type="text" class="form-control form-control-user" name="Pushups_I" id="Pushups_I" placeholder="Pushups">
                                            </div>
                                            <div class="col-sm-3 mb-1">
                                                <select class="form-control rounded-pill" name="Rope_I" id="Rope_I" data-placeholder="Select Grade" style="font-size: 0.8rem; height:50px;">
                                                    <option class="form-control form-control-user" value="">Select Grade</option>
                                                    <option class="form-control form-control-user" value="Alpha">Alpha</option>
                                                    <option class="form-control form-control-user" value="Bravo">Bravo</option>
                                                    <option class="form-control form-control-user" value="Charlie">Charlie</option>
                                                </select>
                                            </div>


                                        </div>
                                        <div class="form-group row">
                                            <button type="button" class="btn btn-primary btn-user rounded-pill col-md-5" id="add_btn_termI" style="margin-left: 300px;">Save</button>
                                        </div>
                                        <div class="card-body">

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

    <!-- Term II Modal -->

    <div class="modal fade" id="term-II">
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
                                    <h1 class="h4">Term-II Details</h1>
                                </div>

                                <div class="card-body bg-custom3">
                                    <form class="user" role="form" method="post" id="add_form2" action="<?= base_url(); ?>DEAN/add_termII_details">

                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h3 id="">Mile Time</h3>
                                            </div>
                                            <div class="col-sm-3">
                                                <h3 id="">Chinups</h3>
                                            </div>
                                            <div class="col-sm-3">
                                                <h3 id="">Pushups</h3>
                                            </div>
                                            <div class="col-sm-3">
                                                <h3 id="">Rope</h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">

                                            <div class="col-sm-4 mb-1" style="display:none">
                                                <input type="text" class="" name="oc_num2" id="oc_num2">
                                            </div>
                                            <div class="col-sm-4 mb-1" style="display:none">
                                                <input type="text" class="" name="id2" id="id2">
                                            </div>
                                            <div class="col-sm-4 mb-1" style="display:none">
                                                <input type="text" class="" name="term_pet2" id="term_pet2">
                                            </div>

                                            <div class="col-sm-3 mb-1">
                                                <input type="text" class="form-control form-control-user" name="mile_time_II" id="mile_time_II" placeholder="mile time">
                                            </div>
                                            <div class="col-sm-3 mb-1">
                                                <input type="text" class="form-control form-control-user" name="Chinups_II" id="Chinups_II" placeholder="Chinups">
                                            </div>
                                            <div class="col-sm-3 mb-1">
                                                <input type="text" class="form-control form-control-user" name="Pushups_II" id="Pushups_II" placeholder="Pushups">
                                            </div>
                                            <div class="col-sm-3 mb-1">
                                                <select class="form-control rounded-pill" name="Rope_II" id="Rope_II" data-placeholder="Select Grade" style="font-size: 0.8rem; height:50px;">
                                                    <option class="form-control form-control-user" value="">Select Grade</option>
                                                    <option class="form-control form-control-user" value="Alpha">Alpha</option>
                                                    <option class="form-control form-control-user" value="Bravo">Bravo</option>
                                                    <option class="form-control form-control-user" value="Charlie">Charlie</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <button type="button" class="btn btn-primary btn-user rounded-pill col-md-5" id="add_btn_termII" style="margin-left: 300px;">Save</button>
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
    <div class="form-group row justify-content-center">
        <div class="col-lg-1">
            <img src='<?= base_url() ?>assets/img/navy_logo-new.png' style="height: 130px; width:100px;">
        </div>
        <div class="col-lg-11">
            <h1 style="text-align:center; padding:40px"><strong>ADD PHYSICAL MILESTONE</strong></h1>
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
                                <div class="col-sm-4">
                                    <h6>&nbsp;Enter OC No:</h6>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4 mb-1">
                                    <input type="text" class="form-control form-control-user" name="oc_no" id="oc_no" placeholder="OC No.">
                                </div>

                                <div class="col-sm-2 mb-1">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="add_btn">
                                        <!-- <i class="fab fa-google fa-fw"></i>   -->
                                        Search
                                    </button>
                                    <span id="show_error_new" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please check errors*</span>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div id="search_cadet" class="row my-2" style="display:none">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header bg-custom1">
                        <h1 class="h4">Cadet's Information</h1>
                    </div>

                    <div class="card-body bg-custom3">
                        <form class="user" role="form" method="post" id="save_form" action="<?= base_url(); ?>DEAN/save_physical_milestone">
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
                                    <input type="text" class="" name="oc_num" id="oc_num">
                                </div>
                                <div class="col-sm-4 mb-1" style="display:none">
                                    <input type="text" class="" name="id" id="id">
                                </div>
                                <?php if (isset($page)) {
                                    //echo "sdfsdfds";
                                ?>
                                    <input type="hidden" name="pagee" id="pagee" value="<?= $page; ?>">
                                <?php } ?>
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


                            <div class="card-header bg-custom1">
                                <h1 class="h5">Enter Physical Milestone Information</h1>
                            </div>

                            <div class="form-group row my-3">
                                <div class="col-sm-3">
                                    <h5>&nbsp;<strong>Test Name</strong></h5>
                                </div>

                                <div class="col-sm-2">
                                    <h5 style="text-align:center">&nbsp;<strong>Result</strong></h5>
                                </div>

                                <div class="col-sm-2">
                                    <h5 style="text-align:center">&nbsp;<strong>Attempt</strong></h5>
                                </div>

                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col-sm-3 my-2">
                                    <h5>&nbsp;<strong>1 - PST</strong></h5>
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <select class="form-control rounded-pill" name="pst" id="pst" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Result</option>
                                        <option class="form-control form-control-user" value="qualified">Qualified</option>
                                        <option class="form-control form-control-user" value="disqualified">Disqualified</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <input type="number" class="form-control rounded-pill" name="pst_attempt" id="pst_attempt" placeholder="Attempt No" style="font-size: 0.8rem; height:50px;" >
                                  <!--   <select class="form-control rounded-pill" name="pst_attempt" id="pst_attempt" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Attempt</option>
                                        <option class="form-control form-control-user" value="1">1st</option>
                                        <option class="form-control form-control-user" value="2">2nd</option>
                                        <option class="form-control form-control-user" value="3">3rd</option>
                                        <option class="form-control form-control-user" value="4">4th</option>
                                        <option class="form-control form-control-user" value="5">5th</option>
                                    </select> -->
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 my-2">
                                    <h5>&nbsp;<strong>2 - SST</strong></h5>
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <select class="form-control rounded-pill" name="sst" id="sst" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Result</option>
                                        <option class="form-control form-control-user" value="qualified">Qualified</option>
                                        <option class="form-control form-control-user" value="disqualified">Disqualified</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 mb-1">
                                     <input type="number" class="form-control rounded-pill" name="sst_attempt" id="sst_attempt" placeholder="Attempt No" style="font-size: 0.8rem; height:50px;" >
                                   <!--  <select class="form-control rounded-pill" name="sst_attempt" id="sst_attempt" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Attempt</option>
                                        <option class="form-control form-control-user" value="1">1st</option>
                                        <option class="form-control form-control-user" value="2">2nd</option>
                                        <option class="form-control form-control-user" value="3">3rd</option>
                                        <option class="form-control form-control-user" value="4">4th</option>
                                        <option class="form-control form-control-user" value="5">5th</option>
                                    </select> -->
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 my-2">
                                    <h5>&nbsp;<strong>3 - PET-I</strong></h5>
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <select class="form-control rounded-pill" name="pet_I" id="pet_I" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Result</option>
                                        <option class="form-control form-control-user" value="qualified">Qualified</option>
                                        <option class="form-control form-control-user" value="disqualified">Disqualified</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 mb-1">
                                     <input type="number" class="form-control rounded-pill" name="pet_I_attempt" id="pet_I_attempt" placeholder="Attempt No" style="font-size: 0.8rem; height:50px;" >
                                   <!--  <select class="form-control rounded-pill" name="pet_I_attempt" id="pet_I_attempt" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">

                                        <option class="form-control form-control-user" value="">Attempt</option>
                                        <option class="form-control form-control-user" value="1">1st</option>
                                        <option class="form-control form-control-user" value="2">2nd</option>
                                        <option class="form-control form-control-user" value="3">3rd</option>
                                        <option class="form-control form-control-user" value="4">4th</option>
                                        <option class="form-control form-control-user" value="5">5th</option>
                                    </select> -->
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <button type="button" class="btn btn-primary btn-user rounded-pill" data-toggle="modal" data-target="#term-I">Add Details</button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 my-2">
                                    <h5>&nbsp;<strong>4 - PET-II</strong></h5>
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <select class="form-control rounded-pill" name="pet_II" id="pet_II" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Result</option>
                                        <option class="form-control form-control-user" value="qualified">Qualified</option>
                                        <option class="form-control form-control-user" value="disqualified">Disqualified</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 mb-1">
                                      <input type="number" class="form-control rounded-pill" name="pet_II_attempt" id="pet_II_attempt" placeholder="Attempt No" style="font-size: 0.8rem; height:50px;" >
                                    <!-- <select class="form-control rounded-pill" name="pet_II_attempt" id="pet_II_attempt" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Attempt</option>
                                        <option class="form-control form-control-user" value="1">1st</option>
                                        <option class="form-control form-control-user" value="2">2nd</option>
                                        <option class="form-control form-control-user" value="3">3rd</option>
                                        <option class="form-control form-control-user" value="4">4th</option>
                                        <option class="form-control form-control-user" value="5">5th</option>
                                    </select> -->
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <button type="button" class="btn btn-primary btn-user rounded-pill" data-toggle="modal" data-target="#term-II">Add Details</button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 my-2">
                                    <h5>&nbsp;<strong>5 - Assault course</strong></h5>
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <select class="form-control rounded-pill" name="assault" id="assault" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Result</option>
                                        <option class="form-control form-control-user" value="qualified">Qualified</option>
                                        <option class="form-control form-control-user" value="disqualified">Disqualified</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 mb-1">
                                     <input type="number" class="form-control rounded-pill" name="assault_attempt" id="assault_attempt" placeholder="Attempt No" style="font-size: 0.8rem; height:50px;" >
                                   <!--  <select class="form-control rounded-pill" name="assault_attempt" id="assault_attempt" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Attempt</option>
                                        <option class="form-control form-control-user" value="1">1st</option>
                                        <option class="form-control form-control-user" value="2">2nd</option>
                                        <option class="form-control form-control-user" value="3">3rd</option>
                                        <option class="form-control form-control-user" value="4">4th</option>
                                        <option class="form-control form-control-user" value="5">5th</option>
                                    </select> -->
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 my-2">
                                    <h5>&nbsp;<strong>6 - Saluting Test</strong></h5>
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <select class="form-control rounded-pill" name="saluting" id="saluting" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Result</option>
                                        <option class="form-control form-control-user" value="qualified">Qualified</option>
                                        <option class="form-control form-control-user" value="disqualified">Disqualified</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 mb-1">
                                     <input type="number" class="form-control rounded-pill"name="saluting_attempt" id="saluting_attempt" placeholder="Attempt No" style="font-size: 0.8rem; height:50px;" >
                                   <!--  <select class="form-control rounded-pill" name="saluting_attempt" id="saluting_attempt" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Attempt</option>
                                        <option class="form-control form-control-user" value="1">1st</option>
                                        <option class="form-control form-control-user" value="2">2nd</option>
                                        <option class="form-control form-control-user" value="3">3rd</option>
                                        <option class="form-control form-control-user" value="4">4th</option>
                                        <option class="form-control form-control-user" value="5">5th</option>
                                    </select> -->
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 my-2">
                                    <h5>&nbsp;<strong>7 - PLX</strong></h5>
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <select class="form-control rounded-pill" name="plx" id="plx" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Result</option>
                                        <option class="form-control form-control-user" value="qualified">Qualified</option>
                                        <option class="form-control form-control-user" value="disqualified">Disqualified</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 mb-1">
                                     <input type="number" class="form-control rounded-pill" name="plx_attempt" id="plx_attempt" placeholder="Attempt No" style="font-size: 0.8rem; height:50px;" >
                                   <!--  <select class="form-control rounded-pill" name="plx_attempt" id="plx_attempt" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Attempt</option>
                                        <option class="form-control form-control-user" value="1">1st</option>
                                        <option class="form-control form-control-user" value="2">2nd</option>
                                        <option class="form-control form-control-user" value="3">3rd</option>
                                        <option class="form-control form-control-user" value="4">4th</option>
                                        <option class="form-control form-control-user" value="5">5th</option>
                                    </select> -->
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 my-2">
                                    <h5>&nbsp;<strong>8 - Long Cross Country</strong></h5>
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <select class="form-control rounded-pill" name="long_cross" id="long_cross" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Result</option>
                                        <option class="form-control form-control-user" value="qualified">Qualified</option>
                                        <option class="form-control form-control-user" value="disqualified">Disqualified</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 mb-1">
                                  <input type="number" class="form-control rounded-pill" name="long_cross_card" id="long_cross_card" placeholder="Card No" style="font-size: 0.8rem; height:50px;" >

                                   <!--  <select class="form-control rounded-pill" name="long_cross_card" id="long_cross_card" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Card Number</option>
                                        <option class="form-control form-control-user" value="1">1</option>
                                        <option class="form-control form-control-user" value="2">2</option>
                                        <option class="form-control form-control-user" value="3">3</option>
                                        <option class="form-control form-control-user" value="4">4</option>
                                        <option class="form-control form-control-user" value="5">5</option>
                                    </select> -->
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 my-2">
                                    <h5>&nbsp;<strong>9 - Mini Cross Country</strong></h5>
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <select class="form-control rounded-pill" name="mini_cross" id="mini_cross" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Result</option>
                                        <option class="form-control form-control-user" value="qualified">Qualified</option>
                                        <option class="form-control form-control-user" value="disqualified">Disqualified</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 mb-1">
                                      <input type="number" class="form-control rounded-pill" name="mini_cross_card" id="mini_cross_card" placeholder="Card No" style="font-size: 0.8rem; height:50px;" >
                                   <!--  <select class="form-control rounded-pill" name="mini_cross_card" id="mini_cross_card" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Card Number</option>
                                        <option class="form-control form-control-user" value="1">1</option>
                                        <option class="form-control form-control-user" value="2">2</option>
                                        <option class="form-control form-control-user" value="3">3</option>
                                        <option class="form-control form-control-user" value="4">4</option>
                                        <option class="form-control form-control-user" value="5">5</option>
                                    </select> -->
                                </div>

                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="save_btn">
                                        <!-- <i class="fab fa-google fa-fw"></i>   -->
                                        save
                                    </button>
                                    <span id="show_error_save" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please check errors*</span>
                                </div>
                            </div>
                            <input type="hidden" name="milestone_id" id="milestone_id">
                        </form>
                    </div>
                </div>


            </div>
        </div>

        <div id="no_data" class="row my-2" style="display:none">
            <div class="col-lg-12 my-5">

                <h4 style="color:red">No Cadet Found. Please check the OC No. entered</h4>

            </div>
        </div>
    </div>

</div>

</div>

<?php $this->load->view('common/footer'); ?>
<script>
    $('#add_btn_termI').on('click', function() {
        var p_id = $('#id1').val();
        var oc_no = $('#oc_num1').val();
        var mile_time = $('#mile_time_I').val();
        var Pushups = $('#Pushups_I').val();
        var Chinups = $('#Chinups_I').val();
        var rope = $('#Rope_I').val();
        var term = $('#term_pet1').val();

        $.ajax({
            url: '<?= base_url(); ?>DEAN/add_termI_details',
            method: 'POST',
            //  type:'json',
            data: {
                'p_id': p_id,
                'oc_no': oc_no,
                'mile_time': mile_time,
                'Pushups': Pushups,
                'Chinups': Chinups,
                'rope': rope,
                'term': term
            },
            success: function(response) {
            },
            async: false
        });
        $('#term-I').modal('hide');
    });

    $('#add_btn_termII').on('click', function() {        
        var validate = 0;

        var p_id = $('#id2').val();
        var oc_no = $('#oc_num2').val();
        var mile_time = $('#mile_time_II').val();
        var Pushups = $('#Pushups_II').val();
        var Chinups = $('#Chinups_II').val();
        var rope = $('#Rope_II').val();
        var term = $('#term_pet2').val();

        $.ajax({
            url: '<?= base_url(); ?>DEAN/add_termII_details',
            method: 'POST',
            //  type:'json',
            data: {
                'p_id': p_id,
                'oc_no': oc_no,
                'mile_time': mile_time,
                'Pushups': Pushups,
                'Chinups': Chinups,
                'rope': rope,
                'term' : term
            },
            success: function(response) {
            },
            async: false
        });

        $('#term-II').modal('hide');

    });

    function seen(data) {
        // alert('in');
        // alert(data);
        // var receiver_id=$(this).attr('id');
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
        // alert('notification clicked');
        $.ajax({
            url: '<?= base_url(); ?>ChatController/activity_seen',
            success: function(data) {
                $('#notifications').html(data);
            },
            async: true
        });
    });


    $('#add_btn').on('click', function() {
        var validate = 0;
        var oc_no = $('#oc_no').val();

        if (oc_no == '') {
            validate = 1;
            $('#oc_no').addClass('red-border');
        }

        if (validate == 0) {
            // $('#add_form')[0].submit();
            $('#show_error_new').hide();
            //alert('validate');
            $.ajax({
                url: '<?= base_url(); ?>DEAN/search_cadet_physical_milestone',
                method: 'POST',
                data: {
                    'oc_no': oc_no
                },
                success: function(data) {
                    var result = jQuery.parseJSON(data);

                    if (result != undefined) {
                        $('#search_cadet').show();
                        $('#no_data').hide();

                        $('#name').val(result['f_name']);
                        $('#term').val(result['f_term']);
                        $('#division').val(result['f_divison_name']);
                        $('#oc_num').val(result['f_oc_no']);
                        $('#id').val(result['f_p_id']);
                        $('#oc_num1').val(result['f_oc_no']);
                        $('#id1').val(result['f_p_id']);
                        $('#oc_num2').val(result['f_oc_no']);
                        $('#id2').val(result['f_p_id']);
                        $('#pst').val(result['PST_result']);
                        $('#pst_attempt').val(result['PST_attempt']);
                        $('#sst').val(result['SST_result']);
                        $('#sst_attempt').val(result['SST_attempt']);
                        $('#pet_I').val(result['PET_I_result']);
                        $('#pet_I_attempt').val(result['PET_I_attempt']);
                        $('#pet_II').val(result['PET_II_result']);
                        $('#pet_II_attempt').val(result['PET_II_attempt']);
                        $('#assault').val(result['assault_result']);
                        $('#assault_attempt').val(result['assault_attempt']);
                        $('#saluting').val(result['saluting_result']);
                        $('#saluting_attempt').val(result['saluting_attempt']);
                        $('#plx').val(result['PLX_result']);
                        $('#plx_attempt').val(result['PLX_attempt']);
                        $('#long_cross').val(result['long_cross_result']);
                        $('#long_cross_card').val(result['long_cross_card_number']);
                        $('#mini_cross').val(result['mini_cross_result']);
                        $('#mini_cross_card').val(result['mini_cross_card_number']);
                        $('#milestone_id').val(result['id']);

                        $('#mile_time_I').val(result['mile_time']);
                        $('#Chinups_I').val(result['chinups']);
                        $('#Pushups_I').val(result['pushups']);
                        $('#Rope_I').val(result['rope']);
                        $('#term_pet1').val(result['f_term']);

                        $('#mile_time_II').val(result['mile_time_II']);
                        $('#Chinups_II').val(result['chinups_II']);
                        $('#Pushups_II').val(result['pushups_II']);
                        $('#Rope_II').val(result['rope_II']);
                        $('#term_pet2').val(result['f_term']);

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

    $('#end_date').on('focusout', function() {
        var start_date = new Date($('#start_date').val());
        var end_date = new Date($('#end_date').val());
        var validate = 0;

        if (end_date < start_date) {
            $('#error_end_date').show();
            $('#end_date').addClass('red-border');
            $('#end_date').focus();
            $('#save_btn').attr('disabled', true);
        } else {
            $('#error_end_date').hide();
            $('#save_btn').removeAttr('disabled');
            $('#end_date').removeClass('red-border');

        }

        $('#days').val(Math.abs(end_date - start_date) / 1000 / 60 / 60 / 24);
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
</script>