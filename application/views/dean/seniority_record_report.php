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
    <h4 style="text-decoration:underline"><strong>RECORD OF SENIORITY</strong></h4>
  </div>
</div>

<div id="table_div">
  <?php if (isset($pn_seniority_records)) { ?>
    <table style="color:black; width:100% !important;">
      <thead style="border-top:1px solid black; font-weight:bold;padding:5px; text-align:center">
        <tr>
          <td scope="" style="width:10%">TERM</th>
          <td scope="" style="width:18%">MARKS OBTAINED</th>
          <td scope="" style="width:18%">AGGREGATE PERCENTAGE</th>
          <td scope="" style="width:18%">RELEGATED YES/NO</th>
          <td scope="" style="width:18%">NO. OF SUBJECTS FAILED</th>
          <td scope="" style="border-right:1px solid black;width:18%">SENIORITY GAINED/LOST</th>
        </tr>
      </thead>
      <tbody id="table_rows_cont" style="border-top:1px solid black; padding:5px;width:100% !important;text-align:center">
        <tr>
          <td scope="" style="height:40px">TERM-I</td>
          <td scope=""><?= $pn_seniority_records['term1_marks']; ?></td>
          <td scope=""><?= $pn_seniority_records['term1_percentage']; ?></td>
          <td scope=""><?= $pn_seniority_records['term1_relegated']; ?></td>
          <td scope=""><?= $pn_seniority_records['term1_subjects_failed']; ?></td>
          <td scope="" style="border-right:1px solid black;"><?= $pn_seniority_records['term1_seniority']; ?></td>
        </tr>
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
        <tr>
          <td scope="" style="height:40px">TERM-II</td>
          <td scope=""><?= $pn_seniority_records['term2_marks']; ?></td>
          <td scope=""><?= $pn_seniority_records['term2_percentage']; ?></td>
          <td scope=""><?= $pn_seniority_records['term2_relegated']; ?></td>
          <td scope=""><?= $pn_seniority_records['term2_subjects_failed']; ?></td>
          <td scope="" style="border-right:1px solid black;"><?= $pn_seniority_records['term2_seniority']; ?></td>
        </tr>
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
        <tr>
          <td scope="" style="height:40px">TERM-III</td>
          <td scope=""><?= $pn_seniority_records['term3_marks']; ?></td>
          <td scope=""><?= $pn_seniority_records['term3_percentage']; ?></td>
          <td scope=""><?= $pn_seniority_records['term3_relegated']; ?></td>
          <td scope=""><?= $pn_seniority_records['term3_subjects_failed']; ?></td>
          <td scope="" style="border-right:1px solid black;"><?= $pn_seniority_records['term3_seniority']; ?></td>
        </tr>
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
      </tbody>
    </table>

    <br><br>
    <h6 style="display:flex"><strong>NET PERCENTAGE AT PNA:</strong>
      <p style="width: 270px;border-bottom: 1px solid;margin-left:220px;text-align:center;"><?= $pn_seniority_records['net_percentage']; ?></p>
    </h6>
    <h6 style="display:flex"><strong>SENIORITY GAINED:</strong>
      <p style="width: 270px;border-bottom: 1px solid;margin-left:160px;text-align:center;"><?= $pn_seniority_records['seniority_gained']; ?></p>
    </h6>
    <h6 style="display:flex"><strong>SENIORITY LOST:</strong>
      <p style="width: 270px;border-bottom: 1px solid;margin-left:150px;text-align:center;"><?= $pn_seniority_records['seniority_lost']; ?></p>
    </h6>
    <h6 style="display:flex"><strong>NET SENIORITY:</strong>
      <p style="width: 270px;border-bottom: 1px solid;margin-left:150px;text-align:center;"><?= $pn_seniority_records['net_seniority']; ?></p>
    </h6>

    <table style="color:black; width:100% !important;border: none;">
      <thead>
        <tr>
          <td scope="" style="border-left:none;width:30%;height:0px;padding: 5px;">
            <div style="width:100%;border-bottom:1px black solid;height:35%"></div>
            </th>
          <td scope="" style="border-left:none;width:30%;height:0px;padding: 5px;">
            <div style="width:100%;border-bottom:1px black solid;height:35%"></div>
            </th>
          <td scope="" style="border-left:none;width:30%;height:0px;padding: 5px;">
            <div style="width:100%;border-bottom:1px black solid;height:35%"></div>
            </th>
        </tr>
      </thead>
      <tbody id="table_rows_cont" style="text-align:center;">
        <tr>
          <td scope="" style="border-left:none"><strong>DIVISIONAL OFFICER</strong></td>
          <td scope="" style="border-left:none"><strong>CAPTAIN TRAINING</strong></td>
          <td scope="" style="border-left:none"><strong>COMMANDANT</strong></td>
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