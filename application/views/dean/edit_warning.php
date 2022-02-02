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
            <h1 style="text-align:center; padding:40px"><strong>EDIT WARNING</strong></h1>
        </div>

    </div>

    <div class="card-body bg-custom3">
        <!-- Nested Row within Card Body -->
   <!--      <div class="row">
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
 -->                                        <!-- <i class="fab fa-google fa-fw"></i>   -->
        <!--                                 Search
                                    </button>
                                    <span id="show_error_new" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please check errors*</span>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
 -->
        <div id="search_cadet" class="row my-2" style="display:block">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header bg-custom1">
                        <h1 class="h4">Issue Warning Letter</h1>
                    </div>

                    <div class="card-body bg-custom3">
                        <form class="user" role="form" method="post" enctype="multipart/form-data" id="save_form" action="<?= base_url(); ?>DEAN/update_cadet_warning/<?php echo "dossier_folder" ?>">
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
                                    <input type="text" class="" name="oc_num" value="<?= $warning_records['oc_no']?>" id="oc_num">
                                </div>
                                <div class="col-sm-4 mb-1" style="display:none">
                                    <input type="text" class="" value="<?= $warning_records['p_id']?>" name="id" id="id">
                                </div>

                                <div class="col-sm-4 mb-1">
                                    <input type="text" class="form-control form-control-user" value="<?= $warning_records['name']?>" name="name" id="name" style="font-weight: bold; font-size:large" placeholder="Name" readonly>
                                </div>
                                <div class="col-sm-4 mb-1">
                                    <input type="text" class="form-control form-control-user" name="term" value="<?= $warning_records['term']?>" id="term" style="font-weight: bold; font-size:large" placeholder="Term" readonly>
                                </div>
                                <div class="col-sm-4 mb-1">
                                    <input type="text" class="form-control form-control-user" value="<?= $warning_records['divison_name']?>" name="division" id="division" style="font-weight: bold; font-size:large" placeholder="Division" readonly>
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
                                    <input type="date" class="form-control form-control-user" value="<?= $warning_records['date']?>" name="date" id="date">
                                </div>
                                <div class="col-sm-4 mb-1">
                                    <input type="text" class="form-control form-control-user" value="<?= $warning_records['issued_by']?>" name="issued_by" id="issued_by" placeholder="Issue by">
                                    <span id="error_end_date" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;End Date cannot be less than start date</span>
                                </div>
                                <div class="col-sm-4 mb-1">
                                    <select class="form-control rounded-pill" name="warning_type" value="<?= $warning_records['type']?>" id="warning_type" data-placeholder="Warning Type" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Warning Type</option>
                                        <option <?php echo ($warning_records['type']=="red"? 'selected':'') ?> class="form-control form-control-user" value="red">Red</option>
                                        <option <?php echo ($warning_records['type']=="orange"? 'selected':'') ?> class="form-control form-control-user" value="orange">Orange</option>
                                        <option <?php echo ($warning_records['type']=="yellow"? 'selected':'') ?> class="form-control form-control-user" value="yellow">Yellow</option>
                                        <option <?php echo ($warning_records['type']=="white"? 'selected':'') ?> class="form-control form-control-user" value="white">White</option>
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
                                    <textarea class="form-control form-control-user" name="reason" id="reason" style="border-radius:10px" placeholder="Add warning reasons"><?= $warning_records['reasons']?></textarea>
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
                                    <a style="margin-left: 6px;color: black"href="<?= base_url()?>uploads/warning/<?= $warning_records['file']; ?>" style="color:black;"><?= $warning_records['file']?></a>
                                </div>
                                <input type="hidden" name="old_file" value="<?= $warning_records['file']; ?>">
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
</script>