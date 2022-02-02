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
            <h1 style="text-align:center"><strong>DAILY MODULE</strong></h1>
        </div>
    </div>

    <div class="card-body bg-custom3">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header bg-custom1">
                        <h1 class="h4">Select Activity</h1>
                    </div>

                    <form class="user" role="form" method="post" id="add_form">
                        <div class="card-body bg-custom3">
                            <div class="form-group row">
                                <!-- <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary btn-user btn-block" style="height:60px;  box-shadow: 5px 10px #888888;" id="btn_inventory" onclick="location.href='<?php echo base_url(); ?>HOUGP/add_punishment'">
                                        <span><i class="fas fa-radiation-alt" style="font-size:25px;margin:5px"></i></span>
                                        <h4 style="font-weight: bold;display:inline-block">Add Punishment</h4>
                                    </button>
                                </div> -->
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-primary btn-user btn-block" style="height:60px;  box-shadow: 5px 10px #888888;" id="btn_inventory" onclick="location.href='<?php echo base_url(); ?>HOUGP/view_punishment_list'">
                                        <span><i class="fas fa-exclamation-triangle" style="font-size:25px;margin:5px"></i></span>
                                        <h4 style="font-weight: bold;display:inline-block">View Punishment List</h4>
                                    </button>
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary btn-user btn-block" style="height:60px;  box-shadow: 5px 10px #888888;" id="btn_inventory" onclick="location.href='<?php echo base_url(); ?>HOUGP/add_excuse'">
                                        <span><i class="fas fa-hand-paper" style="font-size:25px;margin:5px"></i></span>
                                        <h4 style="font-weight: bold; display:inline-block">Add Excuse</h4>
                                    </button>
                                </div> -->
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-primary btn-user btn-block" style="height:60px;  box-shadow: 5px 10px #888888;" id="btn_inventory" onclick="location.href='<?php echo base_url(); ?>HOUGP/view_excuse_list'">
                                    <span><i class="fas fa-stopwatch" style="font-size:25px;margin:5px"></i></span>
                                        <h4 style="font-weight: bold;display:inline-block">View Excuse List</h4>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary btn-user btn-block" style="height:60px;  box-shadow: 5px 10px #888888;" id="btn_inventory" onclick="location.href='<?php echo base_url(); ?>HOUGP/add_observation'">
                                        <!-- <span><i class="fas fa-hand-paper" style="font-size:25px;margin:5px"></i></span> -->
                                        <span><i class="far fa-address-card" style="font-size:25px;margin:5px"></i></span>
                                        <h4 style="font-weight: bold; display:inline-block">Add Observation</h4>
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary btn-user btn-block" style="height:60px;  box-shadow: 5px 10px #888888;" id="btn_inventory" onclick="location.href='<?php echo base_url(); ?>HOUGP/view_observation_list'">
                                    <span><i class="far fa-lightbulb" style="font-size:25px;margin:5px"></i></span>
                                        <h4 style="font-weight: bold;display:inline-block">View Observation List</h4>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary btn-user btn-block" style="height:60px;  box-shadow: 5px 10px #888888;" id="btn_inventory" onclick="location.href='<?php echo base_url(); ?>HOUGP/add_physical_milestone/milestone_list'">
                                        <span><i class="fas fa-running" style="font-size:25px;margin:5px"></i></span>
                                        <h4 style="font-weight: bold; display:inline-block">Add Physical Milestone</h4>
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary btn-user btn-block" style="height:60px;  box-shadow: 5px 10px #888888;" id="btn_inventory" onclick="location.href='<?php echo base_url(); ?>HOUGP/view_milestone_list'">
                                    <span><i class="fas fa-heartbeat" style="font-size:25px;margin:5px"></i></span>
                                        <h4 style="font-weight: bold;display:inline-block">View Physical Milestones List</h4>
                                    </button>
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
                url: '<?= base_url(); ?>HOUGP/search_cadet',
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
                        $('#division').val(result['divison_name']);
                        $('#oc_num').val(result['oc_no']);
                        $('#club').val(result['club']);
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


    $('#save_btn').on('click', function() {
        // $('#save_btn').attr('disabled', true);
        var validate = 0;
        var club = $('#club').val();

        if (club == '') {
            validate = 1;
            $('#club').addClass('red-border');
        }

        if (validate == 0) {
            $('#save_form')[0].submit();
            $('#show_error_save').hide();

        } else {
            $('#add_btn').removeAttr('disabled');
            $('#show_error_save').show();
        }
    });
</script>