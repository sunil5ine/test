<!DOCTYPE html>
<html>
   <head>
      <title><?php echo $title ?></title>
      <meta charset="UTF-8">
      <meta name="description" content="Free Web tutorials">
      <meta name="keywords" content="HTML,CSS,XML,JavaScript">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="<?php echo $this->config->item('web_url');?>assets/fonts/css/all.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>dist/css/materialize.min.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>dist/dataTable/datatables.min.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>dist/dataTable/button/css/buttons.dataTables.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>dist/css/style.css">
      <!-- bar -->
      <style>
        .ck-editor__editable { min-height: 300px; } ::placeholder { color: black; opacity: 1; /* Firefox */ } :-ms-input-placeholder { /* Internet Explorer 10-11 */ color: black; } ::-ms-input-placeholder { /* Microsoft Edge */ color: black; } .input-field { margin-bottom: 0; }
     </style>
   </head>
   <body>
      <!-- headder -->
      <?php $this->load->view('include/header'); ?>
      <!-- end headder -->
      <!-- first layout -->
        <section class="sec-top">
            <div class="container-wrap">
                <div class="col l12 m12 s12">
                    <div class="row">
                        <?php $this->load->view('include/menu'); ?> 

                        <div class="col m12 s12 l9">
                            <p class="h5-para black-text m0">Blog lists</p>
                            <!-- <div class="filterbox">
                            
                                <div class="row m0">

                                    <div class="col s12 m7">
                                        <div class="input-field col s12 m4">
                                            <input type="text" class="datepicker" placeholder ="All Dates">
                                        </div>
                                        <div class="input-field col s12 m4">
                                            <select>
                                            <option value="" disabled selected>All Category</option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                            </select>
                                        </div>
                                        <div class="input-field col s12 m4">
                                            <a href="#" class="waves-effect white-text hoverable waves-light btn-small green darken-4 fiter-btn" style="">Filter</a>
                                        </div>
                                    </div>

                                    <div class="col s12 m5 ">
                                        <div class="input-field col s12 m7 push-m5">
                                            <input type="text" class="text" placeholder ="Serch by company etc...">
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="card">
                                <div class="card-content">
                                    <table class="striped" id="dynamic">
                                        <thead>
                                            <tr>
                                                <th >Title</th>
                                                <th class="center">Date</th>
                                                <th class="center">Scheduled On</th>
                                                <th class="center">Status</th>
                                                <th class="right-align">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($blog as $key => $value) {  ?>
                                            <tr>
                                                <td><?php echo $value->title ?></td>
                                                <td class="center"><?php echo date('d-m-Y',strtotime($value->creted_on)) ?></td>
                                                <td class="center"><?php echo ($value->postOn == '0000-00-00')? date('d-m-Y',strtotime($value->creted_on)) : $value->postOn ?></td>
                                                <td class="<?php echo($value->bg_status == 0)? 'td-a':''  ?> center"><?php echo($value->bg_status == 1)? '<span class="green-text">Posted</span>' : '<a href="" class="red-text">Post Now</a>' ?></td>
                                                <td class='right pr15'>
                                                    <div class="droupdown-holder">        
                                                        <a class='dropdowns'><i class="fas fa-ellipsis-v"></i></a>
                                                        <!-- Dropdown Structure -->
                                                        <ul  class='dropdown-ele'>
                                                        <li><a href="#!">Edite</a></li>
                                                        <li><a href="#!">Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- cad end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php echo $this->session->flashdata('messeg');?>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/materialize.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/script.js"></script>

      <!-- data table -->
        <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/datatables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/button/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/button/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/button/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/button/js/pdfmake.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/button/js/vfs_fonts.js"></script>
        <script>
            $(document).ready( function () {
                $('#dynamic').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf'
                    ], 
                });
                $('select').formSelect();
            } );
        </script> 
        <script>
             $(document).ready(function(){
                $('.datepicker').datepicker();
                $('select').formSelect();
            });
        </script>
       <script type='text/javascript'>
         $(function () {
            
             $('.delete-btn').click(function(){
              if(!confirm('Are you sure you want to Delete?')) {
                return false;
                }
             });
        });

       $(document).ready(function () {
            $('.droupdown-holder').find('.dropdowns').click(function () { 
               var par = $(this).parent('.droupdown-holder');
               par.find('.dropdown-ele').show();
                              
            });
            $('.dropdown-ele, .dropdowns').click(function (e) { 
                e.stopPropagation();
            });
            $('body').click(function () { 
                $('.dropdown-ele').hide();                
            });
        });
      </script>
    </body>
</html>