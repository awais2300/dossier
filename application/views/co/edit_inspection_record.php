<?php $this->load->view('co/common/header'); ?>
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
    <div class="form-group row justify-content-center">
        <div class="col-lg-1">
            <img src='<?= base_url() ?>assets/img/navy_logo-new.png' style="height: 130px; width:100px;">
        </div>
        <div class="col-lg-11">
            <h1 style="text-align:center; padding:40px"><strong>EDIT INSPECTION RECORD</strong></h1>
        </div>

    </div>

    <div class="card-body bg-custom3">
        <!-- Nested Row within Card Body -->



        <div id="search_cadet" class="row my-2" style="display:block">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header bg-custom1">
                        <h1 class="h4">Inspection Record</h1>
                    </div>

                    <div class="card-body bg-custom3">
                        <form class="user" role="form" method="post" id="add_form" action="<?= base_url(); ?>D_O/update_inspection_record">
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
                                <input type="hidden" name="row_id" value="<?= $pn_inspection_data['id'] ?>">
                                <div class="col-sm-4 mb-1" style="display:none">
                                    <input type="text" class="" name="oc_num" value="<?= $pn_inspection_data['oc_no'] ?>" id="oc_num">
                                </div>
                                <div class="col-sm-4 mb-1" style="display:none">
                                    <input type="text" class="" name="id" value="<?= $pn_inspection_data['p_id'] ?>" id="id">
                                </div>

                                <div class="col-sm-4 mb-1">
                                    <input type="text" class="form-control form-control-user" value="<?= $pn_inspection_data['name'] ?>" name="name" id="name" style="font-weight: bold; font-size:large" placeholder="Name" readonly>
                                </div>
                                <div class="col-sm-4 mb-1">
                                    <input type="text" class="form-control form-control-user" value="<?= $pn_inspection_data['term'] ?>" name="term" id="term" style="font-weight: bold; font-size:large" placeholder="Term" readonly>
                                </div>
                                <div class="col-sm-4 mb-1">
                                    <input type="text" class="form-control form-control-user" name="division" value="<?= $pn_inspection_data['divison_name'] ?>" id="division" style="font-weight: bold; font-size:large" placeholder="Division" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <h6>&nbsp;Date:</h6>
                                </div>

                                <div class="col-sm-4">
                                    <h6>&nbsp;Inspecting Officer Name:</h6>
                                </div>

                                <div class="col-sm-4">
                                    <h6>&nbsp;Remarks:</h6>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-4 mb-1">
                                    <input type="date" class="form-control form-control-user" name="date" value="<?= $pn_inspection_data['date'] ?>" id="date" placeholder="Date">
                                </div>

                                <div class="col-sm-4 mb-1">
                                    <input type="text" class="form-control form-control-user" name="inspector_name" value="<?= $pn_inspection_data['inspecting_officer_name'] ?>" id="inspector_name" placeholder="Inpecting Officer Name">
                                </div>

                                <div class="col-sm-4 mb-1">
                                    <textarea class="form-control " name="remarks" id="remarks"  placeholder="Enter Remarks"><?= $pn_inspection_data['remarks'] ?></textarea>
                                </div>

                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="save_btn">
                                        Submit
                                    </button>
                                    <span id="show_error_submit" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please Fill in required fields*</span>
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

        var officer_name = $('#name').val();
        var date = $('#date').val();
        var inspector_name = $('#inspector_name').val();
        var remarks = $('#remarks').val();

        if (date == '') {
            validate = 1;
            $('#date').addClass('red-border');
        }
        if (inspector_name == '') {
            validate = 1;
            $('#inspector_name').addClass('red-border');
        }
        if (remarks == '') {
            validate = 1;
            $('#remarks').addClass('red-border');
        }

        if (validate == 0) {
            $('#add_form')[0].submit();
            $('#show_error_submit').hide();
        } else {
            $('#save_btn').removeAttr('disabled');
            $('#show_error_submit').show();
        }
    });

   
</script>