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
    <h4 style="text-decoration:underline"><strong>RECORD OF PUNISHMENT</strong></h4>
    <h4 style="text-decoration:underline"><strong><?php echo $term; ?></strong></h4>
  </div>
</div>

<div id="table_div">
  <?php if (count($punishment_records) > 0) { ?>
    <table style="color:black">
      <thead style="border-top:1px solid black; font-weight:bold;padding:5px; text-align:center">
        <tr>
          <td scope="">DATE</th>
          <td scope="" style="width:350px">OFFENCE</th>
          <td scope="">PUNISHMENT AWARDED</th>
          <td scope="" style="border-right:1px solid black; white-space:nowrap">AWARDED BY</th>
        </tr>
      </thead>
      <tbody id="table_rows_cont" style="border-top:1px solid black; padding:5px;">
        <?php $count = 0;
        foreach ($punishment_records as $data) { ?>
          <tr>
            <td scope="" style="white-space:nowrap"><?= $data['date']; ?></td>
            <td scope="" style="height:80px"><?= $data['offence']; ?></td>
            <td scope=""><?= $data['punishment_awarded']; ?></td>
            <td scope="" style="border-right:1px solid black;"><?= $data['awarded_by']; ?></td>
          </tr>
        <?php
          $count++;
        } ?>
        <tr>
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