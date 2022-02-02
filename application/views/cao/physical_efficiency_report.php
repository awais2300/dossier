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
    border-left: 0.5px solid black;
  }

  .clearfix {
    height: 50px;
  }
</style>

<link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

  
<div class="container my-3">
  <div style="text-align:center">
    <h4 style="text-decoration:underline"><strong>RECORD OF SALUTING AND SWIMMING</strong></h4>
  </div>
</div>

<div id="table_div">
  <?php if (count($test_records) > 0) { ?>
    <table style="color:black; width:100% !important;">
      <?php $count = 0;
      foreach ($test_records as $data) { ?>
        <thead style="border-top:1px solid black; font-weight:bold;padding:5px; text-align:center">
          <tr>
            <td scope="" Style="width:50px">S NO</td>
            <td scope="" Style="width:180px">EVENT</td>
            <td scope="" colspan="4">TERM-P</td>
            <td scope="" colspan="4">TERM______</td>
            <td scope="" colspan="4">TERM______</td>
            <td scope="" style="border-right:1px solid black;" colspan="4">TERM______</td>
          </tr>
        </thead>
        <tbody id="table_rows_cont" style="border-top:1px solid black; padding:5px;width:100% !important">
          <tr>
          <td scope="" style="height:80px"><?= ++$count; ?></td>
          <td scope="">MILE TIME</td>
          <td scope=""><?php if (isset($pn_pet1_data_tp['mile_time'])) { echo $pn_pet1_data_tp['mile_time']; }?></td>
          <td scope=""><?php if (isset($pn_pet1_data_tp['mile_time'])) { echo $pn_pet1_data_tp['mile_time']; } ?></td>
          <td scope=""><?php if (isset($pn_pet1_data_tp['mile_time'])) { echo $pn_pet2_data_tp['mile_time']; }?></td>
          <td scope=""><?php if (isset($pn_pet1_data_tp['mile_time'])) { echo $pn_pet2_data_tp['mile_time']; }?></td>
          <td scope=""><?php if (isset($pn_pet1_data_t1['mile_time'])) { echo $pn_pet1_data_t1['mile_time']; }?></td>
          <td scope=""><?php if (isset($pn_pet1_data_t1['mile_time'])) { echo $pn_pet1_data_t1['mile_time']; }?></td>
          <td scope=""><?php if (isset($pn_pet1_data_t1['mile_time'])) { echo $pn_pet1_data_t1['mile_time']; }?></td>
          <td scope=""><?php if (isset($pn_pet1_data_t1['mile_time'])) { echo $pn_pet2_data_t1['mile_time']; }?></td>
          <td scope=""><?php if (isset($pn_pet1_data_t2['mile_time'])) { echo $pn_pet1_data_t2['mile_time']; }?></td>
          <td scope=""><?php if (isset($pn_pet1_data_t2['mile_time'])) { echo $pn_pet1_data_t2['mile_time']; }?></td>
          <td scope=""><?php if (isset($pn_pet1_data_t2['mile_time'])) { echo $pn_pet2_data_t2['mile_time']; }?></td>
          <td scope=""><?php if (isset($pn_pet1_data_t2['mile_time'])) { echo $pn_pet2_data_t2['mile_time']; }?></td>
          <td scope=""><?php if (isset($pn_pet1_data_t3['mile_time'])) { echo $pn_pet1_data_t4['mile_time']; }?></td>
          <td scope=""><?php if (isset($pn_pet1_data_t3['mile_time'])) { echo $pn_pet1_data_t4['mile_time']; }?></td>
          <td scope=""><?php if (isset($pn_pet1_data_t3['mile_time'])) { echo $pn_pet2_data_t4['mile_time']; }?></td>
          <td scope="" style="border-right:1px solid black;"><?php if (isset($pn_pet1_data_t3['mile_time'])) { echo $pn_pet2_data_t3['mile_time']; } ?></td>
          </tr>
        <?php } ?>
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:2px solid red;"></td>
          <td scope="" style="border-bottom:2px solid red;"></td>
        </tr>
        <?php foreach ($test_records as $data) { ?>
          <thead style="font-weight:bold;padding:5px; text-align:center">
            <tr>
              <th scope=""></th>
              <th scope=""></th>
              <th scope="" colspan="2"></th>
              <th scope="" colspan="2"></th>
              <th scope="" colspan="2"></th>
              <th scope="" colspan="2"></th>
              <th scope="" colspan="2"></th>
              <th scope="" colspan="2"></th>
              <th scope="" style="border-right:1px solid black;" colspan="2"></th>
            </tr>
          </thead>
          <tr>
          <td scope="" style="height:80px"><?= ++$count; ?></td>
          <td scope="">ROPE CLASS</td>
          <td scope="" colspan="2"><?php if (isset($pn_pet1_data_tp['rope'])) { echo $pn_pet1_data_tp['rope']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_pet2_data_tp['rope'])) { echo $pn_pet2_data_tp['rope']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_pet1_data_t1['rope'])) { echo $pn_pet1_data_t1['rope']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_pet2_data_t1['rope'])) { echo $pn_pet2_data_t1['rope']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_pet1_data_t2['rope'])) { echo $pn_pet1_data_t2['rope']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_pet2_data_t2['rope'])) { echo $pn_pet2_data_t2['rope']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_pet1_data_t3['rope'])) { echo $pn_pet1_data_t3['rope']; }?></td>
          <td scope="" colspan="2" style="border-right:1px solid black;"><?php if (isset($pn_pet2_data_t3['rope'])) { echo $pn_pet2_data_t3['rope']; }?></td>
          </tr>
        <?php } ?>
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black; border-left:1px; border-right:1px solid black;"></td>
        </tr>
        <?php foreach ($test_records as $data) { ?>
          <tr>
          <td scope="" style="height:80px"><?= ++$count; ?></td>
          <td scope="">BEAM WORK</td>
          <td scope="" colspan="2"><?php if (isset($pn_pet1_data_tp['chinups'])) { echo $pn_pet1_data_tp['chinups']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_pet2_data_tp['chinups'])) { echo $pn_pet2_data_tp['chinups']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_pet1_data_t1['chinups'])) { echo $pn_pet1_data_t1['chinups']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_pet2_data_t1['chinups'])) { echo $pn_pet2_data_t1['chinups']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_pet1_data_t2['chinups'])) { echo $pn_pet1_data_t2['chinups']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_pet2_data_t2['chinups'])) { echo $pn_pet2_data_t2['chinups']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_pet1_data_t3['chinups'])) { echo $pn_pet1_data_t3['chinups']; }?></td>
          <td scope="" colspan="2" style="border-right:1px solid black;"><?php if (isset($pn_pet2_data_t3['chinups'])) { echo $pn_pet2_data_t3['chinups']; }?></td>
          </tr>
        <?php } ?>
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black; border-left:1px; border-right:1px solid black;"></td>
        </tr>
        <?php foreach ($test_records as $data) { ?>
          <tr>
          <td scope="" style="height:80px"><?= ++$count; ?></td>
          <td scope="">PUSH UPS</td>
          <td scope="" colspan="2"><?php if (isset($pn_pet1_data_tp['pushups'])) { echo $pn_pet1_data_tp['pushups']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_pet2_data_tp['pushups'])) { echo $pn_pet2_data_tp['pushups']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_pet1_data_t1['pushups'])) { echo $pn_pet1_data_t1['pushups']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_pet2_data_t1['pushups'])) { echo $pn_pet2_data_t1['pushups']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_pet1_data_t2['pushups'])) { echo $pn_pet1_data_t2['pushups']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_pet2_data_t2['pushups'])) { echo $pn_pet2_data_t2['pushups']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_pet1_data_t3['pushups'])) { echo $pn_pet1_data_t3['pushups']; }?></td>
          <td scope="" colspan="2" style="border-right:1px solid black;"><?php if (isset($pn_pet2_data_t3['pushups'])) { echo $pn_pet2_data_t3['pushups']; }?></td>
          </tr>
        <?php } ?>
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black; border-left:1px; border-right:1px solid black;"></td>
        </tr>
        <?php foreach ($test_records as $data) { ?>
          <tr>
            <td scope=""><?= ++$count; ?></td>
            <td scope="">100M SPRINT TIME</td>
            <td scope="" colspan="2"></td>
            <td scope="" colspan="2"></td>
            <td scope="" colspan="2"></td>
            <td scope="" colspan="2"></td>
            <td scope="" colspan="2"></td>
            <td scope="" colspan="2"></td>
            <td scope="" colspan="2"></td>
            <td scope="" colspan="2" style="border-right:1px solid black;"></td>
          </tr>
        <?php } ?>
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black; border-left:1px; border-right:1px solid black;"></td>
        </tr>
        <?php foreach ($test_records as $data) { ?>
          <tr>
            <td scope=""><?= ++$count; ?></td>
            <td scope="">TOTAL PET SCORE</td>
            <td scope="" colspan="2"></td>
            <td scope="" colspan="2"></td>
            <td scope="" colspan="2"></td>
            <td scope="" colspan="2"></td>
            <td scope="" colspan="2"></td>
            <td scope="" colspan="2"></td>
            <td scope="" colspan="2"></td>
            <td scope="" colspan="2" style="border-right:1px solid black;"></td>
          </tr>
        <?php } ?>
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black; border-left:1px; border-right:1px solid black;"></td>
        </tr>
        <?php foreach ($test_records as $data) { ?>
          <tr>
          <td scope="" style="height:80px"><?= ++$count; ?></td>
          <td scope="">MINI CROSS COUNTRY ____ KM</td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_tp['mini_cross_result'])) { echo $pn_physical_tests_data_tp['mini_cross_result']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_tp['mini_cross_card_number'])) { echo $pn_physical_tests_data_tp['mini_cross_card_number']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_t1['mini_cross_result'])) { echo $pn_physical_tests_data_t1['mini_cross_result']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_t1['mini_cross_card_number'])) { echo $pn_physical_tests_data_t1['mini_cross_card_number']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_t2['mini_cross_result'])) { echo $pn_physical_tests_data_t2['mini_cross_result']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_t2['mini_cross_card_number'])) { echo $pn_physical_tests_data_t2['mini_cross_card_number']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_t3['mini_cross_result'])) { echo $pn_physical_tests_data_t3['mini_cross_result']; }?></td>
          <td scope="" colspan="2" style="border-right:1px solid black;"><?php if (isset($pn_physical_tests_data_t3['mini_cross_card_number'])) { echo $pn_physical_tests_data_t3['mini_cross_card_number']; }?></td>          </tr>
        <?php } ?>
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black; border-left:1px; border-right:1px solid black;"></td>
        </tr>
        <?php foreach ($test_records as $data) { ?>
          <tr>
          <td scope="" style="height:80px"><?= ++$count; ?></td>
          <td scope="">CROSS COUNTRY _______KM</td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_tp['long_cross_result'])) { echo $pn_physical_tests_data_tp['long_cross_result']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_tp['long_cross_card_number'])) { echo$pn_physical_tests_data_tp['long_cross_card_number']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_t1['long_cross_result'])) { echo $pn_physical_tests_data_t1['long_cross_result']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_t1['long_cross_card_number'])) { echo $pn_physical_tests_data_t1['long_cross_card_number']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_t2['long_cross_result'])) { echo $pn_physical_tests_data_t2['long_cross_result']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_t2['long_cross_card_number'])) { echo $pn_physical_tests_data_t2['long_cross_card_number']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_t3['long_cross_result'])) { echo $pn_physical_tests_data_t3['long_cross_result']; }?></td>
          <td scope="" colspan="2" style="border-right:1px solid black;"><?php if (isset($pn_physical_tests_data_t3['long_cross_card_number'])) { echo $pn_physical_tests_data_t3['long_cross_card_number']; }?></td>          </tr>
        <?php } ?>
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black; border-left:1px; border-right:1px solid black;"></td>
        </tr>
        <?php foreach ($test_records as $data) { ?>
          <tr>
          <td scope="" style="height:80px"><?= ++$count; ?></td>
          <td scope="">ASSAULT COURSES TIME</td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_tp['assault_result'])) { echo $pn_physical_tests_data_tp['assault_result']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_tp['assault_attempt'])) { echo $pn_physical_tests_data_tp['assault_attempt']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_t1['assault_result'])) { echo $pn_physical_tests_data_t1['assault_result']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_t1['assault_attempt'])) { echo $pn_physical_tests_data_t1['assault_attempt']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_t2['assault_result'])) { echo $pn_physical_tests_data_t2['assault_result']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_t2['assault_attempt'])) { echo $pn_physical_tests_data_t2['assault_attempt']; }?></td>
          <td scope="" colspan="2"><?php if (isset($pn_physical_tests_data_t3['assault_result'])) { echo $pn_physical_tests_data_t3['assault_result']; }?></td>
          <td scope="" colspan="2" style="border-right:1px solid black;"><?php if (isset($pn_physical_tests_data_t3['assault_attempt'])) { echo $pn_physical_tests_data_t3['assault_attempt']; }?></td>          </tr>
        <?php } ?>
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px !important;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black; border-left:1px; border-right:1px solid black;"></td>
        </tr>
        </tbody>
    </table>
  <?php } else { ?>
    <a> No Data Available yet </a>
  <?php } ?>
</div>


<div class="clearfix"></div>

<div class='footer'> <strong> PHYSICAL EFFECIENCY INDEX </strong> </div>


</html>