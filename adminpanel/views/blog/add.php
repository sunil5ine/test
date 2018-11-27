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
                                        <form enctype="multipart/form-data" action="<?php echo base_url() ?>blog/post" method="post" style="overflow-y: auto;overflow-x: hidden;">
                                        
                                          <div class="row m0">
                                              <div class="input-field col s12 l6">
                                                <i class="far fa-calendar-alt prefix"></i>
                                                <input type="text" id="pdate" name="postdate" class="validate datepicker">
                                                <label for="pdate">Schedule date (Optional)</label>
                                              </div>
                                              <div class="input-field col s12 l6">
                                                <input type="text" id="blog-title" name="title" class="validate" required>
                                                <label for="blog-title">Blog Title <span class="red-text">*</span></label>
                                              </div>
                                          </div>
                                          
                                          
                                            <div class="row m0">
                                              <div class="input-field col s12 l6">
                                                <input type="text" id="seoTitle" name="stitle" class="validate" required>
                                                <label for="seoTitle">SEO Title <span class="red-text">*</span></label>
                                              </div>
                                              <div class="input-field col s12 l6">
                                                <input type="text" id="seoDes" name="sdes" class="validate" required>
                                                <label for="seoDes">SEO Description <span class="red-text">*</span></label>
                                              </div>
                                            </div> 

                                            <div class="row ">
                                                <div class="input-field col s12 l6">
                                                  <input type="text" id="skey" name="skeyword" class="validate" required>
                                                  <label for="skey">SEO Keywords <span class="red-text">*</span></label>
                                                </div>
                                                
                                                <div class="file-field input-field col s12 l6">
                                                    <div class="btn btn-small black-text grey lighten-3">
                                                    <i class="far fa-image left  "></i>
                                                        <span class="">Add Media</span>
                                                        <input type="file" name="file" accept=".png, .jpg, .jpeg, .gif" required>
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text" style="border:transparent">
                                                    </div>
                                                    <h6 class=" m0"><small> <i><b>Note</b>: Please select only image file (eg: .jpg, .png, .jpeg, .gif etc.) <br> <span class="bold">Max file size:</span> 512kb  </i> <span class="red-text">*</span></small></h6>
                                                </div>
                                            </div>

                                            <div class="col s12">
                                                <div id="toolbar-container"></div>
                                                <div id="editor">
                                                    
                                                </div>
                                                <textarea name="descr" id="description" style="display:none"></textarea>
                                            </div>
                                            <div class="col s12 center mtb20">
                                                <button class="btn waves-effect waves-light green darken-4 hoverable btn-large" type="submit" id="submit" name="action">Publish
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
        <?php echo $this->session->flashdata('messeg'); ?>
        
        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/materialize.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/script.js"></script>
        <script src="<?php echo base_url() ?>dist/ckeditor/ckeditor.js"></script>
        <script>
             $(document).ready(function(){
                $('.datepicker').datepicker();
                $('select').formSelect();

                $('form').submit(function(){
                  var text = $('#editor').html(); 
                  $('#description').val(text);
                });

                
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