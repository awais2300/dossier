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

    <div class="form-group row justify-content-center">
        <div class="col-lg-1">
            <img src='<?= base_url() ?>assets/img/navy_logo-new.png' style="height: 130px; width:100px;">
        </div>
        <div class="col-lg-11">
            <h1 style="text-align:center; padding:40px"><strong>TERM PROMOTION / RELEGATION</strong></h1>
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
                                <div class="col-sm-2">
                                    <h6>&nbsp;Enter OC No:</h6>
                                </div>
                                <div class="col-sm-2">

                                </div>
                                <div class="col-sm-2">

                                </div>
                                <div id="show_term_title" class="col-sm-2" style="display:none">
                                    <h6>&nbsp;Select Term:</h6>
                                </div>
                                <div id="show_select_branch_title" class="col-sm-2" style="display:none">
                                    <h6>&nbsp;Select Branch:</h6>
                                </div>
                                <div id="show_select_semester_title" class="col-sm-2" style="display:none">
                                    <h6>&nbsp;Select Semester:</h6>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2 mb-1">
                                    <input type="text" class="form-control form-control-user" name="oc_no" id="oc_no" placeholder="OC No.">
                                </div>

                                <div class="col-sm-2 mb-1">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="add_btn">
                                        Search
                                    </button>
                                    <span id="show_error_new" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please check errors*</span>
                                </div>

                                <div class="col-sm-2 mb-1">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="show_all_btn">
                                        Show All Cadets
                                    </button>
                                    <span id="show_error_new" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please check errors*</span>
                                </div>

                                <div id="show_terms" class="col-sm-2 mb-1" style="display:none">
                                    <select class="form-control rounded-pill" name="term_list" id="term_list" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Term</option>
                                        <?php if ($this->session->userdata('unit_id') == '1' || $this->session->userdata('unit_id') == '3' || $this->session->userdata('unit_id') == '2' || $this->session->userdata('unit_id') == '17') { ?>
                                            <!-- <option class="form-control form-control-user" value="Term-P">Term-P</option>
                                            <option class="form-control form-control-user" value="Term-I">Term-I</option>
                                            <option class="form-control form-control-user" value="Term-II">Term-II</option>
                                            <option class="form-control form-control-user" value="Term-III">Term-III</option>
                                            <option class="form-control form-control-user" value="Midshipman">Midshipman</option> -->
                                            <option class="form-control form-control-user" value="Sub-Lieutenant">Sub-Lieutinent</option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-sm-2 mb-1" id="select_branch_list" style="display:none">
                                    <select class="form-control rounded-pill" name="select_branches" id="select_branches" data-placeholder="Select ship" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Branch</option>
                                        <!-- <?php //foreach ($branches as $data) { 
                                                ?> -->
                                        <!-- <option class="form-control form-control-user" value="<?= $data['id'] ?>"><?= $data['branch_name'] ?></option> -->
                                        <option class="form-control form-control-user" value="<?= $this->session->userdata('branch_id'); ?>"><?= $this->session->userdata('branch_name'); ?></option>
                                        <!-- <?php //} 
                                                ?> -->
                                    </select>
                                    <span id="show_error_select_branch_list" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please select branch to Proceed*</span>
                                </div>

                                <div id="show_semesters" class="col-sm-2 mb-1" style="display:none">
                                    <select class="form-control rounded-pill" name="show_semester_list" id="show_semester_list" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Semester</option>

                                    </select>
                                </div>



                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4 mb-1">
                                </div>
                                <div class="col-sm-4 mb-1" id="promote_button">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="promote_all_btn" style="background-color:green;display:none">
                                        <strong>Promote ALL</strong>
                                    </button>
                                    <span id="show_error_new" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please check errors*</span>
                                </div>
                                <div class="col-sm-4 mb-1">
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
                        <h1 class="h4">Promote / Relegate a cadet</h1>
                    </div>

                    <div class="card-body bg-custom3">
                        <form class="user" role="form" method="post" enctype="multipart/form-data" id="save_form" action="<?= base_url(); ?>DEAN/save_cadet_warning">
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <h6>&nbsp;Name:</h6>
                                </div>

                                <div class="col-sm-2">
                                    <h6>&nbsp;Term:</h6>
                                </div>

                                <div class="col-sm-2" id="ship_list_label" style="display: none">
                                    <h6>&nbsp;Select Ship:</h6>
                                </div>

                                <div class="col-sm-2" id="unit_list_label" style="display: none">
                                    <h6>&nbsp;Select Unit:</h6>
                                </div>

                                <div class="col-sm-2" id="branch_list_label" style="display: none">
                                    <h6>&nbsp;Select Branch:</h6>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2 mb-1" style="display:none">
                                    <input type="text" class="" name="oc_num" id="oc_num">
                                </div>
                                <div class="col-sm-2 mb-1" style="display:none">
                                    <input type="text" class="" name="id" id="id">
                                </div>
                                <div class="col-sm-2 mb-1" style="display:none">
                                    <input type="text" class="" name="branch_in" id="branch_in">
                                </div>

                                <div class="col-sm-2 mb-1">
                                    <input type="text" class="form-control form-control-user" name="name" id="name" style="font-weight: bold; font-size:medium" placeholder="Name" readonly>
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <input type="text" class="form-control form-control-user" name="term" id="term" style="font-weight: bold; font-size:medium" placeholder="Term" readonly>
                                </div>

                                <div class="col-sm-2 mb-1" id="ship_list_seperate" style="display: none">
                                    <select class="form-control rounded-pill" name="ship_ind" id="ship_ind" data-placeholder="Select ship" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Ship</option>
                                        <?php foreach ($ships as $data) { ?>
                                            <option class="form-control form-control-user" value="<?= $data['id'] ?>"><?= $data['unit_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <span id="show_error_select_ship_one_by_one" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please select ship to Proceed*</span>
                                </div>

                                <div class="col-sm-2 mb-1" id="unit_list" style="display: none">
                                    <select class="form-control rounded-pill" name="unit" id="unit" data-placeholder="Select ship" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Unit</option>
                                        <?php foreach ($units as $data) { ?>
                                            <option class="form-control form-control-user" value="<?= $data['id'] ?>"><?= $data['unit_name'] ?></option>
                                        <?php } ?>
                                    </select>

                                    <span id="show_error_select_unit_all" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please select unit to Proceed*</span>
                                </div>
                                <div class="col-sm-2 mb-1" id="branch_list" style="display: none">
                                    <select class="form-control rounded-pill" name="branch" id="branch" data-placeholder="Select ship" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select branch</option>
                                        <?php foreach ($branches as $data) { ?>
                                            <option class="form-control form-control-user" value="<?= $data['id'] ?>"><?= $data['branch_name'] ?></option>
                                        <?php } ?>
                                    </select>

                                    <span id="show_error_select_branch_one_by_one" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please select branch to Proceed*</span>
                                </div>

                                <div class="col-sm-2 mb-1">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="promote_btn" style="background-color:green">
                                        <strong>Promote</strong>
                                    </button>
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="relegate_btn" style="background-color:red">
                                        <strong>Relegate</strong>
                                    </button>
                                </div>

                            </div>

                            <!-- <div class="form-group row justify-content-center">
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="save_btn">
                                        save
                                    </button>
                                    <span id="show_error_save" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please check errors*</span>
                                </div>
                            </div> -->

                        </form>
                    </div>
                </div>


            </div>
        </div>

        <div id="show_all_cadets" class="row my-2" style="display:none">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header bg-custom1">
                        <h1 class="h4">Promote / Relegate a cadet</h1>
                    </div>

                    <div class="card-body bg-custom3">
                        <form class="user" role="form" method="post" enctype="multipart/form-data" id="save_form" action="<?= base_url(); ?>DEAN/save_cadet_warning">
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <h5 id="term_selected"></h5>
                                </div>
                                <div class="col-sm-2">
                                </div>
                                <div class="col-sm-2" id="unit_list_label_term3">
                                    <!--  <h5 id="select_unit_label">Select Unit to Promote:</h5> -->
                                </div>

                            </div>
                            <div class="form-group row">
                                <div id="list_of_cadets" class="col-sm-2 mb-1">
                                </div>
                                <div id="cadets_oc_no" class="col-sm-2 mb-1">
                                </div>
                                <div id="cadets_semester" class="col-sm-2 mb-1">
                                </div>

                                <div class="col-sm-2 mb-1" id="unit_list_term3" style="display:none">
                                    <select class="form-control rounded-pill" name="units_list" id="units_list" data-placeholder="Select ship" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Unit</option>
                                        <?php foreach ($units as $data) { ?>
                                            <option class="form-control form-control-user" value="<?= $data['id'] ?>"><?= $data['unit_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <span id="show_error_select_unit_all_term3" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please select Unit to Proceed*</span>
                                </div>

                                <div class="col-sm-2 mb-1" id="ship_list_term3" style="display:none">
                                    <select class="form-control rounded-pill" name="ships_list" id="ships_list" data-placeholder="Select ship" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Ship</option>
                                        <?php foreach ($ships as $data) { ?>
                                            <option class="form-control form-control-user" value="<?= $data['id'] ?>"><?= $data['unit_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <span id="show_error_select_ship_all" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please select Ship to Proceed*</span>
                                </div>

                                <div class="col-sm-2 mb-1" id="branch_list_term4" style="display:none">
                                    <select class="form-control rounded-pill" name="branchs_list" id="branchs_list" data-placeholder="Select ship" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Branch</option>
                                        <?php foreach ($branches as $data) { ?>
                                            <option class="form-control form-control-user" value="<?= $data['id'] ?>"><?= $data['branch_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <span id="show_error_select_branch_all" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please select branch to Proceed*</span>
                                </div>

                                <div class="col-sm-3 mb-1" id="promote_btn_midshipman">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="promote_all_btn_term3" style="background-color:green;display: none">
                                        <strong>Promote to Midshipman</strong>
                                    </button>
                                </div>

                                <div class="col-sm-3 mb-1" id="promote_btn_SLt">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="promote_all_btn_term4" style="background-color:green;display:none;">
                                        <strong>Promote to S/Lt</strong>
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

                <h4 style="color:red">No Cadet Found. Please check the OC No. entered</h4>

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
        var validate = 0;
        var oc_no = $('#oc_no').val();
        //alert(oc_no);
        $('#promote_btn').show();
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

                    $('#search_cadet').show();
                    $('#no_data').hide();
                    $('#term_list').hide();
                    $('#show_all_cadets').hide();
                    $('#show_terms').hide();
                    $('#show_semesters').hide();
                    $('#select_branch_list').hide();
                    $('#show_term_title').hide();
                    $('#show_select_branch_title').hide();
                    $('#show_select_semester_title').hide();
                    $('#promote_all_btn').hide();

                    if (result != undefined) {
                        $('#name').val(result['name']);
                        $('#term').val(result['term']);
                        $('#branch_in').val(result['branch_id']);
                        $('#division').val(result['divison_name']);
                        $('#oc_num').val(result['oc_no']);
                        $('#id').val(result['p_id']);

                        if (result['term'] == 'Term-III') {
                            $('#ship_list_seperate').show();
                            $('#ship_list_label').show();
                            $('#branch_list').show();
                            $('#branch_list_label').show();
                            $('#unit_list').hide();
                            $('#unit_list_label').hide();
                        } else if (result['term'] == 'Term-IV') {
                            $('#unit_list').show();
                            $('#unit_list_label').show();
                            $('#branch_list').show();
                            $('#branch_list_label').show();
                            $('#ship_list_seperate').hide();
                            $('#ship_list_label').hide();
                        }

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

    $('#promote_btn').on('click', function() {
        var p_id = $('#id').val();
        var curr_term = $('#term').val();
        var unit_id;

        if (curr_term == 'Term-III') {
            unit_id = $('#ship_ind').val();
        } else if (curr_term == 'Term-IV') {
            unit_id = $('#unit').val();
        }

        var branch_id = $('#branch').val();
        var branch_in = $('#branch_in').val();
        var validate = 0;

        if (curr_term == 'Term-III' || curr_term == 'Term-IV') {
            if (unit_id == '') {
                validate = 1;
                if (curr_term == 'Term-III') {
                    $('#ship_ind').addClass('red-border');
                    $('#show_error_select_ship_one_by_one').show();
                } else if (curr_term == 'Term-IV') {
                    $('#unit').addClass('red-border');
                    $('#units_list').addClass('red-border');
                    $('#show_error_select_unit_all').show();
                }
            }
            if (branch_id == '') {
                validate = 1;
                $('#branch').addClass('red-border');
                $('#show_error_select_branch_one_by_one').show();
            }
        }

        if (validate == 0) {
            var pass_branch;
            if (branch_in == ''){
                pass_branch = branch_id;
            } else {
                pass_branch = branch_in;
            }
            $('#show_error_select_unit_all').hide();
            $.ajax({
                url: '<?= base_url(); ?>DEAN/update_cadet_term',
                method: 'POST',
                data: {
                    'p_id': p_id,
                    'curr_term': curr_term,
                    'action': 'promote',
                    'all': 'no',
                    'unit_id': unit_id,
                    'branch_id': pass_branch
                },
                success: function(data) {
                    var newDoc = document.open("text/html", "replace");
                    newDoc.write(data);
                    newDoc.close();
                },
                async: false
            });
        }
    });

    $('#relegate_btn').on('click', function() {
        var p_id = $('#id').val();
        var curr_term = $('#term').val();

        $.ajax({
            url: '<?= base_url(); ?>DEAN/update_cadet_term',
            method: 'POST',
            data: {
                'p_id': p_id,
                'curr_term': curr_term,
                'action': 'relegate',
                'all': 'no'
            },
            success: function(data) {
                var newDoc = document.open("text/html", "replace");
                newDoc.write(data);
                newDoc.close();
            },
            async: false
        });
    });

    $('#promote_all_btn').on('click', function() {
        var curr_term = $('#term_list').val();
        var branch = $('#select_branches').val();
        var semester = $('#show_semester_list').val();

        $.ajax({
            url: '<?= base_url(); ?>DEAN/update_cadet_term',
            method: 'POST',
            data: {
                'p_id': 0,
                'curr_term': semester,
                'branch_id': branch,
                'action': 'promote',
                'all': 'yes'
            },
            success: function(data) {
                var newDoc = document.open("text/html", "replace");
                newDoc.write(data);
                newDoc.close();
            },
            async: false
        });
    });

    //Added by Awais Dated: 13 Dec 2021
    $('#promote_all_btn_term3').on('click', function() {
        var curr_term = $('#term_list').val();
        if (curr_term == 'Term-III') {
            var unit_id = $('#ships_list').val();
        } else if (curr_term == 'Term-IV') {
            var unit_id = $('#units_list').val();
        }

        var branch_id = $('#branchs_list').val();

        var validate = 0;

        if (unit_id == '') {
            validate = 1;
            if (curr_term == 'Term-III') {
                $('#ships_list').addClass('red-border');
                $('#show_error_select_ship_all').show();
            } else if (curr_term == 'Term-IV') {
                $('#units_list').addClass('red-border');
                $('#show_error_select_unit_all').show();
            }
        }
        if (branch_id == "") {
            validate = 1;
            $('#branchs_list').addClass('red-border');
            $('#show_error_select_branch_all').show();
        }

        if (validate == 0) {
            $('#show_error_select_unit_all').hide();
            $('#show_error_select_ship_all').hide();
            $.ajax({
                url: '<?= base_url(); ?>DEAN/update_cadet_to_midshipman',
                method: 'POST',
                data: {
                    'p_id': 0,
                    'curr_term': curr_term,
                    'action': 'promote',
                    'all': 'yes',
                    'unit_id': unit_id,
                    'branch_id': branch_id
                },
                success: function(data) {
                    var newDoc = document.open("text/html", "replace");
                    newDoc.write(data);
                    newDoc.close();
                },
                async: false
            });
        }
    });

    //Added by Awais Dated: 15 Dec 2021
    $('#promote_all_btn_term4').on('click', function() {
        var curr_term = $('#term_list').val();
        //var unit_id = $('#units_list').val();
        if (curr_term == 'Term-III') {
            var unit_id = $('#ships_list').val();
        } else if (curr_term == 'Term-IV') {
            var unit_id = $('#units_list').val();
        }
        var branch_id = $('#branchs_list').val();
        var validate = 0;

        if (branch_id == "") {
            validate = 1;
            $('#branchs_list').addClass('red-border');
            $('#show_error_select_branch_all').show();
        }

        if (unit_id == "") {
            validate = 1;
            $('#units_list').addClass('red-border');
            $('#show_error_select_unit_all').show();
            $('#show_error_select_unit_all_term3').show();
        }

        if (validate == 0) {
            $('#show_error_select_branch_all').hide();
            // $('#show_error_select_unit_all').hide();
            $('#show_error_select_unit_all_term3').hide();
            $.ajax({
                url: '<?= base_url(); ?>DEAN/update_cadet_to_sub_lieutenant',
                method: 'POST',
                data: {
                    'p_id': 0,
                    'curr_term': curr_term,
                    'action': 'promote',
                    'all': 'yes',
                    'branch_id': branch_id,
                    'unit_id': unit_id
                },
                success: function(data) {
                    var newDoc = document.open("text/html", "replace");
                    newDoc.write(data);
                    newDoc.close();
                },
                async: false
            });
        }
    });

    $('#show_all_btn').on('click', function() {
        $('#show_terms').show();
        $('#show_term_title').show();
        $('#show_select_branch_title').show();
        $('#term_list').show();
        $('#select_branch_list').show();
    });

    $('#select_branches').on('change', function() {
        var branch = $(this).val();

        $.ajax({
            url: '<?= base_url(); ?>DEAN/get_semester_list',
            method: 'POST',
            data: {
                'branch_id': branch
            },
            success: function(data) {
                var result = jQuery.parseJSON(data);
                var len = result.length;
                $("#show_semester_list").empty();
                $("#show_semester_list").append(` <option class="form-control form-control-user" value="">Select Semester</option>`);
                if (len > 0) {
                    for (var i = 0; i < len; i++) {
                        $("#show_semester_list").append(` <option class="form-control form-control-user" value="${result[i]}">${result[i]}</option>`);
                    }
                }

                $("#show_semesters").show();
                $('#show_select_semester_title').show();
            },
            async: false
        });
    });

    $("#show_semesters_list").on('change', function() {
        var term = $('#term_list').val();
        var branch = $('#select_branches').val();
        var semester = $(this).val();

        if (term == 'Term-III') {
            $('#promote_button').hide();
            $('#promote_all_btn_term3').show();
            $('#promote_btn_midshipman').show();
            $('#unit_list_term3').hide();
            $('#ship_list_term3').show();
            $('#branch_list_term4').show();
            $('#unit_list_label_term3').show();
            //$('#branch_list_term4').show();
            $('#branch_list_label_term4').show();
            $('#promote_all_btn_term4').hide();

            //adding options to select


        } else if (term == "Term-IV") {
            $('#promote_button').hide();
            $('#promote_btn_midshipman').hide();
            $('#promote_all_btn_term4').show();
            $('#branch_list_term4').show();
            $('#unit_list_term3').show();
            $('#ship_list_term3').hide();
            $('#unit_list_label_term3').show();
            $('#branch_list_label_term4').show();
            $('#promote_all_btn_term3').hide();
            // } else if (term == "Term-V") {
            //     $('#promote_button').hide();
            //     $('#promote_btn_midshipman').hide();
            //     // $('#promote_all_btn_term4').show();
            //     $('#branch_list_term4').show();
            //     $('#unit_list_term3').show();
            //     $('#ship_list_term3').hide();
            //     $('#unit_list_label_term3').show();
            //     $('#branch_list_label_term4').show();
            //     $('#promote_all_btn_term3').hide();
            // } else {
            //     $('#promote_button').show();
            //     $('#promote_all_btn_term3').hide();
            //     $('#promote_all_btn_term4').hide();
            //     $('#unit_list_term3').hide();
            //     $('#unit_list_label_term3').hide();
            //     $('#ship_list_term3').hide();
            //     $('#ship_list_label_term3').hide();
            //     $('#branch_list_term4').hide();
            //     $('#branch_list_label_term4').hide();
        }
    });

    $("#show_semester_list").on('change', function() {
        var term = $('#term_list').val();
        var branch = $('#select_branches').val();
        var semester = $(this).val();
        $.ajax({
            url: '<?= base_url(); ?>DEAN/search_all_cadets_by_term',
            method: 'POST',
            data: {
                'term': term,
                'branch_id': branch,
                'semester': semester
            },
            success: function(data) {
                $('#search_cadet').hide();
                $('#no_data').hide();
                $('#show_all_cadets').show();
                $('#promote_button').show();
                $("#list_of_cadets").empty();
                $("#cadets_oc_no").empty();
                $('#cadets_semester').empty();

                var result = jQuery.parseJSON(data);
                var len = result.length;

                if (len > 0) {
                    $('#term_selected').html(`<strong>List of Cadets of ${term}:</strong>`);
                    $("#list_of_cadets").html(`<h6 style="text-decoration:underline;margin-bottom:10px;"><strong>Cadet Names</strong></h6>`);
                    $("#cadets_oc_no").append(`<h6 style="text-decoration:underline;margin-bottom:10px;"><strong>OC No</strong></h6>`);
                    $("#cadets_semester").append(`<h6 style="text-decoration:underline;margin-bottom:10px;"><strong>Semester</strong></h6>`);
                    $('#promote_all_btn').show();
                    for (var i = 0; i < len; i++) {
                        $("#list_of_cadets").append(`<h6 style="margin-bottom:20px;"><strong>${i+1}  -  ${result[i]['name']}</strong></h6>`);
                        $("#cadets_oc_no").append(`<h6 style="margin-bottom:20px;"><strong>${result[i]['oc_no']} </strong></h6>`);
                        $("#cadets_semester").append(`<h6 style="margin-bottom:20px;"><strong>${result[i]['term']} </strong></h6>`);
                    }
                } else {
                    $('#term_selected').html(`<strong>No Cadets in ${term}</strong>`);
                    $('#promote_all_btn_term3').hide();
                    $('#promote_all_btn_term4').hide();
                    $('#branch_list_term4').hide();
                    $('#unit_list_term3').hide();
                    $('#unit_list_label_term3').hide();
                    $('#ship_list_term3').hide();
                    $('#ship_list_label_term3').hide();
                }
            },
            async: false
        });

    });
</script>