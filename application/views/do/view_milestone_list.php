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
<?php !isset($search_date) ? $search_date = '' : $search_date; ?>
<style>
    .red-border {
        border: 1px solid red !important;
    }
</style>

<div class="container-fluid my-2">

    <div class="modal fade" id="view_details">
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
                                    <h1 class="h4">Physical Milestone Details</h1>
                                </div>

                                <div class="card-body bg-custom3">
                                    <form class="user" role="form" method="post" id="add_form" action="">
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
                                                <h5 style="text-align:center">&nbsp;<strong>Attempt</strong></h5>
                                            </div>
                                            <div class="col-sm-2">
                                                <h5>&nbsp;<strong>Show Details</strong></h5>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>PST:</strong></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="pst_result"></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="pst_attempt" style="text-align:center"></h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>SST:</strong></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="sst_result"></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="sst_attempt" style="text-align:center"> h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>PET-I:</strong></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="pet1_result"></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="pet1_attempt" style="text-align:center"></h6>
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
                                                <h6 id="pet2_result"></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="pet2_attempt" style="text-align:center"></h6>
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
                                                <h6 id="assault_result"></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="assault_attempt" style="text-align:center"></h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>Saluting:</strong></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="saluting_result"></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="saluting_attempt" style="text-align:center"></h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>PLX:</strong></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="plx_result"></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="plx_attempt" style="text-align:center"></h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>Long Cross Country:</strong></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="long_cross_result"></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="long_cross_card" style="text-align:center"></h6>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;<strong>Mini Cross Country:</strong></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="mini_cross_result"></h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6 id="mini_cross_card" style="text-align:center"></h6>
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




    <!-- Page Heading -->
    <div class="card-body" style="padding:10px">
        <div class="row my-2">
            <img src='<?= base_url() ?>assets/img/navy_logo-new.png' style="height: 130px; width:100px;">
            <div class="card-body">
                <h1 style="text-align:center"><strong>VIEW PHYSICAL MILESTONE LIST</strong></h1>
            </div>
        </div>
    </div>



    <div class="card-body bg-custom3">
        <!-- Nested Row within Card Body -->



        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header bg-custom1">
                        <h1 class="h4">Physical Milestone List</h1>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                        <a onclick="location.href='<?php echo base_url(); ?>D_O/add_physical_milestone/milestone_list'" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="float:right;margin-right:4px" data-toggle="modal" data-target="#all_projects"><i class="fas fa-plus-circle fa-sm text-white-60"></i> Add New Record </a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div id="table_div">
                            <?php if (isset($milestone_records)) { ?>
                                <table id="datatable" class="table table-striped" style="color:black; width:auto !important;table-layout:auto !important;">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Term</th>
                                            <th scope="col">Actions</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_rows">
                                        <?php $count = 0;
                                        foreach ($milestone_records as $data) { ?>
                                            <tr>
                                                <td scope="row" style="padding:20px"><?= ++$count; ?></td>
                                                <td scope="row" style="padding:20px; display:none"><?= $data['p_id']; ?></td>
                                                <td scope="row" style="padding:20px"><?= $data['name']; ?></td>
                                                <td scope="row" style="padding:20px"><?= $data['term']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['PST_result']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['PST_attempt']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['SST_result']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['SST_attempt']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['PET_I_result']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['PET_I_attempt']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['PET_II_result']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['PET_II_attempt']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['assault_result']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['assault_attempt']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['saluting_result']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['saluting_attempt']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['PLX_result']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['PLX_attempt']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['long_cross_result']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['long_cross_card_number']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['mini_cross_result']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['mini_cross_card_number']; ?></td>
                                                <td scope="row"><button type="button" class="btn btn-primary btn-user rounded-pill" data-toggle="modal" data-target="#view_details"> View Details</button></td>
                                                <td type="button" class="edit" scope="row"><a style="color: black" href="<?= base_url(); ?>D_O/add_physical_milestone/<?php echo "view_dossier_folder" ?>"><i style="" class="fas fa-edit"></i></a></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            <?php } else { ?>
                                <a> No Data Available yet </a>
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


    $('#add_btn').on('click', function() {
        var validate = 0;
        var oc_no = $('#oc_no').val();

        if (oc_no == '') {
            validate = 1;
            $('#oc_no').addClass('red-border');
        }

        alert(oc_no);
        if (validate == 0) {
            // $('#add_form')[0].submit();
            $('#show_error_new').hide();

            $.ajax({
                url: '<?= base_url(); ?>D_O/search_cadet',
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
        var $columns = $(this).find('td');

        $('#cadet_name_heading').html('<strong> Cadet Name: ' + $columns[2].innerHTML + '</strong>');

        if ($columns[4].innerHTML == 'qualified') {
            $('#pst_result').html('<span style="color:green">Qualified</span>');
        } else if ($columns[4].innerHTML == 'disqualified') {
            $('#pst_result').html('<span style="color:red">Disqualified</span>');
        }
        $('#pst_attempt').html($columns[5].innerHTML);

        if ($columns[6].innerHTML == 'qualified') {
            $('#sst_result').html('<span style="color:green">Qualified</span>');
        } else if ($columns[6].innerHTML == 'disqualified') {
            $('#sst_result').html('<span style="color:red">Disqualified</span>');
        }
        $('#sst_attempt').html($columns[7].innerHTML);


        if ($columns[8].innerHTML == 'qualified') {
            $('#pet1_result').html('<span style="color:green">Qualified</span>');
        } else if ($columns[8].innerHTML == 'disqualified') {
            $('#pet1_result').html('<span style="color:red">Disqualified</span>');
        }
        $('#pet1_attempt').html($columns[9].innerHTML);


        if ($columns[10].innerHTML == 'qualified') {
            $('#pet2_result').html('<span style="color:green">Qualified</span>');
        } else if ($columns[10].innerHTML == 'disqualified') {
            $('#pet2_result').html('<span style="color:red">Disqualified</span>');
        }
        $('#pet2_attempt').html($columns[11].innerHTML);


        if ($columns[12].innerHTML == 'qualified') {
            $('#assault_result').html('<span style="color:green">Qualified</span>');
        } else if ($columns[12].innerHTML == 'disqualified') {
            $('#assault_result').html('<span style="color:red">Disqualified</span>');
        }
        $('#assault_attempt').html($columns[13].innerHTML);


        if ($columns[14].innerHTML == 'qualified') {
            $('#saluting_result').html('<span style="color:green">Qualified</span>');
        } else if ($columns[14].innerHTML == 'disqualified') {
            $('#saluting_result').html('<span style="color:red">Disqualified</span>');
        }
        $('#saluting_attempt').html($columns[15].innerHTML);


        if ($columns[16].innerHTML == 'qualified') {
            $('#plx_result').html('<span style="color:green">Qualified</span>');
        } else if ($columns[16].innerHTML == 'disqualified') {
            $('#plx_result').html('<span style="color:red">Disqualified</span>');
        }
        $('#plx_attempt').html($columns[17].innerHTML);

        if ($columns[18].innerHTML == 'qualified') {
            $('#long_cross_result').html('<span style="color:green">Qualified</span>');
        } else if ($columns[18].innerHTML == 'disqualified') {
            $('#long_cross_result').html('<span style="color:red">Disqualified</span>');
        }
        $('#long_cross_card').html($columns[19].innerHTML);

        if ($columns[20].innerHTML == 'qualified') {
            $('#mini_cross_result').html('<span style="color:green">Qualified</span>');
        } else if ($columns[20].innerHTML == 'disqualified') {
            $('#mini_cross_result').html('<span style="color:red">Disqualified</span>');
        }
        $('#mini_cross_card').html($columns[21].innerHTML);

        //alert( $columns[1].innerHTML);
        $.ajax({
            url: '<?= base_url(); ?>D_O/view_PET_I',
            method: 'POST',
            data: {
                'id': $columns[1].innerHTML
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
            url: '<?= base_url(); ?>D_O/view_PET_II',
            method: 'POST',
            data: {
                'id': $columns[1].innerHTML
            },
            success: function(data) {
                var result = jQuery.parseJSON(data);
                var len = result.length;

                $('#mile_time2_detail').html(result['mile_time']);
                $('#pushup2_detail').html(result['pushups']);
                $('#chinups2_detail').html(result['chinups']);
                $('#rope2_detail').html(result['rope']);


                // }
            },
            async: false
        });

    });

    $('#search_btn').on('click', function() {
        // $('#add_btn').attr('disabled', true);
        var validate = 0;
        var search_date = $('#search_date').val();

        if (search_date == '') {
            validate = 1;
            $('#search_date').addClass('red-border');
        }

        if (validate == 0) {
            $('#error_search').hide();

            $.ajax({
                url: '<?= base_url(); ?>D_O/search_punish_by_date',
                method: 'POST',
                data: {
                    'search_date': search_date
                },
                success: function(data) {
                    var newDoc = document.open("text/html", "replace");
                    newDoc.write(data);
                    newDoc.close();
                },
                async: true
            });

        } else {
            $('#error_search').show();
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

    function view_PET_I(id) {
        // alert('cadet id: ' + id);
        $.ajax({
            url: '<?= base_url(); ?>D_O/view_PET_I',
            method: 'POST',
            data: {
                'id': id
            },
            success: function(data) {
                var result = jQuery.parseJSON(data);
                var len = result.length;
                $('#mile_time_I').val(result['mile_time']);
                $('#Pushups_I').val(result['chinups']);
                $('#Chinups_I').val(result['pushups']);
                $('#Rope_I').val(result['rope']);
            },
            async: true
        });
    }

    function view_PET_II(id) {
        // alert('cadet id: ' + id);
        $.ajax({
            url: '<?= base_url(); ?>D_O/view_PET_II',
            method: 'POST',
            data: {
                'id': id
            },
            success: function(data) {
                var result = jQuery.parseJSON(data);
                var len = result.length;

                $('#mile_time2_detail').val(result['mile_time']);
                $('#pushups2_detail').val(result['chinups']);
                $('#chinups2_detail').val(result['pushups']);
                $('#rope2_details').val(result['rope']);


                // }
            },
            async: true
        });
    }
</script>