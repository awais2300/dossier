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

  .box {
    border: 1px solid black;
    height: 130px;
    width: 20px;
    text-align: center;
  }  
</style>

<link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">


<!-- <div class="container my-3">
  <div style="text-align:center">
    <h4 style="text-decoration:underline"><strong>RECORD OF WARNINGS</strong></h4>
  </div>
</div> -->

<?php if (isset($pn_personal_data['p_no'])) { ?>
  <div style="width:100%; height:auto">
    <div style="width:100%; height:auto">

      <div style="width:100%">
        <div class="box" style="width:20%;float:left;margin-left: 50px;">
          <h6 style="margin-top:40px; text-decoration:underline"><strong>&nbsp;TERM-III</strong></h6>
        </div>
        <div class="box" style="width:20%; float:left;margin-left: 100px;">
          <h6 style="margin-top:40px; text-decoration:underline"><strong>&nbsp;TERM-II</strong></h6>
        </div>
        <div class="box" style="width:20%; float:left;margin-left: 100px;">
          <h6 style="margin-top:40px; text-decoration:underline"><strong>&nbsp;TERM-I</strong></h6>
        </div>

      </div>

      <div class="container my-3">
        <div style="text-align:center">
          <h4 style="text-decoration:underline"><strong>PERSONAL DATA</strong></h4>
        </div>
      </div>

      <div style="width:100%;">
        <div style="width:10%; float:left">
          <h6><strong>1.&nbsp;&nbsp;&nbsp;P NO:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;width:30%;float:left">
          <h6><strong><?= $pn_personal_data['p_no'] ?></strong></h6>
        </div>
        <div style="width:10%; float:left">
          <h6><strong>2.&nbsp;&nbsp;CLASS:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height: 30px;width:50%;float:left">
          <h6><strong><?= $pn_personal_data['class'] ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:20%;float:left">
          <h6><strong>3.&nbsp;&nbsp;&nbsp;NAME IN FULL:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:80%; float:left">
          <h6><strong><?= $pn_personal_data['name'] ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:20%;float:left">
          <h6><strong>4.&nbsp;&nbsp;&nbsp;RELIGION:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:80%; float:left">
          <h6><strong><?= $pn_personal_data['religion'] ?></strong></h6>
        </div>
      </div>
      <div style="width:100%;clear:both;">
        <div style="height:20px;width:20%;float:left">
          <h6><strong>5.&nbsp;&nbsp;&nbsp;COUNTRY:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:80%; float:left">
          <h6><strong><?= $pn_personal_data['bahadur'] ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:30%;float:left">
          <h6><strong>6.&nbsp;&nbsp;&nbsp;EMERGENCY CONTACT:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:70%; float:left">
          <h6><strong><?= $pn_personal_data['emergency_contact'] ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:30%;float:left">
          <h6><strong>7.&nbsp;&nbsp;&nbsp;TELEPHONE NO:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:70%; float:left">
          <h6><strong><?= $pn_personal_data['telephone_no'] ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:30%;float:left">
          <h6><strong>8.&nbsp;&nbsp;&nbsp;EX-ARMY NAVY OR PAF:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:70%; float:left">
          <h6><strong><?= $pn_personal_data['ex_army'] ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:30px;width:20%;float:left">
          <h6><strong>&nbsp;&nbsp;&nbsp;SERVERD FROM:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:30%; float:left">
          <h6><strong><?= $pn_personal_data['ex_army_from'] ?></strong></h6>
        </div>
        <div style="height:20px;width:10%;float:left">
          <h6><strong>&nbsp;&nbsp;&nbsp;TO:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:40%; float:left">
          <h6><strong><?= $pn_personal_data['ex_army_to'] ?></strong></h6>
        </div>
      </div>


      <div style="width:100%;clear:both;">
        <div style="height:20px;width:30%;float:left">
          <h6><strong>9.&nbsp;&nbsp;&nbsp;FATHER'S NAME:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:70%; float:left">
          <h6><strong><?= $pn_personal_data['father_name'] ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:40%;float:left">
          <h6><strong>10.&nbsp;&nbsp;&nbsp;FATHER'S OCCUPATION:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:60%; float:left">
          <h6><strong><?= $pn_personal_data['father_occupation'] ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:40%;float:left">
          <h6><strong>11.&nbsp;&nbsp;&nbsp;NEXT OF KIN AND ADDRESS:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:60%; float:left">
          <h6><strong><?= $pn_personal_data['next_of_kin'] ?></strong></h6>
        </div>
      </div>


      <div style="width:100%;clear:both;">
        <div style="height:20px;width:50%;float:left">
          <h6><strong>12.&nbsp;&nbsp;&nbsp;NAMES OF BROTHERS AND SISTERS:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:50%; float:left">
          <h6><strong><?= $pn_personal_data['siblings'] ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:50px;width:100%;float:left">
          <h6><strong>13.&nbsp;&nbsp;&nbsp;NEAR RELATIVES IN DEFENCE SERVICES (TO INCLUDE ONLY PARENTS/BROTHERS/SISTERS/REAL UNCLES):</strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:20%;float:left">
          <h6 style="text-decoration:underline"><strong>RANK:</strong></h6>
        </div>
        <div style="height:20px;width:40%;float:left">
          <h6 style="text-decoration:underline"><strong>NAME</strong></h6>
        </div>
        <div style="height:20px;width:20%;float:left">
          <h6 style="text-decoration:underline"><strong>RELATIONSHIP</strong></h6>
        </div>
        <div style="height:20px;width:20%;float:left">
          <h6 style="text-decoration:underline"><strong>UNIT</strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:100%; float:left">
          <h6><strong>&nbsp;&nbsp;&nbsp;&nbsp;<?= $pn_personal_data['near_relatives']; ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:40%;float:left">
          <h6><strong>14.&nbsp;&nbsp;&nbsp;IDENTIFICATION MARK:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:60%; float:left">
          <h6><strong><?= $pn_personal_data['identification_marks']; ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:20%;float:left">
          <h6><strong>15.&nbsp;&nbsp;&nbsp;HEIGHT:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:30%; float:left">
          <h6><strong><?= $pn_personal_data['height'] ?></strong></h6>
        </div>
        <div style="height:20px;width:20%;float:left">
          <h6><strong>16.&nbsp;&nbsp;&nbsp;WEIGHT:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:30%; float:left">
          <h6><strong><?= $pn_personal_data['weight'] ?></strong></h6>
        </div>
      </div>

      <div class="container my-3">
        <div style="text-align:center">
          <h4 style="text-decoration:underline"><strong>PART-II</strong></h4>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:40%;float:left">
          <h6><strong>17.&nbsp;&nbsp;&nbsp;DATE OF JOINING NAVY:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:60%; float:left">
          <h6><strong><?= $pn_personal_data['navy_joining_date'] ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:30%;float:left">
          <h6><strong>18.&nbsp;&nbsp;&nbsp;MODE OF ENTRY:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:70%; float:left">
          <h6><strong><?= $pn_personal_data['entry_mode'] ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:40%;float:left">
          <h6><strong>19.&nbsp;&nbsp;&nbsp;SERVICE IDENTITY CARD NO:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:60%; float:left">
          <h6><strong><?= $pn_personal_data['service_id'] ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:40%;float:left">
          <h6><strong>20.&nbsp;&nbsp;&nbsp;NATIONAL IDENTITY CARD NO:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:60%; float:left">
          <h6><strong><?= $pn_personal_data['nic'] ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:30%;float:left">
          <h6><strong>21.&nbsp;&nbsp;&nbsp;BLOOD GROUP:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:70%; float:left">
          <h6><strong><?= $pn_personal_data['blood_group'] ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:20%;float:left">
          <h6><strong>22.&nbsp;&nbsp;&nbsp;ADDRESS:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:80%; float:left">
          <h6><strong><?= $pn_personal_data['address'] ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:60%;float:left">
          <h6><strong>23.&nbsp;&nbsp;&nbsp;KARACHI ADDRESS IF ANY WITH TELE NO:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:40%; float:left">
          <h6><strong><?= $pn_personal_data['karachi_address'] ?></strong></h6>
        </div>
      </div>

      <div class="container my-3">
        <div style="text-align:center">
          <h4 style="text-decoration:underline"><strong>PART-III</strong></h4>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:30%;float:left">
          <h6><strong>24.&nbsp;&nbsp;&nbsp;MATRIC: SCHOOL</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:70%; float:left">
          <h6><strong><?= $pn_personal_data['matric_school'] ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:30%;float:left">
          <h6><strong>25.&nbsp;&nbsp;&nbsp;DIVISION/GRADE:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:70%; float:left">
          <h6><strong><?= $pn_personal_data['matric_division'] ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:30%;float:left">
          <h6><strong>26.&nbsp;&nbsp;&nbsp;SUBJECTS:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:70%; float:left">
          <h6><strong><?= $pn_personal_data['matric_subjects'] ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:40%;float:left">
          <h6><strong>27.&nbsp;&nbsp;&nbsp;INTERMEDIATE: COLLEGE:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:60%; float:left">
          <h6><strong><?= $pn_personal_data['intermediate_college'] ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:30%;float:left">
          <h6><strong>28.&nbsp;&nbsp;&nbsp;DIVISION/GRADE:</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:70%; float:left">
          <h6><strong><?= $pn_personal_data['intermediate_division'] ?></strong></h6>
        </div>
      </div>

      <div style="width:100%;clear:both;">
        <div style="height:20px;width:40%;float:left">
          <h6><strong>29.&nbsp;&nbsp;&nbsp;HET/DIPLOMA (IF APPLICABLE):</strong></h6>
        </div>
        <div style="border-bottom: 2px solid black; text-align:center;height:30px;width:60%; float:left">
          <h6><strong><?= $pn_personal_data['diploma'] ?></strong></h6>
        </div>
      </div>

    </div>
  </div>
<?php } else { ?>
  <a href="">No Data Found</a>
<?php } ?>

<div class="clearfix"></div>
<div class="clearfix"></div>

</html>