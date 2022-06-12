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

  .clearfix {
    height:500px;
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
        <thead style="border-top:1px solid black; font-weight:bold;padding:5px; text-align:center">
          <tr>
            <td scope="">TERM</td>
            <td scope="">GAME</td>
            <td scope="">PROFICIENCY</td>
            <td scope="" style="border-right:1px solid black;">DO SIGNATURE</td>
          </tr>
        </thead>
        <tbody id="table_rows_cont" style="border-top:1px solid black; padding:5px;width:100% !important">
          <?php $count = 0;
          foreach ($test_records as $data) { ?>
            <tr>
              <td scope="" style="height:80px"><?= $data['term']; ?></td>
              <td scope=""><?= $data['game']; ?></td>
              <td scope=""><?= $data['proficiency']; ?></td>
              <td scope="" style="border-right:1px solid black;"></td>
            </tr>
          <?php } ?>
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



</html>