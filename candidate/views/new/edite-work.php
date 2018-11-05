<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php'  ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width" />
  	<meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo $this->config->item('web_url');?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url');?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url');?>assets/css/style.css">
</head>
<body>
	<!-- header -->
	<?php include 'include/header.php'  ?>
	<!-- End header -->

	<!-- Applied Jobs -->

	<section>
		<div class="row">
			<div class="container-wrap">
				<?php include 'include/left-nav.php'  ?>
				
				<div class="col  s12 l9">
					<div class="row">	
						<div class="appl-job-heading col m8 s8 l12 ">
							<p class="black-text h5"><?php  echo $pagehead ?></p>
							
						</div>
						
					</div>

					<div class="card ">
						<div class="card-content">
							
			<form method="post" name="smfrm" action="<?php echo $this->config->base_url().'Dashboard/update_works'?>" data-toggle="validator" role="form" style="overflow:visible">
      		<div class="mar-top-pop">
            <div class="row ">
            	
            	<div class="col s12 l6 m6">
            		<label class="lable-text">Employer</label>
            		<input type="hidden" value="<?php echo $wore['cwid']?>" name="work_id">
				<input id="last_name"  class="validate borderd-0" type="text"  placeholder="Employer" value="<?php echo  $wore['cwcompany'] ?>" name="company" id="company" required style="border-radius: 0; height: 38px;">
            </div>
            <div class="col s12 l6 m6">
                       	<label class="lable-text">Location</label>
            	<input id="last_name" type="text" class="validate borderd-0" placeholder="Company Location" value="<?php echo  $wore['celocation'] ?>" name="location" id="location" required style="border-radius: 0; height: 38px;">
            </div>

            <div class="col s12 l6 m6">
               <label class="lable-text">Position</label>
               <input id="last_name" type="text" class="validate borderd-0" value="<?php echo  $wore['cwposi'] ?>" name="position" placeholder="Position" style="border-radius: 0; height: 38px;">
            </div>
             <div class="col s12 l6 m6">
             	<div class="ptb30">
	               <label>
			        <input type="checkbox" name="cmp_present" id="present-check" <?php echo  ($wore['cwpresent'] == '1')? 'checked' : '' ?>  value="1"/>
			        <span>Current Employer </span>
			      </label>
		      </div>
            </div>

            <div class="col s12 l6 m6">
               <label class="lable-text">From Date</label>
               <div class="row m0">
               	<div class="col s6 m6 l6">
               		<?php echo form_dropdown('frmmon',$month_list,$wore['cwfm'],'id="frmmon" class="" tabindex="1" style="width:45%;border-radius: 0; height: 38px;" required');?>
               	</div>
               	<div class="col s6 m6 l6">
               	 <?php echo form_dropdown('frmyr',$year_list,$wore['cwfy'],'id="frmyr" class="" tabindex="1" style="width:45%;border-radius: 0; height: 38px;" required');?>
               	</div>
               </div>
                
                
            </div>
            <div class="col s12 l6 m6">
               <label class="lable-text">To Date</label>
                <div class="row m0" id="todis">
	               	<div class="col s6 m6 l6">
	               		<?php echo form_dropdown('tomon',$month_list,$wore['cwem'],'id="tomon" class=" form-control" tabindex="1" style="width:45%;" required');?>
	               	</div>
	               	<div class="col s6 m6 l6">
	               	 <?php echo form_dropdown('toyr',$year_list,$wore['cwey'],'id="toyr" class=" form-control" tabindex="1" style="width:45%;" required');?>
	               	</div>
               </div>
            </div>

            
            <div class="col l12 s12 m12">
            	<label for="textarea2" class="lable-text">Key Responsibility</label>
            	<textarea id="textarea2" class="materialize-textarea" class="form-control" placeholder="Key Resposibility" name="keyrole" data-length="2000"><?php echo $wore['cerole'] ?></textarea>    
            </div>
        </div>
    </div>
    <div class="presonal-head-required1 right-align" style="overflow: hidden;">
    	<a href="<?php echo base_url() ?>MyProfile" class="btn-flat waves-effect black-text ">Cancel</a>
		<button class="btn brand waves-effect white-text" type="submit" value="Update">Save</button>
	</div>
	</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php echo include'include/footer.php' ?>

<!-- footer -->



	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/script.js"></script>
	<script type="text/javascript">
		 $(document).ready(function(){
		    $('select').formSelect();
		    
			<?php  if($wore['cwpresent'] == '1') {?>	
				$('#todis input.select-dropdown').attr('disabled','true');
				$('#todis input.select-dropdown, #tomon, #toyr').removeAttr('required','true');

			<?php }else { ?>
			
				$('#todis input.select-dropdown').removeAttr('disabled','true');
				$('#todis input.select-dropdown, #tomon, #toyr').attr('required','true');
			<?php } ?>

			$('#present-check').change(function(){
			if(this.checked){
				
				$('#todis input.select-dropdown').attr('disabled','true');
				$('#todis input.select-dropdown, #tomon, #toyr').removeAttr('required','true');

			}
			if(this.checked==false){
				$('#todis input.select-dropdown').removeAttr('disabled','true');
				$('#todis input.select-dropdown, #tomon, #toyr').attr('required','true');
			}
		});
		  });
	</script>
</body>
</html>