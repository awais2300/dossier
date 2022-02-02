<?php $this->load->view('cao_sec/common/header'); ?>
<?php !isset($search_date) ? $search_date = '' : $search_date; ?>
<style>
    .red-border {
        border: 1px solid red !important;
    }

    /* .modal {
        display: none;
        position: fixed;
        padding-top: 100px;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        overflow: auto;
        z-index: 9999;
    } */
</style>

<div class="container-fluid my-2">

    <div class="modal fade" id="success_message">
        <!-- <div class="row"> -->
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content bg-custom1">
                <div class="modal-header">
                    <h4>Success</h4>
                </div>
                <div class="card-body bg-custom3">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 style="color:black">Status Updated Successfully</h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary rounded-pill" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="reduce_punishment">
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
                                    <h1 class="h4">Reduce Punishment</h1>
                                </div>

                                <div class="card-body bg-custom3">
                                    <form class="user" role="form" method="post" id="add_form" action="<?= base_url(); ?>Project_Officer/insert_project">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <h3 id="cadet_name_heading"></h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <h6>&nbsp;Punish Detail:</h6>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6>&nbsp;Start Date:</h6>
                                            </div>

                                            <div class="col-sm-3">
                                                <h6>&nbsp;End Date:</h6>
                                            </div>

                                            <div class="col-sm-3">
                                                <h6>&nbsp;Days:</h6>
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3 mb-1">
                                                <input type="text" class="form-control form-control-user" name="punish" id="punish">
                                            </div>
                                            <div class="col-sm-3 mb-1">
                                                <input type="date" class="form-control form-control-user" name="start_date" id="start_date">
                                            </div>
                                            <div class="col-sm-3 mb-1">
                                                <input type="date" class="form-control form-control-user" name="end_date" id="end_date">
                                                <span id="error_end_date" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;End Date cannot be less than start date</span>
                                            </div>
                                            <div class="col-sm-3 mb-1">
                                                <input type="text" class="form-control form-control-user" name="days" id="days">
                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-center">
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-primary btn-user btn-block" id="add_btn">
                                                    <!-- <i class="fab fa-google fa-fw"></i>  -->
                                                    Update
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
                <h1 style="text-align:center"><strong>PUNISHMENT LIST</strong></h1>
            </div>
        </div>
    </div>

    <div class="card-body bg-custom3">
        <!-- Nested Row within Card Body -->

        <div class="row">
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
        </div>

        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header bg-custom1">
                        <h1 class="h4">Punishment List</h1>
                    </div>


                    <div class="card-body">
                        <div id="table_div">
                            <?php if (count($punishment_records) > 0) { ?>
                                <table id="datatable" class="table table-striped" style="color:black">
                                    <thead>
                                        <tr>
                                            <th scope="col">S. No.</th>
                                            <th scope="col" style="width:150px">Cadet Name</th>
                                            <th scope="col" style="width:70px">Term</th>
                                            <th scope="col" style="width:120px">Date</th>
                                            <th scope="col">Offense</th>
                                            <th scope="col">Punishment</th>
                                            <th scope="col" style="width:100px">Days left</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_rows">
                                        <?php $count = 0;
                                        $date1 = new DateTime("now");

                                        foreach ($punishment_records as $data) {
                                            $diff = date_diff($date1, date_create($data['end_date'])); ?>
                                            <tr>
                                                <td scope="row"><?= ++$count; ?></td>
                                                <td scope="row"><?= $data['name']; ?></td>
                                                <td scope="row" style="white-space:nowrap"><?= $data['term']; ?></td>
                                                <td scope="row"><?= $data['date']; ?></td>
                                                <td scope="row"><?= $data['offence']; ?></td>
                                                <td scope="row"><?= $data['punishment_awarded']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['start_date']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['end_date']; ?></td>
                                                <td scope="row" style="display:none"><?= $data['days']; ?></td>
                                                <td scope="row"><?php echo $diff->format('%d days'); ?></td>
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

    var global_col_position = 0;
    $('#table_rows').find('td').click(function(e) {
        global_col_position = $(this).index();
    });

    $('#table_rows').find('tr').click(function(e) {
        var $columns = $(this).find('td');

        $('#cadet_name_heading').html('<strong> Cadet Name: ' + $columns[1].innerHTML + '</strong>');
        $('#punish').val($columns[5].innerHTML);
        $('#start_date').val($columns[6].innerHTML);
        $('#end_date').val($columns[7].innerHTML);
        $('#days').val((Date.parse($columns[7].innerHTML) - Date.parse($columns[6].innerHTML)) / 1000 / 60 / 60 / 24);

        alert(global_col_position);
        var id = $columns[0].innerHTML;
        var status = '';
        if (global_col_position == 13) {
            status = 'Approved';
        } else if (global_col_position == 14) {
            status = 'Rejected';
        }
        alert(status);

        if (global_col_position == 12 || global_col_position == 13) {
            $('#success_message').modal('show');
            setTimeout(
                function() {
                    $.ajax({
                        url: '<?= base_url(); ?>CAO/update_punishment_status',
                        method: 'POST',
                        data: {
                            'id': id,
                            'status': status
                        },
                        success: function(data) {
                            var newDoc = document.open("text/html", "replace");
                            newDoc.write(data);
                            newDoc.close();
                        },
                        async: true
                    });
                }, 1000);
        }

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



    $('#days').on('keyup', function() {

        var days = parseInt($('#days').val());

        var date = new Date(),
            yr = date.getFullYear(),
            month = (date.getMonth() + 1) < 10 ? '0' + (date.getMonth() + 1) : (date.getMonth() + 1),
            day = date.getDate() < 10 ? '0' + date.getDate() : date.getDate(),
            startDate = yr + '-' + month + '-' + day;

        var date = new Date();
        date.setDate(date.getDate() + days);
        var yr = date.getFullYear(),
            month = (date.getMonth() + 1) < 10 ? '0' + (date.getMonth() + 1) : (date.getMonth() + 1),
            day = date.getDate() < 10 ? '0' + date.getDate() : date.getDate(),
            endDate = yr + '-' + month + '-' + day;

        $('#start_date').val(startDate);
        $('#end_date').val(endDate);

    });

    function update_punish(days) {

    }
   
</script>