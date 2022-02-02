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
            <h1 style="text-align:center; padding:40px"><strong>ADD RECORDS OF SENIORITY</strong></h1>
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
                        <h1 class="h4">Add Records of Seniority</h1>
                    </div>

                    <div class="card-body bg-custom3">
                        <form class="user" role="form" method="post" enctype="multipart/form-data" id="save_form" action="<?= base_url(); ?>SMO/save_cadet_seniority_record">
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <h6>&nbsp;Name:</h6>
                                </div>

                                <div class="col-sm-4">
                                    <h6>&nbsp;Current Term:</h6>
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
                            <hr>

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <h6>&nbsp;<strong>Term:</strong></h6>
                                </div>
                                <div class="col-sm-2">
                                    <h6>&nbsp;<strong>Marks Obtained:</strong></h6>
                                </div>
                                <div class="col-sm-2">
                                    <h6>&nbsp;<strong>Aggregate Percentage:</strong></h6>
                                </div>
                                <div class="col-sm-2">
                                    <h6>&nbsp;<strong>Relegated:</strong></h6>
                                </div>
                                <div class="col-sm-2">
                                    <h6>&nbsp;<strong>No. of Subjects Failed:</strong></h6>
                                </div>
                                <div class="col-sm-2">
                                    <h6>&nbsp;<strong>Seniority Gained/Lost:</strong></h6>
                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-user" name="term_row_t1" id="term_row_t1" placeholder="Term" value="Term-I" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-user" name="marks_t1" id="marks_t1" placeholder="Enter Marks">
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-user" name="aggregate_t1" id="aggregate_t1" placeholder="Enter Aggregate">
                                </div>
                                <div class="col-sm-2">
                                    <select class="form-control rounded-pill" name="relegate_t1" id="relegate_t1" data-placeholder="Warning Type" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="" selected>Select</option>
                                        <option class="form-control form-control-user" value="yes">Yes</option>
                                        <option class="form-control form-control-user" value="no">No</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-user" name="failed_subjects_t1" id="failed_subjects_t1" placeholder="No. of failed subjects">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-user" name="seniority_gain_loss_t1" id="seniority_gain_loss_t1" placeholder="Seniority Gained/Lost">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-user" name="term_row_t2" id="term_row_t2" placeholder="Term" value="Term-II" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-user" name="marks_t2" id="marks_t2" placeholder="Enter Marks">
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-user" name="aggregate_t2" id="aggregate_t2" placeholder="Enter Aggregate">
                                </div>
                                <div class="col-sm-2">
                                    <select class="form-control rounded-pill" name="relegate_t2" id="relegate_t2" data-placeholder="Warning Type" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="" selected>Select</option>
                                        <option class="form-control form-control-user" value="yes">Yes</option>
                                        <option class="form-control form-control-user" value="no">No</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control form-control-user" name="failed_subjects_t2" id="failed_subjects_t2" placeholder="No. of failed subjects">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-user" name="seniority_gain_loss_t2" id="seniority_gain_loss_t2" placeholder="Seniority Gained/Lost">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2 mb-1">
                                    <input type="text" class="form-control form-control-user" name="term_row_t3" id="term_row_t3" placeholder="Term" value="Term-III" readonly>
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <input type="number" class="form-control form-control-user" name="marks_t3" id="marks_t3" placeholder="Enter Marks">
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <input type="number" class="form-control form-control-user" name="aggregate_t3" id="aggregate_t3" placeholder="Enter Aggregate">
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <select class="form-control rounded-pill" name="relegate_t3" id="relegate_t3" data-placeholder="Warning Type" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="" selected>Select</option>
                                        <option class="form-control form-control-user" value="yes">Yes</option>
                                        <option class="form-control form-control-user" value="no">No</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <input type="number" class="form-control form-control-user" name="failed_subjects_t3" id="failed_subjects_t3" placeholder="No. of failed subjects">
                                </div>
                                <div class="col-sm-2 mb-1">
                                    <input type="text" class="form-control form-control-user" name="seniority_gain_loss_t3" id="seniority_gain_loss_t3" placeholder="Seniority Gained/Lost">
                                </div>
                            </div>

                            <hr>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <h6>&nbsp;NET PERCENTAGE AT PNA:</h6>
                                </div>
                                <div class="col-sm-3">
                                    <h6>&nbsp;SENIORITY GAINED (days):</h6>
                                </div>
                                <div class="col-sm-3">
                                    <h6>&nbsp;SENIORITY LOST (days):</h6>
                                </div>
                                <div class="col-sm-3">
                                    <h6>&nbsp;NET SENIORITY (days):</h6>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3 mb-1">
                                    <input type="number" class="form-control form-control-user" name="net_percentage" id="net_percentage" placeholder="Net Percentage">
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <input type="number" class="form-control form-control-user" name="seniority_gained" id="seniority_gained" placeholder="Seniority Gained">
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <input type="number" class="form-control form-control-user" name="seniority_lost" id="seniority_lost" placeholder="Seniority Lost">
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <input type="number" class="form-control form-control-user" name="net_seniority" id="net_seniority" placeholder="Net Seniority">
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

        if (oc_no == '') {
            validate = 1;
            $('#oc_no').addClass('red-border');
        }

        if (validate == 0) {
            // $('#add_form')[0].submit();
            $('#show_error_new').hide();

            $.ajax({
                url: '<?= base_url(); ?>SMO/search_cadet',
                method: 'POST',
                data: {
                    'oc_no': oc_no
                },
                success: function(data) {
                    var result = jQuery.parseJSON(data);

                    if (result != undefined) {
                        $('#search_cadet').show();
                        $('#no_data').hide();

                        $('#name').val(result['name']);
                        $('#term').val(result['term']);
                        // $('#term_row').val(result['term']);
                        $('#division').val(result['divison_name']);
                        $('#oc_num').val(result['oc_no']);
                        $('#id').val(result['p_id']);
                    } else {
                        $('#no_data').show();
                        $('#search_cadet').hide();

                    }

                },
                async: false
            });

            if ($('#name').val() != null) {
                $.ajax({
                    url: '<?= base_url(); ?>SMO/get_seniority_values',
                    method: 'POST',
                    data: {
                        'p_id': $('#id').val()
                    },
                    success: function(data) {
                        var result = jQuery.parseJSON(data);

                        if (result != undefined) {

                            if (result['term1_marks'] == 0) {
                                result['term1_marks'] = null
                            }
                            if (result['term1_percentage'] == 0) {
                                result['term1_percentage'] = null
                            }
                            if (result['term1_seniority'] == 0) {
                                result['term1_seniority'] = null
                            }
                            if (result['term2_marks'] == 0) {
                                result['term2_marks'] = null
                            }
                            if (result['term2_percentage'] == 0) {
                                result['term2_percentage'] = null
                            }
                            if (result['term2_seniority'] == 0) {
                                result['term2_seniority'] = null
                            }
                            if (result['term3_marks'] == 0) {
                                result['term3_marks'] = null
                            }
                            if (result['term3_percentage'] == 0) {
                                result['term3_percentage'] = null
                            }
                            if (result['term3_seniority'] == 0) {
                                result['term3_seniority'] = null
                            }
                            if (result['net_percentage'] == 0) {
                                result['net_percentage'] = null
                            }
                            if (result['seniority_gained'] == 0) {
                                result['seniority_gained'] = null
                            }
                            if (result['seniority_lost'] == 0) {
                                result['seniority_lost'] = null
                            }
                            if (result['net_seniority'] == 0) {
                                result['net_seniority'] = null
                            }

                            $('#marks_t1').val(result['term1_marks']);
                            $('#aggregate_t1').val(result['term1_percentage']);
                            $('#relegate_t1').val(result['term1_relegated']);
                            $('#failed_subjects_t1').val(result['term1_subjects_failed']);
                            $('#seniority_gain_loss_t1').val(result['term1_seniority']);

                            $('#marks_t2').val(result['term2_marks']);
                            $('#aggregate_t2').val(result['term2_percentage']);
                            $('#relegate_t2').val(result['term2_relegated']);
                            $('#failed_subjects_t2').val(result['term2_subjects_failed']);
                            $('#seniority_gain_loss_t2').val(result['term2_seniority']);

                            $('#marks_t3').val(result['term3_marks']);
                            $('#aggregate_t3').val(result['term3_percentage']);
                            $('#relegate_t3').val(result['term3_relegated']);
                            $('#failed_subjects_t3').val(result['term3_subjects_failed']);
                            $('#seniority_gain_loss_t3').val(result['term3_seniority']);

                            $('#net_percentage').val(result['net_percentage']);
                            $('#seniority_gained').val(result['seniority_gained']);
                            $('#seniority_lost').val(result['seniority_lost']);
                            $('#net_seniority').val(result['net_seniority']);   
                        }
                    },
                    async: false
                });
            }
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

        var marks_t1 = $('#marks_t1').val();
        var aggregate_t1 = $('#aggregate_t1').val();
        var relegate_t1 = $('#relegate_t1').val();
        var failed_subjects_t1 = $('#failed_subjects_t1').val();
        var seniority_gain_loss_t1 = $('#seniority_gain_loss_t1').val();
        var marks_t2 = $('#marks_t2').val();
        var aggregate_t2 = $('#aggregate_t2').val();
        var relegate_t2 = $('#relegate_t2').val();
        var failed_subjects_t2 = $('#failed_subjects_t2').val();
        var seniority_gain_loss_t2 = $('#seniority_gain_loss_t2').val();
        var marks_t3 = $('#marks_t3').val();
        var aggregate_t3 = $('#aggregate_t3').val();
        var relegate_t3 = $('#relegate_t3').val();
        var failed_subjects_t3 = $('#failed_subjects_t3').val();
        var seniority_gain_loss_t3 = $('#seniority_gain_loss_t3').val();
        var net_percentage = $('#net_percentage').val();
        var seniority_gained = $('#seniority_gained').val();
        var seniority_lost = $('#seniority_lost').val();
        var net_seniority = $('#net_seniority').val();
        var current_term = $('#term').val();

        if (current_term == 'Term-I') {
            if (marks_t1 == '') {
                validate = 1;
                $('#marks_t1').addClass('red-border');
            }
            if (aggregate_t1 == '') {
                validate = 1;
                $('#aggregate_t1').addClass('red-border');
            }
            if (relegate_t1 == '') {
                validate = 1;
                $('#relegate_t1').addClass('red-border');
            }
            if (failed_subjects_t1 == '') {
                validate = 1;
                $('#failed_subjects_t1').addClass('red-border');
            }
            if (seniority_gain_loss_t1 == '') {
                validate = 1;
                $('#seniority_gain_loss_t1').addClass('red-border');
            }
        } else if (current_term == 'Term-II') {
            if (marks_t2 == '') {
                validate = 1;
                $('#marks_t2').addClass('red-border');
            }
            if (aggregate_t2 == '') {
                validate = 1;
                $('#aggregate_t2').addClass('red-border');
            }
            if (relegate_t2 == '') {
                validate = 1;
                $('#relegate_t2').addClass('red-border');
            }
            if (failed_subjects_t2 == '') {
                validate = 1;
                $('#failed_subjects_t2').addClass('red-border');
            }
            if (seniority_gain_loss_t2 == '') {
                validate = 1;
                $('#seniority_gain_loss_t2').addClass('red-border');
            }
        } else if (current_term == 'Term-III') {
            if (marks_t3 == '') {
                validate = 1;
                $('#marks_t3').addClass('red-border');
            }
            if (aggregate_t3 == '') {
                validate = 1;
                $('#aggregate_t3').addClass('red-border');
            }
            if (relegate_t3 == '') {
                validate = 1;
                $('#relegate_t3').addClass('red-border');
            }
            if (failed_subjects_t3 == '') {
                validate = 1;
                $('#failed_subjects_t3').addClass('red-border');
            }
            if (seniority_gain_loss_t3 == '') {
                validate = 1;
                $('#seniority_gain_loss_t3').addClass('red-border');
            }
        }
        if (net_percentage == '') {
            validate = 1;
            $('#net_percentage').addClass('red-border');
        }
        if (seniority_gained == '') {
            validate = 1;
            $('#seniority_gained').addClass('red-border');
        }
        if (seniority_lost == '') {
            validate = 1;
            $('#seniority_lost').addClass('red-border');
        }
        if (net_seniority == '') {
            validate = 1;
            $('#net_seniority').addClass('red-border');
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