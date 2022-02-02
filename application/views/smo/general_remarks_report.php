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
    <h4 style="text-decoration:underline"><strong>GENERAL REMARKS</strong></h4>
  </div>
  <div style="text-align:center">
    <h4 style="text-decoration:underline"><strong><?php echo $term; ?></strong></h4>
  </div>
</div>

<div id="table_div">
  <?php if (count($pn_general_remarks) > 0) { ?>
    <table style="color:black; width:100% !important;">
      <thead style="border-top:1px solid black; font-weight:bold;padding:5px; text-align:center">
        <tr>
          <td scope="" style="border-right:1px solid black;width:40%"><?php echo $type; ?> </th>
        </tr>
      </thead>
      <tbody id="table_rows_cont" style="border-top:1px solid black; padding:5px;width:100% !important;">
        <?php $count = 0;
        foreach ($pn_general_remarks as $data) { ?>
          <tr>
            <td scope="" style="border-right:black 1px solid;text-align:center"><?= $data['remarks'] ?></td>
          </tr>
        <?php
          $count++;
        } ?>
        <tr>
          <td scope="" style="border-right:1px solid black;height:500px"></td>
        </tr>
        <?php if ($type == "Mid Term Assessment") { ?>
          <tr>
            <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;text-align:right;padding:40px"><strong>DIVISIONAL OFFICER</strong></td>
          </tr>
        <?php } else { ?>
          <tr>
            <td scope="" style="border-right:1px solid black;text-align:right;padding:40px"><strong>DIVISIONAL OFFICER</strong></td>
          </tr>
          <tr>
            <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;text-align:right;padding:40px"><strong>CAPTAIN TRAINING</strong></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php } else { ?>
    <a> No Data Available yet </a>
  <?php } ?>
</div>



<div class="clearfix"></div>
<div class="clearfix"></div>

</html>