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
      <style>
        .ck-editor__editable {
            min-height: 300px;
        }
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
                            <p class="h5-para black-text ">Add New Post</p>

                            <div class="card">
                                <div class="card-content">
                                    
                                    <div class="form-container">
                                        <form action="" style="overflow-y: auto;overflow-x: hidden;">
                                        
                                          <div class="input-field col s12 l6">
                                            <i class="far fa-calendar-alt prefix"></i>
                                            <input type="text" id="first_name" class="validate datepicker">
                                            <label for="first_name">Posted Date</label>
                                          </div>
                                          <div class="input-field col s12 l6">
                                            <input type="text" id="last_name" class="validate">
                                            <label for="last_name">Blog Title</label>
                                          </div>
                                          
                                          <div class="input-field col s12 l6">
                                                <select>
                                                    <option value="" disabled selected>Choose your option</option>
                                                    <option value="1">Option 1</option>
                                                    <option value="2">Option 2</option>
                                                    <option value="3">Option 3</option>
                                                </select>
                                            <label for="last_name">Category</label>
                                          </div>
                                          <div class="input-field col s12 l6">
                                            <input type="text" id="first_name" class="validate">
                                            <label for="first_name">SEO Title</label>
                                          </div>
                                          <div class="input-field col s12 l6">
                                            <input type="text" id="first_name" class="validate">
                                            <label for="first_name">SEO Description</label>
                                          </div>
                                          
                                          <div class="input-field col s12 l6">
                                            <input type="text" id="last_name" class="validate">
                                            <label for="last_name">SEO Keywords</label>
                                          </div>

                                            <div class="file-field input-field">
                                                <div class="btn btn-small black-text grey lighten-3">
                                                <i class="far fa-image left  "></i>
                                                    <span class="">Add Media</span>
                                                    <input type="file">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text" style="border:transparent">
                                                </div>
                                            </div>
                                            <div class="col s12">
                                                <div id="toolbar-container"></div>
                                                <div id="editor">
                                                    <p>This is the initial editor content.</p>
                                                </div>
                                            </div>
                                            <div class="col s12 center mtb20">
                                                <button class="btn waves-effect waves-light green darken-4 hoverable btn-large" type="submit" name="action">Publish
                                                    <i class="fas fa-paper-plane right"></i>
                                                </button>
                                                <br>
                                            </div>
                                            

                                              
                                          </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- cad end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/materialize.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/script.js"></script>
        <script src="<?php echo base_url() ?>dist/ckeditor/ckeditor.js"></script>
        <script>
             $(document).ready(function(){
                $('.datepicker').datepicker();
                $('select').formSelect();
            });
        </script>
        <script>
            DecoupledEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                    const toolbarContainer = document.querySelector( '#toolbar-container' );

                    toolbarContainer.appendChild( editor.ui.view.toolbar.element );
                } )
                .catch( error => {
                    console.error( error );
                } );
        </script>
    </body>
</html>