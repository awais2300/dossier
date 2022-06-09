<?php $this->load->view('ct/common/header'); ?>

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

    <!-- Page Heading -->
    <div class="card-body" style="padding:10px">
        <div class="row my-2">
            <img src='<?= base_url() ?>assets/img/navy_logo-new.png' style="height: 130px; width:100px;">
            <div class="card-body">
                <h1 style="text-align:center"><strong>GENERAL REMARKS LIST</strong></h1>
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
                        <h1 class="h4">General Remarks</h1>
                    </div>

                    <div class="card-body">
                        <div id="table_div">
                            <?php if (count($general_remarks_records) > 0) { ?>
                                <table id="datatable" class="table table-striped" style="color:black">
                                    <thead>
                                        <tr>
                                            <th scope="col">S. No.</th>
                                            <th scope="col">Cadet Name</th>
                                            <th scope="col">OC No.</th>
                                            <th scope="col">Term</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Observation</th>
                                            <th scope="col">Remarks</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Progress</th>
                                            <th scope="col">Approve</th>
                                            <th scope="col">Reject</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_rows">
                                        <?php $count = 0;
                                        foreach ($general_remarks_records as $data) { ?>
                                            <tr>
                                                <td scope="row"><?= ++$count; ?></td>
                                                <td scope="row" style="display:none"><?= $data['id']; ?></td>
                                                <td scope="row"><?= $data['name']; ?></td>
                                                <td scope="row"><?= $data['oc_no']; ?></td>
                                                <td scope="row"><?= $data['term']; ?></td>
                                                <td scope="row"><?= $data['created_at']; ?></td>
                                                <td scope="row"><?= $data['assessment']; ?></td>
                                                <td scope="row"><?= $data['remarks']; ?></td>
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
                                                <?php if ($data['status'] == 'Pending') { ?>
                                                    <td scope="row"><button type="button" class="btn btn-primary btn-user rounded-pill" style="font-size:12px; background-color:chocolate; font-weight:bold; border:0px">Progress</button></td>
                                                    <td scope="row"><button type="button" class="btn btn-primary btn-user rounded-pill" style="font-size:12px; background-color:green; font-weight:bold; border:0px">Approve</button></td>
                                                    <td scope="row"><button type="button" class="btn btn-primary btn-user rounded-pill" style="font-size:12px; background-color:red; font-weight:bold; border:0px">Reject</button></td>
                                                <?php } else { ?>
                                                    <td scope="row"><button type="button" class="btn btn-primary btn-user rounded-pill" style="font-size:12px; background-color:chocolate; font-weight:bold; border:0px" disabled>Progress</button></td>
                                                    <td scope="row"><button type="button" class="btn btn-primary btn-user rounded-pill" style="font-size:12px; background-color:green; font-weight:bold; border:0px" disabled>Approve</button></td>
                                                    <td scope="row"><button type="button" class="btn btn-primary btn-user rounded-pill" style="font-size:12px; background-color:red; font-weight:bold; border:0px" disabled>Reject</button></td>
                                                <?php } ?>
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

    var global_col_position = 0;
    $('#table_rows').find('td').click(function(e) {
        global_col_position = $(this).index();
    });

    $('#table_rows').find('tr').click(function(e) {
        var $columns = $(this).find('td');
        var cadet_id = $columns[1].innerHTML;
        var cadet_name = $columns[2].innerHTML;

        var status = '';
        if (global_col_position == 9) {
            status = 'Progress';
        } else if (global_col_position == 10) {
            status = 'Approved';
        } else if (global_col_position == 11) {
            status = 'Rejected';
        }

        if (global_col_position == 9 || global_col_position == 10 || global_col_position == 11) {
            $('#success_message').modal('show');
            setTimeout(
                function() {
                    $.ajax({
                        url: '<?= base_url(); ?>CT/update_general_remarks_status',
                        method: 'POST',
                        data: {
                            'id': cadet_id,
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
</script>