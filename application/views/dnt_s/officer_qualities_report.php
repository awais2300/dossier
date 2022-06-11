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
    <h4 style="text-decoration:underline"><strong>OFFICER LIKE QUALITIES</strong></h4>
    <h4 style="text-decoration:underline"><strong><?php echo $term; ?></strong></h4>
  </div>
</div>  


<?php if(isset($pn_officer_qualities_data['term'])) { ?>
<div id="table_div">
    <table style="color:black; width:100% !important;">
      <thead style="font-weight:bold;padding:5px; text-align:center">
        <tr>
          <td scope="" style="border-top:none !important;border-left:none !important"></td>
          <td scope="" style="width:300px;border-top:none !important;border-left:none !important"></td>
          <td scope="" style="border-top:1px solid black;">MAX MARKS</td>
          <td scope="" style="border-top:1px solid black;">MID TERM</td>
          <td scope="" style="border-right:1px solid black;border-top:1px solid black;">TERMINAL</td>
        </tr>
      </thead>
      <tbody id="table_rows_cont" style="border-top:1px solid black; padding:5px;width:100% !important">
        <?php $count = 0; ?>
          <tr>
            <td scope="" ><?= ++$count; ?></td>
            <td scope="">Truthfulness</td>
            <td scope="" style="text-align:center">20</td>
            <td scope="" style="text-align:center"><?= $pn_officer_qualities_data['truthfulness_mid']; ?></td>
            <td scope="" style="border-right:1px solid black;text-align:center"><?= $pn_officer_qualities_data['truthfulness_terminal']; ?></td>
          </tr>
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
          <tr>
            <td scope="" ><?= ++$count; ?></td>
            <td scope="">Integrity</td>
            <td scope="" style="text-align:center">25</td>
            <td scope="" style="text-align:center"><?= $pn_officer_qualities_data['integrity_mid']; ?></td>
            <td scope="" style="border-right:1px solid black;text-align:center"><?= $pn_officer_qualities_data['integrity_terminal']; ?></td>
          </tr>
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
          <tr>
            <td scope="" ><?= ++$count; ?></td>
            <td scope="">Sense of Pride</td>
            <td scope="" style="text-align:center">10</td>
            <td scope="" style="text-align:center"><?= $pn_officer_qualities_data['pride_mid']; ?></td>
            <td scope="" style="border-right:1px solid black;text-align:center"><?= $pn_officer_qualities_data['pride_terminal']; ?></td>
          </tr>
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
        
          <tr>
            <td scope="" ><?= ++$count; ?></td>
            <td scope="">Moral Courage</td>
            <td scope="" style="text-align:center">15</td>
            <td scope="" style="text-align:center"><?= $pn_officer_qualities_data['courage_mid']; ?></td>
            <td scope="" style="border-right:1px solid black;text-align:center"><?= $pn_officer_qualities_data['courage_terminal']; ?></td>
          </tr>
        
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
        
          <tr>
            <td scope="" ><?= ++$count; ?></td>
            <td scope="">Confidence and Behaviour Under Stress</td>
            <td scope="" style="text-align:center">15</td>
            <td scope="" style="text-align:center"><?= $pn_officer_qualities_data['confidence_mid']; ?></td>
            <td scope="" style="border-right:1px solid black;text-align:center"><?= $pn_officer_qualities_data['confidence_terminal']; ?></td>
          </tr>
        
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
        
          <tr>
            <td scope="" ><?= ++$count; ?></td>
            <td scope="">Initiative</td>
            <td scope="" style="text-align:center">10</td>
            <td scope="" style="text-align:center"><?= $pn_officer_qualities_data['initiative_mid']; ?></td>
            <td scope="" style="border-right:1px solid black;text-align:center"><?= $pn_officer_qualities_data['inititative_terminal']; ?></td>
          </tr>
        
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
        
          <tr>
            <td scope="" ><?= ++$count; ?></td>
            <td scope="">Ability to Command, Control and Assert</td>
            <td scope="" style="text-align:center">10</td>
            <td scope="" style="text-align:center"><?= $pn_officer_qualities_data['command_mid']; ?></td>
            <td scope="" style="border-right:1px solid black;text-align:center"><?= $pn_officer_qualities_data['command_terminal']; ?></td>
          </tr>
        
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
        
          <tr>
            <td scope="" ><?= ++$count; ?></td>
            <td scope="">Self and General Discipline</td>
            <td scope="" style="text-align:center">10</td>
            <td scope="" style="text-align:center"><?= $pn_officer_qualities_data['discipline_mid']; ?></td>
            <td scope="" style="border-right:1px solid black;text-align:center"><?= $pn_officer_qualities_data['discipline_terminal']; ?></td>
          </tr>
        
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
        
          <tr>
            <td scope="" ><?= ++$count; ?></td>
            <td scope="">Sense of Duty</td>
            <td scope="" style="text-align:center">10</td>
            <td scope="" style="text-align:center"><?= $pn_officer_qualities_data['duty_mid']; ?></td>
            <td scope="" style="border-right:1px solid black;text-align:center"><?= $pn_officer_qualities_data['duty_terminal']; ?></td>
          </tr>
        
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
        
          <tr>
            <td scope="" ><?= ++$count; ?></td>
            <td scope="">Reliability</td>
            <td scope="" style="text-align:center">10</td>
            <td scope="" style="text-align:center"><?= $pn_officer_qualities_data['reliability_mid']; ?></td>
            <td scope="" style="border-right:1px solid black;text-align:center"><?= $pn_officer_qualities_data['reliability_terminal']; ?></td>
          </tr>
        
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
        
          <tr>
            <td scope="" ><?= ++$count; ?></td>
            <td scope="">General Appearance & Bearing</td>
            <td scope="" style="text-align:center">10</td>
            <td scope="" style="text-align:center"><?= $pn_officer_qualities_data['appearance_mid']; ?></td>
            <td scope="" style="border-right:1px solid black;text-align:center"><?= $pn_officer_qualities_data['appearance_terminal']; ?></td>
          </tr>
        
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
        
          <tr>
            <td scope="" ><?= ++$count; ?></td>
            <td scope="">Physical Fittness</td>
            <td scope="" style="text-align:center">10</td>
            <td scope="" style="text-align:center"><?= $pn_officer_qualities_data['fitness_mid']; ?></td>
            <td scope="" style="border-right:1px solid black;text-align:center"><?= $pn_officer_qualities_data['fitness_terminal']; ?></td>
          </tr>
        
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
        
          <tr>
            <td scope="" ><?= ++$count; ?></td>
            <td scope="">Manners and Social Conduct</td>
            <td scope="" style="text-align:center">10</td>
            <td scope="" style="text-align:center"><?= $pn_officer_qualities_data['conduct_mid']; ?></td>
            <td scope="" style="border-right:1px solid black;text-align:center"><?= $pn_officer_qualities_data['conduct_terminal']; ?></td>
          </tr>
        
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
        
          <tr>
            <td scope="" ><?= ++$count; ?></td>
            <td scope="">Intelligence and Common Sense</td>
            <td scope="" style="text-align:center">10</td>
            <td scope="" style="text-align:center"><?= $pn_officer_qualities_data['cs_mid']; ?></td>
            <td scope="" style="border-right:1px solid black;text-align:center"><?= $pn_officer_qualities_data['cs_terminal']; ?></td>
          </tr>
        
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
        
          <tr>
            <td scope="" ><?= ++$count; ?></td>
            <td scope="">Cooperation Adaptability and Team Work</td>
            <td scope="" style="text-align:center">10</td>
            <td scope="" style="text-align:center"><?= $pn_officer_qualities_data['teamwork_mid']; ?></td>
            <td scope="" style="border-right:1px solid black;text-align:center"><?= $pn_officer_qualities_data['teamwork_terminal']; ?></td>
          </tr>
        
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
        
          <tr>
            <td scope="" ><?= ++$count; ?></td>
            <td scope="">Power of Expression (Oral & Written)</td>
            <td scope="" style="text-align:center">10</td>
            <td scope="" style="text-align:center"><?= $pn_officer_qualities_data['expression_mid']; ?></td>
            <td scope="" style="border-right:1px solid black;text-align:center"><?= $pn_officer_qualities_data['expression_terminal']; ?></td>
          </tr>
        
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
        <tr>
          <td scope="" ></td>
          <td scope=""> <strong>Grand Total: </strong> </td>
          <td scope="" style="text-align:center">200</td>
          <td scope="" style="text-align:center"><?= $pn_officer_qualities_data['total_mid']; ?></td>
          <td scope="" style="border-right:1px solid black;text-align:center"><?= $pn_officer_qualities_data['total_terminal']; ?></td>
        </tr>
        <tr>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
        <tr style="border-left: none;">
          <td scope="" style=" border-left:none"></td>
          <td scope="" style=" border-left:none"></td>
          <td scope="" colspan="" style="border-right:1px solid black;"> MARKS FOR TERM </td>
          <td scope="" style="text-align:center"><?= $pn_officer_qualities_data['mid_marks']; ?></td>
          <td scope="" style="border-right:1px solid black;text-align:center"><?= $pn_officer_qualities_data['terminal_marks']; ?></td>
        </tr>
        <tr>
          <td scope="" style="border-left:none"></td>
          <td scope="" style="border-left:none"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
        <tr style="border-left: none;">
          <td scope="" style=" border-left:none"></td>
          <td scope="" style=" border-left:none"></td>
          <td scope="" colspan="" style="border-right:1px solid black;"> DATE OF ASSESSMENT</td>
          <td scope="" style="text-align:center"><?= $pn_officer_qualities_data['mid_marks_date']; ?></td>
          <td scope="" style="border-right:1px solid black;text-align:center"><?= $pn_officer_qualities_data['terminal_marks_date']; ?></td>
        </tr>
        <tr>
          <td scope="" style="border-left:none"></td>
          <td scope="" style="border-left:none"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-right:1px solid black;"></td>
        </tr>
        <tr style="border-left: none;">
          <td scope="" style=" border-left:none"></td>
          <td scope="" style=" border-left:none"></td>
          <td scope="" colspan="3" style="border-right:1px solid black; height:70px;"> DIVISIONAL OFFICER'S SIGNATURE </td>
        </tr>
        <tr>
          <td scope="" style="border-left:none"></td>
          <td scope="" style="border-left:none"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:none;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:none;border-right:1px solid black;"></td>
        </tr>
        <tr style="border-left: none;">
          <td scope="" style=" border-left:none"></td>
          <td scope="" style=" border-left:none"></td>
          <td scope="" colspan="3" style="border-right:1px solid black; height:70px;"> CAPTAIN TRAINNING'S SIGNATURE </td>
        </tr>
        <tr>
          <td scope="" style="border-left:none"></td>
          <td scope="" style="border-left:none"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:none;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:none;border-right:1px solid black;"></td>
        </tr>
        <tr style="border-left: none;">
          <td scope="" style=" border-left:none"></td>
          <td scope="" style=" border-left:none"></td>
          <td scope="" colspan="3" style="border-right:1px solid black; height:70px;"> CO/COMMANDANT'S SIGNATURE </td>
        </tr>
        <tr>
          <td scope="" style="border-left:none"></td>
          <td scope="" style="border-left:none"></td>
          <td scope="" style="border-bottom:1px solid black;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:none;"></td>
          <td scope="" style="border-bottom:1px solid black;border-left:none;border-right:1px solid black;"></td>
        </tr>
      </tbody>
    </table>

</div>
<?php } else { ?>
  <h5 style="text-decoration:underline"><strong>No Data Found</strong></h5>
<?php } ?>



<div class="clearfix"></div>
<div class="clearfix"></div>

</html>