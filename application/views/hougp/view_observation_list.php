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
</style>

<div class="container-fluid my-2">
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
                                        <form class="user" role="form" method="post" id="save_form_observation" action="<?= base_url(); ?>HOUGP/update_cadet_observation">
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

                                                <input type="hidden" class="form-control form-control-user" name="page" id="page" val="">

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
    <!-- Page Heading -->
    <div class="card-body" style="padding:10px">
        <div class="row my-2">
            <img src='<?= base_url() ?>assets/img/navy_logo-new.png' style="height: 130px; width:100px;">
            <div class="card-body">
                <h1 style="text-align:center"><strong>OBSERVATION LIST</strong></h1>
            </div>
        </div>
    </div>

    <div class="card-body bg-custom3">
        <!-- Nested Row within Card Body -->

        <!-- <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header bg-custom1">
                        <h1 class="h4">Search Punishment by Date</h1>
                    </div>

                    <div class="card-body bg-custom3">
                        <form class="user" role="form" method="post" id="add_form" action="">
                            <div class="form-group row">
                                <div class="col-sm-2" style="margin-top:15px">
                                    <h6>&nbsp;Enter Date:</h6>
                                </div>

                                <div class="col-sm-3 mb-1">
                                    <input type="date" class="form-control form-control-user" name="search_date" id="search_date" placeholder="Select Date" value="<?= $search_date; ?>">
                                    <span id="error_search" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please select date</span>
                                </div>

                                <div class="col-sm-2 mb-1">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="search_btn">
                                        Search
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div> -->

        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header bg-custom1">
                        <h1 class="h4">Observation List</h1>
                    </div>

                    <div class="card-body">
                        <div id="table_div">
                            <?php if (count($observation_records) > 0) { ?>
                                <table id="datatable" class="table table-striped" style="color:black">
                                    <thead>
                                        <tr>
                                            <th scope="col">S. No.</th>
                                            <th scope="col">Cadet Name</th>
                                            <th scope="col">Term</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Observation</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_rows">
                                        <?php $count = 0;
                                        foreach ($observation_records as $data) { ?>
                                            <tr>
                                                <td scope="row"><?= ++$count; ?></td>
                                                <td scope="row"><?= $data['name']; ?></td>
                                                <td scope="row"><?= $data['term']; ?></td>
                                                <td scope="row"><?= $data['date']; ?></td>
                                                <td scope="row"><?= $data['observation']; ?></td>
                                                <?php if ($data['status'] == 'Pending') { ?>
                                                    <td scope="row" style="color:orange;font-weight:bold"><?= $data['status']; ?></td>
                                                <?php } elseif ($data['status'] == 'Approved') { ?>
                                                    <td scope="row" style="color:green;font-weight:bold"><?= $data['status']; ?></td>
                                                <?php } elseif ($data['status'] == 'Rejected') { ?>
                                                    <td scope="row" style="color:red;font-weight:bold"><?= $data['status']; ?></td>
                                                <?php } elseif ($data['status'] == 'Progress') { ?>
                                                    <td scope="row" style="color:chocolate;font-weight:bold"><?= $data['status']; ?></td>
                                                <?php } else { ?>
                                                    <td></td>
                                                <?php } ?>
                                                <td type="button" id="edit<?= $data['id']; ?>" class="edit" scope="row" data-toggle="modal" data-target="#edit_observation" onclick="edit_observation(<?= $data['id'] ?>)"><i style="" class="fas fa-edit"></i></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php } else { ?>
                                <a> No Data found </a>
                            <?php } ?>
                        </div>
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

    function edit_observation(id) {
        // alert('cadet id: ' + id);
        $.ajax({
            url: '<?= base_url(); ?>HOUGP/edit_observation_data',
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
                $('#page').val('daily_module');

            },
            async: true
        });
    }
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
</script>