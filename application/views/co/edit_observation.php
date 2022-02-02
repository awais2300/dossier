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
    <div class="form-group row justify-content-center">
        <div class="col-lg-1">
            <img src='<?= base_url() ?>assets/img/navy_logo-new.png' style="height: 130px; width:100px;">
        </div>
        <div class="col-lg-11">
            <h1 style="text-align:center; padding:40px"><strong>EDIT OBSERVATION</strong></h1>
        </div>

    </div>
    <div id="search_cadet" class="row my-2" style="display:block">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header bg-custom1">
                    <h1 class="h4">Cadet's Information</h1>
                </div>

                <div class="card-body bg-custom3">
                    <form class="user" role="form" method="post" id="save_form_ob" action="<?= base_url(); ?>D_O/update_cadet_observation">
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
                                <input type="text" class="" name="oc_num" value="<?= $edit_records['oc_no'] ?>" id="oc_num_1">
                            </div>
                            <div class="col-sm-4 mb-1" style="display:none">
                                <input type="text" class="" name="id" value="<?= $edit_records['p_id'] ?>" id="id_1">
                            </div>

                            <div class="col-sm-4 mb-1">
                                <input type="text" class="form-control form-control-user" value="<?= $edit_records['name'] ?>" name="name" id="name_1" style="font-weight: bold; font-size:large" placeholder="Name" readonly>
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input type="text" class="form-control form-control-user" value="<?= $edit_records['term'] ?>" name="term" id="term_1" style="font-weight: bold; font-size:large" placeholder="Term" readonly>
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input type="text" class="form-control form-control-user" name="division" value="<?= $edit_records['divison_name'] ?>" id="division_1" style="font-weight: bold; font-size:large" placeholder="Division" readonly>
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <h6>&nbsp;Edit Observation:</h6>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-1">
                                <textarea class="form-control form-control-user" name="observation_1" id="observation_1" style="border-radius:10px" placeholder="Edit Observation"><?= $edit_records['observation'] ?></textarea>
                            </div>
                        </div>

                        <input type="hidden" class="form-control form-control-user" name="observation_id" value="<?= $edit_records['id'] ?>" id="observation_id_1">

                        <div class="form-group row justify-content-center">
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-primary btn-user btn-block" id="save_btn_ob">
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




    $('#save_btn_ob').on('click', function() {
        $('#save_btn_ob').attr('disabled', true);
        var validate = 0;
        var observation = $('#observation_1').val();
       // alert(observation);

        if (observation == '') {
            validate = 1;
            $('#observation_1').addClass('red-border');
        }

        if (validate == 0) {
            $('#save_form_ob')[0].submit();
            $('#show_error_save').hide();

        } else {
            $('#save_btn_ob').removeAttr('disabled');
            $('#show_error_save').show();
        }
    });
</script>