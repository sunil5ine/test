<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <link href="<?php echo $this->config->item('web_url');?>assets/fonts/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>dist/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>dist/css/style.css">
    <style>
    section{ display: flex; vertical-align: middle; height: 100vh; align-items: center; }
    </style>
</head>
<body>
   
    	<!-- login section -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col s12 l6 m10 push-m1 push-l3">
					
                    <div class="card z-depth-2">
                        <div class="card-content">
                            <div class="center">
                                <h4>Reset password</h4>
                                <form method="post"  action="<?php echo base_url('login/reset') ?>" style="overflow: hidden;">
                                <div class="input-field col s12">
                                    <input type="email" id="email" class="validate"  required name="username">
                                    <label for="email" data-error="wrong" data-success="right">Email</label>
                                    <p><small><?php echo form_error('username'); ?></small></p>
                                </div>
                                <div class="input-field col s12 l6">
                                    <input type="password" id="first_name" name="pwd1" class="validate" required>
                                    <label for="first_name">Password</label>
                                    <p><small><?php echo form_error('pwd1'); ?></small></p>

                                </div>
                                <div class="input-field col s12 l6">
                                    <input type="password" id="last_name" name="pwd2" class="validate" required>
                                    <label for="last_name">Confirm password</label>
                                    <p><small><?php echo form_error('pwd2'); ?></small></p>

                                </div>
                                <div class="input-field col s12 l12">
                                    <button type="submit" class="waves-effect white-text waves-light btn green hoverable darken-4" style="width:100%">Button</button>
                                </div>
                                  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script type="text/javascript" src="<?php echo base_url() ?>dist/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>dist/js/materialize.min.js"></script>

	<?php if($this->session->flashdata('check_database')){ ?>
		<script>
		M.toast({html: '<?php echo $this->session->flashdata("check_database")?>', classes: 'red'});
		</script>
	<?php }  ?>
	<?php if($this->session->flashdata('success')){ ?>
		<script>
			M.toast({html: '<?php echo $this->session->flashdata("success")?>', classes: 'green'});
		</script>
    <?php }  ?>
    
    
</body>
</html>