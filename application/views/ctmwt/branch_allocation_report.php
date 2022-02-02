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
    <h4 style="text-decoration:underline"><strong>ALLOCATION OF BRANCH/SPECIALISATION</strong></h4>
  </div>
</div>

<div id="table_div">
  <?php if (isset($pn_branch_allocations)) { ?> 
    <table style="color:black; width:100% !important;">
      <tbody id="table_rows_cont" style="border:none; padding:5px;width:100% !important">
        <tr style="border:none">
          <td scope="" style="border:none;width:60%"><strong>OPTION OF CADET IN ORDER OF PREFERENCE</strong></td>
          <td scope="" style="border:none;width:40%">

            <table style="color:black; width:100% !important;border:none">

              <tbody id="table_rows_inner" style="border:0.5px solid black; height:100px;width:100% !important;padding:40px;text-align:center">
                <tr>
                  <td scope="" style="width:20%">1.</td>
                  <td scope="" style="width:80%"><?= $pn_branch_allocations['option1']; ?></td>
                </tr>
                <tr>
                  <td scope="" style="border-bottom:0.5px solid black;"></td>
                  <td scope="" style="border-bottom:0.5px solid black;"></td>
                </tr>
                <tr>
                  <td scope="" style="width:20%">2.</td>
                  <td scope="" style="width:80%"><?= $pn_branch_allocations['option2']; ?></td>
                </tr>
                <tr>
                  <td scope="" style="border-bottom:0.5px solid black;"></td>
                  <td scope="" style="border-bottom:0.5px solid black;"></td>
                </tr>
                <tr>
                  <td scope="" style="width:20%">3.</td>
                  <td scope="" style="width:80%"><?= $pn_branch_allocations['option3']; ?></td>
                </tr>
                <tr>
                  <td scope="" style="border-bottom:0.5px solid black;border-left:none;border-right:none"></td>
                  <td scope="" style="border-bottom:0.5px solid black;border-left:none;border-right:none"></td>
                </tr>
              </tbody>
            </table>

          </td>
        </tr>
        <tr style="border:none;">
          <td scope="" style="border:none;width:60%"></td>
          <td scope="" style="border: none;width: 40%;height: 200px;text-align: center;font-weight: bold;">SIGN OF THE CADET</td>
        </tr>
        <tr style="border:none;">
          <td scope="" style="border:none;width:60%"><strong>BRANCH/SPECIALISATION RECOMMENDED</strong></td>
          <td scope="" style="border: none;width: 40%;">
            <table style="color:black; width:100% !important;border:none">

              <tbody id="table_rows_inner2" style="border:0.5px solid black; height:50px;width:100% !important;padding:40px;text-align:center">
                <tr>
                  <td scope="" style="width:100%"><?= $pn_branch_allocations['branch_recommended']; ?></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr style="border:none;">
          <td scope="" style="border:none;width:60%"></td>
          <td scope="" style="border: none;width: 40%;height: 200px;text-align: center;font-weight: bold;">SIGN OF PRESIDENT CATEGORISATION BOARD</td>
        </tr>
        <tr style="border:none;">
          <td scope="" style="border:none;width:50%"><strong>BRANCH/SPECIALISATION ALLOCATED BY NHQ</strong></td>
          <td scope="" style="border: none;width: 50%;">
            <table style="color:black; width:100% !important;border:none">

              <tbody id="table_rows_inner2" style="border:0.5px solid black; height:50px;width:100% !important;padding:40px;text-align:center">
                <tr>
                  <td scope="" style="width:100%"><?= $pn_branch_allocations['branch_allocated']; ?></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr style="border:none;">
          <td scope="" style="border:none;width:20%"></td>
          <td scope="" style="border:none;width: 40%;height:180;text-align: center;font-weight: bold;">
            <strong>NAVAL HEADQUARTERS</strong>
            <strong>LETTER NO…………………………</strong>
            <strong>DATED………………………………</strong>
          </td>
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