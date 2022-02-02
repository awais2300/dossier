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
    <h4 style="text-decoration:underline"><strong>RECORD OF OBSERVATION</strong></h4>
    <h4 style="text-decoration:underline"><strong><?php echo $term; ?></strong></h4>
  </div>
</div>

<div id="table_div">
  <?php if (count($observation_records) > 0) { ?>
    <table style="color:black">
      <thead style="border-top:1px solid black; font-weight:bold;padding:5px; text-align:center">
        <tr>
          <td scope="" style="width:70px">DATE</th>
          <td scope="" style="width:300px">OBSERVATION</th>
          <td scope="" style="width:70px !important">OBSERVED/ CHECKED BY</th>
          <td scope="" style="border-right:1px solid black;width:100px !important">REMARKS/ ACTION TAKEN</th>
        </tr>
      </thead>
      <tbody id="table_rows_cont" style="border-top:1px solid black; padding:5px;">
        <?php $count = 0;
        foreach ($observation_records as $data) { ?>
          <tr>  
            <td scope=""><?= $data['date']; ?></td>
            <td scope="" style="height:70px;"><?= $data['observation']; ?></td>
            <td scope="" ><?= $data['observed_by']; ?></td>
            <td scope="" style="border-right:1px solid black;"><?= $data['action_taken']; ?></td>
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