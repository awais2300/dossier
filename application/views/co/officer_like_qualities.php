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
            <h1 style="text-align:center; padding:40px"><strong>OFFICER LIKE QUALITIES</strong></h1>
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
                        <h1 class="h4">Fill Officer Like Qualities Form </h1>
                    </div>

                    <div class="card-body bg-custom3">
                        <form class="user" role="form" method="post" id="save_form" action="<?= base_url(); ?>CO/save_officer_qualities">
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

                            <div class="card-body">
                                <div id="table_div">
                                    <?php if (count($quality_list) > 0) { ?>
                                        <table id="datatable" class="table table-striped" style="color:black">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S. No.</th>
                                                    <th scope="col">Quality</th>
                                                    <th scope="col">Max Marks</th>
                                                    <th scope="col">Mid Term</th>
                                                    <th scope="col">Final Term</th>
                                                    <!-- <th scope="col">Status</th> -->
                                                </tr>
                                            </thead>
                                            <tbody id="table_rows">
                                                <?php $count = 0;
                                                foreach ($quality_list as $data) { ?>
                                                    <tr>
                                                        <td scope="row" style="padding:25px"><?= $data['id']; ?></td>
                                                        <td scope="row" style="padding:25px"><?= $data['quality_name']; ?></td>
                                                        <td scope="row" style="padding:25px"><?= $data['max_marks']; ?></td>
                                                        <td scope="row"><input type="text" class="form-control form-control-user" name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                        <td scope="row"><input type="text" class="form-control form-control-user" name="final_marks[]" id="final_marks" placeholder="Marks"></td>

                                                    </tr>
                                                <?php
                                                $count++; } ?>
                                                <tr>
                                                    <td scope="row" style="padding:25px"></td>
                                                    <td scope="row" style="padding:25px; text-align:right"><strong>Grand Total</strong></td>
                                                    <td scope="row" style="padding:25px"><strong>200</strong></td>
                                                    <td scope="row"><input type="text" class="form-control form-control-user" name="total_mid_marks" id="total_mid_marks" placeholder="Total Marks"></td>
                                                    <td scope="row"><input type="text" class="form-control form-control-user" name="total_final_marks" id="total_final_marks" placeholder="Total Marks"></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php } else { ?>
                                        <a> No Data found </a>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3 mb-1">
                                </div>
                                <div class="col-sm-3 mb-1 my-3">
                                    <h6 style="text-align:right">&nbsp;Percentage of Marks:</h6>
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <input type="text" class="form-control form-control-user" name="mid_percentage" id="mid_percentage" placeholder="Mid Marks %">
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <input type="text" class="form-control form-control-user" name="final_percentage" id="final_percentage" placeholder="Final Marks %">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3 mb-1">
                                </div>
                                <div class="col-sm-3 mb-1 my-3">
                                    <h6 style="text-align:right">&nbsp;Date of Assesment:</h6>
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <input type="date" class="form-control form-control-user" name="mid_exam_date" id="mid_exam_date" placeholder="Mid Marks %">
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <input type="date" class="form-control form-control-user" name="final_exam_date" id="final_exam_date" placeholder="Final Marks %">
                                </div>
                            </div>




                            <div class="form-group row justify-content-center">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary btn-user btn-block" id="save_btn">
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
                url: '<?= base_url(); ?>CO/search_cadet',
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

    $('#total_mid_marks').on('click', function() {
        alert('dsfsdf');
        var sum=0;
        var inps = document.getElementsByName('mid_marks[]');
            for (var i = 0; i <inps.length; i++) {
                //sum=sum+i;
                 }
      //alert(sum);
      $('#total_mid_marks').val(sum);
      // alert(a);
    });
</script>