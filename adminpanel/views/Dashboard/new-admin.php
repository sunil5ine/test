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
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>dist/css/style.css">
      <!-- bar -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>dist/css/short.css">
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
                            <p class="h5-para black-text  m0">Add New admin</p>
                            <small><i>This option will  shows in super admin only.</i></small>
                        </div>

                        <div class="row">
                            <form class="noborder-form">
                                <div class="col s12 m4 input-field">
                                    <input type="text" id="first_name" class="validate white plr10">
                                    <label for="first_name" class="plr10">Name</label>
                                </div>
                                <div class="col s12 m4 input-field">
                                    <input type="text" id="first_name" class="validate white plr10">
                                    <label for="first_name" class="plr10">Email</label>
                                </div>
                                <div class="col s12 m4">
                                    <button class="btn waves-effect waves-light green darken-4" type="submit" name="action">Add user </button>
                                </div>
                            </form>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <div class="card z-depth-0">
                                    <div class="card-content">
                                        <table class="striped">
                                            <thead>
                                                <tr>
                                                    <th data-field="id">Name</th>
                                                    <th data-field="name">Email</th>
                                                    <th data-field="price" class='right pr15'>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Alvin</td>
                                                    <td>Eclair</td>
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
                                                <tr>
                                                    <td>Alan</td>
                                                    <td>Jellybean</td>
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
                                                <tr>
                                                    <td>Jonathan</td>
                                                    <td>Lollipop</td>
                                                    <td class='right pr15'><div class="droupdown-holder">        
                                                            <a class='dropdowns'><i class="fas fa-ellipsis-v"></i></a>
                                                                                                                
                                                            <!-- Dropdown Structure -->
                                                            <ul  class='dropdown-ele'>
                                                            <li><a href="#!">Edite</a></li>
                                                            <li><a href="#!">Delete</a></li>
                                                            </ul>
                                                        </div></td>
                                                </tr>
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

      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/materialize.min.js"></script>
     
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
