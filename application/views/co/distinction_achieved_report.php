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

  
  th,
  td {
    border-left: 1px solid black;
  }
</style>

<link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

<div class="container my-3">
  <div style="text-align:center">
    <h4 style="text-decoration:underline"><strong>RECORD OF DISTINCTIONS ACHIEVED</strong></h4>
  </div>
</div>

<div id="table_div">
  <?php if (count($pn_distinctions_records) > 0) { ?> 
    <table style="color:black; width:100% !important;">
      <thead style="border-top:1px solid black; font-weight:bold;padding:5px; text-align:center">
        <tr>
          <td scope="" style="width:30%">ACADEMIC</th>
          <td scope="" style="width:30%">SPORTS</th>
          <td scope="" style="border-right:1px solid black;width:30%">EXTRA CURRICULAR ACTIVITIES</th>
        </tr>
      </thead>
      <tbody id="table_rows_cont" style="border-top:1px solid black; padding:5px;width:100% !important">
        <?php $count = 0;
        foreach ($pn_distinctions_records as $data) { ?>
          <tr>
            <td scope="" style="height:80px"><?= $data['academic']; ?></td>
            <td scope=""><?= $data['sports']; ?></td>
            <td scope="" style="border-right:1px solid black;"><?= $data['extra_curricular_activities']; ?></td>
          </tr>
        <?php
          $count++;
        } ?>
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
        </tr>
        <tr>
          <td scope="" style="border-bottom:1px solid black;height:200px; border-left:none"></td>
          <td scope="" style="height:200px;border-left:none"></td>
          <td scope="" style="border-bottom:1px solid black;height:200px;border-left:none"></td>
        </tr>
        <tr>
          <td style="border-left:none"><strong> DIVISIONAL OFFICER</strong></td>
          <td style="border-left:none"></td>
          <td style="border-left:none"><strong>CAPTAIN TRAINING</strong></td>
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