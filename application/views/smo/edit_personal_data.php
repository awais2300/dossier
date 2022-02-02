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

<div class="container-fluid my-2">
    <!-- Page Heading -->
    <div class="card-body" style="padding:10px">
        <img src='<?= base_url() ?>assets/img/navy_logo-new.png' style="height: 130px; width:100px;">
        <div class="card-body" style="margin-bottom:20px;float:right; padding:30px; margin-right:500px">
            <h1 style="text-align:center"><strong>EDIT PN Form - I</strong></h1>
        </div>
    </div>

    <div class="card-body bg-custom3">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header bg-custom1">
                        <h1 class="h4">PN Form - I</h1>
                    </div>

                    <div class="card-body bg-custom3">
                        <form class="user" role="form" method="post" id="add_form" enctype="multipart/form-data" action="<?= base_url(); ?>SMO/update_personal_record">
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#step1" role="tab" aria-controls="nav-home" aria-selected="true" style="width:300px;">Part 1</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#step2" role="tab" aria-controls="nav-profile" aria-selected="false" style="width:300px;">Part 2</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#step3" role="tab" aria-controls="nav-contact" aria-selected="false" style="width:300px;">Part 3</a>
                                </div>
                            </nav>

                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <h2 style="text-align:center; margin-top:15px">PART I</h2>
                                    <hr>
                                    <input type="hidden" name="row_id" value="<?= $pn_personal_data['id'] ?>">
                                    <input type="hidden" name="row_pid" value="<?= $pn_personal_data['p_id'] ?>">
                                    <div class="form-group row my-2">
                                        <div class="col-sm-12">
                                            <h6>&nbsp;Officer Name:</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-1">
                                            <input type="text" class="form-control form-control-user" name="officer_name" id="officer_name" placeholder="Officer Name" value="<?= $pn_personal_data['name'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <h6>&nbsp;Upload Picture:</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row custom-file-upload">
                                        <div class="col-sm-12 mb-1">
                                            <input type="file" style="height: 50px; padding:10px !important;" multiple="multiple" class="form-control form-control-user" placeholder="Upload Document" name="report[]" x-model="fileName">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <h6>&nbsp;OC NO:</h6>
                                        </div>

                                        <div class="col-sm-6">
                                            <h6>&nbsp;Course:</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-1">
                                            <input type="text" class="form-control form-control-user" name="oc_no" id="oc_no" value="<?= $pn_personal_data['oc_no'] ?>">
                                        </div>
                                        <div class="col-sm-6 mb-1">
                                            <input type="text" class="form-control form-control-user" name="course" id="course" value="<?= $pn_personal_data['course'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <h6>&nbsp;P. NO:</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <h6>&nbsp;Class:</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-1">
                                            <input type="text" class="form-control form-control-user" name="pno" id="pno" value="<?= $pn_personal_data['p_no'] ?>">
                                        </div>
                                        <div class="col-sm-6 mb-1">
                                            <input type="text" class="form-control form-control-user" name="class" id="class" value="<?= $pn_personal_data['class'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <h6>&nbsp;ISSB Batch No:</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <h6>&nbsp;Category:</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-1">
                                            <input type="text" class="form-control form-control-user" name="batch_no" id="batch_no" value="<?= $pn_personal_data['issb_batch'] ?>">
                                        </div>

                                        <div class="col-sm-6 mb-1">
                                            <select class="form-control rounded-pill" name="category" id="category" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;" value="<?= $pn_personal_data['category'] ?>">
                                            <!-- <option class="form-control form-control-user" value="">Select Category</option> -->
                                            <option class="form-control form-control-user" value="PN-Cadet">PN-Cadet</option>
                                            <option class="form-control form-control-user" value="SSC Cadet">SSC Cadet</option>
                                            <option class="form-control form-control-user" value="Allied Cadet">Allied Cadet</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <h6>&nbsp;Division Name:</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <h6>&nbsp;Term:</h6>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-1">
                                            <select class="form-control rounded-pill" name="div" id="div" data-placeholder="Select ship" style="font-size: 0.8rem; height:50px;" readonly>
                                                <?php foreach ($divisions as $data) { ?>
                                                    <option class="form-control form-control-user" value="<?= $data['division_name'] ?>"><?= $data['division_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 mb-1">
                                            <select class="form-control rounded-pill" name="term" id="term" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;" value="<?= $pn_personal_data['term'] ?>">
                                                <!-- <option class="form-control form-control-user" value="">Select Term</option> -->
                                                <option class="form-control form-control-user" value="Term-I">Term-I</option>
                                                <option class="form-control form-control-user" value="Term-II">Term-II</option>
                                                <option class="form-control form-control-user" value="Term-III">Term-III</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <h6>&nbsp;Religion:</h6>
                                        </div>

                                        <div class="col-sm-6">
                                            <h6>&nbsp;Emergency Contact:</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-1">
                                            <input type="text" class="form-control form-control-user" name="religion" id="religion" placeholder="Religion" value="<?= $pn_personal_data['religion'] ?>">
                                        </div>
                                        <div class="col-sm-6 mb-1">
                                            <input type="text" class="form-control form-control-user" name="e_contact" id="e_contact" placeholder="Emergency Contact" value="<?= $pn_personal_data['emergency_contact'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <h6>&nbsp;Telephone:</h6>
                                        </div>

                                        <div class="col-sm-6">
                                            <h6>&nbsp;Ex Army/Navy/PAF:</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-1">
                                            <input type="text" class="form-control form-control-user" name="telephone" id="telephone" placeholder="Telephone" value="<?= $pn_personal_data['telephone_no'] ?>">
                                        </div>
                                        <div class="col-sm-6 mb-1">
                                            <input type="text" class="form-control form-control-user" name="army" id="army" placeholder="Ex-Forces" value="<?= $pn_personal_data['ex_army'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <h6>&nbsp;Father's Name:</h6>
                                        </div>

                                        <div class="col-sm-6">
                                            <h6>&nbsp;Father's Occupation:</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-1">
                                            <input type="text" class="form-control form-control-user" name="father_name" id="father_name" placeholder="Father's Name" value="<?= $pn_personal_data['father_name'] ?>">
                                        </div>
                                        <div class="col-sm-6 mb-1">
                                            <input type="text" class="form-control form-control-user" name="occupation" id="occupation" placeholder="Father's Occupation" value="<?= $pn_personal_data['father_occupation'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <h6>&nbsp;Next of Kin & Address:</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-1">
                                            <input type="text" class="form-control form-control-user" name="next_of_kin" id="next_of_kin" placeholder="Next of Kin and Address" value="<?= $pn_personal_data['next_of_kin'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <h6>&nbsp;Names of brothers and Sisters:</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-1">
                                            <textarea type="text" style="border-radius:10px" class="form-control form-control-user" name="siblings" id="siblings" placeholder="Enter Names"><?= $pn_personal_data['siblings'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <h6>&nbsp;Relatives in defence services (Parents/brothers/sisters/Real uncles):</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-1">
                                            <textarea type="text" style="border-radius:10px" class="form-control form-control-user" name="relatives" id="relatives" placeholder="Enter Names"><?= $pn_personal_data['near_relatives'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <h6>&nbsp;Identificaiton Mark:</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-1">
                                            <input type="text" class="form-control form-control-user" name="mark" id="mark" placeholder="Identification Mark" value="<?= $pn_personal_data['identification_marks'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <h6>&nbsp;Height:</h6>
                                        </div>

                                        <div class="col-sm-6">
                                            <h6>&nbsp;Weight:</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-1">
                                            <input type="text" class="form-control form-control-user" name="height" id="height" placeholder="Height" value="<?= $pn_personal_data['height'] ?>">
                                        </div>
                                        <div class="col-sm-6 mb-1">
                                            <input type="text" class="form-control form-control-user" name="weight" id="weight" placeholder="Weight" value="<?= $pn_personal_data['weight'] ?>">
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <h2 style="text-align:center; margin-top:15px;margin-bottom:10px">PART II</h2>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <h6>&nbsp;Date of Joining Navy:</h6>
                                        </div>

                                        <div class="col-sm-6">
                                            <h6>&nbsp;Mode of Entry:</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-1">
                                            <input type="date" class="form-control form-control-user" name="joining_date" id="joining_date" placeholder="Joining Date" value="<?= $pn_personal_data['navy_joining_date'] ?>">
                                        </div>
                                        <div class="col-sm-6 mb-1">
                                            <input type="text" class="form-control form-control-user" name="entry_mode" id="entry_mode" placeholder="Mode of Entry" value="<?= $pn_personal_data['entry_mode'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <h6>&nbsp;Service Identity Card No:</h6>
                                        </div>

                                        <div class="col-sm-6">
                                            <h6>&nbsp;CNIC:</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-1">
                                            <input type="text" class="form-control form-control-user" name="service_no" id="service_no" placeholder="Service No" value="<?= $pn_personal_data['service_id'] ?>">
                                        </div>
                                        <div class="col-sm-6 mb-1">
                                            <input type="text" class="form-control form-control-user" name="cnic" id="cnic" placeholder="CNIC" value="<?= $pn_personal_data['nic'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <h6>&nbsp;Blood Group:</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-1">
                                            <input type="text" class="form-control form-control-user" name="blood" id="blood" placeholder="Blood Group" value="<?= $pn_personal_data['blood_group'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <h6>&nbsp;Address:</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-1">
                                            <textarea type="text" style="border-radius:10px" class="form-control form-control-user" name="address" id="address" placeholder="Address"><?= $pn_personal_data['address'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <h6>&nbsp;Address of Karachi (if any):</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-1">
                                            <textarea type="text" style="border-radius:10px" class="form-control form-control-user" name="khi_address" id="khi_address" placeholder="Karachi Address with Telephone No." value="<?= $pn_personal_data['karachi_address'] ?>"><?= $pn_personal_data['karachi_address'] ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <h2 style="text-align:center; margin-top:15px;margin-bottom:10px">PART III</h2>
                                    <h4>Educational Qualifications</h4>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <h6>&nbsp;Matric School:</h6>
                                        </div>

                                        <div class="col-sm-6">
                                            <h6>&nbsp;Division/Grade</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-1">
                                            <input type="text" class="form-control form-control-user" name="matric" id="matric" placeholder="Matric School" value="<?= $pn_personal_data['matric_school'] ?>">
                                        </div>
                                        <div class="col-sm-6 mb-1">
                                            <input type="text" class="form-control form-control-user" name="grade_matric" id="grade" placeholder="Matric Grade" value="<?= $pn_personal_data['matric_division'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <h6>&nbsp;Intermediate College</h6>
                                        </div>

                                        <div class="col-sm-6">
                                            <h6>&nbsp;Division/Grade:</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-1">
                                            <input type="text" class="form-control form-control-user" name="college" id="college" placeholder="Intermediate College" value="<?= $pn_personal_data['intermediate_college'] ?>">
                                        </div>
                                        <div class="col-sm-6 mb-1">
                                            <input type="text" class="form-control form-control-user" name="grade_intermediate" id="grade" placeholder="Intermediate Grade" value="<?= $pn_personal_data['intermediate_division'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <h6>&nbsp;Diploma (If Any):</h6>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-1">
                                            <input type="text" class="form-control form-control-user" name="diploma" id="diploma" placeholder="Dimploma" value="<?= $pn_personal_data['diploma'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row justify-content-center">
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-primary btn-user btn-block" id="add_btn">
                                                <!-- <i class="fab fa-google fa-fw"></i>  -->
                                                Submit
                                            </button>
                                            <span id="show_error_new" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Fill in the required fields*</span>
                                        </div>
                                    </div>

                                </div>
                            </div>



                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>

</div>

<?php $this->load->view('common/footer'); ?>
<script>
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
        //alert('javascript working');
        $('#add_btn').attr('disabled', true);
        var validate = 0;

        var officer_name = $('#officer_name').val();
        var pno = $('#pno').val();
        var course = $('#course').val();
        var e_contact = $('#e_contact').val();
        var father_name = $('#father_name').val();
        var religion = $('#religion').val();

        if (officer_name == '') {
            validate = 1;
            $('#officer_name').addClass('red-border');
        }
        if (pno == '') {
            validate = 1;
            $('#pno').addClass('red-border');
        }
        if (course == '') {
            validate = 1;
            $('#course').addClass('red-border');
        }
        if (e_contact == '') {
            validate = 1;
            $('#e_contact').addClass('red-border');
        }
        if (father_name == '') {
            validate = 1;
            $('#father_name').addClass('red-border');
        }
        if (religion == '') {
            validate = 1;
            $('#religion').addClass('red-border');
        }

        if (validate == 0) {
            $('#add_form')[0].submit();
            $('#show_error_new').hide();
        } else {
            $('#add_btn').removeAttr('disabled');
            $('#show_error_new').show();
        }
    });
</script>