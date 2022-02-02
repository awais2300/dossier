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
    <h4 style="text-decoration:underline"><strong>RECORD OF DIVISIONAL OFFICERS</strong></h4>
  </div>
</div>

<div id="table_div">
  <?php if (count($pn_divisional_officer_data) > 0) { ?>
    <table style="color:black; width:100% !important;">  
      <thead style="border-top:1px solid black; font-weight:bold;padding:5px; text-align:center">
        <tr>
          <td scope="" style="width:230px">RANK & NAME</th>
          <td scope="" colspan="2" style="width:100px;border-bottom:1px solid black;">PERIOD</th>
          <td scope="" style="border-right:1px solid black;width:100px !important">SIGNATURES</th>
        </tr>
        <tr>
          <td scope="" style="width:230px"></th>
          <td scope="" style="width:70px">FROM</th>
          <td scope="" style="width:70px">TO</th>
          <td scope="" style="border-right:1px solid black;width:100px !important"></th>
        </tr>
      </thead>
      <tbody id="table_rows_cont" style="border-top:1px solid black; padding:5px;width:100% !important">
        <?php $count = 0;
        foreach ($pn_divisional_officer_data as $data) { ?>
          <tr>
            <td scope=""><?= $data['rank']; ?> <?= $data['officer_name']; ?></td>
            <td scope="" style="height:50px"><?= $data['date_from']; ?></td>
            <td scope="" style="height:50px"><?= $data['date_to']; ?></td>
            <td scope="" style="border-right:1px solid black;"></td>
          </tr>
        <?php
          $count++;
        } ?>
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black"></td>
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