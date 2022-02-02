<!DOCTYPE html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<style>
  .img-logo {
    background: url('<?= base_url() ?>assets/img/navy_logo.png');
    background-size: cover;
    height: 50px;
    width: 39px;
  }

  table,
  th,
  td {
    border-left: 1px solid black;
  }
</style>

<link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

<div class="container my-3">
  <div style="text-align:center">
    <h4 style="text-decoration:underline"><strong>MEDICAL RECORD</strong></h4>
  </div>
</div>

<div id="table_div">
  <?php if (count($medical_records) > 0) { ?>
    <table style="color:black">
      <thead style="border-top:1px solid black; font-weight:bold;padding:5px; text-align:center">
        <tr>
          <td scope="" style="width:70px">DATE</td>
          <td scope="" style="width:70px">TERM</td>
          <td scope="" style="width:70px">DISEASE</td>
          <td scope="" style="width:70px">ADMITTED NAME OF SICKBAY/HOSPITALS</td>
          <td scope="" style="width:70px">MO'S/SMO'S REMARKS</td>
          <td scope="" style="width:70px">SPECIALISTS OPINION</td>
          <td scope="" style="width:70px">INSTRUCTIONAL LOSS(PERIODS/DAYS)</td>
          <td scope="" style="border-right:1px solid black;width:150px !important">REMARKS BY DIVISIONAL OFFICER</td>
        </tr>
      </thead>
      <tbody id="table_rows_cont" style="border-top:1px solid black; padding:5px;">
        <?php $count = 0;
        foreach ($medical_records as $data) { ?>
          <tr>
            <td scope="" style="white-space:nowrap"><?= date('Y-m-d',strtotime($data['date'])); ?></td>
            <td scope="" style="height:80px"><?= $data['term']; ?></td>
            <td scope=""><?= $data['disease']; ?></td>
            <td scope=""><?= $data['admitted']; ?></td>
            <td scope=""><?= $data['mo_remarks']; ?></td>
            <td scope=""><?= $data['specialist_opinion']; ?></td>
            <td scope=""><?= $data['instructional_loss']; ?></td>
            <td scope="" style="border-right:1px solid black;"><?= $data['do_remarks']; ?></td>
          </tr>
        <?php
          $count++;
        } ?>
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
        </tr>
      </tbody>
    </table>
  <?php } else { ?>
    <a> No Data Available yet </a>
  <?php } ?>
</div>



<div class="clearfix"></div>
<div class="clearfix"></div>

</html>