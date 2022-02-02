<?php if ($this->session->userdata('acct_type') == 'do') {
    $this->load->view('hougp/common/header');
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

<div class="container-fluid my-4">
    <!-- <div class="row" style="background:<?= base_url(); ?>assets/img/img3.jpg"> -->
    <div class="row">
        <div class="col-lg-4">
            <h1 class="h3 mb-0 text-black-800"><strong>Welcome House Group Officer!</strong></h1>
        </div>
        <div class="col-lg-4">
            <?php if ($this->session->userdata('unit_id') == 1) { ?>
                <h1 class="h3 mb-0 text-black-800" style="text-align:center;text-decoration:underline"><strong>PHASE-I</strong></h1>
            <?php } else if ($this->session->userdata('unit_id') == 2) { ?> 
                <h1 class="h3 mb-0 text-black-800" style="text-align:center;text-decoration:underline"><strong>PHASE-IV</strong></h1>
            <?php } else if (($this->session->userdata('unit_id') == 3) || ($this->session->userdata('unit_id') == 17)) { ?>
                <h1 class="h3 mb-0 text-black-800" style="text-align:center;text-decoration:underline"><strong>PHASE-III</strong></h1>
            <?php } else { ?>
                <h1 class="h3 mb-0 text-black-800" style="text-align:center;text-decoration:underline"><strong>PHASE-II</strong></h1>
            <?php } ?>
        </div>
        <?php if ($this->session->userdata('unit_id') == 1) { ?>
            <div class="col-lg-4" style="text-align:right">
                <h1 class="h3 mb-0 text-black-800"><strong><?= $this->session->userdata('division') ?></strong></h1>
            </div>
        <?php } else { ?>
            <div class="col-lg-4" style="text-align:right">
                <h1 class="h3 mb-0 text-black-800"><strong><?= $this->session->userdata('unit_name') ?></strong></h1>
                <h1 class="h3 mb-0 text-black-800"><strong>Branch: <?= $this->session->userdata('branch_name') ?></strong></h1>
            </div>
        <?php } ?>
    </div>

</div>
<div style="margin-top:50px;margin-bottom: 50px;">
    <div class="row col-md-12">
        <!-- <div class="col-md-12">
            <img src="<?= base_url(); ?>assets/img/img3.jpg" alt="Snow" style="width:100%; height:100%">
        </div> -->
        <!-- <div class="col-md-6">
    <img src="<?= base_url(); ?>assets/img/Russian1.jpg" alt="Forest" style="width:100%;height:100%"> -->
    </div>


    <!-- </div> -->
    <!-- <div class="row col-md-12" style="margin-top:10px;">

        <div class="col-md-6">
            <img src="<?= base_url(); ?>assets/img/compak1.jpg" alt="Mountains" style="width:100%;height:100%">
        </div>
        <div class="col-md-6">
            <img src="<?= base_url(); ?>assets/img/compak2.jpg" alt="Mountains" style="width:100%;height:100%">
        </div>
    </div> -->
</div>
</div>

<?php $this->load->view('common/footer'); ?>
<script>
    function seen(data) {
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
</script>
<script src="<?= base_url('assets/js/chat/chat.js'); ?>"></script>