<?php $this->load->view('ct/common/header'); ?>
<style>
    .red-border {
        border: 1px solid red !important;
    }

    .modal {
        display: none;
        position: fixed;
        padding-top: 100px;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        overflow: auto;
        z-index: 9999;
    }
</style>

<div class="container-fluid my-2">

    <div class="form-group row justify-content-center">
        <div class="col-lg-1">
            <img src='<?= base_url() ?>assets/img/navy_logo-new.png' style="height: 130px; width:100px;">
        </div>
        <div class="col-lg-11">
            <h1 style="text-align:center; padding:40px"><strong>EDIT OFFICER LIKE QUALITIES</strong></h1>
        </div>

    </div>

    <div class="card-body bg-custom3">
        <!-- Nested Row within Card Body -->
       

        <div id="search_cadet" class="row my-2" style="display:block">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header bg-custom1">
                        <h1 class="h4">Fill Officer Like Qualities Form </h1>
                    </div>

                    <div class="card-body bg-custom3">
                        <form class="user" role="form" method="post" id="save_form" action="<?= base_url(); ?>D_O/update_officer_qualities">
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <h6>&nbsp;Name:</h6>
                                </div>

                                <div class="col-sm-4">
                                    <h6>&nbsp;Term:</h6>
                                </div>

                                <div class="col-sm-4">
                                    <h6>&nbsp;Division:</h6>
                                </div>

                            </div>
                            <div class="form-group row">

                                <div class="col-sm-4 mb-1" style="display:none">
                                    <input type="text" class="" name="oc_num" value="<?= $officer_data['oc_no']; ?>" id="oc_num">
                                </div>
                                <div class="col-sm-4 mb-1" style="display:none">
                                    <input type="text" class="" name="id" value="<?= $officer_data['p_id']; ?>" id="id">
                                </div>

                                <div class="col-sm-4 mb-1">
                                    <input type="text" class="form-control form-control-user" value="<?= $officer_data['name']; ?>" name="name" id="name" style="font-weight: bold; font-size:large" placeholder="Name" readonly>
                                </div>
                                <div class="col-sm-4 mb-1">
                                    <input type="text" class="form-control form-control-user" name="term" value="<?= $officer_data['term']; ?>" id="term" style="font-weight: bold; font-size:large" placeholder="Term" readonly>
                                </div>
                                <div class="col-sm-4 mb-1">
                                    <input type="text" class="form-control form-control-user" name="division" value="<?= $officer_data['divison_name']; ?>" id="division" style="font-weight: bold; font-size:large" placeholder="Division" readonly>
                                </div>

                            </div>

                            <div class="card-body">
                                <div id="table_div">
                                    <?php if (count($quality_list) > 0) { ?>
                                        <table id="datatable" class="table table-striped" style="color:black">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S. No.</th>
                                                    <th scope="col">Quality</th>
                                                    <th scope="col">Max Marks</th>
                                                    <th scope="col">Mid Term</th>
                                                    <th scope="col">Final Term</th>
                                                    <!-- <th scope="col">Status</th> -->
                                                </tr>
                                            </thead>
                                            <tbody id="table_rows">
                                                <?php $count = 0;
                                                foreach ($quality_list as $data) { ?>
                                                    <tr>
                                                        <td scope="row" style="padding:25px"><?= $data['id']; ?></td>
                                                        <td scope="row" style="padding:25px"><?= $data['quality_name']; ?></td>
                                                        <td scope="row" style="padding:25px"><?= $data['max_marks']; ?></td>
                                                        
                                                        <!-- truthfulness -->
                                                        <?php if($count==0){
                                                            if(isset($officer_data['truthfulness_mid'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user" value="<?= $officer_data['truthfulness_mid'] ?>" name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td> 
                                                       <?php }
                                                        else{ ?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                         <?php }?>

                                                         <?php if(isset($officer_data['truthfulness_terminal'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  value="<?= $officer_data['truthfulness_terminal'] ?>"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>   <?php }else{?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>  
                                                        <?php } ?>
                                                        <?php } ?>
                                                        <!-- integrity -->

                                                           <?php if($count==1){
                                                            if(isset($officer_data['integrity_mid'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user" value="<?= $officer_data['integrity_mid'] ?>" name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                        <?php  }
                                                        else{ ?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                         <?php }?>

                                                         <?php if(isset($officer_data['integrity_terminal'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  value="<?= $officer_data['integrity_terminal'] ?>"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>
                                                           <?php }else{?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>  
                                                        <?php } ?>
                                                        <?php } ?>
                                                        <!-- integrity -->

                                                        <!-- pride -->
                                                           <?php if($count==2){
                                                            if(isset($officer_data['pride_mid'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user" value="<?= $officer_data['pride_mid'] ?>" name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td> 
                                                        <?php }else{ ?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user" name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                         <?php }?>

                                                         <?php if(isset($officer_data['pride_terminal'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  value="<?= $officer_data['pride_terminal'] ?>"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>
                                                           <?php }else{?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>  
                                                        <?php } ?>
                                                        <?php } ?>
                                                        <!-- pride -->

                                                                <!-- courage -->
                                                           <?php if($count==3){
                                                            if(isset($officer_data['courage_mid'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user" value="<?= $officer_data['courage_mid'] ?>" name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                        <?php }
                                                        else{ ?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                         <?php }?>

                                                         <?php if(isset($officer_data['courage_terminal'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  value="<?= $officer_data['courage_terminal'] ?>"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>   <?php }else{?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>  
                                                        <?php } ?>
                                                        <?php } ?>
                                                        <!-- courage -->

                                                                 <!-- confidence -->
                                                           <?php if($count==4){
                                                            if(isset($officer_data['confidence_mid'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user" value="<?= $officer_data['confidence_mid'] ?>" name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                        <?php }
                                                        else{ ?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                         <?php }?>

                                                         <?php if(isset($officer_data['confidence_terminal'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  value="<?= $officer_data['confidence_terminal'] ?>"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>
                                                           <?php }else{?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>  
                                                        <?php } ?>
                                                        <?php } ?>
                                                        <!-- confidence -->

                                                                   <!-- initiative -->
                                                           <?php if($count==5){
                                                            if(isset($officer_data['initiative_mid'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user" value="<?= $officer_data['initiative_mid'] ?>" name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td> 
                                                    <?php }
                                                        else{ ?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                         <?php }?>

                                                         <?php if(isset($officer_data['initiative_terminal'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  value="<?= $officer_data['initiative_terminal'] ?>"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>   <?php }else{?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>  
                                                        <?php } ?>
                                                        <?php } ?>
                                                        <!-- initiative -->

                                                                     <!-- command -->
                                                           <?php if($count==6){
                                                            if(isset($officer_data['command_mid'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user" value="<?= $officer_data['command_mid'] ?>" name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                        <?php }
                                                        else{ ?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                         <?php }?>

                                                         <?php if(isset($officer_data['command_terminal'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  value="<?= $officer_data['command_terminal'] ?>"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>   <?php }else{?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>  
                                                        <?php } ?>
                                                        <?php } ?>
                                                        <!-- command -->

                                                                           <!-- discipline -->
                                                           <?php if($count==7){
                                                            if(isset($officer_data['descipline_mid'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user" value="<?= $officer_data['descipline_mid'] ?>" name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td> 
                                                    <?php }
                                                        else{ ?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                         <?php }?>

                                                         <?php if(isset($officer_data['descipline_terminal'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  value="<?= $officer_data['descipline_terminal'] ?>"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>   <?php }else{?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>  
                                                        <?php } ?>
                                                        <?php } ?>
                                                        <!-- discipline -->

                                                                           <!-- duty -->
                                                           <?php if($count==8){
                                                            if(isset($officer_data['duty_mid'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user" value="<?= $officer_data['duty_mid'] ?>" name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td> 
                                                       <?php }
                                                        else{ ?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                         <?php }?>

                                                         <?php if(isset($officer_data['duty_terminal'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  value="<?= $officer_data['duty_terminal'] ?>"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>   <?php }else{?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>  
                                                        <?php } ?>
                                                        <?php } ?>
                                                        <!-- duty -->

                                                                             <!-- reliability -->
                                                           <?php if($count==9){
                                                            if(isset($officer_data['reliability_mid'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user" value="<?= $officer_data['reliability_mid'] ?>" name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td> 
                                                    <?php }
                                                        else{ ?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                         <?php }?>

                                                         <?php if(isset($officer_data['reliability_terminal'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  value="<?= $officer_data['reliability_terminal'] ?>"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>   <?php }else{?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>  
                                                        <?php } ?>
                                                        <?php } ?>
                                                        <!-- reliability -->



                                                                             <!-- appearance -->
                                                           <?php if($count==10){
                                                            if(isset($officer_data['appearance_mid'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user" value="<?= $officer_data['appearance_mid'] ?>" name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td> 
                                                    <?php }
                                                        else{ ?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                         <?php }?>

                                                         <?php if(isset($officer_data['appearance_terminal'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  value="<?= $officer_data['appearance_terminal'] ?>"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>   <?php }else{?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>  
                                                        <?php } ?>
                                                        <?php } ?>
                                                        <!-- reliability -->

                                                                         <!-- appearance -->
                                                           <?php if($count==11){
                                                            if(isset($officer_data['fitness_mid'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user" value="<?= $officer_data['fitness_mid'] ?>" name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td> 
                                                    <?php }
                                                        else{ ?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                         <?php }?>

                                                         <?php if(isset($officer_data['fitness_terminal'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  value="<?= $officer_data['fitness_terminal'] ?>"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>   <?php }else{?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>  
                                                        <?php } ?>
                                                        <?php } ?>
                                                        <!-- reliability -->

                                                                      <!-- conduct -->
                                                           <?php if($count==12){
                                                            if(isset($officer_data['conduct_mid'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user" value="<?= $officer_data['conduct_mid'] ?>" name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td> 
                                                    <?php }
                                                        else{ ?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                         <?php }?>

                                                         <?php if(isset($officer_data['conduct_terminal'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  value="<?= $officer_data['conduct_terminal'] ?>"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>   <?php }else{?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>  
                                                        <?php } ?>
                                                        <?php } ?>
                                                        <!-- conduct -->

                                                                         <!-- cs -->
                                                           <?php if($count==13){
                                                            if(isset($officer_data['cs_mid'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user" value="<?= $officer_data['cs_mid'] ?>" name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td> 
                                                    <?php }
                                                        else{ ?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                         <?php }?>

                                                         <?php if(isset($officer_data['cs_terminal'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  value="<?= $officer_data['cs_terminal'] ?>"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>   <?php }else{?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>  
                                                        <?php } ?>
                                                        <?php } ?>
                                                        <!-- cs -->


                                                                         <!-- teamwork -->
                                                           <?php if($count==14){
                                                            if(isset($officer_data['teamwork_mid'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user" value="<?= $officer_data['teamwork_mid'] ?>" name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td> <?php }
                                                        else{ ?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                         <?php }?>

                                                         <?php if(isset($officer_data['teamwork_terminal'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  value="<?= $officer_data['teamwork_terminal'] ?>"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>   <?php }else{?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>  
                                                        <?php } ?>
                                                        <?php } ?>
                                                        <!-- tesmwork -->

                                                                           <!-- expression -->
                                                           <?php if($count==15){
                                                            if(isset($officer_data['expression_mid'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user" value="<?= $officer_data['expression_mid'] ?>" name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                        <?php }
                                                        else{ ?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="mid_marks[]" id="mid_marks[]" placeholder="Marks"></td>
                                                         <?php }?>

                                                         <?php if(isset($officer_data['expression_terminal'])){?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  value="<?= $officer_data['expression_terminal'] ?>"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>   <?php }else{?>
                                                        <td scope="row"><input type="text" class="form-control form-control-user"  name="final_marks[]" id="final_marks" placeholder="Marks"></td>  
                                                        <?php } ?>
                                                        <?php } ?>
                                                        <!-- expression -->





                                                    </tr>
                                                <?php
                                                $count++; } ?>
                                                <tr>
                                                    <td scope="row" style="padding:25px"></td>
                                                    <td scope="row" style="padding:25px; text-align:right"><strong>Grand Total</strong></td>
                                                    <td scope="row" style="padding:25px"><strong>200</strong></td>
                                                    <td scope="row"><input type="text" class="form-control form-control-user" value="<?= $officer_data['total_mid']; ?>" name="total_mid_marks" id="total_mid_marks" placeholder="Total Marks"></td>
                                                    <td scope="row"><input type="text" class="form-control form-control-user"  value="<?= $officer_data['total_terminal']; ?>" name="total_final_marks" id="total_final_marks" placeholder="Total Marks"></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php } else { ?>
                                        <a> No Data found </a>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3 mb-1">
                                </div>
                                <div class="col-sm-3 mb-1 my-3">
                                    <h6 style="text-align:right">&nbsp;Percentage of Marks:</h6>
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <input type="text" class="form-control form-control-user" name="mid_percentage"  value="<?= $officer_data['mid_marks']; ?>" id="mid_percentage" placeholder="Mid Marks %">
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <input type="text" class="form-control form-control-user" name="final_percentage"  value="<?= $officer_data['terminal_marks']; ?>" id="final_percentage" placeholder="Final Marks %">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3 mb-1">
                                </div>
                                <div class="col-sm-3 mb-1 my-3">
                                    <h6 style="text-align:right">&nbsp;Date of Assesment:</h6>
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <input type="date" class="form-control form-control-user" name="mid_exam_date" value="<?= $officer_data['mid_marks_date']; ?>" id="mid_exam_date" placeholder="Mid Marks %">
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <input type="date" class="form-control form-control-user" name="final_exam_date" value="<?= $officer_data['terminal_marks_date']; ?>" id="final_exam_date" placeholder="Final Marks %">
                                </div>
                            </div>




                            <div class="form-group row justify-content-center">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary btn-user btn-block" id="save_btn">
                                        <!-- <i class="fab fa-google fa-fw"></i>   -->
                                        save
                                    </button>
                                    <span id="show_error_save" style="font-size:10px; color:red; display:none">&nbsp;&nbsp;Please check errors*</span>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>


            </div>
        </div>

        <div id="no_data" class="row my-2" style="display:none">
            <div class="col-lg-12 my-5">

                <h4 style="color:red">No Cadet Found. Please check the OC No. entered</h4>

            </div>
        </div>
    </div>

</div>

</div>

<?php $this->load->view('common/footer'); ?>
<script>
    function seen(data) {
        // alert('in');
        // alert(data);
        // var receiver_id=$(this).attr('id');
        $.ajax({
            url: '<?= base_url(); ?>ChatController/seen',
            method: 'POST',
            data: {
                'id': data
            },
            success: function(data) {
                $('#notification').html(data);
            },
            async: true
        });
    }

    $('#notifications').focusout(function() {
        // alert('notification clicked');
        $.ajax({
            url: '<?= base_url(); ?>ChatController/activity_seen',
            success: function(data) {
                $('#notifications').html(data);
            },
            async: true
        });
    });





    $('#save_btn').on('click', function() {
        $('#save_btn').attr('disabled', true);
        var validate = 0;
        var punish = $('#punish').val();
        var offense = $('#offense').val();
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();

        if (punish == '') {
            validate = 1;
            $('#punish').addClass('red-border');
        }
        if (offense == '') {
            validate = 1;
            $('#offense').addClass('red-border');
        }
        if (start_date == '') {
            validate = 1;
            $('#start_date').addClass('red-border');
        }
        if (end_date == '') {
            validate = 1;
            $('#end_date').addClass('red-border');
        }

        if (validate == 0) {
            $('#save_form')[0].submit();
            $('#show_error_save').hide();

        } else {
            $('#save_btn').removeAttr('disabled');
            $('#show_error_save').show();
        }
    });

    $('#total_mid_marks').on('click', function() {
        alert('dsfsdf');
        var sum=0;
        var inps = document.getElementsByName('mid_marks[]');
            for (var i = 0; i <inps.length; i++) {
                //sum=sum+i;
                 }
      //alert(sum);
      $('#total_mid_marks').val(sum);
      // alert(a);
    });
</script>