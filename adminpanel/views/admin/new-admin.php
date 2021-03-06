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
      
   </head>
   <body>
      <!-- headder -->
      <?php $this->load->view('include/header'); ?>
      <!-- end headder -->
     
      <section class="sec-top">
         <div class="container-wrap">
            <div class="col l12 m12 s12">
               <div class="row">
               <?php $this->load->view('include/menu'); ?>
                    <div class="col m12 s12 l9">
                        <div class="mb10">
                            <p class="h5-para black-text  m0">
                                <?php echo (!empty($edite))? 'Edit admin' : 'Add New admin' ?>
                                
                            </p>
                            <small><i>This option will be visible only for super admin.</i></small>
                        </div>
                        <span class="red-text"><?php echo validation_errors(); ?></span>
                        <div class="row">
                        
                        <?php if(!empty($edite)) { ?>
                            <form class="admin-add" method="post" action="<?php echo base_url('update') ?>">
                                <div class="col s12 m6 l3">
                                    <input type="text" id="" name="user" value="<?php echo $edite['ad_name'] ?>" placeholder="Admin user name" class="validate  plr10" required>
                                    <span class="red-text"><?php echo form_error('user'); ?></span>
                                </div>
                                <div class="col s12 m6  l3 ">
                                    <input type="email" id="" value="<?php echo $edite['ad_email'] ?>" name="email" placeholder="Admin email id" class="validate  plr10" required>
                                    <span class="red-text"><?php echo form_error('email'); ?></span>
                                </div>
                                <div class="col s12 m4 l3 ">
                                    <input type="password" id="" value="<?php echo $edite['ad_hash'] ?>" name="psw" placeholder="Admin Password" class="validate  plr10" required>
                                    <span class="red-text"><?php echo form_error('psw'); ?></span>
                                </div>
                                <div class="col s12 m4 l2">
                                    <div class="checkbox-container">
                                        <label>
                                            <input type="hidden" name="id" value="<?php echo $edite['ad_id'] ?>">
                                            <input type="checkbox" name="type" class="filled-in" <?php echo ($edite['type'] == 1)?'checked' : '' ?>  />
                                            <span>super admin</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col s12 m4 l1 ">
                                    <button class="btn waves-effect  waves-light blue darken-4 block" type="submit" name="action">Update</button>
                                </div>
                            </form>
                        <?php } else { ?>
                            <form class="admin-add" method="post" action="<?php echo base_url('admin/newadmin') ?>">
                                <div class="col s12 m6 l3">
                                    <input type="text" id="" name="user" placeholder="Admin user name" class="validate  plr10" required>
                                    <span class="red-text"><?php echo form_error('user'); ?></span>
                                </div>
                                <div class="col s12 m6  l3 ">
                                    <input type="email" id="" name="email" placeholder="Admin email id" class="validate  plr10" required>
                                    <span class="red-text"><?php echo form_error('email'); ?></span>
                                </div>
                                <div class="col s12 m4 l3 ">
                                    <input type="password" id="" name="psw" placeholder="Admin Password" class="validate  plr10" required>
                                    <span class="red-text"><?php echo form_error('psw'); ?></span>
                                </div>
                                <div class="col s12 m4 l2">
                                    <div class="checkbox-container">
                                        <label>
                                            <input type="checkbox" name="type" class="filled-in"  />
                                            <span>super admin</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col s12 m4 l1 ">
                                    <button class="btn waves-effect  waves-light green darken-4 block" type="submit" name="action">Add user </button>
                                </div>
                            </form>
                        <?php  } ?>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <div class="card z-depth-0">
                                    <div class="card-content">
                                        <table id="dynamic" class="striped">
                                            <thead>
                                                <tr>
                                                    <th >ID</th>
                                                    <th >Name</th>
                                                    <th >Email</th>
                                                    <th class="">Administrators Type</th>
                                                    <th  class='right-align pr15'>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($admin as $key => $value) { ?>
                                                    <tr>
                                                        <td><?php echo $value->ad_id ?></td>
                                                        <td><?php echo $value->ad_name ?></td>
                                                        <td><?php echo $value->ad_email ?></td>
                                                        <td class=""><?php echo ($value->type == 1) ?'Super Administrators' :'Department Administrators' ?> </td>
                                                        
                                                        <td class='right pr15'>
                                                            <div class="droupdown-holder">        
                                                                <a class='dropdowns'><i class="fas fa-ellipsis-v"></i></a>
                                                                                                                    
                                                                <!-- Dropdown Structure -->
                                                                <ul  class='dropdown-ele'>
                                                                <li><a href="<?php echo base_url('admin/').$value->ad_id ?>" >Edit</a></li>
                                                                <li><a href="<?php echo base_url('admin/delete/').$value->ad_id ?>" class="delete-btn">Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
               </div>
               <!-- row -->
            </div>
         </div>
         <!-- container wrap -->
      </section>
      <?php echo $this->session->flashdata('messeg'); ?>
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
