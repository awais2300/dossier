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
        <div class="card-body" style="margin-bottom:20px;float:right; padding:20px; margin-right:300px">
            <h1 style="text-align:center"><strong>JUNIOR OFFICERS' PERSONAL FOLDER</strong></h1>
            <h5 style="text-align: center;"><a>View General Instructions</a></h5>
        </div>
    </div>

    <div class="card-body bg-custom3">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header bg-custom1">
                        <h1 class="h4">PN Form I</h1>
                    </div>

                    <div class="card-body bg-custom3">
                        <form class="user" role="form" method="post" id="add_form" action="<?= base_url(); ?>HOUGP/add_PN_Form">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <h6>&nbsp;OC NO:</h6>
                                </div>

                                <div class="col-sm-6">
                                    <h6>&nbsp;P.NO:</h6>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-1">
                                    <input type="text" class="form-control form-control-user" name="oc_no" id="oc_no" placeholder="OC No.">
                                    <span id="show_project_name_error" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please enter project name & code first</span>
                                </div>

                                <div class="col-sm-6 mb-1">
                                    <input type="text" class="form-control form-control-user" name="pno" id="pno" placeholder="P. NO.">
                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <h6>&nbsp;Name:</h6>
                                </div>
                                <div class="col-sm-6">
                                    <h6>&nbsp;Class:</h6>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-1">
                                    <input type="text" class="form-control form-control-user" name="name" id="name" placeholder="Name">
                                </div>
                                <div class="col-sm-6 mb-1">
                                    <input type="text" class="form-control form-control-user" name="class" id="class" placeholder="class">
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
                                    <input type="text" class="form-control form-control-user" name="batch_no" id="batch_no" placeholder="Batch No">
                                </div>

                                <div class="col-sm-6 mb-1">
                                    <select class="form-control rounded-pill" name="category" id="category" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Category</option>
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
                                        <!-- <option class="form-control form-control-user" value="">Select Division</option> -->
                                        <?php foreach ($divisions as $data) { ?>
                                            <option class="form-control form-control-user" value="<?= $data['division_name'] ?>"><?= $data['division_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-1">
                                    <select class="form-control rounded-pill" name="term" id="term" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Term</option>
                                        <option class="form-control form-control-user" value="Term-I">Term-I</option>
                                        <option class="form-control form-control-user" value="Term-II">Term-II</option>
                                        <option class="form-control form-control-user" value="Term-III">Term-III</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="add_btn">
                                        <!-- <i class="fab fa-google fa-fw"></i>  -->
                                        Submit
                                    </button>
                                    <span id="show_error_new" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please check errors*</span>
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

        var oc_no = $('#oc_no').val();
        var pno = $('#pno').val();
        var name = $('#name').val();
        var class_ = $('#class').val();
        var batch_no = $('#batch_no').val();
        var category = $('#category').val();
        var div_name = $('#div').val();
        var term = $('#term').val();

        if (oc_no == '') {
            validate = 1;
            $('#oc_no').addClass('red-border');
        }
        if (pno == '') {
            validate = 1;
            $('#pno').addClass('red-border');
        }
        if (name == '') {
            validate = 1;
            $('#name').addClass('red-border');
        }
        if (class_ == '') {
            validate = 1;
            $('#class').addClass('red-border');
        }

        if (batch_no == '') {
            validate = 1;
            $('#batch_no').addClass('red-border');
        }
        if (category == '') {
            validate = 1;
            $('#category').addClass('red-border');
        }
        if (div_name == '') {
            validate = 1;
            $('#div_name').addClass('red-border');
        }
        if (term == '') {
            validate = 1;
            $('#term').addClass('red-border');
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