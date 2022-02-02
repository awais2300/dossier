<?php $this->load->view('cao/common/header'); ?>
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
            <h1 style="text-align:center; padding:40px"><strong>TERM PROMOTION / RELEGATION</strong></h1>
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
                                <div class="col-sm-3">
                                    <h6>&nbsp;Enter OC No:</h6>
                                </div>
                                <div class="col-sm-2">

                                </div>
                                <div class="col-sm-2">

                                </div>
                                <div id="show_term_title" class="col-sm-3" style="display:none">
                                    <h6>&nbsp;Select Term:</h6>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3 mb-1">
                                    <input type="text" class="form-control form-control-user" name="oc_no" id="oc_no" placeholder="OC No.">
                                </div>

                                <div class="col-sm-2 mb-1">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="add_btn">
                                        Search
                                    </button>
                                    <span id="show_error_new" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please check errors*</span>
                                </div>

                                <div class="col-sm-2 mb-1">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="show_all_btn">
                                        Show All Cadets
                                    </button>
                                    <span id="show_error_new" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please check errors*</span>
                                </div>

                                <div id="show_terms" class="col-sm-3 mb-1" style="display:none">
                                    <select class="form-control rounded-pill" name="term_list" id="term_list" data-placeholder="Select Contractor" style="font-size: 0.8rem; height:50px;">
                                        <option class="form-control form-control-user" value="">Select Term</option>
                                        <option class="form-control form-control-user" value="Term-P">Term-P</option>
                                        <option class="form-control form-control-user" value="Term-I">Term-I</option>
                                        <option class="form-control form-control-user" value="Term-II">Term-II</option>
                                        <option class="form-control form-control-user" value="Term-III">Term-III</option>
                                    </select>
                                </div>

                                <div class="col-sm-2 mb-1">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="promote_all_btn" style="background-color:green;display:none">
                                        <strong>Promote ALL</strong>
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
                        <h1 class="h4">Promote / Relegate a cadet</h1>
                    </div>

                    <div class="card-body bg-custom3">
                        <form class="user" role="form" method="post" enctype="multipart/form-data" id="save_form" action="<?= base_url(); ?>CAO/save_cadet_warning">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <h6>&nbsp;Name:</h6>
                                </div>

                                <div class="col-sm-3">
                                    <h6>&nbsp;Term:</h6>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3 mb-1" style="display:none">
                                    <input type="text" class="" name="oc_num" id="oc_num">
                                </div>
                                <div class="col-sm-3 mb-1" style="display:none">
                                    <input type="text" class="" name="id" id="id">
                                </div>

                                <div class="col-sm-3 mb-1">
                                    <input type="text" class="form-control form-control-user" name="name" id="name" style="font-weight: bold; font-size:medium" placeholder="Name" readonly>
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <input type="text" class="form-control form-control-user" name="term" id="term" style="font-weight: bold; font-size:medium" placeholder="Term" readonly>
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="promote_btn" style="background-color:green">
                                        <strong>Promote</strong>
                                    </button>
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="relegate_btn" style="background-color:red">
                                        <strong>Relegate</strong>
                                    </button>
                                </div>

                            </div>

                            <!-- <div class="form-group row justify-content-center">
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-primary btn-user btn-block" id="save_btn">
                                        save
                                    </button>
                                    <span id="show_error_save" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please check errors*</span>
                                </div>
                            </div> -->

                        </form>
                    </div>
                </div>


            </div>
        </div>

        <div id="show_all_cadets" class="row my-2" style="display:none">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header bg-custom1">
                        <h1 class="h4">Promote / Relegate a cadet</h1>
                    </div>

                    <div class="card-body bg-custom3">
                        <form class="user" role="form" method="post" enctype="multipart/form-data" id="save_form" action="<?= base_url(); ?>CAO/save_cadet_warning">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <h5 id="term_selected"></h5>
                                </div>

                            </div>
                            <div class="form-group row">

                                <div id="list_of_cadets" class="col-sm-3 mb-1">
                                </div>

                                <div id="cadets_oc_no" class="col-sm-3 mb-1">
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
                url: '<?= base_url(); ?>CAO/search_cadet',
                method: 'POST',
                data: {
                    'oc_no': oc_no
                },
                success: function(data) {
                    var result = jQuery.parseJSON(data);

                    if (result != undefined) {
                        $('#search_cadet').show();
                        $('#no_data').hide();
                        $('#term_list').hide();
                        $('#show_all_cadets').hide();
                        $('#show_terms').hide();
                        $('#show_term_title').hide();
                        $('#promote_all_btn').hide();

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

    $('#promote_btn').on('click', function() {
        var p_id = $('#id').val();
        var curr_term = $('#term').val();

        $.ajax({
            url: '<?= base_url(); ?>CAO/update_cadet_term',
            method: 'POST',
            data: {
                'p_id': p_id,
                'curr_term': curr_term,
                'action': 'promote',
                'all': 'no'
            },
            success: function(data) {
                var newDoc = document.open("text/html", "replace");
                newDoc.write(data);
                newDoc.close();
            },
            async: false
        });
    });

    $('#relegate_btn').on('click', function() {
        var p_id = $('#id').val();
        var curr_term = $('#term').val();

        $.ajax({
            url: '<?= base_url(); ?>CAO/update_cadet_term',
            method: 'POST',
            data: {
                'p_id': p_id,
                'curr_term': curr_term,
                'action': 'relegate',
                'all': 'no'
            },
            success: function(data) {
                var newDoc = document.open("text/html", "replace");
                newDoc.write(data);
                newDoc.close();
            },
            async: false
        });
    });

    $('#promote_all_btn').on('click', function() {
        var curr_term = $('#term_list').val();

        $.ajax({
            url: '<?= base_url(); ?>CAO/update_cadet_term',
            method: 'POST',
            data: {
                'p_id': 0,
                'curr_term': curr_term,
                'action': 'promote',
                'all': 'yes'
            },
            success: function(data) {
                var newDoc = document.open("text/html", "replace");
                newDoc.write(data);
                newDoc.close();
            },
            async: false
        });
    });

    $('#show_all_btn').on('click', function() {
        $('#show_terms').show();
        $('#show_term_title').show();
        $('#term_list').show();

    });

    $("#term_list").on('change', function() {
        var term = $(this).val();


        $.ajax({
            url: '<?= base_url(); ?>CAO/search_all_cadets_by_term',
            method: 'POST',
            data: {
                'term': term
            },
            success: function(data) {
                $('#search_cadet').hide();
                $('#no_data').hide();
                $('#show_all_cadets').show();
                $("#list_of_cadets").empty();
                $("#cadets_oc_no").empty();

                var result = jQuery.parseJSON(data);
                var len = result.length;

                if (len > 0) {
                    $('#term_selected').html(`<strong>List of Cadets of ${term}:</strong>`);
                    $("#list_of_cadets").html(`<h6 style="text-decoration:underline"><strong>Cadet Names</strong></h6>`);
                    $("#cadets_oc_no").append(`<h6 style="text-decoration:underline"><strong>OC No</strong></h6>`);
                    $('#promote_all_btn').show();
                    for (var i = 0; i < len; i++) {
                        // alert(result[i]['name']);
                        $("#list_of_cadets").append(`<h6><strong>${i+1}  -  ${result[i]['name']}</strong></h6>`);
                        $("#cadets_oc_no").append(`<h6><strong>${result[i]['oc_no']} </strong></h6>`);
                    }
                } else {
                    $('#term_selected').html(`<strong>No Cadets in ${term}</strong>`);
                }
            },
            async: false
        });

    });
</script>